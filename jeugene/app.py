from flask import Flask, make_response, jsonify, request
from flask import render_template, redirect, url_for,send_file, send_from_directory

import json

app = Flask(__name__)

import pymongo
from pymongo import MongoClient
from bson.objectid import ObjectId

client = MongoClient("mongodb://jeugene:jeugene@ds056698.mongolab.com:56698/jeugene")
db = client.jeugene

@app.route('/',methods=["GET"])
def index():
    return redirect(url_for('upload_form'))

@app.route('/files/upload', methods=['GET','POST'])
def upload_form():
    if request.method == 'POST':
        objectid = upload_file(request.files)
        return redirect(url_for('view_file', objectId = objectid))
    
    elif request.method == 'GET':
        return render_template("upload_form.html")

@app.route('/files/view/<objectId>', methods=['GET','POST'])
def view_file(objectId):
    mongoResults = db.file_collection.find_one({"_id": ObjectId(objectId)})
    params = {}
    params["filename"] = mongoResults["filename"]
    params["content"] = format_content(mongoResults["content"])
    params["dl_link"] = url_for("download_file", objectId = objectId)
    return render_template('view_file.html', params=params )

@app.route('/files/download/<objectId>', methods=['GET'])
def download_file(objectId):
    import os
    mongoResults = db.file_collection.find_one({"_id": ObjectId(objectId)})
    
    response = make_response(mongoResults["content"])
    response.headers["Content-Disposition"] = "attachment; filename=" + mongoResults["filename"]
   
    #Removes file data from database
    db.file_collection.delete_many({"_id":ObjectId(objectId)})
    
    return response

##########################################
#HELPER FUNCTIONS
##########################################

#Returns ObjectId of newly inserted file
def upload_file(request):
    filestream = request["file"].stream
    fileContent = filestream.read()

    file_doc = {"filename":request["file"].filename, "content":fileContent}
    insertResult = db.file_collection.insert_one(file_doc)
    return str(insertResult.inserted_id)   

def format_content(binaryContent):
    fileContent = binaryContent.replace("\n\n","\n")
    fileContent = fileContent.split("\n")
    return fileContent

#Executes Application
if __name__ == '__main__':
    app.debug = True
    app.run(threaded=True,host='0.0.0.0')

#TODO Write a script to transform input CSV to desired output CSV. 
#You will find a CSV file available for download here: test.csv. 
#There are two steps (plus an optional bonus) to this part of the test. 
#Each step concerns manipulating the values for a single field according to the step's requirements. 
#The steps are as follows:

#String cleaning - The bio field contains text with arbitrary padding, spacing and line breaks. 
#Normalize these values to a space-delimited string.

# Code swap - There is a supplementary CSV file for download here: state_abbreviations.csv. This "data dictionary" 
#	contains state abbreviations alongside state names. For the state field of the input CSV, replace each state 
#	abbreviation with its associated state name from the data dictionary.

#Date offset (bonus) - The start_date field contains data in a variety of formats. These may include e.g., 
#"June 23, 1912" or "5/11/1930" (month, day, year). But not all values are valid dates. Invalid dates may 
#include e.g., "June 2018", "3/06" (incomplete dates) or even arbitrary natural language. 
#Add a start_date_description field adjacent to the start_date column to filter invalid date values into. 
#Normalize all valid date values in start_date to ISO 8601 (i.e., YYYY-MM-DD).

# Yor script should take "test.csv" as input and produce a cleansed "solution.csv" file according to the step 
# requirements above. 
#Please attach your "solution.csv" file along with your solution code in your reply!

import csv
import re
import datetime

def main():
	
	writer = csv.DictWriter(open("solution.csv","wb"), fieldnames=["name", "gender", "birthdate","address","city","state","zipcode","email","bio","job","start_date","start_date_description"])
	writer.writeheader()
	
	state_data = getStateData()

	with open('data/test.csv', 'rb') as csvfile:
		testData = csv.DictReader(csvfile)
		for row in testData:
			row_t = transformRow(row)
			writeRowToOutput(row_t, writer)

def transformRow(row):
	state_data = getStateData()
	row["bio"] = normalizeBio(row["bio"])
	row["state"] = getStateFromAbrev( row["state"], state_data )
	row = normalizeStartDate(row)
	return row


def normalizeBio(bio):
	cleanBio = bio.strip().replace("\n"," ").replace("\t", " ")
	cleanBio = re.sub("\s\s+" , " ", cleanBio)
	return cleanBio

def getStateData():
	output = {}
	with open('data/state_abbreviations.csv', 'r') as stateFile:
		stateData = csv.DictReader(stateFile)
		for row in stateData:
			output[ row["state_abbr"] ] = row["state_name"]

	return output

def getStateFromAbrev(stateAbrev, state_data):
	return state_data[stateAbrev]

def writeRowToOutput(row, writer):
    writer.writerow(
    	{
    	"name":row["name"], 
    	"gender":row["gender"],
    	"birthdate":row["birthdate"],
    	"address":row["address"],
    	"city":row["city"],
    	"state":row["state"],
    	"zipcode":row["zipcode"],
    	"email":row["email"],
    	"bio":row["bio"],
    	"job":row["job"],
    	"start_date":row["start_date"],
    	"start_date_description":row["start_date_description"]
    	})

def normalizeStartDate(row):
	row["start_date_description"] = None
	if( isValidDate(row["start_date"]) ):
		row["start_date"] = dateToIso8601(row["start_date"])
	else:
		row["start_date_description"] = row["start_date"]
		row["start_date"] = None
	return row

def dateToIso8601(date_string):
	from dateutil.parser import parse
	return parse(date_string)

def isValidDate(start_date):
	from dateutil.parser import parse
	try:
		isValid = parse(start_date)
	except ValueError:
		return False

	return True

main()




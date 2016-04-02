from flask import Flask, make_response, request, render_template
import config
import json
from classes.NetworthHandle import NetworthHandle

app = Flask(__name__)

ApiHandle = NetworthHandle(config.SQLITE_DB)

@app.route('/',methods=["GET"])
def index():
    return render_template("form.html")

@app.route('/networth', methods=['GET'])
def get_networth():
    from_param = request.args.get("from")
    to_param = request.args.get("to")

    if to_param is None or from_param is None:
    	return make_response("Argument(s) not provided")
    else:
    	return make_response(ApiHandle.getNetWorths(from_param,to_param))


#Error Handler
@app.errorhandler(404)
def not_found(error):
	return make_response(json.dumps({'error': 'Not found'}),404)

if __name__ == '__main__':
    app.debug = True
    app.run(threaded=False, host='0.0.0.0',port=80)


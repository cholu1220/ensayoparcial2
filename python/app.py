from flask import Flask, jsonify

app= Flask(__name__)

@app.route("/")
def inicio():
    return jsonify({"message":"API py funcionando"})

if __name__=="__main__":
    app.run(host="0.0.0.0", port=5006)

from flask import Flask
from flask_mysqldb import MySQL
from flask import request,render_template

app = Flask(__name__)

# MySQL configurations
app.config['MYSQL_HOST'] = 'localhost'
app.config['MYSQL_USER'] = 'your_mysql_username'
app.config['MYSQL_PASSWORD'] = 'your_mysql_password'
app.config['MYSQL_DB'] = 'your_database_name'

mysql = MySQL(app)

db = SQLAlchemy(app)

class HealthCard(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    name = db.Column(db.String(100), nullable=False)
    dob = db.Column(db.Date, nullable=False)
    age = db.Column(db.Integer, nullable=False)
    address = db.Column(db.String(200), nullable=False)
    blood_type = db.Column(db.String(10), nullable=False)
    phone_number = db.Column(db.String(20), nullable=False)
    allergies = db.Column(db.Text, nullable=False)
    medications = db.Column(db.Text, nullable=False)

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/create-card', methods=['POST'])
def create_card():
    name = request.form['name']
    dob = request.form['dob']
    age = request.form['age']
    address = request.form['address']
    blood_type = request.form['bloodType']
    phone_number = request.form['phone_number']
    allergies = request.form['allergies']
    medications = request.form['medications']

    # Validate the input data

    # Save the data to a database
    new_card = HealthCard(name=name, dob=dob, age=age, address=address, blood_type=blood_type, phone_number=phone_number, allergies=allergies, medications=medications)
    db.session.add(new_card)
    db.session.commit()

    # Send a response to the user
    return redirect(url_for('index'))

if __name__ == '__main__':
    app.run(debug=True)
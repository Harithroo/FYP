import mysql.connector
import random
import smtplib

mydb = mysql.connector.connect(host="localhost", user="root", passwd="", database="fyp" )

def inputSQL(final_plate,path):
    mycursor = mydb.cursor()
    speed = random.randrange(70, 100)
    location = input("Set location: ")
    # location="bumbalapitiya"
    sql = "INSERT INTO infractions (number, speed, location, image_path) VALUES (%s, %s, %s, %s)"
    val = ( final_plate, speed, location, path)
    mycursor.execute(sql, val)

    mydb.commit()
    print("inserted to database")

def sendemail(plate):
    mycursor = mydb.cursor()
    sql="select * from emails where number = %s"
    number=(plate, )
    mycursor.execute(sql,number)

    myresult = mycursor.fetchall()
    if myresult == []:
        print("email not found")
    else:
        print("email found")
    for i in myresult:
        print("sending email to ", i[1])
        sender = "harithroo.2018531@iit.ac.lk"
        password = "Onepiece2018531"
        receiver = i[1]
        subject = "infraction"
        body = "speed infraction"

        # header
        message = f"""from: {sender}
        to: {receiver}
        subject: {subject}\n
        {body}
        """

        server = smtplib.SMTP("smtp.gmail.com", 587)
        server.starttls()

        try:
            server.login(sender,password)
            print("logged in to sender email...")
            server.sendmail(sender,receiver, message)
            print("email sent.")

        except smtplib.SMTPAuthenticationError:
            print("unable to sign in to sender email.")

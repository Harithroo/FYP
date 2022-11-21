import mysql.connector

mydb = mysql.connector.connect(host="localhost", user="root", passwd="", database="fyp" )

mycursor = mydb.cursor()
mycursor.execute("select * from owners")

for i in mycursor:
    print(i)
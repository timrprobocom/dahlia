import sys
import mysql.connector as mysql

# Fetch names and email addresses from the DB.

db = mysql.connect(host='db.timr.probo.com', user='timrprobocom', passwd='web7cal', db='dahlias')
cur = db.cursor()

cur.execute("SELECT name, email FROM users ORDER BY name;")
for row in cur.fetchall():
    print(f"{row[0]} <{row[1]}>")

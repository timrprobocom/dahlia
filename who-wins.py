import os
import sys
import mysql.connector as mysql

db = mysql.connect(host='db.timr.probo.com', user='timrprobocom', passwd='web7cal', db='dahlias')

cursor = db.cursor(dictionary=True)


cursor.execute("SELECT * FROM games ORDER BY id;")

# Produce the list of winners.
res = ''
for g in cursor.fetchall():
    if g['score1'] == 0:
        break
    elif g['score1'] >= g['score2']:
        res += '1'
    else:
        res += '2'

print(res)

def compare(key,user):
    win = sum( k == u for k,u in zip(key,user) if u != '-')
    loss = sum( k != u for k,u in zip(key,user) if u != '-')
    miss = sum( u=='-' for u in user[:len(key)])
    return (win,loss,miss)

data = []
cursor.execute("SELECT name, votes FROM users;")
for u in cursor.fetchall():
    data.append( compare(res, u['votes']) + (u['name'],) )

data.sort(reverse=True)
for row in data:
    print( "%-22s %3d-%3d" % (row[3],row[0],row[1]) )

import mysql.connector as mysql
import time
import datetime

start = datetime.datetime( 2022, 2, 4, 2, 0, 0 )
today = datetime.datetime.today()
delta = today - start
day = delta.days


db = mysql.connect(host='db.timr.probo.com', user='timrprobocom', passwd='web7cal', db='dahlias')
cur = db.cursor(dictionary=True)
regions = ["North","West","South","East"]

# Update all the scores so far.

cur.execute("SELECT * FROM games ORDER BY id;")
rows = list(cur)

updates = []
for i in range(day):
    if rows[i]['score1'] >= rows[i]['score2']:
        win = 'team1'
    else:
        win = 'team2'
    updates.append( (rows[i]['winnerto'], rows[i]['position'], rows[i][win]) )

for w,p,t in updates:
    posn = f"team{p}"
    if rows[w-1][posn] != t:
        cur.execute(f"UPDATE games SET {posn}={t} WHERE id={w-1}")


#! /usr/bin/python3

import mysql.connector as mysql
import time
import datetime

start = datetime.datetime( 2025, 4, 15, 6, 0, 0 )
today = datetime.datetime.today()
delta = today - start
day = delta.days


db = mysql.connect(host='db.timr.probo.com', user='timrprobocom', passwd='web7cal', db='dahlias')
cur = db.cursor(dictionary=True)
#regions = ["Northwest","Northeast","Southwest","Southeast"]

# Update all the scores so far.

sql = """\
SELECT g.*, d1.seed AS seed1, d2.seed AS seed2
FROM games g
  LEFT JOIN dahlias d1 ON g.team1=d1.oid
  LEFT JOIN dahlias d2 on g.team2=d2.oid
ORDER BY g.id;"""

cur.execute(sql)
rows = list(cur)

updates = []
for i in range(day):
    row = rows[i]
    if (row['score1'] > row['score2']) or \
       (row['score1'] == row['score2'] and row['seed1'] <= row['seed2']):
        win = 'team1'
    else:
        win = 'team2'
    updates.append( (row['winnerto'], row['position'], row[win]) )

for w,p,t in updates:
    if w == 32:
        continue
    posn = f"team{p}"
    if rows[w-1][posn] != t:
        print(f"UPDATE games SET {posn}={t} WHERE id={w};")
        cur.execute(f"UPDATE games SET {posn}={t} WHERE id={w};")
db.commit();


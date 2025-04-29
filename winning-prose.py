#! /usr/bin/python3
import os
import sys
import mysql.connector as mysql
from collections import Counter

db = mysql.connect(host='db.timr.probo.com', user='timrprobocom', passwd='web7cal', db='dahlias')

cursor = db.cursor(dictionary=True)

def import_prose(fn):
    writers = {}
    for line in open(fn):
        line = line.rstrip()
        if not line:
            continue
        if line[0] != ' ':
            name = line
        else:
            writers[line.strip()] = name
    return writers


cursor.execute(
    "SELECT g.id, d.name FROM dahlias d LEFT JOIN games g ON g.team1=d.oid WHERE g.score1 > g.score2 "
    "UNION "
    "SELECT g.id, d.name FROM dahlias d LEFT JOIN games g ON g.team2=d.oid WHERE g.score1 < g.score2 "
)

writers = import_prose('prose25.txt')
names = Counter()
for row in cursor.fetchall():
    w = writers[row['name']]
    print(row['id'], row['name'], w)
    names[w] += 1

print("\n\nWinners:")
for k,v in names.most_common():
    print(v, k)

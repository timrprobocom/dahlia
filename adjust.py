#! /usr/bin/python3
import os
import sys
import mysql.connector as mysql

db = mysql.connect(host='db.timr.probo.com', user='timrprobocom', passwd='web7cal', db='dahlias')

cursor = db.cursor(dictionary=True)

# Produce the list of winners.

cursor.execute("SELECT score1,score2 FROM games ORDER BY id;")
res = ''
for g in cursor.fetchall():
    if g['score1'] == 0:
        break
    elif g['score1'] >= g['score2']:
        res += '1'
    else:
        res += '2'

# Gather all the users.

cursor.execute("SELECT username, votes FROM users ORDER BY username;")

print("Valid users:")

votes = {}
for row in cursor.fetchall():
    votes[row['username']] = row['votes']
    print('   ', row['username'])

while True:
    name = input('\nSelect user: ')
    if not name:
        break
    if name not in votes:
        print("Not found.")
        continue

    v = votes[name][:31]

    for i in range(31):
        print(f"{i+1:3d}",end='')
    print()

    print(' ','  '.join(v))

    for i,r in enumerate(res):
        z = '*' if v[i] == res[i] else ' '
        print('  '+z,end='')
    print()

    while True:
        cmd = input("Command? ")
        if not cmd:
            break
        if '=' not in cmd:
            print("What??")
            continue
        a,b = cmd.split('=')
        a = int(a) - 1
        v1 = v[:a] + b + v[a+1:]
        print(f"{v}\n{v1}")
        votes[name] = v1
        sql = 'UPDATE users SET votes=%s WHERE username=%s;'
        cursor.execute( sql, (v1, name) )
        db.commit()
        break




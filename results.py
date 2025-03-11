#! /usr/bin/python3

import mysql.connector as mysql
from collections import defaultdict


db = mysql.connect(host='db.timr.probo.com', user='timrprobocom', passwd='web7cal', db='dahlias')
cur = db.cursor(dictionary=True)

# Fetch the game results so far.

winners = []
cur.execute("SELECT score1, score2 FROM games WHERE score1+score2 > 0 ORDER BY id;")
for row in cur:
    winners.append( 1 + (row['score1'] < row['score2']) )

results = {}
polls = defaultdict(list)
cur.execute("SELECT name, votes FROM users;" )
for row in cur:
    name = row['name']
    votes = row['votes']
    voted = 0
    correct = 0
    for i,w in enumerate(winners):
        if votes[i] == '-':
            continue
        voted += 1
        if votes[i] == str(w):
            correct += 1
    results[name] = (voted,correct)
    polls[voted].append(name)

#print(results)
counts = sorted(polls.keys(),reverse=True)

for k in counts:
    print(f"Those with {k} votes:")
    order = [(results[n][1], n) for n in polls[k]]

    order.sort(reverse=True)
    for cnt, name in order:
        print(f"   {cnt} of {k}: {name}")


    



import mysql.connector as mysql

db = mysql.connect(host='db.timr.probo.com', user='timrprobocom', passwd='web7cal', db='dahlias')
cur = db.cursor()
regions = ["Northwest","Southwest","Northeast","Southeast"]

cur.execute('SELECT oid FROM dahlias ORDER BY tgscore DESC;')

def seed():
    for x in range(8):
        for r in regions:
            yield r,x+1

seeder = seed()
todo = []
for row,(r,x) in zip(cur.fetchall(), seed()):
    todo.append( (r, x, row[0]) )

from pprint import pprint
pprint(todo)
cur.executemany("UPDATE dahlias SET division=%s,seed=%s WHERE oid=%s", todo)

db.commit()

cur.execute("""\
UPDATE games
   SET team1=(
       SELECT oid FROM dahlias d
       WHERE d.division = games.division AND d.seed=games.team1
       );
""")

cur.execute("""\
UPDATE games 
   SET team2=(
       SELECT oid FROM dahlias d
       WHERE d.division = games.division AND d.seed=games.team2
       );
""")

db.commit()

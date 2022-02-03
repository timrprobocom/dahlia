import sqlite3

db = sqlite3.connect('dahlias.db')
cur = db.cursor()
regions = ['Beaverton','Tigard','Gresham','Clackamas']

qry = cur.execute('SELECT oid FROM dahlias ORDER BY tgscore DESC;');

def seed():
    for x in range(8):
        for r in regions:
            yield r,x+1

seeder = seed()
todo = []
for row,(r,x) in zip(qry.fetchall(), seed()):
    todo.append( (r, x, row[0]) )

cur.executemany("UPDATE dahlias SET division=?,seed=? WHERE oid=?", todo)
db.commit()

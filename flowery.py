import mysql.connector as mysql

db = mysql.connect(host='db.timr.probo.com', user='timrprobocom', passwd='web7cal', db='dahlias')
cur = db.cursor()


cur.execute('SELECT oid,name FROM dahlias;')
lookup = {}
for row in cur.fetchall():
    lookup[row[1]] = row[0]

name = ''
oid = 0
accum = []
for line in open('DukeOut_prose_23.txt',encoding='cp1252'):
    line = line.strip()
    if line.startswith('***'):
        continue
    if not line:
        if accum:
            txt = ' '.join(accum)
            sql = "UPDATE dahlias SET prose=%s WHERE oid=%s;"
            print( oid, name, txt )
            cur.execute( sql, (txt, oid) )
        oid = 0
        name = ''
        accum = []
    elif not name:
        name = line
        if name not in lookup:
            print(f"{name} not found in lookup")
        oid = lookup[name]
    else:
        accum.append( line )

db.commit()


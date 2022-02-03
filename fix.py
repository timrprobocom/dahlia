import sqlite3

fnin = "ADS-New-Introductions-2022-v2.txt"

print("DROP TABLE dahlias;")

print("""\
 CREATE TABLE dahlias (
   name text, pedigree text,
   image text,
   originator text,
   distributor text,
   tgscore real,
   benchscore real,
   dudley boolean default 0,
   hart boolean default 0,
   gulliksen boolean default 0,
   division text,
   seed integer default 0
);
""")

base = {
    'name': '',
    'pedigree': '',
    'originator': '',
    'distributor': '',
    'tgscore': 0,
    'benchscore': 0,
    'dudley': 0,
    'hart': 0,
    'gulliksen': 0
}

print("""\
INSERT INTO dahlias (
   name, pedigree, image, originator, distributor,
   tgscore, benchscore, dudley, hart, gulliksen ) VALUES""")

sql = """\
    ('{name}','{pedigree}','{image}','{originator}','{distributor}',
    {tgscore},{benchscore},{dudley},{hart},{gulliksen}),"""

page = 0
info = base.copy()
for line in open(fnin):
    if line[0] == '\x0c':
        info['image'] = f"dahl-{page:04d}.png"
        print(sql.format(**info))
        info = base.copy()
        page += 1
        continue
    line = line.strip()
    if not line:
        continue
    elif not info['name']:
        info['name'] = line.replace("'","''")
    elif not info['pedigree']:
        info['pedigree'] = line
    elif line.startswith('Originator'):
        info['originator'] = line.split(': ')[1]
    elif line.startswith('Distributor:'):
        info['distributor'] = line.split(': ')[1].replace("'","''")
    elif line.startswith('Trial Garden'):
        info['tgscore'] = float(line.split()[-1])
    elif line.startswith('Bench Score'):
        info['benchscore'] = float(line.split()[-1])
    elif line.startswith('Lynn B'):
        info['dudley'] = 1
    elif line.startswith('Derrill'):
        info['hart'] = 1
    elif line.startswith('Evie'):
        info['gulliksen'] = 1
info['image'] = f"dahl-{page:04d}.png"
print(sql.format(**info))

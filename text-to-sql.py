#! /usr/bin/env python3

fnin = f"Dahlias2025.txt"

print("DROP TABLE IF EXISTS dahlias;")

print("""\
 CREATE TABLE dahlias (
   oid integer primary key not null auto_increment,
   name text, 
   pedigree text,
   image text,
   originator text,
   distributor text,
   tgscore real,
   benchscore real,
   dudley boolean default 0,
   hart boolean default 0,
   gulliksen boolean default 0,
   division text,
   seed integer default 0,
   prose text COLLATE utf8mb4_general_ci
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

sql = """('{name}','{pedigree}','{image}','{originator}','{distributor}', {tgscore},{benchscore},{dudley},{hart},{gulliksen})"""

# The first flower image is #3.  We expect to read the output of get-text.py,
# post-processed for consistency.

prefix = ""
info = base.copy()
for line in open(fnin):
    line = line.strip()
    if not line:
        continue

    # Start a new page by committing the last one.

    if line.startswith('Page '):
        if info['name']:
            info['image'] = f"dahl-{page:03d}.png"
            if page > 3:
                print(",",end='')
            print(sql.format(**info))
            info = base.copy()
        page = int(line[5:-1])
        continue
    if page < 3:
        continue

    # Handle strings split between lines.
    if line[-1] == ':':
        prefix = line
        continue
    if prefix:
        line = f"{prefix} {line}"
        prefix = ''

    if not info['name']:
        info['name'] = line.replace("'","''")
    elif not info['pedigree']:
        info['pedigree'] = line
    elif line.startswith('Originator'):
        info['originator'] = line.split(': ')[1]
    elif line.startswith('Distributor:'):
        info['distributor'] = line.split(': ')[1].replace("'","''")
    elif line.startswith('Trial Garden'):
        info['tgscore'] = float(line.split()[-1])
    elif line.find('Bench Score') >= 0:
        info['benchscore'] = float(line.split()[-1])
    elif line.find('Dudley') >= 0:
        info['dudley'] = 1
    elif line.find('Derrill') >= 0 or line.find('Darrill') >= 0:
        info['hart'] = 1
    elif line.find('Gullikson') >= 0 or line.find('Gulliksen') >= 0:
        info['gulliksen'] = 1
#info['image'] = f"dahl-{page:03d}.png"
#print(sql.format(**info))

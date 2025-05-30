DROP TABLE dahlias;

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
  `prose` text COLLATE utf8mb4_general_ci
);

INSERT INTO dahlias (
   name, pedigree, image, originator, distributor,
   tgscore, benchscore, dudley, hart, gulliksen ) VALUES
    ('Hollyhill Peachy Keen','BB-IC-LB DPk/Y 3410','dahl-0000.png','Ted & Margaret Kennedy','Hollyhill Dahlias',
    88.54,89.03,1,1,0),
    ('20th Ave Old Major','Ball-Lv 6008','dahl-0001.png','Rich Gibson','Crazy4Dahlias',
    87.39,88.36,1,1,0),
    ('Felida Splendor','A-LC-DkR 1507','dahl-0002.png','Eric Toedtli','Cowlitz River Dahlias',
    88.56,85.333,0,1,0),
    ('KA''s Papa John','A-ID-W 1101','dahl-0003.png','Kristine Albrecht','Stonehouse Dahlias',
    88.94,0,0,1,0),
    ('Maks Marcus','A-SC-Orange 1203','dahl-0004.png','Allan Kaas','Lobaugh''s Dahlias',
    87.75,86.98,1,0,0),
    ('Allen''s Bramble','B-LC-DkR 2507','dahl-0005.png','Allen Manuel','Cowlitz River Dahlias',
    86.95,87.75,0,1,0),
    ('Lakeview Kaboom','B-LC-Pk 2504','dahl-0006.png','Bernie Wilson','Clearview Dahlias Bench',
    0,0,1,0,0),
    ('20th Ave Pure Prince','M-FD-Lv 4008','dahl-0007.png','Rich Gibson','Crazy4Dahlias',
    88.3,88.37,1,0,0),
    ('Skipley Swan Song','M-FD-W 4001','dahl-0008.png','Richard Williams','',
    87.783,87.017,0,1,0),
    ('Clearview Cinnabar','ST-DkPk 7005','dahl-0009.png','Richard Parshall','Clearview Dahlias',
    87.353,0,0,1,0),
    ('Sandia Gold','WL-Y 7302','dahl-0010.png','Steve & Sandy Boley','Birch Bay Dahlias',
    87.027,0,0,1,0),
    ('Kelsey Tinker','MCO-Y 9102','dahl-0011.png','Colin Walker','Lobaugh''s Dahlias',
    87.67,87.88,0,0,1),
    ('Sungate''s Clementine','Mignon Single-DkR 9707','dahl-0012.png','Eric Anderson','',
    86.54,87.72,0,0,1),
    ('Allen''s Red Alert','B-SC-R 2206','dahl-0013.png','Allen Manuel','Cowlitz River Dahlias',
    86.34,85.417,0,0,0),
    ('Allen''s Battle Angel','B-SC-LB Y/Br 2510','dahl-0014.png','Allen Manuel','Cowlitz River Dahlias',
    85.98,85.861,0,0,0),
    ('Narrow''s Mom','BB-SC-Lv 3208','dahl-0015.png','Ken & Marilyn Walton','',
    85.06,88.284,0,0,0),
    ('Maks Ryan','BB-IC-Or 3403','dahl-0016.png','Allan Kaas','Lobaugh''s Dahlias',
    85.43,86.8667,0,0,0),
    ('Crazy 4 Sophie','BB-LC-DkPk 3505','dahl-0017.png','John Spangenberg','Crazy4Dahlias Bench',
    0,0,0,0,0),
    ('Redwood Honeybee','BB-IC-LB Y/DkPk 3410','dahl-0018.png','Brad & Rosemary Freeman','Lobaugh''s Dahlias Bench',
    0,0,0,0,0),
    ('20th Ave Tradition','MB-W 6101','dahl-0019.png','Rich Gibson','Crazy4Dahlias',
    87.344,87.223,0,0,0),
    ('20th Ave Memory','BA-Pk 6004','dahl-0020.png','Rich Gibson','Crazy4Dahlias',
    86.515,86.542,0,0,0),
    ('20th Ave Rayna','BB-FD-Pr 3009','dahl-0021.png','Rich Gibson','Crazy4Dahlias',
    88.3,0,0,0,0),
    ('Allen''s Cabin Fever','B-SC-Or 2203','dahl-0022.png','Allen Manuel','Cowlitz River Dahlias',
    87.27,87.083,0,0,0),
    ('Allen''s Foxy Lady','M-FD-Lv 4008','dahl-0023.png','Allen Manuel','Cowlitz River Dahlias',
    86.0,0,0,0,0),
    ('Allen''s Shockwave','BB-IC-DB O/Y 3413','dahl-0024.png','Allen Manuel','Cowlitz River Dahlias',
    85.75,85.96,0,0,0),
    ('Alysia Obina','B-FD-LB Lv/W 2010','dahl-0025.png','Walt Jacenko','',
    87.07,0,0,0,0),
    ('Anne Maria','B-SC-DB Pr/W 2213','dahl-0026.png','Walt Jacenko','',
    86.75,0,0,0,0),
    ('Barbarry Alana','M-FD-Y 4002','dahl-0027.png','Barry Davies','',
    88.29,0,0,0,0),
    ('Bedazzled','B-SC-V Lv/DPk 2214','dahl-0028.png','Nicholas Gitts','Swan Island Dahlias',
    85.81,0,0,0,0),
    ('Bloomquist Honorable','O-Pr 9209','dahl-0029.png','Paul & Barb Bloomquist','Triple Wren Farms',
    86.11,0,0,0,0),
    ('Bloomquist Morris','An-L 8208','dahl-0030.png','Paul & Barb Bloomquist','Triple Wren Farms',
    86.6,0,0,0,0),
    ('Bloomquist Plum','BB-FD-Pr 3009','dahl-0031.png','Paul & Barb Bloomquist','Triple Wren Farms',
    87.08,0,0,0,0),
    ('Caedmon','BB-SC-FL 3212','dahl-0032.png','Walt Jacenko','',
    85.9,0,0,0,0),
    ('Carmen Beatriz','BB-SC-W 3201','dahl-0033.png','John Sullivan','',
    87.71,0,0,0,0),
    ('Carmen Fara','B-SC-DkPk 2205','dahl-0034.png','John Sullivan','',
    86.25,85.33,0,0,0),
    ('CHi Flamingo','WL-DkPk 7305','dahl-0035.png','Paul McKittrick','',
    85.93,86.98,0,0,0),
    ('CHi Walker','M-FD-DkR 4007','dahl-0036.png','Paul McKittrick','',
    89.5,0,0,0,0),
    ('Clearview Emma','M-FD-Or 4003','dahl-0037.png','Richard Parshall','Clearview Dahlias',
    87.515,87.15,0,0,0),
    ('Clearview Frannie','BB-SC-DkPk 3205','dahl-0038.png','Richard Parshall','Clearview Dahlias',
    86.856,89.95,0,0,0),
    ('Clearview Whitney','B-SC-Pk 2204','dahl-0039.png','Richard Parshall','Clearview Dahlias',
    87.0,86.833,0,0,0),
    ('Connie Grace','BB-SC-Y 3202','dahl-0040.png','Connie Young Davis','',
    89.0,86.183,0,0,0),
    ('Crazy 4 Gina','BB-FD-Y 3002','dahl-0041.png','John Spangenberg','Crazy4Dahlias',
    0,87.5,0,0,0),
    ('Destiny''s Joy','MB-DkPk 6105','dahl-0042.png','Wayne Lobaugh','Lobaugh''s Dahlias Bench',
    0,0,0,0,0),
    ('Echo Kelsy','CO-DkR 9007','dahl-0043.png','Lorne McArthur','',
    85.0,0,0,0,0),
    ('Echo Lucky','BB-FD-Pr 3009','dahl-0044.png','Lorne McArthur','',
    91.0,0,0,0,0),
    ('Eire Daniel','M-FD-DkR 4007','dahl-0045.png','Michael Burns','Crazy4Dahlias',
    87.6,0,0,0,0),
    ('Eire Patricia','M-FD-DkR 4007','dahl-0046.png','Michael Burns','Crazy4Dahlias',
    87.638,0,0,0,0),
    ('Felida Mardi Gras','O-Pr 9209','dahl-0047.png','Eric Toedtli','Cowlitz River Dahlias',
    86.97,85.667,0,0,0),
    ('Garden Club Of Dayton','A-SC-Or 1203','dahl-0048.png','Tony Evangelista','Garden Club Of Dayton',
    85.603,88.0,0,0,0),
    ('Glencoe Dandy','M-C-DB Pr/W 4313','dahl-0049.png','Art & Julie Chmura','',
    85.63,0,0,0,0),
    ('Glencoe Parfait','M-FD-Lv 4008','dahl-0050.png','Art & Julie Chmura','',
    86.83,0,0,0,0),
    ('Hollyhill Maisie (My-zee)','M-C-LB Or/Y 4310','dahl-0051.png','Ted & Margaret Kennedy','Hollyhill Dahlias',
    86.43,0,0,0,0),
    ('Hollyhill Maleficent','BB-SC-DkR 3207','dahl-0052.png','Ted & Margaret Kennedy','Hollyhill Dahlias Bench',
    0,0,0,0,0),
    ('Hollyhill PDX Sunset','BB-SC-FL 2212','dahl-0053.png','Ted & Margaret Kennedy','Hollyhill Dahlias',
    85.5,86.5,0,0,0),
    ('Irish JD','MB-W 6101','dahl-0054.png','Steve & Sandy Boley','',
    85.6,0,0,0,0),
    ('Jody Meggos','BB-SC-DB Pr/W 3213','dahl-0055.png','Steve Meggos','',
    87.65,0,0,0,0),
    ('KA''s Bo Peep','M-C-DkPk 4305','dahl-0056.png','Kristine Albrecht','Stonehouse Dahlias',
    87.06,0,0,0,0),
    ('Lakeview','Hazy','dahl-0057.png','Bernie Wilson','Clearview Dahlias',
    0,87.475,0,0,0),
    ('Lakeview Razzal','BB-LC-FL 3512','dahl-0058.png','Bernie Wilson','Clearview Dahlias',
    0,87.925,0,0,0),
    ('Liz Evangelista','AA-SC-LB Pk/Y 0210','dahl-0059.png','Tony Evangelista','Cowlitz River Dahlias',
    85.745,0,0,0,0),
    ('Mae Evangelista','AA-SC-FL 0212','dahl-0060.png','Tony Evangelista','Cowlitz River Dahlias',
    87.45,0,0,0,0),
    ('Maks Volcano','B-IC-Or 2403','dahl-0061.png','Allan Kaas','Lobaugh''s Dahlias',
    89.08,86.675,0,0,0),
    ('Mira Cali White','B-SC-W 2201','dahl-0062.png','Tony Evangelista','Cowlitz River Dahlias',
    86.5,0,0,0,0),
    ('Nana''s Wyatt','BB-LC-DkPr 3505','dahl-0063.png','M. Powers','',
    86.5,0,0,0,0),
    ('Narrow''s Stew P','A-ID-DkR 1107','dahl-0064.png','Ken & Marilyn Walton','',
    89.42,88.0,0,0,0),
    ('Nighty Night','M-FD-DkR 4007','dahl-0065.png','Nicholas Gitts','Swan Island Dahlias',
    87.25,0,0,0,0),
    ('Oh Honey!','BA-Or 6003','dahl-0066.png','Nicholas Gitts','Swan Island Dahlias',
    85.695,0,0,0,0),
    ('Oldec Cleopatra','BB-FD-LB Lv/Y 3010','dahl-0067.png','J. Gawthrop','',
    87.75,0,0,0,0),
    ('Oldec Combustion','O-R R/Y 9206','dahl-0068.png','J. Gawthrop','',
    86.2,0,0,0,0),
    ('Queen Lili','BB-SC-DkR 3207','dahl-0069.png','Roger Quenneville','Productions Saint-Anicet',
    87.6,0,0,0,0),
    ('Queen Sarah','BB-FD-R 3006','dahl-0070.png','Roger Quenneville','Productions Saint-Anicet',
    86.1,0,0,0,0),
    ('Raeanne''s Wild One','S-Pr 9609','dahl-0071.png','Wayne Lobaugh','Lobaugh''s Dahlias Bench',
    0,0,0,0,0),
    ('River''s Bubble Gum','St-DkPk 7005','dahl-0072.png','Eugene Kenyon','River''s Dahlias',
    86.5,0,0,0,0),
    ('River''s Neon Jack','BB-C-R 3306','dahl-0073.png','Eugene Kenyon','River''s Dahlias',
    88.32,0,0,0,0),
    ('River''s Splash','BB-SC-V DKPk/DkR 3314','dahl-0074.png','Eugene Kenyon','River''s Dahlias',
    85.17,0,0,0,0),
    ('River''s Yellow Snow','BA-BI 6015','dahl-0075.png','Eugene Kenyon','River''s Dahlias',
    88.43,0,0,0,0),
    ('Sandia Stargazer','A-SC-LB 1210','dahl-0076.png','Steve & Sandy Boley','Birch Bay Dahlias',
    85.96,0,0,0,0),
    ('Sandia Summertime','AN-W 8201','dahl-0077.png','Steve & Sandy Boley','Birch Bay Dahlias',
    86.963,0,0,0,0),
    ('SB''s Ora','BA-Y 6002','dahl-0078.png','Steve & Sandy Boley','Birch Bay Dahlias',
    87.21,0,0,0,0),
    ('Skipley Prelude','B-SC-Pk 2204','dahl-0079.png','Richard Williams','',
    87.0,0,0,0,0),
    ('Sungate''s Star','O-W 9201','dahl-0080.png','Eric Anderson','',
    86.96,88.0,0,0,0),
    ('Sungate''s Sunshine','S-Or 9603','dahl-0081.png','Eric Anderson','',
    85.6,86.667,0,0,0),
    ('Twizzle','NX-R 7606','dahl-0082.png','Reg & Marlene Powys-Lybbe','',
    0,91.0,0,0,0),
    ('Windhaven Mac','BB-LC-LB Y/Or 3510','dahl-0083.png','Bob Romano','Crazy4Dahlias',
    0,86.792,0,0,0),
    ('Windhaven Vignole','A-SC-Y 1202','dahl-0084.png','Bob Romano','Crazy4Dahlias',
    0,0,0,0,0);

DROP TABLE games;

CREATE TABLE games (
  id INTEGER PRIMARY KEY NOT NULL,
  division TEXT,
  team1 INTEGER,
  team2 INTEGER,
  winnerto INTEGER DEFAULT 0,
  position INTEGER DEFAULT 0,
  score1 INTEGER DEFAULT 0,
  score2 INTEGER DEFAULT 0
);

INSERT INTO games (id, division, team1, team2, winnerto, position) VALUES
    ( 1, "Northwest", 4, 5, 17, 1),
    ( 2, "Southwest", 4, 5, 18, 1),
    ( 3, "Northeast", 4, 5, 19, 1),
    ( 4, "Southeast", 4, 5, 20, 1),
    ( 5, "Northwest", 3, 6, 17, 2),
    ( 6, "Southwest", 3, 6, 18, 2),
    ( 7, "Northeast", 3, 6, 19, 2),
    ( 8, "Southeast", 3, 6, 20, 2),
    ( 9, "Northwest", 2, 7, 21, 1),
    (10, "Southwest", 2, 7, 22, 1),
    (11, "Northeast", 2, 7, 23, 1),
    (12, "Southeast", 2, 7, 24, 1),
    (13, "Northwest", 1, 8, 21, 2),
    (14, "Southwest", 1, 8, 22, 2),
    (15, "Northeast", 1, 8, 23, 2),
    (16, "Southeast", 1, 8, 24, 2);
INSERT INTO games (id, division, winnerto, position) VALUES
    (17, "Northwest", 25, 1),
    (18, "Southwest", 26, 1),
    (19, "Northeast", 27, 1),
    (20, "Southeast", 28, 1),
    (21, "Northwest", 25, 2),
    (22, "Southwest", 26, 2),
    (23, "Northeast", 27, 2),
    (24, "Southeast", 28, 2),

    (25, "Northwest", 29, 1),
    (26, "Southwest", 30, 1),
    (27, "Northeast", 29, 2),
    (28, "Southeast", 30, 2),

    (29, "North",  31, 1),
    (30, "South",  31, 2),

    (31, "Final", 32, 1);

DROP TABLE users;

CREATE TABLE users (
   username varchar(40),
   name text,
   email text,
   votes char(32) default '-------------------------------'
);

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
   prose text COLLATE utf8mb4_general_ci
);

INSERT INTO dahlias (
   image, name, pedigree, originator, 
   tgscore, benchscore, dudley, hart, gulliksen ) VALUES

('dahl-003.png','Clearview Ginger','M-C-DkPk 4305','Richard Parshall',87.55,88.306,1,0,0),
('dahl-004.png','20th Ave for Mom','MB-DkPk 6105','Rich Gibson',0,88.25,1,0,0),
('dahl-005.png','Lo-Peach','MS-DB 9713','Wayne Lobaugh',0,87.95,0,0,1),
('dahl-006.png','Narrows Lily','BB-SC-DkPk 3205','Ken and Marilyn Walton',87.07,86.39,1,0,0),
('dahl-007.png','Allen''s Cascadia','B-LC-W 2501','Allen Manuel',87.37,86.44,0,1,0),
('dahl-008.png','LLW Sunrise','BB-SC-LB Y/Pk 3210','Lisa Walny',87.53,0,0,1,0),
('dahl-009.png','Skipley Road Sherry','M-FD-R 4006','Richard Williams',88.45,87.72,0,1,0),
('dahl-010.png','Irish Moon','MB-Y 6102','Steve and Sandy Boley',88.35,0,0,1,0),
('dahl-011.png','Sandia Ruthie','ST-DkPk 7005','Steve and Sandy Boley',88.38,0,0,1,0),
('dahl-012.png','SB''s Star','O-DkR 9207','Steve and Sandy Boley',88.02,0,0,1,0),
('dahl-013.png','Jackie''s Limoncello','BB-IC-Y 3402','Tony Evangelista',86.92,0,0,0,0),
('dahl-014.png','Wild Side Sven','MPE-DkR 8107','Dina Wild',87.3,87.3,0,0,0),
('dahl-015.png','Lo-Orange','MS-O 9703','Wayne Lobaugh',0,86.61,0,0,0),
('dahl-016.png','Lo-Grape','MS-Pr 9709','Wayne Lobaugh',0,86.03,0,0,0),
('dahl-017.png','Clearview AM','B-ID-Pk 2104','Richard Parshall',85.9,0,0,0,0),
('dahl-018.png','Clearview Peggy','B-SC-W 2201','Richard Parshall',85.13,0,0,0,0),
('dahl-019.png','GG''s Alex G','B-IC-Or 2403','G Gitts',85.21,0,0,0,0),
('dahl-020.png','Allen’s Candyland','BB-IC-LB Y/DkPk 3410','Allen Manuel',87.21,86.92,0,0,0),
('dahl-021.png','Allen’s Sorbet','BB-SC-Or 3203','Allen Manuel',87.71,86.19,0,0,0),
('dahl-022.png','Bloomquist Vigor','BB-FD-LB Pk/Y 3010','Paul Bloomquist',85.73,0,0,0,0),
('dahl-023.png','Connie Trishonnie','BB-SC-LB Pk/Y 3210','Connie Young-Davis',87.74,0,0,0,0),
('dahl-024.png','Craig Monique','BB-FD-LB Y/DkPk 3010','Charles Craig',85.4,0,0,0,0),
('dahl-025.png','Felida Spirit','BB-SC-R 3206','Eric Toedtli',85.7,87.53,0,0,0),
('dahl-026.png','Gemini','BB-FD-LB 3009','Nicholas Gitts',86.53,0,0,0,0),
('dahl-027.png','Glencoe Lemonade','BB-LC-Y 3502','Art and Julie Chmura',85.29,0,0,0,0),
('dahl-028.png','Sungate’s Malva','BB-IC-DkPk 3405','Eric Anderson',85.73,87.83,0,0,0),
('dahl-029.png','Sungate’s Benny','BB-C-Y 3302','Eric Anderson',86.75,85.83,0,0,0),
('dahl-030.png','Tuscany','BB-FD-LB Y/Pk 3010','Nicholas Gitts',87.5,0,0,0,0),
('dahl-031.png','WP Sunday Drive','BB-SC-Y 3202','K. Walker',86.07,0,0,0,0 ),
('dahl-032.png','Baron Chloe','M-FD-W 4001','Ron Miner',86.24,88.0,0,0,0),
('dahl-033.png','Bloomquist Constant','M-FD-DkPk 4005','Paul Bloomquist',85.38,0,0,0,0),
('dahl-034.png','Saddlerock Tiny Giant','M-FD-Pr 4009','Linda DeRooy Holmes-Cook',86.88,89.0,0,0,0),
('dahl-035.png','Sungate’s Leone','M-FD-Y 4002','Eric Anderson',85.33,85.58,0,0,0),
('dahl-036.png','Bee Hive','MB-Br 6111','Nicholas Gitts',85.84,0,0,0,0),
('dahl-037.png','Irish Erin','BA-W 6001','Steve & Sandy Boley',88.22,0,0,0,0),
('dahl-038.png','River’s Can’t Elope','ST-O 7003','Eugene Kenyon',87.0,0,0,0,0),
('dahl-039.png','River’s Snow Cone','ST-W 7001','Eugene Kenyon',87.51,0,0,0,0),
('dahl-040.png','Hollyhill Honeygold','WL-O 7303','Ted and Margaret Kennedy',86.45,0,0,0,0),
('dahl-041.png','Baron Mi Paige','MS-LV 9108','Ron Miner',85.76,0,0,0,0),
('dahl-042.png','Sonsy Rose','OT-LB 9409','Larry Bagge',85.25,0,0,0,0),
('dahl-043.png','Allen’s Klondike','A-ID-Y 1102','Allen Manuel',0,88.0,0,0,0),
('dahl-044.png','Allen’s Bella','A-ID-Pr 1109','Allen Manuel',0,85.74,0,0,0),
('dahl-045.png','Allen’s Showcase','B-SC-DB 2213','Allen Manuel',0,86.65,0,0,0),
('dahl-046.png','Windhaven Cracker','B-IC-R 2406','Bob and Judy Romano',0,87.17,0,0,0),
('dahl-047.png','Bull’s Blood','B-IC-DkR 2407','Walt Jacenko',0,87.33,0,0,0),
('dahl-048.png','RaeAnn’s Tiger’s Eye','S-DB R/O 9613','Wayne Lobaugh',0,88.88,0,0,0);


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

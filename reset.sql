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
   votes char(32) default '--------------------------------'
);

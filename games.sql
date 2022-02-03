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
    ( 1, "Beaverton", 4, 5, 17, 1),
    ( 2, "Tigard",    4, 5, 18, 1),
    ( 3, "Clackamas", 4, 5, 19, 1),
    ( 4, "Gresham",   4, 5, 20, 1),
    ( 5, "Beaverton", 3, 6, 17, 2),
    ( 6, "Tigard",    3, 6, 18, 2),
    ( 7, "Clackamas", 3, 6, 19, 2),
    ( 8, "Gresham",   3, 6, 20, 2),
    ( 9, "Beaverton", 2, 7, 21, 1),
    (10, "Tigard",    2, 7, 22, 1),
    (11, "Clackamas", 2, 7, 23, 1),
    (12, "Gresham",   2, 7, 24, 1),
    (13, "Beaverton", 1, 8, 21, 2),
    (14, "Tigard",    1, 8, 22, 2),
    (15, "Clackamas", 1, 8, 23, 2),
    (16, "Gresham",   1, 8, 24, 2);
INSERT INTO games (id, division, winnerto, position) VALUES
    (17, "Beaverton", 25, 1),
    (18, "Tigard",    26, 1),
    (19, "Clackamas", 27, 1),
    (20, "Gresham",   28, 1),
    (21, "Beaverton", 25, 2),
    (22, "Tigard",    26, 2),
    (23, "Clackamas", 27, 2),
    (24, "Gresham",   28, 2),

    (25, "Beaverton", 29, 1),
    (26, "Tigard",    30, 1),
    (27, "Clackamas", 29, 2),
    (28, "Gresham",   30, 2),

    (29, "West",      31, 1),
    (30, "East",      31, 2),

    (31, "Final",     32, 1);

UPDATE games
   SET team1=(
       SELECT oid FROM dahlias d
       WHERE d.division = games.division AND d.seed=games.team1
       );

UPDATE games 
   SET team2=(
       SELECT oid FROM dahlias d
       WHERE d.division = games.division AND d.seed=games.team2
       );


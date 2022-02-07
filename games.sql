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
    ( 1, "North", 4, 5, 17, 1),
    ( 2, "West",  4, 5, 18, 1),
    ( 3, "South", 4, 5, 19, 1),
    ( 4, "East",  4, 5, 20, 1),
    ( 5, "North", 3, 6, 17, 2),
    ( 6, "West",  3, 6, 18, 2),
    ( 7, "South", 3, 6, 19, 2),
    ( 8, "East",  3, 6, 20, 2),
    ( 9, "North", 2, 7, 21, 1),
    (10, "West",  2, 7, 22, 1),
    (11, "South", 2, 7, 23, 1),
    (12, "East",  2, 7, 24, 1),
    (13, "North", 1, 8, 21, 2),
    (14, "West",  1, 8, 22, 2),
    (15, "South", 1, 8, 23, 2),
    (16, "East",  1, 8, 24, 2);
INSERT INTO games (id, division, winnerto, position) VALUES
    (17, "North", 25, 1),
    (18, "West",  26, 1),
    (19, "South", 27, 1),
    (20, "East",  28, 1),
    (21, "North", 25, 2),
    (22, "West",  26, 2),
    (23, "South", 27, 2),
    (24, "East",  28, 2),

    (25, "North", 29, 1),
    (26, "West",  30, 1),
    (27, "South", 29, 2),
    (28, "East",  30, 2),

    (29, "West",  31, 1),
    (30, "East",  31, 2),

    (31, "Final", 32, 1);

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


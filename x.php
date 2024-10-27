-- Suggested testing environment:
-- https://www.db-fiddle.com/ with MySQL version set to 8

-- Example case create statement:
CREATE TABLE students (
    id INTEGER PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    score INTEGER NOT NULL,
    class INTEGER NOT NULL    
);

INSERT INTO students(id, name, score, class) VALUES(1, 'Mark', 894, 7);
INSERT INTO students(id, name, score, class) VALUES(2, 'Bill', 894, 7);
INSERT INTO students(id, name, score, class) VALUES(3, 'Maria', 678, 8);
INSERT INTO students(id, name, score, class) VALUES(4, 'David', 733, 9);
INSERT INTO students(id, name, score, class) VALUES(5, 'John', 899, 9);
INSERT INTO students(id, name, score, class) VALUES(6, 'Rob', 802, 9);

-- Expected output (rows in any order):
-- name    score    class
-- -------------------------
-- Mark    894      7       
-- Bill    894      7             
-- Maria   678      8
-- John    899      9
SELECT s.name, s.score, s.class
FROM students s
JOIN (
    SELECT class, MAX(score) AS max_score
    FROM students
    GROUP BY class
) AS max_scores ON s.class = max_scores.class AND s.score = max_scores.max_score;

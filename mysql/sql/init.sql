DROP SCHEMA IF EXISTS posse;
CREATE SCHEMA posse;
USE posse;

DROP TABLE IF EXISTS carriculum;
CREATE TABLE carriculum (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  contents VARCHAR(255) NOT NULL,
  time INT,
  study_date date NOT NULL 
);

INSERT INTO carriculum 
  (id, contents, name, time, study_date)
  VALUES
  (3, 'POSSE課題', 'php', 10, '2022-10-03'),
  (4, 'POSSE課題', 'HTML', 10, '2022-10-04'),
  (5, 'POSSE課題', 'php', 10, '2022-10-05 '),
  (6, 'POSSE課題', 'HTML', 10, '2022-10-06'),
  (1, 'ドットインストール', 'Javascript', 5, '2022-10-29'),
  (2, 'ドットインストール', 'php', 5, '2022-10-29'),
  (7, 'POSSE課題', 'php', 10, '2022-11-07'),
  (8, 'POSSE課題', 'Javascript', 10, '2022-11-08'),
  (9, 'POSSE課題', 'HTML', 10, '2022-11-09'),
  (10, 'POSSE課題', 'php', 10, '2022-11-10'),
  (11, 'POSSE課題', 'php', 10, '2022-11-11'),
  (12, 'POSSE課題', 'php', 10, '2022-11-12'),
  (13, 'POSSE課題', 'php', 10, '2022-11-13'),
  (14, 'POSSE課題', 'CSS', 10, '2022-11-14'),
  (15, 'POSSE課題', 'php', 10, '2022-11-15'),
  (16, 'POSSE課題', 'php', 10, '2022-11-03')


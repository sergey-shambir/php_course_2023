CREATE USER 'php-course-app'@'%' IDENTIFIED BY 'gX5t2UUbBn';

CREATE DATABASE php_course;
GRANT ALL ON php_course.* TO 'php-course-app'@'%';

USE php_course;

CREATE TABLE post
(
  id INT UNSIGNED AUTO_INCREMENT,
  title VARCHAR(200),
  subtitle VARCHAR(200),
  illustration_path VARCHAR(500),
  content MEDIUMTEXT,
  posted_at DATETIME NOT NULL
    DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
);

INSERT INTO post (title, subtitle, content)
VALUES ('Первая статья', 'С подзаголовком', 'И даже содержание есть'),
       ('Вторая статья', '', 'Тоже с содержанием')
;

SELECT *
FROM post;

SELECT
  id,
  title,
  subtitle,
  content,
  posted_at
FROM post;


SELECT
  id,
  title,
  subtitle,
  content,
  posted_at
FROM post WHERE title = 'Первая статья';


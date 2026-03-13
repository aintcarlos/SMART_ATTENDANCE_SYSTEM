CREATE DATABASE attendance_system;

USE attendance_system;

-- USERS TABLE
CREATE TABLE users(
id INT AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(50),
password VARCHAR(50)
);

INSERT INTO users(username,password)
VALUES('admin','12345');


-- STUDENTS TABLE
CREATE TABLE students(
id INT AUTO_INCREMENT PRIMARY KEY,
student_id VARCHAR(20),
first_name VARCHAR(50),
last_name VARCHAR(50),
course VARCHAR(50)
);

INSERT INTO students(student_id,first_name,last_name,course)
VALUES
('2024-001','Sargie','Bongar','BSIT'),
('2024-002','Caballero','Jhan Israel','BSIT'),
('2024-003','De lara','Vincent','BSIT');
('2024-003','De leon','Maureen','BSIT');
('2024-003','Dela Cruz','Mark','BSIT');
('2024-003','Dumawal','Anghelo','BSIT');
('2024-003','Gamit','Leandro','BSIT');



-- ATTENDANCE TABLE
CREATE TABLE attendance(
id INT AUTO_INCREMENT PRIMARY KEY,
student_id VARCHAR(20),
status VARCHAR(10),
date DATETIME
);
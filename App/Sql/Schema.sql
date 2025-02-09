--install the postgre and run this commands in the query in the postgree shell
CREATE DATABASE FreelanceEdgeDB;
-- List all databases to check if it was created successfully: \l
-- use database: \c FreelanceEdgeDB;
-- create table test in the database:
CREATE TABLE test (
   id SERIAL PRIMARY KEY,
   name VARCHAR(100) NOT NULL,
   age INT CHECK (age >= 0),
   created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
-- Check if the table was created successfully: \d test
-- To test your table, insert some data:
INSERT INTO test (name, age) VALUES ('Alice', 25), ('Bob', 30);
-- Retrieve all rows from the table:
SELECT * FROM test;
-- create table users
CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    age INT CHECK (age >= 0),
    email VARCHAR(255) UNIQUE NOT NULL,
    photo TEXT,
    bio TEXT,
    competences TEXT,
    portfolio TEXT,
    taux_horaire DECIMAL(10,2) CHECK (taux_horaire >= 0),
    password TEXT NOT NULL
);

-- fake data
INSERT INTO users (first_name, last_name, age, email, photo, bio, competences, portfolio, taux_horaire, password)
VALUES ('Ali', 'Bennani', 25, 'ali.bennani@example.com', 'https://example.com/photos/ali.jpg',
        'Passionate full-stack developer with experience in Laravel and React.',
        '["PHP", "Laravel", "React", "Docker"]',
        '["https://github.com/alibennani", "https://ali-portfolio.com"]',
        30.50,
        '$2y$10$ABCDEFGHIJKLMNOPQRSTU1234567890'), -- Hashed password

       ('Fatima', 'El Fassi', 28, 'fatima.elfassi@example.com', 'https://example.com/photos/fatima.jpg',
        'Software engineer specialized in AI and data science.',
        '["Python", "Machine Learning", "PostgreSQL"]',
        '["https://fatima-portfolio.com"]',
        45.00,
        '$2y$10$ABCDEFGHIJKLMNOPQRSTU1234567890'),

       ('Youssef', 'Kabbaj', 32, 'youssef.kabbaj@example.com', 'https://example.com/photos/youssef.jpg',
        'Freelance mobile app developer with expertise in Flutter.',
        '["Dart", "Flutter", "Firebase"]',
        '["https://github.com/youssefkabbaj", "https://youssef-apps.com"]',
        50.00,
        '$2y$10$ABCDEFGHIJKLMNOPQRSTU1234567890'),

       ('Nadia', 'Tazi', 26, 'nadia.tazi@example.com', 'https://example.com/photos/nadia.jpg',
        'Front-end developer with a passion for UI/UX design.',
        '["HTML", "CSS", "JavaScript", "Figma"]',
        '["https://dribbble.com/nadiatazi", "https://nadia-designs.com"]',
        35.00,
        '$2y$10$ABCDEFGHIJKLMNOPQRSTU1234567890'),

       ('Omar', 'El Idrissi', 29, 'omar.elidrissi@example.com', 'https://example.com/photos/omar.jpg',
        'Back-end developer with a focus on scalable architectures.',
        '["Node.js", "Express", "MongoDB"]',
        '["https://github.com/omarelidrissi", "https://omar-projects.com"]',
        40.00,
        '$2y$10$ABCDEFGHIJKLMNOPQRSTU1234567890');


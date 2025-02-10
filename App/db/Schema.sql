-- --install the postgre and run this commands in the query in the postgree shell
-- CREATE DATABASE FreelanceEdgeDB;
-- -- List all databases to check if it was created successfully: \l
-- -- use database: \c FreelanceEdgeDB;
-- -- create table test in the database:
-- CREATE TABLE test (
--     id SERIAL PRIMARY KEY,
--     name VARCHAR(100) NOT NULL,
--     age INT CHECK (age >= 0),
--     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
-- );
-- -- Check if the table was created successfully: \d test
-- -- To test your table, insert some data:
-- INSERT INTO test (name, age) VALUES ('Alice', 25), ('Bob', 30);
-- -- Retrieve all rows from the table:
-- SELECT * FROM test;


-- -- Crete db ;

-- CREATE TABLE roles ( 
-- id SERIAL PRIMARY KEY,
-- role_name VARCHAR(20)
-- ) 

-- CREATE TABLE users (
--     id SERIAL PRIMARY KEY,
--     fullName VARCHAR(100) ,
--     email VARCHAR(50) UNIQUE ,
--     password VARCHAR(20),
--     photo VARCHAR(500),
--     project VARCHAR(50),
--     bio TEXT,
--     competence TEXT[],
--     portfolio VARCHAR(255),
--     role_id INT,
--     Foreign Key (role_id) REFERENCES roles(id),
--     tauxhoraire INT DEFAULT 0,
--     created_at TIME
-- );
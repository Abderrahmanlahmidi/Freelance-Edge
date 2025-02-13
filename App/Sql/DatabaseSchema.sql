CREATE DATABASE FreelanceEdgeDb;
-- \c FreelanceEdgeTestDb;
-- User Table
-- CREATE TABLE roles (
--     id SERIAL PRIMARY KEY,
--     rolename VARCHAR(20) 
-- );

INSERT INTO roles ("Admin", "Client","Freelancer")

-- CREATE TABLE users (
--     id SERIAL PRIMARY KEY,
--     firstname VARCHAR(255) ,
--     lastname VARCHAR(255) ,
--     email VARCHAR(255) UNIQUE ,
--     age VARCHAR(255) ,
--     photo VARCHAR(255) ,
--     bio VARCHAR(255) ,
--     competence TEXT[] ,
--     portfolio VARCHAR(255) ,
--     tauxHoraire INT ,
--     password VARCHAR(255) ,
--     projects_id INT ,
--     role_id INT ,
--     FOREIGN KEY (projects_id) REFERENCES projects(id),
--     FOREIGN KEY (role_id) REFERENCES roles(id)
-- );
-- Project Table
CREATE TABLE projects (
    id SERIAL PRIMARY KEY,
    titre VARCHAR(255),
    description TEXT,
    budget INT,
    durre DATE,
    offers_id INT,
    FOREIGN KEY (offers_id) REFERENCES offers(id)
);
-- Contract Table
CREATE TABLE contrats (
    id SERIAL PRIMARY KEY,
    dateContract VARCHAR(255),
    project_id INT NOT NULL,
    FOREIGN KEY (projects_id) REFERENCES projects(id)
);
-- Category Table
-- CREATE TABLE categories (
--     id SERIAL PRIMARY KEY ,
--     categorie VARCHAR(255) 
-- );
-- Payment Table
CREATE TABLE payments (
    id SERIAL PRIMARY KEY,
    budget INT,
    date_payment DATE,
    project_id INT,
    FOREIGN KEY (projects_id) REFERENCES projects(id)
);
-- Table Role
-- CREATE TABLE "Role" (
--     id SERIAL PRIMARY KEY,
--     role VARCHAR(255) NOT NULL
-- )
-- Messages Table
CREATE TABLE messages (
    id SERIAL PRIMARY KEY,
    date_soumission DATE,
    project_id INT,
    FOREIGN KEY (projects_id) REFERENCES projects(id)
);
-- Offer Table
CREATE TABLE offers (
    id SERIAL PRIMARY KEY,
    titre VARCHAR(255),
    description TEXT
)




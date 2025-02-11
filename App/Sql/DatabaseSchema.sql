CREATE DATABASE FreelanceEdgeDb;
-- \c FreelanceEdgeTestDb;
-- User Table
CREATE TABLE "roles" (
    id SERIAL PRIMARY KEY,
    rolename VARCHAR(20) ,
);

CREATE TABLE "User" (
    id SERIAL PRIMARY KEY,
    firstname VARCHAR(255) ,
    lastname VARCHAR(255) ,
    email VARCHAR(255) UNIQUE ,
    age VARCHAR(255) ,
    photo VARCHAR(255) ,
    bio VARCHAR(255) ,
    competence TEXT[] ,
    portfolio VARCHAR(255) ,
    tauxHoraire INT ,
    password VARCHAR(255) ,
    projects_id INT ,
    role_id INT ,
    FOREIGN KEY (projects_id) REFERENCES Project(id),
    FOREIGN KEY (role_id) REFERENCES Role(id)
);
-- Project Table
CREATE TABLE "Project" (
    id SERIAL PRIMARY KEY ,
    titre VARCHAR(255) NOT NULL,
    description TEXT,
    budget INT NOT NULL,
    durre DATE NOT NULL
)
-- Contract Table
CREATE TABLE "Contract" (
    id SERIAL PRIMARY KEY,
    dateContract VARCHAR(255) NOT NULL,
    project_id INT NOT NULL,
    FOREIGN KEY (projects_id) REFERENCES Project(id)
)
-- Category Table
CREATE TABLE "Category" (
    id SERIAL PRIMARY KEY ,
    category VARCHAR(255) NOT NULL
)
-- Payment Table
CREATE TABLE "Payment" (
    id SERIAL PRIMARY KEY ,
    budget INT NOT NULL,
    date_payment DATE NOT NULL,
    project_id INT NOT NULL,
    FOREIGN KEY (projects_id) REFERENCES Project(id)
)
-- Table Role
CREATE TABLE "Role" (
    id SERIAL PRIMARY KEY,
    role VARCHAR(255) NOT NULL
)
-- Messages Table
CREATE TABLE "Messages" (
    id SERIAL PRIMARY KEY,
    date_soumission DATE NOT NULL
    FOREIGN KEY (projects_id) REFERENCES Project(id)
)
-- Offer Table
CREATE TABLE "Offer" (
    id SERIAL PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    description TEXT
)




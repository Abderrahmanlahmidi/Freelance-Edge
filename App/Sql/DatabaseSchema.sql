CREATE DATABASE FreelanceEdgeTestDb;
-- \c FreelanceEdgeTestDb;
-- User Table
CREATE TABLE "User" (
    id SERIAL PRIMARY KEY,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    age VARCHAR(255) NOT NULL,
    photo VARCHAR(255) NOT NULL,
    bio VARCHAR(255) NOT NULL,
    competence VARCHAR(255) NOT NULL,
    portfolio VARCHAR(255) NOT NULL,
    tauxHoraire INT,
    password VARCHAR(255) NOT NULL,
    projects_id INT NOT NULL,
    role_id INT NOT NULL,
    FOREIGN KEY (projects_id) REFERENCES Project(id) ON DELETE CASCADE,
    FOREIGN KEY (role_id) REFERENCES Role(id) ON DELETE CASCADE
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
    FOREIGN KEY (projects_id) REFERENCES Project(id) ON DELETE CASCADE
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
    FOREIGN KEY (projects_id) REFERENCES Project(id) ON DELETE CASCADE
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
    FOREIGN KEY (projects_id) REFERENCES Project(id) ON DELETE CASCADE
)
-- Offer Table
CREATE TABLE "Offer" (
    id SERIAL PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    description TEXT
)




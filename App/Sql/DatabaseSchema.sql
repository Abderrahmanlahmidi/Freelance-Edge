CREATE DATABASE FreelanceEdgeDb;
-- \c FreelanceEdgeTestDb;
-- User Table
-- CREATE TABLE roles (
--     id SERIAL PRIMARY KEY,
--     rolename VARCHAR(20)
-- );

INSERT INTO roles ( "Admin", "Client", "Freelancer" )
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
    FOREIGN KEY (offers_id) REFERENCES offers (id)
);
-- Contract Table
CREATE TABLE contrats (
    id SERIAL PRIMARY KEY,
    dateContract VARCHAR(255),
    project_id INT NOT NULL,
    FOREIGN KEY (projects_id) REFERENCES projects (id)
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
    FOREIGN KEY (projects_id) REFERENCES projects (id)
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
    FOREIGN KEY (projects_id) REFERENCES projects (id)
);
-- Offer Table
CREATE TABLE offers (
    id SERIAL PRIMARY KEY,
    titre VARCHAR(255),
    description TEXT ,
    budget INT,
    durre DATE,
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES users (id)
)


-- ALTER TABLE offers ADD COLUMN durre DATE;
-- ALTER TABLE offers
-- ADD CONSTRAINT fk_user
-- FOREIGN KEY (user_id) REFERENCES users(id);

-- SELECT column_name
-- FROM information_schema.columns
-- WHERE table_name = 'offers';

-- INSERT INTO offers (titre, description, budget, durre, user_id)
-- VALUES
-- ('offre 1', 'This is a fake description for offer 1', 1000, '2025-02-13', 2),
-- ('offre 21', 'Description for offer 21', 1500, '2025-03-01', 2),
-- ('offre 3', 'A third fake offer description', 2000, '2025-04-15', 2);
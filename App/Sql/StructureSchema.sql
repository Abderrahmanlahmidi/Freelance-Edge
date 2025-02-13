-- 1- Offers
CREATE TABLE offers
(
    id          SERIAL PRIMARY KEY,
    titre       VARCHAR(255) NOT NULL,
    description TEXT,
    project_id INT NOT NULL,
    FOREIGN KEY (project_id) REFERENCES projects(id)
);

INSERT INTO offers (titre, description)
VALUES ('Web Development', 'Full-stack web development services',1),
       ('Graphic Design', 'Professional logo and branding design',2),
       ('SEO Optimization', 'Improve your website ranking on search engines',3),
       ('Mobile App', 'Developing native and cross-platform mobile apps',4);

-- 2- Categories
CREATE TABLE categories
(
    id       SERIAL PRIMARY KEY,
    category VARCHAR(255) NOT NULL
);

INSERT INTO categories (category)
VALUES ('Technology'),
       ('Design'),
       ('Marketing'),
       ('Finance');

-- 3- Roles
CREATE TABLE roles
(
    id       SERIAL PRIMARY KEY,
    roleName VARCHAR(255) NOT NULL
);

INSERT INTO roles (roleName)
VALUES ('Admin'),
       ('Manager'),
       ('Developer'),
       ('Designer');

-- 4- Users
CREATE TABLE users
(
    id          SERIAL PRIMARY KEY,
    firstname   VARCHAR(255)        NOT NULL,
    lastname    VARCHAR(255)        NOT NULL,
    email       VARCHAR(255) UNIQUE NOT NULL,
    age         VARCHAR(255)        NOT NULL,
    photo       VARCHAR(255)        NOT NULL,
    bio         VARCHAR(255)        NOT NULL,
    competence  VARCHAR(255)        NOT NULL,
    portfolio   VARCHAR(255)        NOT NULL,
    tauxHoraire INT                 NOT NULL,
    password    VARCHAR(255)        NOT NULL,
    projects_id INT                 NOT NULL,
    role_id     INT                 NOT NULL,
    FOREIGN KEY (role_id) REFERENCES roles (id)
);

INSERT INTO users (firstname, lastname, email, age, photo, bio, competence, portfolio, tauxHoraire, password,
                   projects_id, role_id)
VALUES ('John', 'Doe', 'john.doe@example.com', '30', 'john.jpg', 'Full-stack developer', 'Web Development',
        'portfolio.com/john', 50, 'securepass', 1, 3),
       ('Jane', 'Smith', 'jane.smith@example.com', '28', 'jane.jpg', 'UI/UX Designer', 'Design', 'portfolio.com/jane',
        40, 'securepass', 2, 4),
       ('Mike', 'Johnson', 'mike.j@example.com', '35', 'mike.jpg', 'SEO Expert', 'SEO', 'portfolio.com/mike', 45,
        'securepass', 3, 2),
       ('Emma', 'Brown', 'emma.b@example.com', '27', 'emma.jpg', 'Marketing Specialist', 'Marketing',
        'portfolio.com/emma', 35, 'securepass', 4, 2);

-- 5- Messages
CREATE TABLE messages
(
    id             SERIAL PRIMARY KEY,
    dateSoumission DATE NOT NULL,
    users_id       INT  NOT NULL,
    FOREIGN KEY (users_id) REFERENCES users (id)
);

INSERT INTO messages (dateSoumission, users_id)
VALUES ('2024-02-01', 1),
       ('2024-02-02', 2),
       ('2024-02-03', 3),
       ('2024-02-04', 4);

-- 6- Payments
CREATE TABLE payments
(
    id           SERIAL PRIMARY KEY,
    budget       INT  NOT NULL,
    date_payment DATE NOT NULL,
    project_id   INT  NOT NULL,
    FOREIGN KEY (project_id) REFERENCES projects (id)
);

INSERT INTO payments (budget, date_payment, project_id)
VALUES (5000, '2024-01-15', 1),
       (3000, '2024-01-16', 2),
       (4500, '2024-01-17', 3),
       (2500, '2024-01-18', 4);

-- 7- Projects
CREATE TABLE projects
(
    id          SERIAL PRIMARY KEY,
    titre       VARCHAR(255) NOT NULL,
    description TEXT,
    budget      INT          NOT NULL,
    duree       DATE,
    category_id INT          NOT NULL,
    user_id     INT          NOT NULL,
    FOREIGN KEY (category_id) REFERENCES categories (id),
    FOREIGN KEY (user_id) REFERENCES users (id)
);

INSERT INTO projects (titre, description, budget, duree, category_id, user_id)
VALUES ('E-commerce Website', 'Online store for electronics', 10000, '2024-06-30', 1, 1),
       ('Brand Identity', 'Logo and branding package', 5000, '2024-05-20', 2, 2),
       ('SEO Campaign', 'Optimize website rankings', 7000, '2024-04-15', 3, 3),
       ('Investment App', 'Mobile app for stock trading', 12000, '2024-07-10', 4, 4);

-- 8- Contracts
CREATE TABLE contracts
(
    id           SERIAL PRIMARY KEY,
    dateContract DATE,
    project_id   INT NOT NULL,
    FOREIGN KEY (project_id) REFERENCES projects (id)
);

INSERT INTO contracts (dateContract, project_id)
VALUES ('2024-02-01', 1),
       ('2024-02-02', 2),
       ('2024-02-03', 3),
       ('2024-02-04', 4);

-- 9- Competences
CREATE TABLE competences
(
    id          SERIAL PRIMARY KEY,
    competence  VARCHAR(244) NOT NULL,
    description TEXT
);

INSERT INTO competences (competence, description)
VALUES ('Web Development', 'Building and maintaining websites'),
       ('Graphic Design', 'Creating visual content'),
       ('SEO Optimization', 'Improving website search ranking'),
       ('Digital Marketing', 'Promoting products online');


-- Insert fake data into roles
INSERT INTO roles (roleName)
VALUES ('Developer'),
       ('Designer'),
       ('Project Manager'),
       ('Tester');

-- Insert fake data into offers
INSERT INTO offers (titre, description, project_id)
VALUES ('Frontend Developer Needed',
        'Looking for an experienced frontend developer to work on our new web application.', 1),
       ('UI/UX Designer Wanted', 'Seeking a creative UI/UX designer to revamp our website.', 2),
       ('Backend Developer Required', 'Need a backend developer with expertise in Node.js and databases.', 3),
       ('QA Tester Needed', 'Hiring a QA tester to ensure the quality of our latest mobile app.', 4);

-- Insert fake data into users
INSERT INTO users (firstname, lastname, email, age, photo, bio, competence, portfolio, tauxHoraire, password,projects_id, role_id)
VALUES ('Ali', 'El Amrani', 'AM@example.com', '28', 'ali.jpg', 'Passionate full-stack developer.',
        'JavaScript, React, Laravel', 'https://ali-portfolio.com', 50, 'hashedpassword1', 1, 1),
       ('Fatima', 'Ben Said', 'fatimabensaid@example.com', '26', 'fatima.jpg', 'Creative UI/UX designer.',
        'Figma, Adobe XD, CSS', 'https://fatima-designs.com', 40, 'hashedpassword2', 2, 2),
       ('Omar', 'Toumi', 'omartoumi@example.com', '30', 'omar.jpg', 'Experienced project manager.',
        'Scrum, Agile, Leadership', 'https://omar-pm.com', 60, 'hashedpassword3', 3, 3),
       ('Salma', 'Haddad', 'salmahaddad@example.com', '27', 'salma.jpg', 'Detail-oriented QA tester.','Automation, Selenium, Manual Testing', 'https://salma-qa.com', 35, 'hashedpassword4', 4, 4);


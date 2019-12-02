CREATE DATABASE bugme;
USE bugme;

DROP TABLE IF EXISTS users;
CREATE TABLE users(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(40) DEFAULT NULL,
    lastname VARCHAR(40) DEFAULT NULL,
    password VARCHAR(32) DEFAULT NULL,
    email VARCHAR(32) DEFAULT NULL,
    date_joined datetime DEFAULT now()
);

CREATE TABLE issues(
    id INT UNSIGNED NOT NULL PRIMARY KEY,
    title VARCHAR(50) DEFAULT NULL,
    description VARCHAR(100) DEFAULT NULL,
    type_ VARCHAR(40) DEFAULT NULL,
    priority VARCHAR(40) DEFAULT NULL,
    status VARCHAR(30) DEFAULT 'Open',
    assigned_to VARCHAR(40) DEFAULT NULL,
    created_by VARCHAR(40) DEFAULT NULL,
    created datetime DEFAULT now(),
    updated datetime DEFAULT now()
);

INSERT INTO Users(email, password) VALUES ('admin@bugme.com', md5('password123'));
CREATE DATABASE IF NOT EXISTS praktyki_login;

USE praktyki_login;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (username, password) VALUES
('admin', 'test'),
('uzytkownik1', 'haslo1'),
('uzytkownik2', 'haslo2');
CREATE DATABASE IF NOT EXISTS ci4_store;
USE ci4_store;

CREATE TABLE IF NOT EXISTS customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    created_at DATETIME NOT NULL
);

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    full_name VARCHAR(100) NOT NULL,
    created_at DATETIME NOT NULL
);

INSERT INTO customers (full_name, email, phone, created_at) VALUES
    ('Alice Dela Cruz', 'alice@example.com', '0917-123-4567', NOW()),
    ('Bob Santos', 'bob.santos@example.com', '0918-234-5678', NOW()),
    ('Carol Reyes', 'carol.reyes@example.com', '0919-345-6789', NOW()),
    ('David Tan', 'david.tan@example.com', '0920-456-7890', NOW()),
    ('Elena Martinez', 'elena.martinez@example.com', '0921-567-8901', NOW());

INSERT INTO users (username, full_name, created_at) VALUES
    ('admin', 'Admin User', NOW()),
    ('juan', 'Juan Dela Cruz', NOW()),
    ('maria', 'Maria Santos', NOW()),
    ('pedro', 'Pedro Reyes', NOW()),
    ('sara', 'Sara Tan', NOW());

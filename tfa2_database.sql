-- IT0049 TSA1 + TFA2 Combined Database Schema
-- Tasks for Today Management System

CREATE DATABASE IF NOT EXISTS ci4_store;
USE ci4_store;

-- TFA1/TFA2: Customers table
CREATE TABLE IF NOT EXISTS customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    created_at DATETIME NOT NULL
);

-- TFA1/TFA2: Users table (with email added for TSA1 profile)
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100),
    created_at DATETIME NOT NULL
);

-- TSA1: Tasks table
CREATE TABLE IF NOT EXISTS tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    status VARCHAR(20) NOT NULL DEFAULT 'pending',
    task_date DATE NOT NULL,
    created_at DATETIME NOT NULL
);

INSERT INTO customers (full_name, email, phone, created_at) VALUES
    ('Alice Dela Cruz', 'alice@example.com', '0917-123-4567', NOW()),
    ('Bob Santos', 'bob.santos@example.com', '0918-234-5678', NOW()),
    ('Carol Reyes', 'carol.reyes@example.com', '0919-345-6789', NOW()),
    ('David Tan', 'david.tan@example.com', '0920-456-7890', NOW()),
    ('Elena Martinez', 'elena.martinez@example.com', '0921-567-8901', NOW());

INSERT INTO users (username, full_name, email, created_at) VALUES
    ('admin', 'Admin User', 'admin@example.com', NOW()),
    ('juan', 'Juan Dela Cruz', NULL, NOW()),
    ('maria', 'Maria Santos', NULL, NOW()),
    ('pedro', 'Pedro Reyes', NULL, NOW()),
    ('sara', 'Sara Tan', NULL, NOW());

INSERT INTO tasks (title, status, task_date, created_at) VALUES
    ('Generate sales report for Q3', 'completed', '2026-09-23', '2026-09-23 09:00:00'),
    ('Update inventory database', 'completed', '2026-09-23', '2026-09-23 10:30:00'),
    ('Prepare weekly meeting agenda', 'completed', '2026-09-23', '2026-09-23 14:00:00'),
    ('Review customer feedback', 'completed', '2026-09-24', '2026-09-24 09:15:00'),
    ('Restock office supplies', 'completed', '2026-09-24', '2026-09-24 11:00:00'),
    ('Send payroll to accounting', 'in progress', '2026-09-24', '2026-09-24 15:30:00'),
    ('Process morning orders', 'pending', '2026-09-25', '2026-09-25 08:00:00'),
    ('Update employee schedules', 'in progress', '2026-09-25', '2026-09-25 09:30:00'),
    ('Clean and organize storage room', 'pending', '2026-09-25', '2026-09-25 10:00:00'),
    ('Submit monthly expense report', 'pending', '2026-09-25', '2026-09-25 12:00:00');

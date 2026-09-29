BEGIN TRANSACTION;
CREATE TABLE customers (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    full_name TEXT NOT NULL,
    email TEXT NOT NULL,
    phone TEXT,
    created_at DATETIME NOT NULL
);
INSERT INTO "customers" VALUES(1,'Alice Dela Cruz','alice@example.com','0917-123-4567','2026-09-23 12:44:11');
INSERT INTO "customers" VALUES(2,'Bob Santos','bob.santos@example.com','0918-234-5678','2026-09-23 12:44:11');
INSERT INTO "customers" VALUES(3,'Carol Reyes','carol.reyes@example.com','0919-345-6789','2026-09-23 12:44:11');
INSERT INTO "customers" VALUES(4,'David Tan','david.tan@example.com','0920-456-7890','2026-09-23 12:44:11');
INSERT INTO "customers" VALUES(5,'Elena Martinez','elena.martinez@example.com','0921-567-8901','2026-09-23 12:44:11');
CREATE TABLE tasks (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    title TEXT NOT NULL,
    status TEXT NOT NULL DEFAULT 'pending',
    task_date DATE NOT NULL,
    created_at DATETIME NOT NULL
, is_archived INTEGER DEFAULT 0);
INSERT INTO "tasks" VALUES(1,'Generate sales report for Q3','completed','2026-09-26','2026-09-26 09:00:00',0);
INSERT INTO "tasks" VALUES(2,'Update inventory database','completed','2026-09-26','2026-09-26 10:30:00',0);
INSERT INTO "tasks" VALUES(3,'Prepare weekly meeting agenda','completed','2026-09-26','2026-09-26 14:00:00',0);
INSERT INTO "tasks" VALUES(4,'Review customer feedback','completed','2026-09-27','2026-09-26 16:45:00',0);
INSERT INTO "tasks" VALUES(5,'Restock office supplies','completed','2026-09-27','2026-09-26 15:30:00',0);
INSERT INTO "tasks" VALUES(6,'Send payroll to accounting','in progress','2026-09-27','2026-09-27 08:30:00',0);
INSERT INTO "tasks" VALUES(7,'Process morning orders','pending','2026-09-28','2026-09-27 09:00:00',0);
INSERT INTO "tasks" VALUES(8,'Update employee schedules','in progress','2026-09-28','2026-09-27 11:15:00',0);
INSERT INTO "tasks" VALUES(9,'Clean and organize storage room','pending','2026-09-29','2026-09-27 13:45:00',0);
INSERT INTO "tasks" VALUES(10,'Submit monthly expense report','pending','2026-09-30','2026-09-27 15:00:00',0);
INSERT INTO "tasks" VALUES(11,'Review Q4 project portfolio','in progress','2026-10-01','2026-09-27 17:00:00',0);
INSERT INTO "tasks" VALUES(12,'Verify system access permissions','pending','2026-10-03','2026-09-27 18:30:00',0);
CREATE TABLE users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT NOT NULL UNIQUE,
    full_name TEXT NOT NULL,
    created_at DATETIME NOT NULL
, email TEXT, avatar VARCHAR(255) DEFAULT NULL, password_hash VARCHAR(255) DEFAULT NULL, password VARCHAR(255) DEFAULT NULL);
INSERT INTO "users" VALUES(1,'admin','Admin User','2026-09-23 12:44:11','admin@example.com',NULL,'$2y$10$swYeL0CDPV/hx/510JuiQ.ekQpMFRa/wJFHEMT1MUeyEntOLiUJ.m','$2y$10$swYeL0CDPV/hx/510JuiQ.ekQpMFRa/wJFHEMT1MUeyEntOLiUJ.m');
INSERT INTO "users" VALUES(2,'juan','Juan Dela Cruz','2026-09-23 12:44:11',NULL,NULL,'$2y$10$rMFQ2/S0cPE41N9UpvkHiOwaEt.8EtYXw/QFpNjxSjROTT4tx9H5u','$2y$10$rMFQ2/S0cPE41N9UpvkHiOwaEt.8EtYXw/QFpNjxSjROTT4tx9H5u');
INSERT INTO "users" VALUES(3,'maria','Maria Santos','2026-09-23 12:44:11',NULL,NULL,'$2y$10$zdQZ2yNSHABuQcMlT0hxde7tR3okcGkHhnPEAfLH.eUrj1ClatAkS','$2y$10$zdQZ2yNSHABuQcMlT0hxde7tR3okcGkHhnPEAfLH.eUrj1ClatAkS');
INSERT INTO "users" VALUES(4,'pedro','Pedro Reyes','2026-09-23 12:44:11',NULL,NULL,'$2y$10$GLTUdL62ETSLxUiSdo/vrO4wJh6fKDNyOTnp68UoOUPcUwuEbmj3i','$2y$10$GLTUdL62ETSLxUiSdo/vrO4wJh6fKDNyOTnp68UoOUPcUwuEbmj3i');
INSERT INTO "users" VALUES(5,'sara','Sara Tan','2026-09-23 12:44:11',NULL,NULL,'$2y$10$D1ATCp7eje0HQoyLUqXK/eXF2eo1oG1xSMbRjZKA8lXJGydx48Q8O','$2y$10$D1ATCp7eje0HQoyLUqXK/eXF2eo1oG1xSMbRjZKA8lXJGydx48Q8O');
DELETE FROM "sqlite_sequence";
INSERT INTO "sqlite_sequence" VALUES('customers',5);
INSERT INTO "sqlite_sequence" VALUES('users',5);
INSERT INTO "sqlite_sequence" VALUES('tasks',12);
COMMIT;

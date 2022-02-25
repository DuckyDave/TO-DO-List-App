DROP DATABASE IF EXISTS todolist;
CREATE DATABASE todolist CHARACTER SET utf8mb4;
USE todolist;

/* detalls tasques */
CREATE TABLE IF NOT EXISTS task (
	id INT UNSIGNED AUTO_INCREMENT,
    task_description VARCHAR(50) NOT NULL,
    date_time_start DATETIME NOT NULL,
    date_time_end DATETIME NOT NULL,
    task_state ENUM('Pending','On execution','Finished'),
    user_first_name VARCHAR(20) NOT NULL,
    user_last_name VARCHAR(50) NOT NULL,
    PRIMARY KEY (id))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;

/* omplim la base de dades amb tres tasques de prova */
INSERT INTO task (id, task_description, date_time_start, date_time_end, task_state, user_first_name, user_last_name) VALUES (1, "Passejar el gos", "2021-02-09T17:02", "2021-02-09T18:05", "Pending", "Josep", "Cardona Jimenez");
INSERT INTO task (id, task_description, date_time_start, date_time_end, task_state, user_first_name, user_last_name) VALUES (2, "Comprar queviures al supermercat", "2021-02-09T10:30", "2021-02-09T11:54", "On execution", "Imma", "Perez Sanchez");
INSERT INTO task (id, task_description, date_time_start, date_time_end, task_state, user_first_name, user_last_name) VALUES (3, "anar al banc a treure diners", "2021-02-10T09:02", "2021-02-10T09:15", "Pending", "Josep", "Cardona Jimenez");
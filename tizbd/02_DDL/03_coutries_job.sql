
CREATE DATABASE 5e_2_countries;
USE 5e_2_countries;
-- 1. Utwórz tabelę countries z polami: country_id, country_name i  region_id. Tabela powinna być utworzona tylko wtedy, gdy nie istnieje.
CREATE TABLE IF NOT EXISTS countries (
    country_id INT,
    country_name VARCHAR(255),
    region_id INT 
);

-- 2. Utwórz tabelę dump_countries będącą kopią tabeli countries (struktura i dane)

            CREATE TABLE dump_countries AS 
            SELECT *
            FROM countries;

-- 3. Z tabeli dump_countries usuń pole region_id
ALTER TABLE dump_countries
drop region_id;
-- 4. Pole country_id powinno być kluczem podstawowym z autoinkrementacją
ALTER TABLE countries
modify country_id INT PRIMARY KEY AUTO_INCREMENT;
-- 5. Zmień nazwę pola country_id na id_country
ALTER TABLE countries
CHANGE country_id id_country INT;
-- 6. Pole country_name nie powinno być puste - dodaj odpowiedni warunek
ALTER TABLE countries
modify country_name varchar(255) NOT NULL;
-- 7. Zmodyfikuj tabelę countries tak, aby tylko wybrane cztery kraje (wymyśl jakie) będą mogły byc wpisane do tej tabeli
ALTER TABLE countries
modify country_name varchar(255) CHECK(country_name IN ('Polska','Niemcy','Czechy','Litwa'));
-- 8. Usuń tabelę dump_countries
DROP TABLE dump_countries;
-- 9. Utwórz tabelę jobs zawierajacą pola id_job, job_title, min_salary, max_salary, dodaj regułę, która sprawi, że max_salary nie przekroczy limitu 25000

CREATE table jobs(
    id_job int,
    job_title varchar(255),
    min_salary dec(7,2),
    max_salary dec(7,2) check(max_salary < 25000)
);

-- 10. Do tabeli jobs dodaj warunek pilnujący, aby wartości w polu job_title się nie powtarzały
ALTER TABLE jobs
modify job_title varchar(255) UNIQUE;

-- 11. Do tabeli jobs dodaj wartość domyślną na polu min_salary 8000 oraz wartość domyślną NULL na polu max_salary

    ALTER TABLE jobs
    ALTER min_salary SET DEFAULT 8000,
    ALTER max_salary SET DEFAULT NULL;

-- 12. Utwórz tabelę job_history z polami: employee_id, start_date, end_date, job_id  oraz department_id . Określ klucz podstawowy (zakładamy, że pracownik nie pracuje jednocześnie na więcej niż jednym stanowisku) 
CREATE table job_history(
    employee_id int,
    start_date date,
    end_date date,
    job_id int,
    department_id int,
    PRIMARY KEY(employee_id, start_date)
);
-- 13 zmodyfikuj tabelę job_history przesuwając pole job_id na początek tabeli
ALTER TABLE job_history
modify job_id INT FIRST;
-- 14. Do tabeli job_history dodaj klucz obcy na polu job_id

ALTER TABLE jobs
ADD PRIMARY KEY (id_job);
ALTER TABLE job_history
ADD FOREIGN KEY (job_id) REFERENCES jobs(id_job);
-- 15. Do tabeli job_history dodaj  index o nazwie  indx_job_id na kolumnie job_id column 
CREATE index indx_job_id ON job_history(job_id);

-- 16. Wyświetl istniejące indeksy w tabeli job_history (SHOW INDEXES FROM...)

-- 17. Usuń index indx_job_id z tabeli job_history
ALTER TABLE job_history
DROP index indx_job_id;
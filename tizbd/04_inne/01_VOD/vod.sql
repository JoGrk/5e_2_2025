-- 1. napisz skrypt  tworzący bazę danych vod oraz tabelę klienci , ale tylko wtedy, gdy baza i tabela nie istnieją, określ klucz podstawowy  (tabela ma pasować do pliku o tej nazwie)
CREATE DATABASE 5e_2_VODs;

CREATE TABLE klienci(
    Pesel char(11),
    Imie varchar(255),
    Nazwisko varchar(255)
);

-- 2. Wykonaj skrypt z poziomu wiersza poleceń metodą przekierowania (skrypt wykonaj do dowolnej bazy danych)

-- 3. Z poziomu wiersza poleceń zaimportuj dane do tabeli klienci

LOAD DATA local infile 'C:\\xampp\\htdocs\\5e_2\\tizbd\\04_inne\\01_VOD\\klienci.txt'
INTO TABLE klienci
fields terminated by '\t'
lines terminated by '\n'
ignore 1 lines;

-- 4.  zaimportuj tabele filmy i wypozyczenia z poziomu phpMyAdmin  o

-- 5. utwórz skrypt, który doda do tabeli wypozyczenia i filmy indeks (na polu tytul i na polu data wypożyczenia - osobne dwa indeksy). Wykonaj skrypt. 

-- 6.  Wyeksportuj z tabeli filmy tytul, kraj_produkcji i gatunek do pliku filmy.csv, dane oddziel średnikiem. 

-- 7. Utwórz widok FilmyWypozyczenia   z polami id_filmu , tytul, kraj_produkcji, data_wypoz
create view FilmyWypozyczenia as 
select filmy.id_filmu, tytul, kraj_produkcji, data_wyp
from filmy
    join wypozyczenia on filmy.id_filmu=wypozyczenia.id_filmu;
-- 8. Korzystając z widoku i tabeli wypozyczenia wyświetl  tytuły filmów, które nie zostały wypożyczone ani razu przez klientów usługi VOD na etapie testowania.

-- 9. Usuń indeks z tabeli wypozyczenia.

-- 10. Utwórz widok IloscWypozyczen obliczające ile razy film o danym ID był wypożyczany

-- 11. Korzystając z widoku IloscWypozyczen wyświetl tytuły pięciu najczęściej wypożyczanych filmów
mysqldump -u root 4e_2_group > plik.sql
mysql -u root 4e_2_group < C:\xampp\plik.sql

--------- logiczna i gorąca kopia bazy danych mysql --------

-- kopia: 

-- mysqldump -u user -p[haslo] [nazwa_bazy] [tabela]> plik.sql
-- odzyskiwanie:

--  mysql -u user -p[haslo] [nazwa_bazy] < plik.sql
-- ----------------------------------------------------------------------------------------

 

 

-- 1. Wykonaj kopię logiczną bazy biblioteka w postaci pliku z poleceniami sql (zrzut bazy danych, dump) na dwa sposoby:

 

-- A. z poziomu wiersza poleceń
-- B. korzystając z  phpMyAdmin
 

-- 2.

 

-- A. Wykonaj z wiersza poleceń (mysqldump) kopię tabeli autorzy z bazy biblioteka  w postaci pliku z poleceniami sql . Pokaż, jak wygląda taki pliki w notatniku.
-- B. Zaloguj się do bazy i za pomocą zapytania SQL usuń tabelę autorzy.
-- C. Odtwórz tabelę z kopii. 
 

-- 3. 

 

-- A. Wyświetl pomoc dla polecenia mysqldump (jak w linuksie --help ). 

mysqldump --help

-- B. Pokaż na zrzucie jaka opcja odpowiada za wykonanie kopii wszystkich baz danych

mysqldump -u root -A > plik.sql;

-- C. Użyj tej opcji do wykonania kopii całości swoich baz
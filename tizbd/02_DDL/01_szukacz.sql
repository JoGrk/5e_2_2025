
-- (wiersz poleceń)

-- 1. Dodaj nowego użytkownika kupiec łączącego się z lokalnej maszyny z hasłem kupiecE14
CREATE USER 'kupiec_2'@'localhost' IDENTIFIED BY '1234';
 
-- 2. Wykonaj testowe połączenie (zaloguj się) na koncie kupiec. Jakie bazy danych są widoczne?
 mysql -u kupiec_2 -p
-- 3. jako root sprawdź zawartość tabeli user (tylko pola host, user, password) (w bazie danych mysql) (pokaż zawartość tej tabeli)
 SELECT host, user, password
 FROM mysql.user;
-- 4. Utwórz użytkownika szukacz z hasłem szukaczE14
 CREATE USER 'szukacz_2'@'localhost' IDENTIFIED BY '1234';
-- 5. Wyloguj się z sesji kupca i wykonaj testowe połączenie jako szukacz
EXIT
mysql -u szukacz_2 -p 
--  6. Zablokuj konto kupiec (ALTER USER .... ACCOUNT ...)
 
--  7. Wyloguj się z sesji szukacza i wykonaj testowe połączenie jako kupiec

 
-- 8 . Odblokuj  konto kupiec. Ustaw wygaszanie hasła po jednym dniu ( dzień lub dwa później spróbuj się zalogować, a jeśli się nie uda, napraw)
-- //-----------------------------------------------------
-- 9. Utwórz
-- A. bazę danych Egzaminy
CREATE DATABASE Egzaminy_2;
-- B. w tej bazie tabelę Test (pole id typu int, klucz podstawowy, bez autoinkrementacji). 
CREATE TABLE test(
    id INT PRIMARY KEY
);
-- C. Dodaj do tabeli Test cyfry 1, 2 i 3 
INSERT INTO test
VALUES
(1),(2),(3);
-- D. Utwórz tabelę tabela z jednym polem id typu całkowitego.
 CREATE TABLE tabela(
    id INT
 );
-- 10. Daj kupcowi prawo do wprowadzania danych do tabeli test w bazie Egzaminy (samo wprowadzanie, bez wyszukiwania)
 GRANT INSERT ON Egzaminy_2.test TO 'kupiec_2'@'localhost';
-- 11. Daj szukaczowi prawo do wyświetlania danych z tabeli test w bazie Egzaminy
 
GRANT SELECT on Egzaminy_2.test TO 'szukacz_2'@'localhost';

-- 12. Sprawdź, czy kupiec (prawo do wprowadzania danych):

-- A. widzi bazę Egzaminy
SHOW DATABASES;
-- B. Może jej użyć
USE Egzaminy_2;
-- C. Widzi tabele w tej bazie
SHOW TABLES;
-- D. Może wyświetlić zawartość tabeli Test
SELECT *
FROM test;
-- E. Może dodać dane (liczbę 4)
INSERT INTO test
VALUES (4);
 
-- 13. Sprawdź, czy szukacz (prawo do wyświetlania danych):
-- A. widzi bazę Egzaminy
-- B. Może jej użyć
-- C. Widzi tabele w tej bazie
-- D. Może wyświetlić zawartość tabeli Test
-- E. Może dodać dane (liczbę 5)
-- 14. Utwórz użytkownika serwisant
CREATE USER 'serwisant_2'@'localhost' IDENTIFIED BY '1234';

 
-- 15. Daj prawo serwisantowi do usuwania danych z tabeli test w bazie egzaminy (samo usuwanie, bez prawa do wyszukiwania).
GRANT DELETE ON Egzaminy_2.test to 'serwisant_2'@'localhost';

 
-- 16. Sprawdź, czy serwisant (prawo do usuwania danych):
-- A. widzi bazę Egzaminy
SHOW DATABASES;
-- B. Może jej użyć
use Egzaminy_2;
-- C. Widzi tabele w tej bazie
show tables;
-- D. Może wyświetlić zawartość tabeli Test
SELECT *
FROM test;
-- E. Może usunąć dane (liczbę 3)
DELETE 
FROM test
WHERE id=3;
-- F. Może usunąć wszystkie dane;
-- 17. Jeśli użytkownik serwisant ma problemy z usuwaniem, popraw to (ale nie dawaj mu za dużo praw, a już na pewno nie wszystkie), najpierw dodaj do tabeli liczby 1,2,3
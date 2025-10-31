-- 1. Dodaj użytkowników:
-- A. Kasia, odpowiadająca za wprowadzanie danych o klientach, hasło 1234
CREATE USER 'Kasia_2'@'localhost' IDENTIFIED BY '1234';
-- B. Jan - głównego mechanika wpisującego informacje o naprawach, hasło 1234
CREATE USER 'Jan_2'@'localhost' IDENTIFIED BY '1234';
-- C. Kasjer - odpowiedzialnych za wystawianie rachunków, ale nie mogących wprowadzać zmian do bazy, hasło 1234
CREATE USER 'Kasjer_2'@'localhost' IDENTIFIED BY '1234';
-- 2. Utwórz perspektywę (widok)  KlienciKoszty (nazwa, adres, kwota, data_wpisu z tabeli rejestry pod nazwą data_rejestru) łączącą dane z tabel Klienci i Rejestry, która będzie potrzebna kasjerowi do pracy
 CREATE VIEW KlienciKoszty AS
 SELECT nazwa,adres,kwota,Rejestry.data_wpisu AS data_rejestru
 FROM Klienci
    JOIN Rejestry ON Klienci.id=Rejestry.Klient;
-- 3. Ustal minimalny zestaw uprawnień dla utworzonych użytkowników, kierując się zasadą "im mniejsze uprawnienia, tym mniej można zepsuć"
-- A. Kasia, wszystkie prawa do tabeli Klienci
GRANT ALL ON 5e_2_komis.klienci TO 'Kasia_2'@'localhost';
-- B. Jan - prawa do modyfikacji, dodawania i usuwania  dla tabel operacje i rejestry oraz wyszukiwania dla wszystkich tabel w bazie

GRANT UPDATE, INSERT, DELETE ON 5e_2_komis.operacje TO 'Jan_2'@'localhost';
GRANT UPDATE, INSERT, DELETE ON 5e_2_komis.rejestry TO 'Jan_2'@'localhost';

GRANT select on 5e_2_komis.* TO 'Jan_2'@'localhost';
-- C. Kasjer - prawa do przeszukiwania perspektywy KlienciKoszty

GRANT select on 5e_2_komis.KlienciKoszty TO 'Kasjer_2'@'localhost';

-- 4. Utwórz nowego użytkownika uczendba z hasłem dostępu zaq1@WSX 
CREATE USER 'uczendba_2' IDENTIFIED BY 'zaq1@WSX';
-- A. przypisz mu wszystkie uprawnienia do tabel Klienci i Handlowcy.
GRANT ALL ON 5e_2_komis.Klienci TO 'uczendba_2';
GRANT ALL ON 5e_2_komis.Handlowcy TO 'uczendba_2';

-- B. zabroń mu usuwania rekordów z tabeli Klienci 
-- DENY DELETE ON 5e_2_komis.Klienci TO 'uczendba_2';
REVOKE DELETE ON 5e_2_komis.Klienci FROM 'uczendba_2';

-- C. odbierz uprawnienia wykonywania zapytań usuwania rekordów i modyfikowania wartości w tabeli Handlowcy
REVOKE DELETE,UPDATE ON 5e_2_komis.Handlowcy FROM 'uczendba_2';
-- 5. Utwórz użytkowników jeden i dwa (bez hasła).
CREATE USER 'jeden_2';
CREATE USER 'dwa_2';
--  A. Nadaj uprawnienia wprowadzania, zmiany i usuwania danych w całej bazie komis dla użytkownika jeden
GRANT INSERT,DELETE,UPDATE ON 5e_2_komis.* TO 'jeden_2';
-- B. nadaj wszystkie uprawnienia do tabeli Auta użytkownikowi dwa
GRANT ALL on 5e_2_komis.Auta to 'dwa_2';
-- C. odbierz użytkownikowi jeden prawa usuwania danych 
REVOKE DELETE ON 5e_2_komis.* FROM 'jeden_2';
-- D. odbierz wszystkie uprawnienia użytkownikowi dwa do tabeli Auta
REVOKE ALL ON 5e_2_komis.Auta FROM 'dwa_2';
-- 6. 
-- A. Zaloguj się jako użytkownik jeden i ustaw hasło 'zaq1@WSX'
mysql -u jeden_2
SET PASSWORD = password('zaq1@WSX');
mysql -u jeden_2 -p
-- B. Ustaw hasło dla użytkownika dwa na 'zaq1@WSX'
SET password FOR  'dwa_2'= password('zaq1@WSX');
-- C. z poziomu konta root zmień hasło dla użytkownika jeden na 'haslo'
SET password FOR  'jeden_2'= password('haslo');
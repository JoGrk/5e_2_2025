-- 1. Utwórz użytkownika u1  z hasłem abcd
CREATE user 'u1' IDENTIFIED BY 'abcd';
-- 2. Utwórz bazę danych b i wykonaj do niej plik komisF.sql(metodą przekierowania) 


-- 3. Użytkownikowi u1 nadaj prawo do efektywnego wstawiania, usuwania i modyfikowania danych dla tabeli samochody.
GRANT INSERT, DELETE, UPDATE, SELECT ON 5e_2_komis.Auta TO 'u1';

-- 4. Użytkownikowi u1 odbierz prawo do usuwania danych w tabeli samochody
REVOKE DELETE ON 5e_2_komis.Auta from 'u1';
-- 5. Zablokuj koto u1
alter user 'u1' account lock;
-- 6. Odblokuj konto u1
alter user 'u1' account unlock;
-- 7.Ustaw hasło dla użytkownika u1 na 1234
SET password FOR 'u1' = password('1234');
-- 8, utwórz rolę r1 z prawami do wyświetlania danych z wszystkich tabel bazy b
CREATE ROLE 'r1';
GRANT SELECT ON 5e_2_komis.* TO 'r1'; 
-- 9. Użytkownikowi u1 przypisz prawo do roli r1

-- 10. zaloguj się jako u1 i sprawdź uprawniania (show grants)

--        11. Sprawdź, czy możesz wyświetlić dane z tabeli zamowienia

--        12. włącz (ustaw) rolę r1

--        13. sprawdź, czy możesz wyświetlić dane z tabeli zamowienia

--         14. sprawdź, czy możesz usunąć zamowienie o id 3

-- 15. do roli r1 dodaj prawo do usuwania danych z tabeli zamowienia

--          16. sprawdź uprawnienia

--          17. usuń zamówienie o id 2

-- 18. usuń rolę r1

-- 19. usuń użytkownika u1
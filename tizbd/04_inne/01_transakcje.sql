-- 1.  Utwórz tabelę Dane z jednym polem typu int o nazwie numer . 

CREATE TABLE dane(
    numer INT
);
-- 2. Zapisz w tabeli liczbę 10.

INSERT INTO dane
VALUES
(10);

-- 3.  rozpocznij transakcję  

START TRANSACTION;

-- 4. Zmień liczbę na 20
UPDATE dane 
SET numer = 20;

-- 5. Wycofaj się z transakcji. 
ROLLBACK;

-- 6. jaka jest zawartość tabeli Dane?
SELECT * from dane;

-- 7. rozpocznij transakcję
START TRANSACTION;

-- 8. zmień liczbę na 30
UPDATE dane
SET numer = 30;

-- 9. zatwierdź transakcję
commit;

-- 10. Jaka jest zawartość tabeli Dane?
SELECT * from dane;
-- -----------------------------

-- 11 Utwórz tabelę statystyki z dwoma polami typu int: numer i kwota. Wpisz dwa wiersze: (1, 10) oraz (2, 20).
create table statystyki(
    numer INT,
    kwota INT
);
INSERT INTO statystyki
VALUES
(1,10), (2,20);
-- 12. Otwórz dwa wiersze okna poleceń. Rozpocznij w obu transakcje.
START TRANSACTION;
-- 13. Pokaż zawartość tabeli dane;
select * from dane;
-- 14. W pierwszej zmodyfikuj kwotę w wierszu o numerze 1, w drugiej kwotę w wierszu o numerze 2 (udało się? ____ )
UPDATE statystyki
SET kwota = 100
WHERE numer = 1;

UPDATE statystyki
SET kwota = 200
where numer =2;
-- 15. Zatwierdź transakcję w tym oknie, w którym jest to możliwe. Co się stało w drugim oknie? 
Odblokowało sie drugie okno
-- 16. Jaka jest zawartość tabeli statystyki?
w jednym oknie jest jedno dane zaktualizowane a w drugim drugie dane
-- 17. Zatwierdź drugą transakcję. Jaka jest zawartość tabeli statystyki?
wszystko jest git
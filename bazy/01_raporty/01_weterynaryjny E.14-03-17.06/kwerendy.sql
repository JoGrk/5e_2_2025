-- - Zapytanie 1: wybierające jedynie pola imie, telefon, szczepienie, opis z tabeli Zwierzeta
SELECT imie, telefon, szczepienie, opis
FROM zwierzeta;
-- - Zapytanie 2: wybierające jedynie pola id, imie, wlasciciel z tabeli Zwierzeta dla tych rekordów, dla których rodzaj to pies
SELECT id,imie,wlasciciel
FROM zwierzeta
WHERE rodzaj = 1;

-- - Zapytanie 3: korzystające z relacji i wybierające jedynie pola imie z tabeli Zwierzeta oraz odpowiadające im pola nazwa z tabeli Uslugi
SELECT imie ,nazwa
FROM Zwierzeta
    JOIN Uslugi ON zwierzeta.usluga_id=uslugi.id;
-- - Zapytanie 4: zwracające średnią cenę wszystkich usług zapisanych w tabeli Uslugi

SELECT AVG(cena)
    FROM uslugi;
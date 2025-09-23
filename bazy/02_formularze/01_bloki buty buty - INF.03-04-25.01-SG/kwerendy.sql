-- 5r_2_obuwie
-- Zapytanie 1: wybierające jedynie pole model z tabeli produkt

SELECT model
FROM produkt;

-- − Zapytanie 2: wybierające jedynie pola model, nazwa, cena z tabeli buty oraz odpowiadające im pole nazwa_pliku z tabeli produkt. Należy posłużyć się relacją
SELECT buty.model,nazwa,cena,nazwa_pliku
FROM buty
        JOIN produkt ON buty.model=produkt.model;
-- − Zapytanie 3: wybierające jedynie pola nazwa, cena z tabeli buty i odpowiadające mu pola kolor, kod_produktu, material, nazwa_pliku z tabeli produkt dla modelu „P-59-03”. Należy posłużyć się relacją
SELECT nazwa,cena,kolor,kod_produktu,material,nazwa_pliku
FROM buty
        JOIN produkt ON buty.model=produkt.model
WHERE buty.model = 'P-59-03';

-- − Zapytanie 4: wstawiające rekord z nazwą kategorii „Sandały” do tabeli kategorie. Klucz główny
-- generowany automatycznie
INSERT INTO kategorie(nazwa_kat)
VALUES('Sandały');
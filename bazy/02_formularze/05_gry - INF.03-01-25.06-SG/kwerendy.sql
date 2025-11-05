-- Zapytanie 1: wybierające jedynie id, nazwę i zdjęcie z tabeli gry
select id, nazwa, zdjecie
from gry;
-- ‒ Zapytanie 2: wybierające jedynie nazwę, pierwsze 100 znaków opisu, punkty oraz cenę z tabeli gry dla wiersza o id równym 1
select nazwa, left(opis, 100),punkty, cena
from gry
where id=1;
-- ‒ Zapytanie 3: wybierające jedynie pola nazwa i punkty z pięciu pierwszych wierszy o najwyższej punktacji z tabeli gry
select nazwa, punkty
from gry
order by punkty DESC
LIMIT 5;
-- ‒ Zapytanie 4: wstawiające do tabeli gry wiersz o danych zawartych w pliku rekord.txt (dane należy skopiować z pliku do zapytania). Klucz główny nadawany automatycznie.
INSERT INTO gry 
(nazwa,opis,punkty,cena,zdjecie)
Values(
    'Zamczysko',
'Na odludziu stoi opuszczone zamczysko, w kt�rym znajduje si� skarb strze�ony przez z�owrogie demony i duchy',
200,50,'zamczysko.jpg'
);
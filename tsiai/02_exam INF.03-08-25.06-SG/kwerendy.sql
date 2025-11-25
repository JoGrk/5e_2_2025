-- − Zapytanie 1: wybierające jedynie nazwę, długość i szerokość smoka, dla smoków z Polski
select nazwa,dlugosc, szerokosc
from smok
where pochodzenie = 'Polska';
-- − Zapytanie 2: wybierające niepowtarzające się kraje pochodzenia smoków, posortowane rosnąco według kraju pochodzenia
select distinct pochodzenie
from smok
order by pochodzenie;

-- − Zapytanie 3: wybierające jedynie rok z tabeli parada i obliczającą odpowiadającą mu średnią wartość długości z tabeli smok, nazwa kolumny (alias) „Średnia długość” tylko dla lat po 2005 roku. Należy posłużyć się relacją i zgrupować rekordy względem roku 
select rok, avg(dlugosc) as 'srednia dlugosc'
from parada 
    join udzial on parada.id=udzial.id_parada
    join smok on udzial.id_smok=smok.id
where rok > 2005
group by rok;
-- − Zapytanie 4: zmieniające strukturę tabeli parada, przez wstawienie nowej kolumny lokalizacja typu
-- napisowego o maksymalnej długości 100 znaków.
-- 1. Wyświetl rating, tytul i ocenę książki: jeśli rating jest > 4, to "dobra" , w przeciwnym wypadku "przeciętna", autora

SELECT 
    rating,title,
    CASE
        WHEN rating > 4 THEN "dobra"

        ELSE "przeciętna"
    END as ocena
FROM ksiazki;

-- 2.  >4.2 bardzo dobra, pomiędzy 3.8 a 4.3 dobra, poniżej przeciętna

select 
    rating, title, 
    case
        when rating > 4.2 then "bardzo dobra" 
        when rating between 3.8 and 4.3 then "dobra"

        ELSE "przeciętna"
    end as ocena
from ksiazki;

-- IF(warunek, wartość_jeśli_prawda , wartość_jeśli_fałsz)
-- 3. to co w zadaniu 1, ale z wykorzystaniem instrukcji IF
create view widok_oceny as 
select 
    rating, title,
    if(rating>4, 'dobra', 'przecietna') as ocena
from ksiazki;

-- 4. Ile mamy książek dobrych, ale ile mniej dobrych? (granicą niech będzie rating 4)
select ocena, count(*)
from widok_oceny
group by ocena;
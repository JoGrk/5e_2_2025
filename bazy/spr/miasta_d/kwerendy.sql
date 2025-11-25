SELECT LOWER(nazwa) AS nazwa_wojewodztwa
FROM wojewodztwa;

SELECT COUNT(*) AS liczba_miast
FROM miasta
WHERE id_wojewodztwa = 1;

SELECT miasta.nazwa AS miasto,
       wojewodztwa.nazwa AS wojewodztwo
FROM miasta
JOIN wojewodztwa ON miasta.id_wojewodztwa = wojewodztwa.id
WHERE miasta.nazwa LIKE 'Lu%'
ORDER BY miasta.nazwa;

SELECT wojewodztwa.nazwa AS wojewodztwo,
       COUNT(miasta.id) AS "Liczba miast"
FROM wojewodztwa
JOIN miasta ON miasta.id_wojewodztwa = wojewodztwa.id
GROUP BY wojewodztwa.id;

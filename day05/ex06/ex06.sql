SELECT `title`, `summary`
FROM `film`
WHERE UCASE(`summary`)
LIKE '%VINCENT%'
ORDER BY `id_film`;

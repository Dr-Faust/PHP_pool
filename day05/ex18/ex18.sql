SELECT name
FROM distrib
WHERE id_distrib = 42
OR (id_distrib >= 62 AND id_distrib <= 69)
OR id_distrib = 71
OR (id_distrib >= 88 AND id_distrib <= 90)
OR name LIKE '%y%y%'
OR name LIKE 'Y%y%'
OR name LIKE '%Yy%'
OR name LIKE '%Y%Y%'
LIMIT 2, 5;

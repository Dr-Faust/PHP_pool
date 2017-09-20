SELECT `film`.`id_genre` AS 'id_genre', `genre`.`name` AS 'name_genre',
	`film`.`id_distrib` AS 'id_distrib', `distrib`.`name` AS 'name_distrib',
	`film`.`title` AS 'title_film'
FROM `film`
RIGHT JOIN `genre` USING(`id_genre`)
LEFT JOIN `distrib` USING(`id_distrib`)
WHERE `id_genre` >= 4
AND `id_genre` <= 8;

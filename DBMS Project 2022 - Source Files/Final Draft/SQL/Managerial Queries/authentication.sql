CREATE VIEW `Authentication` AS 
SELECT user_id, `first_name`, `last_name`
FROM `user`
WHERE `password` = '$2a$12$D3sepOMfL5NAYBDA8Nfk1OS/4uxtYCTekD2JDJZ3gmEsNbbqSuRw.'
AND username = 'ibreti';
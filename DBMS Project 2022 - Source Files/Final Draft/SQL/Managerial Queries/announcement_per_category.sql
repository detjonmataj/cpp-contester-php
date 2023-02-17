-- All announcements per patch categories
CREATE VIEW `Announcements for Patches` AS 
SELECT announcement_id, 
title as 'Announcement Title', 
`description` AS 'Announcement Description', 
`name` AS 'Category Name'
FROM announcement AS an
JOIN announcement_category AS an_cat
ON an.announcement_category_id = an_cat.announcement_category_id
WHERE an.announcement_category_id = 2;



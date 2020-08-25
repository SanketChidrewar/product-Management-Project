# productManagement-Project
used Html,css,Javascript,jQuery,ajax for front end 
and PHP for backend for creating webservices(API) for adding,deleting and edit the product details
according to respective user and also used session management  

database technology used is mysql

mysql> desc user;
+----------+--------------+------+-----+---------+----------------+
| Field    | Type         | Null | Key | Default | Extra          |
+----------+--------------+------+-----+---------+----------------+
| id       | int(11)      | NO   | PRI | NULL    | auto_increment |
| name     | varchar(255) | YES  |     | NULL    |                |
| email    | varchar(255) | YES  | UNI | NULL    |                |
| phone    | varchar(20)  | YES  |     | NULL    |                |
| password | varchar(255) | YES  |     | NULL    |                |
+----------+--------------+------+-----+---------+----------------+
5 rows in set (0.01 sec)

mysql> select * from user;
+----+---------+-------------------+------------+----------+
| id | name    | email             | phone      | password |
+----+---------+-------------------+------------+----------+
|  1 | Sanket  | sanket@gmail.com  | 9764595693 | sank     |
|  2 | Shubham | shubham@gmail.com | 7507272838 | shub     |
|  3 | Amar    | amar@gmail.com    | 4789578964 | amar     |
|  8 | Satyam  | satyam@gmail.com  | 4758654796 | saty     |
+----+---------+-------------------+------------+----------+
4 rows in set (0.00 sec)

mysql> desc products;
+-------------+--------------+------+-----+---------+----------------+
| Field       | Type         | Null | Key | Default | Extra          |
+-------------+--------------+------+-----+---------+----------------+
| id          | int(11)      | NO   | PRI | NULL    | auto_increment |
| title       | varchar(255) | YES  |     | NULL    |                |
| description | varchar(255) | YES  |     | NULL    |                |
| price       | varchar(50)  | YES  |     | NULL    |                |
| category    | varchar(255) | YES  |     | NULL    |                |
| company     | varchar(255) | YES  |     | NULL    |                |
| userid      | int(11)      | YES  |     | NULL    |                |
+-------------+--------------+------+-----+---------+----------------+
7 rows in set (0.00 sec)

mysql> select * from products;
+----+---------------+---------------------+--------+----------+---------+--------+
| id | title         | description         | price  | category | company | userid |
+----+---------------+---------------------+--------+----------+---------+--------+
|  4 | iphone 11 pro | best phone ever     | 160000 | kitchen  | samsung |      1 |
|  5 | note 20       | best phone          | 90000  | kitchen  | samsung |      1 |
|  7 | Redmi note 4  | good phone          | 12000  | mobiles  | redmi   |      1 |
| 10 | Charger       | my laptop charger   | 2000   | kitchen  | samsung |      1 |
| 11 | note 20 pro   | redmi cell phone    | 20000  | mobiles  | redmi   |      8 |
| 12 | Iphone 11     | The best phone ever | 73000  | mobiles  | apple   |      2 |
+----+---------------+---------------------+--------+----------+---------+--------+
6 rows in set (0.00 sec)


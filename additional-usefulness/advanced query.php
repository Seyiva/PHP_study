<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<title>Index</title>
		<link rel="stylesheet" href="css/bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="css/styles.css">
	</head>
	<body>
  <?php
	error_reporting(E_ALL) ;
	ini_set('display_errors','on') ;
	$host = 'localhost';
	$user = 'root';
	$password = '';
	$db_name = 'test';

	$link = mysqli_connect($host, $user, $password, $db_name);

	mysqli_query($link, "SET NAMES 'utf8'");

	//$query="" ;

	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	var_dump($result) ;
// for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
// var_dump($data) ;


1		$query="SELECT * FROM workers WHERE id IN(1,2,15)" ;
2 	$query="SELECT * FROM workers WHERE  login IN('aaa','zzz')" ;
3 	$query="SELECT * FROM workers WHERE  id IN(1,2,15) and login IN('aaa','zzz') and salary > 300 " ;
4		$query="SELECT * FROM workers WHERE salary BETWEEN 100 AND 500" ;
5		$query="SELECT * FROM workers WHERE id BETWEEN 2 AND 17 and salary BETWEEN 100 AND 500" ;
6		$query="SELECT id AS userId, login AS userLogin, salary AS userSalary FROM workers" ;
7		$query="SELECT DISTINCT salary FROM workers" ;
8		$query="SELECT DISTINCT age FROM workers" ;
9		$query="SELECT MIN(salary) FROM workers" ;
10	$query="SELECT MAX(salary) FROM workers" ;
11	$query="SELECT SUM(salary) FROM workers" ;
12	$query="SELECT SUM(salary) FROM workers WHERE age BETWEEN 21 and 24" ;
13	$query="SELECT SUM(salary) FROM workers WHERE id IN(1,15)" ;
14	$query="SELECT AVG(salary) as avg FROM workers" ;
15	$query="SELECT AVG(age) as avg FROM workers" ;
16	$query="SELECT * FROM workers WHERE date>CURRENT_DATE()" ;
17	$query="INSERT INTO workers SET name='Alex',age=21,salary=1500, login='lll', date=NOW()" ;
18	$query="INSERT INTO workers SET name='Федор',age=31,salary=900, login='ttt', date=CURRENT_DATE()" ;
19	$query="INSERT INTO workers SET name='Mary',age=31,salary=900, login='kkk', date=CURRENT_TIME()" ;
20	$query="SELECT * FROM workers WHERE YEAR(date) = 2021 " ;
21	$query="SELECT * FROM workers WHERE MONTH(date) = 1 " ;
22	$query="SELECT * FROM workers WHERE DAY(date) = 17 " ;
23	$query="SELECT * FROM workers WHERE MONTH(date) = 1 AND DAY(date) = 18 " ;
24	$query="SELECT * FROM workers WHERE DAY(date) IN(19) " ;
25	$query="SELECT * FROM workers WHERE DAYOFWEEK(date)= 3 " ;
26	$query="SELECT * FROM workers WHERE DAY(date) <= 20 and DAY(date) >=10 AND YEAR(date)= 2021 " ;
27	$query="SELECT * FROM workers WHERE DAY(date) > MONTH(date)" ;
28	$query="SELECT  DAY(date) AS day, MONTH(date) AS month, YEAR(date) AS year FROM workers" ;
29	$query="SELECT WEEKDAY(date) as today FROM workers" ;
30 вывод по отдельности
$query="SELECT EXTRACT(YEAR FROM date) AS year,
				EXTRACT(MONTH FROM date) AS month,
				EXTRACT(DAY FROM date) AS day
				FROM workers" ;
31	$query="SELECT DATE(date) as date FROM workers" ;
32	$query="SELECT DATE_FORMAT(date, '%d.%m.%Y') as new_date FROM workers" ;
33 $query= "SELECT DATE_FORMAT(date, '%Y%% %m.%d') FROM workers" ;
34	$query="SELECT DATE_ADD(date, INTERVAL 1 DAY) FROM workers WHERE name= 'Alex' " ;
35	$query="SELECT DATE_ADD(date, INTERVAL -1 DAY) FROM workers WHERE name= 'Alex' " ;
36	$query="SELECT *, SELECT DATE_ADD(date, INTERVAL "1:2" DAY_HOUR) FROM workers WHERE name= 'Alex' " ;
37	$query="SELECT DATE_ADD(date, INTERVAL "1:2" YEAR_MONTH) FROM workers " ;
38	SELECT DATE_SUB(date, INTERVAL "1:2:3" DAY_SECOND) FROM workers
39  SELECT DATE_SUB(date, INTERVAL "2:3:5" HOUR_SECOND) FROM workers WHERE
40	SELECT DATE_SUB(date, INTERVAL "1 2:3:5" DAY_SECOND) FROM workers
41	$query="SELECT DATE_ADD(date, INTERVAL '1:-2' DAY_HOUR) FROM workers " ;
42	$query="SELECT DATE_ADD(date, INTERVAL '1 -2 -3' DAY_MINUTE) FROM workers  WHERE name = 'Федор'" ;
На математические операции
43	$query="SELECT 3 AS res FROM workers" ;
44	$query="SELECT 'eee' AS res FROM workers" ;
45	$query="SELECT 3  FROM workers" ;
46	$query="SELECT SUM(salary+age) AS res FROM workers WHERE name='Дима' " ;
47	$query="SELECT SUM(salary-age) AS res FROM workers WHERE name='Дима' " ;
48	$query="SELECT (salary*age) AS res FROM workers WHERE name='Дима' " ;
49	$query="SELECT ((salary*age)/2) AS res FROM workers WHERE name='Дима' " ;
50 	$query="SELECT (MONTH(date) + DAY(date)) < 20 AS res FROM workers " ;

51	$query="SELECT id, LEFT(comment, 4) as comment FROM workers" ;
52	$query="SELECT id, RIGHT(comment, 4) as comment FROM workers" ;
53	$query="SELECT id, SUBSTRING(comment, 4,7) as comment FROM workers" ;

55	$query="SELECT *, CONCAT(age, salary) as res FROM workers WHERE id=15" ;
56	$query="SELECT *, CONCAT(age, '!!!',salary) as res FROM workers WHERE id=15" ;
57	$query="SELECT *, CONCAT_WS('-', age, salary) as res FROM workers WHERE id=15" ;
58	$query="SELECT CONCAT (LEFT(comment, 4), '...') AS com FROM workers WHERE id=15" ;

59	$query="SELECT age, MIN(salary) as min FROM workers GROUP BY age" ;
60	$query="SELECT MAX(age) FROM workers GROUP BY salary " ;
61	$query="SELECT age, GROUP_CONCAT(id SEPARATOR '-') as res FROM workers GROUP BY age" ;
//	На подзапросы
62	$query="SELECT * FROM workers WHERE salary >(SELECT AVG(salary) FROM workers)" ;
63	$query="SELECT * FROM workers WHERE age < (SELECT AVG(age)/2*3 FROM workers)" ;
64	$query="SELECT * FROM workers WHERE salary=(SELECT MIN(salary) FROM workers)" ;
65	$query="SELECT * FROM workers WHERE salary=(SELECT MAX(salary) FROM workers)" ;
66	$query="SELECT MAX(salary) AS max FROM workers WHERE age = 25 " ;
67	$query="SELECT (SELECT (MAX(age) - MIN(age))/2 FROM workers) AS avg" ;
68	$query="SELECT (SELECT (MAX(salary) - MIN(salary))/2 FROM workers ) AS avg FROM workers WHERE age = 21" ;

// Работа с полями
/* $query="CREATE TABLE Customers
(
	`Id` INT(1),
	`Age` INT(8),
	`FirstName` NVARCHAR(20),
	`LastName` NVARCHAR(20),
	`Email` VARCHAR(30),
	`Phone` VARCHAR(20)
)" ; */

 ?>

</body>
</html>

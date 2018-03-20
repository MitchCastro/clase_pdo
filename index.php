<?php 

$host = 'localhost';
$dbname = 'clase_pdo';
$users = 'root';
$pass = '';

TRY{
//msql con PDO_MYSQL
$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$users,$pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e){
	echo $e->getmessage();
}

//execute()
/*$stmt = $pdo->prepare ("INSERT INTO users(username, password, status)
	values ('mitch', '12345', 1)");
$stmt->execute(); */

//QUERY
/*$insertados = $pdo->query("INSERT INTO users(username,password,status)
	values('byyjesus','123456',1)");*/

//borrar dato especifico
/*$pdo->exec("DELETE FROM users where username='mitch'");*/

//prepare
//marcadores anonimos
/*$stmt = $pdo->prepare('INSERT INTO user (username,password,status)
	values (?,?,?)');*/

//marcadores conocidos
$stmt = $pdo->prepare('INSERT INTO users (username,password,status)
	values (:usern, :pssw, :sts)'); 

//BIND
$stmt->bindparam(':usern', $usern);
$stmt->bindparam(':pssw', $pssw);
$stmt->bindparam(':sts', $sts);

//EXECUTE 
$usern = 'byjesus';
$pssw = '12345';
$sts = 1;
$stmt->execute();



$pdo = null;

 ?>
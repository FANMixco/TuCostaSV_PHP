<?PHP
	header("Content-Type: text/html; charset=utf-8");
	require_once 'config.inc.php';
	require_once 'Database.class.php';
	$sql;
	
	if ($_GET)
		$sql	= "SELECT * FROM types WHERE idtype=".$_GET['idtype'];
	else
		$sql="SELECT (SELECT COUNT(idtype) from places where idtype=t.idtype) total, t.*, CONCAT('http://localhost/beach/images/type/',t.idtype, '.jpg') image FROM types t group by t.idtype having total>0";
	$db = new Database('localhost', 'root', '', 'beach');
	$db->connect();
	echo $db->query2JSON($sql);
	$db->close();
?>
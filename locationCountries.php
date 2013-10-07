<?PHP
	header("Content-Type: text/html; charset=utf-8");
	require_once 'config.inc.php';
	require_once 'Database.class.php';
	$sql	= "select idruin, (SELECT idcountry c FROM countries c WHERE idcountry=ruins.idcountry) as idcountry, lat as latitude, ruins.long as longitude, CONCAT('http://mayaroute.hostingsiteforfree.com/gallery/',idruin, '.jpg') as image, name from ruins";
	if ($_GET)
		$sql	.= " where idcountry=".$_GET['id'];	
	$db = new Database('mysql.1freehosting.com', 'u219514468_mayar', 'tipsal2013', 'u219514468_mayar');
	$db->connect();
	echo $db->query2JSON($sql);
	$db->close();
?>
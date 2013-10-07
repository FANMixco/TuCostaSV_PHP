<?PHP
	header("Content-Type: text/html; charset=utf-8");
	if ($_GET){	
		require_once 'config.inc.php';
		require_once 'Database.class.php';
		$sql	= "select c.cod as cod, lat as latitude, r.long as longitude, r.name as ruin, c.name as country, description, CONCAT('http://mayaroute.hostingsiteforfree.com/gallery/',idruin, '.jpg') as image from ruins r, countries c where r.idcountry=c.idcountry and idruin=".$_GET['id'];
		$db = new Database('mysql.1freehosting.com', 'u219514468_mayar', 'tipsal2013', 'u219514468_mayar');
		$db->connect();
		echo $db->query2JSON($sql);
		$db->close();
	}
?>
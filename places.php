<?PHP
	header("Content-Type: text/html; charset=utf-8");
	require_once 'config.inc.php';
	require_once 'Database.class.php';
	$sql	= "SELECT idplace, p.idtype, s.name state, t.name type, p.name place, description, email, phone, schedule, latitude, longitude, CONCAT('http://localhost/beach/images/places/',p.idplace, '.jpg') as image FROM places p, states s, types t WHERE p.idstate=s.idstate AND p.idtype=t.idtype";
	if ($_GET)
	{
		if (@$_GET['idplace'])
			$sql	.= " AND idplace=".$_GET['idplace'];
		if (@$_GET['idtype'])
			$sql .= " AND t.idtype=".$_GET['idtype'];
	}
	$db = new Database('localhost', 'root', '', 'beach');
	$db->connect();
	echo $db->query2JSON($sql);
	$db->close();
?>
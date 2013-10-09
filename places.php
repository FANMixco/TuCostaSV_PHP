<?PHP
	header("Content-Type: text/html; charset=utf-8");
	require_once 'config.inc.php';
	require_once 'Database.class.php';
	$sql	= "SELECT idplace, p.idtype, s.name state, t.name type, p.name place, description, email, phone, website, extra, schedule, latitude, longitude, CONCAT('http://localhost/beach/images/places/',p.idplace, '.jpg') as image, vote FROM places p, states s, types t WHERE p.idstate=s.idstate AND p.idtype=t.idtype";
	if ($_GET)
	{
		if (@$_GET['idplace'])
		{
			$sql	.= " AND idplace=".$_GET['idplace'];
			//	echo $sql;
		}
		if (@$_GET['idtype'])
			$sql .= " AND t.idtype=".$_GET['idtype'];
		if (@$_GET['lat'])
		{
			$lat=round($_GET['lat'],3);
			$long=round($_GET['long'],3);
			
			$sql.=" AND (latitude BETWEEN ".($lat-0.01)." AND ".($lat+0.01).") AND (".($long-0.01)." AND ".($long+0.01).") AND (latitude<>".$_GET['lat']." AND longitude<>".$_GET['long'].")";
			//echo $sql;
		}
	}
	
	$sql.=" ORDER BY vote DESC";
	
//	echo $sql;
	$db = new Database('localhost', 'root', '', 'beach');
	$db->connect();
	echo $db->query2JSON($sql);
	$db->close();
?>
<?PHP
	if ($_GET)
	{
		header("Content-Type: text/html; charset=utf-8");
		require_once 'config.inc.php';
		require_once 'Database.class.php';
		$sql	= "SELECT comments AS reason, joindate AS date_entry FROM votes WHERE idplace=".$_GET['id'];
		$db = new Database('localhost', 'root', '', 'beach');
		$db->connect();
		echo $db->query2JSON($sql);
		$db->close();
	}
?>
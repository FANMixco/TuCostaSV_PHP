<?PHP
	if ($_GET)
	{
		header("Content-Type: text/html; charset=utf-8");
		require_once 'config.inc.php';
		require_once 'Database.class.php';
		$sql	= "SELECT COUNT(iduser) AS created FROM users WHERE iduser='".$_GET['user']."' AND password='".$_GET['pass']."'";
		$db = new Database('localhost', 'root', '', 'beach');
		$db->connect();
		echo $db->query2JSON($sql);
		$db->close();
	}
?>
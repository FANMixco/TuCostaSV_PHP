<?PHP
	if ($_GET)
	{
		header("Content-Type: text/html; charset=utf-8");
		require_once 'config.inc.php';
		require_once 'Database.class.php';
//		$sql	= "INSERT INTO votes(iduser, idplace, vote, comments) VALUES('".$_GET['user']."',".$_GET['place'].",".$_GET['vote'].",'".$_GET['comment']."')";
		$db = new Database('localhost', 'root', '', 'beach');
		$db->connect();
		echo $db->insert_vote($_GET['user'],$_GET['place'],$_GET['vote'],$_GET['comment']);
		$db->close();
	}
?>
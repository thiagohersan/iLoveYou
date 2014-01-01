<?php
	session_start();
	require_once('php-sdk/facebook.php');

	$configs = $_SESSION['configs'];
	$likeId = (string)$_POST['id'];
	$appIndex = ($_POST['index'])%(count($configs));

	try {
		$facebook = new Facebook($configs[$appIndex]);
		$apiRet = $facebook->api('/'.$likeId.'/likes', 'post');
	} catch (Exception $e) {
		$apiRet = array('error' => array('message' => 'from php: '.$e->getMessage()));
	}

	$ret = json_encode($apiRet);

	$success = true;
	echo $ret;
?>
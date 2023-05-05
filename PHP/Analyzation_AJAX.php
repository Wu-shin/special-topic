<?php
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Request-Method: POST');
	header('Access-Control-Request-Headers: *');
	header('Access-Control-Expose-Headers: *');
	
	require_once '../../DatabaseManageUI/DataBaseAccount.php';
	$SearchTarget = $_POST["TargetSoftwareType"];
	$sql = "SELECT * FROM soft_list WHERE Software_Type = '$SearchTarget';";
	$Row_Numbers = mysqli_num_rows(mysqli_query($link, $sql));
	$response = array();
	$result = mysqli_query($link, $sql);
	$item = 0;
	while($row = mysqli_fetch_assoc($result)){
		array_push($response,array(
        "Software_Name" => $row["Software_Name"]
    	));
		$jData = array($row["Software_Name"]);
		$item = $item + 1;
	}
	$response = json_encode($response);
	// 讓瀏覽器知道我們要印出 JSON 格式
	header('Content-Type: application/json; charset=utf-8');
	echo $response;
	//header("Location: /Graduate_Porject/DatabaseManageUI/DatabaseManageUI.php");
?>

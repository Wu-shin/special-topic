<?php
require_once '../../DatabaseManageUI/DataBaseAccount.php';

if(isset($_POST['CPU'])){
    $CPU_id = $_POST['CPU'];
    $GPU_id = $_POST['GPU'];
    $OC_id = $_POST['OC'];
    $VGA_id = $_POST['VGA'];
    
    if($VGA_id == "1"){
        $GPU_id = "Inte_VGA";
    }

    $sql = "SELECT * FROM ca.power WHERE pw_CPU = '" . $CPU_id . "' AND pw_GPU = '" . $GPU_id ."'" . " AND pw_OC = " . $OC_id ."";
    $Result = mysqli_query($link,$sql);
    $Row_Numbers = mysqli_fetch_assoc($Result);
    $power = $Row_Numbers["pw_W"];
    $price = $Row_Numbers["Power_Price"];

    echo $power . "," . $price;
    return;
}



?>



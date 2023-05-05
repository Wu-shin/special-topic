<?php
require_once '../../DatabaseManageUI/DataBaseAccount.php';

//CPU
if(isset($_POST['CPU'])){
    $CPU_id = $_POST['CPU'];
    if($CPU_id == "none"){
        echo 0;
        return;
    }
    
    //CPU_price = SQL查詢;
    $sql = "SELECT * FROM ca.cpu WHERE CPU_NAME = '" . $CPU_id . "'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);
    $CPU_Price = $row["cpu_price"];
    
    // echo CPU_price;
    echo $CPU_Price;
    return;
}
//MB
if(isset($_POST['MB'])){
    $MB_id = $_POST['MB'];
    if($MB_id == "none"){
        echo 0;
        return;
    }

    //MB_price = SQL查詢;
    $sql = "SELECT * FROM ca.mb WHERE MB_Name = '" . $MB_id . "'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);
    $mb_Price = $row["mb_price"];
    
    // echo MB_price;
    echo $mb_Price;
    return;

}
//GPU
if(isset($_POST['GPU'])){
    $GPU_id = $_POST['GPU'];
    if($GPU_id == "none"){
        echo 0;
        return;
    }

    //GPU_price = SQL查詢;
    $sql = "SELECT * FROM ca.gpu WHERE GPU_NAME = '" . $GPU_id . "'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);
    $CPU_Price = $row["gpu_price"];

    // echo GPU_price;
    echo $CPU_Price;
    return;
}
//Memory
if(isset($_POST['Memory'])){
    $Memory_id = $_POST['Memory'];
    if($Memory_id == "none"){
        echo 0;
        return;
    }

    //memory_price = SQL查詢;
    $sql = "SELECT * FROM ca.memory WHERE Memory_Name = '" . $Memory_id . "'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);
    $Memory_Price = $row["mem_price"];

    // echo Memory_price;
    echo $Memory_Price;
    return;
}
//Disk
if(isset($_POST['Disk'])){
    $Disk_id = $_POST['Disk'];
    if($Disk_id == "none"){
        echo 0;
        return;
    }
    
    //Disk_price = SQL查詢;
    $sql = "SELECT * FROM ca.ssd WHERE SSD_Name = '" . $Disk_id . "'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);
    $Disk_Price = $row["ssd_price"];

    // echo Disk_Price
    echo $Disk_Price;
    return;
}

?>

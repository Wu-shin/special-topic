<?php
require_once '../../DatabaseManageUI/DataBaseAccount.php';

if(isset($_POST['CPU'])){
    $CPU_id = $_POST['CPU'];
    if($CPU_id == "none"){
        echo FALSE;
        return;
    }
    
    $sql = "SELECT * FROM ca.cpu WHERE CPU_NAME = '" . $CPU_id . "'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);
    $CPU_OC = $row["cpu_OC"];
    
    echo $CPU_OC;
    return;
}
if(isset($_POST['MB'])){
    $MB_id = $_POST['MB'];
    if($MB_id == "none"){
        echo FALSE;
        return;
    }

    $sql = "SELECT * FROM ca.mb WHERE MB_Name = '" . $MB_id . "'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);
    $mb_OC = $row["mb_OC"];

    echo $mb_OC;
    return;
}
if(isset($_POST['GPU'])){
    $GPU_id = $_POST['GPU'];
    if($GPU_id == "none"){
        echo FALSE;
        return;
    }

    $sql = "SELECT * FROM ca.gpu WHERE GPU_NAME = '" . $GPU_id . "'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);
    $gpu_OC = $row["gpu_OC"];

    echo $gpu_OC;
    return;
}
if(isset($_POST['Memory'])){
    $Memory_id = $_POST['Memory'];
    if($Memory_id == "none"){
        echo FALSE;
        return;
    }

    $sql = "SELECT * FROM ca.memory WHERE Memory_Name = '" . $Memory_id . "'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);
    $Memory_OC = $row["mem_OC"];

    echo $Memory_OC;
    return;
}
if(isset($_POST['CPU_VGA'])){
    $CPU_id = $_POST['CPU_VGA'];
    if($CPU_id == "none"){
        echo FALSE;
        return;
    }
    
    $sql = "SELECT * FROM ca.cpu WHERE CPU_NAME = '" . $CPU_id . "'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);
    $CPU_VGA = $row["Inte_VGA"];
    
    echo $CPU_VGA;
    return;
}

?>

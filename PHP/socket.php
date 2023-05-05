<?php
require_once '../../DatabaseManageUI/DataBaseAccount.php';

if(isset($_POST['CPU'])){
    $CPU_id = $_POST['CPU'];
    $result_string = '<option value="none">選擇Mother Board</option>';
    $brand = ["技嘉 ","華碩 ","華擎 ","微星 "];
    $brand_ENG = ["GIGABYTE","ASUS_ROG","ASRock","MSI"];
    $brand_ENG = [  ["GIGABYTE_Aero","GIGABYTE_AORUS","GIGABYTE_Gaming","GIGABYTE_Ultra_Durable","GIGABYTE_VISION"],
                    ["ASUS_PRIME","ASUS_Pro","ASUS_ProArt","ASUS_ROG","ASUS_TUF"],
                    ["ASRock","ASRock_Phantom_Gaming","ASRock_PRO","ASRock_Steel_Legend","ASRock_Taichi"],
                    ["MSI_MAG","MSI_MEG","MSI_MPG","MSI_Pro_Series"]];

    for($i = 0;$i < count($brand);$i++){
        $result_string .= '<optgroup label="' . $brand[$i] . '" style="background-color: rgb(221, 220, 220);">';

        if($CPU_id == "none"){
            $sql = "SELECT * FROM ca.mb ORDER BY MB_Name DESC";
        }
        else{
            //CPU socket SQL查詢;
            $sql = "SELECT * FROM ca.cpu WHERE CPU_NAME = '" . $CPU_id . "'";
            $result = mysqli_query($link, $sql);
            $row = mysqli_fetch_assoc($result);
            $CPU_socket = $row["CPU_Socket"];
            $sql = "SELECT * FROM ca.mb WHERE MB_CPU_Socket = '" . $CPU_socket . "'" . "ORDER BY MB_Name DESC" ;
        }
        for($j = 0;$j < count($brand_ENG[$i]);$j++){
            $visible = TRUE;
            $result = mysqli_query($link, $sql);
            
            while ($row = mysqli_fetch_assoc($result)) {
                $mb_Brand = $row["mb_Brand"];
                $mb_Year = $row["mb_year"];
                $mb_Size = $row["mb_Size"];
                $mb_OC = $row["mb_OC"];
                $mb_Price = $row["mb_price"];
                $mb_Series = $row["mb_series"];
                $mb_OEM = $row["mb_OEM"];
                $mb_Name = $row["MB_Name"];
                // $mb_Abbreviation = $row["MB_Abbreviation"];
                // $mb_Series_Generation = $row["mb_series_generation"];
                $mb_Support = $row["mem_support"];
                // $mb_CPU_Socket = $row["MB_CPU_Socket"];
                if($mb_OC == 1) $temp = "可超頻";
                else $temp = "不可超頻";
                if($mb_OEM == $brand_ENG[$i][$j]){
                    if($visible == TRUE){
                        $result_string .= '<optgroup label="' . $brand_ENG[$i][$j] . '">';
                        $visible = FALSE;
                    }
                    $result_string .= "<option value='" . $mb_Name . "'>". $mb_Name . " " . $mb_Support ." ". $mb_Size . " " . $temp ." " . $mb_Year ." NT$" . $mb_Price . "</option>\n";
                }
            }
            if($visible == FALSE)
                $result_string .= '</optgroup>';
        }
        $result_string .= '</optgroup>';
    }
    echo $result_string;
    return;
}

if(isset($_POST['MB'])){
    $MB_id = $_POST['MB'];
    $result_string = '<option value="none">選擇Memory</option>';
    $brand = ["金士頓","芝奇","美光","優美克斯"];
    $brand_ENG = [["Kingston_Fury_Beast","Kingston","Kingston_ECC"],
                ["G.SKILL_Ripjaws_S5焰刀","G.SKILL_Ripjaws_V","G.SKILL_炫鋒戟","G.SKILL_幻光戟","G.SKILL_皇家戟","G.SKILL_焰光戟"],
                ["Crucial"],
                ["UMAX"]];

    for($i = 0;$i < count($brand);$i++){
        $result_string .= '<optgroup label="' . $brand[$i] . '" style="background-color: rgb(221, 220, 220);">';

        if($MB_id == "none"){
            $sql = "SELECT * FROM ca.memory ORDER BY Memory_Name DESC";
        }
        else{
            //memorysocket SQL查詢;
            $sql = "SELECT * FROM ca.mb WHERE MB_Name = '" . $MB_id . "'";
            $result = mysqli_query($link, $sql);
            $row = mysqli_fetch_assoc($result);
            $mem_socket = $row["mem_support"];
            $sql = "SELECT * FROM ca.memory WHERE mem_type = '" . $mem_socket . "'" . "ORDER BY Memory_Name DESC" ;
        }

        for($j = 0;$j < count($brand_ENG[$i]);$j++){
            $visible = TRUE;
            $result = mysqli_query($link, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $memory_Brand = $row["mem_Brand"];
                $memory_OC = $row["mem_OC"];
                $memory_Price = $row["mem_price"];
                $memory_Type = $row["mem_type"];
                $memory_Rate = $row["mem_rate"];
                $memory_Channel = $row["mem_channel"];
                $memory_Name = $row["Memory_Name"];
                $memory_Abbreviation = $row["Memory_Abbreviation"];
                $memory_Capacity = $row["mem_Capacity"];
                $memory_Platform = $row["Memory_Platform"];
                if($memory_Brand == $brand_ENG[$i][$j] && $memory_Platform == "Desktop"){
                    if($visible == TRUE){
                        $result_string .= '<optgroup label="' . $brand_ENG[$i][$j] . '">';
                        $visible = FALSE;
                    }
                    // $result_string .= "<option value='" . $memory_Name . "'>". $brand[$i] . "_" . $memory_Type . "_" . $memory_Rate . "_" . $memory_Capacity . "*" . $memory_Channel . " NT$" . $memory_Price ."</option>\n";
                    $result_string .= "<option value='" . $memory_Name . "'>". $memory_Name . " NT$" . $memory_Price ."</option>\n";
                }
            }
            if($visible == FALSE)
                $result_string .= '</optgroup>';
        }
        $result_string .= '</optgroup>';
    }
    echo $result_string;
    return;
}

?>

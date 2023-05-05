<!DOCTYPE html>
<html>
<head>
    <?php
        require_once '../DatabaseManageUI/DataBaseAccount.php';
        //取得人數
        $sql = "SELECT * FROM ca.visitor";
        $result = mysqli_query($link, $sql);
        $row = mysqli_fetch_assoc($result);
        $visitor = $row["form_record"];
        // is_visitor
        // index analyze form introduce about_me
        //1/1/1/1/1
        if(isset($_COOKIE["is_visitor"])){
            //有COOKIE
            $Cookie_value = explode('/',  $_COOKIE["is_visitor"]);
            //有COOKIE，但form(2)為0
            if($Cookie_value[2] == "0"){
                //人數 + 1
                $new_visitor = (int) $visitor + 1;
                $sql = "UPDATE ca.visitor set form_record = $new_visitor WHERE form_record = $visitor";
                $result = mysqli_query($link, $sql);
                
                //COOKIE 儲存回去
                $value = $Cookie_value[0] . "/" . $Cookie_value[1] . "/1" . "/". $Cookie_value[3] . "/". $Cookie_value[4];
                setcookie("is_visitor", $value, time()+3600);
            }
        }else{
            //無COOKIE，設定COOKIE
            setcookie("is_visitor", "0/0/1/0/0", time()+3600);
                //人數 + 1
            $new_visitor = (int) $visitor + 1;
            $sql = "UPDATE ca.visitor set form_record = $new_visitor WHERE form_record = $visitor";
            $result = mysqli_query($link, $sql);
        }
    ?>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./CSS/form.css">
    <link rel="stylesheet" href="./CSS/header.css">
    <link rel="stylesheet" href="./CSS/sidebar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>硬體選擇</title>
</head>
<body>
    <header class="desktop">
        <ul>
            <div>
                <a href="./index.php">
                    <img src="./picture/logo2.png" alt="" id="logo">
                    <!-- <img src="./picture/logo.png" alt="" id="logo">
                    <h3><strong>電腦硬體需求分析平台</strong></h3> -->
                </a>
            </div>
            <li><a href="analyze.php">推薦分析</a></li>
            <li><a class="active" href="#">硬體選擇</a></li>
            <li><a href="introduce.php">硬體介紹</a></li>
            <li><a href="about_me.php">關於我們</a></li>
            <li><a href="../Login_Page/Login_Page.html"><img id="user_logo" src="./picture/user.jpg" alt=""></a></li>
        </ul>
    </header>

    <div class="phone">
        <header>
            <button class="open-btn">
                <!-- 使用Font Awesome的Icon -->
                <i class="fa fa-bars"></i>
            </button>
            <a href="./index.php">
                <img src="./picture/logo2.png" alt="" id="logo">
                <!-- <img src="./picture/logo.png" alt="" id="logo"> -->
                <!-- <h3><strong>電腦硬體需求分析平台</strong></h3> -->
            </a>
        </header>
    
        <div class="sidebar">
            <div class="sidebar-header">
                <!-- 匯入標題圖片 -->
                <img src="" alt="">
                <h1 class="menu">Menu</h1>
                <li><a href="./analyze.php">推薦分析</a></li>
                <li><a href="./form.php">硬體選擇</a></li>
                <li><a href="./introduce.php">硬體介紹</a></li>
                <li><a href="./about_me.php">關於我們</a></li>
                <!-- 關閉按鈕 -->
                <button class="close-btn">
                    <i class="fa fa-close"></i>
                </button>
            </div>
            <div class="dark"></div>
        </div>
    </div>

    <div class="price_nav">
        <span>總金額</span>
        <span id="total_price">NT$0</span>
    </div>

    <!-- CPU -->
    <main>
        <div class="left">
            <table class="rank_table">
                <tr></tr>
                <tr>
                    <td colspan="2">INTEL</td>
                    <td> </td>
                    <td colspan="2">AMD</td>
                </tr>
                <tr>
                    <td>系列</td>
                    <td>跑分</td>
                    <td rowspan="50"><img src="./picture/arrow.jpg" id="cpu_arrow"></td>
                    <td>系列</td>
                    <td>跑分</td>
                </tr>
                <tr> <td></td><td></td><td id="AMD_R9_7950X3D" class="cpu_click">AMD_R9_7950X3D</td><td>64145</td> </tr>
                <tr> <td id="Intel_i9_13900KS" class="cpu_click">Intel_i9_13900KS</td><td>63162</td><td id="AMD_R9_7950X" class="cpu_click">AMD_R9_7950X</td><td>63434</td> </tr>
                <tr> <td id="Intel_i9_13900K" class="cpu_click">Intel_i9_13900K</td><td>60031</td><td></td><td></td> </tr>
                <tr> <td id="Intel_i9_13900KF" class="cpu_click">Intel_i9_13900KF</td><td>59749</td><td></td><td></td> </tr>
                <tr> <td id="Intel_i9_13900F" class="cpu_click">Intel_i9_13900F</td><td>58554</td><td></td><td></td> </tr>
                <tr> <td id="Intel_i9_13900" class="cpu_click">Intel_i9_13900</td><td>50765</td><td id="AMD_R9_7900X" class="cpu_click">AMD_R9_7900X</td><td>52067</td> </tr>
                <tr> <td></td><td></td><td id="AMD_R9_7900X3D" class="cpu_click">AMD_R9_7900X3D</td><td>51453</td> </tr>
                <tr> <td id="Intel_i7_13700K" class="cpu_click">Intel_i7_13700K</td><td>46959</td><td id="AMD_R9_7900" class="cpu_click">AMD_R9_7900</td><td>48358</td> </tr>
                <tr> <td id="Intel_i7_13700KF" class="cpu_click">Intel_i7_13700KF</td><td>46496</td><td></td><td></td> </tr>
                <tr> <td id="Intel_i9_12900KS" class="cpu_click">Intel_i9_12900KS</td><td>44526</td><td></td><td></td> </tr>
                <tr> <td id="Intel_i9_12900K" class="cpu_click">Intel_i9_12900K</td><td>41674</td><td></td><td></td> </tr>
                <tr> <td id="Intel_i9_12900KF" class="cpu_click">Intel_i9_12900KF</td><td>41389</td><td></td><td></td> </tr>
                <tr> <td id="Intel_i7_13700" class="cpu_click">Intel_i7_13700</td><td>39657</td><td id="AMD_R9_5900X" class="cpu_click">AMD_R9_5900X</td><td>39272</td> </tr>
                <tr> <td id="Intel_i7_13700F" class="cpu_click">Intel_i7_13700F</td><td>39354</td><td></td><td></td> </tr>
                <tr> <td id="Intel_i5_13600K" class="cpu_click">Intel_i5_13600K</td><td>38445</td><td></td><td></td> </tr>
                <tr> <td id="Intel_i5_13600KF" class="cpu_click">Intel_i5_13600KF</td><td>38297</td><td></td><td></td> </tr>
                <tr> <td id="Intel_i9_12900F" class="cpu_click">Intel_i9_12900F</td><td>37361</td><td id="AMD_R7_7700X" class="cpu_click">AMD_R7_7700X</td><td>36462</td> </tr>
                <tr> <td id="Intel_i9_12900" class="cpu_click">Intel_i9_12900</td><td>34922</td><td id="AMD_R7_7700" class="cpu_click">AMD_R7_7700</td><td>34769</td> </tr>
                <tr> <td id="Intel_i7_12700K" class="cpu_click">Intel_i7_12700K</td><td>34700</td><td></td><td></td> </tr>
                <tr> <td id="Intel_i5_13500" class="cpu_click">Intel_i5_13500</td><td>32256</td><td></td><td></td> </tr>
                <tr> <td id="Intel_i7_12700F" class="cpu_click">Intel_i7_12700F</td><td>31163</td><td></td><td></td> </tr>
                <tr> <td id="Intel_i7_12700" class="cpu_click">Intel_i7_12700</td><td>31136</td><td></td><td></td> </tr>
                <tr> <td id="Intel_i5_13600" class="cpu_click">Intel_i5_13600</td><td>30423</td><td id="AMD_R5_7600X" class="cpu_click">AMD_R5_7600X</td><td>28724</td> </tr>
                <tr> <td id="Intel_i5_12600K" class="cpu_click">Intel_i5_12600K</td><td>27792</td><td id="AMD_R7_5800X" class="cpu_click">AMD_R7_5800X</td><td>28084</td> </tr>
                <tr> <td id="Intel_i5_12600KF" class="cpu_click">Intel_i5_12600KF</td><td>27460</td><td id="AMD_R7_5800X3D" class="cpu_click">AMD_R7_5800X3D</td><td>27859</td> </tr>
                <tr> <td id="Intel_i5_13400" class="cpu_click">Intel_i5_13400</td><td>26477</td><td id="AMD_R5_7600" class="cpu_click">AMD_R5_7600</td><td>27835</td> </tr>
                <tr> <td></td><td></td><td id="AMD_R7_5700X" class="cpu_click">AMD_R7_5700X</td><td>26728</td> </tr>
                <tr> <td id="Intel_i9_11900K" class="cpu_click">Intel_i9_11900K</td><td>25537</td><td></td><td></td> </tr>
                <tr> <td id="Intel_i5_13400F" class="cpu_click">Intel_i5_13400F</td><td>25424</td><td></td><td></td> </tr>
                <tr> <td id="Intel_i9_11900KF" class="cpu_click">Intel_i9_11900KF</td><td>25410</td><td id="AMD_R5_5600" class="cpu_click">AMD_R5_5600</td><td>25137</td> </tr>
                <tr> <td id="Intel_i7_11700K" class="cpu_click">Intel_i7_11700K</td><td>24659</td><td id="AMD_R7_5700G" class="cpu_click">AMD_R7_5700G</td><td>24603</td> </tr>
                <tr> <td id="Intel_i7_11700KF" class="cpu_click">Intel_i7_11700KF</td><td>24063</td><td></td><td></td> </tr>
                <tr> <td id="Intel_i9_11900" class="cpu_click">Intel_i9_11900</td><td>23042</td><td></td><td></td> </tr>
                <tr> <td id="Intel_i9_11900F" class="cpu_click">Intel_i9_11900F</td><td>22961</td><td id="AMD_R5_5600X" class="cpu_click">AMD_R5_5600X</td><td>21934</td> </tr>
                <tr> <td id="Intel_i5_12600" class="cpu_click">Intel_i5_12600</td><td>21388</td><td></td><td></td> </tr>
                <tr> <td id="Intel_i7_11700F" class="cpu_click">Intel_i7_11700F</td><td>21184</td><td></td><td></td> </tr>
                <tr> <td id="Intel_i7_11700" class="cpu_click">Intel_i7_11700</td><td>20032</td><td id="AMD_R5_5600G" class="cpu_click">AMD_R5_5600G</td><td>19850</td> </tr>
                <tr> <td id="Intel_i5_11600K" class="cpu_click">Intel_i5_11600K</td><td>19760</td><td id="AMD_R5_5500" class="cpu_click">AMD_R5_5500</td><td>19493</td> </tr>
                <tr> <td id="Intel_i5_12400F" class="cpu_click">Intel_i5_12400F</td><td>19750</td><td></td><td></td> </tr>
                <tr> <td id="Intel_i5_11600KF" class="cpu_click">Intel_i5_11600KF</td><td>19713</td><td></td><td></td> </tr>
                <tr> <td id="Intel_i5_12400" class="cpu_click">Intel_i5_12400</td><td>19551</td><td></td><td></td> </tr>
                <tr> <td id="Intel_i5_11500" class="cpu_click">Intel_i5_11500</td><td>17493</td><td></td><td></td> </tr>
                <tr> <td id="Intel_i5_11400F" class="cpu_click">Intel_i5_11400F</td><td>17193</td><td></td><td></td> </tr>
                <tr> <td id="Intel_i5_11400" class="cpu_click">Intel_i5_11400</td><td>17064</td><td></td><td></td> </tr>
                <tr> <td id="Intel_i5_11600H" class="cpu_click">Intel_i5_11600H</td><td>15527</td><td></td><td></td> </tr>
                <tr> <td id="Intel_i3_13100F" class="cpu_click">Intel_i3_13100F</td><td>15392</td><td></td><td></td> </tr>
                <tr> <td id="Intel_i3_12300" class="cpu_click">Intel_i3_12300</td><td>14843</td><td></td><td></td> </tr>
                <tr> <td id="Intel_i3_12100F" class="cpu_click">Intel_i3_12100F</td><td>14341</td><td></td><td></td> </tr>
                <tr> <td id="Intel_i3_13100" class="cpu_click">Intel_i3_13100</td><td>13669</td><td></td><td></td> </tr>
            </table>
        </div>
        
        <div class="right">
            <p><strong>中央處理器(CPU)</strong></p>
            <select name="cpu" id="cpu">
                <option value="none">選擇CPU</option>
                <optgroup label="Intel">
                    <?php 
                    require_once '../DatabaseManageUI/DataBaseAccount.php';
                    $sql = "SELECT * FROM ca.cpu ORDER BY CPU_NAME DESC";
                    $result = mysqli_query($link, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $CPU_Ver = $row["cpu_ver"];
                        $CPU_Gen = $row["cpu_gen"];
                        $CPU_Brand = $row["cpu_Brand"];
                        $CPU_Year = $row["cpu_year"];
                        $CPU_Bench = $row["cpu_Bench"];
                        $CPU_Core = $row["cpu_core"];
                        $CPU_OC = $row["cpu_OC"];
                        //"CPU_Inte_VGA" => $row["Inte_VGA"],
                        $CPU_Price = $row["cpu_price"];
                        //"CPU_Rate" => $row["cpu_rate"] 
                        $CPU_Name = $row["CPU_NAME"];
                        $CPU_Platform = $row["CPU_Platform"];
                        if($CPU_Brand == "intel" && $CPU_Platform=="Desktop")
                            echo "<option value='" . $CPU_Name . "'>" . $CPU_Name . " " . $CPU_Core . "核 " . $CPU_Year . " 跑分:" . $CPU_Bench . " NT$" . $CPU_Price . "</option>\n";
                    }
                    ?>
                </optgroup>
                <optgroup label="AMD">
                    <?php 
                    require_once '../DatabaseManageUI/DataBaseAccount.php';
                    $sql = "SELECT * FROM ca.cpu ORDER BY CPU_NAME DESC";
                    $result = mysqli_query($link, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $CPU_Ver = $row["cpu_ver"];
                        $CPU_Gen = $row["cpu_gen"];
                        $CPU_Brand = $row["cpu_Brand"];
                        $CPU_Year = $row["cpu_year"];
                        $CPU_Bench = $row["cpu_Bench"];
                        $CPU_Core = $row["cpu_core"];
                        $CPU_OC = $row["cpu_OC"];
                        //"CPU_Inte_VGA" => $row["Inte_VGA"],
                        $CPU_Price = $row["cpu_price"];
                        //"CPU_Rate" => $row["cpu_rate"] 
                        $CPU_Name = $row["CPU_NAME"];
                        $CPU_Platform = $row["CPU_Platform"];
                        if($CPU_Brand == "AMD" && $CPU_Platform=="Desktop")
                            echo "<option value='" . $CPU_Name . "'>" . $CPU_Name . " " . $CPU_Core . "核 " . $CPU_Year . " 跑分:" . $CPU_Bench . " NT$" . $CPU_Price . "</option>\n";
                    }
                    ?>
                </optgroup>
            </select>
            <div>
                <label for="overclock-cpu">超頻</label>
                <input type="checkbox" name="overclock-cpu" id="overclock-cpu">
                <span class="cpu_overclock_text">warning</span>
            </div>
            <div class="button_grid">
                <button id="hide" class="previous_btn" >Next</button>
                <button class="next_btn" id="CPU-next-btn">Next</button>
            </div>
        </div>
    </main>
    <section> 
        <div class="left"></div>
        <div class="right"></div>
    </section>
    <!-- Mother Board -->
    <main>
        <div class="left">
            <img src="" alt="圖片"  id="MB_pic" >
            <table id="MB_table">
                <tr></tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
            </table>
        </div>
        <div class="right">
            <p><strong>主機板(Mother Board)</strong> </p>
            <select name="MB" id="MB">
                    <?php
                        require_once '../DatabaseManageUI/DataBaseAccount.php';
                        $result_string = '<option value="none">選擇Mother Board</option>';
                        $brand = ["技嘉 ","華碩 ","華擎 ","微星 "];
                        $brand_ENG = [  ["GIGABYTE_Aero","GIGABYTE_AORUS","GIGABYTE_Gaming","GIGABYTE_Ultra_Durable","GIGABYTE_VISION"],
                                        ["ASUS_PRIME","ASUS_Pro","ASUS_ProArt","ASUS_ROG","ASUS_TUF"],
                                        ["ASRock","ASRock_Phantom_Gaming","ASRock_PRO","ASRock_Steel_Legend","ASRock_Taichi"],
                                        ["MSI_MAG","MSI_MEG","MSI_MPG","MSI_Pro_Series"]];

                        for($i = 0;$i < count($brand);$i++){
                            $result_string .= '<optgroup label="' . $brand[$i] . '">';
                            $sql = "SELECT * FROM ca.mb ORDER BY MB_Name DESC";
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
                    ?>
            </select>
            <div>
                <label for="overclock-MB">超頻</label>
                <input type="checkbox" name="overclock-MB" id="overclock-MB">
                <span class="MB_overclock_text">warning</span>
            </div>
            <div class="button_grid">
                <button class="previous_btn" id="MB-previous_btn">Prev.</button>
                <button class="next_btn" id="MB-next-btn">Next</button>
            </div>
        </div>
    </main>
    <section>
        <div class="left"></div>
        <div class="right"></div>
    </section>
    <!-- GPU -->
    <main>
        <div class="left">
            <table class="rank_table">
                <tr></tr>
                <tr>
                    <td colspan="2">NVIDIA</td>
                    <td></td>
                    <td colspan="2">AMD</td>
                </tr>
                <tr>
                    <td>系列</td>
                    <td>跑分</td>
                    <td rowspan="31"><img src="./picture/arrow.jpg" id="gpu_arrow"></td>
                    <td>系列</td>
                    <td>跑分</td>
                </tr>
                    <tr> <td id="NVIDIA GeForce RTX 4090" class="gpu_click">NVIDIA GeForce RTX 4090</td><td>39465</td><td></td><td></td> </tr>
                    <tr> <td id="NVIDIA GeForce RTX 4080 16GB" class="gpu_click">NVIDIA GeForce RTX 4080 16GB</td><td>35139</td><td></td><td></td> </tr>
                    <tr> <td id="NVIDIA GeForce RTX 4070 Ti" class="gpu_click">NVIDIA GeForce RTX 4070 Ti</td><td>31517</td><td id="AMD Radeon RX 7900 XTX" class="gpu_click">AMD Radeon RX 7900 XTX</td><td>31904</td> </tr>
                    <tr> <td id="NVIDIA GeForce RTX 3090 Ti" class="gpu_click">NVIDIA GeForce RTX 3090 Ti</td><td>30157</td><td></td><td></td> </tr>
                    <tr> <td></td><td></td><td id="AMD Radeon RX 7900 XT" class="gpu_click">AMD Radeon RX 7900 XT</td><td>28977</td> </tr>
                    <tr> <td id="NVIDIA GeForce RTX 3080 Ti" class="gpu_click">NVIDIA GeForce RTX 3080 Ti</td><td>27229</td><td id="AMD Radeon RX 6950 XT" class="gpu_click">AMD Radeon RX 6950 XT</td><td>27980</td> </tr>
                    <tr> <td id="NVIDIA GeForce RTX 3090" class="gpu_click">NVIDIA GeForce RTX 3090</td><td>26572</td><td id="AMD Radeon RX 6900 XT" class="gpu_click">AMD Radeon RX 6900 XT</td><td>25762</td> </tr>
                    <tr> <td id="NVIDIA GeForce RTX 3070 Ti" class="gpu_click">NVIDIA GeForce RTX 3070 Ti</td><td>23582</td><td id="AMD Radeon RX 6800 XT" class="gpu_click">AMD Radeon RX 6800 XT</td><td>23802</td> </tr>
                    <tr> <td id="NVIDIA GeForce RTX 3070" class="gpu_click">NVIDIA GeForce RTX 3070</td><td>22208</td><td></td><td></td> </tr>
                    <tr> <td id="NVIDIA GeForce RTX 2080 Ti" class="gpu_click">NVIDIA GeForce RTX 2080 Ti</td><td>21823</td><td></td><td></td> </tr>
                    <tr> <td id="NVIDIA GeForce RTX 3060 Ti" class="gpu_click">NVIDIA GeForce RTX 3060 Ti</td><td>20361</td><td id="AMD Radeon RX 6800" class="gpu_click">AMD Radeon RX 6800</td><td>20884</td> </tr>
                    <tr> <td id="NVIDIA GeForce RTX 2080 SUPER" class="gpu_click">NVIDIA GeForce RTX 2080 SUPER</td><td>19511</td><td id="AMD Radeon RX 6750 XT" class="gpu_click">AMD Radeon RX 6750 XT</td><td>19315</td> </tr>
                    <tr> <td id="NVIDIA GeForce RTX 2080" class="gpu_click">NVIDIA GeForce RTX 2080</td><td>18732</td><td id="AMD Radeon RX 6700 XT" class="gpu_click">AMD Radeon RX 6700 XT</td><td>18904</td> </tr>
                    <tr> <td id="NVIDIA GeForce RTX 2070 SUPER" class="gpu_click">NVIDIA GeForce RTX 2070 SUPER</td><td>18190</td><td></td><td></td> </tr>
                    <tr> <td id="NVIDIA GeForce RTX 3060 12GB" class="gpu_click">NVIDIA GeForce RTX 3060 12GB</td><td>17010</td><td></td><td></td> </tr>
                    <tr> <td id="NVIDIA GeForce RTX 2060 SUPER" class="gpu_click">NVIDIA GeForce RTX 2060 SUPER</td><td>16508</td><td id="AMD Radeon RX 5700 XT" class="gpu_click">AMD Radeon RX 5700 XT</td><td>16897</td> </tr>
                    <tr> <td id="NVIDIA GeForce RTX 2070" class="gpu_click">NVIDIA GeForce RTX 2070</td><td>16084</td><td id="AMD Radeon RX 6600 XT" class="gpu_click">AMD Radeon RX 6600 XT</td><td>15893</td> </tr>
                    <tr> <td></td><td></td><td id="AMD Radeon RX 6650 XT" class="gpu_click">AMD Radeon RX 6650 XT</td><td>15850</td> </tr>
                    <tr> <td></td><td></td><td id="AMD Radeon RX 5700" class="gpu_click">AMD Radeon RX 5700</td><td>14672</td> </tr>
                    <tr> <td></td><td></td><td id="AMD Radeon RX 6600" class="gpu_click">AMD Radeon RX 6600</td><td>14068</td> </tr>
                    <tr> <td id="NVIDIA GeForce RTX 2060" class="gpu_click">NVIDIA GeForce RTX 2060</td><td>13994</td><td id="AMD Radeon RX 5600 XT" class="gpu_click">AMD Radeon RX 5600 XT</td><td>13844</td> </tr>
                    <tr> <td id="NVIDIA GeForce RTX 3050" class="gpu_click">NVIDIA GeForce RTX 3050</td><td>12764</td><td></td><td></td> </tr>
                    <tr> <td id="NVIDIA GeForce GTX 1660 SUPER" class="gpu_click">NVIDIA GeForce GTX 1660 SUPER</td><td>12763</td><td></td><td></td> </tr>
                    <tr> <td id="NVIDIA GeForce GTX 1660 Ti" class="gpu_click">NVIDIA GeForce GTX 1660 Ti</td><td>11812</td><td></td><td></td> </tr>
                    <tr> <td id="NVIDIA GeForce GTX 1660" class="gpu_click">NVIDIA GeForce GTX 1660</td><td>11714</td><td></td><td></td> </tr>
                    <tr> <td id="NVIDIA GeForce GTX 1650 SUPER" class="gpu_click">NVIDIA GeForce GTX 1650 SUPER</td><td>10056</td><td></td><td></td> </tr>
                    <tr> <td></td><td></td><td id="AMD Radeon RX 6500 XT" class="gpu_click">AMD Radeon RX 6500 XT</td><td>9258</td> </tr>
                    <tr> <td></td><td></td><td id="AMD Radeon RX 5500 XT" class="gpu_click">AMD Radeon RX 5500 XT</td><td>9190</td> </tr>
                    <tr> <td></td><td></td><td id="AMD Radeon RX 6400" class="gpu_click">AMD Radeon RX 6400</td><td>6753</td> </tr>
                    <tr> <td id="NVIDIA GeForce GTX 1630" class="gpu_click">NVIDIA GeForce GTX 1630</td><td>4579</td><td></td><td></td> </tr>
            </table>
        </div>
        <div class="right">
            <p><strong>圖形處理器(GPU)</strong> </p>
            <select name="gpu" id="gpu">
                <option value="none">選擇GPU</option>
                <optgroup label="NVIDIA">
                    <?php 
                    require_once '../DatabaseManageUI/DataBaseAccount.php';
                    $sql = "SELECT * FROM ca.gpu ORDER BY GPU_Name DESC";
                    $result = mysqli_query($link, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $GPU_Brand = $row["gpu_Brand"];
                        $GPU_Year = $row["gpu_year"];
                        $GPU_Bench = $row["gpu_Bench"];
                        // $GPU_OC = $row["gpu_OC"];
                        $GPU_Price = $row["gpu_price"];
                        // $GPU_Rate = $row["gpu_rate"];
                        // $GPU_OEM = $row["gpu_OEM"];
                        // $GPU_Version = $row["gpu_version"];
                        $GPU_Name = $row["GPU_Name"];
                        $GPU_Platform = $row["GPU_Platform"];
                        // $GPU_Size = $row["GPU_Size"];
                        if($GPU_Brand == "NVIDIA" && $GPU_Platform == "Desktop")
                            echo "<option value='" . $GPU_Name . "'>" . $GPU_Name . " " . $GPU_Year . " 跑分:" . $GPU_Bench . " NT$" . $GPU_Price . "</option>\n";
                    }
                    ?>
                </optgroup>
                <optgroup label="AMD">
                    <?php 
                    require_once '../DatabaseManageUI/DataBaseAccount.php';
                    $sql = "SELECT * FROM ca.gpu ORDER BY GPU_Name DESC";
                    $result = mysqli_query($link, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $GPU_Brand = $row["gpu_Brand"];
                        $GPU_Year = $row["gpu_year"];
                        $GPU_Bench = $row["gpu_Bench"];
                        // $GPU_OC = $row["gpu_OC"];
                        $GPU_Price = $row["gpu_price"];
                        // $GPU_Rate = $row["gpu_rate"];
                        // $GPU_OEM = $row["gpu_OEM"];
                        // $GPU_Version = $row["gpu_version"];
                        $GPU_Name = $row["GPU_Name"];
                        $GPU_Platform = $row["GPU_Platform"];
                        // $GPU_Size = $row["GPU_Size"];
                        if($GPU_Brand == "AMD" && $GPU_Platform == "Desktop")
                            echo "<option value='" . $GPU_Name . "'>" . $GPU_Name . " " . $GPU_Year . " 跑分:" . $GPU_Bench . " NT$" . $GPU_Price . "</option>\n";
                    }
                    ?>
                </optgroup>
            </select>
            <div>
                <label for="overclock-gpu">超頻</label>
                <input type="checkbox" name="overclock-gpu" id="overclock-gpu">
                <span class="gpu_overclock_text">warning</span>
                <br>
                <label for="Inte_VGA">使用內顯</label>
                <input type="checkbox" name="Inte_VGA" id="Inte_VGA">
                <span class="Inte_VGA_text">warning</span>
            </div>
            <div class="button_grid">
                <button class="previous_btn" id="GPU-previous_btn">Prev.</button>
                <button class="next_btn" id="GPU-next-btn">Next</button>
            </div>
        </div>
    </main>
    <section>
        <div class="left"></div>
        <div class="right"></div>
    </section>
    <!-- Memory -->
    <main>
        <div class="left">
            <img src="" alt="圖片" id="Memory_pic">
            <table id="Memory_table">
                <tr></tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
            </table>
        </div>
        <div class="right">
            <p><strong>記憶體(Memory)</strong> </p>
            <select name="Memory" id="Memory">
                    <?php 
                        require_once '../DatabaseManageUI/DataBaseAccount.php';
                        $result_string = '<option value="none">選擇Memory</option>';
                        $brand = ["金士頓","芝奇","美光","優美克斯"];
                        $brand_ENG = ["kingston","Micron","G.SKILL","UMAX"];
                        $brand_ENG = [["Kingston_Fury_Beast","Kingston","Kingston_ECC"],
                                    ["G.SKILL_Ripjaws_S5焰刀","G.SKILL_Ripjaws_V","G.SKILL_炫鋒戟","G.SKILL_幻光戟","G.SKILL_皇家戟","G.SKILL_焰光戟"],
                                    ["Crucial"],
                                    ["UMAX"]];

                        
                        for($i = 0;$i < count($brand);$i++){
                            $result_string .= '<optgroup label="' . $brand[$i] . '" style="background-color: rgb(221, 220, 220);">';
                            $sql = "SELECT * FROM ca.memory ORDER BY Memory_Name DESC";
                            
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
                    ?>
                </optgroup>
            </select>
            <div>
                <label for="overclock-Memory">超頻</label>
                <input type="checkbox" name="overclock-Memory" id="overclock-Memory">
                <span class="Memory_overclock_text">warning</span>
            </div>
            <div class="button_grid">
                <button class="previous_btn" id="Memory-previous_btn">Prev.</button>
                <button class="next_btn" id="Memory-next-btn">Next</button>
            </div>
        </div>
    </main>
    <section>
        <div class="left"></div>
        <div class="right"></div>
    </section>
    <!-- Disk -->
    <main>
        <div class="left">
            <table class="rank_table">
                <tr></tr>
                <tr>
                    <td colspan="7">SSD</td>
                </tr>
                <tr> <td>品牌</td><td>型號</td><td>接口</td><td>讀/寫速度(MB/秒)</td><td>容量</td><td>價錢</td> </tr>
                <tr id="Kingston_KC3000_M.2_Gen4_4096GB" class="disk_click"> <td>Kingston</td><td>KC3000</td><td>M.2_Gen4</td><td>7000/7000</td><td>4TB</td><td>13499</td> </tr>
                <tr id="Kingston_KC3000_M.2_Gen4_2048GB" class="disk_click"> <td>Kingston</td><td>KC3000</td><td>M.2_Gen4</td><td>7000/7000</td><td>2TB</td><td>5199</td> </tr>
                <tr id="Kingston_KC3000_M.2_Gen4_1024GB" class="disk_click"> <td>Kingston</td><td>KC3000</td><td>M.2_Gen4</td><td>7000/6000</td><td>1TB</td><td>2680</td> </tr>
                <tr id="Kingston_KC3000_M.2_Gen4_512GB" class="disk_click"> <td>Kingston</td><td>KC3000</td><td>M.2_Gen4</td><td>7000/3900</td><td>500GB</td><td>1980</td> </tr>
                <tr id="Kingston_FURY Renegade_M.2_Gen4_4096GB" class="disk_click"> <td>Kingston</td><td>FURY Renegade</td><td>M.2_Gen4</td><td>7300/7000</td><td>4TB</td><td>14499</td> </tr>
                <tr id="Kingston_FURY Renegade_M.2_Gen4_2048GB" class="disk_click"> <td>Kingston</td><td>FURY Renegade</td><td>M.2_Gen4</td><td>7300/7000</td><td>2TB</td><td>5999</td> </tr>
                <tr id="Kingston_FURY Renegade_M.2_Gen4_1024GB" class="disk_click"> <td>Kingston</td><td>FURY Renegade</td><td>M.2_Gen4</td><td>7300/6000</td><td>1TB</td><td>2988</td> </tr>
                <tr id="Kingston_FURY Renegade_M.2_Gen4_500GB" class="disk_click"> <td>Kingston</td><td>FURY Renegade</td><td>M.2_Gen4</td><td>7300/3900</td><td>500GB</td><td>2099</td> </tr>
                <tr id="Kingston_NV2_M.2_Gen4_2048GB" class="disk_click"> <td>Kingston</td><td>NV2</td><td>M.2_Gen4</td><td>3500/2800</td><td>2TB</td><td>3350</td> </tr>
                <tr id="Kingston_NV2_M.2_Gen4_1024GB" class="disk_click"> <td>Kingston</td><td>NV2</td><td>M.2_Gen4</td><td>3500/2100</td><td>1TB</td><td>1980</td> </tr>
                <tr id="Kingston_NV2_M.2_Gen4_500GB" class="disk_click"> <td>Kingston</td><td>NV2</td><td>M.2_Gen4</td><td>3500/2100</td><td>500GB</td><td>1250</td> </tr>
                <tr id="Kingston_NV2_M.2_Gen4_250GB" class="disk_click"> <td>Kingston</td><td>NV2</td><td>M.2_Gen4</td><td>3000/1300</td><td>250GB</td><td>850</td> </tr>
                <tr id="Kingston_KC2500_M.2_Gen3_250GB" class="disk_click"> <td>Kingston</td><td>KC2500</td><td>M.2_Gen3</td><td>3500/2900</td><td>250GB</td><td>1290</td> </tr>
                <tr id="Kingston_KC2500_M.2_Gen3_500GB" class="disk_click"> <td>Kingston</td><td>KC2500</td><td>M.2_Gen3</td><td>3500/2900</td><td>500GB</td><td>2790</td> </tr>
                <tr id="Kingston_KC2500_M.2_Gen3_1TB" class="disk_click"> <td>Kingston</td><td>KC2500</td><td>M.2_Gen3</td><td>3500/2900</td><td>1TB</td><td>4500</td> </tr>
                <tr id="Kingston_KC2500_M.2_Gen3_2TB" class="disk_click"> <td>Kingston</td><td>KC2500</td><td>M.2_Gen3</td><td>3500/2900</td><td>2TB</td><td>8500</td> </tr>
                <tr id="Kingston_A2000_M.2_Gen3_250GB" class="disk_click"> <td>Kingston</td><td>A2000</td><td>M.2_Gen3</td><td>2200/2100</td><td>250GB</td><td>1199</td> </tr>
                <tr id="Kingston_A2000_M.2_Gen3_500GB" class="disk_click"> <td>Kingston</td><td>A2000</td><td>M.2_Gen3</td><td>2200/2100</td><td>500GB</td><td>1480</td> </tr>
                <tr id="Kingston_A2000_M.2_Gen3_1TB" class="disk_click"> <td>Kingston</td><td>A2000</td><td>M.2_Gen3</td><td>2200/2100</td><td>1TB</td><td>3284</td> </tr>
                <tr id="Kingston_NV1_M.2_Gen3_500GB" class="disk_click"> <td>Kingston</td><td>NV1</td><td>M.2_Gen3</td><td>2100/1700</td><td>500GB</td><td>1150</td> </tr>
                <tr id="Kingston_NV1_M.2_Gen3_1TB" class="disk_click"> <td>Kingston</td><td>NV1</td><td>M.2_Gen3</td><td>2100/1700</td><td>1TB</td><td>2290</td> </tr>
                <tr id="Kingston_NV1_M.2_Gen3_2TB" class="disk_click"> <td>Kingston</td><td>NV1</td><td>M.2_Gen3</td><td>2100/1700</td><td>2TB</td><td>4300</td> </tr>
                <tr id="WD_BLACK SN850_M.2_Gen4_500GB" class="disk_click"> <td>WD</td><td>BLACK SN850</td><td>M.2_Gen4</td><td>7000/4600</td><td>500GB</td><td>2699</td> </tr>
                <tr id="WD_BLACK SN850_M.2_Gen4_1TB" class="disk_click"> <td>WD</td><td>BLACK SN850</td><td>M.2_Gen4</td><td>7000/4600</td><td>1TB</td><td>3190</td> </tr>
                <tr id="WD_BLACK SN850_M.2_Gen4_2TB" class="disk_click"> <td>WD</td><td>BLACK SN850</td><td>M.2_Gen4</td><td>7000/4600</td><td>2TB</td><td>6790</td> </tr>
                <tr id="WD_BLACK SN770_M.2_Gen4_500GB" class="disk_click"> <td>WD</td><td>BLACK SN770</td><td>M.2_Gen4</td><td>5075/4450</td><td>500GB</td><td>1590</td> </tr>
                <tr id="WD_BLACK SN770_M.2_Gen4_1TB" class="disk_click"> <td>WD</td><td>BLACK SN770</td><td>M.2_Gen4</td><td>5075/4450</td><td>1TB</td><td>2964</td> </tr>
                <tr id="WD_BLACK SN770_M.2_Gen4_2TB" class="disk_click"> <td>WD</td><td>BLACK SN770</td><td>M.2_Gen4</td><td>5075/4450</td><td>2TB</td><td>6149</td> </tr>
                <tr id="WD_SN750_M.2_Gen4_250GB" class="disk_click"> <td>WD</td><td>SN750</td><td>M.2_Gen4</td><td>3250/2350</td><td>250GB</td><td>1180</td> </tr>
                <tr id="WD_SN750_M.2_Gen4_500GB" class="disk_click"> <td>WD</td><td>SN750</td><td>M.2_Gen4</td><td>3250/2350</td><td>500GB</td><td>2090</td> </tr>
                <tr id="WD_SN750_M.2_Gen4_1TB" class="disk_click"> <td>WD</td><td>SN750</td><td>M.2_Gen4</td><td>3250/2350</td><td>1TB</td><td>3290</td> </tr>
                <tr id="WD_SN750_M.2_Gen4_2TB" class="disk_click"> <td>WD</td><td>SN750</td><td>M.2_Gen4</td><td>3250/2350</td><td>2TB</td><td>6150</td> </tr>
                <tr id="WD_SN750_M.2_Gen4_4TB" class="disk_click"> <td>WD</td><td>SN750</td><td>M.2_Gen4</td><td>3250/2350</td><td>4TB</td><td>26540</td> </tr>
                <tr id="WD_SN850_M.2_Gen4_500GB" class="disk_click"> <td>WD</td><td>SN850</td><td>M.2_Gen4</td><td>7000/4700</td><td>500GB</td><td>2699</td> </tr>
                <tr id="WD_SN850_M.2_Gen4_1TB" class="disk_click"> <td>WD</td><td>SN850</td><td>M.2_Gen4</td><td>7000/4700</td><td>1TB</td><td>3190</td> </tr>
                <tr id="WD_SN850_M.2_Gen4_2TB" class="disk_click"> <td>WD</td><td>SN850</td><td>M.2_Gen4</td><td>7000/4700</td><td>2TB</td><td>6790</td> </tr>
                <tr id="WD_SN750_M.2_Gen3_250GB" class="disk_click"> <td>WD</td><td>SN750</td><td>M.2_Gen3</td><td>3250/2350</td><td>250GB</td><td>1180</td> </tr>
                <tr id="WD_SN750_M.2_Gen3_500GB" class="disk_click"> <td>WD</td><td>SN750</td><td>M.2_Gen3</td><td>3250/2350</td><td>500GB</td><td>2090</td> </tr>
                <tr id="WD_SN750_M.2_Gen3_1TB" class="disk_click"> <td>WD</td><td>SN750</td><td>M.2_Gen3</td><td>3250/2350</td><td>1TB</td><td>3290</td> </tr>
                <tr id="WD_SN750_M.2_Gen3_2TB" class="disk_click"> <td>WD</td><td>SN750</td><td>M.2_Gen3</td><td>3250/2350</td><td>2TB</td><td>6150</td> </tr>
                <tr id="WD_SN750_M.2_Gen3_4TB" class="disk_click"> <td>WD</td><td>SN750</td><td>M.2_Gen3</td><td>3250/2350</td><td>4TB</td><td>26540</td> </tr>
                <tr id="WD_PC SN730_M.2_Gen3_256GB" class="disk_click"> <td>WD</td><td>PC SN730</td><td>M.2_Gen3</td><td>3275/2600</td><td>256GB</td><td>2200</td> </tr>
                <tr id="WD_PC SN730_M.2_Gen3_512GB" class="disk_click"> <td>WD</td><td>PC SN730</td><td>M.2_Gen3</td><td>3275/2600</td><td>512GB</td><td>4400</td> </tr>
                <tr id="WD_PC SN730_M.2_Gen3_1TB" class="disk_click"> <td>WD</td><td>PC SN730</td><td>M.2_Gen3</td><td>3275/2600</td><td>1TB</td><td>8800</td> </tr>
                <tr id="WD_PC SN530_M.2_Gen3_256GB" class="disk_click"> <td>WD</td><td>PC SN530</td><td>M.2_Gen3</td><td>2400/1450</td><td>256GB</td><td>2200</td> </tr>
                <tr id="WD_PC SN530_M.2_Gen3_512GB" class="disk_click"> <td>WD</td><td>PC SN530</td><td>M.2_Gen3</td><td>2400/1450</td><td>512GB</td><td>4400</td> </tr>
                <tr id="WD_PC SN530_M.2_Gen3_1024GB" class="disk_click"> <td>WD</td><td>PC SN530</td><td>M.2_Gen3</td><td>2400/1450</td><td>1TB</td><td>8800</td> </tr>
                <tr id="WD Blue SN570_M.2_Gen3_250GB" class="disk_click"> <td>WD</td><td>Blue SN570</td><td>M.2_Gen3</td><td>3400/2350</td><td>250GB</td><td>1372</td> </tr>
                <tr id="WD Blue SN570_M.2_Gen3_500GB" class="disk_click"> <td>WD</td><td>Blue SN570</td><td>M.2_Gen3</td><td>3400/2350</td><td>500GB</td><td>1770</td> </tr>
                <tr id="WD Blue SN570_M.2_Gen3_1TB" class="disk_click"> <td>WD</td><td>Blue SN570</td><td>M.2_Gen3</td><td>3400/2350</td><td>1TB</td><td>2602</td> </tr>
                <tr id="WD Blue SN570_M.2_Gen3_2TB" class="disk_click"> <td>WD</td><td>Blue SN570</td><td>M.2_Gen3</td><td>3400/2350</td><td>2TB</td><td>5751</td> </tr>
                <tr id="WD Blue SN550_M.2_Gen3_250GB" class="disk_click"> <td>WD</td><td>Blue SN550</td><td>M.2_Gen3</td><td>2500/1375</td><td>250GB</td><td>1372</td> </tr>
                <tr id="WD Blue SN550_M.2_Gen3_500GB" class="disk_click"> <td>WD</td><td>Blue SN550</td><td>M.2_Gen3</td><td>2500/1375</td><td>500GB</td><td>2672</td> </tr>
                <tr id="WD Blue SN550_M.2_Gen3_1TB" class="disk_click"> <td>WD</td><td>Blue SN550</td><td>M.2_Gen3</td><td>2500/1375</td><td>1TB</td><td>3100</td> </tr>
                <tr id="WD Blue SN550_M.2_Gen3_2TB" class="disk_click"> <td>WD</td><td>Blue SN550</td><td>M.2_Gen3</td><td>2500/1375</td><td>2TB</td><td>6040</td> </tr>
                <tr id="Micron_Crucial P5 Plus_M.2_Gen4_500GB" class="disk_click"> <td>Micron</td><td>Crucial P5 Plus</td><td>M.2_Gen4</td><td>6600/5000</td><td>500GB</td><td>1888</td> </tr>
                <tr id="Micron_Crucial P5 Plus_M.2_Gen4_1TB" class="disk_click"> <td>Micron</td><td>Crucial P5 Plus</td><td>M.2_Gen4</td><td>6600/5000</td><td>1TB</td><td>3188</td> </tr>
                <tr id="Micron_Crucial P5 Plus_M.2_Gen4_2TB" class="disk_click"> <td>Micron</td><td>Crucial P5 Plus</td><td>M.2_Gen4</td><td>6600/5000</td><td>2TB</td><td>6650</td> </tr>
                <tr id="Micron_Crucial P3 Plus_M.2_Gen4_500GB" class="disk_click"> <td>Micron</td><td>Crucial P3 Plus</td><td>M.2_Gen4</td><td>5000/4200</td><td>500GB</td><td>1390</td> </tr>
                <tr id="Micron_Crucial P3 Plus_M.2_Gen4_1TB" class="disk_click"> <td>Micron</td><td>Crucial P3 Plus</td><td>M.2_Gen4</td><td>5000/4200</td><td>1TB</td><td>2450</td> </tr>
                <tr id="Micron_Crucial P3 Plus_M.2_Gen4_2TB" class="disk_click"> <td>Micron</td><td>Crucial P3 Plus</td><td>M.2_Gen4</td><td>5000/4200</td><td>2TB</td><td>5480</td> </tr>
                <tr id="Micron_Crucial P3 Plus_M.2_Gen4_4TB" class="disk_click"> <td>Micron</td><td>Crucial P3 Plus</td><td>M.2_Gen4</td><td>5000/4200</td><td>4TB</td><td>12100</td> </tr>
                <tr id="Micron_Crucial P5_M.2_Gen3_250GB" class="disk_click"> <td>Micron</td><td>Crucial P5</td><td>M.2_Gen3</td><td>3400/3000</td><td>250GB</td><td>890</td> </tr>
                <tr id="Micron_Crucial P5_M.2_Gen3_500GB" class="disk_click"> <td>Micron</td><td>Crucial P5</td><td>M.2_Gen3</td><td>3400/3000</td><td>500GB</td><td>1888</td> </tr>
                <tr id="Micron_Crucial P5_M.2_Gen3_1TB" class="disk_click"> <td>Micron</td><td>Crucial P5</td><td>M.2_Gen3</td><td>3400/3000</td><td>1TB</td><td>3188</td> </tr>
                <tr id="Micron_Crucial P5_M.2_Gen3_2TB" class="disk_click"> <td>Micron</td><td>Crucial P5</td><td>M.2_Gen3</td><td>3400/3000</td><td>2TB</td><td>6650</td> </tr>
                <tr id="Micron_Crucial P3_M.2_Gen3_500GB" class="disk_click"> <td>Micron</td><td>Crucial P3</td><td>M.2_Gen3</td><td>3500/3000</td><td>500GB</td><td>1390</td> </tr>
                <tr id="Micron_Crucial P3_M.2_Gen3_1TB" class="disk_click"> <td>Micron</td><td>Crucial P3</td><td>M.2_Gen3</td><td>3500/3000</td><td>1TB</td><td>2450</td> </tr>
                <tr id="Micron_Crucial P3_M.2_Gen3_2TB" class="disk_click"> <td>Micron</td><td>Crucial P3</td><td>M.2_Gen3</td><td>3500/3000</td><td>2TB</td><td>5480</td> </tr>
                <tr id="Micron_Crucial P3_M.2_Gen3_4TB" class="disk_click"> <td>Micron</td><td>Crucial P3</td><td>M.2_Gen3</td><td>3500/3000</td><td>4TB</td><td>12100</td> </tr>
                <tr id="Micron_Crucial P2_M.2_Gen3_250GB" class="disk_click"> <td>Micron</td><td>Crucial P2</td><td>M.2_Gen3</td><td>2400/1150</td><td>250GB</td><td>950</td> </tr>
                <tr id="Micron_Crucial P2_M.2_Gen3_500GB" class="disk_click"> <td>Micron</td><td>Crucial P2</td><td>M.2_Gen3</td><td>2400/1150</td><td>500GB</td><td>1450</td> </tr>
                <tr id="Micron_Crucial P2_M.2_Gen3_1TB" class="disk_click"> <td>Micron</td><td>Crucial P2</td><td>M.2_Gen3</td><td>2400/1150</td><td>1TB</td><td>2850</td> </tr>
                <tr id="Micron_Crucial P2_M.2_Gen3_2TB" class="disk_click"> <td>Micron</td><td>Crucial P2</td><td>M.2_Gen3</td><td>2400/1150</td><td>2TB</td><td>4630</td> </tr>
                <tr id="Micron_Crucial P2 Plus_M.2_Gen3_250GB" class="disk_click"> <td>Micron</td><td>Crucial P2 Plus</td><td>M.2_Gen3</td><td>2250/1525</td><td>250GB</td><td>950</td> </tr>
                <tr id="Micron_Crucial P2 Plus_M.2_Gen3_500GB" class="disk_click"> <td>Micron</td><td>Crucial P2 Plus</td><td>M.2_Gen3</td><td>2250/1525</td><td>500GB</td><td>1450</td> </tr>
                <tr id="Micron_Crucial P2 Plus_M.2_Gen3_1TB" class="disk_click"> <td>Micron</td><td>Crucial P2 Plus</td><td>M.2_Gen3</td><td>2250/1525</td><td>1TB</td><td>2850</td> </tr>
                <tr id="Micron_Crucial P2 Plus_M.2_Gen3_2TB" class="disk_click"> <td>Micron</td><td>Crucial P2 Plus</td><td>M.2_Gen3</td><td>2250/1525</td><td>2TB</td><td>4630</td> </tr>
                <tr id="Samsung_980 PRO_M.2_Gen4_250GB" class="disk_click"> <td>Samsung</td><td>980 PRO</td><td>M.2_Gen4</td><td>7000/5000</td><td>250GB</td><td>1328</td> </tr>
                <tr id="Samsung_980 PRO_M.2_Gen4_500GB" class="disk_click"> <td>Samsung</td><td>980 PRO</td><td>M.2_Gen4</td><td>7000/5000</td><td>500GB</td><td>2770</td> </tr>
                <tr id="Samsung_980 PRO_M.2_Gen4_1TB" class="disk_click"> <td>Samsung</td><td>980 PRO</td><td>M.2_Gen4</td><td>7000/5000</td><td>1TB</td><td>3699</td> </tr>
                <tr id="Samsung_980 PRO_M.2_Gen4_2TB" class="disk_click"> <td>Samsung</td><td>980 PRO</td><td>M.2_Gen4</td><td>7000/5000</td><td>2TB</td><td>7299</td> </tr>
                <tr id="Samsung_970 EVO_M.2_Gen3_250GB" class="disk_click"> <td>Samsung</td><td>970 EVO</td><td>M.2_Gen3</td><td>3500/2500</td><td>250GB</td><td>1488</td> </tr>
                <tr id="Samsung_970 EVO_M.2_Gen3_500GB" class="disk_click"> <td>Samsung</td><td>970 EVO</td><td>M.2_Gen3</td><td>3500/2500</td><td>500GB</td><td>1788</td> </tr>
                <tr id="Samsung_970 EVO_M.2_Gen3_1TB" class="disk_click"> <td>Samsung</td><td>970 EVO</td><td>M.2_Gen3</td><td>3500/2500</td><td>1TB</td><td>2999</td> </tr>
                <tr id="Samsung_970 EVO_M.2_Gen3_2TB" class="disk_click"> <td>Samsung</td><td>970 EVO</td><td>M.2_Gen3</td><td>3500/2500</td><td>2TB</td><td>5399</td> </tr>
                <tr id="Samsung_970 PRO_M.2_Gen3_512GB" class="disk_click"> <td>Samsung</td><td>970 PRO</td><td>M.2_Gen3</td><td>3500/2700</td><td>512GB</td><td>4690</td> </tr>
                <tr id="Samsung_970 PRO_M.2_Gen3_1TB" class="disk_click"> <td>Samsung</td><td>970 PRO</td><td>M.2_Gen3</td><td>3500/2700</td><td>1TB</td><td>7388</td> </tr>
                <tr id="Samsung_980_M.2_Gen3_250GB" class="disk_click"> <td>Samsung</td><td>980</td><td>M.2_Gen3</td><td>3500/3000</td><td>250GB</td><td>1599</td> </tr>
                <tr id="Samsung_980_M.2_Gen3_500GB" class="disk_click"> <td>Samsung</td><td>980</td><td>M.2_Gen3</td><td>3500/3000</td><td>500GB</td><td>2499</td> </tr>
                <tr id="Samsung_980_M.2_Gen3_1TB" class="disk_click"> <td>Samsung</td><td>980</td><td>M.2_Gen3</td><td>3500/3000</td><td>1TB</td><td>3699</td> </tr>
                <tr id="Seagate_FireCuda 520_M.2_Gen4_500GB" class="disk_click"> <td>Seagate</td><td>FireCuda 520</td><td>M.2_Gen4</td><td>5000/4400</td><td>500GB</td><td>1999</td> </tr>
                <tr id="Seagate_FireCuda 520_M.2_Gen4_1TB" class="disk_click"> <td>Seagate</td><td>FireCuda 520</td><td>M.2_Gen4</td><td>5000/4400</td><td>1TB</td><td>5190</td> </tr>
                <tr id="Seagate_FireCuda 520_M.2_Gen4_2TB" class="disk_click"> <td>Seagate</td><td>FireCuda 520</td><td>M.2_Gen4</td><td>5000/4400</td><td>2TB</td><td>9380</td> </tr>
                <tr id="Seagate_IronWolf 525_M.2_Gen4_500GB" class="disk_click"> <td>Seagate</td><td>IronWolf 525</td><td>M.2_Gen4</td><td>5025/3450</td><td>500GB</td><td>3390</td> </tr>
                <tr id="Seagate_IronWolf 525_M.2_Gen4_1TB" class="disk_click"> <td>Seagate</td><td>IronWolf 525</td><td>M.2_Gen4</td><td>5025/3450</td><td>1TB</td><td>6190</td> </tr>
                <tr id="Seagate_IronWolf 525_M.2_Gen4_2TB" class="disk_click"> <td>Seagate</td><td>IronWolf 525</td><td>M.2_Gen4</td><td>5025/3450</td><td>2TB</td><td>11690</td> </tr>
                <tr id="Seagate_BarraCuda Q5_M.2_Gen3_500GB" class="disk_click"> <td>Seagate</td><td>BarraCuda Q5</td><td>M.2_Gen3</td><td>2400/1800</td><td>500GB</td><td>3040</td> </tr>
                <tr id="Seagate_BarraCuda Q5_M.2_Gen3_1TB" class="disk_click"> <td>Seagate</td><td>BarraCuda Q5</td><td>M.2_Gen3</td><td>2400/1800</td><td>1TB</td><td>5455</td> </tr>
                <tr id="Seagate_BarraCuda Q5_M.2_Gen3_2TB" class="disk_click"> <td>Seagate</td><td>BarraCuda Q5</td><td>M.2_Gen3</td><td>2400/1800</td><td>2TB</td><td>6790</td> </tr>
                <tr id="Seagate_BarraCuda 510_M.2_Gen3_250GB" class="disk_click"> <td>Seagate</td><td>BarraCuda 510</td><td>M.2_Gen3</td><td>3400/3000</td><td>250GB</td><td>2090</td> </tr>
                <tr id="Seagate_BarraCuda 510_M.2_Gen3_256GB" class="disk_click"> <td>Seagate</td><td>BarraCuda 510</td><td>M.2_Gen3</td><td>3400/3000</td><td>256GB</td><td>2090</td> </tr>
                <tr id="Seagate_BarraCuda 510_M.2_Gen3_500GB" class="disk_click"> <td>Seagate</td><td>BarraCuda 510</td><td>M.2_Gen3</td><td>3400/3000</td><td>500GB</td><td>3390</td> </tr>
                <tr id="Seagate_BarraCuda 510_M.2_Gen3_512GB" class="disk_click"> <td>Seagate</td><td>BarraCuda 510</td><td>M.2_Gen3</td><td>3400/3000</td><td>512GB</td><td>3390</td> </tr>
                <tr id="Seagate_BarraCuda 510_M.2_Gen3_1TB" class="disk_click"> <td>Seagate</td><td>BarraCuda 510</td><td>M.2_Gen3</td><td>3400/3000</td><td>1TB</td><td>3480</td> </tr>
                <tr id="Seagate_FireCuda 510_M.2_Gen3_500GB" class="disk_click"> <td>Seagate</td><td>FireCuda 510</td><td>M.2_Gen3</td><td>3450/3200</td><td>500GB</td><td>2390</td> </tr>
                <tr id="Seagate_FireCuda 510_M.2_Gen3_1TB" class="disk_click"> <td>Seagate</td><td>FireCuda 510</td><td>M.2_Gen3</td><td>3450/3200</td><td>1TB</td><td>3400</td> </tr>
                <tr id="Seagate_FireCuda 510_M.2_Gen3_2TB" class="disk_click"> <td>Seagate</td><td>FireCuda 510</td><td>M.2_Gen3</td><td>3450/3200</td><td>2TB</td><td>5999</td> </tr>
                <tr id="Seagate_FireCuda 510_M.2_Gen3_250GB" class="disk_click"> <td>Seagate</td><td>FireCuda 510</td><td>M.2_Gen3</td><td>3400/3000</td><td>250GB</td><td>2390</td> </tr>
                <tr id="Seagate_FireCuda 510_M.2_Gen3_500GB" class="disk_click"> <td>Seagate</td><td>FireCuda 510</td><td>M.2_Gen3</td><td>3400/3000</td><td>500GB</td><td>3400</td> </tr>
                <tr id="Seagate_FireCuda 510_M.2_Gen3_1TB" class="disk_click"> <td>Seagate</td><td>FireCuda 510</td><td>M.2_Gen3</td><td>3400/3000</td><td>1TB</td><td>5999</td> </tr>
            <td colspan="7" style="background-color:#00a29c;color:white;">傳統硬碟</td>
                <tr> <td>品牌</td><td>型號</td><td>類型</td><td>轉速(rpm)</td><td>容量</td><td>價錢</td> </tr>
                <tr id="Toshiba_MD07ACA series_PC型_12TB" class="disk_click"> <td>Toshiba</td><td>MD07ACA series</td><td>PC型</td><td>7200</td><td>12TB</td><td>7999</td> </tr>
                <tr id="Toshiba_MD07ACA series_PC型_14TB" class="disk_click"> <td>Toshiba</td><td>MD07ACA series</td><td>PC型</td><td>7200</td><td>14TB</td><td>10880</td> </tr>
                <tr id="Toshiba_MD04 series_PC型_2TB" class="disk_click"> <td>Toshiba</td><td>MD04 series</td><td>PC型</td><td>7200</td><td>2TB</td><td>2190</td> </tr>
                <tr id="Toshiba_MD04 series_PC型_6TB" class="disk_click"> <td>Toshiba</td><td>MD04 series</td><td>PC型</td><td>7200</td><td>6TB</td><td>6690</td> </tr>
                <tr id="Toshiba_DT02_PC型_2TB" class="disk_click"> <td>Toshiba</td><td>DT02</td><td>PC型</td><td>7200</td><td>2TB</td><td>2190</td> </tr>
                <tr id="Toshiba_DT02 series_PC型_2TB" class="disk_click"> <td>Toshiba</td><td>DT02 series</td><td>PC型</td><td>5400</td><td>2TB</td><td>2190</td> </tr>
                <tr id="Toshiba_DT02 series_PC型_4TB" class="disk_click"> <td>Toshiba</td><td>DT02 series</td><td>PC型</td><td>5400</td><td>4TB</td><td>2890</td> </tr>
                <tr id="Toshiba_DT02 series_PC型_6TB" class="disk_click"> <td>Toshiba</td><td>DT02 series</td><td>PC型</td><td>5400</td><td>6TB</td><td>6690</td> </tr>
                <tr id="Toshiba_DT01 series_PC型_500GB" class="disk_click"> <td>Toshiba</td><td>DT01 series</td><td>PC型</td><td>5940</td><td>500GB</td><td>888</td> </tr>
                <tr id="Toshiba_DT01 series_PC型_1TB" class="disk_click"> <td>Toshiba</td><td>DT01 series</td><td>PC型</td><td>5940</td><td>1TB</td><td>1290</td> </tr>
                <tr id="Toshiba_DT01 series_PC型_2TB" class="disk_click"> <td>Toshiba</td><td>DT01 series</td><td>PC型</td><td>5940</td><td>2TB</td><td>1844</td> </tr>
                <tr id="Toshiba_DT01 series_PC型_3TB" class="disk_click"> <td>Toshiba</td><td>DT01 series</td><td>PC型</td><td>5940</td><td>3TB</td><td>2880</td> </tr>
                <tr id="Toshiba_MQ04-V series_影音型_1TB" class="disk_click"> <td>Toshiba</td><td>MQ04-V series</td><td>影音型</td><td>5400</td><td>1TB</td><td>1450</td> </tr>
                <tr id="Toshiba_MQ04-V series_影音型_2TB" class="disk_click"> <td>Toshiba</td><td>MQ04-V series</td><td>影音型</td><td>5400</td><td>2TB</td><td>2958</td> </tr>
                <tr id="Toshiba_MQ01ABD-V Series_影音型_250GB" class="disk_click"> <td>Toshiba</td><td>MQ01ABD-V Series</td><td>影音型</td><td>5400</td><td>250GB</td><td>250</td> </tr>
                <tr id="Toshiba_MQ01ABD-V Series_影音型_320GB" class="disk_click"> <td>Toshiba</td><td>MQ01ABD-V Series</td><td>影音型</td><td>5400</td><td>320GB</td><td>350</td> </tr>
                <tr id="Toshiba_MQ01ABD-V Series_影音型_500GB" class="disk_click"> <td>Toshiba</td><td>MQ01ABD-V Series</td><td>影音型</td><td>5400</td><td>500GB</td><td>1499</td> </tr>
                <tr id="Toshiba_MQ01ABD-V Series_影音型_1TB" class="disk_click"> <td>Toshiba</td><td>MQ01ABD-V Series</td><td>影音型</td><td>5400</td><td>1TB</td><td>1588</td> </tr>
                <tr id="Toshiba_DT01-V Series_影音型_500GB" class="disk_click"> <td>Toshiba</td><td>DT01-V Series</td><td>影音型</td><td>5940</td><td>500GB</td><td>1499</td> </tr>
                <tr id="Toshiba_DT01-V Series_影音型_1TB" class="disk_click"> <td>Toshiba</td><td>DT01-V Series</td><td>影音型</td><td>5940</td><td>1TB</td><td>1588</td> </tr>
                <tr id="Toshiba_DT01-V Series_影音型_2TB" class="disk_click"> <td>Toshiba</td><td>DT01-V Series</td><td>影音型</td><td>5940</td><td>2TB</td><td>2190</td> </tr>
                <tr id="Toshiba_DT01-V Series_影音型_3TB" class="disk_click"> <td>Toshiba</td><td>DT01-V Series</td><td>影音型</td><td>5940</td><td>3TB</td><td>5488</td> </tr>
                <tr id="WD Blue_PC型_500GB" class="disk_click"> <td>WD</td><td>Blue</td><td>PC型</td><td>7200</td><td>500GB</td><td>1082</td> </tr>
                <tr id="WD Blue_PC型_2TB" class="disk_click"> <td>WD</td><td>Blue</td><td>PC型</td><td>7200</td><td>2TB</td><td>1987</td> </tr>
                <tr id="WD Blue_PC型_500GB" class="disk_click"> <td>WD</td><td>Blue</td><td>PC型</td><td>5400</td><td>500GB</td><td>1082</td> </tr>
                <tr id="WD Blue_PC型_6TB" class="disk_click"> <td>WD</td><td>Blue</td><td>PC型</td><td>5400</td><td>6TB</td><td>4419</td> </tr>
                <tr id="WD Blue_PC型_8TB" class="disk_click"> <td>WD</td><td>Blue</td><td>PC型</td><td>5640</td><td>8TB</td><td>5390</td> </tr>
                <tr id="WD_BLACK_遊戲硬碟_500GB" class="disk_click"> <td>WD</td><td>BLACK</td><td>遊戲硬碟</td><td>7200</td><td>500GB</td><td>1705</td> </tr>
                <tr id="WD_BLACK_遊戲硬碟_10TB" class="disk_click"> <td>WD</td><td>BLACK</td><td>遊戲硬碟</td><td>7200</td><td>10TB</td><td>9680</td> </tr>
                <tr id="Seagate_FireCuda HDD_PC型_4TB" class="disk_click"> <td>Seagate</td><td>FireCuda HDD</td><td>PC型</td><td>7200</td><td>4TB</td><td>4890</td> </tr>
                <tr id="Seagate_FireCuda HDD_PC型_8TB" class="disk_click"> <td>Seagate</td><td>FireCuda HDD</td><td>PC型</td><td>7200</td><td>8TB</td><td>6099</td> </tr>
                <tr id="Seagate_FireCuda Gaming Hub_遊戲硬碟_8TB" class="disk_click"> <td>Seagate</td><td>FireCuda Gaming Hub</td><td>遊戲硬碟</td><td>7200</td><td>8TB</td><td>6990</td> </tr>
                <tr id="Seagate_FireCuda Gaming Hub_遊戲硬碟_16TB" class="disk_click"> <td>Seagate</td><td>FireCuda Gaming Hub</td><td>遊戲硬碟</td><td>7200</td><td>16TB</td><td>12690</td> </tr>
            </table>
        </div>
        <div class="right">
            <p><strong>硬碟(Disk)</strong> </p>
            <select name="Disk" id="Disk">
                <option value="none">選擇Disk</option>
                <optgroup label="SSD">
                    <?php 
                        require_once '../DatabaseManageUI/DataBaseAccount.php';
                        $result_string = '';
                        $brand = ["Kingston","WD","Micron","Samsung","Seagate"];
                        $brand_ENG = [["M.2_Gen4","M.2_Gen3"],
                                    ["M.2_Gen4","M.2_Gen3"],
                                    ["M.2_Gen4","M.2_Gen3"],
                                    ["M.2_Gen4","M.2_Gen3"],
                                    ["M.2_Gen4","M.2_Gen3"]];

                        for($i = 0;$i < count($brand);$i++){
                            $result_string .= '<optgroup label="' . $brand[$i] . '" style="background-color: rgb(221, 220, 220);">';
                            $sql = "SELECT * FROM ca.ssd ORDER BY SSD_Name DESC";
                            
                            for($j = 0;$j < count($brand_ENG[$i]);$j++){
                                $result = mysqli_query($link, $sql);
                                $result_string .= '<optgroup label="' . $brand_ENG[$i][$j] . '">';
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $ssd_Brand = $row["ssd_Brand"];
                                    $ssd_Price = $row["ssd_price"];
                                    $ssd_Type = $row["ssd_type"];
                                    $ssd_Write = $row["ssd_speed_Write"];
                                    $ssd_Read = $row["ssd_speed_Read"];
                                    $ssd_Name = $row["SSD_Name"];
                                    $ssd_Capacity = $row["SSD_Capacity"];
                                    if($ssd_Brand == $brand[$i] && $ssd_Type == $brand_ENG[$i][$j])
                                        $result_string .= "<option value='" . $ssd_Name . "'>". $ssd_Name . " 讀/寫速度(MB/秒):" . $ssd_Read . "/" . $ssd_Write . " NT$" . $ssd_Price ."</option>\n";
                                }
                                $result_string .= '</optgroup>';
                            }
                            $result_string .= '</optgroup>';
                        }
                        echo $result_string;
                    ?>
                </optgroup>
                <optgroup label="傳統硬碟">
                    <?php 
                        require_once '../DatabaseManageUI/DataBaseAccount.php';
                        $result_string = '';
                        $brand = ["Toshiba","WD","Seagate"];
                        $brand_ENG = [["PC型","影音型"],
                                    ["PC型","遊戲硬碟"],
                                    ["PC型","遊戲硬碟"]];

                        for($i = 0;$i < count($brand);$i++){
                            $result_string .= '<optgroup label="' . $brand[$i] . '" style="background-color: rgb(221, 220, 220);">';
                            $sql = "SELECT * FROM ca.ssd ORDER BY SSD_Name DESC";
                            
                            for($j = 0;$j < count($brand_ENG[$i]);$j++){
                                $result = mysqli_query($link, $sql);
                                $result_string .= '<optgroup label="' . $brand_ENG[$i][$j] . '">';
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $ssd_Brand = $row["ssd_Brand"];
                                    $ssd_Price = $row["ssd_price"];
                                    $ssd_Type = $row["ssd_type"];
                                    $ssd_Write = $row["ssd_speed_Write"];
                                    $ssd_Read = $row["ssd_speed_Read"];
                                    $ssd_Name = $row["SSD_Name"];
                                    $ssd_Capacity = $row["SSD_Capacity"];
                                    if($ssd_Brand == $brand[$i] && $ssd_Type == $brand_ENG[$i][$j])
                                        $result_string .= "<option value='" . $ssd_Name . "'>". $ssd_Name . " 接口/介面:" . $ssd_Type . " 轉速:" . $ssd_Read . " 容量:" . $ssd_Capacity . "GB" . " NT$" . $ssd_Price ."</option>\n";
                                }
                                $result_string .= '</optgroup>';
                            }
                            $result_string .= '</optgroup>';
                        }
                        echo $result_string;
                    ?>
                </optgroup>
            </select>
            <div class="button_grid">
                <button class="previous_btn" id="Disk-previous_btn">Prev.</button>
                <button class="next_btn" id="Disk-next-btn">FINISH</button>
            </div>
        </div>
    </main>
    <section>
        <div class="left"></div>
        <div class="right"></div>
    </section>

    <article>
        <table>
            <tr>
                <td>中央處理器(CPU)</td>
                <td style="word-break: break-all !important;">尚未選擇CPU</td>
            </tr>
            <tr>
                <td>主機板(Mother Board)</td>
                <td style="word-break: break-all !important;">尚未選擇MB</td>
            </tr>
            <tr>
                <td>圖形處理器(GPU)</td>
                <td style="word-break: break-all !important;">尚未選擇GPU</td>
            </tr>
            <tr>
                <td>記憶體(Memory)</td>
                <td style="word-break: break-all !important;">尚未選擇Memory</td>
            </tr>
            <tr>
                <td>硬碟(Disk)</td>
                <td style="word-break: break-all !important;">尚未選擇Disk</td>
            </tr>
            <tr>
                <td>功耗(Power)</td>
                <td id="power_id">0瓦</td>
            </tr>
        </table>
        <form action="./PHP/PDF.php" method="post" target="_blank">
            <input type="hidden" name="CPU" value="">
            <input type="hidden" name="MB" value="">
            <input type="hidden" name="GPU" value="">
            <input type="hidden" name="Memory" value="">
            <input type="hidden" name="Disk" value="">
            <input type="hidden" name="Power" value="">
            <input type="hidden" name="Price" value="">
            <button id="PDF_btn" type="button">產生PDF</button>
            <button id="PIC_btn" type="button">產生圖片</button>
            <button id="reset_btn" type="button">重新選擇</button>
        </form>
    </article>

    <!-- 圖片儲存位置 -->
    <div id="image_append"></div>
    
    <!-- 繪製圖片的HTML -->
    <div id="canvas_div" style="visibility:hidden">
        <h4 style="font-size: 30pt; font-weight: normal; text-align: center;">電腦硬體需求分析平台</h4>
        <table style="margin:auto;width:100%;">
            <tr>
                <td style="width: 40%;"></td>
                <td style="border-bottom: 2px solid black; font-size: 20pt; font-weight: bold; text-align: center; width: 20%;">產品清單</td>
                <td style="width: 40%;"></td>
            </tr>
            <tr>
                <td colspan="3"></td>
            </tr>
        </table>
        <p>time</p>
        <table cellpadding="1" style="width:100%;">
            <tbody style="width:100%;">
                <tr style="width:100%;">
                    <td style="border-bottom: 1px solid black; width: 20%;text-align: left;"> 項目</td>
                    <td style="border-bottom: 1px solid black; width: auto;text-align: left;">產品名稱</td> 
                </tr>
            </tbody>
        </table>

        <table cellpadding="1" style="width:100%;">
            <tr>
                <td style="line-height: 1.5; width: 20%;text-align: left;">中央處理器CPU</td>
                <td style="line-height: 1.5; width: auto;text-align: left;">7</td>
            </tr>
            <tr>
                <td style="line-height: 1.5; width: 20%;text-align: left;">主機板Mother Board</td>
                <td style="line-height: 1.5; width: auto;text-align: left;">9</td>
            </tr>
            <tr>
                <td style="line-height: 1.5; width: 20%;text-align: left;">圖形處理器GPU</td>
                <td style="line-height: 1.5; width: auto;text-align: left;">11</td>
            </tr>
            <tr>
                <td style="line-height: 1.5; width: 20%;text-align: left;">記憶體Memory</td>
                <td style="line-height: 1.5; width: auto;text-align: left;">13</td>
            </tr>
            <tr>
                <td style="line-height: 1.5; width: 20%;text-align: left;">硬碟Disk</td>
                <td style="line-height: 1.5; width: auto;text-align: left;">15</td>
            </tr>
            <tr>
                <td style="line-height: 1.5; width: 20%;text-align: left;">功耗Power</td>
                <td style="line-height: 1.5; width: auto;text-align: left;">17</td>
            </tr>
            <tr>
                <td style="line-height: 1.5; width: 20%;text-align: left;">金額Price</td>
                <td style="line-height: 1.5; width: auto;text-align: left;">19</td>
            </tr>    
        </table>   
    </div>

    <footer>
        <span style="grid-area: count;">瀏覽人數 : 
            <?php 
                require_once '../DatabaseManageUI/DataBaseAccount.php';
                $result_string = '瀏覽人數 : ';

                //取得人數
                $sql = "SELECT * FROM ca.visitor";
                $result = mysqli_query($link, $sql);
                $row = mysqli_fetch_assoc($result);
                $visitor = $row["form_record"];
                
                //人數 + 1
                // $new_visitor = (int) $visitor + 1;
                // $sql = "UPDATE ca.visitor set form_record = $new_visitor WHERE form_record = $visitor";
                // $result = mysqli_query($link, $sql);

                $visitor = str_pad($visitor,9,"0",STR_PAD_LEFT);
                echo $visitor;
            ?>
        </span>
        <p style="grid-area: copyright_english;">Copyright © 2022</p>
        <p style="grid-area: blank;"></p><!-- grid排版定位用，讓最右邊是空的 -->
        <span style="grid-area: date;">更新日期 : 2023/04/26</span>
        <p style="grid-area: copyright_chinese;">版權所有</p>
    </footer>
    <button id="top"></button>
</body>
<!-- <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.9.1.js"></script> -->
<!-- <script src="https://ajax.aspnetcdn.com/ajax/knockout/knockout-3.0.0.js"></script> -->
<script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
<script src="https://cdn.staticfile.org/jquery/2.2.4/jquery.min.js"></script>
<script src="./javascript/button.js"></script>
<script src="./javascript/oc_warning.js"></script>
<script src="./javascript/Memory.js"></script>
<script src="./javascript/MB.js"></script>
<script src="./javascript/generate.js"></script>
<script src="./javascript/price.js"></script>
<script src="./javascript/sidebar.js"></script>
<script src="./javascript/chart_click.js"></script>
</html>

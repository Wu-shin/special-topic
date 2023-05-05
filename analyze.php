<!DOCTYPE html>
<html>
<head>
    <?php
        require_once '../DatabaseManageUI/DataBaseAccount.php';
        //取得人數
        $sql = "SELECT * FROM ca.visitor";
        $result = mysqli_query($link, $sql);
        $row = mysqli_fetch_assoc($result);
        $visitor = $row["analyze_record"];
        // is_visitor
        // index analyze form introduce about_me
        //1/1/1/1/1
        if(isset($_COOKIE["is_visitor"])){
            //有COOKIE
            $Cookie_value = explode('/',  $_COOKIE["is_visitor"]);
            //有COOKIE，但analyze(1)為0
            if($Cookie_value[1] == "0"){
                //人數 + 1
                $new_visitor = (int) $visitor + 1;
                $sql = "UPDATE ca.visitor set analyze_record = $new_visitor WHERE analyze_record = $visitor";
                $result = mysqli_query($link, $sql);
                
                //COOKIE 儲存回去
                $value = $Cookie_value[0] . "/". "1/" . $Cookie_value[2] . "/". $Cookie_value[3] . "/". $Cookie_value[4];
                setcookie("is_visitor", $value, time()+3600);
            }
        }else{
            //無COOKIE，設定COOKIE
            setcookie("is_visitor", "0/1/0/0/0", time()+3600);
                //人數 + 1
            $new_visitor = (int) $visitor + 1;
            $sql = "UPDATE ca.visitor set analyze_record = $new_visitor WHERE analyze_record = $visitor";
            $result = mysqli_query($link, $sql);
        }
    ?>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./CSS/my_bootstrap.css">
    <link rel="stylesheet" href="./CSS/analyze.css">
    <link rel="stylesheet" href="./CSS/header.css">
    <link rel="stylesheet" href="./CSS/sidebar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="Specification_AJAX_3.php">
    <link href="../DatabaseManageUI/DatabaseAccount.php">
    <title>推薦分析</title>
	<link href="Analyzation_AJAX.php">
	<script src="https://code.jquery.com/jquery-3.6.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</head>
<body>
<header class="desktop">
        <ul>
            <div>
                <a href="./index.php">
                    <img src="./picture/logo2.png" alt="" id="logo">
                    <!-- <img src="./picture/logo.png" alt="" id="logo"> -->
                    <!-- <h3><strong>電腦硬體需求分析平台</strong></h3> -->
                </a>
            </div>
            <li><a class="active" href="#">推薦分析</a></li>
            <li><a href="form.php">硬體選擇</a></li>
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
        <div id="budget_div">
            <span id="Budget_Title">最高預算:</span>
            <input type="number" placeholder="預算上限" min="0" id="max_budget" name="max_budget" value="0" onfocus="ClearValue(this)" onBlur="ReleaseValue(this)">
            <span id="budget_additional">?</span>
        </div>
		<div id="platform">
			<span id="Platform_Title">請選擇平台:</span>
			<section id="Platfrom_Selection">
				<input type="radio" name="Platform" id="Desktop" value="Desktop" checked class="Confirm_Input">
				<label for="Desktop">桌上型電腦</label>
                <br class="RWD_Slice">
				<input type="radio" name="Platform" id="Laptop" value="Laptop" class="Confirm_Input">
				<label for="Laptop">筆記型電腦</label>
			</section>
		</div>
		<br>
        <div id="CPU_Brand">
			<span id="CPU_Title">處理器品牌:</span>
            <span id="CPU_additional">?</span>
			<section id="CPU_Selection">
				<input type="radio" name="CPU_Brand" id="CPU_Intel" value="intel" checked class="Confirm_Input">
				<label for="CPU_Intel">Intel</label>
                <br class="RWD_Slice">
				<input type="radio" name="CPU_Brand" id="CPU_AMD" value="AMD" class="Confirm_Input">
				<label for="CPU_AMD">AMD</label>
                <br class="RWD_Slice">
                <input type="radio" name="CPU_Brand" id="AMD&&Intel" value="AMD&&intel" class="Confirm_Input">
				<label for="AMD&&Intel">不拘</label>
			</section>
		</div>
        <br>
        <div id="GPU_Brand">
			<span id="GPU_Title" >圖形卡品牌:</span>
            <span id="GPU_additional">?</span>
            <section id="GPU_Selection">
				<input type="radio" name="GPU_Brand" id="GPU_NVIDIA" value="NVIDIA" checked class="Confirm_Input">
				<label for="GPU_NVIDIA">NVIDIA</label>
                <br class="RWD_Slice">
				<input type="radio" name="GPU_Brand" id="GPU_AMD" value="AMD" class="Confirm_Input">
				<label for="GPU_AMD">AMD</label>
                <br class="RWD_Slice">
                <input type="radio" name="GPU_Brand" id="AMD&&NVIDIA" value="AMD&&NVIDIA" class="Confirm_Input">
				<label for="AMD&&NVIDIA">不拘</label>
			</section>
		</div>
        <br>

        <div id="software">
			<section></section>
            <section id="main_area">
                <span id="text_span">你的用途:</span>
				<br>
                <br>
                <div class="Choice_Area" id="Choice_Area">
                    <!--JavaScript & PHP處理-->
                    <div class="Software_New_Purpose"></div>
	                <button id="Add_Button">&#43</button>
                </div>
                <br><br>
          	</section>
        </div>

        <!--<div id="SoftwareListArea">-->
            <!--軟體清單由JavaScript處理-->
        <!--</div>-->

        <center><button value="送出" id="sent_button">確認，並產生規格表</button></center>
        <br>
        <br>
        <div id="ResultList_Generate_Result_Table" align="center">
            <a style="font-size: 1px; color: #efefef; transform: scale(0.1);">(看看就好)</a>
            <span style="text-align: center; display: block; color: red; font-weight:bold; font-size:200%;">請注意!此表單未包含作業系統請多加留意</span>
            <span style="text-align: center; display: block; color: red;">表單產生內容僅供參考，所有產品和價錢請依實際情形自行調整</span>
            <span style="text-align: center; display: block;">結果產生文字</span>
            <span id="different_chart_text" style="text-align: center; display: block;">兩張表單的差異在預算上!!!，一張在預算內，另一張則超出預算$5000</span>
            <button value="切換" id="switch_button" >切換另一張表單</button>
		    <!--JavaScript & PHP處理-->
            <table class="Generate_Result_Table">
                <tr>
                    <th >中央處理器(CPU)</th>
                    <td >尚未選擇CPU</td>
                </tr>
                <tr class="Generate_Result_Table">
                    <th>主機板<br>(Mother Board)</th>
                    <td>尚未選擇MB</td>
                </tr>
                <tr class="Generate_Result_Table">
                    <th>圖形處理器(GPU)</th>
                    <td>尚未選擇GPU</td>
                </tr>
                <tr class="Generate_Result_Table">
                    <th>記憶體(Memory)</th>
                    <td>尚未選擇Memory</td>
                </tr>
                <tr class="Generate_Result_Table">
                    <th>固態硬碟(SSD)</th>
                    <td>尚未選擇SSD</td>
                </tr>
                <tr class="Generate_Result_Table">
                    <th>硬碟(HDD)</th>
                    <td>尚未選擇HDD</td>
                </tr>
                <tr class="Generate_Result_Table">
                    <th>功耗(Power)</th>
                    <td id="power_id">0瓦</td>
                </tr>
                <tr class="Generate_Result_Table">
                    <th>金額(Price)</th>
                    <td id="power_id">NT$0</td>
                </tr>
            </table>

            <form action="./PHP/analyze_PDF.php" method="post" target="_blank">
                <input type="hidden" name="CPU" value="">
                <input type="hidden" name="MB" value="">
                <input type="hidden" name="GPU" value="">
                <input type="hidden" name="Memory" value="">
                <input type="hidden" name="SSD" value="">
                <input type="hidden" name="HDD" value="">
                <input type="hidden" name="Power" value="">
                <input type="hidden" name="Price" value="">
                <button id="PDF_btn" type="button">產生PDF</button>
                <button id="PIC_btn" type="button">產生圖片</button>
            </form>
        </div>

    <!-- Budget Modal -->
    <div class="modal fade" id="budget" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-lg-down modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">推薦預算級距表</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="box">
                        <img src="./picture/Price_Gap.jpg" alt="" class="model_pic">
                        <br><center><button type="button" data-bs-dismiss="modal" id="Window_Inner_Confirm">關閉</button></center>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CPU Modal -->
    <div class="modal fade" id="CPU" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-lg-down modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">CPU品牌比較</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="box">
                        <img src="./picture/CPU_Gap.jpg" alt="" class="model_pic">
                        <br><center><button type="button" data-bs-dismiss="modal" id="Window_Inner_Confirm">關閉</button></center>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- GPU Modal -->
    <div class="modal fade" id="GPU" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-lg-down modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">GPU品牌比較</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="box">
                        <img src="./picture/GPU_Gap.jpg" alt="" class="model_pic">
                        <br><center><button type="button" data-bs-dismiss="modal" id="Window_Inner_Confirm">關閉</button></center>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Software Modal -->
    <div class="modal fade" id="Software_List" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-lg-down modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">請選擇軟體：</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="box">
                        <div id="Software_List_Content">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- 圖片儲存位置 -->
        <div id="image_append"></div>
        
        <!-- 繪製圖片的HTML -->
        <div id="canvas_div" style="visibility:hidden">
            <h4 style="font-size: 30px; font-weight: normal; text-align: center;">電腦硬體需求分析平台</h4>
            <table style="margin:auto;width:100%;">
                <tr>
                    <td style="width: 40%;"></td>
                    <td
                        style="border-bottom: 2px solid black; font-size: 20pt; font-weight: bold; text-align: center; width: 20%;">
                        產品清單</td>
                    <td style="width: 40%;"></td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                </tr>
            </table>
            <p style="font-size: 20px;">time</p>
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
                    <td style="line-height: 1.5; width: 20%;text-align: left;">固態硬碟SSD</td>
                    <td style="line-height: 1.5; width: auto;text-align: left;">15</td>
                </tr>
                <tr>
                    <td style="line-height: 1.5; width: 20%;text-align: left;">傳統硬碟</td>
                    <td style="line-height: 1.5; width: auto;text-align: left;">17</td>
                </tr>
                <tr>
                    <td style="line-height: 1.5; width: 20%;text-align: left;">功耗Power</td>
                    <td style="line-height: 1.5; width: auto;text-align: left;">19</td>
                </tr>
                <tr>
                    <td style="line-height: 1.5; width: 20%;text-align: left;">金額Price</td>
                    <td style="line-height: 1.5; width: auto;text-align: left;">21</td>
                </tr>
            </table>
        </div>
    <div id="blank"></div>
    <footer>
        <span style="grid-area: count;">瀏覽人數 :
            <?php
                require_once '../DatabaseManageUI/DataBaseAccount.php';
                $result_string = '瀏覽人數 : ';

                //取得人數
                $sql = "SELECT * FROM ca.visitor";
                $result = mysqli_query($link, $sql);
                $row = mysqli_fetch_assoc($result);
                $visitor = $row["analyze_record"];
                
                //人數 + 1
                // $new_visitor = (int) $visitor + 1;
                // $sql = "UPDATE ca.visitor set analyze_record = $new_visitor WHERE analyze_record = $visitor";
                // $result = mysqli_query($link, $sql);

                $visitor = str_pad($visitor,9,"0",STR_PAD_LEFT);
                echo $visitor;
            ?>
        </span>
        <p style="grid-area: copyright_english;">Copyright © 2023</p>
        <p style="grid-area: blank;"></p><!-- grid排版定位用，讓最右邊是空的 -->
        <span style="grid-area: date;">更新日期 : 2023/04/28</span>
        <p style="grid-area: copyright_chinese;">版權所有</p>
    </footer>
    <button id="top" onclick="location.href='#'"></button>
    <!-- <button id="top">TOP</button> -->
</body>

<script src="https://cdn.staticfile.org/jquery/2.2.4/jquery.min.js"></script>
<script src="./javascript/specification_analyze.js"></script>
<script src="./javascript/sidebar.js"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
<script src="./javascript/footer.js"></script>
<!-- <script src="https://cdn.staticfile.org/jquery/2.2.4/jquery.min.js"></script> -->
</html>

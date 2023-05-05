<!DOCTYPE html>
<html>
<head>
    <?php
        require_once '../DatabaseManageUI/DataBaseAccount.php';
        //取得人數
        $sql = "SELECT * FROM ca.visitor";
        $result = mysqli_query($link, $sql);
        $row = mysqli_fetch_assoc($result);
        $visitor = $row["aboutUS_record"];
        // is_visitor
        // index analyze form introduce about_me
        //1/1/1/1/1
        if(isset($_COOKIE["is_visitor"])){
            //有COOKIE
            $Cookie_value = explode('/',  $_COOKIE["is_visitor"]);
            //有COOKIE，但about_me(4)為0
            if($Cookie_value[4] == "0"){
                //人數 + 1
                $new_visitor = (int) $visitor + 1;
                $sql = "UPDATE ca.visitor set aboutUS_record = $new_visitor WHERE aboutUS_record = $visitor";
                $result = mysqli_query($link, $sql);
                
                //COOKIE 儲存回去
                $value = $Cookie_value[0] . "/" . $Cookie_value[1] . "/". $Cookie_value[2] . "/". $Cookie_value[3] . "/1";
                setcookie("is_visitor", $value, time()+3600);
            }
        }else{
            //無COOKIE，設定COOKIE
            setcookie("is_visitor", "0/0/0/0/1", time()+3600);
                //人數 + 1
            $new_visitor = (int) $visitor + 1;
            $sql = "UPDATE ca.visitor set aboutUS_record = $new_visitor WHERE aboutUS_record = $visitor";
            $result = mysqli_query($link, $sql);
        }
    ?>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./CSS/about_me.css">
    <link rel="stylesheet" href="./CSS/header.css">
    <link rel="stylesheet" href="./CSS/sidebar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>關於我們</title>
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
            <li><a href="analyze.php">推薦分析</a></li>
            <li><a href="form.php">硬體選擇</a></li>
            <li><a href="introduce.php">硬體介紹</a></li>
            <li><a class="active" href="#">關於我們</a></li>
            <li><a href="../Login_Page/Login_Page.html"><img id="user_logo" src="./picture/user.jpg" alt=""></a></li>
        </ul>
    </header>

    <div class="phone">
        <header>
            <button class="open-btn">
                <!-- 使用Font Awesome的Icon -->
                <i class="fa fa-bars" ></i>
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
    
    <main>
        <div class="motivation">
            <div></div>
            <div>
                <h1>動機</h1>
                <p>
                    對於電腦小白，當我們要買筆電或是組裝電腦時，大多都是直接去電腦們市諮詢銷售員，由銷售團隊負責介紹與推薦，
                    但最終我們所買的電腦未必真正符合需求，例如，當我們要一部文書處理的電腦結果被推薦了一部電競電腦，
                    要在外改論文結果續航力不足經常沒電還要插著充電器；對於專業的人士，他們所希望的是很單純了解現在電腦效能分布，
                    因此需要的是一個很簡潔的介面方便查詢售價，因此我們建立了這個平台，可以滿足小白與專業人士的需求。
                </P>
            </div>
            <div></div>
        </div>
        <hr>
        <div class="function">
            <div></div>
            <div>
                <h1>功能描述</h1>
                <p>
                    推薦分析：為小白而生的強大推薦功能，只需要給定預算與需求，就會透過演算法比對並匹配適合的電腦規格表，提供最單純、簡潔的操作體驗。
                </P>
                <p>
                    硬體選擇：電腦組裝老手的好幫手，可以透過天梯直接尋找適合的中央處理器或圖形卡，並且提供近期的現貨價格，給予使用者一個直覺的操作體驗。
                </P>
                <p>
                    硬體介紹：為小白科普的小天地，提供一個介面，讓使用者可以最快了解電腦的構造與功能，為將來的電腦組裝大師奠定基礎
                </P>
                <p>
                    關於我們：這份專題的強大開發團隊
                </P>
            </div>
            <div></div>
        </div>
        
        <hr>
        <section class="left">
            <div class="person">
                <div>
                    <img src="./picture/team/IMG_7308.jpg">
                    <span class="team_name">吳宥陞</span>
                    <span class="team_member">組長</span>
                    <span class="team_group">後端組</span>
                </div>
            </div>
            <div class="item">
                <div>
                    <ul>
                        <p class="first_li">負責項目:</p>
                        <li>程式撰寫：HTML、CSS、JavaScript、PHP、MySQL</li>
                        <li>投影片製作：展示PowerPoint</li>
                        <li>網頁上線：AWS 雲端主機架設、Apache設定、CA憑證設定、網站後續維護</li>
                        <li>資料庫架設：Database建立、資料匯入、資料維護</li>
                        <li>推薦分析設計：演算法設計與規畫</li>
                        <li>管理者介面：介面設計、後端程式撰寫</li>
                        <li>登入驗證：使用者帳號認證開發</li>
                    </ul>
                </div>
            </div>
        </section>
        <hr>
        <section class="left">
            <div class="person">
                <div>
                    <img src="./picture/team/IMG_7307.jpg">
                    <span class="team_name">陳宜謙</span>
                    <span class="team_member">副組長</span>
                    <span class="team_group">前端組</span>
                </div>
            </div>
            <div class="item">
                <div>
                    <ul>
                        <p class="first_li">負責項目:</p>
                        <li>程式撰寫：HTML、CSS、JavaScript、PHP、MySQL</li>
                        <li>整合測試：頁面整合測試、打包、Debug</li>
                        <li>頁面UI設計：設計風格統一，RWD調整與設計</li>
                        <li>資料收集：收集所有CPU、GPU、SSD、HDD資料，包含價格、效能、年份、介面等</li>
                    </ul>
                </div>
            </div>
        </section>
        <hr>
        <section class="left">
            <div class="person">
                <div>
                    <img src="./picture/team/IMG_7306.jpg">
                    <span class="team_name">李沛蓁</span>
                    <span class="team_member">組員</span>
                    <span class="team_group">後端組</span>
                </div>
            </div>
            <div class="item">
                <div>
                    <ul>
                        <p class="first_li">負責項目:</p>
                        <li>資料收集：收集所有軟體的資料，包含建議跑分、記憶體要求 </li>
                        <li>網頁上線：AWS 雲端主機架設、Apache設定、CA憑證設定、網站後續維護</li>
                        <li>資料庫架設：Database建立、資料匯入、資料維護</li>
                        <li>內文設計：網頁內文撰寫</li>
                    </ul>
                </div>
            </div>
        </section>
        <hr>
        <section class="left">
            <div class="person">
                <div>
                    <img src="./picture/team/man.png">
                    <span class="team_name">吳信篁</span>
                    <span class="team_member">組員</span>
                    <span class="team_group">前端組</span>
                </div>
            </div>
            <div class="item">
                <div>
                    <ul>
                        <p class="first_li">負責項目:</p>
                        <li>程式撰寫：HTML、CSS、JavaScript、PHP、MySQL</li>
                        <li>整合測試：頁面整合測試、打包、Debug</li>
                        <li>頁面UI設計：設計風格統一，RWD調整與設計</li>
                        <li>資料收集：收集所有CPU、GPU、SSD、HDD資料，包含價格、效能、年份、介面等</li>
                    </ul>
                </div>     
            </div>
        </section>
        <hr>
    </main>
    <div id="contact">
        <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSdHpJYW6VoekawngFsqPRKeAIGt4ipicZ8vi4JIEh3vAAOgUA/viewform?embedded=true" width="640" height="933" frameborder="0" marginheight="0" marginwidth="0">載入中…</iframe>
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
                $visitor = $row["aboutUS_record"];
                
                //人數 + 1
                // $new_visitor = (int) $visitor + 1;
                // $sql = "UPDATE ca.visitor set aboutUS_record = $new_visitor WHERE aboutUS_record = $visitor";
                // $result = mysqli_query($link, $sql);

                $visitor = str_pad($visitor,9,"0",STR_PAD_LEFT);
                echo $visitor;
            ?>
        </span>
        <p style="grid-area: copyright_english;">Copyright © 2022</p>
        <p style="grid-area: blank;"></p><!-- grid排版定位用，讓最右邊是空的 -->
        <span style="grid-area: date;">更新日期 : 2023/04/25</span>
        <p style="grid-area: copyright_chinese;">版權所有</p>
    </footer>
    <button id="top" onclick="location.href='#'"></button>
</body>
<script src="./javascript/sidebar.js"></script>
<script src="./javascript/footer.js"></script>
</html>

<!DOCTYPE html>
<html class="easy-sidebar-active">
<head>
    <?php
        require_once '../DatabaseManageUI/DataBaseAccount.php';
        //取得人數
        $sql = "SELECT * FROM ca.visitor";
        $result = mysqli_query($link, $sql);
        $row = mysqli_fetch_assoc($result);
        $visitor = $row["index_record"];
        // is_visitor
        // index analyze form introduce about_me
        //1/1/1/1/1
        if(isset($_COOKIE["is_visitor"])){
            //有COOKIE
            $Cookie_value = explode('/',  $_COOKIE["is_visitor"]);
            //有COOKIE，但index(0)為0
            if($Cookie_value[0] == "0"){
                //人數 + 1
                $new_visitor = (int) $visitor + 1;
                $sql = "UPDATE ca.visitor set index_record = $new_visitor WHERE index_record = $visitor";
                $result = mysqli_query($link, $sql);
                
                //COOKIE 儲存回去
                $value = "1/" . $Cookie_value[1] . "/". $Cookie_value[2] . "/". $Cookie_value[3] . "/". $Cookie_value[4];
                setcookie("is_visitor", $value, time()+3600);
            }
        } else {
            //無COOKIE，設定COOKIE
            setcookie("is_visitor", "1/0/0/0/0", time()+3600);
                //人數 + 1
            $new_visitor = (int) $visitor + 1;
            $sql = "UPDATE ca.visitor set index_record = $new_visitor WHERE index_record = $visitor";
            $result = mysqli_query($link, $sql);
        }
    ?>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./CSS/header.css">
    <link rel="stylesheet" href="./CSS/index.css">
    <link rel="stylesheet" href="./CSS/sidebar.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <title>電腦硬體需求分析平台</title>
</head>
<style>
    #logo{
        width: 50%;
    }
    header a{
        line-height: 0px;
    }
    @media screen and (max-width: 1000px) {
        #logo{
            width: 70%;
        }
    }
</style>
<body>
    <header>
        <a href="./index.php">
            <img src="./picture/logo2.png" alt="" id="logo">
            <!-- <img src="./picture/logo.png" alt="" id="logo">
            <h3><strong>電腦硬體需求分析平台</strong></h3> -->
        </a>
    </header>
    <!-- <div class="phone">
        <header>
            <a href="./index.php">
                <img src="./picture/logo.png" alt="" id="logo">
                <h3><strong>電腦硬體需求分析平台</strong></h3>
            </a>
        </header>
    </div> -->
    
    <!-- <div id="describe">
        <span></span>
    </div> -->
    
    <main>
        <section>
            <a href="./analyze.php">
                <div class="icon">
                   <img src="./picture/index/analyzing.png" alt="">
                </div>
                <div class="describe">
                    <h1>推薦分析</h1>
                    <p>藉由篩選條件尋找適合自己需求的電腦，主要給對電腦沒有基礎認識的小白，
                        只要給預算就會幫你配一台符合你需求的電腦</p>
                    <button>點此進入</button>
                </div>     
            </a>
        </section>
         <section>
            <a href="./form.php">
                <div class="icon">
                   <img src="./picture/index/choose.png" alt="">
                </div>
                <div class="describe">
                    <h1>硬體選擇</h1>
                    <p>適合對電腦有組裝經驗的人，可以透過這個功能去挑選適合自己的規格表，並且會幫你計算電源供應器的功率</p>
                    <button>點此進入</button>
                </div>
            </a>
        </section>
        <section>
            <a href="./introduce.php">
            <div class="icon">
                <img src="./picture/index/computer.png" alt="">
            </div>
                <div class="describe">
                    <h1>硬體介紹</h1>
                    <p>科普的地方，幫大家科普一些電腦知識，盡量淺顯易懂</p>
                    <button>點此進入</button>
                </div>
            </a>
        </section>
        <section>
            <a href="./about_me.php">
                <div class="icon">
                    <img src="./picture/index/team.png" alt="">
                </div>
                <div class="describe">
                    <h1>關於我們</h1>
                    <p>想知道是誰做的嗎?幕後團隊在這裡</p>
                    <button>點此進入</button>
                </div>
            </a>
        </section>
    </main>

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
                $visitor = $row["index_record"];
                
                //人數 + 1
                // $new_visitor = (int) $visitor + 1;
                // $sql = "UPDATE ca.visitor set index_record = $new_visitor WHERE index_record = $visitor";
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
</body>
<!-- <script src="./javascript/sidebar.js"></script> -->
<script src="./javascript/footer.js"></script>
<!-- <script src="./javascript/index.js"></script> -->
</html>

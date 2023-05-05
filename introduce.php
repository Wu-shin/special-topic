<!DOCTYPE html>
<html>
<head>
    <?php
        require_once '../DatabaseManageUI/DataBaseAccount.php';
        //取得人數
        $sql = "SELECT * FROM ca.visitor";
        $result = mysqli_query($link, $sql);
        $row = mysqli_fetch_assoc($result);
        $visitor = $row["introduction_record"];
        // is_visitor
        // index analyze form introduce about_me
        //1/1/1/1/1
        if(isset($_COOKIE["is_visitor"])){
            //有COOKIE
            $Cookie_value = explode('/',  $_COOKIE["is_visitor"]);
            //有COOKIE，但introduce(3)為0
            if($Cookie_value[3] == "0"){
                //人數 + 1
                $new_visitor = (int) $visitor + 1;
                $sql = "UPDATE ca.visitor set introduction_record = $new_visitor WHERE introduction_record = $visitor";
                $result = mysqli_query($link, $sql);
                
                //COOKIE 儲存回去
                $value = $Cookie_value[0] . "/" . $Cookie_value[1] . "/". $Cookie_value[2] . "/1" . "/". $Cookie_value[4];
                setcookie("is_visitor", $value, time()+3600);
            }
        }else{
            //無COOKIE，設定COOKIE
            setcookie("is_visitor", "0/0/0/1/0", time()+3600);
                //人數 + 1
            $new_visitor = (int) $visitor + 1;
            $sql = "UPDATE ca.visitor set introduction_record = $new_visitor WHERE introduction_record = $visitor";
            $result = mysqli_query($link, $sql);
        }
    ?>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./CSS/my_bootstrap.css">
    <link rel="stylesheet" href="./CSS/modal.css">
    <link rel="stylesheet" href="./CSS/introduce.css">
    <link rel="stylesheet" href="./CSS/header.css">
    <link rel="stylesheet" href="./CSS/sidebar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="preload" href="./picture/introduce/introduce_CPU.jpg" as="image"> -->
    <title>硬體介紹</title>
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
            <li><a class="active" href="#">硬體介紹</a></li>
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
                <!-- <img src="./picture/logo.png" alt="" id="logo">
                <h3><strong>電腦硬體需求分析平台</strong></h3> -->
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
    
    <div id="pic_div" >
        <img id="introduce_pic" src="./picture/introduce/introduce.jpg" alt="">
    </div>

    <!-- <div class="button_table">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#CPU">
            CPU</button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Motherboard">
            motherboard</button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#GPU">
            GPU</button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Momery">
            momery</button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Disk">
            Disk</button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Power">
            Power</button>
    </div>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#info">
        info</button> -->
    
    <!-- Modal -->
    <div class="modal fade" id="CPU" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">CPU</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="box">
                        <img id="CPU_pic" src="./picture/CPU.jpg" alt="">
                        <img id="brain" class="smallpic" src="./picture/brain.jpg" alt="">
                        <p>中央處理器（CPU）是一塊超大規模的集成電路，是一台計算機的運算核心和控制核心。它令電腦能夠與所有已安裝的應用程式和電腦程式互動。CPU 會解譯程式指令，然後建立使用電腦時與之互動的輸出。
                        </p>
                        <span>● CPU 是人類的大腦內層</span>
                        <p>CPU 可以比作人的大腦內層，負責各種數據的運算和處理，對各個器官與部位發布命令，並接受傳回來的信息，因此 CPU 就像大腦，充當指揮官的位子，對我們的電腦和人體都至關重要。</p>
                        <span>● 處理器核心與時脈速度</span>
                        <p>其中 CPU 最重要的處理器核心和時脈速度決定電腦一次可接收的資料量，以及該資料的處理速度。電腦的核心和時脈速度共同運作的速度，則被視為CPU 的處理速度。</p>
                        <span>● 超頻</span>
                        <p>超頻是把電子配件的時脈速度提升至高於廠方所定的速度運作，從而提升性能的方法，但此舉有可能導致該配件穩定性下降，且會增加功耗，所以需要特別注意散熱。</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal -->
    <div class="modal fade" id="Motherboard" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Motherboard 主機板</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="box">
                        <img src="./picture/motherboard.jpg" alt="">
                        <img class="smallpic" src="./picture/body.jpg" alt="">
                        <p>主機版是構成複雜電子系統例如電子計算機的中心或者主電路板。安裝在機箱內，是最基本的也是最重要的部件之一。典型的主機板能提供一系列接合點，供處理器、顯示卡、硬碟機、記憶體、對外裝置等裝置接合。通常直接插入有關插槽，或用線路連接。
                        </p>
                        <span>● 主機板是人類的骨骼</span>
                        <p>就像人類的骨骼在皮膚和肌肉下，所有器官和肌肉都要基於骨骼，和電腦的硬體一樣，都要在主板上運行，所以說主板就相當於人類的骨骼一樣。</p>
                        <!-- <span>● 晶片組</span>
                        <p>主機板上最重要的構成元件是晶片組。晶片組是整合在主機板中的矽晶片骨幹。晶片處理著許多重要系統工作的元件。在以前，主機板上有十多個晶片來運算整個系統。但隨著電腦的進步，現在，只需要二～四顆晶片(目前以兩顆晶片的設計居多)就能解決一切事務。而晶片組便是晶片集合起來的總稱。
                        </p>
                        <span>● 晶片組的南橋與北橋</span>
                        <p>Intel 在設計晶片時，習慣讓兩顆晶片來處理電腦系統中各個速度不一的部份。這兩顆晶片以 intel 的術語稱北橋晶片及南橋晶片。南北橋晶片是晶片組的重要架構，北橋晶片負責有
                            CPU、Memory、Cache
                            等高速元件的溝通，而南橋則是負責 IDE Port、USB Port 等較低速的周邊裝置。</p> -->
                        <span>● 超頻</span>
                        <p>電腦主板除了有不同的品牌外，還有很多什麼 B250，Z370 之類的型號初學者一般都不知道他代表的意義。
                            <br>首先要先清楚處理器是 Intel 還是 AMD，因為 Intel 和 AMD
                            處理器所用的主板是不同的，因此在購買時，一定要根據處理器來選擇主板，他們對應主板晶片組是不同的，完全不能通用，外觀上他們的判別方法也很簡單。
                        </p>
                        <span>➢ Intel</span>
                        <p class="part">
                            主板晶片組分成兩個維度，一個是等級，一個是系列。系列可以理解為一代一代的，技術先進性也不同，總的來說是越往後越先進，功能越強大。等級代表的是該系列裡面，性能等級又有一些差異，雖然在部分型號里面不是絕對，但是總體上還是可以代表下面的等級劃分：
                        </p>
                        <p class="part"><strong>Z 字母開頭：</strong>高端，Z 字母開頭的主板都支持超頻，搭配的 CPU 一般帶有「K」字母後綴。</p>
                        <p class="part"><strong>B 字母開頭：</strong>中端主流，這種主板不支持超頻，B 開頭的主板性價較高，主要搭配不帶 K 字母後綴的 CPU。</p>
                        <p><strong>H 字母開頭：</strong>入門級，不支持超頻，價格非常便宜，適合處理低端工作。</p>
                        <span>➢ AMD</span>
                        <p class="part">AMD 主板晶片組跟 intel 類似，有三個等級， X/B/A。</p>
                        <p class="part"><strong>X 字母開頭：</strong>最高級，支持自適應動態擴頻超頻，搭配 AMD 中代「X」字母後綴的處理器。</p>
                        <p class="part"><strong>B 字母開頭：</strong>中端主流，可以超頻，不支持完整的自適應動態擴頻超頻， 性價比較高。</p>
                        <p><strong>A 字母開頭：</strong>入門級，不支持超頻，普通辦公用戶使用。</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="Chipset" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Chipset 晶片組</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="box">
                        <!-- <img src="./picture/motherboard.png" alt=""> -->
                        <!-- <img class="smallpic" src="./picture/body.png" alt=""> -->
                        <!-- <p>主機版是構成複雜電子系統例如電子計算機的中心或者主電路板。安裝在機箱內，是最基本的也是最重要的部件之一。典型的主機板能提供一系列接合點，供處理器、顯示卡、硬碟機、記憶體、對外裝置等裝置接合。通常直接插入有關插槽，或用線路連接。
                        </p>
                        <span>● 主機板是人類的骨骼</span>
                        <p>就像人類的骨骼在皮膚和肌肉下，所有器官和肌肉都要基於骨骼，和電腦的硬體一樣，都要在主板上運行，所以說主板就相當於人類的骨骼一樣。</p> -->
                        <span>● 晶片組</span>
                        <p>主機板上最重要的構成元件是晶片組。晶片組是整合在主機板中的矽晶片骨幹。晶片處理著許多重要系統工作的元件。在以前，主機板上有十多個晶片來運算整個系統。但隨著電腦的進步，現在，只需要二～四顆晶片(目前以兩顆晶片的設計居多)就能解決一切事務。而晶片組便是晶片集合起來的總稱。
                        </p>
                        <span>● 晶片組的南橋與北橋</span>
                        <p>Intel 在設計晶片時，習慣讓兩顆晶片來處理電腦系統中各個速度不一的部份。這兩顆晶片以 intel 的術語稱北橋晶片及南橋晶片。南北橋晶片是晶片組的重要架構，北橋晶片負責有
                            CPU、Memory、Cache
                            等高速元件的溝通，而南橋則是負責 IDE Port、USB Port 等較低速的周邊裝置。</p>
                        <!-- <span>● 超頻</span>
                        <p>電腦主板除了有不同的品牌外，還有很多什麼 B250，Z370 之類的型號初學者一般都不知道他代表的意義。
                            <br>首先要先清楚處理器是 Intel 還是 AMD，因為 Intel 和 AMD
                            處理器所用的主板是不同的，因此在購買時，一定要根據處理器來選擇主板，他們對應主板晶片組是不同的，完全不能通用，外觀上他們的判別方法也很簡單。
                        </p>
                        <span>➢ Intel</span>
                        <p class="part">
                            主板晶片組分成兩個維度，一個是等級，一個是系列。系列可以理解為一代一代的，技術先進性也不同，總的來說是越往後越先進，功能越強大。等級代表的是該系列裡面，性能等級又有一些差異，雖然在部分型號里面不是絕對，但是總體上還是可以代表下面的等級劃分：
                        </p>
                        <p class="part"><strong>Z 字母開頭：</strong>高端，Z 字母開頭的主板都支持超頻，搭配的 CPU 一般帶有「K」字母後綴。</p>
                        <p class="part"><strong>B 字母開頭：</strong>中端主流，這種主板不支持超頻，B 開頭的主板性價較高，主要搭配不帶 K 字母後綴的 CPU。</p>
                        <p><strong>H 字母開頭：</strong>入門級，不支持超頻，價格非常便宜，適合處理低端工作。</p>
                        <span>➢ AMD</span>
                        <p class="part">AMD 主板晶片組跟 intel 類似，有三個等級， X/B/A。</p>
                        <p class="part"><strong>X 字母開頭：</strong>最高級，支持自適應動態擴頻超頻，搭配 AMD 中代「X」字母後綴的處理器。</p>
                        <p class="part"><strong>B 字母開頭：</strong>中端主流，可以超頻，不支持完整的自適應動態擴頻超頻， 性價比較高。</p>
                        <p><strong>A 字母開頭：</strong>入門級，不支持超頻，普通辦公用戶使用。</p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="GPU" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">GPU</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="box">
                        <img id="GPU_pic" src="./picture/GPU.jpg" alt="">
                        <img id="eyes" class="smallpic" src="./picture/eyes.jpg" alt="">
                        <p class="part">類似 CPU，圖形處理器（GPU）是電腦或伺服器內的處理器，但扮演不同功能。CPU 架構比較複雜，功能比較泛用，如同電腦或伺服器的通才，能扛起各種運算任務；而 GPU
                            採用的平行運算架構比較單純、核心數量較多，適合快速處理專精的工作，例如，繪製螢幕上呈現的影像。</p>
                        <p>獨立顯示卡（獨顯），這種產品有時也被稱為 GPU，但其實是一張插在主機板上的擴充卡，內部裝有 GPU。獨顯的GPU 享有專屬記憶體、散熱片等零件， 所以一般來說，效能遠遠超過主機板或 CPU
                            內建的
                            GPU。因此，獨顯已成為電競不可或缺的明星產品之一。</p>
                        <span>● 顯卡是眼睛+大腦視覺資訊處理</span>
                        <p>大腦從眼睛獲取資訊，然後從大腦永久記憶的中對比，讀入記憶體，讓你感覺到獲取視覺資訊的感覺。</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="Momery" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Memory</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="box">
                        <img id="memory_pic" src="./picture/memory.jpg" alt="">
                        <img id="desktop_pic" src="./picture/desktop.jpg" alt="">
                        <p>電腦記憶體(memory)可分為記憶體和外部記憶體，其中記憶體是系統的短期資料儲存區，存放電腦正在使用中的資訊，因記憶體是 CPU 能直接定址的儲存空間，所以方便 CPU
                            快速地存取。系統正在執行的程式越多，需要的記憶體就越多。</p>
                        <span>● 記憶體是大腦的臨時記憶功能</span>
                        <p>內存的作用是用於暫時存放 CPU 中的運算數據，以及與硬碟等外部存儲器交換的數據。內存比作人的臨時記憶功能，負責暫存數據。</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="SSD" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">SSD</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="box">
                        <!-- <p class="part">硬碟是用來儲存電腦上的數位內容與資料的硬體。每部電腦都有內建硬碟，但也可以購買外接硬碟來擴充電腦的儲存空間。</p>
                        <p>所有電腦都需要使用磁碟來長期儲存資料。這又叫做次要儲存空間。</p> -->
                        <img id="SSD_pic" src="./picture/SSD.jpg" alt="">
                        <img id="file_table" src="./picture/file_table.jpg" alt="">
                        <br>
                        <span>● 固態硬碟（SSD/ Solid-state drive）</span>
                        <p class="part">SSD (固態硬碟) 是新型硬碟。它們已成為高階筆電偏好使用的內建硬碟；所有智慧型手機與平板電腦也都使用某種形式的 SSD。固態硬碟使用<strong>
                        快閃記憶體</strong>， 此技術也用於 USB Flash 以及數位相機記憶卡。SSD
                        不會使用任何磁盤，而是透過半導體儲存資料，原理為改變 SSD 內數兆個電路的電子狀態。由於SSD 沒有任何可動零件（不必等磁碟旋轉），所以它們不只速度更快，壽命通常也比 HDD 長。</p>
                        <p>SSD 的製造成本高昂許多，因此即使它們越來越盛行，並成為高階筆電與 PC 主要使用的磁碟，部分人依然偏好選擇硬碟作為較便宜的外部儲存空間。</p>
                        <span>● SSD 固態硬碟顆粒：</span>
                        <p>SSD 中的快閃記憶體由多個存放以位元（bit）為單位的單元構成，這些位元通過電荷被打開或關閉，存儲單元的 bits 決定了 NAND
                            快閃記憶體的命名，比如單級單元（SLC）快閃記憶體在每個存儲單元中包含一個位元。</p>
                        <span>➢ 單級單元（Single Level Cell / SLC）</span>
                        <p>SLC
                            這類型的快閃記憶體讀寫速度快、擦寫壽命和讀寫迴圈的週期長、讀取/寫入錯誤的發生幾率更小，并可在跨度更大的溫度範圍內正常運行。這種類型的快閃記憶體由於其使用壽命，準確性和綜合性能，在企業市場上十分受眾。但儲存成本高、存儲容量相對較小，較適合需要大量讀取/寫入週期的工業級負載，例如伺服器。
                        </p>
                        <span>➢ 多級單元（Multi Level Cell / MLC）</span>
                        <p>MLC 在 SLC 的 1 位元/單元的基礎上，變成了 2 位元/單元。降低了大容量儲存快閃記憶體的成本，有相對合理的容量/價格比，因此 MLC 快閃記憶體是家用電腦的首選，雖然擦寫壽命較
                            SLC 短，但對於家用級別來說已經十分足夠，
                            適合較頻繁地使用電腦的用戶或遊戲玩家。</p>
                        <span>➢ 三級單元（Triple Level Cell / TLC）</span>
                        <p>TLC 是快閃記憶體生產中較低廉的規格，其儲存達到了 3 位元/單元，雖然高儲存密度實現了較廉價的大容量格式，但其讀寫的生命週期被極大地縮短，擦寫壽命只有短短的 500~1000
                            次，同時讀寫速度較差，只適合普通消費者使用。適合對存儲需求不大的輕度使用需求的電腦用戶，比如只使用上網、郵件等簡單功能的上網本、平板。</p>
                        <span>➢ 四級單元（Quad-level cells / QLC）</span>
                        <p>QLC 每個 SSD 顆粒可儲存 4bit 資料。可以接受經受 1000 次程式設計或擦寫迴圈，而且容量提升，儲存密度高，成本也更低，從而獲得更好的效益。性能和寫入壽命與 TLC
                            相當。適合檔案資訊存儲量的需求較大、平時對電腦進行輕度使用（寫入操作少）、或者追求較低價格的使用者。</p>
                        <span>● 硬碟是人類的永久記憶能力</span>
                        <p>硬碟是電腦主要的存儲媒介之一，我們可以把硬碟比作人的永久記憶能力，負責數據的儲存、記憶。記憶都儲存在大腦，就像我們的電腦數據都在硬碟裡一樣。</p>
                        <span>● 記憶體就像是桌面，硬碟像是檔案櫃</span>
                        <p>記憶體提供進行各項工作的空間，且桌面越大，能同時放在桌上的紙張、文件夾和工作就越多。您可以快速且輕鬆地取得所需資訊，不需要在檔案櫃（儲存硬碟）裡面翻找。工作結束或下班後，您可以將部分工作內容安全地存入檔案櫃。儲存硬碟（傳統硬碟或固態硬碟）就是與桌面搭配使用的檔案櫃，記錄您的工作進度。
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="HDD" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">HDD</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="box">
                        <img id="disk_pic" src="./picture/disk.jpg" alt="">
                        <img id="file_table" src="./picture/file_table.jpg" alt="">
                        <p class="part">硬碟是用來儲存電腦上的數位內容與資料的硬體。每部電腦都有內建硬碟，但也可以購買外接硬碟來擴充電腦的儲存空間。</p>
                        <p>所有電腦都需要使用磁碟來長期儲存資料。這又叫做次要儲存空間。</p>
                        <span>● 硬碟（HDD/ Hard Disk Drive）</span>
                        <p class="part">較「傳統」的硬碟類型就是 HDD。硬碟由快速旋轉的磁碟組成 (又稱為磁盤)，磁碟旋轉的速度越快，電腦從中存取資訊的速度也越快。資料以磁性方式儲存，HDD
                            是非揮發性裝置，也就是說在電腦關閉電源後仍能保留資料。</p>
                        <p class="part">如今，內建 HDD 的最高容量可達 20 TB。自 SSD 問世以來，越來越少電腦使用硬碟作為次要儲存空間，但它仍然是可靠的外接儲存空間選項。</p>
                        <p>然而微軟正推動 OEM 廠商放棄 HDD 作為構建 Windows 11 PC 的主要儲存設備，轉而使用 SSD，截止的時間點為 2023 年，因此未來可能SSD 會逐漸成為主流，並取代
                            HDD。</p>
                        <span>● 硬碟是人類的永久記憶能力</span>
                        <p>硬碟是電腦主要的存儲媒介之一，我們可以把硬碟比作人的永久記憶能力，負責數據的儲存、記憶。記憶都儲存在大腦，就像我們的電腦數據都在硬碟裡一樣。</p>
                        <span>● 記憶體就像是桌面，硬碟像是檔案櫃</span>
                        <p>記憶體提供進行各項工作的空間，且桌面越大，能同時放在桌上的紙張、文件夾和工作就越多。您可以快速且輕鬆地取得所需資訊，不需要在檔案櫃（儲存硬碟）裡面翻找。工作結束或下班後，您可以將部分工作內容安全地存入檔案櫃。儲存硬碟（傳統硬碟或固態硬碟）就是與桌面搭配使用的檔案櫃，記錄您的工作進度。
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="Power" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Power</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="box">
                        <img id="power_pic" src="./picture/power.jpg" alt="">
                        <img id="heart" src="./picture/heart.jpg" alt="">
                        <br>
                        <span>● 電源是人類的心臟：</span>
                        <p>電源和人類的心臟功能一樣，電腦需要供給全身所需的能量，使所有器官運作起來。一旦停止，所有操作和行為全部停止。</p>
                        <span>● 認證</span>
                        <p class="part">購買 power 時， 常常看到金牌認證或銅牌認證的電源供應器，其中有4種常見的
                            認證等級， 各效能為：白牌 80%、銅牌 82%、銀牌 85%、金牌 87%、白金牌
                            90%。而認証效能指的是，電流 AC 透過 power 轉換成電壓 DC的運作效率。</p>
                        <p>如 110V 的家電在電源供應器中轉換成直流電壓並供給電腦使用電力， AC 端進入
                            端 100%電力， 轉換電壓時轉換器中所產生熱能，在轉換的過程中會耗損約
                            10~20%(白牌~金牌耗損率)的電力， DC 輸出端可使用 80~90%(白牌~金牌轉換
                            率)的電力。</p>
                        <img id="a80plus" src="./picture/80PLUS.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="info" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">INFO</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="box">
                        <div>
                            <h2>參考資料</h2>
                            <hr>
                            <span>● 電腦主板型號標識都是些什麼意思？買主板不再迷茫！。尋夢新聞。
                                2018-09-13</span>
                            <p>取自：<a href="https://ek21.com/news/1/74287/"
                                    target="_blank">https://ek21.com/news/1/74287/</a></p>
    
                            <span>● 微軟 Windows 將取消 HDD 作為系統啟動, 2023 年實施。2022- 06-10</span>
                            <p>取自：<a href="https://reurl.cc/2mOqgn" target="_blank">https://reurl.cc/2mOqgn</a></p>
    
                            <span>● 最新SSD 固態硬碟顆粒SLC/MLC/TLC/QLC 有什麼區別？。大大通</span>
                            <p>取自：<a href="https://www.wpgdadatong.com/tw/blog/detail/44366"
                                    target="_blank">https://www.wpgdadatong.com/tw/blog/detail/44366</a></p>
    
                            <span>● Plus 白牌、銅牌、銀牌、金牌的迷思。2012-03-19</span>
                            <p>取自：<a href="https://www.mobile01.com/topicdetail.php?f=501&t=1471373"
                                    target="_blank">https://www.mobile01.com/topicdetail.php?f=501&t=1471373</a></p>
    
                            <span>● 電腦趣談，你知道電腦的硬體對應我們身體的什麼器官麼。壹讀。2018- 12-03</span>
                            <p>取自：<a href="https://read01.com/5MGQj54.html"
                                    target="_blank">https://read01.com/5MGQj54.html</a></p>
    
                            <span>● 晶片組=南北橋晶片。2008-06-06</span>
                            <p>取自：<a href="https://m.xuite.net/blog/dagron/wretch/137546235"
                                    target="_blank">https://m.xuite.net/blog/dagron/wretch/137546235</a></p>
                        </div>
    
                        <div class="original_picture">
                            <h2>圖片來源</h2>
                            <hr>
                            <span>● CPU：<a href="https://www.amazon.cn/dp/B07RXX3Y2T"
                                    target="_blank">https://www.amazon.cn/dp/B07RXX3Y2T</a></span>
                            <span>● 大腦：<a href="https://616pic.com/sucai/z0mfwxg6v.html"
                                    target="_blank">https://616pic.com/sucai/z0mfwxg6v.html</a></span>
                            <span>● Motherboard：<a href="https://www.asus.com.cn/motherboards-components/motherboards/prime/prime-b560m-a/" 
                                    target="_blank">https://reurl.cc/91pW4V</a></span>
                            <span>● 骨骼：<a href="https://www.16pic.com/down/7122021.html"
                                    target="_blank">https://www.16pic.com/down/7122021.html</a></span>
                            <span>● GPU：<a href="https://www.asus.com/tw/motherboards-components/graphics-cards/tuf-gaming/tuf-rtx3090-o24g-gaming/" 
                                    target="_blank">https://reurl.cc/eWOpLL</a></span>
                            <span>● 眼睛：<a href="https://www.16pic.com/down/6632833.html"
                                    target="_blank">https://www.16pic.com/down/6632833.html</a></span>
                            <span>● Memory：<a href="https://www.adata.com/tw/consumer/483" 
                                    target="_blank">https://www.adata.com/tw/consumer/483</a></span>
                            <span>● 桌面書櫃：<a href="https://reurl.cc/KQZYle"
                                    target="_blank">https://reurl.cc/KQZYle</a></span>
                            <span>● HDD：<a href="https://www.seagate.com/tw/zh/products/hard-drives/barracuda-hard-drive/" 
                                    target="_blank">https://reurl.cc/28mazX</a></span>
                            <span>● SSD：<a href="https://www.samsung.com/us/computing/memory-storage/solid-state-drives/980-pro-pcie-4-0-nvme-ssd-2tb-mz-v8p2t0b-am/" 
                                    target="_blank">https://reurl.cc/6L0GvV</a></span>
                            <span>● 檔案櫃：<a href="https://reurl.cc/RXAGkn" 
                                    target="_blank">https://reurl.cc/RXAGkn</a></span>
                            <span>● 心臟：<a href="https://www.16pic.com/down/7229762.html"
                                    target="_blank">https://www.16pic.com/down/7229762.html</a></span>
                            <span>● 電源：<a href="https://reurl.cc/GE7ylv" 
                                    target="_blank">https://reurl.cc/GE7ylv</a></span>
                            <!-- <span>● ：<a href="" target="_blank"></a></span> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="cache" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">cache</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="box">
                        <img src="./picture/introduce/introduce_Chipset.jpg" alt="">
                        <img src="./picture/introduce/introduce_CPU.jpg" alt="">
                        <img src="./picture/introduce/introduce_GPU.jpg" alt="">
                        <img src="./picture/introduce/introduce_HDD.jpg" alt="">
                        <img src="./picture/introduce/introduce_INFO.jpg" alt="">
                        <img src="./picture/introduce/introduce_MB.jpg" alt="">
                        <img src="./picture/introduce/introduce_Memory.jpg" alt="">
                        <img src="./picture/introduce/introduce_Power.jpg" alt="">
                        <img src="./picture/introduce/introduce_SSD.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
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
                $visitor = $row["introduction_record"];
                
                //人數 + 1
                // $new_visitor = (int) $visitor + 1;
                // $sql = "UPDATE ca.visitor set introduction_record = $new_visitor WHERE introduction_record = $visitor";
                // $result = mysqli_query($link, $sql);

                $visitor = str_pad($visitor,9,"0",STR_PAD_LEFT);
                echo $visitor;
            ?>
        </span>
        <p style="grid-area: copyright_english;">Copyright © 2022</p>
        <p style="grid-area: blank;"></p><!-- grid排版定位用，讓最右邊是空的 -->
        <span style="grid-area: date;">更新日期 : 2023/04/14</span>
        <p style="grid-area: copyright_chinese;">版權所有</p>
    </footer>
    <button id="top" onclick="location.href='#'"></button>
    <!-- <button id="top">TOP</button> -->
</body>

<script src="https://cdn.staticfile.org/jquery/2.2.4/jquery.min.js"></script>
<script src="./javascript/introduce.js"></script>
<script src="./javascript/sidebar.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>
<script src="./javascript/footer.js"></script>

<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script> -->
</html>

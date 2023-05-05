//後端位置
socket_action_url = "./cpu_mb_socket.php"

// window.confirm("彈跳");

// 搜尋下拉選單的值
CPU_Socket_select = document.getElementById('cpu')
MB_Socket_select = document.getElementById('MB')
// 下拉選單監聽改變
CPU_Socket_select.addEventListener("change", CPU_Socket_change)
MB_Socket_select.addEventListener("change", MB_Socket_change)
//設定初始值
CPU_Socket = 0
MB_Socket = 0

function CPU_Socket_change(){
    $.ajax({
        // dataType:'json',
        url:socket_action_url,
        method:"POST",
        data:{"CPU":CPU_Socket_select.value},
        success:function(res){
            CPU_Socket = res//回傳值為 字串型態
            // console.log(CPU_Socket)
            check();
        },
        error:function(err){
            console.log("err",err)
        },
    });
}
function MB_Socket_change(){
    $.ajax({
        url:socket_action_url,
        method:"POST",
        data:{"MB":MB_Socket_select.value},
        success:function(res){
            MB_Socket = res
            // console.log(MB_Socket)
            check();
        },
        error:function(err){
            console.log(err)
        },
    });
}
function check(){
    if(CPU_Socket!=0 && MB_Socket!=0){
        if(CPU_Socket!=MB_Socket){
            window.confirm("請注意CPU以及MotherBoard腳位問題")
        }
    }
}





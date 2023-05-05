//後端位置
action_url = "./PHP/price.php"

// 搜尋下拉選單的值
CPU_select = document.getElementById('cpu')
MB_select = document.getElementById('MB')
GPU_select = document.getElementById('gpu')
Memory_select = document.getElementById('Memory')
Disk_select = document.getElementById('Disk')
// 下拉選單監聽改變
CPU_select.addEventListener("change", CPU_change)
MB_select.addEventListener("change", MB_change)
GPU_select.addEventListener("change", GPU_change)
Memory_select.addEventListener("change", Memory_change)
Disk_select.addEventListener("change", Disk_change)
//每個物品的價格
CPU_price = 0
MB_price = 0
GPU_price = 0
Memory_price = 0
Disk_price = 0
Power_price = 0

function total_change(){
    price = document.getElementById('total_price')
    price.innerHTML = "NT$" + String(Number(CPU_price)+Number(MB_price)+Number(GPU_price)+Number(Memory_price)+Number(Disk_price)+Number(Power_price))
}

function CPU_socket(){
    $.ajax({
        url:"./PHP/socket.php",
        method:"POST",
        data:{"CPU":CPU_select.value},
        success:function(res){//回傳值為 string
            MB_select.innerHTML = res;
            MB_change()//若先選擇，有可能會因socket改變而價格不對
        },
        error:function(err){
            console.log("err",err)
        },
    });
}

function MB_socket(){
    $.ajax({
        url:"./PHP/socket.php",
        method:"POST",
        data:{"MB":MB_select.value},
        success:function(res){//回傳值為 string
            Memory_select.innerHTML = res;
            Memory_change()//若先選擇，有可能會因socket改變而價格不對
        },
        error:function(err){
            console.log("err",err)
        },
    });
}

function CPU_change(){
    $.ajax({
        url:action_url,
        method:"POST",
        data:{"CPU":CPU_select.value},
        success:function(res){
            CPU_price = res//回傳值為 字串型態
            CPU_socket()
            //MB_change()//若先選擇，有可能會因socket改變而價格不對
            total_change()
            power_check()//在button.js內
        },
        error:function(err){
            console.log("err",err)
        },
    });
}

function MB_change(){
    $.ajax({
        url:action_url,
        method:"POST",
        data:{"MB":MB_select.value},
        success:function(res){
            MB_price = res
            MB_socket()
            //Memory_change()//若先選擇，有可能會因socket改變而價格不對
            total_change()
        },
        error:function(err){
            console.log(err)
        },
    });
            

}

function GPU_change(){
    $.ajax({
        url:action_url,
        method:"POST",
        data:{"GPU":GPU_select.value},
        success:function(res){
            GPU_price = res
            total_change()
            power_check()//在button.js內
        },
        error:function(err){
            console.log(err)
        },
    });
}

function Memory_change(){
    $.ajax({
        url:action_url,
        method:"POST",
        data:{"Memory":Memory_select.value},
        success:function(res){
            Memory_price = res
            total_change()
        },
        error:function(err){
            console.log(err)
        },
    });
}

function Disk_change(){
    $.ajax({
        url:action_url,
        method:"POST",
        data:{"Disk":Disk_select.value},
        success:function(res){
            Disk_price = res
            total_change()
        },
        error:function(err){
            console.log(err)
        },
    });
}

function Power_change(p){
    Power_price = p
    total_change()
}

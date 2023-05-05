var CPU = document.getElementsByTagName("main")[0]
var MotherBoard = document.getElementsByTagName("main")[1]
var GPU = document.getElementsByTagName("main")[2]
var Memory = document.getElementsByTagName("main")[3]
var Disk = document.getElementsByTagName("main")[4]
var Final_table = document.getElementsByTagName("article")[0]
var img = document.getElementById("image_append")

var CPU_position = getPosition(CPU);
var MB_position = getPosition(MotherBoard);
var GPU_position = getPosition(GPU);
var Memory_position = getPosition(Memory);
var Disk_position = getPosition(Disk);
var Final_position = getPosition(Final_table);
var img_position = getPosition(img);

jQuery(document).ready(function() {
    $('#top').click(function(event) {
        event.preventDefault();
        $('html, body').animate({scrollTop:0},1000);
    });
    $('#CPU-next-btn').click(function(event) {
        event.preventDefault();
        $('html, body').animate({scrollTop:MB_position.y},1000);
    });
    $('#MB-next-btn').click(function(event) {
        event.preventDefault();
        $('html, body').animate({scrollTop:GPU_position.y},1000);
    });
    $('#MB-previous_btn').click(function(event) {
        event.preventDefault();
        $('html, body').animate({scrollTop:CPU_position.y},1000);
    });
    $('#GPU-next-btn').click(function(event) {
        event.preventDefault();
        $('html, body').animate({scrollTop:Memory_position.y},1000);
    });
    $('#GPU-previous_btn').click(function(event) {
        event.preventDefault();
        $('html, body').animate({scrollTop:MB_position.y},1000);
    });
    $('#Memory-next-btn').click(function(event) {
        event.preventDefault();
        $('html, body').animate({scrollTop:Disk_position.y},1000);
    });
    $('#Memory-previous_btn').click(function(event) {
        event.preventDefault();
        $('html, body').animate({scrollTop:GPU_position.y},1000);
    });
    $('#Disk-next-btn').click(function(event) {
        event.preventDefault();
        $('html, body').animate({scrollTop:Final_position.y},1000);
    });
    $('#Disk-previous_btn').click(function(event) {
        event.preventDefault();
        $('html, body').animate({scrollTop:Memory_position.y},1000);
    });
    $('#PIC_btn').click(function(event) {
        event.preventDefault();
        $('html, body').animate({scrollTop:img_position.y},500);
    });
});

function getPosition(element) {
        var x = 0;
        var y = 0;
        // 搭配上面的示意圖可比較輕鬆理解為何要這麼計算
        while (element) {
            x += element.offsetLeft - element.scrollLeft + element.clientLeft;
            y += element.offsetTop - element.scrollLeft + element.clientTop - 30;//30為總金額列多出來的高度
            element = element.offsetParent;
        }
        return { x: x, y: y };
    }//https://andyyou.github.io/2015/04/07/get-an-element-s-position-by-js/

function power_check(){
    var CPU_value,GPU_value,OC_value,VGA_value;
    if(CPU_select.value.search("i3") != -1 || CPU_select.value.search("i5") != -1){
        CPU_value = "Intel Core i3 / Intel Core i5";
    }
    else if(CPU_select.value.search("i7") != -1){
        CPU_value = "Intel Core i7";
    }
    else if(CPU_select.value.search("i9") != -1){
        CPU_value = "Intel Core i9";
    }
    else if(CPU_select.value.search("R3") != -1 || CPU_select.value.search("R5") != -1){
        CPU_value = "AMD Ryzen 3 / AMD Ryzen 5";
    }
    else if(CPU_select.value.search("R7") != -1){
        CPU_value = "AMD Ryzen 7";
    }
    else if(CPU_select.value.search("R9") != -1){
        CPU_value = "AMD Ryzen 9";
    }
    else if(CPU_select.value.search("XE") != -1){
        CPU_value = "Intel HEDT Series";
    }
    else if(CPU_select.value.search("ThreadRipper") != -1){
        CPU_value = "AMD Ryzen ThreadRipper";
    }
    else{
        CPU_value = "AMD Ryzen 3 / AMD Ryzen 5";
    }
    

    if(GPU_select.value.search("4090") != -1){
        GPU_value = "NVIDIA GeForce RTX 4090";
    }
    else if(GPU_select.value.search("4080") != -1){
        GPU_value = "NVIDIA GeForce RTX 4080 16GB";
    }
    else if(GPU_select.value.search("4070") != -1){
        GPU_value = "NVIDIA GeForce RTX 4070 Ti";
    }
    else if(GPU_select.value.search("3090 Ti") != -1){
        GPU_value = "NVIDIA GeForce RTX 3090 Ti";
    }
    else if(GPU_select.value.search("3090") != -1){
        GPU_value = "NVIDIA GeForce RTX 3090";
    }
    else if(GPU_select.value.search("3080 Ti") != -1){
        GPU_value = "NVIDIA GeForce RTX 3080 Ti";
    }
    else if(GPU_select.value.search("3080") != -1){
        GPU_value = "NVIDIA GeForce RTX 3080";
    }
    else if(GPU_select.value.search("3070 Ti") != -1){
        GPU_value = "NVIDIA GeForce RTX 3070 Ti";
    }
    else if(GPU_select.value.search("3070") != -1){
        GPU_value = "NVIDIA GeForce RTX 3070";
    }
    else if(GPU_select.value.search("3060 Ti") != -1){
        GPU_value = "NVIDIA GeForce RTX 3060 Ti";
    }
    else if(GPU_select.value.search("3060 12GB") != -1){
        GPU_value = "NVIDIA GeForce RTX 3060 12GB";
    }
    else if(GPU_select.value.search("3050") != -1){
        GPU_value = "NVIDIA GeForce RTX 3050";
    }
    else if(GPU_select.value.search("2080 Ti") != -1){
        GPU_value = "NVIDIA GeForce RTX 2080 Ti";
    }
    else if(GPU_select.value.search("2080 SUPER") != -1){
        GPU_value = "NVIDIA GeForce RTX 2080 SUPER";
    }
    else if(GPU_select.value.search("2080") != -1){
        GPU_value = "NVIDIA GeForce RTX 2080";
    }
    else if(GPU_select.value.search("2070 SUPER") != -1){
        GPU_value = "NVIDIA GeForce RTX 2070 SUPER";
    }
    else if(GPU_select.value.search("2070") != -1){
        GPU_value = "NVIDIA GeForce RTX 2070";
    }
    else if(GPU_select.value.search("2060 SUPER") != -1){
        GPU_value = "NVIDIA GeForce RTX 2060 SUPER";
    }
    else if(GPU_select.value.search("2060") != -1){
        GPU_value = "NVIDIA GeForce RTX 2060";
    }
    else if(GPU_select.value.search("1660 Ti") != -1){
        GPU_value = "NVIDIA GeForce GTX 1660 Ti";
    }
    else if(GPU_select.value.search("1660 SUPER") != -1){
        GPU_value = "NVIDIA GeForce GTX 1660 SUPER";
    }
    else if(GPU_select.value.search("1660") != -1){
        GPU_value = "NVIDIA GeForce GTX 1660";
    }
    else if(GPU_select.value.search("1650 SUPER") != -1){
        GPU_value = "NVIDIA GeForce GTX 1650 SUPER";
    }
    else if(GPU_select.value.search("1650") != -1){
        GPU_value = "NVIDIA GeForce GTX 1650";
    }
    else if(GPU_select.value.search("1630") != -1){
        GPU_value = "NVIDIA GeForce GTX 1630";
    }
    else if(GPU_select.value.search("6950 XT") != -1){
        GPU_value = "AMD Radeon RX 6950 XT";
    }
    else if(GPU_select.value.search("6900 XT") != -1){
        GPU_value = "AMD Radeon RX 6900 XT";
    }
    else if(GPU_select.value.search("6800 XT") != -1){
        GPU_value = "AMD Radeon RX 6800 XT";
    }
    else if(GPU_select.value.search("6800") != -1){
        GPU_value = "AMD Radeon RX 6800";
    }
    else if(GPU_select.value.search("6750 XT") != -1){
        GPU_value = "AMD Radeon RX 6750 XT";
    }
    else if(GPU_select.value.search("6700 XT") != -1){
        GPU_value = "AMD Radeon RX 6700 XT";
    }
    else if(GPU_select.value.search("6650 XT") != -1){
        GPU_value = "AMD Radeon RX 6650 XT";
    }
    else if(GPU_select.value.search("6600 XT") != -1){
        GPU_value = "AMD Radeon RX 6600 XT";
    }
    else if(GPU_select.value.search("6600") != -1){
        GPU_value = "AMD Radeon RX 6600";
    }
    else if(GPU_select.value.search("6500 XT") != -1){
        GPU_value = "AMD Radeon RX 6500 XT";
    }
    else if(GPU_select.value.search("6400") != -1){
        GPU_value = "AMD Radeon RX 6400";
    }
    else if(GPU_select.value.search("5700 XT") != -1){
        GPU_value = "AMD Radeon RX 5700 XT";
    }
    else if(GPU_select.value.search("5700") != -1){
        GPU_value = "AMD Radeon RX 5700";
    }
    else if(GPU_select.value.search("5600") != -1){
        GPU_value = "AMD Radeon RX 5600 XT";
    }
    else if(GPU_select.value.search("550") != -1){
        GPU_value = "AMD Radeon RX 5500 XT";
    }
    else if(GPU_select.value.search("VEGA 64 (Liquid)") != -1){
        GPU_value = "AMD Radeon RX VEGA 64 (Liquid)";
    }
    else if(GPU_select.value.search("VEGA 64") != -1){
        GPU_value = "AMD Radeon RX VEGA 64";
    }
    else if(GPU_select.value.search("VEGA 56") != -1){
        GPU_value = "AMD Radeon RX VEGA 56";
    }
    else if(GPU_select.value.search("580") != -1){
        GPU_value = "AMD Radeon RX 580";
    }
    else if(GPU_select.value.search("570") != -1){
        GPU_value = "AMD Radeon RX 570";
    }
    else if(GPU_select.value.search("560") != -1){
        GPU_value = "AMD Radeon RX 560";
    }
    else if(GPU_select.value.search("550") != -1){
        GPU_value = "AMD Radeon RX 550";
    }
    else{
        GPU_value = "AMD Radeon RX 5500 XT";
    }

    if(cpu_checkbox.checked || gpu_checkbox.checked || MB_checkbox.checked || Memory_checkbox.checked){
        OC_value = 1;
        console.log("OC","1")
    }
    else{
        OC_value = 0;
        console.log("OC","0")
    }

    if(Inte_VGA_checkbox.checked){
        VGA_value = 1;
        console.log("VGA","1")
    }
    else{
        VGA_value = 0;
        console.log("VGA","0")
    }

    var power_num = " ";
    $.ajax({
        url:"./PHP/power.php",
        method:"POST",
        data:{"CPU":CPU_value,
                "GPU":GPU_value,
                "OC":OC_value,
                "VGA":VGA_value},
        success:function(res){//回傳值為 string "power,price"
            VGA_warning = document.getElementsByClassName("Inte_VGA_text")[0]
            if(CPU_select.value == "none" || GPU_select.value == "none"){
                if(VGA_value == 0 || VGA_warning.innerHTML == "選擇的CPU沒有內顯，請改選其他項目"){
                    power_num = "???"
                    Power_change(0)
                }
                else{
                    power_num = res.split(",")[0]
                    Power_change(res.split(",")[1])
                }
            }
            else{
                power_num = res.split(",")[0]
                Power_change(res.split(",")[1])
            }
            power_tag = document.getElementById("power_id")
            power_tag.innerHTML = power_num + "瓦"
        },
        error:function(err){
            console.log("err",err)
        },
    });
    
}


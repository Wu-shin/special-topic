// position = [x1,x2,y1,y2]
var CPU_pos = [42,58,26,47]
var MB_pos = [8.5,93.8,5.6,94.2]
var Chipset_pos = [64,78,70,84]
var GPU_pos = [22.5,57,63,68]
var Memory_pos = [68,81.8,10,63]
var SSD_pos = [25,55,70,76]
var HDD_pos = [85,88,48,61]
var POWER_pos = [90,94.3,18,37.5]
var INFO_pos =[0,7,96,100]

$('#introduce_pic').mousemove(function(e){
        var elm = $(this);
        var xPos = e.pageX - elm.offset().left;
        var yPos = e.pageY - elm.offset().top;
        var xPercent = xPos/elm.width() * 100;
        var yPercent = yPos/elm.height() * 100;
        
        //CPU
        if(xPercent>CPU_pos[0]&&xPercent<CPU_pos[1]&&yPercent>CPU_pos[2]&&yPercent<CPU_pos[3]){
            document.getElementById("introduce_pic").style.cursor = "pointer";
            document.getElementById("introduce_pic").src = "./picture/introduce/introduce_CPU.jpg";
        } //Chipset
        else if(xPercent>Chipset_pos[0]&&xPercent<Chipset_pos[1]&&yPercent>Chipset_pos[2]&&yPercent<Chipset_pos[3]){
            document.getElementById("introduce_pic").style.cursor = "pointer";
            document.getElementById("introduce_pic").src = "./picture/introduce/introduce_Chipset.jpg";
        } //GPU
        else if(xPercent>GPU_pos[0]&&xPercent<GPU_pos[1]&&yPercent>GPU_pos[2]&&yPercent<GPU_pos[3]){
            document.getElementById("introduce_pic").style.cursor = "pointer";
            document.getElementById("introduce_pic").src = "./picture/introduce/introduce_GPU.jpg";
        } //Memory
        else if(xPercent>Memory_pos[0]&&xPercent<Memory_pos[1]&&yPercent>Memory_pos[2]&&yPercent<Memory_pos[3]){
            document.getElementById("introduce_pic").style.cursor = "pointer";
            document.getElementById("introduce_pic").src = "./picture/introduce/introduce_Memory.jpg";
        } //SSD
        else if(xPercent>SSD_pos[0]&&xPercent<SSD_pos[1]&&yPercent>SSD_pos[2]&&yPercent<SSD_pos[3]){
            document.getElementById("introduce_pic").style.cursor = "pointer";
            document.getElementById("introduce_pic").src = "./picture/introduce/introduce_SSD.jpg";
        } //HDD
        else if(xPercent>HDD_pos[0]&&xPercent<HDD_pos[1]&&yPercent>HDD_pos[2]&&yPercent<HDD_pos[3]){
            document.getElementById("introduce_pic").style.cursor = "pointer";
            document.getElementById("introduce_pic").src = "./picture/introduce/introduce_HDD.jpg";
        } //Power
        else if(xPercent>POWER_pos[0]&&xPercent<POWER_pos[1]&&yPercent>POWER_pos[2]&&yPercent<POWER_pos[3]){
            document.getElementById("introduce_pic").style.cursor = "pointer";
            document.getElementById("introduce_pic").src = "./picture/introduce/introduce_Power.jpg";
        } //INFO
        else if(xPercent>INFO_pos[0]&&xPercent<INFO_pos[1]&&yPercent>INFO_pos[2]&&yPercent<INFO_pos[3]){
            document.getElementById("introduce_pic").style.cursor = "pointer";
            document.getElementById("introduce_pic").src = "./picture/introduce/introduce_INFO.jpg";
        }//MotherBoard
        else if(xPercent>MB_pos[0]&&xPercent<MB_pos[1]&&yPercent>MB_pos[2]&&yPercent<MB_pos[3]){
            document.getElementById("introduce_pic").style.cursor = "pointer";
            document.getElementById("introduce_pic").src = "./picture/introduce/introduce_MB.jpg";
        }
        else{
            document.getElementById("introduce_pic").style.cursor = "default";
            document.getElementById("introduce_pic").src = "./picture/introduce/introduce.jpg";
        }
})//http://yltang.net/tutorial/javascript/6/

$('#introduce_pic').click(function (e) {
    var elm = $(this);
    var xPos = e.pageX - elm.offset().left;
    var yPos = e.pageY - elm.offset().top;
    var xPercent = xPos/elm.width() * 100;
    var yPercent = yPos/elm.height() * 100;
    //xPos,yPos 為滑鼠點擊時，在圖片上的座標
    // console.log(xPos, yPos);
    //xPercent,yPercent 為滑鼠點擊時，在圖片上的座標的百分比
    console.log(xPercent, yPercent);

    //CPU
    if(xPercent>CPU_pos[0]&&xPercent<CPU_pos[1]&&yPercent>CPU_pos[2]&&yPercent<CPU_pos[3]){
        var CPU_Modal = new bootstrap.Modal(document.getElementById('CPU'));
        CPU_Modal.toggle()
    } //Chipset
	else if(xPercent>Chipset_pos[0]&&xPercent<Chipset_pos[1]&&yPercent>Chipset_pos[2]&&yPercent<Chipset_pos[3]){
		var Motherboard_Modal = new bootstrap.Modal(document.getElementById('Chipset'));
        Motherboard_Modal.toggle()	
	} //GPU
	else if(xPercent>GPU_pos[0]&&xPercent<GPU_pos[1]&&yPercent>GPU_pos[2]&&yPercent<GPU_pos[3]){
		var GPU_Modal = new bootstrap.Modal(document.getElementById('GPU'));
        GPU_Modal.toggle()	
	} //memory
	else if(xPercent>Memory_pos[0]&&xPercent<Memory_pos[1]&&yPercent>Memory_pos[2]&&yPercent<Memory_pos[3]){
		var Momery_Modal = new bootstrap.Modal(document.getElementById('Momery'));
        Momery_Modal.toggle()	
	} //SSD
	else if(xPercent>SSD_pos[0]&&xPercent<SSD_pos[1]&&yPercent>SSD_pos[2]&&yPercent<SSD_pos[3]){
		var SSD_Modal = new bootstrap.Modal(document.getElementById('SSD'));
        SSD_Modal.toggle()	
	} //HDD
	else if(xPercent>HDD_pos[0]&&xPercent<HDD_pos[1]&&yPercent>HDD_pos[2]&&yPercent<HDD_pos[3]){
		var HDD_Modal = new bootstrap.Modal(document.getElementById('HDD'));
        HDD_Modal.toggle()	
	} //power
	else if(xPercent>POWER_pos[0]&&xPercent<POWER_pos[1]&&yPercent>POWER_pos[2]&&yPercent<POWER_pos[3]){
		var Power_Modal = new bootstrap.Modal(document.getElementById('Power'));
        Power_Modal.toggle()	
	} //INFO
    else if(xPercent>INFO_pos[0]&&xPercent<INFO_pos[1]&&yPercent>INFO_pos[2]&&yPercent<INFO_pos[3]){
        var info_Modal = new bootstrap.Modal(document.getElementById('info'));
        info_Modal.toggle()	
    }//MotherBoard
    else if(xPercent>MB_pos[0]&&xPercent<MB_pos[1]&&yPercent>MB_pos[2]&&yPercent<MB_pos[3]){
        var info_Modal = new bootstrap.Modal(document.getElementById('Motherboard'));
        info_Modal.toggle()	
    }
 });//https://tools.wingzero.tw/article/sn/102


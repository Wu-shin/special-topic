final_btn = document.getElementById('Disk-next-btn')
final_btn.addEventListener("click", show)
Final_table = document.getElementsByTagName("article")[0]

// 搜尋下拉選單的值
CPU_select = document.getElementById('cpu')
MB_select = document.getElementById('MB')
GPU_select = document.getElementById('gpu')
Memory_select = document.getElementById('Memory')
Disk_select = document.getElementById('Disk')
// 下拉選單監聽改變
CPU_select.addEventListener("change", table_change)
MB_select.addEventListener("change", table_change)
GPU_select.addEventListener("change", table_change)
Memory_select.addEventListener("change", table_change)
Disk_select.addEventListener("change", table_change)

function table_change(){
    Final_table.getElementsByTagName('td')[1].innerText = CPU_select.options[ CPU_select.selectedIndex ].text
    Final_table.getElementsByTagName('td')[3].innerText = MB_select.options[ MB_select.selectedIndex ].text
    Final_table.getElementsByTagName('td')[5].innerText = GPU_select.options[ GPU_select.selectedIndex ].text
    Final_table.getElementsByTagName('td')[7].innerText = Memory_select.options[ Memory_select.selectedIndex ].text
    Final_table.getElementsByTagName('td')[9].innerText = Disk_select.options[ Disk_select.selectedIndex ].text
}
function show(){
    Final_table.style.visibility = "visible"
}

PDF_btn = document.getElementById("PDF_btn")
PIC_btn = document.getElementById("PIC_btn")
Reset_btn = document.getElementById("reset_btn")
PDF_btn.addEventListener("click", PDF_generate)
PIC_btn.addEventListener("click", PIC_generate)
Reset_btn.addEventListener("click", Reset)

// function openPDF(pdfData) {
//     const blob = new Blob([pdfData], { type: 'application/pdf' });
//     const url = URL.createObjectURL(blob);
//     window.open(url, '_blank');
// }

function PDF_generate(){
    price = document.getElementById('total_price')
    form = document.getElementsByTagName('form')
    input = form[0].getElementsByTagName('input')

    input[0].value = Final_table.getElementsByTagName('td')[1].innerText
    input[1].value = Final_table.getElementsByTagName('td')[3].innerText
    input[2].value = Final_table.getElementsByTagName('td')[5].innerText
    input[3].value = Final_table.getElementsByTagName('td')[7].innerText
    input[4].value = Final_table.getElementsByTagName('td')[9].innerText
    input[5].value = Final_table.getElementsByTagName('td')[11].innerText
    input[6].value = price.innerHTML
    form[0].submit()
}

function PIC_generate(){
    canvas_div = document.getElementById("canvas_div")
    price = document.getElementById('total_price')
    var today = new Date();

    canvas_div.getElementsByTagName('p')[0].innerHTML = "列印日期：" + today.getFullYear() + "-" + (Number(today.getMonth())+Number(1)) + "-" + today.getDate() + " " + today.getHours() + ":" + today.getMinutes()
    canvas_div.getElementsByTagName('td')[7].innerText = Final_table.getElementsByTagName('td')[1].innerText
    canvas_div.getElementsByTagName('td')[9].innerText = Final_table.getElementsByTagName('td')[3].innerText
    canvas_div.getElementsByTagName('td')[11].innerText = Final_table.getElementsByTagName('td')[5].innerText
    canvas_div.getElementsByTagName('td')[13].innerText = Final_table.getElementsByTagName('td')[7].innerText
    canvas_div.getElementsByTagName('td')[15].innerText = Final_table.getElementsByTagName('td')[9].innerText
    canvas_div.getElementsByTagName('td')[17].innerText = Final_table.getElementsByTagName('td')[11].innerText
    canvas_div.getElementsByTagName('td')[19].innerText = price.innerHTML
    
    canvas_div.style.visibility = "visible";
    //生成圖片
    html2canvas($("#canvas_div")[0]).then(function(canvas) {
        var $div = $("#image_append");
        $div.empty();
        $("<img />", { src: canvas.toDataURL("image/png") }).appendTo($div);
    });
    canvas_div.style.visibility = "hidden";
}


Image = document.getElementById("image_append")
form_checkbox = $('input[type=checkbox]')

function Reset(){
    //final_table隱藏
    Final_table.style.visibility = "hidden"
    //下拉選單返回預設值
    CPU_select.value = "none"
    MB_select.value = "none"
    GPU_select.value = "none"
    Memory_select.value = "none"
    Disk_select.value = "none"
    Image.innerHTML = ""
    //超頻按鈕
    for(let i=0;i<form_checkbox.length;i++){
        form_checkbox[i].checked = false
    }
    //GPU允許選擇
    GPU_select.disabled = false
    gpu_checkbox.disabled = false
    //每個物品的價格
    CPU_price = 0
    MB_price = 0
    GPU_price = 0
    Memory_price = 0
    Disk_price = 0
    Power_price = 0
    total_change()
    //final_table更改
    table_change()
    //oc_warning
    document.getElementsByClassName("cpu_overclock_text")[0].style.visibility = "hidden"
    document.getElementsByClassName("MB_overclock_text")[0].style.visibility = "hidden"
    document.getElementsByClassName("gpu_overclock_text")[0].style.visibility = "hidden"
    document.getElementsByClassName("Memory_overclock_text")[0].style.visibility = "hidden"
    document.getElementsByClassName("Inte_VGA_text")[0].style.visibility = "hidden"
    //左側table
    document.getElementById("MB_table").style.visibility = "hidden"
    document.getElementById("Memory_table").style.visibility = "hidden"
    document.getElementById("MB_pic").style.visibility = "hidden"
    document.getElementById("Memory_pic").style.visibility = "hidden"
    document.getElementById("MB_pic")["src"] = ""
    document.getElementById("Memory_pic")["src"]= ""
    //滑到最上面
    $('html, body').animate({scrollTop:0},1500);
}

//後端位置
OC_action_url = "./PHP/OC.php"

cpu_checkbox = document.getElementById('overclock-cpu')
gpu_checkbox = document.getElementById('overclock-gpu')
MB_checkbox = document.getElementById('overclock-MB')
Memory_checkbox = document.getElementById('overclock-Memory')
Inte_VGA_checkbox = document.getElementById('Inte_VGA')


cpu_checkbox.addEventListener("click", cpu_overclock_change)
gpu_checkbox.addEventListener("click", gpu_overclock_change)
MB_checkbox.addEventListener("click", MB_overclock_change)
Memory_checkbox.addEventListener("click", Memory_overclock_change)
Inte_VGA_checkbox.addEventListener("click", Inte_VGA_change)

CPU_select = document.getElementById('cpu')
CPU_select.addEventListener("change", cpu_overclock_change)
CPU_select.addEventListener("change", Inte_VGA_change)
GPU_select = document.getElementById('gpu')
GPU_select.addEventListener("change", gpu_overclock_change)
MB_select = document.getElementById('MB')
MB_select.addEventListener("change", MB_overclock_change)
Memory_select = document.getElementById('Memory')
Memory_select.addEventListener("change", Memory_overclock_change)


function cpu_overclock_change(){
    power_check()
    if (cpu_checkbox.checked){
        CPU_warning = document.getElementsByClassName("cpu_overclock_text")[0]
        CPU_warning.style.visibility = "visible"

        // 搜尋下拉選單的值
        CPU_select = document.getElementById('cpu')
        $.ajax({
            url:OC_action_url,
            method:"POST",
            data:{"CPU":CPU_select.value},
            success:function(res){//回傳值為 0/1/FALSE
                console.log(res)
                if(res == 1){
                    //可使用超頻
                    CPU_warning.innerHTML = "超頻有一定風險，請小心使用"
                    console.log("111")
                }
                else{
                    //不可使用超頻
                    CPU_warning.innerHTML = "該商品不允許超頻，請小心使用"
                }
            },
            error:function(err){
                console.log("err",err)
            },
        });
    }
    else{
        CPU_warning = document.getElementsByClassName("cpu_overclock_text")[0]
        CPU_warning.style.visibility = "hidden"
    }
}

function gpu_overclock_change(){
    power_check()
    if (gpu_checkbox.checked){
        GPU_warning = document.getElementsByClassName("gpu_overclock_text")[0]
        GPU_warning.style.visibility = "visible"

        // 搜尋下拉選單的值
        GPU_select = document.getElementById('gpu')
        $.ajax({
            url:OC_action_url,
            method:"POST",
            data:{"GPU":GPU_select.value},
            success:function(res){//回傳值為 0/1/FALSE
                if(res == 1){
                    //可使用超頻
                    GPU_warning.innerHTML = "超頻有一定風險，請小心使用"
                }
                else{
                    //不可使用超頻
                    GPU_warning.innerHTML = "該商品不允許超頻，請小心使用"
                }
            },
            error:function(err){
                console.log("err",err)
            },
        });
    }
    else{
        GPU_warning = document.getElementsByClassName("gpu_overclock_text")[0]
        GPU_warning.style.visibility = "hidden"
    }
}

function MB_overclock_change(){
    power_check()
    if (MB_checkbox.checked){
        MB_warning = document.getElementsByClassName("MB_overclock_text")[0]
        MB_warning.style.visibility = "visible"

        // 搜尋下拉選單的值
        MB_select = document.getElementById('MB')
        $.ajax({
            url:OC_action_url,
            method:"POST",
            data:{"MB":MB_select.value},
            success:function(res){//回傳值為 0/1/FALSE
                if(res == 1){
                    //可使用超頻
                    MB_warning.innerHTML = "超頻有一定風險，請小心使用"
                }
                else{
                    //不可使用超頻
                    MB_warning.innerHTML = "該商品不允許超頻，請小心使用"
                }
            },
            error:function(err){
                console.log("err",err)
            },
        });
    }
    else{
        MB_warning = document.getElementsByClassName("MB_overclock_text")[0]
        MB_warning.style.visibility = "hidden"
    }
}

function Memory_overclock_change(){
    power_check()
    if (Memory_checkbox.checked){
        Memory_warning = document.getElementsByClassName("Memory_overclock_text")[0]
        Memory_warning.style.visibility = "visible"

        // 搜尋下拉選單的值
        Memory_select = document.getElementById('Memory')
        $.ajax({
            url:OC_action_url,
            method:"POST",
            data:{"Memory":Memory_select.value},
            success:function(res){//回傳值為 0/1/FALSE
                if(res == 1){
                    //可使用超頻
                    Memory_warning.innerHTML = "超頻有一定風險，請小心使用"
                }
                else{
                    //不可使用超頻
                    Memory_warning.innerHTML = "該商品不允許超頻，請小心使用"
                }
            },
            error:function(err){
                console.log("err",err)
            },
        });
    }
    else{
        Memory_warning = document.getElementsByClassName("Memory_overclock_text")[0]
        Memory_warning.style.visibility = "hidden"
    }
}
function Inte_VGA_change(){
    power_check()
    if (Inte_VGA_checkbox.checked){
        GPU_select.disabled = true
        gpu_checkbox.disabled = true
        VGA_warning = document.getElementsByClassName("Inte_VGA_text")[0]
        VGA_warning.style.visibility = "visible"

        GPU_select.value = "none"
        GPU_change()

        // 搜尋下拉選單的值
        CPU_select = document.getElementById('cpu')
        $.ajax({
            url:OC_action_url,
            method:"POST",
            data:{"CPU_VGA":CPU_select.value},
            success:function(res){//回傳值為 0/1/FALSE
                if(res == 1){
                    //可使用內顯
                    VGA_warning.innerHTML = "選擇的CPU有內顯，可以使用"
                    Final_table.getElementsByTagName('td')[5].innerText = "使用內顯"
                }
                else{
                    //不可使用超頻
                    VGA_warning.innerHTML = "選擇的CPU沒有內顯，請改選其他項目"
                    Final_table.getElementsByTagName('td')[5].innerText = warning.innerHTML
                    
                }
            },
            error:function(err){
                console.log("err",err)
            },
        });
    }
    else{
        GPU_select.disabled = false
        gpu_checkbox.disabled = false
        VGA_warning = document.getElementsByClassName("Inte_VGA_text")[0]
        VGA_warning.style.visibility = "hidden"
        Final_table.getElementsByTagName('td')[5].innerText = GPU_select.options[ GPU_select.selectedIndex ].text
    }
}

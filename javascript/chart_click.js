cpu_click = document.getElementsByClassName("cpu_click")
for(let i=0;i<cpu_click.length;i++){
    cpu_click[i].addEventListener("click", chart_cpu_click)
}

function chart_cpu_click(e){
    let id_value = e.target.attributes.id.value
    
    cpu = document.getElementById("cpu")
    cpu.value = id_value
    
    if(cpu.value != id_value){
        cpu.value = "none"
        alert("已停售")
    }
    CPU_change()
    table_change()
}

gpu_click = document.getElementsByClassName("gpu_click")
for(let i=0;i<gpu_click.length;i++){
    gpu_click[i].addEventListener("click", chart_gpu_click)
}

function chart_gpu_click(e){
    if(! GPU_select.disabled){
        let id_value = e.target.attributes.id.value
    
        gpu = document.getElementById("gpu")
        gpu.value = id_value
        
        if(gpu.value != id_value){
            gpu.value = "none"
            alert("已停售")
        }
        GPU_change()
        table_change()
    }
}

disk_click = document.getElementsByClassName("disk_click")
for(let i=0;i<disk_click.length;i++){
    disk_click[i].addEventListener("click", chart_disk_click)
}

function chart_disk_click(e){
    let id_value = e.target.parentElement.id

    disk = document.getElementById("Disk")
    disk.value = id_value
    
    if(disk.value != id_value){
        disk.value = "none"
        alert("已停售")
    }
    Disk_change()
    table_change()
}

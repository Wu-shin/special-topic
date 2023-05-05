//Options Selection
var Document_radio = document.getElementById("Document");
Document_radio.addEventListener("click" , function(){
	$.ajax({
		method:"POST",
		url:"Analyzation_AJAX.php",
		data:{"TargetSoftwareType":"Document"},
		success:function(data){
			document.getElementById("SoftwareListArea").innerHTML="";
			for(let i=0;i<data.length;i++){
				window.console.log(data[i]);
			}
			for(let i=0;i<data.length;i++){
				var SoftwareList = document.getElementById("SoftwareListArea");
				var SoftwareList_Content = `<div><label><input type="checkbox" class="SelectiveSoftware" name=`+data[i]["Software_Name"]+`>`+data[i]["Software_Name"]+`</label></div>`
				var Software_Row = document.createElement('div');
				Software_Row.innerHTML = SoftwareList_Content;
				SoftwareList.append(Software_Row);
				var Software_Confirm_CheckBox = document.getElementsByClassName("SelectiveSoftware");
				for(let i=0;i<Software_Confirm_CheckBox.length;i++){
					Software_Confirm_CheckBox[i].addEventListener("click",GenerateResult);
				}
			}
		},
		error:function(data){
			alert(typeof data);
			window.console.log(data);
		}
	});
})
var Entertainment_radio = document.getElementById("Entertainment");
Entertainment_radio.addEventListener("click" , function(){
	$.ajax({
		method:"POST",
		url:"Analyzation_AJAX.php",
		data:{"TargetSoftwareType":"Entertainment"},
		success:function(data){
			document.getElementById("SoftwareListArea").innerHTML="";
			for(let i=0;i<data.length;i++){
				window.console.log(data[i]);
			}
			for(let i=0;i<data.length;i++){
				var SoftwareList = document.getElementById("SoftwareListArea");
				var SoftwareList_Content = `<div><label><input type="checkbox" class="SelectiveSoftware" name=`+data[i]["Software_Name"]+`>`+data[i]["Software_Name"]+`</label></div>`
				var Software_Row = document.createElement('div');
				Software_Row.innerHTML = SoftwareList_Content;
				SoftwareList.append(Software_Row);
				var Software_Confirm_CheckBox = document.getElementsByClassName("SelectiveSoftware");
				for(let i=0;i<Software_Confirm_CheckBox.length;i++){
					Software_Confirm_CheckBox[i].addEventListener("click",GenerateResult);
				}
			}
		},
		error:function(data){
			alert(typeof data);
			window.console.log(data);
		}
	});
})
var Math_radio = document.getElementById("Math");
Math_radio.addEventListener("click" , function(){
	$.ajax({
		method:"POST",
		url:"Analyzation_AJAX.php",
		data:{"TargetSoftwareType":"Math"},
		success:function(data){
			document.getElementById("SoftwareListArea").innerHTML="";
			for(let i=0;i<data.length;i++){
				window.console.log(data[i]);
			}
			for(let i=0;i<data.length;i++){
				var SoftwareList = document.getElementById("SoftwareListArea");
				var SoftwareList_Content = `<div><label><input type="checkbox" class="SelectiveSoftware" name=`+data[i]["Software_Name"]+`>`+data[i]["Software_Name"]+`</label></div>`
				var Software_Row = document.createElement('div');
				Software_Row.innerHTML = SoftwareList_Content;
				SoftwareList.append(Software_Row);
				var Software_Confirm_CheckBox = document.getElementsByClassName("SelectiveSoftware");
				for(let i=0;i<Software_Confirm_CheckBox.length;i++){
					Software_Confirm_CheckBox[i].addEventListener("click",GenerateResult);
				}
			}
		},
		error:function(data){
			alert(typeof data);
			window.console.log(data);
		}
	});
})
var VideoEdit_radio = document.getElementById("VideoEdit");
VideoEdit_radio.addEventListener("click" , function(){
	$.ajax({
		method:"POST",
		url:"Analyzation_AJAX.php",
		data:{"TargetSoftwareType":"VideoEdit"},
		success:function(data){
			document.getElementById("SoftwareListArea").innerHTML="";
			for(let i=0;i<data.length;i++){
				window.console.log(data[i]);
			}
			for(let i=0;i<data.length;i++){
				var SoftwareList = document.getElementById("SoftwareListArea");
				var SoftwareList_Content = `<div><label><input type="checkbox" class="SelectiveSoftware" name=`+data[i]["Software_Name"]+`>`+data[i]["Software_Name"]+`</label></div>`
				var Software_Row = document.createElement('div');
				Software_Row.innerHTML = SoftwareList_Content;
				SoftwareList.append(Software_Row);
				var Software_Confirm_CheckBox = document.getElementsByClassName("SelectiveSoftware");
				for(let i=0;i<Software_Confirm_CheckBox.length;i++){
					Software_Confirm_CheckBox[i].addEventListener("click",GenerateResult);
				}
			}
		},
		error:function(data){
			alert(typeof data);
			window.console.log(data);
		}
	});
})
var Animation_radio = document.getElementById("Animation");
Animation_radio.addEventListener("click" , function(){
	$.ajax({
		method:"POST",
		url:"Analyzation_AJAX.php",
		data:{"TargetSoftwareType":"Animation"},
		success:function(data){
			document.getElementById("SoftwareListArea").innerHTML="";
			for(let i=0;i<data.length;i++){
				window.console.log(data[i]);
			}
			for(let i=0;i<data.length;i++){
				var SoftwareList = document.getElementById("SoftwareListArea");
				var SoftwareList_Content = `<div><label><input type="checkbox" class="SelectiveSoftware" name=`+data[i]["Software_Name"]+`>`+data[i]["Software_Name"]+`</label></div>`
				var Software_Row = document.createElement('div');
				Software_Row.innerHTML = SoftwareList_Content;
				SoftwareList.append(Software_Row);
				var Software_Confirm_CheckBox = document.getElementsByClassName("SelectiveSoftware");
				for(let i=0;i<Software_Confirm_CheckBox.length;i++){
					Software_Confirm_CheckBox[i].addEventListener("click",GenerateResult);
				}
			}
		},
		error:function(data){
			alert(typeof data);
			window.console.log(data);
		}
	});
})
var Note_radio = document.getElementById("Note");
Note_radio.addEventListener("click" , function(){
	$.ajax({
		method:"POST",
		url:"Analyzation_AJAX.php",
		data:{"TargetSoftwareType":"Note"},
		success:function(data){
			document.getElementById("SoftwareListArea").innerHTML="";
			for(let i=0;i<data.length;i++){
				window.console.log(data[i]);
			}
			for(let i=0;i<data.length;i++){
				var SoftwareList = document.getElementById("SoftwareListArea");
				var SoftwareList_Content = `<div><label><input type="checkbox" class="SelectiveSoftware" name=`+data[i]["Software_Name"]+`>`+data[i]["Software_Name"]+`</label></div>`
				var Software_Row = document.createElement('div');
				Software_Row.innerHTML = SoftwareList_Content;
				SoftwareList.append(Software_Row);
				var Software_Confirm_CheckBox = document.getElementsByClassName("SelectiveSoftware");
				for(let i=0;i<Software_Confirm_CheckBox.length;i++){
					Software_Confirm_CheckBox[i].addEventListener("click",GenerateResult);
				}
			}
		},
		error:function(data){
			alert(typeof data);
			window.console.log(data);
		}
	});
})
var EngineerDraw_radio = document.getElementById("EngineerDraw");
EngineerDraw_radio.addEventListener("click" , function(){
	$.ajax({
		method:"POST",
		url:"Analyzation_AJAX.php",
		data:{"TargetSoftwareType":"EngineerDraw"},
		success:function(data){
			document.getElementById("SoftwareListArea").innerHTML="";
			for(let i=0;i<data.length;i++){
				window.console.log(data[i]);
			}
			for(let i=0;i<data.length;i++){
				var SoftwareList = document.getElementById("SoftwareListArea");
				var SoftwareList_Content = `<div><label><input type="checkbox" class="SelectiveSoftware" name=`+data[i]["Software_Name"]+`>`+data[i]["Software_Name"]+`</label></div>`
				var Software_Row = document.createElement('div');
				Software_Row.innerHTML = SoftwareList_Content;
				SoftwareList.append(Software_Row);
				var Software_Confirm_CheckBox = document.getElementsByClassName("SelectiveSoftware");
				for(let i=0;i<Software_Confirm_CheckBox.length;i++){
					Software_Confirm_CheckBox[i].addEventListener("click",GenerateResult);
				}
			}
		},
		error:function(data){
			alert(typeof data);
			window.console.log(data);
		}
	});
})
var ArtDraw_radio = document.getElementById("ArtDraw");
ArtDraw_radio.addEventListener("click" , function(){
	$.ajax({
		method:"POST",
		url:"Analyzation_AJAX.php",
		data:{"TargetSoftwareType":"ArtDraw"},
		success:function(data){
			document.getElementById("SoftwareListArea").innerHTML="";
			for(let i=0;i<data.length;i++){
				window.console.log(data[i]);
			}
			for(let i=0;i<data.length;i++){
				var SoftwareList = document.getElementById("SoftwareListArea");
				var SoftwareList_Content = `<div><label><input type="checkbox" class="SelectiveSoftware" name=`+data[i]["Software_Name"]+`>`+data[i]["Software_Name"]+`</label></div>`
				var Software_Row = document.createElement('div');
				Software_Row.innerHTML = SoftwareList_Content;
				SoftwareList.append(Software_Row);
				var Software_Confirm_CheckBox = document.getElementsByClassName("SelectiveSoftware");
				for(let i=0;i<Software_Confirm_CheckBox.length;i++){
					Software_Confirm_CheckBox[i].addEventListener("click",GenerateResult);
				}
			}
		},
		error:function(data){
			alert(typeof data);
			window.console.log(data);
		}
	});
})
var DataAnalysis_radio = document.getElementById("DataAnalysis");
DataAnalysis_radio.addEventListener("click" , function(){
	$.ajax({
		method:"POST",
		url:"Analyzation_AJAX.php",
		data:{"TargetSoftwareType":"DataAnalysis"},
		success:function(data){
			document.getElementById("SoftwareListArea").innerHTML="";
			for(let i=0;i<data.length;i++){
				window.console.log(data[i]);
			}
			for(let i=0;i<data.length;i++){
				var SoftwareList = document.getElementById("SoftwareListArea");
				var SoftwareList_Content = `<div><label><input type="checkbox" class="SelectiveSoftware" name=`+data[i]["Software_Name"]+`>`+data[i]["Software_Name"]+`</label></div>`
				var Software_Row = document.createElement('div');
				Software_Row.innerHTML = SoftwareList_Content;
				SoftwareList.append(Software_Row);
				var Software_Confirm_CheckBox = document.getElementsByClassName("SelectiveSoftware");
				for(let i=0;i<Software_Confirm_CheckBox.length;i++){
					Software_Confirm_CheckBox[i].addEventListener("click",GenerateResult);
				}
			}
		},
		error:function(data){
			alert(typeof data);
			window.console.log(data);
		}
	});
})
var DatabaseManage_radio = document.getElementById("DatabaseManage");
DatabaseManage_radio.addEventListener("click" , function(){
	$.ajax({
		method:"POST",
		url:"Analyzation_AJAX.php",
		data:{"TargetSoftwareType":"DatabaseManage"},
		success:function(data){
			document.getElementById("SoftwareListArea").innerHTML="";
			for(let i=0;i<data.length;i++){
				window.console.log(data[i]);
			}
			for(let i=0;i<data.length;i++){
				var SoftwareList = document.getElementById("SoftwareListArea");
				var SoftwareList_Content = `<div><label><input type="checkbox" class="SelectiveSoftware" name=`+data[i]["Software_Name"]+`>`+data[i]["Software_Name"]+`</label></div>`
				var Software_Row = document.createElement('div');
				Software_Row.innerHTML = SoftwareList_Content;
				SoftwareList.append(Software_Row);
				var Software_Confirm_CheckBox = document.getElementsByClassName("SelectiveSoftware");
				for(let i=0;i<Software_Confirm_CheckBox.length;i++){
					Software_Confirm_CheckBox[i].addEventListener("click",GenerateResult);
				}
			}
		},
		error:function(data){
			alert(typeof data);
			window.console.log(data);
		}
	});
})
var OnlineMessage_radio = document.getElementById("OnlineMessage");
OnlineMessage_radio.addEventListener("click" , function(){
	$.ajax({
		method:"POST",
		url:"Analyzation_AJAX.php",
		data:{"TargetSoftwareType":"OnlineMessage"},
		success:function(data){
			document.getElementById("SoftwareListArea").innerHTML="";
			for(let i=0;i<data.length;i++){
				window.console.log(data[i]);
			}
			for(let i=0;i<data.length;i++){
				var SoftwareList = document.getElementById("SoftwareListArea");
				var SoftwareList_Content = `<div><label><input type="checkbox" class="SelectiveSoftware" name=`+data[i]["Software_Name"]+`>`+data[i]["Software_Name"]+`</label></div>`
				var Software_Row = document.createElement('div');
				Software_Row.innerHTML = SoftwareList_Content;
				SoftwareList.append(Software_Row);
				var Software_Confirm_CheckBox = document.getElementsByClassName("SelectiveSoftware");
				for(let i=0;i<Software_Confirm_CheckBox.length;i++){
					Software_Confirm_CheckBox[i].addEventListener("click",GenerateResult);
				}
			}
		},
		error:function(data){
			alert(typeof data);
			window.console.log(data);
		}
	});
})
var Surfing_radio = document.getElementById("Surfing");
Surfing_radio.addEventListener("click" , function(){
	$.ajax({
		method:"POST",
		url:"Analyzation_AJAX.php",
		data:{"TargetSoftwareType":"Surfing"},
		success:function(data){
			document.getElementById("SoftwareListArea").innerHTML="";
			for(let i=0;i<data.length;i++){
				window.console.log(data[i]);
			}
			for(let i=0;i<data.length;i++){
				var SoftwareList = document.getElementById("SoftwareListArea");
				var SoftwareList_Content = `<div><label><input type="checkbox" class="SelectiveSoftware" name=`+data[i]["Software_Name"]+`>`+data[i]["Software_Name"]+`</label></div>`
				var Software_Row = document.createElement('div');
				Software_Row.innerHTML = SoftwareList_Content;
				SoftwareList.append(Software_Row);
				var Software_Confirm_CheckBox = document.getElementsByClassName("SelectiveSoftware");
				for(let i=0;i<Software_Confirm_CheckBox.length;i++){
					Software_Confirm_CheckBox[i].addEventListener("click",GenerateResult);
				}
			}
		},
		error:function(data){
			alert(typeof data);
			window.console.log(data);
		}
	});
})
var Mail_radio = document.getElementById("Mail");
Mail_radio.addEventListener("click" , function(){
	$.ajax({
		method:"POST",
		url:"Analyzation_AJAX.php",
		data:{"TargetSoftwareType":"Mail"},
		success:function(data){
			document.getElementById("SoftwareListArea").innerHTML="";
			for(let i=0;i<data.length;i++){
				window.console.log(data[i]);
			}
			for(let i=0;i<data.length;i++){
				var SoftwareList = document.getElementById("SoftwareListArea");
				var SoftwareList_Content = `<div><label><input type="checkbox" class="SelectiveSoftware" name=`+data[i]["Software_Name"]+`>`+data[i]["Software_Name"]+`</label></div>`
				var Software_Row = document.createElement('div');
				Software_Row.innerHTML = SoftwareList_Content;
				SoftwareList.append(Software_Row);
				var Software_Confirm_CheckBox = document.getElementsByClassName("SelectiveSoftware");
				for(let i=0;i<Software_Confirm_CheckBox.length;i++){
					Software_Confirm_CheckBox[i].addEventListener("click",GenerateResult);
				}
			}
		},
		error:function(data){
			alert(typeof data);
			window.console.log(data);
		}
	});
})

function GenerateResult(e){
	
}

// 防呆設計
$("#min_budget").on("keyup change focusin focusout", function (e) {
        num = $(this).val()
        var input = document.getElementById("min_budget");
        if(num[0] == 0 && num[1] == 0){//預防00開頭
            input.value = Number(num)  
        }
        if(num[0] == 0 && num[1] != 0){//預防0*開頭
            input.value = Number(num)
        }
});

$("#max_budget").on("keyup change focusin focusout", function (e) {
        num = $(this).val()
        var input = document.getElementById("max_budget");
        if(num[0] == 0 && num[1] == 0){//預防00開頭
            input.value = Number(num)  
        }
        if(num[0] == 0 && num[1] != 0){//預防0*開頭
            input.value = Number(num)
        }
    });

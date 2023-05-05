function ClearValue(target){
	if (target.value==0){
		target.value="";
	}
}
function ReleaseValue(target){
	if (target.value==false||target.value<0){
		target.value=0;
	}
}
function Button_EventListener(){
	var Software_Window = document.getElementsByClassName("Review");
	for (var i=0;i<Software_Window.length;i++){
		Software_Window[i].addEventListener("click",ReviewButton);
	}
	var Delete_Button = document.getElementsByClassName("Delete_Purpose");
	for (var i=0;i<Delete_Button.length;i++){
		Delete_Button[i].addEventListener("click",Delete_PurposeFunction);
	}
	//Options Selection
	var Software_Type_Selection = document.getElementsByClassName("Purpose");
	for(var i=0;i<Software_Type_Selection.length;i++){
		Software_Type_Selection[i].addEventListener("change",TypeFunction);
	}
}
function Software_Purpose_Function(){
	var SoftwareTableRow = document.createElement('div');
	SoftwareTableRow.classList.add("Software_Purpose");
	var Software_Purpose_List = document.getElementsByClassName("Software_New_Purpose")[0];
	var Software_Purpose_List_Content = `
		<!--目的-->
		<div>
		<input class="Delete_Purpose" type="image" src="./picture/remove.png" width="15" height="15" style:"display:flex justify-content:center">
		<span class="Purpose_RWD_SPAN">目的：</span>
		<span class="Purpose_SPAN">請選擇目的：</span>
			<select class="Purpose" readonly>
			<option name="class" id="Default_Nothing" value="Default_Nothing" selected>請選擇類型</option>`;
			if(!SearchSoftwareTypeArray.includes(1)){
				Software_Purpose_List_Content = Software_Purpose_List_Content+`<option name="class" id="Mail" value="Mail">郵件收送</option>`;
			}
			if(!SearchSoftwareTypeArray.includes(2)){
				Software_Purpose_List_Content = Software_Purpose_List_Content+`<option name="class" id="OnlineMessage" value="OnlineMessage">即時通訊</option>`;
			}
			if(!SearchSoftwareTypeArray.includes(3)){
				Software_Purpose_List_Content = Software_Purpose_List_Content+`<option name="class" id="Surfing" value="Surfing">網頁瀏覽</option>`;
			}
			if(!SearchSoftwareTypeArray.includes(4)){
				Software_Purpose_List_Content = Software_Purpose_List_Content+`<option name="class" id="Note" value="Note">筆記書寫</option>`;
			}
			if(!SearchSoftwareTypeArray.includes(5)){
				Software_Purpose_List_Content = Software_Purpose_List_Content+`<option name="class" id="Document" value="Document">文書處理</option>`;
			}
			if(!SearchSoftwareTypeArray.includes(6)){
				Software_Purpose_List_Content = Software_Purpose_List_Content+`<option name="class" id="Coding" value="Coding">程式編譯</option>`;
			}
			if(!SearchSoftwareTypeArray.includes(7)){
				Software_Purpose_List_Content = Software_Purpose_List_Content+`<option name="class" id="Math" value="Math">數學製圖與符號</option>`;
			}
			if(!SearchSoftwareTypeArray.includes(8)){
				Software_Purpose_List_Content = Software_Purpose_List_Content+`<option name="class" id="DatabaseManage" value="DatabaseManage">資料庫管理</option>`;
			}
			if(!SearchSoftwareTypeArray.includes(9)){
				Software_Purpose_List_Content = Software_Purpose_List_Content+`<option name="class" id="DataAnalysis" value="DataAnalysis">數據分析統計</option>`;
			}
			if(!SearchSoftwareTypeArray.includes(10)){
				Software_Purpose_List_Content = Software_Purpose_List_Content+`<option name="class" id="EngineerDraw" value="EngineerDraw">工程製圖</option>`;
			}
			if(!SearchSoftwareTypeArray.includes(11)){
				Software_Purpose_List_Content = Software_Purpose_List_Content+`<option name="class" id="AI_Model" value="AI_Model">模型訓練(AI)</option>`;
			}
			if(!SearchSoftwareTypeArray.includes(12)){
				Software_Purpose_List_Content = Software_Purpose_List_Content+`<option name="class" id="ArtDraw" value="ArtDraw">美術繪圖製作</option>`;
			}
			if(!SearchSoftwareTypeArray.includes(13)){
				Software_Purpose_List_Content = Software_Purpose_List_Content+`<option name="class" id="Animation" value="Animation">動畫特效製作</option>`;
			}
			if(!SearchSoftwareTypeArray.includes(14)){
				Software_Purpose_List_Content = Software_Purpose_List_Content+`<option name="class" id="VideoEdit" value="VideoEdit">影片剪輯</option>`;
			}
			if(!SearchSoftwareTypeArray.includes(15)){
				Software_Purpose_List_Content = Software_Purpose_List_Content+`<option name="class" id="Entertainment" value="Entertainment">遊戲娛樂</option>`;
			}
		Software_Purpose_List_Content = Software_Purpose_List_Content+`</select>
		<button class="Review">檢視</button>	
		</div>
		<br>
		<div class="Software_New_Purpose"></div>`;
	SoftwareTableRow.innerHTML = Software_Purpose_List_Content;
	Software_Purpose_List.append(SoftwareTableRow);
	Button_EventListener();
}
function MaxValue(myarr){
    var al = myarr.length;
    maximum = myarr[al-1];
    while (al--){
        if(myarr[al] > maximum){
            maximum = myarr[al]
        }
    }
    return maximum;
};
function TypeAndValueMap(Type){
	if(Type=="Document"){
		return 5;
	}
	else if (Type=="Entertainment"){
		return 15;
	}
	else if (Type=="Math"){
		return 7;
	}
	else if (Type=="VideoEdit"){
		return 14;
	}
	else if (Type=="Animation"){
		return 13;
	}
	else if (Type=="Note"){
		return 4;
	}
	else if (Type=="EngineerDraw"){
		return 10;
	}
	else if (Type=="ArtDraw"){
		return 12;
	}
	else if (Type=="DataAnalysis"){
		return 9;
	}
	else if (Type=="DatabaseManage"){
		return 8;
	}
	else if (Type=="OnlineMessage"){
		return 2;
	}
	else if (Type=="Surfing"){
		return 3;
	}
	else if (Type=="Mail"){
		return 1;
	}
	else if (Type=="Coding"){
		return 6;
	}
	else if (Type=="AI_Model"){
		return 11;
	}
}
function Delete_PurposeFunction(e){
	//Get Delete Target
	var Delete_Button = e.target.parentElement.parentElement;
	var DeleteTarget = Delete_Button.getElementsByClassName("Purpose")[0].value;
	console.log(DeleteTarget);

	//Delete From Software Type Array
	if(SearchSoftwareTypeArray.includes(TypeAndValueMap(DeleteTarget))){
		console.log("Delete Successfully");
		SearchSoftwareTypeArray.splice(SearchSoftwareTypeArray.indexOf(TypeAndValueMap(DeleteTarget)),1);
		console.log(SearchSoftwareTypeArray);
	}

	//Delete From Software Array
	$.ajax({
		method:"POST",
		url:"./PHP/Analyzation_AJAX.php",
		data:{"TargetSoftwareType":DeleteTarget},
		success:function(data){
			for(let i=0;i<data.length;i++){
				if(TargetList.includes(data[i]["Software_Name"])){//陣列存在
					TargetList.splice(TargetList.indexOf(data[i]["Software_Name"]),1);
				}
				else{//陣列裡面不存在
					
				}
			}
		},
		error:function(data){
			alert(typeof data);
			window.console.log(data);
		}
	});
	//Remove From Page
	Delete_Button.parentNode.removeChild(Delete_Button);
}
function PushSoftwareTypeArray(TypeValue){
	//console.log("PushSoftwareTypeArray");
	//console.log(value);
	if(SearchSoftwareTypeArray.includes(TypeValue)){//如果存在就不處理
		console.log("Including Value");
    }
    else{//不存在就把他加入陣列
		console.log("Not Including");
        SearchSoftwareTypeArray.push(TypeValue);
    }
}
function ReviewButton(e){
	var button = e.target;
	var switchValue = button.parentElement.getElementsByClassName("Purpose")[0].value;
	console.log(switchValue);
	switch (switchValue){
		case "Document":
			DocumentFunction();
			break;
		case "Entertainment":
			EntertainmentFunction();
			break;
        case "Math":
            MathFunction();
            break;
        case "VideoEdit":
            VideoEditFunction();
            break;
        case "Animation":
            AnimationFunction();
            break;
        case "Note":
            NoteFunction();
            break;
        case "EngineerDraw":
            EngineerDrawFunction();
            break;
        case "ArtDraw":
            ArtDrawFunction();
            break;
        case "DataAnalysis":
            DataAnalysisFunction();
            break;
        case "DatabaseManage":
            DatabaseManageFunction();
            break;
        case "OnlineMessage":
            OnlineMessageFunction();
            break;
        case "Surfing":
            SurfingFunction();
            break;
        case "Mail":
            MailFunction();
            break;
        case "Coding":
            CodingFunction();
            break;
		case "AI_Model":
			AI_ModelFunction();
			break;
		default:
			return;
	}
	Software_Window_Change();
}//Press View Button Open
function ValueTextMap(EnglishValue){
	if(EnglishValue=="Document"){
		return "文書處理";
	}
	else if(EnglishValue=="Note"){
		return "筆記書寫";
	}
	else if(EnglishValue=="OnlineMessage"){
		return "即時通訊";
	}
	else if(EnglishValue=="Surfing"){
		return "網頁瀏覽";
	}
	else if(EnglishValue=="Mail"){
		return "郵件收送";
	}
	else if(EnglishValue=="Coding"){
		return "程式編譯";
	}
	else if(EnglishValue=="AI_Model"){
		return "模型訓練(AI)";
	}
	else if(EnglishValue=="DatabaseManage"){
		return "資料庫管理";
	}
	else if(EnglishValue=="Math"){
		return "數學製圖與符號";
	}
	else if(EnglishValue=="DataAnalysis"){
		return "數據分析統計";
	}	
	else if(EnglishValue=="Entertainment"){
		return "遊戲娛樂";
	}	
	else if(EnglishValue=="VideoEdit"){
		return "影片剪輯";
	}
	else if(EnglishValue=="Animation"){
		return "動畫特效製作";
	}
	else if(EnglishValue=="EngineerDraw"){
		return "工程製圖";
	}
	else if(EnglishValue=="ArtDraw"){
		return "美術繪圖製作";
	}
}
//Show the Software Type List
function TypeFunction(e){
	var button = e.target;
	var switchValue = button.parentElement.parentElement.getElementsByClassName("Purpose")[0].value;
	if(switchValue!="Default_Nothing" && !SearchSoftwareTypeArray.includes(TypeAndValueMap(switchValue))){
		console.log(SearchSoftwareTypeArray);
		button.style="display:none";
		var Title = button.parentElement.parentElement.getElementsByClassName("Purpose_SPAN")[0];
		var Title_RWD = button.parentElement.parentElement.getElementsByClassName("Purpose_RWD_SPAN")[0];
		Title.innerText="請選擇目的："+ValueTextMap(switchValue)+"  ";
		Title.style="width: 230px";
		Title_RWD.innerText="目的："+ValueTextMap(switchValue)+"  ";
		Title_RWD.style="width:45%";
		Software_Window_Change();
		switch (switchValue){
			case "Document":
				DocumentFunction();
				break;
			case "Entertainment":
				EntertainmentFunction();
				break;
			case "Math":
				MathFunction();
				break;
			case "VideoEdit":
				VideoEditFunction();
				break;
			case "Animation":
				AnimationFunction();
				break;
			case "Note":
				NoteFunction();
				break;
			case "EngineerDraw":
				EngineerDrawFunction();
				break;
			case "ArtDraw":
				ArtDrawFunction();
				break;
			case "DataAnalysis":
				DataAnalysisFunction();
				break;
			case "DatabaseManage":
				DatabaseManageFunction();
				break;
			case "OnlineMessage":
				OnlineMessageFunction();
				break;
			case "Surfing":
				SurfingFunction();
				break;
			case "Mail":
				MailFunction();
				break;
			case "Coding":
				CodingFunction();
				break;
			case "AI_Model":
				AI_ModelFunction();
				break;
			default:
				return;
		}
	}
	else if(SearchSoftwareTypeArray.includes(TypeAndValueMap(switchValue))){
		alert("已選過此類別了喔");
		var Delete_Button = e.target.parentElement.parentElement;
		Delete_Button.parentNode.removeChild(Delete_Button);
	}
	
}//Select Finished Open
//CorrespondFunction
function DocumentFunction(){
	var value = 5;
	PushSoftwareTypeArray(value);
	$.ajax({
		method:"POST",
		url:"./PHP/Analyzation_AJAX.php",
		data:{"TargetSoftwareType":"Document"},
		success:function(data){
			document.getElementById("Software_List_Content").innerHTML="";
			for(let i=0;i<data.length;i++){
				window.console.log(data[i]);
			}
			for(let i=0;i<data.length;i++){
				var SoftwareList = document.getElementById("Software_List_Content");
				if(TargetList.includes(data[i]["Software_Name"])){//如果存在就打勾
					var SoftwareList_Content = `<label><input type="checkbox" class="SelectiveSoftware" name="Selection[]"checked>`+data[i]["Software_Name"]+`</label>`
				}
				else{
					var SoftwareList_Content = `<label><input type="checkbox" class="SelectiveSoftware" name="Selection[]">`+data[i]["Software_Name"]+`</label>`
				}
				var Software_Row = document.createElement('div');
				Software_Row.innerHTML = SoftwareList_Content;
				SoftwareList.append(Software_Row);
                var Software_Confirm_CheckBox = document.getElementsByClassName("SelectiveSoftware");
				for(let i=0;i<Software_Confirm_CheckBox.length;i++){
					Software_Confirm_CheckBox[i].addEventListener("click",GenerateResult);
				}
			}
			var Software_Confirm_Button = document.createElement('div');
			Software_Confirm_Button.innerHTML = `<br><button type="button" data-bs-dismiss="modal" id="Window_Inner_Confirm">確定</button>`;
			document.getElementById("Software_List_Content").append(Software_Confirm_Button);
		},
		error:function(data){
			alert(typeof data);
			window.console.log(data);
		}
	});
}
function EntertainmentFunction(){
	var value = 15;
	PushSoftwareTypeArray(value);
	$.ajax({
		method:"POST",
		url:"./PHP/Analyzation_AJAX.php",
		data:{"TargetSoftwareType":"Entertainment"},
		success:function(data){
			document.getElementById("Software_List_Content").innerHTML="";
			for(let i=0;i<data.length;i++){
				window.console.log(data[i]);
			}
			for(let i=0;i<data.length;i++){
				var SoftwareList = document.getElementById("Software_List_Content");
				if(TargetList.includes(data[i]["Software_Name"])){//如果存在就打勾
					var SoftwareList_Content = `<label><input type="checkbox" class="SelectiveSoftware" name="Selection[]" checked>`+data[i]["Software_Name"]+`</label>`
				}
				else{
					var SoftwareList_Content = `<label><input type="checkbox" class="SelectiveSoftware" name="Selection[]">`+data[i]["Software_Name"]+`</label>`
				}
				var Software_Row = document.createElement('div');
				Software_Row.innerHTML = SoftwareList_Content;
				SoftwareList.append(Software_Row);
                var Software_Confirm_CheckBox = document.getElementsByClassName("SelectiveSoftware");
				for(let i=0;i<Software_Confirm_CheckBox.length;i++){
					Software_Confirm_CheckBox[i].addEventListener("click",GenerateResult);
				}
			}
			var Software_Confirm_Button = document.createElement('div');
			Software_Confirm_Button.innerHTML = `<br><button type="button" data-bs-dismiss="modal" id="Window_Inner_Confirm">確定</button>`;
			document.getElementById("Software_List_Content").append(Software_Confirm_Button);
		},
		error:function(data){
			alert(typeof data);
			window.console.log(data);
		}
	});
}
function MathFunction(){
	var value = 7;
	PushSoftwareTypeArray(value);
	$.ajax({
		method:"POST",
		url:"./PHP/Analyzation_AJAX.php",
		data:{"TargetSoftwareType":"Math"},
		success:function(data){
			document.getElementById("Software_List_Content").innerHTML="";
			for(let i=0;i<data.length;i++){
				window.console.log(data[i]);
			}
			for(let i=0;i<data.length;i++){
				var SoftwareList = document.getElementById("Software_List_Content");
				if(TargetList.includes(data[i]["Software_Name"])){//如果存在就打勾
					var SoftwareList_Content = `<label><input type="checkbox" class="SelectiveSoftware" name="Selection[]" checked>`+data[i]["Software_Name"]+`</label>`
				}
				else{
					var SoftwareList_Content = `<label><input type="checkbox" class="SelectiveSoftware" name="Selection[]">`+data[i]["Software_Name"]+`</label>`
				}
				var Software_Row = document.createElement('div');
				Software_Row.innerHTML = SoftwareList_Content;
				SoftwareList.append(Software_Row);
                var Software_Confirm_CheckBox = document.getElementsByClassName("SelectiveSoftware");
				for(let i=0;i<Software_Confirm_CheckBox.length;i++){
					Software_Confirm_CheckBox[i].addEventListener("click",GenerateResult);
				}
			}
			var Software_Confirm_Button = document.createElement('div');
			Software_Confirm_Button.innerHTML = `<br><button type="button" data-bs-dismiss="modal" id="Window_Inner_Confirm">確定</button>`;
			document.getElementById("Software_List_Content").append(Software_Confirm_Button);
		},
		error:function(data){
			alert(typeof data);
			window.console.log(data);
		}
	});
}
function VideoEditFunction(){
	var value = 14;
	PushSoftwareTypeArray(value);
	$.ajax({
		method:"POST",
		url:"./PHP/Analyzation_AJAX.php",
		data:{"TargetSoftwareType":"VideoEdit"},
		success:function(data){
			document.getElementById("Software_List_Content").innerHTML="";
			for(let i=0;i<data.length;i++){
				window.console.log(data[i]);
			}
			for(let i=0;i<data.length;i++){
				var SoftwareList = document.getElementById("Software_List_Content");
				if(TargetList.includes(data[i]["Software_Name"])){//如果存在就打勾
					var SoftwareList_Content = `<label><input type="checkbox" class="SelectiveSoftware" name="Selection[]" checked>`+data[i]["Software_Name"]+`</label>`
				}
				else{
					var SoftwareList_Content = `<label><input type="checkbox" class="SelectiveSoftware" name="Selection[]">`+data[i]["Software_Name"]+`</label>`
				}
				var Software_Row = document.createElement('div');
				Software_Row.innerHTML = SoftwareList_Content;
				SoftwareList.append(Software_Row);
                var Software_Confirm_CheckBox = document.getElementsByClassName("SelectiveSoftware");
				for(let i=0;i<Software_Confirm_CheckBox.length;i++){
					Software_Confirm_CheckBox[i].addEventListener("click",GenerateResult);
				}
			}
			var Software_Confirm_Button = document.createElement('div');
			Software_Confirm_Button.innerHTML = `<br><button type="button" data-bs-dismiss="modal" id="Window_Inner_Confirm">確定</button>`;
			document.getElementById("Software_List_Content").append(Software_Confirm_Button);
		},
		error:function(data){
			alert(typeof data);
			window.console.log(data);
		}
	});
}
function AnimationFunction(){
	var value = 13;
	PushSoftwareTypeArray(value);
	$.ajax({
		method:"POST",
		url:"./PHP/Analyzation_AJAX.php",
		data:{"TargetSoftwareType":"Animation"},
		success:function(data){
			document.getElementById("Software_List_Content").innerHTML="";
			for(let i=0;i<data.length;i++){
				window.console.log(data[i]);
			}
			for(let i=0;i<data.length;i++){
				var SoftwareList = document.getElementById("Software_List_Content");
				if(TargetList.includes(data[i]["Software_Name"])){//如果存在就打勾
					var SoftwareList_Content = `<label><input type="checkbox" class="SelectiveSoftware" name="Selection[]" checked>`+data[i]["Software_Name"]+`</label>`
				}
				else{
					var SoftwareList_Content = `<label><input type="checkbox" class="SelectiveSoftware" name="Selection[]">`+data[i]["Software_Name"]+`</label>`
				}
				var Software_Row = document.createElement('div');
				Software_Row.innerHTML = SoftwareList_Content;
				SoftwareList.append(Software_Row);
                var Software_Confirm_CheckBox = document.getElementsByClassName("SelectiveSoftware");
				for(let i=0;i<Software_Confirm_CheckBox.length;i++){
					Software_Confirm_CheckBox[i].addEventListener("click",GenerateResult);
				}
			}
			var Software_Confirm_Button = document.createElement('div');
			Software_Confirm_Button.innerHTML = `<br><button type="button" data-bs-dismiss="modal" id="Window_Inner_Confirm">確定</button>`;
			document.getElementById("Software_List_Content").append(Software_Confirm_Button);
		},
		error:function(data){
			alert(typeof data);
			window.console.log(data);
		}
	});
}
function NoteFunction(){
	var value = 4;
	PushSoftwareTypeArray(value);
	$.ajax({
		method:"POST",
		url:"./PHP/Analyzation_AJAX.php",
		data:{"TargetSoftwareType":"Note"},
		success:function(data){
			document.getElementById("Software_List_Content").innerHTML="";
			for(let i=0;i<data.length;i++){
				window.console.log(data[i]);
			}
			for(let i=0;i<data.length;i++){
				var SoftwareList = document.getElementById("Software_List_Content");
				if(TargetList.includes(data[i]["Software_Name"])){//如果存在就打勾
					var SoftwareList_Content = `<label><input type="checkbox" class="SelectiveSoftware" name="Selection[]" checked>`+data[i]["Software_Name"]+`</label>`
				}
				else{
					var SoftwareList_Content = `<label><input type="checkbox" class="SelectiveSoftware" name="Selection[]">`+data[i]["Software_Name"]+`</label>`
				}
				var Software_Row = document.createElement('div');
				Software_Row.innerHTML = SoftwareList_Content;
				SoftwareList.append(Software_Row);
                var Software_Confirm_CheckBox = document.getElementsByClassName("SelectiveSoftware");
				for(let i=0;i<Software_Confirm_CheckBox.length;i++){
					Software_Confirm_CheckBox[i].addEventListener("click",GenerateResult);
				}
			}
			var Software_Confirm_Button = document.createElement('div');
			Software_Confirm_Button.innerHTML = `<br><button type="button" data-bs-dismiss="modal" id="Window_Inner_Confirm">確定</button>`;
			document.getElementById("Software_List_Content").append(Software_Confirm_Button);
		},
		error:function(data){
			alert(typeof data);
			window.console.log(data);
		}
	});
}
function EngineerDrawFunction(){
	var value = 10;
	PushSoftwareTypeArray(value);
	$.ajax({
		method:"POST",
		url:"./PHP/Analyzation_AJAX.php",
		data:{"TargetSoftwareType":"EngineerDraw"},
		success:function(data){
			document.getElementById("Software_List_Content").innerHTML="";
			for(let i=0;i<data.length;i++){
				window.console.log(data[i]);
			}
			for(let i=0;i<data.length;i++){
				var SoftwareList = document.getElementById("Software_List_Content");
				if(TargetList.includes(data[i]["Software_Name"])){//如果存在就打勾
					var SoftwareList_Content = `<label><input type="checkbox" class="SelectiveSoftware" name="Selection[]" checked>`+data[i]["Software_Name"]+`</label>`
				}
				else{
					var SoftwareList_Content = `<label><input type="checkbox" class="SelectiveSoftware" name="Selection[]">`+data[i]["Software_Name"]+`</label>`
				}
				var Software_Row = document.createElement('div');
				Software_Row.innerHTML = SoftwareList_Content;
				SoftwareList.append(Software_Row);
                var Software_Confirm_CheckBox = document.getElementsByClassName("SelectiveSoftware");
				for(let i=0;i<Software_Confirm_CheckBox.length;i++){
					Software_Confirm_CheckBox[i].addEventListener("click",GenerateResult);
				}
			}
			var Software_Confirm_Button = document.createElement('div');
			Software_Confirm_Button.innerHTML = `<br><button type="button" data-bs-dismiss="modal" id="Window_Inner_Confirm">確定</button>`;
			document.getElementById("Software_List_Content").append(Software_Confirm_Button);
		},
		error:function(data){
			alert(typeof data);
			window.console.log(data);
		}
	});
}
function ArtDrawFunction(){
	var value = 12;
	PushSoftwareTypeArray(value);
	$.ajax({
		method:"POST",
		url:"./PHP/Analyzation_AJAX.php",
		data:{"TargetSoftwareType":"ArtDraw"},
		success:function(data){
			document.getElementById("Software_List_Content").innerHTML="";
			for(let i=0;i<data.length;i++){
				window.console.log(data[i]);
			}
			for(let i=0;i<data.length;i++){
				var SoftwareList = document.getElementById("Software_List_Content");
				if(TargetList.includes(data[i]["Software_Name"])){//如果存在就打勾
					var SoftwareList_Content = `<label><input type="checkbox" class="SelectiveSoftware" name="Selection[]" checked>`+data[i]["Software_Name"]+`</label>`
				}
				else{
					var SoftwareList_Content = `<label><input type="checkbox" class="SelectiveSoftware" name="Selection[]">`+data[i]["Software_Name"]+`</label>`
				}
				var Software_Row = document.createElement('div');
				Software_Row.innerHTML = SoftwareList_Content;
				SoftwareList.append(Software_Row);
                var Software_Confirm_CheckBox = document.getElementsByClassName("SelectiveSoftware");
				for(let i=0;i<Software_Confirm_CheckBox.length;i++){
					Software_Confirm_CheckBox[i].addEventListener("click",GenerateResult);
				}
			}
			var Software_Confirm_Button = document.createElement('div');
			Software_Confirm_Button.innerHTML = `<br><button type="button" data-bs-dismiss="modal" id="Window_Inner_Confirm">確定</button>`;
			document.getElementById("Software_List_Content").append(Software_Confirm_Button);
		},
		error:function(data){
			alert(typeof data);
			window.console.log(data);
		}
	});
}
function DataAnalysisFunction(){
	var value = 9;
	PushSoftwareTypeArray(value);
	$.ajax({
		method:"POST",
		url:"./PHP/Analyzation_AJAX.php",
		data:{"TargetSoftwareType":"DataAnalysis"},
		success:function(data){
			document.getElementById("Software_List_Content").innerHTML="";
			for(let i=0;i<data.length;i++){
				window.console.log(data[i]);
			}
			for(let i=0;i<data.length;i++){
				var SoftwareList = document.getElementById("Software_List_Content");
				if(TargetList.includes(data[i]["Software_Name"])){//如果存在就打勾
					var SoftwareList_Content = `<label><input type="checkbox" class="SelectiveSoftware" name="Selection[]" checked>`+data[i]["Software_Name"]+`</label>`
				}
				else{
					var SoftwareList_Content = `<label><input type="checkbox" class="SelectiveSoftware" name="Selection[]">`+data[i]["Software_Name"]+`</label>`
				}
				var Software_Row = document.createElement('div');
				Software_Row.innerHTML = SoftwareList_Content;
				SoftwareList.append(Software_Row);
                var Software_Confirm_CheckBox = document.getElementsByClassName("SelectiveSoftware");
				for(let i=0;i<Software_Confirm_CheckBox.length;i++){
					Software_Confirm_CheckBox[i].addEventListener("click",GenerateResult);
				}
			}
			var Software_Confirm_Button = document.createElement('div');
			Software_Confirm_Button.innerHTML = `<br><button type="button" data-bs-dismiss="modal" id="Window_Inner_Confirm">確定</button>`;
			document.getElementById("Software_List_Content").append(Software_Confirm_Button);
		},
		error:function(data){
			alert(typeof data);
			window.console.log(data);
		}
	});
}
function DatabaseManageFunction(){
	var value = 8;
	PushSoftwareTypeArray(value);
	$.ajax({
		method:"POST",
		url:"./PHP/Analyzation_AJAX.php",
		data:{"TargetSoftwareType":"DatabaseManage"},
		success:function(data){
			document.getElementById("Software_List_Content").innerHTML="";
			for(let i=0;i<data.length;i++){
				window.console.log(data[i]);
			}
			for(let i=0;i<data.length;i++){
				var SoftwareList = document.getElementById("Software_List_Content");
				if(TargetList.includes(data[i]["Software_Name"])){//如果存在就打勾
					var SoftwareList_Content = `<label><input type="checkbox" class="SelectiveSoftware" name="Selection[]" checked>`+data[i]["Software_Name"]+`</label>`
				}
				else{
					var SoftwareList_Content = `<label><input type="checkbox" class="SelectiveSoftware" name="Selection[]">`+data[i]["Software_Name"]+`</label>`
				}
				var Software_Row = document.createElement('div');
				Software_Row.innerHTML = SoftwareList_Content;
				SoftwareList.append(Software_Row);
                var Software_Confirm_CheckBox = document.getElementsByClassName("SelectiveSoftware");
				for(let i=0;i<Software_Confirm_CheckBox.length;i++){
					Software_Confirm_CheckBox[i].addEventListener("click",GenerateResult);
				}
			}
			var Software_Confirm_Button = document.createElement('div');
			Software_Confirm_Button.innerHTML = `<br><button type="button" data-bs-dismiss="modal" id="Window_Inner_Confirm">確定</button>`;
			document.getElementById("Software_List_Content").append(Software_Confirm_Button);
		},
		error:function(data){
			alert(typeof data);
			window.console.log(data);
		}
	});
}
function OnlineMessageFunction(){
	var value = 2;
	PushSoftwareTypeArray(value);
	$.ajax({
		method:"POST",
		url:"./PHP/Analyzation_AJAX.php",
		data:{"TargetSoftwareType":"OnlineMessage"},
		success:function(data){
			document.getElementById("Software_List_Content").innerHTML="";
			for(let i=0;i<data.length;i++){
				window.console.log(data[i]);
			}
			for(let i=0;i<data.length;i++){
				var SoftwareList = document.getElementById("Software_List_Content");
				if(TargetList.includes(data[i]["Software_Name"])){//如果存在就打勾
					var SoftwareList_Content = `<label><input type="checkbox" class="SelectiveSoftware" name="Selection[]" checked>`+data[i]["Software_Name"]+`</label>`
				}
				else{
					var SoftwareList_Content = `<label><input type="checkbox" class="SelectiveSoftware" name="Selection[]">`+data[i]["Software_Name"]+`</label>`
				}
				var Software_Row = document.createElement('div');
				Software_Row.innerHTML = SoftwareList_Content;
				SoftwareList.append(Software_Row);
                var Software_Confirm_CheckBox = document.getElementsByClassName("SelectiveSoftware");
				for(let i=0;i<Software_Confirm_CheckBox.length;i++){
					Software_Confirm_CheckBox[i].addEventListener("click",GenerateResult);
				}
			}
			var Software_Confirm_Button = document.createElement('div');
			Software_Confirm_Button.innerHTML = `<br><button type="button" data-bs-dismiss="modal" id="Window_Inner_Confirm">確定</button>`;
			document.getElementById("Software_List_Content").append(Software_Confirm_Button);
		},
		error:function(data){
			alert(typeof data);
			window.console.log(data);
		}
	});
}
function SurfingFunction(){
	var value = 3;
	PushSoftwareTypeArray(value);
	$.ajax({
		method:"POST",
		url:"./PHP/Analyzation_AJAX.php",
		data:{"TargetSoftwareType":"Surfing"},
		success:function(data){
			document.getElementById("Software_List_Content").innerHTML="";
			for(let i=0;i<data.length;i++){
				window.console.log(data[i]);
			}
			for(let i=0;i<data.length;i++){
				var SoftwareList = document.getElementById("Software_List_Content");
				if(TargetList.includes(data[i]["Software_Name"])){//如果存在就打勾
					var SoftwareList_Content = `<label><input type="checkbox" class="SelectiveSoftware" name="Selection[]" checked>`+data[i]["Software_Name"]+`</label>`
				}
				else{
					var SoftwareList_Content = `<label><input type="checkbox" class="SelectiveSoftware" name="Selection[]">`+data[i]["Software_Name"]+`</label>`
				}
				var Software_Row = document.createElement('div');
				Software_Row.innerHTML = SoftwareList_Content;
				SoftwareList.append(Software_Row);
                var Software_Confirm_CheckBox = document.getElementsByClassName("SelectiveSoftware");
				for(let i=0;i<Software_Confirm_CheckBox.length;i++){
					Software_Confirm_CheckBox[i].addEventListener("click",GenerateResult);
				}
			}
			var Software_Confirm_Button = document.createElement('div');
			Software_Confirm_Button.innerHTML = `<br><button type="button" data-bs-dismiss="modal" id="Window_Inner_Confirm">確定</button>`;
			document.getElementById("Software_List_Content").append(Software_Confirm_Button);
		},
		error:function(data){
			alert(typeof data);
			window.console.log(data);
		}
	});
}
function MailFunction(){
	var value = 1;
	PushSoftwareTypeArray(value);
	$.ajax({
		method:"POST",
		url:"./PHP/Analyzation_AJAX.php",
		data:{"TargetSoftwareType":"Mail"},
		success:function(data){
			document.getElementById("Software_List_Content").innerHTML="";
			for(let i=0;i<data.length;i++){
				window.console.log(data[i]);
			}
			for(let i=0;i<data.length;i++){
				var SoftwareList = document.getElementById("Software_List_Content");
				if(TargetList.includes(data[i]["Software_Name"])){//如果存在就打勾
					var SoftwareList_Content = `<label><input type="checkbox" class="SelectiveSoftware" name="Selection[]" checked>`+data[i]["Software_Name"]+`</label>`
				}
				else{
					var SoftwareList_Content = `<label><input type="checkbox" class="SelectiveSoftware" name="Selection[]">`+data[i]["Software_Name"]+`</label>`
				}
				var Software_Row = document.createElement('div');
				Software_Row.innerHTML = SoftwareList_Content;
				SoftwareList.append(Software_Row);
                var Software_Confirm_CheckBox = document.getElementsByClassName("SelectiveSoftware");
				for(let i=0;i<Software_Confirm_CheckBox.length;i++){
					Software_Confirm_CheckBox[i].addEventListener("click",GenerateResult);
				}
			}
			var Software_Confirm_Button = document.createElement('div');
			Software_Confirm_Button.innerHTML = `<br><button type="button" data-bs-dismiss="modal" id="Window_Inner_Confirm">確定</button>`;
			document.getElementById("Software_List_Content").append(Software_Confirm_Button);
		},
		error:function(data){
			alert(typeof data);
			window.console.log(data);
		}
	});
}
function CodingFunction(){
	var value = 6;
	PushSoftwareTypeArray(value);
	$.ajax({
		method:"POST",
		url:"./PHP/Analyzation_AJAX.php",
		data:{"TargetSoftwareType":"Coding"},
		success:function(data){
			document.getElementById("Software_List_Content").innerHTML="";
			for(let i=0;i<data.length;i++){
				window.console.log(data[i]);
			}
			for(let i=0;i<data.length;i++){
				var SoftwareList = document.getElementById("Software_List_Content");
				if(TargetList.includes(data[i]["Software_Name"])){//如果存在就打勾
					var SoftwareList_Content = `<label><input type="checkbox" class="SelectiveSoftware" name="Selection[]" checked>`+data[i]["Software_Name"]+`</label>`
				}
				else{
					var SoftwareList_Content = `<label><input type="checkbox" class="SelectiveSoftware" name="Selection[]">`+data[i]["Software_Name"]+`</label>`
				}
				var Software_Row = document.createElement('div');
				Software_Row.innerHTML = SoftwareList_Content;
				SoftwareList.append(Software_Row);
                var Software_Confirm_CheckBox = document.getElementsByClassName("SelectiveSoftware");
				for(let i=0;i<Software_Confirm_CheckBox.length;i++){
					Software_Confirm_CheckBox[i].addEventListener("click",GenerateResult);
				}
			}
			var Software_Confirm_Button = document.createElement('div');
			Software_Confirm_Button.innerHTML = `<br><button type="button" data-bs-dismiss="modal" id="Window_Inner_Confirm">確定</button>`;
			document.getElementById("Software_List_Content").append(Software_Confirm_Button);
		},
		error:function(data){
			alert(typeof data);
			window.console.log(data);
		}
	});
}
function AI_ModelFunction(){
	var value = 11;
	PushSoftwareTypeArray(value);
	$.ajax({
		method:"POST",
		url:"./PHP/Analyzation_AJAX.php",
		data:{"TargetSoftwareType":"AI_Model"},
		success:function(data){
			document.getElementById("Software_List_Content").innerHTML="";
			for(let i=0;i<data.length;i++){
				window.console.log(data[i]);
			}
			for(let i=0;i<data.length;i++){
				var SoftwareList = document.getElementById("Software_List_Content");
				if(TargetList.includes(data[i]["Software_Name"])){//如果存在就打勾
					var SoftwareList_Content = `<label><input type="checkbox" class="SelectiveSoftware" name="Selection[]" checked>`+data[i]["Software_Name"]+`</label>`
				}
				else{
					var SoftwareList_Content = `<label><input type="checkbox" class="SelectiveSoftware" name="Selection[]">`+data[i]["Software_Name"]+`</label>`
				}
				var Software_Row = document.createElement('div');
				Software_Row.innerHTML = SoftwareList_Content;
				SoftwareList.append(Software_Row);
                var Software_Confirm_CheckBox = document.getElementsByClassName("SelectiveSoftware");
				for(let i=0;i<Software_Confirm_CheckBox.length;i++){
					Software_Confirm_CheckBox[i].addEventListener("click",GenerateResult);
				}
			}
			var Software_Confirm_Button = document.createElement('div');
			Software_Confirm_Button.innerHTML = `<br><button type="button" data-bs-dismiss="modal" id="Window_Inner_Confirm">確定</button>`;
			document.getElementById("Software_List_Content").append(Software_Confirm_Button);
		},
		error:function(data){
			alert(typeof data);
			window.console.log(data);
		}
	});
}
function Software_Type_Setting(){
	var SoftwareTypeValue = MaxValue(SearchSoftwareTypeArray);
	if(SoftwareTypeValue==1){
		SearchSoftwareType="Mail";
	}
	else if(SoftwareTypeValue==2){
		SearchSoftwareType="OnlineMessage";
	}
	else if(SoftwareTypeValue==3){
		SearchSoftwareType="Surfing";
	}
	else if(SoftwareTypeValue==4){
		SearchSoftwareType="Note";
	}
	else if(SoftwareTypeValue==5){
		SearchSoftwareType="Document";
	}
	else if(SoftwareTypeValue==6){
		SearchSoftwareType="Coding";
	}
	else if(SoftwareTypeValue==7){
		SearchSoftwareType="Math";
	}
	else if(SoftwareTypeValue==8){
		SearchSoftwareType="DatabaseManage";
	}
	else if(SoftwareTypeValue==9){
		SearchSoftwareType="DataAnalysis";
	}
	else if(SoftwareTypeValue==10){
		SearchSoftwareType="EngineerDraw";
	}
	else if(SoftwareTypeValue==11){
		SearchSoftwareType="AI_Model";
	}
	else if(SoftwareTypeValue==12){
		SearchSoftwareType="ArtDraw";
	}
	else if(SoftwareTypeValue==13){
		SearchSoftwareType="Animation";
	}
	else if(SoftwareTypeValue==14){
		SearchSoftwareType="VideoEdit";
	}
	else if(SoftwareTypeValue==15){
		SearchSoftwareType="Entertainment";
	}
}

let TargetList = [];
let SearchSoftwareType = 0;
let SearchSoftwareTypeArray = [];

//Set Software List Purpose
var SoftwareTableRow = document.createElement('div');
SoftwareTableRow.classList.add("Software_Purpose");
//var Software_Purpose_List = document.getElementById("Choice_Area");
var Software_Purpose_List = document.getElementsByClassName("Software_New_Purpose")[0];
var Software_Purpose_List_Content = `
	<!--目的-->
	<div>
	<input class="Delete_Purpose" type="image" src="./picture/remove.png" width="15" height="15" style:"display:flex justify-content:center">
	<span class="Purpose_RWD_SPAN">目的：</span>
	<span class="Purpose_SPAN">請選擇目的：</span>
		<select class="Purpose">
        	<option name="class" id="Default_Nothing" value="Default_Nothing" selected>請選擇類型</option>
			<option name="class" id="Document" value="Document">文書處理</option>
            <option name="class" id="Note" value="Note">筆記書寫</option>
            <option name="class" id="OnlineMessage" value="OnlineMessage">即時通訊</option>
			<option name="class" id="Surfing" value="Surfing">網頁瀏覽</option>
			<option name="class" id="Mail" value="Mail">郵件收送</option>
            <option name="class" id="Coding" value="Coding">程式編譯</option>
            <option name="class" id="AI_Model" value="AI_Model">模型訓練(AI)</option>
            <option name="class" id="DatabaseManage" value="DatabaseManage">資料庫管理</option>
            <option name="class" id="Math" value="Math">數學製圖與符號</option>
            <option name="class" id="DataAnalysis" value="DataAnalysis">數據分析統計</option>
			<option name="class" id="Entertainment" value="Entertainment">遊戲娛樂</option>
			<option name="class" id="VideoEdit" value="VideoEdit">影片剪輯</option>
            <option name="class" id="Animation" value="Animation">動畫特效製作</option>
			<option name="class" id="EngineerDraw" value="EngineerDraw">工程製圖</option>
			<option name="class" id="ArtDraw" value="ArtDraw">美術繪圖製作</option>
		</select>
	<button class="Review">檢視</button>
	</div>
	<br>`;
SoftwareTableRow.innerHTML = Software_Purpose_List_Content;
Software_Purpose_List.append(SoftwareTableRow);
Button_EventListener();
var Add_icon = document.getElementById("Add_Button").addEventListener("click",Software_Purpose_Function);

//Sending Button
document.getElementById("sent_button").addEventListener("click",SendingArray);

//Clean TargetList
function ClearList(){
	TargetList.splice(0,TargetList.length);
}
function GenerateResult(e){
    var SelectiveOptions = e.target.parentElement.innerText;
    if(TargetList.includes(SelectiveOptions)){//如果存在就刪除
        TargetList.splice(TargetList.indexOf(SelectiveOptions),1);
    }
    else{//不存在就把他加入陣列
        TargetList.push(SelectiveOptions);
    }
}
function SendingArray(){
	console.log("TargetList: \n");
	console.log(TargetList);
    var MiniPrice = 0;
    MiniPrice = parseInt(MiniPrice);
    var MaxPrice = document.getElementById("max_budget").value;
    MaxPrice = parseInt(MaxPrice);
    var Platform_Selection = $("[name='Platform']:checked").val();
    var CPU_Brand = $("[name='CPU_Brand']:checked").val();
    var GPU_Brand = $("[name='GPU_Brand']:checked").val();
	Software_Type_Setting();
    if (MiniPrice == 0 && MaxPrice == 0){
        alert("請輸入最高預算");
    }
    else if (MaxPrice<=MiniPrice||MaxPrice<0){
        alert("請輸入有效預算");
    }
    else if (!Platform_Selection){
        alert("請選擇平台");
    }
    else{
        $.ajax({
            method:"POST",
            url:"./PHP/Specification_AJAX_3.php",
            data:{TargetSearch:TargetList,MiniPrice:MiniPrice,MaxPrice:MaxPrice,Platform:Platform_Selection,SearchSoftwareType:SearchSoftwareType,CPU_Brand:CPU_Brand,GPU_Brand:GPU_Brand},
            timeout: 3000,//Timeout 3 seconds
            success:function(res){
                console.log('Ajax success!');
				var str = res.split("Finish");
				console.log(str[str.length - 1]);
				console.log(SearchSoftwareType);
				result_string = str[str.length - 1].split('Table_1')[0].split('\n')[2]
				// console.log("string => ",result_string)
				// 成功匹配到了適合的規格，也為您匹配了一張可以參考的規格表
				// 沒有適合的規格，建議您嘗試提高預算到：8878
				
				var test = result_string.split('，')[0]
				flag = false
				if(test == "成功匹配到了適合的規格"){
					flag = true
					var Table_2 = str[str.length - 1].split('Table_2')[1].split(')')[1].split('\n')
					T2 = {}
					T2['CPU'] = Table_2[2]
					T2['MB'] = Table_2[3]
					T2['GPU'] = Table_2[4]
					T2['Memory'] = Table_2[5]
					T2['SSD'] = Table_2[6]
					if(document.getElementById("Laptop").checked){//使用筆電分析
						T2['HDD'] = Table_2[7]
						T2['Power'] = Table_2[7]
						T2['Price'] = Table_2[8]
					}
					else{//使用桌機分析
						T2['HDD'] = Table_2[7]
						T2['Power'] = Table_2[8]
						T2['Price'] = Table_2[9]
					}
					// console.log("T2 => ",T2)
				}
				
				var Table_1 = str[str.length - 1].split('Table_1')[1].split(')')[1].split('\n')
				T1 = {}
				T1['CPU'] = Table_1[2]
				T1['MB'] = Table_1[3]
				T1['GPU'] = Table_1[4]
				T1['Memory'] = Table_1[5]
				T1['SSD'] = Table_1[6]
				if(document.getElementById("Laptop").checked){//使用筆電分析
					T1['HDD'] = Table_1[7]
					T1['Power'] = Table_1[7]
					T1['Price'] = Table_1[8]
				}
				else{//使用桌機分析
					T1['HDD'] = Table_1[7]
					T1['Power'] = Table_1[8]
					T1['Price'] = Table_1[9]
				}
				// console.log("T1 => ",T1)

				Generate_Result_div_show()
				table_change(T1)

				//移動式窗
				ResultList_Generate_Result_Table = document.getElementById("ResultList_Generate_Result_Table")
				$('html, body').animate({scrollTop:getPosition(ResultList_Generate_Result_Table).y},1000);

            },
            error:function(){
                console.log('Ajax request 發生錯誤');
                alert("請選擇使用軟體");
            }
        });
    }
}
function Generate_Result_div_show(){
	Generate_Result_div = document.getElementById("ResultList_Generate_Result_Table")
	Generate_Result_div.style.visibility = "visible"
	result_text = Generate_Result_div.getElementsByTagName('span')[2]
	result_text.innerHTML = result_string
	switch_btn = document.getElementById('switch_button')
	different_chart_text = document.getElementById('different_chart_text')
	switch_btn.style.visibility = "visible"
	different_chart_text.style.visibility = "visible"
	if(flag==false){
		switch_btn.style.visibility = "hidden"
		different_chart_text.style.visibility = "hidden"
	}
}
function table_change(T){
	Final_table = document.getElementsByClassName('Generate_Result_Table')[0]
    Final_table.getElementsByTagName('td')[0].innerText = T["CPU"]
    Final_table.getElementsByTagName('td')[1].innerText = T["MB"]
    Final_table.getElementsByTagName('td')[2].innerText = T["GPU"]
    Final_table.getElementsByTagName('td')[3].innerText = T["Memory"]
    Final_table.getElementsByTagName('td')[4].innerText = T["SSD"]
    Final_table.getElementsByTagName('td')[5].innerText = T["HDD"]
	if(document.getElementById("Laptop").checked)//使用筆電分析
    	Final_table.getElementsByTagName('td')[6].innerText = T["Power"]
	else//使用桌機分析
    	Final_table.getElementsByTagName('td')[6].innerText = T["Power"] + "瓦"
    Final_table.getElementsByTagName('td')[7].innerText = "NT$" + T["Price"]
}
var temp = 1
switch_btn = document.getElementById('switch_button')
switch_btn.addEventListener("click", switch_Generate_Result_table)

function switch_Generate_Result_table(){
	if(temp==1){
		table_change(T2)
		temp = 2
	}
	else{
		table_change(T1)
		temp = 1
	}
}


PDF_btn = document.getElementById("PDF_btn")
PIC_btn = document.getElementById("PIC_btn")
PDF_btn.addEventListener("click", PDF_generate)
PIC_btn.addEventListener("click", PIC_generate)

function PDF_generate(){
	Final_table = document.getElementsByClassName('Generate_Result_Table')[0]
    form = document.getElementsByTagName('form')
    input = form[0].getElementsByTagName('input')

    input[0].value = Final_table.getElementsByTagName('td')[0].innerText
    input[1].value = Final_table.getElementsByTagName('td')[1].innerText
    input[2].value = Final_table.getElementsByTagName('td')[2].innerText
    input[3].value = Final_table.getElementsByTagName('td')[3].innerText
    input[4].value = Final_table.getElementsByTagName('td')[4].innerText
    input[5].value = Final_table.getElementsByTagName('td')[5].innerText
    input[6].value = Final_table.getElementsByTagName('td')[6].innerText
    input[7].value = Final_table.getElementsByTagName('td')[7].innerText
    form[0].submit()
}

function PIC_generate(){
	Final_table = document.getElementsByClassName('Generate_Result_Table')[0]
    canvas_div = document.getElementById("canvas_div")
    var today = new Date();

    canvas_div.getElementsByTagName('p')[0].innerHTML = "列印日期：" + today.getFullYear() + "-" + (Number(today.getMonth())+Number(1)) + "-" + today.getDate() + " " + today.getHours() + ":" + today.getMinutes()
    canvas_div.getElementsByTagName('td')[7].innerText = Final_table.getElementsByTagName('td')[0].innerText
    canvas_div.getElementsByTagName('td')[9].innerText = Final_table.getElementsByTagName('td')[1].innerText
    canvas_div.getElementsByTagName('td')[11].innerText = Final_table.getElementsByTagName('td')[2].innerText
    canvas_div.getElementsByTagName('td')[13].innerText = Final_table.getElementsByTagName('td')[3].innerText
    canvas_div.getElementsByTagName('td')[15].innerText = Final_table.getElementsByTagName('td')[4].innerText
    canvas_div.getElementsByTagName('td')[17].innerText = Final_table.getElementsByTagName('td')[5].innerText
    canvas_div.getElementsByTagName('td')[19].innerText = Final_table.getElementsByTagName('td')[6].innerText
    canvas_div.getElementsByTagName('td')[21].innerText = Final_table.getElementsByTagName('td')[7].innerText
    
    canvas_div.style.visibility = "visible";
    //生成圖片
    html2canvas($("#canvas_div")[0]).then(function(canvas) {
        var $div = $("#image_append");
        $div.empty();
        $("<img />", { src: canvas.toDataURL("image/png") }).appendTo($div);
    });
    canvas_div.style.visibility = "hidden";
}

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

//移動式窗
img = document.getElementById("image_append")
jQuery(document).ready(function() {
	$('#PIC_btn').click(function(event) {
		event.preventDefault();
		$('html, body').animate({scrollTop:getPosition(img).y},500);
	});
});


CPU_additional = document.getElementById("CPU_additional")
CPU_additional.addEventListener("click", CPU_additional_change)
GPU_additional = document.getElementById("GPU_additional")
GPU_additional.addEventListener("click", GPU_additional_change)
budget_additional = document.getElementById("budget_additional")
budget_additional.addEventListener("click", budget_additional_change)

function CPU_additional_change(){
	console.log("CPUUUU")
	var CPU_Modal = new bootstrap.Modal(document.getElementById('CPU'));
	CPU_Modal.toggle()
}
function GPU_additional_change(){
	console.log("GPUUUU")
	var GPU_Modal = new bootstrap.Modal(document.getElementById('GPU'));
	GPU_Modal.toggle()
}
function budget_additional_change(){
	console.log("budget")
	var budget_Modal = new bootstrap.Modal(document.getElementById('budget'));
	budget_Modal.toggle()
}
function Software_Window_Change(){
	console.log("Software_Window_Change");
	var Software_Window_Modal = new bootstrap.Modal(document.getElementById('Software_List'));
	Software_Window_Modal.toggle()
}
function Software_Window_Close(){
	//var Software_Window_Modal = document.getElementById('Software_List');
	$('#Software_List').hide();
}

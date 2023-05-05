analyze = document.getElementsByTagName("section")[0]
form = document.getElementsByTagName("section")[1]
introduce = document.getElementsByTagName("section")[2]
about_me = document.getElementsByTagName("section")[3]
describe_text = document.getElementById("describe").getElementsByTagName("span")[0]

analyze.addEventListener("mouseover",analyze_func)
form.addEventListener("mouseover",form_func)
introduce.addEventListener("mouseover",introduce_func)
about_me.addEventListener("mouseover",about_me_func)

analyze.addEventListener("mouseout",clear)
form.addEventListener("mouseout",clear)
introduce.addEventListener("mouseout",clear)
about_me.addEventListener("mouseout",clear)

function analyze_func(){
    describe_text.innerHTML = "藉由篩選條件尋找適合自己需求的電腦"
}
function form_func(){
    describe_text.innerHTML = "選擇自己想要的電腦配備"
}
function introduce_func(){
    describe_text.innerHTML = "對於電腦的世界有不懂的地方嗎?我來告訴你!"
}
function about_me_func(){
    describe_text.innerHTML = "想知道是誰做的嗎?幕後團隊在這裡"
}
function clear(){
    describe_text.innerHTML = ""
}

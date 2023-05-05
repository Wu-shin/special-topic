function getPosition(element) {
    var x = 0;
    var y = 0;
    // 搭配上面的示意圖可比較輕鬆理解為何要這麼計算
    while (element) {
        x += element.offsetLeft - element.scrollLeft + element.clientLeft;
        y += element.offsetTop - element.scrollLeft + element.clientTop;
        element = element.offsetParent;
    }
    return { x: x, y: y };
}
// Get the browser window size
var windowWidth = window.innerWidth;
var windowHeight = window.innerHeight;

var blank = document.getElementById("blank")
var blank_position = getPosition(blank);
var footer = document.getElementsByTagName("footer")[0]

// console.log(windowWidth,windowHeight)
// console.log(blank_position.x,blank_position.y)
blank.style.height = String(windowHeight - blank_position.y - footer.offsetHeight) + "px";

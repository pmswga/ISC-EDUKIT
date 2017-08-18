
/*!
  @descp Скрипт для определения дня недели
*/

var date = new Date;
var day = date.getDay();

if (day != 0) {
  document.getElementById(day).setAttribute("class", "active");
} else {
  document.getElementById("7").setAttribute("class", "active");
}
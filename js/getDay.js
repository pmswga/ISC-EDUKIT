
/*!
  @descp Скрипт для определения дня недели
*/

var date = new Date;
var day = date.getDay();

if (day != 0) {
  document.getElementById(day).setAttribute("class", "ui active step");
} else {
  document.getElementById("7").setAttribute("class", "ui active step");
}
var rating = 0;
var count = 11;//Кол-во предметов

function Calculate()
{
    for(var i = 1; i < 12; i++)
    {
        var element = document.getElementById(i);  
        rating += Number(element.options[element.selectedIndex].value);
    }
    rating /= count;
    
    document.getElementById("ozen").innerHTML = Number(rating).toFixed(2);
    rating = Math.floor(rating);
    switch(rating)
    {
    case 1: alert("Плохо друг мой, иди учись"); break;
    case 2: alert("Иди учись, неуч"); break;
    case 3: alert("Неплохо, но всё же не самый лучший твой результат. Ты можешь круче!"); break;
    case 4: alert("Красавчик!"); break;
    case 5: alert("Отличник? Это круто!"); break;
    }
    rating = 0;
}
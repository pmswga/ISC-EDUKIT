var onHover = false;
function Sor(element)
{
    if(!onHover)
    {
        var n = (Math.ceil((1-1) + Math.random()*(9-(1-1))));
        switch(n)
        {
        case 1: 
            {
                element.innerHTML = "Cорокин Ю.С";
                onHover = true;
            }break;
        case 2: 
            {
                element.innerHTML = "Тарасова Е.А.";
                onHover = true;
            }break;
        case 3: 
            {
                element.innerHTML = "Миланова И.А.";
                onHover = true;
            }break;
        case 4: 
            {
                element.innerHTML = "Куликова О.Ф.";
                onHover = true;
            }break;
        case 5: 
            {
                element.innerHTML = "Куратор";
                onHover = true;
            }break;
        case 6: 
            {
                element.innerHTML = "Куропаткина И.В.";
                onHover = true;
            }break;
        case 7: 
            {
                element.innerHTML = "Соколова Т.И";
                onHover = true;
            }break;
        case 8: 
            {
                element.innerHTML = "Big Boss";
                onHover = true;
            }break;
	case 9:
	    {
		element.innerHTML = "Куантаева Т.Ю.";
                onHover = true;
            }
        }

    }
    else
    {
        element.innerHTML = "104";
        onHover = false;
    }
}
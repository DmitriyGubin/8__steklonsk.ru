var elements = document.querySelectorAll(".bx_pagination_page ul li");

let j = 0;
var num = 0;
for (let item of elements)
{
	if(item.classList.contains('bx_active'))
	{
		num = j;
		break;
	}
	j++;
}

if(screen.width > 750)
{
	var del = 40;
}
else
{
	var del = 32;
}

var sdvig = (num-1)*del;
sdvig = sdvig + 'px';

var polzun = document.querySelector("#polzun");
polzun.style.left = sdvig;

//console.log(num);


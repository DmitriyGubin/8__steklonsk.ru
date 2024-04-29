var x_coord = document.querySelector("#x-coord").innerHTML;
var y_coord = document.querySelector("#y-coord").innerHTML;
var point_adress = document.querySelector("#map-label").innerHTML;

ymaps.ready(init);

function init () {
	var myMap = new ymaps.Map("this-map", {
		center: [x_coord,y_coord],
		zoom: 16,
				//controls: [],//без элементов управления
			}, {
				searchControlProvider: 'yandex#search'
			}),
    // Создание макета содержимого хинта.
    // Макет создается через фабрику макетов с помощью текстового шаблона.
    HintLayout = ymaps.templateLayoutFactory.createClass( "<div class='my-hint'>" +
    	"{{ properties.address }}" +
    	"</div>", {
                // Определяем метод getShape, который
                // будет возвращать размеры макета хинта.
                // Это необходимо для того, чтобы хинт автоматически
                // сдвигал позицию при выходе за пределы карты.
                getShape: function () {
                	var el = this.getElement(),
                	result = null;
                	if (el) {
                		var firstChild = el.firstChild;
                		result = new ymaps.shape.Rectangle(
                			new ymaps.geometry.pixel.Rectangle([
                				[0, 0],
                				[firstChild.offsetWidth, firstChild.offsetHeight]
                				])
                			);
                	}
                	return result;
                }
            }
            );

    function Add_This_Point(x, y, adress)
    {
        var myPlacemark = new ymaps.Placemark([x, y], 
        { 
            balloonContent: adress
        },
        {  
           preset: 'islands#icon',
           iconColor: '#ff0000'
        });
        myMap.geoObjects.add(myPlacemark);
    }

     Add_This_Point(x_coord, y_coord, point_adress);
 }
var sphereHeaders = document.getElementsByClassName('sphere-header');
var colorPickers = document.getElementsByClassName('color-pickers');

for(var i = 0; i < colorPickers.length; i++)
{
    colorPickers[i].addEventListener("change", onChangeColor, false);
}

function onChangeColor(event)
{
    var header = getSphereHeaderBySphereName(event.target.getAttribute('spherename'));
    header.style.backgroundColor = event.target.value;
}

function getSphereHeaderBySphereName(sphereName)
{
    for(var i = 0; i < sphereHeaders.length; i++)
    {
        var attribute = sphereHeaders[i].getAttribute('spherename');
        if(attribute.localeCompare(sphereName) == 0)
        {
            return sphereHeaders[i];
        }
    }
}
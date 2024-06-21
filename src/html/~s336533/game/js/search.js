var sphereHeaders = document.getElementsByClassName('sphere-header');
var searchInputFields = document.getElementsByClassName('search-input');
var searchButtons = document.getElementsByClassName('search-btn');

for(var i = 0; i < searchButtons.length; i++)
{
  searchButtons[i].addEventListener("click", SlideToAnotherSlideBySphereName, false);
}

function SlideToAnotherSlideBySphereName(event)
{
  var sphereName = searchInputFields[0].value;
  var sphereHeader = getSphereHeaderBySphereName(sphereName);
  if(sphereHeader != null)
  {
    swiper.slideTo(sphereHeader.getAttribute('sphereID'));
  }
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

    return null;
}
var hintImgs = document.getElementsByClassName('hint-img');
var hint = document.getElementById('hint');

for(var i = 0; i < hintImgs.length; i++)
{
    hintImgs[i].addEventListener("mouseout", OnMouseOut, false);
    hintImgs[i].addEventListener("mouseover", OnMouseOver, false);
}

function OnMouseOut(event)
{
    hint.classList.remove('enabled');
    hint.classList.add('disabled');
}

function OnMouseOver(event)
{
    

    hint.classList.add('enabled');
    hint.classList.remove('disabled')
}
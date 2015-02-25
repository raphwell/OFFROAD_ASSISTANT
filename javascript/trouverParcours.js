window.addEventListener("load", function ()
{
    window.document.querySelector("#selectionner").addEventListener("click", function ()
    {
        var ville = (window.document.querySelector("#ville").value);
        
        
     window.document.querySelector("#selection").innerHTML = "La ville sélectionnée est : " + ville;

    }, false);
}, false);



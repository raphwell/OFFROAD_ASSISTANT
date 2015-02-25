window.addEventListener("load", function ()
{
    window.document.querySelector("#selectionner").addEventListener("click", function ()
    {
        var pseudo = (window.document.querySelector("#pseudo").value);
        
        
     window.document.querySelector("#selection").innerHTML = "Le PSEUDO sélectionné est : " + pseudo;

    }, false);
}, false);



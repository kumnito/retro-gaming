
//largeur du curseur (en pixels)
var sliderwidth=330
//hauteur du curseur (Netscape)
var sliderheight=145
//vitesse de d�filement
var slidespeed=12

//les images
var leftrightslide=new Array()
var finalslide=''
leftrightslide[0]='<img src="/icons/pacman1.png" style="width:300px; height:200px;" border=0>'
leftrightslide[1]='<img src="/icons/3pacman.png" style="width:200px; height:100px;" border=0>'


/*
dynamicdrive.com
Ne rien modifier sous cette ligne
*/ 

var copyspeed=slidespeed
for (i=0;i<leftrightslide.length;i++)
finalslide=finalslide+leftrightslide[i]+"&nbsp;&nbsp;"

{document.write('<marquee direction="right" id="ieslider" scrollAmount=0 style="width:'+sliderwidth+'">'+finalslide+'</marquee>')
ieslider.onmouseover=new Function("ieslider.scrollAmount=0")
ieslider.onmouseout=new Function("if (document.readyState=='complete') ieslider.scrollAmount=slidespeed")}

function regenerate(){window.location.reload()}
function regenerate2(){ieslider.scrollAmount=slidespeed}

function intializeleftrightslide(){document.ns_slider01.document.ns_slider02.document.write('<nobr>'+finalslide+'</nobr>')
document. ns_slider01.document.ns_slider02.document.close()
thelength=document.ns_slider01.document.ns_slider02.document.width
scrollslide()}

function scrollslide(){if (document.ns_slider01.document.ns_slider02.left>=thelength*(-1)){document.ns_slider01.document.ns_slider02.left-=slidespeed
setTimeout("scrollslide()",100)}
else{document.ns_slider01.document.ns_slider02.left=sliderwidth
scrollslide()}}
window.onload=regenerate2

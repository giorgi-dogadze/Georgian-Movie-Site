var rejisorta_konteineri_cvladi = document.querySelectorAll("rejisorta_konteineri");

for (var i = 0; i < rejisorta_konteineri_cvladi.length; i++)
 {
  rejisorta_konteineri_cvladi[i].onclick = function() {
    var rejisorta_info_cvladi = this.nextElementSibling;
    if (rejisorta_info_cvladi.style.maxHeight) 
    {
      // tu ukve gamoweulia info bloki
      rejisorta_info_cvladi.style.maxHeight = null;
    } 
    else 
    {
      // tu info bloki jer gamoweuli araa
      rejisorta_info_cvladi.style.maxHeight = rejisorta_info_cvladi.scrollHeight + "px";
    }
  }
}


$(document).ready(function(){
  $("#hide").click(function(){
    $("p").hide();
  });
  $("#show").click(function(){
    $("p").show();
  });
});
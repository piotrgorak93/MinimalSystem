<?php
/** this class is responsible for throwing Popup window, actually it's a template */
class Popup{
function __construct($komunikat, $redirect){
    echo "<script>
    jQuery(function(){
        jQuery('#modal').click();
    });
    function reloadPage(){
   window.location.replace(";
    echo "\"$redirect\"";
echo");
}
  </script>";

    echo"
<button type=\"button\" class=\"btn btn-primary btn-lg\" data-toggle=\"modal\" data-target=\"#myModal\" id=\"modal\" style=\"visibility: hidden\">

    </button>";
    echo "
<div class=\"modal fade\" id=\"myModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                <h4 class=\"modal-title\" id=\"myModalLabel\">Komunikat ze strony</h4>
            </div>
            <div class=\"modal-body\">";

               echo $komunikat;

                echo"
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\" onclick=\"reloadPage()\">Zamknij</button>
            </div>
        </div>
    </div>
</div>";
}
}
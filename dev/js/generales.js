
jQuery(document).ready(function () {


    jQuery(".accordion-titulo").click(function() {
        var e = jQuery(this).next(".accordion-content");
        "none" == e.css("display") ? (e.slideDown(250), jQuery(this).addClass("open")) : (e.slideUp(250), jQuery(this).removeClass("open"))
    });


});
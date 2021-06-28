

jQuery(document).ready(function () {

function checkActividades(elemento){
    var l = window.location;
    var r = l.href;
    if(elemento == 'encuentro'){

        if (r.includes('/#EncuentroInternacionalZarzuela') == true) {
            jQuery('.opcionesActividades a').removeClass('activo');
            jQuery('.opcionesActividades a.opcionEncuentro').addClass('activo');
        }

    }
    if(elemento == 'temporada'){

        if (r.includes('/#TemporadaInternacionalZarzuela') == true) {
            jQuery('.opcionesActividades a').removeClass('activo');
            jQuery('.opcionesActividades a.opcionTemporada').addClass('activo');
        }

    }
    if(elemento == 'premioIncentivo'){

        if (r.includes('/#premioIncentivo') == true) {
            jQuery('.opcionesActividades a').removeClass('activo');
            jQuery('.opcionesActividades a.opcionIncentivo').addClass('activo');
        }

    }
    if(elemento == 'seminarioXXI'){

        if (r.includes('/#seminarioXXI') == true) {
            jQuery('.opcionesActividades a').removeClass('activo');
            jQuery('.opcionesActividades a.opcionSeminario').addClass('activo');
        }

    }

}


jQuery(document).ready(function () {
    var l = window.location
    var r = l.href;
    if (r.includes('/actividades/') == true) {

        if (r.includes('/#EncuentroInternacionalZarzuela') == true) {
            jQuery('.opcionesActividades a').removeClass('activo');
            jQuery('.opcionesActividades a.opcionEncuentro').addClass('activo');
        }

        if (r.includes('/#TemporadaInternacionalZarzuela') == true) {
            jQuery('.opcionesActividades a').removeClass('activo');
            jQuery('.opcionesActividades a.opcionTemporada').addClass('activo');
        }

        if (r.includes('/#premioIncentivo') == true) {
            jQuery('.opcionesActividades a').removeClass('activo');
            jQuery('.opcionesActividades a.opcionIncentivo').addClass('activo');
        }
        if (r.includes('/#seminarioXXI') == true) {
            jQuery('.opcionesActividades a').removeClass('activo');
            jQuery('.opcionesActividades a.opcionSeminario').addClass('activo');
        }


        // la parte de clicks
        jQuery('.opcionesActividades a.opcionEncuentro').click(function (e) {
            e.preventDefault();
            jQuery('ul.vc_tta-tabs-list li:nth-child(2) a').click();
            checkActividades('encuentro');
            // console.log("click");
        });

        jQuery('.opcionesActividades a.opcionTemporada').click(function (e) {
            e.preventDefault();
            jQuery('ul.vc_tta-tabs-list li:nth-child(3) a').click();
            checkActividades('temporada');
            // console.log("click");
        });

        jQuery('.opcionesActividades a.opcionIncentivo').click(function (e) {
            e.preventDefault();
            jQuery('ul.vc_tta-tabs-list li:nth-child(4) a').click();
            checkActividades('premioIncentivo');
            // console.log("click");
        });

        jQuery('.opcionesActividades a.opcionSeminario').click(function (e) {
            e.preventDefault();
            jQuery('ul.vc_tta-tabs-list li:nth-child(5) a').click();
            checkActividades('seminarioXXI');
            // console.log("click");
        });

    }
});


});

jQuery(document).ready(function () {


    jQuery(".accordion-titulo").click(function() {
        var e = jQuery(this).next(".accordion-content");
        "none" == e.css("display") ? (e.slideDown(250), jQuery(this).addClass("open")) : (e.slideUp(250), jQuery(this).removeClass("open"))
    });


});
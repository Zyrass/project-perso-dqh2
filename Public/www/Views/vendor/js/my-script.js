$(document).ready(function() {
/*
 |-------------------------------------------------------------------------------------
 | Nabar multi-niveaux / Affichage du sous menu en douceur
 |-------------------------------------------------------------------------------------
 */
    jQuery('ul.nav li.dropdown').hover(function() {
        jQuery(this).find('.jqueryFadeIn').stop(true, true).delay(200).fadeIn();
    }, function() {
        jQuery(this).find('.jqueryFadeIn').stop(true, true).delay(200).fadeOut();
    });

/*
 |-------------------------------------------------------------------------------------
 | Tabulation pour la quantité des mobs à kill
 |-------------------------------------------------------------------------------------
 */   
    $('#myTabs a').click(function (e) {
        e.preventDefault()
        $(this).tab('show')
    })

/*
 |-------------------------------------------------------------------------------------
 | Modal pour les cartes aux trésors
 |-------------------------------------------------------------------------------------
 */
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').focus()
    })

    $('#myAffix').affix({
    offset:  {
        top: 100,
        bottom: function () {
        return (this.bottom = $('.footer').outerHeight(true))
        }
    }
    })

}); // Fin de jquery
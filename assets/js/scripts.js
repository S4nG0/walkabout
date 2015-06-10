/***
 * Gives two column the same height
 */
function equalheight(container) {
    var currentTallest = 0;
    var currentRowStart = 0;
    var rowDivs = new Array();
    var $el;
    var topPosition = 0;

    $(container).each(function() {
        $el = $(this);
        $($el).height('auto')
        topPosition = $el.position().top;

        if (currentRowStart != topPosition) {
            for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
                rowDivs[currentDiv].height(currentTallest);
            }

            rowDivs.length = 0; // empty the array
            currentRowStart = topPosition;
            currentTallest = $el.height();
            rowDivs.push($el);
        } else {
            rowDivs.push($el);
            currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
        }

        for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
            rowDivs[currentDiv].height(currentTallest);
        }
    });
}

/***
 * Resize home's #main div
 */
function magicHeight() {
    if ( $('body').hasClass('home') || $('body').hasClass('single-carnet') || $('body').hasClass('sign-in')) {
        $('#main').css({
           'height': $(window).height()
        });
    }
}

/***
 * Google Map function
 */
function TopControl(controlDiv, map) {

    var controlText = document.createElement('div');
    controlText.innerHTML = '<i class="fa fa-plus"></i>';
    controlDiv.appendChild(controlText);

    google.maps.event.addDomListener(controlDiv, 'click', function() {
        var currentZoom = map.getZoom();
        map.setZoom(++currentZoom);
    });
}

function BottomControl(controlDiv, map) {
    var controlText = document.createElement('div');
    controlText.innerHTML = '<i class="fa fa-minus"></i>';
    controlDiv.appendChild(controlText);

    google.maps.event.addDomListener(controlDiv, 'click', function() {
        var currentZoom = map.getZoom();
        map.setZoom(--currentZoom);
    });
}

var map;

function mapInitialize() {
    var myLatLng = new google.maps.LatLng(-12.04, -77.04);
    var styles = {

    }
    var mapOptions = {
        zoom: 16,
        maxZoom: 19,
        center: myLatLng,
        streetViewControl: false,
        mapTypeControl: false,
        rotateControl: false,
        panControl: false,
        zoomControl: false,
        zoomControlOptions: {
            style: google.maps.ZoomControlStyle.SMALL,
            position: google.maps.ControlPosition.BOTTOM
        },
        styles : [
            {
                "featureType": "water",
                "elementType": "all",
                "stylers": [
                    {
                        "hue": "#fde29c"
                    },
                    {
                        "saturation": 38
                    },
                    {
                        "lightness": -11
                    },
                    {
                        "visibility": "on"
                    }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "all",
                "stylers": [
                    {
                        "hue": "#f0c041"
                    },
                    {
                        "saturation": 0
                    },
                    {
                        "lightness": 0
                    },
                    {
                        "visibility": "on"
                    }
                ]
            },
            {
                "featureType": "poi.park",
                "elementType": "all",
                "stylers": [
                    {
                        "hue": "#fff2d2"
                    },
                    {
                        "saturation": 17
                    },
                    {
                        "lightness": -2
                    },
                    {
                        "visibility": "on"
                    }
                ]
            },
            {
                "featureType": "road.arterial",
                "elementType": "all",
                "stylers": [
                    {
                        "hue": "#cccccc"
                    },
                    {
                        "saturation": -100
                    },
                    {
                        "lightness": 13
                    },
                    {
                        "visibility": "on"
                    }
                ]
            },
            {
                "featureType": "administrative.land_parcel",
                "elementType": "all",
                "stylers": [
                    {
                        "hue": "#5f5855"
                    },
                    {
                        "saturation": 6
                    },
                    {
                        "lightness": -31
                    },
                    {
                        "visibility": "on"
                    }
                ]
            },
            {
                "featureType": "road.local",
                "elementType": "all",
                "stylers": [
                    {
                        "hue": "#ffffff"
                    },
                    {
                        "saturation": -100
                    },
                    {
                        "lightness": 100
                    },
                    {
                        "visibility": "simplified"
                    }
                ]
            },
            {
                "featureType": "water",
                "elementType": "all",
                "stylers": []
            }
        ]
    };
    map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

    var topControlDiv = document.createElement('div');
    topControlDiv.setAttribute('class', 'controls');
    var topControl = new TopControl(topControlDiv, map);

    var bottomControlDiv = document.createElement('div');
    bottomControlDiv.setAttribute('class', 'controls');
    var bottomControl = new BottomControl(bottomControlDiv, map);

    topControlDiv.index = 1;
    bottomControlDiv.index = 1;
    map.controls[google.maps.ControlPosition.BOTTOM].push(topControlDiv);
    map.controls[google.maps.ControlPosition.BOTTOM].push(bottomControlDiv);

    var iconBase = '/assets/images/marker.png';
    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title: 'Walkabout',
        icon: iconBase
    })
}

$(document).ready(function () {

    /***
     * Flickity initializer
     */
    $.doTimeout(500, function(){
        $('.block_travel-logs_slider').flickity({
            //options
            freeScroll: false,
            draggable: true,
            // autoPlay: 5000,
            setGallerySize: false
        });
    })

    /***
     * Stellar initializer
     */
    $.stellar();

    /***
     * Magic Height initializer
     */
    magicHeight();

    /***
     * Sameheight initializer
     */
    equalheight('.sameHeight');

    /***
     * Navbar-toggle animation
     */
    var icon = document.getElementById('icon');
    var navbarToggle = document.getElementById('toggle');
    var options = {
        from: 'fa-bars',
        to: 'fa-arrow-up',
        animation: 'fadeOutTop'
    }
    var options2 = {
        from: 'fa-arrow-up',
        to: 'fa-bars',
        animation: 'fadeOutBottom'
    }
    navbarToggle.addEventListener('click', function(){
        if(!icon.classList.contains('fa-arrow-up')) {
            iconate(icon, options);
        } else {
            iconate(icon, options2);
        }
    })
    // $('#toggle').on('click', function(){
    //     if (navbarToggle.hasClass('fa-arrow-up')) {
    //         navbarToggle.switchClass('fa-arrow-up', 'fa-bars').fadeIn(100);
    //     }
    //     else {
    //         navbarToggle.switchClass('fa-bars', 'fa-arrow-up').fadeIn(100);
    //     }
    // });

    /***
     * Sticky navbar
     */
    if ( !$('body').hasClass('checkout') ) {
        if ( $('body').hasClass('home') || $('body').hasClass('single-carnet') ) {
            $('.navbar').affix({
              offset: {
                top: function() {
                    return ( $(window).height() + 100)
                },
                bottom: function () {
                  return (this.bottom = $('.footer').outerHeight(true))
                }
              }
            });
        } else {
            $('.navbar').affix({
              offset: {
                top: 400,
                bottom: function () {
                  return (this.bottom = $('.footer').outerHeight(true))
                }
              }
            });
        }
    }

    /***
     * Information box tabs
     */
    $('#information__box').tabs().addClass('ui-tabs-vertical ui-help-clearfix');


    /***
     * Smooth scrolls
     */

    //Home scroll
    $('a[href=#content]').click( function() { // Au clic sur un élément
        var page = $(this).attr('href'); // Page cible
        console.log(page);
        var speed = 1500; // Durée de l'animation (en ms)
        $('html, body').animate( { scrollTop: $(page).offset().top }, speed ); // Go
        return false;
    });

    //Destination scroll
    $('a[href=#travel-logs]').click( function() { // Au clic sur un élément
        var page = $(this).attr('href'); // Page cible
        console.log(page);
        var speed = 1500; // Durée de l'animation (en ms)
        $('html, body').animate( { scrollTop: $(page).offset().top - 90 }, speed ); // Go
        return false;
    });

    //Travel-log scroll
    $('a[href=#comment-form]').click( function() { // Au clic sur un élément
        var page = $(this).attr('href'); // Page cible
        console.log(page);
        var speed = 1500; // Durée de l'animation (en ms)
        $('html, body').animate( { scrollTop: $(page).offset().top - 150 }, speed ); // Go
        return false;
    });

    /***
     * Google map init
     */
    $('#map-trigger').click(function(){
        mapInitialize();
    })
    $('#map-trigger').bind('touchstart', function(event){
        mapInitialize();
    })

    /***
     * Fancybox gallery
     */
    $(".fancybox").fancybox({
        helpers: {
            overlay: {
                css: {
                    'background': 'rgba(58, 42, 45, 0.95)',
                }
            }
        }
    });


    /***
     * Readmore
     */
    $('article').readmore({
        collapsedHeight: 800,
        heightMargin: 0,
        moreLink: '<div class="row noPadding"><div class="readMore"><a href="#">Lire la suite<i class="fa fa-chevron-down"></i></a></div></div>',
        lessLink: '<div class="row noPadding"><div class="readMore"><a href="#">Fermer<i class="fa fa-chevron-down"></i></a></div></div>',
        speed: 300,
        afterToggle: function(trigger, element, expanded) {
            if (! expanded) {
                $('html, body').animate( { scrollTop: $(element).offset().top }, 300 )
            }
        }
    })

    /***
     * Checkout submit and delete
     */
    $('#add-address').on('click', function(){
        var newAdress = $('#new-address');
        var page = $(this).attr('href');
        newAdress.css('display', 'block');
        $('html, body').animate( { scrollTop: $(page).offset().top }, 300 );
    });

    $('#delete-address').on('click', function(){
        confirm('Êtes-vous sûr de vouloir supprimer cette adresse ?');
    });

    /***
     * User account submenu switching
     */
    $('#reservations-content').show();
    $('#carnets-content').hide();
    $('#infos-content').hide();

    $('.espace-voyageur .content .submenu .button').on('click', function(){
        var buttonID = $(this).attr('id');
        window.location.hash = buttonID;

        switch(buttonID) {

            case 'reservations':
                $('#reservations').addClass('active');
                if ($('#carnets').hasClass('active')) {
                    $('#carnets').removeClass('active');
                }
                if ($('#infos').hasClass('active')) {
                    $('#infos').removeClass('active');
                }

                $('#reservations-content').fadeIn(300);
                $('#carnets-content').hide();
                $('#infos-content').hide();
            break;

            case 'carnets':
                $('#carnets').addClass('active');
                if ($('#reservations').hasClass('active')) {
                    $('#reservations').removeClass('active');
                }
                if ($('#infos').hasClass('active')) {
                    $('#infos').removeClass('active');
                }

                $('#reservations-content').hide();
                $('#carnets-content').fadeIn(300);
                $('#infos-content').hide();
            break;

            case 'infos':
                $('#infos').addClass('active');
                if ($('#reservations').hasClass('active')) {
                    $('#reservations').removeClass('active');
                }
                if ($('#carnets').hasClass('active')) {
                    $('#carnets').removeClass('active');
                }

                $('#reservations-content').hide();
                $('#carnets-content').hide();
                $('#infos-content').fadeIn(300);
            break;
        }
    });

    /***
     * User account change password
     */
    $('#new-password').hide();
    $('#new-password-confirmation').hide();
    
    $('.change-pwd-button').on('click', function(e){
        $(this).hide();
        $('#new-password').fadeIn(500);
        $('#new-password-confirmation').fadeIn(500);
    });
    

    $(function () {
      $('[data-toggle="popover"]').popover()
    });
});

$(window).on('resize', function(){
    equalheight('.sameHeight');
    magicHeight();
});

$('#nb_personne').on('change',function(){
    var tarif = $('#prix_personne').html();
    var total = $(this).val() * tarif;
    $('#result_total').html(total);
});

$('#submit_commande').on('click',function(e){
    e.preventDefault();
    var result = $('input[type=checkbox][name=gtc]').is(':checked');
    if(result == true){
    $('form').submit();
}
});

$(window).scroll(function(){
    /***
     * Caption text in single-carnet
     * gradual fading on scroll
     */
    var st = $(window).scrollTop();
    $('.caption-wrapper').css({'opacity':(1000 - st)/1000});

    var sb = $(window).scrollTop();
    $('.spirit-content').css({'opacity':(-650 + sb)/1000});
})
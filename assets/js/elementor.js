( function ( $, elementor ) {
    "use strict";

    var CraftCog = {

        init: function () {

            var widgets = {
                'tp-maps.default': CraftCog.Map,
                'tp-slider.default': CraftCog.mainSlider,
                'tp-woo-carousel.default': CraftCog.WooCarousel,
                'tp-testimonial.default': CraftCog.testimonialSlider,
                'tp-partner.default': CraftCog.PartnersLogo,
            };

            $.each( widgets, function ( widget, callback ) {
                elementor.hooks.addAction( 'frontend/element_ready/' + widget, callback );
            } );

        },

        Map: function ( $scope ) {

            var $container = $scope.find( '.craftcog-maps' ),
                map,
                init,
                pins;
            if ( !window.google ) {
                return;
            }

            init = $container.data( 'init' );
            pins = $container.data( 'pins' );
            map = new google.maps.Map( $container[0], init );

            if ( pins ) {
                $.each( pins, function ( index, pin ) {

                    var marker,
                        infowindow,
                        pinData = {
                            position: pin.position,
                            map: map
                        };

                    if ( '' !== pin.image ) {
                        pinData.icon = pin.image;
                    }

                    marker = new google.maps.Marker( pinData );

                    if ( '' !== pin.desc ) {
                        infowindow = new google.maps.InfoWindow( {
                            content: pin.desc
                        } );
                    }

                    marker.addListener( 'click', function () {
                        infowindow.open( map, marker );
                    } );

                    if ( 'visible' === pin.state && '' !== pin.desc ) {
                        infowindow.open( map, marker );
                    }

                } );
            }
        },

        /*MAIN SLIDER */
        mainSlider: function ( $scope ) {
            var sliderActive = $scope.find( '.slider-active' );
            if ( !sliderActive.length ) {
                return;
            }
            sliderActive.owlCarousel({
                loop: true,
                nav: true,
                autoplay: false,
                autoplayTimeout: 5000,
                animateOut: 'fadeOut',
                animateIn: 'fadeIn',
                navText: ['<i class="ion-chevron-left"></i>', '<i class="ion-chevron-right"></i>'],
                item: 1,
                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            })
        },

        /* Client carousel */
        WooCarousel: function ( $scope ) {
            var collectionSlider = $scope.find( '.new-collection-slider' );
            if ( !collectionSlider.length ) {
                return;
            }

            collectionSlider.owlCarousel({
                loop: true,
                nav: false,
                autoplay: true,
                autoplayTimeout: 5000,
                animateOut: 'fadeOut',
                animateIn: 'fadeIn',
                item: 1,
                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            })
        },

        /* testimonial active */
        testimonialSlider: function ( $scope ) {
            var testimonialSlide = $scope.find( '.testimonial-active' );
            if ( !testimonialSlide.length ) {
                return;
            }

            testimonialSlide.owlCarousel({
                loop: true,
                autoplay: false,
                autoplayTimeout: 5000,
                navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>'],
                nav: true,
                item: 1,
                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            })
        },

        /* Brand Logo Carousel */
        PartnersLogo: function ( $scope ) {
            var brandLogo = $scope.find( '.brand-logo-active' );
            if ( !brandLogo.length ) {
                return;
            }

            /* testimonial active */
            brandLogo.owlCarousel({
                loop: true,
                autoplay: true,
                autoplayTimeout: 5000,
                nav: false,
                item: 5,
                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 3
                    },
                    1000: {
                        items: 4
                    },
                    1100: {
                        items: 5
                    }
                }
            })
        },


    };

    $( window ).on( 'elementor/frontend/init', CraftCog.init );

}( jQuery, window.elementorFrontend ) );
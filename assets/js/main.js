/**
 * DFB E-commerce Strike Theme - Main JavaScript
 */

(function($) {
    'use strict';
    
    // Document Ready
    $(document).ready(function() {
        // Menu mobile toggle
        $('.menu-toggle').on('click', function() {
            $('#primary-menu').toggleClass('active');
        });
        
        // Animation des éléments au scroll
        if ($('.zeever-animate').length) {
            $(window).on('scroll', function() {
                $('.zeever-animate').each(function() {
                    var elementPos = $(this).offset().top;
                    var topOfWindow = $(window).scrollTop();
                    var windowHeight = $(window).height();
                    var animationPoint = elementPos - windowHeight + 100;
                    
                    if (topOfWindow > animationPoint) {
                        $(this).addClass('zeever-animate-init');
                    }
                });
            });
        }
    });
    
    // WooCommerce specific scripts
    if ($('.woocommerce').length) {
        // Quantité produit +/-
        $(document).on('click', '.quantity-button.plus', function() {
            var input = $(this).siblings('input.qty');
            var val = parseInt(input.val());
            input.val(val + 1).change();
        });
        
        $(document).on('click', '.quantity-button.minus', function() {
            var input = $(this).siblings('input.qty');
            var val = parseInt(input.val());
            if (val > 1) {
                input.val(val - 1).change();
            }
        });
    }
    
})(jQuery);
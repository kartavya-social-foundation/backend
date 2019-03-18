$(document).ready(function() {
    'use strict';
    

    /**
     * Rating form
     */
    $(".input-rating label").hover(function(){
        $(this).siblings("label").toggleClass("hovered");
        $(this).toggleClass("filled");
        $(this).prevAll("label").toggleClass("filled");
    });

    $(".input-rating input").change(function(){
        $(this).siblings().removeClass("marked");
        $(this).prevAll("label").addClass("marked");
    });

    
    
});

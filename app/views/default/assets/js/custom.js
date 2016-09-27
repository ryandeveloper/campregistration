/**
 *	Custom JS
 *
 *	Theme by: www.cutearts.org
 **/
var CURRENT_URL = window.location.href.split('?')[0],
    $SIDEBAR_MENU = $('.main-menu');

// Sidebar
$(document).ready(function() {
    
    // check active menu
    $SIDEBAR_MENU.find('a[href="' + CURRENT_URL + '"]').parent('li').addClass('current-page');

    $SIDEBAR_MENU.find('a').filter(function () {
        return this.href == CURRENT_URL;
    }).parent('li').addClass('current-page active').parents('ul').slideDown(function() {
        
    }).parent('li').addClass('active');

});
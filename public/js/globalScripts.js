// Loading animation:
$('a:not(.dropdown-toggle):not([href*=javascript]):not([href^=#])').click(function() {
    if($(this).attr('href') != undefined) {
        $(".loading").fadeIn("slow");;
    }
});
$(document).ready(function() {
    // Animate loader off screen
    $(".loading").fadeOut("slow");;
});

// Fixed submenu:
$('#navbar-submenu-wrapper').height($("#navbar-submenu").height());
$('#navbar-submenu').affix({
    offset: $('#navbar-submenu').position()
});


// Tooltip:
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})
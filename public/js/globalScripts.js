// Loading animation:
$('a:not(.dropdown-toggle):not([href*=javascript]):not([href^=#])').click(function () {
    if ($(this).attr('href') != undefined) {
        $(".loading").fadeIn("slow");
        ;
    }
});


$(document).ready(function () {
    // Animate loader off screen
    $(".loading").fadeOut("slow");
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


// Responsive submenu with tooltip
$(document).ready(function () {
    var menuitem = [];
    $('#submenu li a').each(function () {
        menuitem[$(this).attr('id')] = $(this).text();
    });

    function responsiveSubmenu() {
        if ($(window).width() < 676) {
            $('#submenu li a').each(function () {
                var icon = $(this).children('span').attr('class');
                $(this).html('<span class="' + icon + '"></span>');
                $(this).tooltip('enable')
            });
        } else {
            $('#submenu li a').each(function () {
                var icon = $(this).children('span').attr('class');
                var text = menuitem[$(this).attr('id')];
                $(this).html('<span class="' + icon + '"></span>' + text);
                $(this).tooltip('disable')
            });
        }
    }

    responsiveSubmenu();

    $(window).resize(function () {
        responsiveSubmenu();
    });
});


// Select all checkbox
$(document).ready(function () {
    $('.panel-heading input[type="checkbox"]').click(function (event) {
        if (this.checked) {
            $('.list-group-item input[type="checkbox"]').each(function () {
                this.checked = true;
            });
        } else {
            $('.list-group-item input[type="checkbox"]').each(function () {
                this.checked = false;
            });
        }
    });
});


// Datetime picker
$('.date').each(function () {
    var id = $(this).attr('id');
    $(function () {
        $('#' + id).datetimepicker({
            locale: 'nb',
            sideBySide: true
        });
    });
});



$('.input-group input, .input-group select').focus(function () {
    var outerInputGroup = $(this).closest('.input-group');
    outerInputGroup.children('.input-group-addon').addClass('focused');
});

$('.input-group input, .input-group select').blur(function () {
    var outerInputGroup = $(this).closest('.input-group');
    outerInputGroup.children('.input-group-addon').removeClass('focused');
});

$('.form-group input, .form-group textarea').focus(function () {
    var outerFormGroup = $(this).closest('.form-group');
    outerFormGroup.find('label').addClass('focused');
});

$('.form-group input, .form-group textarea').blur(function () {
    var outerFormGroup = $(this).closest('.form-group');
    outerFormGroup.find('label').removeClass('focused');

});

$(document.body).on('click', '.bekreft-slett', function(event){

    if (!confirm('Bekreft sletting')) event.preventDefault();

});

$(document.body).on('click', '.ikke-implementert', function(event){

    event.preventDefault();
    alert('Funksjonen er ikke implementert i denne demo-versjonen')


});

$('.flash').delay(3000).fadeOut(300);
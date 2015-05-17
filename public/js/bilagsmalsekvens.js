/*$('.slett-bilag').click(function(){
 var bilagsId = $(this).closest('.panel').attr('id');
 console.log(bilagsId);
 // $('#' + bilagsId).children('.alert').show();
 });

 $('.bekreft-slett-bilag').click(function(){
 alert('Slett ' + $(this).closest('.panel').text() + '?');
 $(this).closest('.panel').remove();
 }); */

// Viser og skjuler variabel tekster basert på checkboxer
$('input[type="checkbox"]').click(function () {
    var idName = $(this).attr("value");
    $("#" + idName).toggle();
});

beregnReultat();
hentVerdier();


function standariserVerdier(verdi) {
    verdi = verdi.replace(/\s+/g, '');
    verdi = verdi.replace(',', '.');
    if (parseFloat(verdi) != '' && parseFloat(verdi) != null) {
        verdi = parseFloat(verdi);
    } else {
        verdi = 0.00;
    }
    return verdi;
}

function formaterVerdier(number)
{
    number = parseFloat(number).toFixed(2);
    var x = number.split('.');
    var x1 = x[0];
    var x2 = x.length > 1 ? ',' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ' ' + '$2');
    }
    return x1 + x2;
}

function avrundVerdier(verdi) {
    verdi = parseFloat(Math.round(verdi * 100) / 100).toFixed(2);
    return verdi;
}

function hentVerdier() {
    // Henter ut verdier fra tekstfelt
    var aMaks = standariserVerdier($('#aMaks').val());
    var aMin = standariserVerdier($('#aMin').val());
    var bMaks = standariserVerdier($('#bMaks').val());
    var bMin = standariserVerdier($('#bMin').val());
    var xMaks = standariserVerdier($('#xMaks').val());
    var xMin = standariserVerdier($('#xMin').val());
    var aSnitt = avrundVerdier((aMin + aMaks) / 2);
    var bSnitt = avrundVerdier((bMin + bMaks) / 2);
    var xSnitt = avrundVerdier((xMin + xMaks) / 2);
    var motpart = $('#motpart').val();

    $(".motpartEksempel").text(motpart);
    $('.formel1belopEksempel').text(formaterVerdier(aSnitt));
    $('.formel4belopEksempel').text(formaterVerdier(bSnitt));
    $('.formel13belopEksempel').text(formaterVerdier(aSnitt - bSnitt));

    // Henter ut verdier fra kontolister
    $('select.kontoliste').each(function () {
        if ('input[type="select"]') {
            var idName = $(this).attr("id");
            var str = $(this).find('option:selected').text();
            $("#" + idName + "Vis").text(str);
        }
    });

    $('input.variabel').each(function () {
        genererRadiobuttonTekst($(this));
    });


    $('select.formelliste').each(function () {
        if ('input[type="select"]') {
            var idName = $(this).attr("id");
            var str = $(this).find('option:selected').text();
            $("#" + idName + "Vis").text(str);

            var formelnr = $(this).val();
            var verdia = aSnitt;
            var verdib = bSnitt;
            var verdix = xSnitt;
            var idBilag = $(this).closest(".panel-collapse").attr("id");
            var sumBilag = 0;

            var resultat = brukFormel(formelnr, verdia, verdib, verdix);

            $("#" + idName + "ResultatVis").text(avrundVerdier(resultat));
            $('.' + idBilag + '-formel').each(function () {
                if (parseFloat($(this).text()) != '') {
                    sumBilag += parseFloat(avrundVerdier($(this).text()));
                } else {
                    sumBilag += 0;
                }
            });
            $("#" + idBilag + "Resultat").text(formaterVerdier(avrundVerdier(sumBilag)));
        }
    });
}

function beregnReultat() {

    $("#bilagsmaler").find('.bilag').each(function () {
        var idBilag = $(this).attr('id');
        var sumBilag = 0;
        $("#" + idBilag + " div.radio input").each(function () {
            if ($(this).is(":checked")) {
                var navn = $(this).attr('id');
                $('#' + idBilag + 'belopEksempel').attr('class', navn + 'belopEksempel');
                var verdi = $("#" + idBilag + " ." + navn + "Eksempel").text();
                $("#" + idBilag + " .bruttobelopEksempel").text(formaterVerdier(avrundVerdier(verdi)));
            }
        });
        $('.' + idBilag + '-formel').each(function () {
            if (standariserVerdier($(this).text()) != '') {
                sumBilag += standariserVerdier($(this).text());
            } else {
                sumBilag += 0;
            }
        });
        $("#" + idBilag + "Resultat").text(formaterVerdier(avrundVerdier(sumBilag)));
    });
}

// Oppdater valgt bilagsformel
$("input[type=radio]").change(function () {
    beregnReultat();
    hentVerdier();
});


// Oppdaterer radio tekst fra inputfelt med variabler
$('input.variabel').keyup(function () {
    hentVerdier();
    genererRadiobuttonTekst($(this));
});

function genererRadiobuttonTekst(element) {
    var inputId = element.attr('id');
    var inputText = element.val();
    $('.' + inputId + 'Eksempel').text(inputText);


}


// Oppdaterer bilagstittel
$('#motpart').keyup(function () {
    $(".motpartEksempel").text($(this).val());
});


// Oppdaterer bilagstittel
$('input.bilagstittel').keyup(function () {
    var idTittel = $(this).attr('id');
    $("#" + idTittel + "HeadingVis").text($(this).val());
    $("#" + idTittel + "Vis").text($(this).val());
});

// Oppdaterer infotekst
$('textarea.bilagstekst').keyup(function () {
    var idTittel = $(this).attr('id');
    $("#" + idTittel + "Vis").text($(this).val());
});


// Legge til valgt konto i vis bilag
$('#bilagsmaler').on('change', 'select.kontoliste', (function (e) {
    e.preventDefault();
    if ('input[type="select"]') {
        var idName = $(this).attr("id");
        var str = $(this).find('option:selected').text();
        $("#" + idName + "Vis").text(str);
    }
    beregnReultat()
}));


// Legg til valgt formel i vis bilag
$("#bilagsmaler").on('change', 'select.formelliste', (function (e) {
    e.preventDefault();
    hentVerdier();
}));

function brukFormel(formelNr, a, b, x) {
    if (formelNr == 1)
        return a;
    else if (formelNr == 2)
        return a / 5;
    else if (formelNr == 3)
        return a / 1.25;
    else if (formelNr == 4)
        return b;
    else if (formelNr == 5)
        return b / 5;
    else if (formelNr == 6)
        return b / 1.25;
    else if (formelNr == 7)
        return 0 - a;
    else if (formelNr == 8)
        return 0 - a / 5;
    else if (formelNr == 9)
        return 0 - a / 1.25;
    else if (formelNr == 10)
        return 0 - b;
    else if (formelNr == 11)
        return 0 - b / 5;
    else if (formelNr == 12)
        return 0 - b / 1.25;
    else if (formelNr == 13)
        return a - b;
    else if (formelNr == 14)
        return (a - b) * (x / 100);
    else if (formelNr == 15)
        return (a - b) * (x / 100) / 5;
    else if (formelNr == 16)
        return (a - b) * ( x / 100) / 1.25;
    else if (formelNr == 17)
        return (a - b) * (100 - x) / 100;
    else if (formelNr == 18)
        return 0 - (a - b) * (x / 100);
    else if (formelNr == 19)
        return 0 - (a - b) * (x / 100) / 5;
    else if (formelNr == 20)
        return 0 - (a - b) * (x / 100) / 1.25;
    else if (formelNr == 21)
        return 0 - (a - b) * (100 - x) / 100;
    else
        return 0;
};
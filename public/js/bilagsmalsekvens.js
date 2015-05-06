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

hentVerdier()

function hentVerdier() {
    // Henter ut verdier fra tekstfelt
    var aMaks = parseInt($('#aMaks').val());
    var aMin = parseInt($('#aMin').val());
    var bMaks = parseInt($('#bMaks').val());
    var bMin = parseInt($('#bMin').val());
    var xMaks = parseInt($('#xMaks').val());
    var xMin = parseInt($('#xMin').val());
    var aSnitt = (aMin + aMaks) / 2;
    var bSnitt = (bMin + bMaks) / 2;
    var xSnitt = (xMin + xMaks) / 2;

    // Henter ut verdier fra kontolister
    $('select.kontoliste').each(function () {
        if ('input[type="select"]') {
            var idName = $(this).attr("id");
            var str = $(this).find('option:selected').text();
            $("#" + idName + "Vis").text(str);
        }
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

            $("#" + idName + "ResultatVis").text(resultat);
            $('.' + idBilag + '-formel').each(function () {
                if (parseFloat($(this).text()) != '') {
                    sumBilag += parseFloat($(this).text());
                } else {
                    sumBilag += 0;
                }
            });
            $("#" + idBilag + "Resultat").text(sumBilag);

        }
    });

    $('.bilag').each(function () {
        var idBilag = $(this).attr('id');
        var sumBilag = 0;
        $('.' + idBilag + '-formel').each(function () {
            if (parseFloat($(this).text()) != '') {
                sumBilag += parseFloat($(this).text());
            } else {
                sumBilag += 0;
            }
        });
        $("#" + idBilag + "Resultat").text(sumBilag);
    });

}


// Oppdaterer checkbox tekst fra inputfelt med variabler
$('input.variabel').keyup(function () {

    hentVerdier();
    var idName = $(this).attr("id");
    var str = $(this).val();

    if (idName == 'aMaks') {
        aMaks = parseInt(str)
    }
    if (idName == 'aMin') {
        aMin = parseInt(str)
    }
    if (idName == 'bMaks') {
        bMaks = parseInt(str)
    }
    if (idName == 'bMin') {
        bMin = parseInt(str)
    }
    if (idName == 'xMaks') {
        xMaks = parseInt(str)
    }
    if (idName == 'xMin') {
        xMin = parseInt(str)
    }

    if (idName == 'aMaks' || idName == 'aMin') {
        aSnitt = (aMaks + aMin) / 2;
        $('.aEksempel').text(aSnitt);
    } else if (idName == 'bMaks' || idName == 'bMin') {
        bSnitt = (bMaks + bMin) / 2;
        $('.bEksempel').text(bSnitt);
    } else if (idName == 'xMaks' || idName == 'xMin') {
        xSnitt = (xMaks + xMin) / 2;
        $('.xEksempel').text(xSnitt);
    } else {
        $('.' + idName + 'Eksempel').text(str);
    }
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
}));


// Legg til valgt formel i vis bilag
$("#bilagsmaler").on('change', 'select.formelliste', (function (e) {
    e.preventDefault();
    hentVerdier();
}));

function brukFormel($formelNr, $verdi1, $verdi2, $verdi3) {
    if ($formelNr == 1) {
        return 0 - $verdi1;
    } else if ($formelNr == 2) {
        return $verdi1 / 5;
    } else if ($formelNr == 3) {
        return $verdi1 / 1.25;
    } else if ($formelNr == 4) {
        return ($verdi1 - $verdi2) * (100 - $verdi3);
    } else if ($formelNr == 5) {
        return 0 - ($verdi1 - $verdi2) * (100 - $verdi3);
    } else if ($formelNr == 6) {
        return $verdi3 / 5;
    } else if ($formelNr == 7) {
        return $verdi3 / 1.25;
    }
}
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
    var motpart = $('#motpart').val();

    $(".motpartEksempel").text(motpart);
    $('.formel8belopEksempel').text(aSnitt);
    $('.formel9belopEksempel').text(bSnitt);
    $('.formel10belopEksempel').text(aSnitt - bSnitt);

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
}

function beregnReultat() {

    $("#bilagsmaler").find('.bilag').each(function () {
        console.log('fant');
        var idBilag = $(this).attr('id');
        var sumBilag = 0;
        $("#" + idBilag + " div.radio input").each(function () {
            if ($(this).is(":checked")) {
                var navn = $(this).attr('id');
                $('#' + idBilag + 'belopEksempel').attr('class', navn + 'belopEksempel');
                var verdi = $("#" + idBilag + " ." + navn + "Eksempel").text();
                $("#" + idBilag + " .bruttobelopEksempel").text(verdi);
            }
        });
        $('.' + idBilag + '-formel').each(function () {
            if (parseFloat($(this).text()) != '') {
                sumBilag += parseFloat($(this).text());
            } else {
                sumBilag += 0;
            }
        });
        $("#" + idBilag + "Resultat").text(sumBilag);
        console.log(sumBilag);
    });
}

// Oppdater valgt bilagsformel
$("input[type=radio]").change(function () {
    beregnReultat();
    hentVerdier();
});


// Oppdaterer radio tekst fra inputfelt med variabler
$('input.variabel').keyup(function () {
    genererRadiobuttonTekst($(this));
});

function genererRadiobuttonTekst (element) {
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

function brukFormel($formelNr, $verdi1, $verdi2, $verdi3) {
    if ($formelNr == 1) {
        return 0 - $verdi1;
    } else if ($formelNr == 2) {
        return $verdi1 / 5;
    } else if ($formelNr == 3) {
        return $verdi1 / 1.25;
    } else if ($formelNr == 4) {
        return ($verdi1 - $verdi2) * (1 - ($verdi3 / 100));
    } else if ($formelNr == 5) {
        return 0 - ($verdi1 - $verdi2) * (1 - ($verdi3 / 100));
    } else if ($formelNr == 6) {
        return $verdi3 / 5;
    } else if ($formelNr == 7) {
        return $verdi3 / 1.25;
    }
}
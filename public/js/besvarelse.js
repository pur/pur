function skrivebeskytt() {
    var korrektPostering = ('.postering.korrekt');
    $(korrektPostering + ' input').attr('disabled', 'disabled');
    $(korrektPostering + ' select').attr('disabled', 'disabled');
    $(korrektPostering + ' button').attr('disabled', 'disabled');
}

function avrundVerdier(verdi) {
    verdi = parseFloat(Math.round(verdi * 100) / 100).toFixed(2);
    return verdi;
}

function formaterVerdier(number)
{
    number = parseFloat(number).toFixed(2);
    console.log(number);
    var x = number.split('.');
    var x1 = x[0];
    var x2 = x.length > 1 ? ',' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ' ' + '$2');
    }
    return x1 + x2;
}

function beregnReultat() {
    var sumBilag = 0.00;
    var idBilag = $('.tab-content .bilag.active').attr('id');

    $('.tab-content').find('.' + idBilag + '-belop').each(function () {
        var verdi = $(this).val();
        if ($(this).val() == null || $(this).val() == '') verdi = '0';
        verdi = verdi.replace(/\s+/g, '');
        verdi = verdi.replace(',', '.');
        console.log(verdi);
        if (parseFloat(verdi) != '' && parseFloat(verdi) != null) {
            sumBilag += parseFloat(verdi);
        } else {
            sumBilag += 0.00;
        }
        $("#" + idBilag + "-kontrollsum").text(formaterVerdier(avrundVerdier(sumBilag)));
        if (sumBilag == 0) {
            $("#" + idBilag + "-kontrollsum").addClass('text-success');
            $("#" + idBilag + "-kontrollsum").removeClass('text-danger');
        }
        else {
            $("#" + idBilag + "-kontrollsum").addClass('text-danger');
            $("#" + idBilag + "-kontrollsum").removeClass('text-success');
        }
    });
}


$('.tab-content').on('keyup', 'input', function () {
    beregnReultat();
});

$('.tab-content').on('click', 'button', function () {
    beregnReultat();
});

$(document).ready(function () {
    beregnReultat();
    skrivebeskytt();
});

$('.tab-content').on('keydown', '.postering.feil input', function () {
    $(this).closest('.postering').removeClass('feil');
})

$('.tab-content').on('change', '.postering.feil select', function () {
    $(this).closest('.postering').removeClass('feil');
})
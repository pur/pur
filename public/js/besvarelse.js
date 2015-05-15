function skrivebeskytt() {
    var korrektPostering = ('.postering.korrekt');
    $(korrektPostering + ' input').attr('disabled', 'disabled');
    $(korrektPostering + ' select').attr('disabled', 'disabled');
    $(korrektPostering + ' button').attr('disabled', 'disabled');
}

function avrundVerdier(verdi){
    verdi = parseFloat(Math.round(verdi * 100) / 100).toFixed(2);
    return verdi;
}

function beregnReultat() {
    var sumBilag = 0.00;
    var idBilag = $('.tab-content .bilag.active').attr('id');

    $('.tab-content').find('.' + idBilag + '-belop').each(function () {
        var verdi = $(this).val();
        if ($(this).val() == null || $(this).val() == '') verdi = 0;
        verdi = verdi.replace(/\s+/g, '');
        verdi = verdi.replace(',', '.');
        console.log(verdi);
        if (parseFloat(verdi) != '' && parseFloat(verdi) != null) {
            sumBilag += parseFloat(verdi);
        } else {
            sumBilag += 0.00;
        }
        $("#" + idBilag + "-kontrollsum").text(avrundVerdier(sumBilag));
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
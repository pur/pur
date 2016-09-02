function skrivebeskytt() {
    var korrektPostering = ('.postering.korrekt');
    $(korrektPostering + ' input').attr('readonly', 'readonly');
    $(korrektPostering + ' select').attr('disabled', 'disabled');
    $(korrektPostering + ' button.oppdater-knapp').attr('disabled', 'disabled');
}

function avrundVerdier(verdi) {
    verdi = parseFloat(Math.round(verdi * 100) / 100).toFixed(2);
    return verdi;
}

function formaterVerdier(number) {
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

function beregnReultat() {
    var sumBilag = 0.00;
    var idBilag = $('.tab-content .bilag.active').attr('id');

    $('.tab-content').find('.' + idBilag + '-belop').each(function () {
        var verdi = $(this).val();
        if ($(this).val() == null || $(this).val() == '') verdi = '0';
        verdi = verdi.replace(/\s+/g, '');
        verdi = verdi.replace(',', '.');
        verdi = verdi.replace('–', '-');
        verdi = parseFloat(verdi);
        if (verdi != '' && verdi != null) {
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

$('body').on('click', 'button.calculator-use', function () {
    $(this).closest('.postering').removeClass('feil');
    beregnReultat();
});

$("input").bind("change paste keyup", function () {
    $(this).closest('.postering').removeClass('feil');
});

$('input').click(function () {
    var verdi = $(this).val();
    var inputId = $(this).attr('id');
    setInterval(function () {
        var nyVerdi = $('#' + inputId).val();
        if (verdi != nyVerdi) {
            $('#' + inputId).closest('.postering').removeClass('feil');
            verdi = nyVerdi;
        }
    }, 1500);
});

$('input').change(function () {
    $(this).closest('.postering').removeClass('feil');
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
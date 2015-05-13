function beregnReultat() {
    var sumBilag = 0.00;
    var idBilag = $('.tab-content .bilag.active').attr('id');
    $('.tab-content').find('.' + idBilag + '-belop').each(function () {
        var verdi = $(this).val();
        verdi = verdi.replace(/\s+/g, '');
        verdi = verdi.replace(',', '.');
        if (parseFloat(verdi) != '' && parseFloat(verdi) != null) {
            sumBilag += parseFloat(verdi);
        } else {
            sumBilag += 0.00;
        }
        $("#" + idBilag + "-kontrollsum").text(sumBilag);
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
});
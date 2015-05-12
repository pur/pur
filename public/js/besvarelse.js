function beregnReultat() {
    var sumBilag = 0.00;
    var idBilag = $('.tab-content .bilag.active').attr('id');
    console.log(idBilag);
    $('.tab-content').find('.' + idBilag + '-belop').each(function () {
        if (parseFloat($(this).text()) != '' && parseFloat($(this).text()) != null) {
            sumBilag += parseFloat($(this).val());
        } else {
            sumBilag += 0.00;
        }
        $("#" + idBilag + "-kontrollsum").text(sumBilag);
        console.log(sumBilag);
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
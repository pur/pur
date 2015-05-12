function beregnReultat() {
    var sumBilag = 0;
    var idBilag = $('.tab-content .bilag.active').attr('id');
    console.log(idBilag);
    $('.' + idBilag + '-belop').each(function () {

        if (parseFloat($(this).text()) != '') {
            sumBilag += parseFloat($(this).val());
        } else {
            sumBilag += 0;
        }

        $("#" + idBilag + "-kontrollsum").text(sumBilag);
        console.log(sumBilag);
    });
}


$('input').keyup(function () {
    beregnReultat();
});
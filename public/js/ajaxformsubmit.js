(function () {

    $('form[submit-async]').focusout(function (e) {

        var form = $(this);
        var type = form.find('input[name="_method"]').val() || 'POST';
        var url = form.prop('action');
        var data = form.serialize();
        var successelement = form.children('.ajax-success');

        $.ajax({
            type: type,
            url: url,
            data: data,
            success: function () {
                successelement.css('visibility', 'visible');
            }
        });

        e.preventDefault();
    });

})();

(function () {

    $('form[slett-asynk]').submit(function (e) {

        confirm('Vil du slette posteringen?');

        var form = $(this);
        var type = form.find('input[name="_method"]').val() || 'POST';
        var url = form.prop('action');
        var data = form.serialize();

        $.ajax({
            type: type,
            url: url,
            data: data,
            success: function () {
                form.closest('.postering').remove(); // TODO : Html-elementet som skal fjernes bør ha css-klassen 'postering' så det kan stå closest(.postering).remove() i stedet for closest(.row).remove(). Den klassen som nå heter 'postering' omslutter flere posteringer og bør hete 'posteringer'
            }
        });

        e.preventDefault();
    });

})();

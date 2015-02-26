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

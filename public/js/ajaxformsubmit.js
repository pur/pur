(function () {

    $('#bilagsmaler').on('change', 'form[submit-async]', function (e) {

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

    $('#bilagsmaler').on('submit', 'form[slett-asynk]', function (e) {

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
                form.closest('.postering').remove();
            }
        });

        e.preventDefault();
    });

})();

(function () {

    $('form[leggtil-asynk]').submit(function (e) {

        var form = $(this);
        var bilagsmalId = form.find('input[name="bilagsmalId"]').val();

        if (bilagsmalId === null) {
            console.error('Mangler bilagsmalId. Kunne ikke opprette ny posteringsmal.');
            return;
        }

        var tomMal = $($('#tomposteringsmal-' + bilagsmalId).children()[0]).clone();
        var liste = $('#posteringsmaler-' + bilagsmalId);
        var url = form.prop('action');

        $.ajax({
            type: 'POST',
            url: url,
            data: form.serialize(),
            success: function (response) {
                console.log('Creating new posteringsmal');
                console.log(response);
                var forms = tomMal.find('form');
                for (var i = 0; i < forms.length; i++) {
                    $(forms[i]).attr('action', form.attr('action') + "/" + response);
                }
                liste.append(tomMal);
            },
            error: function (response) {
                console.log('Creation failed');
                console.log(response);
            }
        });

        tomMal.removeClass('hidden');

        e.preventDefault();
    });

})();


(function () {

    $('form[slett-malrad]').submit(function (e) {

        confirm('Vil du slette posteringen?');

        $(this).closest('.postering').remove();

        e.preventDefault();
    });

})();

$('form').on('submit', function (event) {
    console.log("got submit event");
    console.log(event);
}).on('submit', 'form[slett-asynk]', function (event) {
    console.log("got submit event for form[slett-asynk]");
    console.log(event);
});

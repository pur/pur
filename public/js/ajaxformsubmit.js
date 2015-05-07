// TODO: Lag funksjonene generelle, så de kan brukes av både bilagsmaler og bilag

// Bilagsmaler:

(function () {

    $('#bilagsmaler').on('change', 'form[submit-async]', function (e) {

        var form = $(this);
        var type = form.find('input[name="_method"]').val() || 'POST';
        var url = form.prop('action');
        var data = form.serialize();
        var successelement = $('#ajax-success');

        $.ajax({
            type: type,
            url: url,
            data: data,
            success: function () {
                successelement.fadeIn(500);
                successelement.delay(3000).fadeOut(500);
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
        var tomVis = $($('#tomposteringsmal-' + bilagsmalId + 'Vis').children()[0]).clone();

        var liste = $('#posteringsmaler-' + bilagsmalId);
        var listeVis = $('#visBilag' + bilagsmalId + ' .postering');
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
                    $(forms[i]).find('select.kontoliste').attr('id', 'kontokode-' + response);
                    $(forms[i]).find('select.formelliste').attr('id', 'formel-' + response);
                }
                var posteringVis = tomVis.find('.posteringVis');
                for (var i = 0; i < posteringVis.length; i++) {
                    $(posteringVis[i]).find('span.kontokodeVis').attr('id', 'kontokode-' + response + 'Vis');
                    $(posteringVis[i]).find('span.formelVis').attr('id', 'formel-' + response + 'Vis');
                    $(posteringVis[i]).find('span.belopVis').attr('id', 'formel-' + response + 'ResultatVis');
                    $(posteringVis[i]).find('span.belopVis').addClass('bilag' + response + '-formel');

                    console.log('bilag' + response + '-formel');
                }

                liste.append(tomMal);
                listeVis.append(tomVis);

            },
            error: function (response) {
                console.log('Creation failed');
                console.log(response);
            }
        });

        tomMal.removeClass('hidden');
        tomVis.removeClass('hidden');
        hentVerdier();

        e.preventDefault();
    });

})();

// Bilag:

(function () {

    $('#bilagsgruppe').on('focusout', 'form[submit-async]', function (e) {

        var form = $(this);
        var type = form.find('input[name="_method"]').val() || 'POST';
        var url = form.prop('action');
        var data = form.serialize();
        var successelement = $('#ajax-success');

        $.ajax({
            type: type,
            url: url,
            data: data,
            success: function (serverActionOk) {
                if (serverActionOk == 'true') {
                    successelement.fadeIn(500);
                    successelement.delay(3000).fadeOut(500);
                }
            }
        });

        e.preventDefault();
    });

})();

(function () {

    $('#bilagsgruppe').on('submit', 'form[slett-asynk]', function (e) {

        confirm('Vil du slette posteringen?');

        var form = $(this);
        var type = form.find('input[name="_method"]').val() || 'POST';
        var url = form.prop('action');
        var data = form.serialize();

        $.ajax({
            type: type,
            url: url,
            data: data,
            success: function (serverActionOk) {
                if (serverActionOk == 'true') form.closest('.postering').remove();
            }
        });

        e.preventDefault();
    });

})();
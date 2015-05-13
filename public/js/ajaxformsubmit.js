// Forhindre ordinær synkron submit av skjema ved trykk på enter:
$(document).ready(function () {
    $(window).keydown(function (event) {
        if (event.keyCode == 13) {
            event.preventDefault();
            return false; // TODO: submit skjema tilsv. onfocusout her?
        }
    });
});

// TODO: Lag funksjonene generelle, så de kan brukes av både bilagsmaler og bilag

// Bilagsmaler:

(function () {

    $('#bilagsmaler').on('focusout', 'form[oppdater-asynk]', function (event) {

        event.preventDefault();
        var form = $(this);
        var postering = form.closest('.postering');
        //postering.css('background-color', '#ffffbb');
        var type = form.find('input[name="_method"]').val() || 'POST';
        var url = form.prop('action');
        var data = form.serialize();
        var successelement = $('#ajax-success');


        $.ajax({
            type: type,
            url: url,
            data: data,
            success: function () {
                successelement.find('.ajax-success-text').text('Lagrer..');
                postering.removeAttr('style');
                postering.addClass('lagres');
                successelement.addClass('saving');
                successelement.fadeIn(500);
                setTimeout(function () {
                    successelement.removeClass('saving');
                    postering.removeClass('lagres');
                    successelement.find('.ajax-success-text').text('Lagret');
                }, 2000);
            }
        });

        e.preventDefault();
    });

})();


(function () {

    $('#bilagsmaler').on('submit', 'form[slett-asynk]', function (event) {
        event.preventDefault();
        if (!confirm('Vil du slette posteringen?')) return;
        var form = $(this);
        var type = form.find('input[name="_method"]').val() || 'POST';
        var url = form.prop('action');
        var data = form.serialize();
        var posteringId = form.find('button').attr('id');
        $('#' + posteringId).tooltip('hide');

        $.ajax({
            type: type,
            url: url,
            data: data,
            success: function () {
                $('#' + posteringId + 'Vis').remove();
                form.closest('.postering').remove();
            }
        });
    });
})();


(function () {

    $('form[opprett-mal-asynk]').submit(function (event) {

        event.preventDefault();

        var form = $(this);
        var bilagsmalId = form.find('input[name="bilagsmalId"]').val();

        if (bilagsmalId === null) {
            console.error('Mangler bilagsmalId. Kunne ikke opprette ny posteringsmal.');
            return;
        }

        var tomMal = $($('#tomposteringsmal-' + bilagsmalId).children()[0]).clone();
        var tomVis = $($('#tomposteringsmal-' + bilagsmalId + 'Vis').children()[0]).clone();


        var liste = $('#posteringsmaler-' + bilagsmalId);
        var listeVis = $('#visBilag' + bilagsmalId + ' .visPosteringer');
        var url = form.prop('action');

        $.ajax({
            type: 'POST',
            url: url,
            data: form.serialize(),
            success: function (response) {
                var forms = tomMal.find('form');
                var formButtons = tomMal.find('.action-buttons');


                for (var i = 0; i < forms.length; i++) {
                    $(forms[i]).attr('action', form.attr('action') + "/" + response);
                    $(forms[i]).find('select.kontoliste').attr('id', 'kontokode-' + response);
                    $(forms[i]).find('select.formelliste').attr('id', 'formel-' + response);
                }
                for (var i = 0; i < formButtons.length; i++) {
                    $(formButtons[i]).find('button').attr('id', 'posteringsmal-' + response);
                }

                var posteringVis = tomVis.find('.posteringVis');
                for (var i = 0; i < posteringVis.length; i++) {
                    $(posteringVis[i]).closest('.list-group-item').attr('id', 'posteringsmal-' + response + 'Vis');
                    $(posteringVis[i]).closest('.list-group-item').attr('id', 'posteringsmal-' + response + 'Vis');
                    $(posteringVis[i]).find('span.kontokodeVis').attr('id', 'kontokode-' + response + 'Vis');
                    $(posteringVis[i]).find('span.formelVis').attr('id', 'formel-' + response + 'Vis');
                    $(posteringVis[i]).find('span.belopVis').attr('id', 'formel-' + response + 'ResultatVis');
                    $(posteringVis[i]).find('span.belopVis').addClass('bilag' + bilagsmalId + '-formel');
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

    });

})();


// Bilag:

function submitPosteringsForm(posteringsID) {
    $('#posteringsform-'+posteringsID).submit();
}

(function () {

    $('#bilagsgruppe').on('submit', 'form[oppdater-asynk]', function (event) {

        event.preventDefault();

        var form = $(this);

        var postering = form.closest('.postering');
        postering.removeClass('korrekt').removeClass('feil').addClass('lagres');

        var type = form.find('input[name="_method"]').val() || 'POST';
        var url = form.prop('action');
        var data = form.serialize();
        var successelement = $('#ajax-success');

        $.ajax({
            type: type,
            url: url,
            data: data,
            success: function (response) {
                if (response.lagretOk) {
                    successelement.fadeIn(500);
                    successelement.delay(3000).fadeOut(500);
                    postering.removeClass('lagres');
                    if (response.postering.erKorrekt)
                        postering.addClass('korrekt');
                    else postering.addClass('feil');
                }
            }
        });

    });

})();

(function () {

    $('#bilagsgruppe').on('submit', 'form[slett-asynk]', function (event) {

        event.preventDefault();

        if (!confirm('Vil du slette posteringen?')) return;

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

    });

})();


(function () {

    $('form[opprett-asynk]').submit(function (event) {

        event.preventDefault();

        var form = $(this);
        var bilagsId = form.find('input[name="bilagsId"]').val();

        if (bilagsId === null) {
            console.error('Mangler bilagsId. Kunne ikke opprette ny postering.');
            return;
        }

        var tomPostering = $($('#tompostering-' + bilagsId).children()[0]).clone();

        var liste = $('#posteringer-' + bilagsId);

        var url = form.prop('action');

        $.ajax({
            type: 'POST',
            url: url,
            data: form.serialize(),
            success: function (response) {
                console.log('Oppretter ny postering');
                console.log(response);
                var forms = tomPostering.find('form');
                for (var i = 0; i < forms.length; i++) {
                    $(forms[i]).attr('action', form.attr('action') + "/" + response);
                }
                liste.append(tomPostering);
            },
            error: function (response) {
                console.log('Opprettelse feilet');
                console.log(response);
            }
        });

        tomPostering.removeClass('hidden');

    });

})();
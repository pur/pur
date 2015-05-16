// Forhindre ordinær synkron submit av skjema ved trykk på enter:
$(document).ready(function () {
    $(window).keydown(function (event) {
        if (event.keyCode == 13) {
            event.preventDefault();
            return false; // TODO: submit skjema tilsv. onfocusout her?
        }
    });
});

function skrivebeskytt() {
    var korrektPostering = ('.postering.korrekt');
    $(korrektPostering + ' input').attr('disabled', 'disabled');
    $(korrektPostering + ' select').attr('disabled', 'disabled');
    $(korrektPostering + ' button').attr('disabled', 'disabled');
}

// TODO: Lag funksjonene generelle, så de kan brukes av både bilagsmaler og bilag


function visBehandling(behandlingsElement, behandlingsTekst) {
    var menyanimasjon = $('.flash');
    var menyanimasjonTekst = menyanimasjon.find('p');
    menyanimasjonTekst.text(behandlingsTekst);
    menyanimasjon.show();
}

function visBehandlingsResultat(behandlingsElement, behandlingsTekst) {
    var menyanimasjon = $('.flash');
    var menyanimasjonTekst = menyanimasjon.find('p');
    menyanimasjonTekst.text(behandlingsTekst);
    menyanimasjon.delay(3000).fadeOut(1000);
};

// Bilagsmaler:

(function () {

    $('#bilagsmaler').on('focusout', 'form[oppdater-asynk]', function (event) {

        event.preventDefault();
        var form = $(this);
        var postering = form.closest('.postering');
        var type = form.find('input[name="_method"]').val() || 'POST';
        var url = form.prop('action');
        var data = form.serialize();
        visBehandling(postering, 'Lagrer');

        $.ajax({
            type: type,
            url: url,
            data: data,
            success: function () {
                visBehandlingsResultat(postering, 'Lagret');
            }
        });
        e.preventDefault();
    });

})();


(function () {

    $('#bilagsmaler').on('submit', 'form[slett-asynk]', function (event) {
        event.preventDefault();

        var form = $(this);
        var type = form.find('input[name="_method"]').val() || 'POST';
        var url = form.prop('action');
        var data = form.serialize();
        var posteringId = form.find('button').attr('id');
        $('#' + posteringId).tooltip('hide');
        visBehandling(null, 'Sletter posteringsmal');


        $.ajax({
            type: type,
            url: url,
            data: data,
            success: function () {
                $('#' + posteringId + 'Vis').remove();
                form.closest('.postering').remove();
                visBehandlingsResultat(null, 'Posteringsmal slettet');
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
        visBehandling(null, 'Oppretter posteringsmal');

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
                visBehandlingsResultat(null, 'Posteringsmal opprettet');

            },
            error: function (response) {
                console.log('Creation failed');
                console.log(response);
                visBehandlingsResultat(null, 'Posteringsmal kunne ikke opprettes');
            }
        });

        tomMal.removeClass('hidden');
        tomVis.removeClass('hidden');
        hentVerdier();

    });

})();


// Bilag:

(function () {
    $('#bilagsgruppe').on('click', '.oppdater-knapp', function () {
        var posteringsId = $(this).attr('posterings-id');
        var form = $('#posteringsform-' + posteringsId);
        var postering = form.closest('.postering');
        postering.removeClass('korrekt').removeClass('feil').addClass('lagres');
        var type = form.find('input[name="_method"]').val() || 'POST';
        var url = form.prop('action');
        var data = form.serialize();
        visBehandling(postering, 'Sjekker postering');


        $.ajax({
            type: type,
            url: url,
            data: data,
            success: function (response) {
                if (response.lagretOk) {
                    if (response.postering.erKorrekt) {
                        visBehandlingsResultat(postering, 'Postering er korrekt');
                        postering.addClass('korrekt');
                        skrivebeskytt();
                    }

                    else {
                        visBehandlingsResultat(postering, 'Postering er ikke korrekt');
                        postering.addClass('feil');
                    }
                }
            }
        });

    });

})();

(function () {

    $('#bilagsgruppe').on('submit', 'form[slett-asynk]', function (event) {

        event.preventDefault();

        var form = $(this);
        var type = form.find('input[name="_method"]').val() || 'POST';
        var url = form.prop('action');
        var data = form.serialize();
        $('button').tooltip('hide');
        visBehandling(null, 'Sletter postering');

        $.ajax({
            type: type,
            url: url,
            data: data,
            success: function (serverActionOk) {
                if (serverActionOk == 'true') {
                    visBehandlingsResultat(null, 'Postering er slettet');
                    form.closest('.postering').remove();
                }
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
        visBehandling(null, 'Oppretter postering');

        $.ajax({
            type: 'POST',
            url: url,
            data: form.serialize(),
            success: function (posteringsId) {
                var forms = tomPostering.find('form');
                for (var i = 0; i < forms.length; i++) {
                    $(forms[i]).attr('action', form.attr('action') + "/" + posteringsId);
                }
                tomPostering.find('.oppdater-knapp').attr('posterings-id', posteringsId);
                tomPostering.find('form[oppdater-asynk]').attr('id', 'posteringsform-' + posteringsId);
                liste.append(tomPostering);
                visBehandlingsResultat(null, 'Postering er opprettet');
            },
            error: function (response) {
                visBehandlingsResultat(null, 'Postering kunne ikke opprettes');
                console.log('Opprettelse feilet');
                console.log(response);
            }
        });

        tomPostering.removeClass('hidden');

    });

})();
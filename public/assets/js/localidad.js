/**
 * Created by carlangas on 11/05/2017.
 */
var ElEdo = $('#state');
//var ElCiu = $('#city');
var ElPai = $('#country');

function ajaxCall(data, url, success, type) {
    type = type || 'json';
    var successRes = function (data) {
        success(data);
    };
    var errorRes = function (e) {
        console.log("Error found \nError Code: " + e.status + " \nError Message: " + e.statusText);
        /*$('#loader').modal('hide');*/
    };

    $.ajax({
        url: url,
        type: "post",
        data: data, headers: {
            'X-CSRF-TOKEN': token,
            'csrftoken': token,
        },
        success: successRes,
        error: errorRes,
        dataType: type,
        timeout: 60000
    });
};
/*
function CambioCiudad() {
    $("#city option:gt(0)").remove();
    var data = {state: $(ElEdo).val()};
    $(ElCiu).find("option:eq(0)").html("Por favor espera...");
    ajaxCall(data, UrlCiudad, function (data) {
        $(ElCiu).find("option:eq(0)").html(data.text);

        var _select = $('<select>');
        var datos = data.data;
        $.each(datos, function (key, val) {
            _select.append($('<option>').val(val.id).html(val.name));
        });
        $(ElCiu).append(_select.html());

        if ($(ElEdo).val() != null || $(ElEdo).val() != 0) {
            $(ElCiu).val(cit).trigger('change');
        }
        if (cit !== null || cit !== 0 || cit !== undefined) {
            $(ElCiu).val(cit).trigger('change');
        }
    });
};
*/
function CambioEstado() {
    $("#state option:gt(0)").remove();
    var country = $(ElPai).val();
    var data = {country: country};

    $(ElEdo).find("option:eq(0)").html("Por favor espera...");
    ajaxCall(data, UrlEstado, function (data) {

        $(ElEdo).find("option:eq(0)").html(data.text);
        var _select = $('<select>');
        var datos = data.data;
        $.each(datos, function (key, val) {
            _select.append($('<option>').val(val.id).html(val.name));
        });
        $(ElEdo).append(_select.html());
        if ($(ElPai).val() != null || $(ElPai).val() != 0) {
            $(ElEdo).val(edo).trigger('change');
        }



    });
};
/*
$(ElEdo).on('change', function () {
    CambioCiudad();
    EnableElement(ElCiu, false);
});
*/
$(ElPai).on('change', function () {
    CambioEstado();
    EnableElement(ElEdo, false);
});
$(window).on('load', function () {
    if ($(ElPai).val() != null || $(ElPai).val() != 0) {
        $(ElPai).val(pai).trigger('change');
    }
});
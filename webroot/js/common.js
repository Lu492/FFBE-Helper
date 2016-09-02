/**
 * Created by david on 01/09/2016.
 */
$(function () {

//  Ajax globals
    $(document).ajaxStart(function () {
        $('#ajax-loading').show();
    });
    $(document).ajaxStop(function () {
        $('#ajax-loading').hide();
    });

//  Sticky table headers
    $('#unittable').stickyTableHeaders();

});
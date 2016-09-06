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

//  Show and hide buttons for slides
    var hide = '<span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span> Hide';
    var show = '<span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span> Show';

//  Show and or hide a form well element
    function toggleWell(well, form, button) {
        button.click(function (e) {
            e.preventDefault();
            form.slideToggle({
                start: function (animation) {
                    if ($(this).is(':visible')) {
                        button.html(hide);
                    } else {
                        button.html(show);
                    }
                },
                complete: function () {
                    if ($(this).is(':visible')) {
                        button.html(hide);
                    } else {
                        button.html(show);
                    }
                }
            });
        });
    }

//  Show/Hide for the search form
    if (window.location.search.indexOf('search=1') !== -1) {
        $('div.search.well a.show-hide').html(hide);
    } else {
        $('div.search.well div.search-form').hide();
    }

    var searchWell = $('div.search.well');
    var searchForm = $('div.search.well div.search-form');
    var searchButton = $('div.search.well a.show-hide');

    toggleWell(searchWell, searchForm, searchButton);

//  Show/Hide for the add form
    $('div.add-units.well div.add-form').hide();

    var addWell = $('div.add-units.well');
    var addForm = $('div.add-units.well div.add-form');
    var addButton = $('div.add-units.well a.show-hide');

    toggleWell(addWell, addForm, addButton);

});
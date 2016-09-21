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
    var hide = 'glyphicon glyphicon-chevron-up';
    var show = 'glyphicon glyphicon-chevron-down';

//  Show and or hide a form well element
    function toggleWell(well, form, button) {
        button.click(function (e) {
            e.preventDefault();
            form.slideToggle({
                start: function (animation) {
                    if ($(this).is(':visible')) {
                        button.find('span').removeClass(show).addClass(hide);
                    } else {
                        button.find('span').removeClass(hide).addClass(show);
                    }
                },
                complete: function () {
                    if ($(this).is(':visible')) {
                        button.find('span').removeClass(show).addClass(hide);
                    } else {
                        button.find('span').removeClass(hide).addClass(show);
                    }
                }
            });
        });
    }

//  Show/Hide for the search form
    if (window.location.search.indexOf('search=1') !== -1) {
        $('div.search.well a.show-hide').find('span').removeClass(show).addClass(hide);
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

//  Autocomplete for the party picker
    $(function () {
        $('div.manual-party div.unit-card.picker form input').autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: '/units/unit-list',
                    dataType: 'json',
                    data: {
                        q: $(this.element).val()
                    },
                    success: function (data) {
                        response(data.units);
                    }
                });
            },
            select: function (event, ui) {
                $(this).parents('div.unit-card.picker').find('div.unit-placeholder').load('/units/single-unit', {unitId: ui.item.value});

                return false;
            },
            minLength: 2
        });
    });
});
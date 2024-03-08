define([
    'jquery',
    'Pearl_Student/js/custom-local-storage'
], function ($, customStorage) {

    'use strict';
    $.widget('pearl.customStorage', {
        options: {
            signInButtonSelector: '.authorization-link'
        },
        _create: function () {
            this._bind();
        },

        _bind: function () {

            var self = this;

            $(this.options.signInButtonSelector).on('click', function () {
                customStorage.setYourData('YOUR DATA');
                customStorage.setHasData(true);
            });

            $(document).ready(function () {

                if (customStorage.getHasData()) {
                    alert('Have data on custom Local storage, your data is: ' + customStorage.getYourData());

                }
            });
        }
    });
    return $.pearl.customStorage;
});

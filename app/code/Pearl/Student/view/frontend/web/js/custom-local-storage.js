define([

    'jquery',
    'mage/storage',
    'jquery/jquery-storageapi'

], function ($) {

    'use strict';
    var cacheKey = 'custom-local-storage-field', // define field cache key of storage

        storage = $.initNamespaceStorage('custom-local-storage').localStorage,

        /**

         * @param {Object} data

         */
        saveData = function (data) {
            storage.set(cacheKey, data);
        },

        /**

         * @return {*}

         */

        getData = function () {
            if (!storage.get(cacheKey)) {
                reset();
            }
            return storage.get(cacheKey);
        },

        reset = function () {
            var data = {
                'hasData': false,
                'yourData': null
            };
            saveData(data);
        };
    return {

        reset : function () {
            reset();
        },

        getHasData: function () {
            var obj = getData();
            return obj.hasData;
        },

        setHasData: function (hasData) {
            var obj = getData();
            obj.hasData = hasData;
            saveData(obj);
        },

        getYourData: function () {
            var obj = getData();
            return obj.yourData;
        },

        setYourData: function (yourData) {
            var obj = getData();
            obj.yourData = yourData;
            saveData(obj);
        }
    };
});

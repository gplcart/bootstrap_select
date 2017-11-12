/* global Gplcart, jQuery */
(function (Gplcart, $) {

    "use strict";

    /**
     * Returns an array of selectors
     * @returns {Array}
     */
    var getSelectors = function () {
        if (Gplcart.settings.bootstrap_select && Gplcart.settings.bootstrap_select.selector) {
            return Gplcart.settings.bootstrap_select.selector;
        }

        return [];
    };

    /**
     * Adds Bootstrap Select to input elements
     * @returns {undefined}
     */
    Gplcart.onload.moduleBootstrapSelectLoad = function () {
        if ($.fn.selectpicker) {
            var selectors = getSelectors();
            if (selectors.length) {
                $(selectors.join(',')).selectpicker();
            }
        }
    };

})(Gplcart, jQuery);
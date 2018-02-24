/* global Gplcart, jQuery */
(function (Gplcart, $) {

    "use strict";

    /**
     * Adds Bootstrap Select to input elements
     */
    Gplcart.onload.moduleBootstrapSelectLoad = function () {
        if ($.fn.selectpicker && Gplcart.settings.bootstrap_select && Gplcart.settings.bootstrap_select.selector) {
            $(Gplcart.settings.bootstrap_select.selector.join(',')).selectpicker();
        }
    };

})(Gplcart, jQuery);
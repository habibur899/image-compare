;(function ($) {
    /**
     * @param $scope The Widget wrapper element as a jQuery element
     * @param $ The jQuery alias
     */
    var WidgetHelloWorldHandler = function (scope, $) {
        $(function () {
            $(scope).find("#horizontal").twentytwenty();
        });

        $(function () {
            $(scope).find("#vertical").twentytwenty({
                orientation: "vertical",
                no_overlay: true,
            });
        });
    };

    // Make sure you run this code under Elementor.
    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/image-compare-widget.default', WidgetHelloWorldHandler);
    });
})(jQuery);
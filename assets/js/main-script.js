;(function ($) {
    $(function () {
        var image_overlay = $(".image-compare-container").data("overlay");
        var image_orientation = $(".image-compare-container").data("orientation");
        var image_before_label = $(".image-compare-container").data("before-label");
        var image_after_label = $(".image-compare-container").data("after-label");
        var image_move_slider_on_hover = $(".image-compare-container").data("slider-hover");
        var image_move_with_handle_only = $(".image-compare-container").data("move-handle");
        var image_click_to_move = $(".image-compare-container").data("click-move");
        var image_offset = $(scope).find(".image-compare-container").data("offset");
        $(".image-compare-container").twentytwenty({
            default_offset_pct: image_offset,
            orientation: image_orientation,
            no_overlay: image_overlay,
            before_label: image_before_label,
            after_label: image_after_label,
            move_slider_on_hover: image_move_slider_on_hover,
            move_with_handle_only: image_move_with_handle_only,
            click_to_move: image_click_to_move
        });
    });

})(jQuery);
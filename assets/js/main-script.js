;(function( $ ) {
    $(function() {
        $("#horizontal").twentytwenty();
    });

    $(function() {
        $("#vertical").twentytwenty({
            orientation: "vertical",
            no_overlay: true,
        });
    });
})( jQuery );
/**
 * Initialization script for Engine theme
 */
jQuery(document).ready(function () {
    Engine.init(); // init engine core componets
    Layout.init(); // init layout
    App.init();
});

jQuery('.portlet').ajaxComplete(function (event, xhr, settings) {
    Engine.initAjax();
});
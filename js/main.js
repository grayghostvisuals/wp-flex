/* WordPress Author Script: */
// If you don't want to define another alternative to the jQuery name.
// You really like to use $ and don't care about using another library's $ method
//
// jQuery that comes with WordPress automatically calls the jQuery.noConflict();
// function, which gives control of the $ variable back to whichever library
// that first implemented it.
//
// If you are loading a different copy of jQuery, you'll need to manually call
// jQuery.noConflict();, if necessary, from one of your JavaScript files.
//
// jQuery.noConflict();

// This is most frequently used in the case where you still want the benefits of really
// short jQuery code, but don't want to cause conflicts with other libraries.
jQuery(document).ready(function($) {
    $('body').append('<a href="https://github.com/grayghostvisuals/WP-Flex"><img style="position: absolute; top: 0; left: 0; border: 0;" src="https://s3.amazonaws.com/github/ribbons/forkme_left_white_ffffff.png" alt="Fork me on GitHub"></a>');
});
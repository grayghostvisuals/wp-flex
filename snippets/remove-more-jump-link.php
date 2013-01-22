<?php
    /*
     * Place this snippet within your themes functions.php file
     *
     * Removes the jump to top functionality when a reader
     * clicks on a read more link from your posts excerpt feed.
     *
     * @since 1.6.0
     *
     */

    /*------------------------------------------------------------------------------------------------[ Remove Read More Link Jump ] */

    function remove_more_jump_link($link) {
        $offset = strpos($link, '#more-');
        if ($offset) {
            $end = strpos($link, '"',$offset);
        }
        if ($end) {
            $link = substr_replace($link, '', $offset, $end-$offset);
        }
        return $link;
    }

    add_filter('the_content_more_link', 'remove_more_jump_link');
?>
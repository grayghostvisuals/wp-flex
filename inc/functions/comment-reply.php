<?php
    /*-----------------------------------[ comment reply wp enque script ] */

    // Required WordPress Core Feature for Theme Review
    if ( is_singular() ) :
        wp_enqueue_script( 'comment-reply' );
    endif;
?>
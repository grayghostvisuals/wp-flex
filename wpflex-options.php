<?php

// wpflex Custom Options
// triggered before any other hook when a user accesses the admin area
// only can be used to callback a specified function which is dgs_options_init
add_action( 'admin_init', 'wpflex_options_init' );
add_action( 'admin_menu', 'wpflex_options_add_page' );

// wpflex options initialization
function wpflex_options_init(){
    // lets us generate wp-admin page by registering theme settings
    // and providing a few callbacks to control the output
    // 1. A settings group name can be found under form element => settings_fields( 'themename_options' )
    // 2. Name of option to sanitize which can be found in the form options name = attribute_value
    // 3. The sanitizing callback for the entered inputs
    register_setting( 'wpflex_options', 'wpflex_theme_options', 'wpflex_options_validate' );

};

// load page with menu and add this sub-menu to the appearance panel in the WP admin dashboard
function wpflex_options_add_page() {
    // 1. text to be displayed in the title tags of the page when the menu is selected
    // 2. text used for WP admin dashboard appearance menu sub-title
    // 3. capability required for this menu to be displayed to the user.
    // 4. menu URI slug name
    // 5. function to be called to output the content for page
    add_theme_page( 'WP-Flex Options', 'WP-Flex Options', 'edit_theme_options', 'wpflex-options', 'wpflex_theme_options_layout' );
};

// creates the option page.
// this is the function called through add_theme _page
function wpflex_theme_options_layout() {

    // if request is not set do the following
    if ( ! isset( $_REQUEST['settings-updated'] ) ) :
        $_REQUEST['settings-updated'] = false;
    endif; //endif ! isset() ?>

    <!-- styles -->
    <style>
        input {
            display: block;
            box-shadow: inset 0px 1px 1px rgba(0,0,0,.6),
                              0 1px 0px #FFF;
        }

        #submit-btn {
            display: block;
            margin: .5em 0;
            padding: 1em 0;
        }
    </style>

    <!-- begin WP-Flex options layout -->
    <div class="wrap">

        <?php
        //displays the screen icon next to the title on the theme options page
        //retrieve current theme name wp_get_theme()
        screen_icon(); ?>

        <h2><?php echo wp_get_theme(); ?></h2>

        <?php //if settings are updated correctly do the following ?>
        <?php if ( false !== $_REQUEST['settings-updated'] ) : ?>

        <!-- theme options update message -->
        <div class="updated fade">
            <strong><?php _e( 'WP Flex Options Saved Partner', 'wpflex' ); ?></strong>
        </div>
        <?php endif; //end if false !==$REQUEST ?>

        <!-- begin form for theme options page -->
        <form method="post" action="options.php">
        <?php /////////////////// wpflex options fetch /////////////////////////// ?>

        <?php settings_fields( 'wpflex_options' ); //must match register_settings field ?>

        <?php $options = get_option( 'wpflex_theme_options' ); ?>

        <table class="form-table">
            <thead>
                <tr valign="top">
                    <td valign="top" scope="row">
                        <h1><strong>WP&ndash;Flex Options</strong></h1>
                    </td>
                </tr>
            </thead>

            <tbody>

                <?php /////////////////// themename social networking option /////////////////////////// ?>

                <tr valign="top">
                    <th valign="top" scope="row">
                        <h2><strong>Social Networks</strong></h2>
                    </th>
                </tr>

                <!-- facebook -->
                <tr valign="top">
                    <td valign="top" scope="row">
                        <strong>Facebook URL</strong> <em>http://www.facebook.com/fb_slug</em>
                        <input type="text" class="regular-text" placeholder="http://www.facebook.com/fb_slug" name="wpflex_theme_options[facebookurl]" value="<?php esc_attr( $options['facebookurl'] ); ?>" />
                    </td>
                </tr>

                <!-- twitter option-->
                <tr valign="top">
                    <td valign="top" scope="row">
                        <strong>Twitter Name</strong><em>make sure to include the @ symbol</em>
                        <input type="text" class="regular-text" placeholder="@twittername" name="wpflex_theme_options[twitterurl]" value="<?php esc_attr( $options['twitterurl'] ); ?>" />
                    </td>
                </tr>

                <?php /////////////////// themename custom VCard option /////////////////////////// ?>

                <tr valign="top">
                    <th valign="top" scope="row">
                        <h2><strong>WP&ndash;Flex VCard</strong></h2>
                    </th>
                </tr>

                <!-- name -->
                <tr valign="top">
                    <td valign="top" scope="row">
                        <!-- organization -->
                        <strong>Organization</strong>
                        <input type="text" class="regular-text" name="wpflex_theme_options[fnorg]" value="<?php esc_attr( $options[ 'fnorg' ] ); ?>" placeholder="John J. Doe or Pete's Pancake House" />
                    </td>
                </tr>

                <tr valign="top">
                    <td valign="top" scope="row">
                        <!-- address -->
                        <strong>Street Address</strong>
                        <input type="text" class="regular-text" name="wpflex_theme_options[street]" value="<?php esc_attr( $options[ 'street' ]); ?>"placeholder="555 Fake Street" />

                        <!-- city -->
                        <em>City Name</em>
                        <input type="text" class="regular-text" name="wpflex_theme_options[locality]" value="<?php esc_attr( $options[ 'locality' ]); ?>"placeholder="City Name" />

                        <!-- state -->
                        <em>State</em> <strong>Abbreviated Please!</strong>
                        <input type="text" class="regular-text" name="wpflex_theme_options[region]" value="<?php esc_attr( $options[ 'region' ]); ?>"placeholder="State" />

                        <!-- postal code -->
                        <em>Postal Code</em>
                        <input type="text" class="regular-text" name="wpflex_theme_options[postal]" value="<?php esc_attr( $options[ 'postal' ]); ?>"placeholder="Postal Code" />
                    </td>
                </tr>

                <!-- phone -->
                <tr valign="top">
                    <td valign="top" scope="row">
                        <!-- phone -->
                        <strong>Phone</strong><br />
                        <em>headquarters type: ex.) Office, Home, Work</em><br />
                        <input type="text" class="regular-text" name="wpflex_theme_options[teltype]" value="<?php esc_attr( $options[ 'teltype' ]); ?>" placeholder="Office" />
                        <em>Telephone Number</em>
                        <input type="text" class="regular-text" name="wpflex_theme_options[telvalue]" value="<?php esc_attr( $options[ 'telvalue' ]); ?>" placeholder="555-555-5555" />
                    </td>
                </tr>

                <tr valign="top">
                    <td valign="top" scope="row">
                        <!-- URL -->
                        <strong>URL</strong><br />
                        <em>ex.) www.my_own_url.com</em>
                        <input type="text" class="regular-text" name="wpflex_theme_options[url]" value="<?php esc_attr( $options[ 'url' ]); ?>" placeholder="http://my_own_url.com" />
                    </td>
                </tr>

                <tr valign="top">
                    <td valign="top" scope="row">
                        <strong>ADD TO ADDRESS BOOK LINK</strong>
                        <input type="text" class="regular-text" name="wpflex_theme_options[addrbook]" value="<?php esc_attr( $options[ 'addrbook' ]); ?>" placeholder="http://my_own_url.com" />
                    </td>
                </tr>
            </tbody>
        </table>

        <div id="submit-btn">
            <input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'wpflex' ); ?>" />
        </div>
    </form>
</div>

<?php } //end wpflex_theme_options_layout

//Sanitize and validate input. Accepts an array, return a sanitized array.
function wpflex_options_validate( $input ) {
    // Organization Option Cleanse
    $input['fnorg'] = wp_filter_nohtml_kses( $input['fnorg'] );

    // Street Address Option Cleanse
    $input['street'] = wp_filter_nohtml_kses( $input['street'] );

    // Locality Option Cleanse
    $input['locality'] = wp_filter_nohtml_kses( $input['locality'] );

    // Region Option Cleanse
    $input['region'] = wp_filter_nohtml_kses( $input['region'] );

    // Postal Option Cleanse
    $input['postal'] = wp_filter_nohtml_kses( $input['postal'] );

    // Telephone Type Option Cleanse
    $input['teltype'] = wp_filter_nohtml_kses( $input['teltype'] );

    // Telephone Value Option Cleanse
    $input['telvalue'] = wp_filter_nohtml_kses( $input['telvalue'] );

    // User URL Option Cleanse
    $input['url'] = wp_filter_nohtml_kses( $input['url'] );

    // Add To Address Book Link Option Cleanse
    $input['addrbook'] = wp_filter_nohtml_kses( $input['addrbook'] );

    // Facebook Option Cleanse
    $input['facebookurl'] = wp_filter_nohtml_kses( $input['facebookurl'] );

    // Twitter Option Cleanse
    $input['twitterurl'] = wp_filter_nohtml_kses( $input['twitterurl'] );

    return $input;
};//end wpflex_options_validate ?>
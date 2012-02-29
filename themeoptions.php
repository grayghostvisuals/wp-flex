<?php 

// themename Custom Options
// triggered before any other hook when a user accesses the admin area
// only can be used to callback a specified function which is dgs_options_init
add_action( 'admin_init', 'themename_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

// themename options initialization
function themename_options_init(){
// lets us generate wp-admin page by registering theme settings
// and providing a few callbacks to control the output
// 1. A settings group name can be found under form element => settings_fields( 'themename_options' )
// 2. Name of option to sanitize which can be found in the form options name = attribute_value
// 3. The sanitizing callback for the entered inputs
register_setting( 'themename_options', 'themename_theme_options', 'themename_options_validate' );

};

// load page with menu and add this sub-menu to the appearance panel in the WP admin dashboard
function theme_options_add_page() {
// 1. text to be displayed in the title tags of the page when the menu is selected
// 2. text used for WP admin dashboard appearance menu sub-title
// 3. capability required for this menu to be displayed to the user.
// 4. menu URI slug name
// 5. function to be called to output the content for page
add_theme_page( 'themename Options', 'themename', 'edit_theme_options', 'themename-options', 'themename_theme_options_layout' );
};

// creates the option page. 
// this is the function called through add_theme _page
function themename_theme_options_layout() {

	// if request is not set do the following
	if ( ! isset( $_REQUEST['settings-updated'] ) ) :
		$_REQUEST['settings-updated'] = false;
	endif; //endif ! isset()
	?>

	<!-- begin ridiculous review options page layout -->
	<div class="wrap" style="">

		<?php 
		//displays the screen icon next to the title on the theme options page
		//retrieve current theme name get_current_theme()
		screen_icon(); 
		?>
        
		<h2><?php echo get_current_theme(); ?></h2>

		<?php //if settings are updated correctly do the following ?>
		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>

		<!-- theme options update message -->
		<div class="updated fade"><strong><?php _e( 'themename Options Saved Partner', 'themename' ); ?></strong></div>
		<?php endif; //end if false !==$REQUEST ?>

		<!-- begin form for theme options page -->
		<form method="post" action="options.php">

			<?php settings_fields( 'themename_options' ); //must match register_settings field ?>
            
            <?php //themename options fetch ?> 
			<?php $options = get_option( 'themename_theme_options' ); ?>

			<table class="form-table">
			<thead>
			<tr valign="top">
				<td valign="top" scope="row"><strong>themename Options</strong></td>
			</tr>
            </thead>
            
            <tfoot>
            	<tr>
                	<td>Welcome to your custom options template dude</td>
                </tr>
            </tfoot>
            
            <tbody>
            <?php /////////////////// themename social networking option /////////////////////////// ?>
				
				<tr valign="top">
					<th valign="top" scope="row">
						<strong>Social Networks</strong>
					</th>
				</tr>
				
				<!-- facebook -->
				<tr valign="top">
					<th valign="top" scope="row"><strong>Facebook URL</strong> <em>http://www.facebook.com/fb_slug</em></th>
					
					<td><input type="text" class="regular-text" placeholder="http://www.facebook.com/fb_slug" name="themename_theme_options[facebookurl]" value="<?php esc_attr_e( $options['facebookurl'] ); ?>" /></td>
				</tr>
                
                <!-- twitter option-->
				<tr valign="top">
					<th valign="top" scope="row"><strong>Twitter Name</strong><em>do not include the @ symbol</em></th>

					<td><input type="text" class="regular-text" placeholder="twitter name with no @ symbol" name="themename_theme_options[twitterurl]" value="<?php esc_attr_e( $options['twitterurl'] ); ?>" /></td>
				</tr>
            
				<?php /////////////////// themename custom VCard option /////////////////////////// ?>


				<tr valign="top">
					<th valign="top" scope="row"><strong>ThemeName VCard</strong></th>
				</tr>

				<!-- name -->
				<tr valign="top">
					<th valign="top" scope="row"><strong>Organization</strong> 1. ex.<em>John J. Doe or Pete's Pancake House</em>
					</th>
					<td>1. <input type="text" class="regular-text" name="themename_theme_options[fnorg]" value="<?php esc_attr_e( $options[ 'fnorg' ] ); ?>" placeholder="John J. Doe or Pete's Pancake House" /></td>
				</tr>

				<!-- address -->
				<tr valign="top">
					<th valign="top" scope="row">
                    
						<strong>Street Address</strong><br />

                        2. <em>555 Fake Street</em><br />

                        3.	<em>City Name</em><br />

                        4.	<em>State</em> <strong>Abbreviated Please!</strong><br />

                        5.	<em>Postal Code</em>

					</th>
                    
					<td>
                        2. <input type="text" class="regular-text" name="themename_theme_options[street]" value="<?php esc_attr_e( $options[ 'street' ]); ?>"placeholder="555 Fake Street" /><br />

                        3. <input type="text" class="regular-text" name="themename_theme_options[locality]" value="<?php esc_attr_e( $options[ 'locality' ]); ?>"placeholder="City Name" /><br />

                        4. <input type="text" class="regular-text" name="themename_theme_options[region]" value="<?php esc_attr_e( $options[ 'region' ]); ?>"placeholder="State" /><br />
                        
                        5. <input type="text" class="regular-text" name="themename_theme_options[postal]" value="<?php esc_attr_e( $options[ 'postal' ]); ?>"placeholder="Postal Code" />
					</td>
				</tr>

				<!-- phone -->
				<tr valign="top">
					<th valign="top" scope="row">
						<strong>Phone</strong><br />
                        6. <em>headquarters type: ex.) Office, Home, Work</em><br />
                        7. <em>Telephone Number</em>
					</th>

					<td>
						6. <input type="text" class="regular-text" name="themename_theme_options[teltype]" value="<?php esc_attr_e( $options[ 'teltype' ]); ?>" placeholder="Office" /><br />

                        7. <input type="text" class="regular-text" name="themename_theme_options[telvalue]" value="<?php esc_attr_e( $options[ 'telvalue' ]); ?>" placeholder="555-555-5555" />
					</td>
				</tr>

                <tr valign="top">
                	<th valign="top" scope="row">
                    	<strong>URL</strong><br />
                        8. <em>ex.) www.my_own_url.com</em>

                    </th>
                    
                    <td>

                    	8. <input type="text" class="regular-text" name="themename_theme_options[url]" value="<?php esc_attr_e( $options[ 'url' ]); ?>" placeholder="www.my_own_url.com" />

                    </td>

                </tr>

                <tr valign="top">
                	<th valign="top" scope="row">
                    	<strong>ADD TO ADDRESS BOOK LINK</strong><br />
                        9. <em>ex.) your_url.com</em><br /><strong>NO WWW PLEASE</strong>
                    </th>

                    <td>

                    	9. <input type="text" class="regular-text" name="themename_theme_options[addrbook]" value="<?php esc_attr_e( $options[ 'addrbook' ]); ?>" placeholder="www.my_own_url.com" />

                    </td>

                </tr>
                
                </tbody>

			</table>

			<p class="submit"><input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'themename' ); ?>" /></p>

		</form>

	</div>

	<?php } //end themename_theme_options_layout()

//Sanitize and validate input. Accepts an array, return a sanitized array. 
function themename_options_validate( $input ) {

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

};//end themename_options_validate
?>
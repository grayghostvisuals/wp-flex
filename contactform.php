<?php require TEMPLATEPATH . '/php/req/contact-validation.php' ?>
<?php if ( !isset( $_POST['submit']) OR $error ) : ?>
<form action="<?php $_SERVER['PHP_SELF'] ?>" enctype="application/x-www-form-urlencoded" method="post" id="contact" class="form-styling">

		<fieldset id="fscontact">
        <legend>Contact Information</legend>
        <small><span class="asterisk">*</span>required fields</small>
        <!-- fname input -->
        <label for="recipient-fname" title="It's not required but we would love to know what first name you go by">First Name</label>
        <input type="name" name="recipient-fname" id="recipient-fname" class="input-styling" placeholder="John" title="Got a first name buddy?" value="<?php if( isset( $recipient_fname ) ): echo htmlspecialchars($recipient_fname); endif; ?>" />
        
        <!-- lname input -->
        <label for="recipient-lname" title="It's not required but we would love to know what last name you go by">Last Name</label>
        <input type="name" name="recipient-lname" id="recipient-lname" class="input-styling" placeholder="Doe" title="Got a last name buddy?" value="<?php if( isset( $recipient_lname ) ): echo htmlspecialchars($recipient_lname); endif; ?>" />
        
        <!-- email input required -->
        <label for="recipient-email" title="This part is required and your e-mail syntax must be correct">E&ndash;mail Address<span class="asterisk">*</span></label>
        <input type="email" name="recipient-email" id="recipient-email" class="required email input-styling" placeholder="me@examplemailbox.com" title="Syntax must be correct" value="<?php if( isset( $recipient_em ) ): echo htmlspecialchars( $recipient_em ); endif; ?>" />
        <span id="recipient-emspan" class="contact-form-error"></span>
        </fieldset>
        
        <!-- message text area -->
        <fieldset id="fscomments">
        <legend>Tell us what is on your mind</legend>
        
        <!-- comments textarea required -->
        <label for="txtarea">Message<span class="asterisk">*</span></label>
        <textarea name="txtarea" id="txtarea" class="required textarea-styling" rows="6" title="This cannot be empty and must be &gt; 10 characters" placeholder="what is your message" value="<?php if( isset($message) ) : echo htmlspecialchars( $message ); endif; ?>"></textarea>
        <span id="msgspan" class="contact-form-error"></span>
        
        </fieldset>
        
        <!-- form buttons -->
       <input type="submit" name="submit" id="submit" value="submit" />
       <input type="reset" name="reset" id="reset" value="reset" />
       
</form>
<?php endif; ?>
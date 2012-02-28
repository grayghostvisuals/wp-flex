 <footer role="contentinfo">
    <section>
      <?php if ( function_exists('dynamic_sidebar') ) : ?>
      <?php dynamic_sidebar('footer widget') ?>
      <?php endif; ?>
    </section>
  
    <!--xxxxxxxxxxxxxxxxxx custom footer Vcard xxxxxxxxxxxxxxxxxx-->
    <?php $options = get_option( 'theme-name_theme_options' ); ?>
    <?php if( $options || empty($options) ): ?>
  
    <!-- vcard fn org -->
    <section class="vcard">
      <ul>
        <?php if( !empty( $options['fnorg'] ) ): ?>
        <li class="fn org"> <small><?php echo ( $options['fnorg'] ); ?>,</small> </li>
        <?php else : ?>
        <li><small>Company Organization</small></li>
        <?php endif; ?>
        
        <!-- vcard adr -->
        <?php if( $options['street'] && $options['locality'] && $options['region'] && $options['postal'] ): ?>
        <li class="adr"><small><span class="street-address"><?php echo ( $options['street'] ); ?></span>, <span class="locality"><?php echo ( $options['locality'] ); ?></span>, <span class="region"><abbr title="<?php echo ( $options['region'] ); ?>"><?php echo ( $options['region'] ); ?></abbr></span> <span class="postal-code"><?php echo ( $options['postal'] ); ?></span></small></li>
        <?php else : ?>
        <li class="adr"><small>555 Fake Street, City Name, NY 55555</small></li>
        <?php endif; ?>
        
        <!-- vcard tel -->
        <?php if( $options['teltype'] && $options['telvalue'] ): ?>
        <li class="tel"><small><span class="type"><?php echo ( $options['teltype'] ); ?></span>: <span class="value"><?php echo ( $options['telvalue'] ); ?></span></small></li>
        <?php else : ?>
        <li class="tel"><small>Office: 555&ndash;555-5555</small></li>
        <?php endif; ?>
        
        <!-- vcard url fn org -->
        <?php if( $options['url'] ): ?>
        <li class="url fn org"><small><a rel="bookmark" href="http://<?php echo ( $options['url'] ); ?>" title="visit us online"><?php echo ( $options['url'] ); ?></a> </small> </li>
        <?php else : ?>
        <li class="url fn org"><small><a rel="bookmark" href="http://www.grayghostvisuals.com" title="visit designer online">http://www.grayghostvisuals.com</a> </small> </li>
        <?php endif; ?>
        
        <!-- vcard add to address book -->
        <li class="add-vcard"><small><a href="http://h2vx.com/vcf/<?php echo ( $options['addrbook'] ); ?>" rel="vcard">&bull; Add Us To Your Address Book</a></small></li>
      </ul>
    </section>
    <?php endif; ?>
    
    <section id="footer-socials">
      <?php $options = get_option( 'theme-name_theme_options' ); ?>
      
	  <?php if( $options[ 'facebookurl' ] ) : ?>
      <article id="footer-fb">
        <div class="fb-like-button" data-href="<?php echo ( $options[ 'facebookurl' ] ); ?>" data-send="false" data-layout="button_count" data-show-faces="false"></div>
      </article>
	  <?php endif; ?>
      
	  <?php $options = get_option( 'theme-name_theme_options' ); ?>
      
	  <?php if( $options[ 'twitterurl' ] ) : ?>
      <article id="footer-twitter">
        <div class="twitter-button"><a href="https://twitter.com/<?php echo ( $options[ 'twitterurl' ] ); ?>" class="twitter-follow-button">follow @<?php echo( $options[ 'twitterurl' ] ); ?></a></div>
      </article>
      <?php endif; ?>
    
    </section>
  </footer>

</div>

  <!-- JavaScript at the bottom for fast page loading -->
  <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="<?php echo get_template_directory_uri(); ?>/js/libs/jquery.min.js"><\/script>')</script>
  
  <!-- global scripts and plugins -->
  <script src="<?php echo get_template_directory_uri(); ?>/js/plugins.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/script.js"></script>
  <!-- end scripts-->
  
  <!-- Asynchronous Google Analytics snippet. mathiasbynens.be/notes/async-analytics-snippet -->
  <!-- 
  Why not add this to your Analytics Snippet? 
  ['_setDomainName', 'www.your-site-uri.com']
  This allows us to create a cookieless sub-domain 
  http://www.ravelrumba.com/blog/static-cookieless-domain
  -->
  <script>
  var _gaq=[['_setAccount','XX-XXXXXXXX-X'],['_trackPageview'],['_trackPageLoadTime']];
  (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
  g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
  s.parentNode.insertBefore(g,s)}(document,'script'));
  </script>
   
  <?php 
  /* 
   * Always have wp_footer() just before the closing </body>
   * tag of your WP theme, or you will break many plugins, which
   * generally use this hook to reference JavaScript files.
   *
   */
  wp_footer(); 
  ?>
</body>
</html>
#WP-Flex &rarr; [http://grayghostvisuals.com/wpflex](http://grayghostvisuals.com/wpflex)
###A responsive, foundational Wordpress theme boilerplate for developers submitting to the Wordpress.org theme repository
[![http://grayghostvisuals.com/wpflex](http://static.grayghostvisuals.com/portfolio/wpflex.png)](http://grayghostvisuals.com/wpflex)

##WHAT IS IT?
A responsive, foundational Wordpress theme boilerplate for developers submitting to the Wordpress.org theme repository. Includes bunches of best practices for theme building requirements and coding standards for authors as suggested by Wordpress' Codex.

####Codex Theme Review Guidelines
[http://codex.wordpress.org/Theme_Review](http://codex.wordpress.org/Theme_Review)
####Theme Unit Test Site
[http://wpthemetestdata.files.wordpress.com](http://wpthemetestdata.files.wordpress.com)

##KID TESTED, DEVELOPER APPROVED:
Tested and Debugged using Wordpress 3.4, <code>theme-unit-test.xml</code> and <code>wp-config.php</code>.

###Windows 7 Browser Tests
1. IE       7-9
2. Chrome  18
3. Firefox 12
4. Safari   5
5. Opera   11

###Mac Lion 10.7 Browser Tests
1. Firefox 12
2. Chrome  18
3. Safari   5
4. Opera   11

##IT STILL NEEDS YOUR HELP!
1. In order to submit to the Wordpress theme repo, authors must rename all function calls / variables with the theme name reference to your own new theme-to-be name. 
Reference &rarr; [http://codex.wordpress.org/Theme_Review#Theme_Name](http://codex.wordpress.org/Theme_Review#Theme_Name) for rules regarding naming. WP-Flex needs a dynamic means to create a new theme name across our codebase without going through everything line by line.

###For example
using <code>functions.php</code> to illustrate&hellip;
<pre>
<code>
function wpflex_setup() {
   do_something_great()
}

would be replaced dynamcially with our new name....

function awesomesauce_setup() {
   do_something_great()
}
</code>
</pre>

###Wordpress Coding Standards Guideline
Documentation &rarr; [http://codex.wordpress.org/WordPress_Coding_Standards](http://codex.wordpress.org/WordPress_Coding_Standards)

####CSS Coding Standards
* Current Specification &rarr; [http://codex.wordpress.org/CSS_Coding_Standards](http://codex.wordpress.org/CSS_Coding_Standards)
* 7/04/2012 Specification Updates &rarr; [https://docs.google.com/a/twitter.com/document/d/1b-ouASTs6C6ZDKGsoCgUIF4FVBxN2v0dvaytDsuCzlM/edit?pli=1](https://docs.google.com/a/twitter.com/document/d/1b-ouASTs6C6ZDKGsoCgUIF4FVBxN2v0dvaytDsuCzlM/edit?pli=1)

###!Before uploading your theme submission
1. Remove any hidden files from your WP-Flex directory per Theme Check Plugin Review &rarr; [http://pross.org.uk/theme-check](http://pross.org.uk/theme-check)
2. Remove github's <code>README.md</code> file included with this repository
3. Rename <code>wpflex-readme.txt</code> to <code>readme.txt</code> as per Wordpress' Codex theme requirements
4. License your theme with GNU http://www.gnu.org/licenses/gpl-3.0.html. Themes are required to be licensed fully under a GPL-compatible license.

####UNDER THE HOOD:
1. HTML5 Boilerplate &rarr; [http://html5boilerplate.com](http://html5boilerplate.com)
2. jQuery &rarr; [http://jquery.com](http://jquery.com)
3. Modernizr &rarr; [http://modernizr.com](http://modernizr.com)

#####EVEN MORE!!!
1. <code>wpflex-readme.txt</code>
   A must have for theme submission. Describes the ins and outs
   to users what's great and what still needs work with your theme.
   (A reccomendation from the Wordpress Codex for theme authors)

2. Detailed PHP comments with URL references for theme submission checks and further customization

3. Required Wordpress CSS classes

4. Comment Thread Styling Classes
   Those tricky comment thread styling classes provided to you by default. No more scanning the DOM or reading more tutorials. It's all there bro!

5. Standardized CSS Comment Flags
   CSS comment flags used for sectioning as reccommended by Wordpress theme submission codex

6. <code>theme-unit</code> &amp; <code>theme-unit-test.xml</code>
   A database for theme testing with multiple users, comment threading, posts and much more

7. WP-Flex Theme Options Boilerplate
   Custom boilerplate starting point to give your users and authors awesome theme options

8. Theme Functions Boilerplate
   A creamy base for required functionality of themes and submission via Wordpress.org Theme Repository. http://wordpress.org/extend/themes/upload

######More inspiring and wonderful blank Wordpress themes

* Matt Murtaugh's HTML5 Reset Wordpress Theme
   [http://html5reset.org/#wordpress](http://html5reset.org/#wordpress)

* Digging Into Wordpress' Blank Wordpress Theme
   [http://digwp.com/2010/02/blank-wordpress-theme](http://digwp.com/2010/02/blank-wordpress-theme)


Surely you can always visit the Wordpress Codex for more customization and give it a shot yourself
-thats what I did :)p

######Codex
[http://codex.wordpress.org](http://codex.wordpress.org)
######Wordpress.org
[http://wordpress.org](http://wordpress.org)
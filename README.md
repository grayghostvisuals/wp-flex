#WP-Flex v1.0.2 &rarr; [http://grayghostvisuals.com/wpflex](http://grayghostvisuals.com/wpflex)
[![http://grayghostvisuals.com/wpflex](http://static.grayghostvisuals.com/portfolio/wpflex.png)](http://grayghostvisuals.com/wpflex)

##WHAT IS IT?
A blank, responsive, Wordpress theme boilerplate for developers submitting to the Wordpress.org theme repository. Includes bunches of best practices for theme building requirements and coding standards for authors as suggested by Wordpress' Codex. 

If you care to mention this theme helper in your project then please do so by adding the following to your site footer with an appropriate link to this repo:
"Built with the almighty WP&ndash;Flex; A blank, responsive boilerplate for Wordpress theme makers."

####Codex Theme Review Guidelines
[http://codex.wordpress.org/Theme_Review](http://codex.wordpress.org/Theme_Review)
####Theme Unit Test Site
[http://wpthemetestdata.files.wordpress.com](http://wpthemetestdata.files.wordpress.com)

##KID TESTED, DEVELOPER APPROVED:
Tested and Debugged using Wordpress 3.4, <code>theme-unit-test.xml</code> and <code>wp-config.php.</code>

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

###Wordpress Coding Standards Documentation
Documentation &rarr; [http://codex.wordpress.org/WordPress_Coding_Standards](http://codex.wordpress.org/WordPress_Coding_Standards)

####CSS Coding Standards
* Current Specification &rarr; [http://codex.wordpress.org/CSS_Coding_Standards](http://codex.wordpress.org/CSS_Coding_Standards)
* 7/04/2012 Specification Updates &rarr; [https://docs.google.com/a/twitter.com/document/d/1b-ouASTs6C6ZDKGsoCgUIF4FVBxN2v0dvaytDsuCzlM/edit?pli=1](https://docs.google.com/a/twitter.com/document/d/1b-ouASTs6C6ZDKGsoCgUIF4FVBxN2v0dvaytDsuCzlM/edit?pli=1)

####WP&ndash;Flex Contribution Guidelines
We strictly follow the Wordpress Coding Guidelines and so should you if you're going to contribute to this repo. Thanks for abiding by these guidelines. WP&ndash;Flex contributors and myself love you for this.
* [http://codex.wordpress.org/WordPress_Coding_Standards](http://codex.wordpress.org/WordPress_Coding_Standards)

* For WP&ndash;Flex we use a [Gitflow Branching Model](http://nvie.com/posts/a-successful-git-branching-model). This means our branching is kept nice and clean allowing everyone else to see commits, merges and releases in a logical fashion. Please take the time to review this model to ensure your Pull Requests are accepted. The following items listed are the branches and naming conventions we adhere to.
    * Master
    * Develop
    * Release
    * Hotfix
    * Feature

* Keep it simple and as blank as possible &ndash;with the exception of the demo styles. Feel free to give back to the demo styles if you feel inclined :)

####Case Studies Feature Branch
If you haven't noticed already we have a feature branch called 'Case Studies' for those wishing to display a secondary grouping of entries with correlating custom taxonomies. Feel free to make it better :)

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
   * A must have for theme submission. Describes the ins and outs
   to users what's great and what still needs work with your theme.
   (A reccomendation from the Wordpress Codex for theme authors)

2. Detailed PHP Comments
   * Includes URL references for theme submission checks and further customization

3. Required Wordpress CSS Classes
   * Every theme submission is required to have specific CSS classes for your style sheets in order to be accepted into the WordPress.org theme repository

4. Responsive Images
  * You know the drill. Blah, blah, blah, something, something, max-width:100% sorta stuff for embedded media.   Also implemented for WordPress post attachments by making sure images with WordPress–added height and width attributes are scaled correctly.

5. Comment Thread Styling Classes
   * Those tricky comment thread styling classes provided to you by default. No more scanning the DOM or reading more tutorials. It's all there bro!

6. Responsive Category and Tag Listings
   * In order to flow the listing of tags and categories as the browser expands and contracts we must break up the lists and display them inline –in order to avoid a run on measure. We make absolutely sure we stop too many categories from breaking the layout.

7. Standardized CSS Comment Flags
   * CSS comment flags used for sectioning as reccommended by Wordpress theme submission codex

8. <code>theme-unit</code> &amp; <code>theme-unit-test.xml</code>
   * A database for theme testing with multiple users, comment threading, posts and much more

9. WP-Flex <code>theme-options.php</code> Boilerplate
   * Custom boilerplate starting point to give your users and authors awesome theme options

10. Theme <code>functions.php</code> Boilerplate
   * A creamy base for required functionality of themes and submission via Wordpress.org Theme Repository. http://wordpress.org/extend/themes/upload


##More inspiring and wonderful blank Wordpress themes

* Matt Murtaugh's HTML5 Reset Wordpress Theme &rarr; [http://html5reset.org/#wordpress](http://html5reset.org/#wordpress)

* Digging Into Wordpress' Blank Wordpress Theme &rarr; [http://digwp.com/2010/02/blank-wordpress-theme](http://digwp.com/2010/02/blank-wordpress-theme)


Surely you can always visit the Wordpress Codex for more customization and give it a shot yourself
-thats what I did :)p

######Codex
[http://codex.wordpress.org](http://codex.wordpress.org)
######Wordpress.org
[http://wordpress.org](http://wordpress.org)
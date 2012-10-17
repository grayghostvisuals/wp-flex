// Asynchronous Google Analytics snippet. mathiasbynens.be/notes/async-analytics-snippet
// Why not add this to your Analytics Snippet
//
// ['_setDomainName', 'www.your-site-uri.com']
//
// This allows us to create a cookieless sub-domain
// http://www.ravelrumba.com/blog/static-cookieless-domain
var _gaq=[['_setAccount','XX-XXXXXXXX-X'],['_trackPageview'],['_trackPageLoadTime']];
(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
s.parentNode.insertBefore(g,s)}(document,'script'));
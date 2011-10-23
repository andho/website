<!DOCTYPE html>
<html>
<head>
  <title>Andho's homepage</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="google-site-verification" content="CwpcbTpHOapMSYGlb8D_0JQm-ygG3TUIuKiT2UtPQKc" />
  <meta name="author" content="Amjad Mohamed, andho.com" />

  <!-- start Google analytics -->
  <script type="text/javascript">
/*
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-24858004-1']);
  _gaq.push(['_setDomainName', '.andho.com']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
*/
  </script>
  <!-- end Google analytics -->

  <link href="favicon.png" type="image/x-png" rel="shortcut icon" />	
  <link href="styles/global.css" type="text/css" media="screen" rel="stylesheet" />
  <script src="js/jquery-1.6.4.min.js"></script>
  <script src="js/underscore-min.js"></script>
  <script src="js/backbone-min.js"></script>
  <script src="js/ICanHaz.min.js"></script>
  
  <script src="js/app.js"></script>
  <script type="text/javascript">
  $(function() {
	window.router = new workspace();
	Backbone.history.start({pushState: true});

    var nav = new navView;
    $('header').after(nav.render().el);
	
	//router.navigate('');
  });
  </script>
</head>

<body>
  
<header>
	<h1 id="logo"></h1><img src="images/logo.png" alt="Andho.com logo" /></h1>
</header>

<section id="main">
</section>

<footer>
  <section id="imagination">
    <img src="images/spongebob_imagination.gif" alt="spongebob imagination" />
    <p id="best-viewed-with">Best viewed with imagination</p>
    <p>Standing upright with <a href="http://documentcloud.github.com/backbone/">Backbone.js</a></p>
  </section>
  <p>&copy; Andho 2011. All Rights reserved<p>
</footer>

<script type="text/html" id="homepage">
	<section id="about-website">
	</section>
	<section itemscope itemtype="http://data-vocabulary.org/Person">
		<h2>About andho</h2>
		<h3>Contact Information</h3>
		<dl>
			<dt>Name</dt>
			<dd itemprop="name">Amjad Mohamed</dd>
			<dt>Nick Name</dt>
			<dd itemprop="nickname">Andho</dd>
			<dt>Position</dt>
			<dd><span itemprop="title">Developer</span> at <a itemprop="affiliation" href="http://www.alliedmaldives.com">Allied Insurance Company of the Maldives</a></dd>
			<dt>Mailing Address</dt>
			<dd itemprop="address" itemscope itemtype="http://data-vocabulary.org/Address">
				<span itemprop="street-address">G. Sinamale' 1 (11-02), Buruzu Magu</span><br>
				<span itemprop="region">Kaafu</span>, <span itemprop="locality">Malé</span><br>
				<span itemprop="postal-code">20112</span><br>
				<span itemprop="country-name">Maldives</span>
			</dd>
		</dl>
		<h3>Digital Footprints?</h3>
		<ul>
			<li><a itemprop="url" href="http://blog.andho.com">Blog</a></li>
			<li><a itemprop="url" href="http://plus.google.com/109372953760940036839">Google Plus Profile</a></li>
			<li><a itemprop="url" href="http://github.com/andho">Github page</a></li>
			<li><a itemprop="url" href="http://facebook.com/andho">Facebook Profile</a></li>
			<li><a itemprop="url" href="http://twitter.com/andhos">Twitter page</a></li>
		</ul>
	</section>
	<section>
		<h2>Projects</h2>
		<p>See <a id="projects">my projects</a> at the projects page</p>
	</section>
</script>
<script type="text/html" id="projectspage">
	<section>
		<h1>Projects</h1>
		<dl>
			<dt><h2><a href="project/1/simdal-php-orm-for-ddd">SimDAL - <abbr title="Domain Driven Design">DDD</abbr> for PHP</a></h2></dt>
			<dd>SimDAL Description</dd>
			<dt><h2><a href="project/2/jquery-descriptify-plugin">Jquery Descriptify</a></h2></dt>
			<dd>Descriptify Description</dd>
			<dt><h2><a href="project/3/graylog2-logger-for-php-and-zend-log">UBelt-Graylog2-Logger</a></h2></dt>
			<dd>Graylog2 Logger for Zend_Log</dd>
			<dt><h2><a href="project/4/watchmen-keep-track-of-movies-youve-watched">WatchMen</a></h2></dt>
			<dd>Desktop app to keep track of movies you have watched on the file system</dd>
		</dl>
	</section>
</script>

<!-- Piwik -->
<script type="text/javascript">
    
//var pkBaseURL = (("https:" == document.location.protocol) ? "https://piwik.andho.com/" : "http://piwik.andho.com/");
//document.write(unescape("%3Cscript src='" + pkBaseURL + "piwik.js' type='text/javascript'%3E%3C/script%3E"));
</script><script type="text/javascript">
/*try {
var piwikTracker = Piwik.getTracker(pkBaseURL + "piwik.php", 1);
piwikTracker.trackPageView();
piwikTracker.enableLinkTracking();
} catch( err ) {}
*/
</script><noscript><p><img src="http://piwik.andho.com/piwik.php?idsite=1" style="border:0" alt="" /></p></noscript>
<!-- End Piwik Tracking Code -->

</body>
</html>

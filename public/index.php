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
  <script src="js/andho-view.js"></script>
  
  <script src="js/bootstrap.js"></script>
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

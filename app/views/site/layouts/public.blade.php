<!doctype html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>
            @section('title')
            Home - EduFocal
            @show
        </title>
        <meta name="keywords" content="Corporate learning, training, job recruitment" />
        <meta name="author" content="EduFocal" />
        <meta name="description" content="Corporate learning and training platform" />

        <!-- Mobile metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        
        <!-- CSS -->
        <link href="/assets/compiled/public/css/styles.css" rel="stylesheet" media="all" />
      
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Favicons
        ================================================== -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{{ asset('assets/ico/apple-touch-icon-144-precomposed.png') }}}">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{{ asset('assets/ico/apple-touch-icon-114-precomposed.png') }}}">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{{ asset('assets/ico/apple-touch-icon-72-precomposed.png') }}}">
        <link rel="apple-touch-icon-precomposed" href="{{{ asset('assets/ico/apple-touch-icon-57-precomposed.png') }}}">
    </head>
    <body>
    <div id="notification-bar"></div>
    <header>
      <div id="corporate" class="navbar navbar-fixed-top">
            <div class="container">
            <div class="navbar-header">
                <button data-toggle="collapse" class="navbar-toggle" data-target=".nav-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a id="logo" href="/" class="navbar-brand"><img src="/assets/images/logo.png" class="logo" /></a>
            </div>
            <nav class="navbar-collapse collapse pull-left" role="navigation">
                <ul class="nav navbar-nav">
                <li class="active"><a href="/">Overview</a></li>
                <li><a href="http://blog.edufocal.com/">EduFocal Blog</a></li>
                </ul>
            </nav>
            <div class="nav-right pull-right col-sm-3">
            <a class="btn btn-info btn-small login-active" id="login-button">Member Sign in</a>
            <form id="login-form" method="post" action="user/login">
                <label for="email">Email</label>
                <input name="email" value="" placeholder="Email address" class="form-control"/>
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control"
                <div class="form-group">
                  <div class="checkbox">
                      <label>
                          <input type="checkbox" name="remember"> Remember me
                      </label>
                  </div>
                </div>
                <hr />
                <button type="submit" value="submit" class="btn btn-primary btn-sm">Sign In</button>
                <a href="<//echo site_url('forgot_password')?>">Forgot Password?</a>
            </form>
            </div>
        </div>
    </header>

    <div class="container">
    <!-- notifications -->
    </div>

    <!-- Content -->
    @yield('content')
    <!-- ./content -->
<footer id="corporate-footer">
  <div class="container">
      <div class="copyright col-sm-2">
        <p>&copy; 2014 EduFocal Ltd. </p>
      </div>
      <div class="col-sm-2">
      <ul>
        <li><a href="/">Overview</a></li>
        <li><a href="/signup/">Sign Up</a></li>
      </ul>
      </div>
      <div class="col-sm-2">
      <ul>
        <li><a href="http://blog.edufocal.com">EduFocal Blog</a></li>
        <li><a href="{{{ URL::to('/') }}}">Terms of Service</a> </li>
        <li><a href="{{{ URL::to('/') }}}">Contact Us</a> </li>
        <li><a href="{{{ URL::to('/') }}}">Privacy Policy</a></li>
      </ul>
      </div>
      <div class="col-sm-6">
      <ul class="social">
        <li><a href="http://blog.edufocal.com" id="social-blog">EduFocal Blog</a> </li>
        <li><a href="http://blog.edufocal.com/feed/" id="social-rss">RSS</a></li>
        <li><a href="https://www.facebook.com/EduFocal" id="social-facebook">Facebook</a></li>
        <li><a href="https://twitter.com/EduFocal" id="social-twitter">Twitter</a></li>
      </ul>
      </div>
  </div>
</footer>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<div class="hide">
</div>
<!-- Javascripts -->
<script type="text/javascript" src="/assets/compiled/bootstrap.js"></script>
</body>

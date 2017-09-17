<header class="primary-controls">
  <div class="container">
    <a class="logo" href="{{ home_url('/') }}">
      <img src="@asset('images/logo.png')" alt="{{ get_bloginfo('name', 'display') }}"/>
    </a>
    <nav class="navbar navbar-expand-lg navbar-light bg-light pull-right" role="navigation">
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
          @if (has_nav_menu('primary_navigation'))
            {!! wp_nav_menu(['depth' => 2, 'theme_location' => 'primary_navigation', 'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'navbar-nav mr-auto']); !!}
          @endif
      </div>
    </nav>
  </div>
</header>
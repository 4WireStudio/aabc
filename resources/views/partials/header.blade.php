<div class="smoother">&nbsp;</div>
<header class="primary-controls">
  <div class="container">
    <div class="row no-gutters">
      <div class="col-sm-12">
        <nav class="navbar navbar-expand-lg navbar-light bg-light" role="navigation">
          
          <a class="navbar-brand logo" href="{{ home_url('/') }}">
            <img src="@asset('images/logo.png')" alt="{{ get_bloginfo('name', 'display') }}"/>
          </a>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
              @if (has_nav_menu('primary_navigation'))
                {!! wp_nav_menu([
                  'depth' => 2, 
                  'container' => '',
                  'theme_location' => 'primary_navigation', 
                  'walker' => new wp_bootstrap_navwalker(), 
                  'menu_class' => 'navbar-nav ml-auto']); !!}
              @endif
          </div>
          
        </nav>
      </div>
    </div>
  </div>
</header>
@if (is_front_page())
<div class="home-banner">
  <div class="banner-image"><img src="@asset('images/banner-1.jpg')" alt="first banner"/></div>
  <div class="banner-image"><img src="@asset('images/banner-2.jpg')" alt="first banner"/></div>
  <div class="banner-image"><img src="@asset('images/banner-3.jpg')" alt="first banner"/></div>
</div>
<div class="home-banner-content container">
  <div class="home-cta">
    @if (has_nav_menu('home_cta_menu'))
      {!! wp_nav_menu(['depth' => 2, 'theme_location' => 'home_cta_menu', 'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'navbar-nav mr-auto']); !!}
    @endif
  </div>
</div>
@else
<div class="page-banner">
  <!--Create something here to pull related banner images and rotate them with slick. for now... just a placeholder background -->
</div>
@endif
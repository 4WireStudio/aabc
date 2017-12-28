@if (is_front_page())
<div class="home-secondary-controls container d-none d-lg-block">

@php
  wp_nav_menu([
      'depth' => 1,
      'items_wrap' => '<div class="row row-eq-height no-gutters">%3$s</div>',
      'menu' => 'Home Secondary Menu',
      'walker' => new Simple_Cols_Navwalker()
  ]);
@endphp

</div>
@endif
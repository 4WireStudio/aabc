@if ((is_home()) and (!is_single()))
  <div class="row no-gutters">
    <div class="col-sm-12 featured-image">
      {!! get_the_post_thumbnail( get_option('page_for_posts'), 'full', ['class' => 'img-fluid']) !!}
    </div>
  </div>
@elseif( has_post_thumbnail() )
  <div class="row no-gutters">
    <div class="col-sm-12 featured-image page-featured-image">
      {{ the_post_thumbnail('full',['class' => 'img-fluid']) }}
    </div>
  </div>
@endif

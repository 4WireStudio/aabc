@if( has_post_thumbnail() )
  <div class="row no-gutters">
    <div class="col-12 featured-image">
      {{ the_post_thumbnail('full',['class' => 'img-fluid']) }}
    </div>
  </div>
@endif
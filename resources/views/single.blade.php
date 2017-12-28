@extends('layouts.app')

@section('content')

    <div class="container container-main-content posts-single-container">
      <div class="row">
        <div class="col-sm-12 col-lg-9">

          @while(have_posts()) @php(the_post())
            @include('partials.content-single-'.get_post_type())
          @endwhile

        </div>
        <div class="col-sm-12 col-lg-3 sidebar-primary d-none d-lg-block">
          @php(dynamic_sidebar('sidebar-primary'))
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 sidebar-mobile d-lg-none">
          @php(dynamic_sidebar('sidebar-primary'))
        </div>
      </div>
    </div>

@endsection
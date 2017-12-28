@extends('layouts.app')

@section('content')
  @if (is_front_page())
    <div class="container home-container container-main-content container-home-content">
      <div class="row">
        <div class="col-md-12 col-lg-8 home-page-content">
          @while(have_posts()) @php(the_post())
            @include('partials.content-page')
          @endwhile
        </div>
        <div class="col-md-12 col-lg-4 home-sidebar-content">
          @php(dynamic_sidebar('sidebar-home'))
        </div>
      </div>
    </div>
  @else
    <div class="container page-container container-main-content">
      <div class="row">
        <div class="col-sm-12 col-lg-9">
          @include('partials.page-featured-image')
          @while(have_posts()) @php(the_post())
            @include('partials.page-header')
            @include('partials.content-page')
          @endwhile
          @php(dynamic_sidebar('sidebar-trailing-content'))
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
  @endif
@endsection
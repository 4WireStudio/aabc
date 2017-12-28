{{--
  Template Name: Left Menu Layout
--}}

@extends('layouts.app')

@section('content')
  <div class="container container-main-content">
    <div class="row">
      <div class="col-md-3 sidebar-primary d-none d-md-block">
        @php(dynamic_sidebar('sidebar-primary'))
      </div>
      <div class="col-md-9">
        @include('partials.page-featured-image')
        @while(have_posts()) @php(the_post())
          @include('partials.page-header')
          @include('partials.content-page')
        @endwhile
        @php(dynamic_sidebar('sidebar-trailing-content'))
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12 sidebar-mobile d-md-none">
        @php(dynamic_sidebar('sidebar-primary'))
      </div>
    </div>
  </div>
@endsection

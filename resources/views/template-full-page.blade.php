{{--
  Template Name: Full Page Layout
--}}

@extends('layouts.app')

@section('content')
  <div class="container container-main-content">
    <div class="row">
      <div class="col-12">
        @include('partials.page-featured-image')
        @while(have_posts()) @php(the_post())
          @include('partials.page-header')
          @include('partials.content-page')
        @endwhile
        @php(dynamic_sidebar('sidebar-trailing-content'))
      </div>
    </div>
  </div>
@endsection
{{--
  Template Name: Right Menu Layout
--}}

@extends('layouts.app')

@section('content')
  <div class="container container-main-content">
    <div class="row">
      <div class="col-sm-9">
        @while(have_posts()) @php(the_post())
          @include('partials.page-header')
          @include('partials.content-page')
        @endwhile
      </div>
      <div class="col-sm-3">
        @php(dynamic_sidebar('sidebar-primary'))
      </div>
    </div>
  </div>
@endsection
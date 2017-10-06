@extends('layouts.app')

@section('content')
  @if (is_front_page())
    <div class="container container-main-content container-home-content">
      <div class="row">
        <div class="col-sm-8 home-page-content">
          @while(have_posts()) @php(the_post())
            @include('partials.content-page')
          @endwhile
        </div>
        <div class="col-sm-4 home-sidebar-content">
          @php(dynamic_sidebar('sidebar-home'))
        </div>
      </div>
    </div>
  @else
    <div class="container container-main-content">
      <div class="row">
        <div class="col-sm-9">
          @include('partials.page-featured-image')
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
  @endif
@endsection
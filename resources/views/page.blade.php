@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-sm-12">
      @while(have_posts()) @php(the_post())
        @include('partials.page-header')
        @include('partials.content-page')
      @endwhile
    </div>
  </div>
@endsection

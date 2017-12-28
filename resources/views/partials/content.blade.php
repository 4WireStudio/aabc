<article @php(post_class())>
  <div class="container">
    <div class="row">
      <div class="post-meta col-sm-2">
        @include('partials/entry-meta')
      </div>
      <div class="post-content col-sm-10">
        <header>
          <h2 class="entry-title"><a href="{{ get_permalink() }}">{{ get_the_title() }}</a></h2>
        </header>
        <div class="row">
          <div class="col-sm-12 entry-summary">
            @php(the_excerpt())
          </div>
        </div>
      </div>
    </div>
  </div>
</article>

<article @php(post_class())>
    @include('partials.page-featured-image')
    <div class="container">
      <div class="row">
        <div class="post-meta col-sm-2">
          @include('partials/entry-meta')
        </div>
        <div class="entry-content col">

          <header>
            <h2 class="entry-title">{{ get_the_title() }}</h2>
          </header>

          @php(the_content())

          <footer>
            <div class="row">
              <div class="col">
                
                {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
        
                @php(comments_template('/partials/comments.blade.php'))
              </div>
            </div>
          </footer>
        
        </div>
      </div>
    </div>
</article>

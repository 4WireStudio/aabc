<time class="updated" datetime="{{ get_post_time('c', true) }}">
  <div class="day">{{ get_the_date('d') }}</div>
  <div class="month-year">{{ get_the_date('M Y') }}</div>
</time>
<div class="comments text-center">
  {{ get_comments_number() }} Comments
</div>
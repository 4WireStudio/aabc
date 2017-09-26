@if (is_front_page())
<div class="home-banner">
  <div class="banner-image"><img src="@asset('images/banner-1.jpg')" alt="first banner"/></div>
  <div class="banner-image"><img src="@asset('images/banner-2.jpg')" alt="first banner"/></div>
</div>
<div class="home-banner-content">

</div>
@else
<div class="page-banner">
  <!--Create something here to pull related banner images and rotate them with slick. for now... just a placeholder background -->
</div>
@endif
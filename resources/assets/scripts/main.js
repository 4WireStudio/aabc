// import external dependencies
import 'jquery';

// Import everything from autoload
import "./autoload/**/*"

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import aboutUs from './routes/about';

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // About Us page, note the change from about-us to aboutUs.
  aboutUs,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());

jQuery(document).ready(function(){
  jQuery('.home-banner').slick({
    arrows: false,
    fade: true,
    dots: false,
    speed: 2000,
    autoplay: true,
    autoplaySpeed: 8000,
  });
});

// Add Slide Effect to Bootstrap navbar dropdowns
$('.dropdown').on('show.bs.dropdown', function(){
  $(this).find('.dropdown-menu').first().stop(true, true).slideDown(300);
});

$('.dropdown').on('hide.bs.dropdown', function(){
  $(this).find('.dropdown-menu').first().stop(true, true).slideUp(200);
});

// Anchor rightmost navbar items containing dropdowns to rightside of parent
$('ul#menu-top-main .nav-item:last-child .dropdown-menu').addClass( "dropdown-menu-right" );

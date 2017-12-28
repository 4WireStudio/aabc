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

jQuery(document).ready(function(){
  jQuery('.page-banner').slick({
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
$('ul#menu-top-main .nav-item:last-child .dropdown-menu').addClass("dropdown-menu-right");

// Add Bootstrap classes to contact form buttons
$('.contact-submit :submit').addClass("btn btn-outline-primary btn-lg");





// Make primary navbar sticky
$(window).scroll(function(){
    if ($(window).scrollTop() >= 60) {
       $('.primary-controls').addClass('fixed-header');
       $('.smoother').addClass('transition');
    }
    else {
       $('.primary-controls').removeClass('fixed-header');
       $('.smoother').removeClass('transition');
    }
});

//$('.contact-form input[type=text]').attr('placeholder', $("label[for='"+$(this).attr('id')+"']").html());

$('.contact-form input[type=text]').each(function() {
  $(this).attr('placeholder', $("label[for='"+$(this).attr('id')+"']").html().replace('<span>(required)</span>',' '));
});
$('.contact-form input[type=email]').each(function() {
  $(this).attr('placeholder', $("label[for='"+$(this).attr('id')+"']").html().replace('<span>(required)</span>',' '));
});

$('.contact-form label').hide();



// ADD BTN CLASSES TO SUBMIT BUTTONS
$('input.submit').addClass("btn btn-primary");
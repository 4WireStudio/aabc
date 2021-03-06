<?php

/**
 * Do not edit anything in this file unless you know what you're doing
 */

use Roots\Sage\Config;
use Roots\Sage\Container;

/**
 * Helper function for prettying up errors
 * @param string $message
 * @param string $subtitle
 * @param string $title
 */
$sage_error = function ($message, $subtitle = '', $title = '') {
    $title = $title ?: __('Sage &rsaquo; Error', 'sage');
    $footer = '<a href="https://roots.io/sage/docs/">roots.io/sage/docs/</a>';
    $message = "<h1>{$title}<br><small>{$subtitle}</small></h1><p>{$message}</p><p>{$footer}</p>";
    wp_die($message, $title);
};

/**
 * Ensure compatible version of PHP is used
 */
if (version_compare('7', phpversion(), '>=')) {
    $sage_error(__('You must be using PHP 7 or greater.', 'sage'), __('Invalid PHP version', 'sage'));
}

/**
 * Ensure compatible version of WordPress is used
 */
if (version_compare('4.7.0', get_bloginfo('version'), '>=')) {
    $sage_error(__('You must be using WordPress 4.7.0 or greater.', 'sage'), __('Invalid WordPress version', 'sage'));
}

/**
 * Ensure dependencies are loaded
 */
if (!class_exists('Roots\\Sage\\Container')) {
    if (!file_exists($composer = __DIR__.'/../vendor/autoload.php')) {
        $sage_error(
            __('You must run <code>composer install</code> from the Sage directory.', 'sage'),
            __('Autoloader not found.', 'sage')
        );
    }
    require_once $composer;
}

/**
 * Sage required files
 *
 * The mapped array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 */
array_map(function ($file) use ($sage_error) {
    $file = "../app/{$file}.php";
    if (!locate_template($file, true, true)) {
        $sage_error(sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file), 'File not found');
    }
}, ['helpers', 'setup', 'filters', 'admin', 'wp-bootstrap-navwalker', 'simple-cols-navwalker', 'cta-navwalker']);

/**
 * Here's what's happening with these hooks:
 * 1. WordPress initially detects theme in themes/sage/resources
 * 2. Upon activation, we tell WordPress that the theme is actually in themes/sage/resources/views
 * 3. When we call get_template_directory() or get_template_directory_uri(), we point it back to themes/sage/resources
 *
 * We do this so that the Template Hierarchy will look in themes/sage/resources/views for core WordPress themes
 * But functions.php, style.css, and index.php are all still located in themes/sage/resources
 *
 * This is not compatible with the WordPress Customizer theme preview prior to theme activation
 *
 * get_template_directory()   -> /srv/www/example.com/current/web/app/themes/sage/resources
 * get_stylesheet_directory() -> /srv/www/example.com/current/web/app/themes/sage/resources
 * locate_template()
 * ├── STYLESHEETPATH         -> /srv/www/example.com/current/web/app/themes/sage/resources/views
 * └── TEMPLATEPATH           -> /srv/www/example.com/current/web/app/themes/sage/resources
 */
array_map(
    'add_filter',
    ['theme_file_path', 'theme_file_uri', 'parent_theme_file_path', 'parent_theme_file_uri'],
    array_fill(0, 4, 'dirname')
);
Container::getInstance()
    ->bindIf('config', function () {
        return new Config([
            'assets' => require dirname(__DIR__).'/config/assets.php',
            'theme' => require dirname(__DIR__).'/config/theme.php',
            'view' => require dirname(__DIR__).'/config/view.php',
        ]);
    }, true);


function jetpackcom_custom_form_redirect( $redirect, $id, $post_id ) {

    $redirects = array(
        '1370' => home_url( 'page_on_your_site' ),
    );
 
    // Let's loop though each custom redirect.
    foreach ( $redirects as $origin => $destination ) {
        if ( $id == $origin ) {
            return $destination;
        }
    }
 
    // Default Redirect for all the other forms.
    return "/contact/thank-you";
}
add_filter( 'grunion_contact_form_redirect_url', 'jetpackcom_custom_form_redirect', 10, 3 );


//Add shortcode for page title
function shortcode_title( ){
   return get_the_title();
}
add_shortcode( 'page_title', 'shortcode_title' );

//Add shortcode for page url
function shortcode_page_url( ){
   return get_page_link();
}
add_shortcode( 'page_url', 'shortcode_page_url' );




//Integrate Advanced Custom Fields plugin with theme
add_filter('acf/settings/path', 'acf_settings_path');
function acf_settings_path( $path ) {
    $path = get_stylesheet_directory() . '/plugins/advanced-custom-fields/';
    return $path;
}
add_filter('acf/settings/dir', 'acf_settings_dir');
function my_acf_settings_dir( $dir ) {
    $dir = get_stylesheet_directory_uri() . '/plugins/advanced-custom-fields/';
    return $dir;
}
// add_filter('acf/settings/show_admin', '__return_false');
include_once( get_stylesheet_directory() . '/plugins/advanced-custom-fields/acf.php' );



//Add services schema to clild pages of "Services" page
function services_schema() {
    $page = get_queried_object();
    $parent_page_name = get_the_title( $page->post_parent);
    if ($parent_page_name == "Services") {
        echo "
            <script type=\"application/ld+json\">
                {
                    \"@context\": \"http://schema.org/\",
                    \"@type\": \"Service\",
                    \"serviceType\": \"" . get_the_title() . "\",
                    \"provider\": {
                        \"@type\": \"GeneralContractor\",
                        \"name\": \"Above & Beyond Contractors\"
                    },
                    \"areaServed\": {
                        \"@type\": \"State\",
                        \"name\": \"Connecticut\"
                    },
                    \"url\": \"" . get_page_link() . "\",
                    \"logo\": \"https://www.aboveandbeyondcontractors.com/wp-content/themes/aabc/resources/assets/images/logo.png\",
                    \"image\": \"https://www.aboveandbeyondcontractors.com/wp-content/themes/aabc/resources/assets/images/card.png\",
                    \"sameAs\": \"https://www.facebook.com/aboveandbeyondcontractors\",
                    \"sameAs\": \"https://twitter.com/AABContractors\"
                }
            </script>
        ";
    }
}

<?php

/* Check if Class Exists. */
if ( ! class_exists( 'Simple_Cols_Navwalker' ) ) {

    class Simple_Cols_Navwalker extends Walker_Nav_Menu {
        
        public function start_lvl( &$output, $depth = 0, $args = array() ) {
            $indent = str_repeat( "\t", $depth );
            // find all links with an id in the output.
            preg_match_all( '/(<a.*?id=\"|\')(.*?)\"|\'.*?>/im', $output, $matches );
            // with pointer at end of array check if we got an ID match.
            if ( end( $matches[2] ) ) {
                // build a string to use as aria-labelledby.
                $labledby = 'aria-labelledby="' . end( $matches[2] ) . '"';
            }

            $output .= "\n$indent<div role=\"menu\" class=\" row\" " . $labledby . ">\n";
        }

     
        public function end_lvl( &$output, $depth = 0, $args = array() ) {
            $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
            // Build HTML for output.
            $output .= "\n" . $indent . '</div>' . "\n";
        }

        public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
            global $wp_query;
            $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
     
            // Passed classes.
            $classes = empty( $item->classes ) ? array() : (array) $item->classes;
            $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
     
            // Build HTML.
            $output .= $indent . '<div class="col" id="nav-menu-item-'. $item->ID . '" class="' . $class_names . '">';
     
            // Link attributes.
            $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
            $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
            $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
            $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
            $attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';
     
            // Build HTML output and pass through the proper filter.
            $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
                $args->before,
                $attributes,
                $args->link_before,
                apply_filters( 'the_title', $item->title, $item->ID ),
                $args->link_after,
                $args->after
            );
            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        }

        public function end_el( &$output, $object, $depth = 0, $args = array() ) {
            $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
            // Build HTML for output.
            $output .= "\n" . $indent . '</div>' . "\n";
        }
    }
} // End if().

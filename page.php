<?php
/**
 * Template for displaying single pages.
 * 
 * @package Masonic
 * @version 1.0.0
 */

get_header();

if(have_posts()) {
    while(have_posts()) {
        the_post();
        the_content();
    }
}

get_footer(); 
?> 
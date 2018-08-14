<?php
/**
 * Twenty Sixteen back compat functionality
 *
 * Prevents Twenty Sixteen from running on WordPress versions prior to 4.4,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.4.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

/**
 * Prevent switching to Twenty Sixteen on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since Twenty Sixteen 1.0
 */

  // REMOVE GENERATOR VERSION NUMBER
  
  // remove version string from js and css
  function instrat_remove_wp_version_strings($src){
    global $wp_version;
    parse_str(parse_url($src, PHP_URL_QUERY), $query);
    if (!empty($query['ver']) && $query['ver'] === $wp_version){
      $src = remove_query_arg('ver', $src);
    }
    return $src;
  }

  add_filter('script_loader_src', 'instrat_remove_wp_version_strings');
  add_filter('style_loader_src', 'instrat_remove_wp_version_strings');

  // remove meta tag generator from header
  function instrat_remove_meta_version(){
    return '';
  }
  add_filter('the_generator', 'instrat_remove_meta_version');
?>
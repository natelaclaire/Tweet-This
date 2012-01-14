<?php
/*
Plugin Name: Tweet Shortcode
Plugin URI: http://natelaclaire.com/wordpress-plugins/tweet-shortcode
Description: Insert a link that will open a Twitter intent to tweet a quote with a link to the post/page.
Version: 0.1
Author: Nate LaClaire
Author URI: http://natelaclaire.com
License: GPL2
*/

function natelaclaire_tweet_shortcode( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'by'    => null,
      'tweet' => strip_tags($content),
      'label' => 'Tweet this',
      'link'  => get_the_permalink(),
      ), $atts ) );
   
   if ( ! is_null( $by ) ) {
   	  $tweet .= ' ~ @' . $by;
   }
   $tweet .= ' ' . $link;
   
   return $content . ' (<a class="tweet-this" href="http://twitter.com/intent/tweet?source=webclient&#038;text=' . htmlspecialchars(urlencode($tweet)) . '" title="Click to send this quote to Twitter!" target="_blank">' . $label . '</a>)';
}
add_shortcode( 'tweet_this', 'natelaclaire_tweet_shortcode' );
?>
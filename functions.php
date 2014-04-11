<?php
/*******************************************************************
/*  DEFINE 
/*******************************************************************/
define('THEMEROOT', get_stylesheet_directory_uri());
define('IMAGES',THEMEROOT.'/images');

/*******************************************************************
/*  menu 
/*******************************************************************/
function gaaonMenu(){
	register_nav_menus(array(
		'global-menus' => 'GNB'

	));
}
add_action("init","gaaonMenu");

/* ---------------------------------------------------------------------------
 * Current page URL
 * --------------------------------------------------------------------------- */
function curPageURL() {
	$pageURL = 'http';
	if ( key_exists("HTTPS", $_SERVER) && ( $_SERVER["HTTPS"] == "on" ) ){
		$pageURL .= "s";
	}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}

/* ---------------------------------------------------------------------------
 * Bootstrap Menu
 * --------------------------------------------------------------------------- */
require_once('lib/wp_bootstrap_navwalker.php');
/********** Import Source ************/
/*
 *
 <?php
  wp_nav_menu(array(
  'menu'=>'primary',
  'theme_location'=>'primary',
  'depth'=>2,'container'=>'div',
  'container_class'=>'collapse navbar-collapse navbar-ex1-collapse',
  'menu_class'=>'nav navbar-nav',
  'fallback_cb'=>'wp_bootstrap_navwalker::fallback',
  'walker'=>newwp_bootstrap_navwalker())
  );?>
 */
/* ---------------------------------------------------------------------------
* Breadcrumbs
* --------------------------------------------------------------------------- */

function wisewires_location() {

     global $post;
     $homeLink = home_url();
    
     $translate['home'] = "HOME";
     $translate['you-are-here'] = "you are here";

     echo '<div id="path">';
     echo '<a href="'. $homeLink .'">'. $translate['home'] .'</a> <span>/</span>';

     // Blog Category
     if ( is_category() ) {
          echo '<a href="'. curPageURL() .'">' . 'Archive by category'.' "' . single_cat_title('', false) . '"</a>';

     // Blog Day
     } elseif ( is_day() ) {
          echo '<a href="'. get_year_link(get_the_time('Y')) . '">'. get_the_time('Y') .'</a> <span>/</span>';
          echo '<a href="'. get_month_link(get_the_time('Y'),get_the_time('m')) .'">'. get_the_time('F') .'</a> <span>/</span>';
          echo '<a href="'. curPageURL() .'">'. get_the_time('d') .'</a>';

     // Blog Month
     } elseif ( is_month() ) {
          echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> <span>/</span>';
          echo '<a href="'. curPageURL() .'">'. get_the_time('F') .'</a>';

     // Blog Year
     } elseif ( is_year() ) {
          echo '<a href="'. curPageURL() .'">'. get_the_time('Y') .'</a>';

     // Single Post
     } elseif ( is_single() && !is_attachment() ) {
         
          // Custom post type
          if ( get_post_type() != 'post' ) {
               $post_type = get_post_type_object(get_post_type());
               $slug = $post_type->rewrite;
              
               if( $slug['slug'] == mfn_opts_get('portfolio-slug','portfolio-item') && $portfolio_page_id = mfn_opts_get('portfolio-page') )
               {
                    echo '<a href="' . get_page_link( $portfolio_page_id ) . '">'. get_the_title( $portfolio_page_id ) .'</a> <span>/</span>';
               } else {
                    echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> <span>/</span>';
               }
               echo '<a href="' . curPageURL() . '">'. wp_title( '',false ) .'</a>';
              
          // Blog post    
          } else {
               $cat = get_the_category();
               $cat = $cat[0];
               echo get_category_parents($cat, TRUE, '');
               echo ' <span>/</span>';
               echo '<a href="' . curPageURL() . '">'. wp_title( '',false ) .'</a>';
          }

     // Taxonomy
     } elseif( get_post_taxonomies() ) {

          $post_type = get_post_type_object(get_post_type());
          if( $post_type->name == 'portfolio' && $portfolio_page_id = mfn_opts_get('portfolio-page') ) {
               echo '<a href="' . get_page_link( $portfolio_page_id ) . '">'. get_the_title( $portfolio_page_id ) .'</a> <span>/</span>';
          }

          echo '<a href="' . curPageURL() . '">'. wp_title( '',false ) .'</a>';

     // Page with parent
     } elseif ( is_page() && $post->post_parent ) {
          $parent_id  = $post->post_parent;
          $breadcrumbs = array();
          while ($parent_id) {
               $page = get_page($parent_id);
               $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a> <span>/</span>';
               $parent_id  = $page->post_parent;
          }
          $breadcrumbs = array_reverse($breadcrumbs);
          foreach ($breadcrumbs as $crumb) echo $crumb;
         
          echo '<a href="' . curPageURL() . '">'. get_the_title() .'</a>';

     // Default
     } else {
          echo '<a href="' . curPageURL() . '">'. get_the_title() .'</a>';
     }

     echo '</div>';
}


/* ---------------------------------------------------------------------------
*  Hide admin bar
* --------------------------------------------------------------------------- */


function hide_admin_bar($flag) {
return false;
}
add_filter('show_admin_bar','hide_admin_bar');


/* ---------------------------------------------------------------------------
*  redirect users to front page after login
* --------------------------------------------------------------------------- */

function redirect_to_front_page() {
global $redirect_to;
if (!isset($_GET['redirect_to'])) {
$redirect_to = get_option('siteurl');
}
}
add_action('login_form', 'redirect_to_front_page');



/* ---------------------------------------------------------------------------
*  Thumbnail Images
* --------------------------------------------------------------------------- */
add_theme_support('post-thumbnails');
set_post_thumbnail_size( 260, 200, true ); 

/* Default image size -> 260px * 200px */


/* ---------------------------------------------------------------------------
*  Text cut functions
* --------------------------------------------------------------------------- */

/*
use case: 
__u_cut_string($value2['news_content'], 50,$start = 0,$code = 'UTF-8');
*/

function __u_cut_string($string, $sublen, $start = 0, $code = 'UTF-8')
{
  if($code == 'UTF-8'){
    $pa = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/";
    preg_match_all($pa, $string, $t_string);
    if(count($t_string[0]) - $start > $sublen)
      return join('', array_slice($t_string[0], $start, $sublen))."...";
    return join('', array_slice($t_string[0], $start, $sublen));
  }
  else{
    $start = $start*2;
    $sublen = $sublen*2;
    $strlen = strlen($string);
    $tmpstr = '';
    for($i=0; $i< $strlen; $i++)
    {
    if($i>=$start && $i< ($start+$sublen))
    {
    if(ord(substr($string, $i, 1))>129)
    {
      $tmpstr.= substr($string, $i, 2);
    }
    else
    {
    $tmpstr.= substr($string, $i, 1);
      }
    }
    if(ord(substr($string, $i, 1))>129)
        $i++;
  }
  if(strlen($tmpstr)< $strlen )
    $tmpstr.= "...";
    return $tmpstr;
  }
}


/* ---------------------------------------------------------------------------
*  category style
* --------------------------------------------------------------------------- */
function categoryStyle($num){
  $category = get_the_category($num);
  $categoryID = $category[0]->cat_ID;
  if($categoryID==5){
    echo "label-success";
  }else{
    echo "label-default";

  }

}

/* ---------------------------------------------------------------------------
*  category name
* --------------------------------------------------------------------------- */
function categoryName($num){
  $category = get_the_category($num);
  $category_name = $category[0]->cat_name;
  echo $category_name;

}





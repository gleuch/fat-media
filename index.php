<?php
/*
 ____     ______     ______                            __                  
/\  _`\  /\  _  \   /\__  _\        /'\_/`\           /\ \  __             
\ \ \L\_\\ \ \L\ \  \/_/\ \/       /\      \     __   \_\ \/\_\     __     
 \ \  _\/ \ \  __ \    \ \ \       \ \ \__\ \  /'__`\ /'_` \/\ \  /'__`\   
  \ \ \/ __\ \ \/\ \  __\ \ \  __   \ \ \_/\ \/\  __//\ \L\ \ \ \/\ \L\.\_ 
   \ \_\/\_\\ \_\ \_\/\_\\ \_\/\_\   \ \_\\ \_\ \____\ \___,_\ \_\ \__/.\_\
    \/_/\/_/ \/_/\/_/\/_/ \/_/\/_/    \/_/ \/_/\/____/\/__,_ /\/_/\/__/\/_/
     ______________________________________________________________________-
*/

require_once('includes/imageresize.php');
require_once('includes/fm_core.php');
require_once('config.php');


// initialize environment
$fm = new fatmedia();

// simple page caching, if enabled
// FIXME only cache RSS for now, need to test the rest more
$use_cache = empty($fm->reqs['rss']) ? false : true;
if(FF_CACHING_ENABLED && $use_cache) {
  $cachedir = dirname(__FILE__).'/cache/';
  @mkdir($cachedir); // create if it doesn't exist
  $cachetime = 900; // seconds; TODO FIXME configme
  $cacheext = 'cache'; // extension to give cached files

  $page = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
  $cachefile = $cachedir . md5($page) . '.' . $cacheext;
  $cachefile_created = (@file_exists($cachefile) && $use_cache) ? @filemtime($cachefile) : 0;
  clearstatcache();

  // show file from cache if still valid
  if (time() - $cachetime < $cachefile_created) {
    //ob_start('ob_gzhandler');
    readfile($cachefile);
    //ob_end_flush();
    exit();
  }
}

// invalidated cache; render & recache
ob_start();

// based on parsed request, decide what to do
if( isset($fm->reqs['photo']) && !empty($fm->reqs['photo']) ) {
  $fm->viewPhoto();
} elseif( !empty($fm->reqs['rss']) ) { /* FIXME will allow for any /rss URL, which doesn't really work */
  $fm->viewRSS();
} else { // index page is default action; also, dir will = 
  $fm->viewList();
}
    
// cache output, unless the magic bit has been set during rendering
if(FF_CACHING_ENABLED && $use_cache && !$DISABLE_CACHE) {
  $fp = fopen($cachefile, 'w');
  fwrite($fp, ob_get_contents());
  fclose($fp);    
  ob_end_flush();
}

?>

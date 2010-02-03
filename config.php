<?php
/*
 ____     ______     ______                            __                  
/\  _`\  /\  _  \   /\__  _\        /'\_/`\           /\ \  __             
\ \ \L\_\\ \ \L\ \  \/_/\ \/       /\      \     __   \_\ \/\_\     __     
 \ \  _\/ \ \  __ \    \ \ \       \ \ \__\ \  /'__`\ /'_` \/\ \  /'__`\   
  \ \ \/ __\ \ \/\ \  __\ \ \  __   \ \ \_/\ \/\  __//\ \L\ \ \ \/\ \L\.\_ 
   \ \_\/\_\\ \_\ \_\/\_\\ \_\/\_\   \ \_\\ \_\ \____\ \___,_\ \_\ \__/.\_\
    \/_/\/_/ \/_/\/_/\/_/ \/_/\/_/    \/_/ \/_/\/____/\/__,_ /\/_/\/__/\/_/

*/



// supported filetypes, and how they should be displayed
$FILETYPES = array(
  'image' => array('jpg','jpeg','gif','png','tiff','tga'),
  'video' => array('avi','xvid','mov','m4v','mp4','mpg','mpeg'),
  'audio'  => array('aiff','wav','mp3', 'ogg', 'flac'),
  'document' => array('txt','rtf','pdf','doc','ppt','xls') // TODO
  );
  


// Basic information about your installation
// ------------------------------------------------------------

// Site-wide name
define('FF_NAME', "F.A.T. PHOTOS");

// URL to your fatmedia system, with trailing slash
// (optional, should autodetect just fine)
define('FF_LINK', "http://fffff.at/fatmedia/");

// Your anti cloud data message for the title & footer of each page.
define('FF_ANTI_CLOUD_MSG', "FUCK the CLOUD");

// Title section separator.
define('FF_SEPARATOR', ' &ndash; ');

// Which theme would you like to use? located inside the 'themes' directory.
define('FF_USE_TEMPLATE', 'fatmedia');

// Use clean urls? like "/fatmedia/directory" instead of "/fatmedia/index.php?dir=directory"
// you must also uncomment the lines in the .htaccess file!
define('FF_CLEAN_URLS', true);

// We're not going to make you, but we like cc licenses vs hardcore copywrite.
define('FF_CC_LICENSE', '<a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/">Creative Commons Attribution-Noncommercial-Share Alike 3.0 License</a>');

// Do you like lightboxen for viewing? this is user togglable, but set a default
define('FF_LIGHTBOX_DEFAULT', true);

// any dirs you want to exclude from the index list? comma-separated (no spaces)
// can still view them by typing in the URL manually, they just won't be advertised
define('FF_EXCLUDE_DIRS', 'secret,top_secret');

// Image Quality
//   Optional "quality" parameter (defaults is 3). Fractional values are allowed, for example 1.5. Must be greater than zero.
//   Between 0 and 1 = Fast, but mosaic results, closer to 0 increases the mosaic effect.
//   1 = Up to 350 times faster. Poor results, looks very similar to imagecopyresized.
//   2 = Up to 95 times faster.  Images appear a little sharp, some prefer this over a quality of 3.
//   3 = Up to 60 times faster.  Will give high quality smooth results very close to imagecopyresampled, just faster.
//   4 = Up to 25 times faster.  Almost identical to imagecopyresampled for most images.
//   5 = No speedup. Just uses imagecopyresampled, no advantage over imagecopyresampled.
define('FF_IMG_QUALITY', 4);

// This is how many images fatmedia resizes on one refresh.
// 10 is a good amnt - you dont want to hammer your server.
// If it is set to 10 and you upload 20 pics then it will 
// take two page refreshes to process all the images.
define('FF_PROCESS_NUM', 30);

// Number of items per page. (0 means unlimited.)
define('FF_PER_PAGE', 0);

// Number of items per RSS feed.
define('FF_RSS_ITEM_COUNT', 15);

// Enable caching? Important if you have lots of photos.
// NOTE: only applies to RSS feeds currently
define('FF_CACHING_ENABLED', true);



// Standard directory structure
// ------------------------------------------------------------

// Folder to host album folders and files
define('FF_DATA_DIR', 'data/');

// Folder for thumbnail images
define('FF_DATA_THUMB_DIR', 'thumb/');

// Folder for web-sized images
define('FF_DATA_WEB_DIR', 'web/');

// Themes folder
define('FF_TEMPLATE_DIR', "themes/");

// Filename for text-based information storage
define('FF_DIR_INFO_FILENAME', 'info.yml');

// Filename for the album thumbnail image
define('FF_INDEX_THUMB_NAME', 'dir_thumb.jpg');



// Helper defined methods for newlines, spaces, breaks, etc.
// ------------------------------------------------------------
define('nl', "\n"); // Newlines
define('br', '<br />'. nl); // Breaks
define('FF_SPACES', '    '); // Tab spaces


?>

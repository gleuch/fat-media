<?php
// FAT Media theme: header.php
// page header, included on every page

// record how long this takes
$time = explode(' ', microtime());
$time = $time[1] + $time[0];
$begintime = $time;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<!--
 ____     ______     ______                            __                  
/\  _`\  /\  _  \   /\__  _\        /'\_/`\           /\ \  __             
\ \ \L\_\\ \ \L\ \  \/_/\ \/       /\      \     __   \_\ \/\_\     __     
 \ \  _\/ \ \  __ \    \ \ \       \ \ \__\ \  /'__`\ /'_` \/\ \  /'__`\   
  \ \ \/ __\ \ \/\ \  __\ \ \  __   \ \ \_/\ \/\  __//\ \L\ \ \ \/\ \L\.\_ 
   \ \_\/\_\\ \_\ \_\/\_\\ \_\/\_\   \ \_\\ \_\ \____\ \___,_\ \_\ \__/.\_\
    \/_/\/_/ \/_/\/_/\/_/ \/_/\/_/    \/_/ \/_/\/____/\/__,_ /\/_/\/__/\/_/
     ______________________________________________________________________

     Brought to you by the Free Art & Technology Lab (http://fffff.at)
-->
<head>
  <title><?php $this->pageTitle(); ?></title>

  <link rel="alternate" type="application/rss+xml" title="RSS Feed" href="<?php print $this->urlFor('rss', $this->dir); ?>" />

  <link href="<?php echo $this->dir_tmpl ?>css/stylesheet.css" rel="stylesheet" type="text/css" media="screen" charset="utf-8" />
  <link href="<?php echo $this->dir_tmpl ?>css/thickbox.css" rel="stylesheet" type="text/css" media="screen" charset="utf-8" />
  <!--[if lt IE 7]><style type="text/css">.preview a { border-color: #000000; }</style><![endif]-->
  
  <script type="text/javascript" charset="utf-8">var tb_pathToImage = "<?php echo $this->dir_tmpl ?>images/loading.gif";</script>
  <script src="<?php echo $this->dir_tmpl ?>js/jquery.js" type="text/javascript" charset="utf-8"></script>
  <script src="<?php echo $this->dir_tmpl ?>js/jquery.thickbox.js" type="text/javascript" charset="utf-8"></script>
  <script src="<?php echo $this->dir_tmpl ?>js/jquery.preload-min.js" type="text/javascript" charset="utf-8"></script>
  <script src="<?php echo $this->dir_tmpl ?>js/flashembed.min.js" type="text/javascript" charset="utf-8"></script>
  <script src="<?php echo $this->dir_tmpl ?>js/application.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<div id="container">
  <div id="header">

    <!-- have it your way -->
    <div id="settings"><form>
      <script type="text/javascript">console.log('lightbox cookie: <?php (array_key_exists('fatmedia_lightbox', $_COOKIE)) ? print_r($_COOKIE["fatmedia_lightbox"]) : '' ?>');</script>
      <?php 
        $lightbox_enabled = (array_key_exists('fatmedia_lightbox', $_COOKIE) && !empty($_COOKIE['fatmedia_lightbox']) ? $_COOKIE['fatmedia_lightbox'] : FF_LIGHTBOX_DEFAULT);
        $checked = ($lightbox_enabled == 'true' ? 'checked="checked"' : '');
      ?>
      <label for="lightbox">use lightbox: </label><input type="checkbox" id="lightbox" name="lightbox" value="lightbox" <?php echo $checked ?> /><br />
      <label for="ff_sort">sort by: </label><select id="ff_sort" name="sort">
        <option value="<?php echo $this->urlFor('dir', $this->dir, '', '', 'sort') ?>"<?php if (array_key_exists('sort', $this->reqs) && $this->reqs['sort'] == 'date') echo ' selected' ?>>Recently Added</option>
        <option value="<?php echo $this->urlFor('dir', $this->dir, '', 'sort=name', 'sort') ?>"<?php if (array_key_exists('sort', $this->reqs) && $this->reqs['sort'] == 'name') echo ' selected' ?>>Name</option>
      </select><noscript><input type="submit" value="Sort" /></noscript></form>
    </div> <!-- /#settings -->
    
    <!-- humping graphic -->
    <div id="logo">
      <a href="<?php echo $this->dir_root ?>"><img src="<?php echo $this->dir_tmpl ?>images/fflickr_logo_PG_150px.gif" border="0" style="background-color: #FFFFFF;" /></a>
    </div>
  
    <!-- anti-yahoo propaganda; TODO make configurable -->
    <div id="fatmedia-info">
      <a href="http://fffff.at/fatmedia-info">Click here</a> to download FAT Media 
      and learn more about why we should all be boycotting Yahoo products.
    </div>
  
  </div> <!-- /#header -->

  <div id="navigation">
    <!-- rss -->
    <a href="<?php print $this->urlFor('rss', $this->dir); ?>" title="RSS feed of new adds" class="rss"><img src="<?php echo $this->dir_tmpl ?>images/feed-icon32x32.png" border="0" /></a>    
    
    <!-- regular title -->
    <a href="http://fffff.at">FFFFF.AT</a> / <a href="<?php echo $this->dir_root ?>">FAT Media</a>
    <?php 
    // TODO clean this up. could use a directory(), parent(), breadcrumbs(), navigation() etc.
    if ($this->dir != FF_DATA_DIR)
      $parent = str_replace(FF_DATA_DIR, '', $this->dir);
      $built = '';
      foreach (explode('/', str_replace(FF_DATA_DIR, '', $this->dir)) as $dir) {
        if (empty($dir)) continue;
        $path = FF_DATA_DIR . $built . $dir .'/';
        if (empty($this->dir_info[$path . $dir])) $this->readDirInfo($path, $path);
        $url = preg_replace('/\/$/','',$this->urlFor( 'dir', $built . cleanDirname($dir)) ).'/'; // strip possible trailing slash (?) and add again
        echo ' / <a href="'.$url.'">'. ((!empty($this->dir_info[$path]['directory']['title'])) ? $this->dir_info[$path]['directory']['title'] : $dir) .'</a>'; 
        $built .= $dir .'/';
      }

    ?>
  </div>

  <div id="main">

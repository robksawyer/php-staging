<?php
include '_includes/ssi/siteconfig.php';
include '_includes/ssi/checkauth.php';
if($_SESSION['is_partner'] == true) echo "<script>window.location = '".$tld."/unavailable';</script>";
?>
<!DOCTYPE html>
<html xmlns="//www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $page_title; ?> | Client Preview</title>
<link rel="shortcut icon" href="<?php echo $tld; ?>_includes/images/favicon.ico" type="image/x-icon">
<style type="text/css" media="all">@import url(<?php echo $tld; ?>_includes/styles/styles.css);</style>
<script type="text/javascript" src="<?php echo $tld; ?>_includes/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $tld; ?>_includes/js/rzf.extranet.projectcontent.js"></script>
<script>if(typeof window.history.pushState=='function'){window.history.pushState({},"Hide","<?php echo "//".$_SERVER['HTTP_HOST'].strtok($_SERVER["REQUEST_URI"],'?'); ?>");}</script>
</head>


<body class="root<?php echo $bodyclasses; ?>">
<?php include '_includes/ssi/header.php'; ?>

<div id="content">

<?php
/* Project Info Widget */
if($_SESSION['is_admin'] == false && $infowidget == "true"){
  include '_includes/ssi/aside-info.php';
}

/* Add New Year Widget */
if($_SESSION['is_admin'] == true && $addyearwidget == "true"){
  $_SESSION['edit_redirect'] = curPageURL();
  include '_includes/ssi/add-year.php';
}

/* Accordion Nav Widget */
if($navwidget == "true"){
  include '_includes/ssi/aside-accordion.php';
  mkmap(".");
  echo "</div><!--|.asidewrap|-->\n</aside>";
}
?>

<section>
<script type="text/javascript">breadcrumbs(); window.onload = jQuery.reject;</script>

<article>
<h1><?php echo $page_title; ?></h1>

<?php
$dir_path = $_SERVER["DOCUMENT_ROOT"] . strtok($_SERVER["REQUEST_URI"],'?');

/* Directory Navigation with SCANDIR */
function dir_nav() {
  global $exclude_list, $dir_path;
  $directories = array_diff(scandir($dir_path,1), $exclude_list);
  $extravar = "";

  foreach($directories as $entry) {
  $file_entry = str_replace("-", " ", $entry);
  $file_entry = str_replace("_", " ", $file_entry);
  $foldertoggle = strstr($file_entry, ' internal');
  $extravar .= "1";

    if(is_dir($dir_path.$entry)) {
      echo "<h2><a href='//".$_SERVER['HTTP_HOST']."/".$entry."/"."'>".$entry."</a>\n";

      	// Outputs [DELETE] function for admin users only.
        if($_SESSION['is_admin'] == false){
          	//Show Nothing
        }

        else{
         	// Deletes Year/Folder
        	if(isset($_GET['tdelete'.$extravar])){
            	system("rmdir ".escapeshellarg($entry) . " /s /q"); //Delete for Windows
              exec ('rm -rf '.$entry); //Delete for Linux
              echo "<script>location.reload();</script>";
          	}
          	// Output Admin Controls
        	echo "<span class='edit-del'>&#91; <a href='?tdelete".$extravar."=' class='confirm-del-year'>Delete</a> &#93;</span>\n";
		  }
    }
    echo "</h2>\n";
  }
  if($extravar == ""){
?>

<br>
<h2>Getting Started</h2>
<br>
<p>It looks like this is a newly installed version of the <?php echo $brand; ?> Client Preview platfrom. If this is a new site, visit the
<a href="<?php echo $tld."settings/";?>"><u>Settings</u></a> page to configure the site. Once the settings are setup, you can immediatly
start adding years (see the panel on the left) or visit the <a href="<?php echo $tld."user-guide/";?>"><u>User Guide</u></a> to better
learn how to use this site.</p>

<?php
  }
}
dir_nav();
?>

</article>
</section>
</div><!--|#content|-->

<?php include '_includes/ssi/footer.php'; ?>
</body></html>

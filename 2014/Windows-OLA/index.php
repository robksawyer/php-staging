<?php
/**
 * VARIABLES TO UPDATE
 * $logo = The logo on the top left of the page.
 * $logo = The logo on the top right of the page.
 * $orgin_path = The path you want to start from.
 * 
 */

$orgin_path = '.';
$logo = "/_includes/logo-windows.jpg";
$logo2 = "/_includes/logo-razorfish.png";
$page_title = "Windows OLA";
$location = "<strong>Razorfish Portland</strong><br>
700 SW Taylor<br>Suite 400<br>Portland, OR 97205<br>";
$contact = "<strong>Firstname Lastname</strong><br>
Account Director<br>
(123) 456-7890<br>
first.last@razorfish.com";


$directories_to_ignore = array('.','..','styles','includes','Scripts','com','css','fonts','js');
$filetypes_to_ignore = array('zip','swf','txt','bak','php','tiff','tif','DS_Store','fla','js','xml','as','f4v');
?>

<?php include '../../_includes/ssi/head.php'; ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $page_title; ?></title>
<style type="text/css" media="all">@import url(<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/styles/styles.css);</style>
<script type="text/javascript" src="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/js/breadcrumbs.js"></script>
<script type="text/javascript" src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/_includes/js/swfObject.jquery.js"></script>
<script type="text/javascript" src="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/js/rzf.extranet.projectcontent.js"></script>

<script type="text/javascript">
<?php $ds = DIRECTORY_SEPARATOR; ?>
<?php $uploadPath = urlencode(realpath(dirname(__FILE__).$ds."uploads")); ?>
var uploadPath = "<?php echo $uploadPath; ?>";
</script>

<link rel="shortcut icon" href="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/images/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/images/favicon.ico" type="image/x-icon">
</head>


<body class="client">
<?php include '../../_includes/ssi/header.php'; ?>

<div id="content">
<?php #include '../../_includes/ssi/aside-info.php'; ?>
<?php include '../../_includes/ssi/aside-uploader.php'; ?>
<?php include '../../_includes/ssi/aside-accordion.php'; ?>
<?php #include '../../_includes/ssi/aside-public.php'; ?> 

<section>
<script>breadcrumbs();</script>

<article>
<h1><?php echo $page_title; ?></h1>

<h2>Banners</h2>
<div id="bannersContainer" class="linksContainer">

</div>

<h2>Images</h2>
<div id="imagesContainer" class="linksContainer">

</div>

<h2>Documents</h2>
<div id="documentsContainer" class="linksContainer">

</div>


<?php include '_cms/cms.php'; ?>

</article>
</section>
</div><!--|#content|-->

<?php include '../../_includes/ssi/footer.php'; ?>
<script>

$(function() {

	var pattern = new RegExp(/_(([0-9]{2,4})x)([0-9]{2,4})/);

	$('.linksContainer').on('click', '.assetLink', function(e){
		e.preventDefault();
		var _assetLink = this;
		var assetDimensions = {};
		var assetExpand = {};
		var assetObject = {};
		$('body').remove('#downloadIFrame');
		$('.linksContainer .assetExpand').hide(200, function(){
			
			$(_assetLink).removeClass('open');
			if($(this).has('div')){
				$(this).flash().remove();
			}
			$(this).remove();
		})

		if(!$(_assetLink).hasClass('open')){
			$(_assetLink).addClass('open');
			if(!$(_assetLink).hasClass('doc')){
				dimensionsTemp = $(_assetLink).attr('href').match(pattern);
				assetDimensions.width = dimensionsTemp[2];
				assetDimensions.height = dimensionsTemp[3];
				assetExpand = document.createElement('div');
				$(assetExpand).addClass('assetExpand');
				$(assetExpand).css({'height': (assetDimensions.height)});
				$(assetExpand).css({'width': assetDimensions.width});
				$(assetExpand).hide();
				$(_assetLink).after(assetExpand);
				if($(_assetLink).hasClass('img')){
					assetObject = document.createElement('img');
					$(assetObject).attr('src', $(_assetLink).attr('href'));
					$(assetExpand).append(assetObject)
				}else if($(_assetLink).hasClass('swf')){
					assetObject = document.createElement('div');
					$(assetObject).attr('id', 'swfContainer');
					$(assetExpand).append(assetObject);
					console.log($(_assetLink).attr('href'));
					$(assetObject).flash({swf:$(_assetLink).attr('href'),height:assetDimensions.height,width:assetDimensions.width});
				}
				$(assetExpand).show(300);
			}else{
				var temp = window.open($(_assetLink).attr('href'));
				// temp.document.execCommand('SaveAs', 'null', $(_assetLink).attr('href'));
				// temp.close();
				// $("body").append("<iframe id='downloadIFrame' src='" + $(_assetLink).attr('href') + "' style='display: none;' ></iframe>")	
			}
		}
		
	})
	

});

</script>
</body></html>
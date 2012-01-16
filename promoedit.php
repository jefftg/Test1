<?php require_once('Connections/local.php'); ?>

<?php

session_start();

include("incsx/db.class.php");

include("php-form-builder-class/class.form.php");



$db = new DB("portal01", "localhost", "root", "tnmdig501");



$form = new form("promoedit");
$form->setAttributes(array(
	"width" => "500",
	"method" => "POST",
	"action" => "tester2.php"
)); 
?>



<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
$promoid = $_REQUEST['recordID'];
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "promo")) {
  $updateSQL = sprintf("UPDATE digital_promotions SET dig_isbn_13=%s, p_isbn_13=%s, promo_title=%s, promo_author=%s, retailer=%s, promo_type=%s, promo_start_date=%s, promo_end_date=%s, promo_desc=%s, spu=%s, portal_group=%s, `commit`=%s, updatedby=%s, lastupdated=%s WHERE promo_id=%s",
                       GetSQLValueString($_POST['dig_isbn_13'], "text"),
                       GetSQLValueString($_POST['p_isbn_13'], "text"),
                       GetSQLValueString($_POST['promo_title'], "text"),
                       GetSQLValueString($_POST['promo_author'], "text"),
                       GetSQLValueString($_POST['retailer'], "text"),
                       GetSQLValueString($_POST['promo_type'], "text"),
                       GetSQLValueString($_POST['promo_start_date'], "date"),
                       GetSQLValueString($_POST['promo_end_date'], "date"),
                       GetSQLValueString($_POST['promo_desc'], "text"),
                       GetSQLValueString($_POST['portal_group'], "text"),
                       GetSQLValueString($_POST['commit'], "text"),
                       GetSQLValueString($_POST['updatedby'], "text"),
                       GetSQLValueString($_POST['lastupdated'], "date"),
                       GetSQLValueString($_POST['promoid'], "text"));

  mysql_select_db($database_local, $local);
  $Result1 = mysql_query($updateSQL, $local) or die(mysql_error());

  $updateGoTo = "search.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "promo")) {
  $updateSQL = sprintf("UPDATE digital_promotions SET promo_id=%s, dig_isbn_13=%s, p_isbn_13=%s, promo_author=%s, retailer=%s, promo_type=%s, promo_start_date=%s, promo_end_date=%s, promo_desc=%s, spu=%s, portal_group=%s, `commit`=%s, updatedby=%s, lastupdated=%s WHERE promo_title=%s",
                       GetSQLValueString($_POST['promoid'], "text"),
                       GetSQLValueString($_POST['dig_isbn_13'], "text"),
                       GetSQLValueString($_POST['p_isbn_13'], "text"),
                       GetSQLValueString($_POST['promo_author'], "text"),
                       GetSQLValueString(isset($_POST['retailer']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString($_POST['promo_type'], "undefined"),
                       GetSQLValueString($_POST['promo_start_date'], "date"),
                       GetSQLValueString($_POST['promo_end_date'], "date"),
                       GetSQLValueString($_POST['promo_desc'], "text"),
                       GetSQLValueString($_POST['portal_group'], "text"),
                       GetSQLValueString($_POST['commit'], "text"),
                       GetSQLValueString($_POST['updatedby'], "text"),
                       GetSQLValueString($_POST['lastupdated'], "date"),
                       GetSQLValueString($_POST['promo_title'], "text"));

  mysql_select_db($database_local, $local);
  $Result1 = mysql_query($updateSQL, $local) or die(mysql_error());
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "promo")) {
  $updateSQL = sprintf("UPDATE digital_promotions SET `commit`=%s WHERE promoid=%s",
                       GetSQLValueString(isset($_POST['commit']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString($_POST['promoid'], "text"));

  mysql_select_db($database_local, $local);
  $Result1 = mysql_query($updateSQL, $local) or die(mysql_error());
}

mysql_select_db($database_local, $local);
$query_rsPromo = "SELECT * FROM digital_promotions WHERE promoid = '$promoid'";
$rsPromo = mysql_query($query_rsPromo, $local) or die(mysql_error());
$row_rsPromo = mysql_fetch_assoc($rsPromo);
$totalRows_rsPromo = mysql_num_rows($rsPromo);

mysql_select_db($database_local, $local);
$query_rsRetailer = "SELECT DISTINCT dist_point FROM digital_dist WHERE CHAR_LENGTH(dist_point) > 2 ORDER BY dist_point ASC";
$rsRetailer = mysql_query($query_rsRetailer, $local) or die(mysql_error());
$row_rsRetailer = mysql_fetch_assoc($rsRetailer);
$totalRows_rsRetailer = mysql_num_rows($rsRetailer);

mysql_select_db($database_local, $local);
$query_rsType = "SELECT DISTINCT promo_type from digital_promotions";
$rsType = mysql_query($query_rsType, $local) or die(mysql_error());
$row_rsType = mysql_fetch_assoc($rsType);
$totalRows_rsType = mysql_num_rows($rsType);

mysql_select_db($database_local, $local);
$query_rsPG = "SELECT DISTINCT portal_group FROM dig_idx WHERE portal_group !='NA'";
$rsPG = mysql_query($query_rsPG, $local) or die(mysql_error());
$row_rsPG = mysql_fetch_assoc($rsPG);
$totalRows_rsPG = mysql_num_rows($rsPG);
?>
<?php

$dig_isbn_13 = $row_rsPromo['dig_isbn_13'];
$p_isbn_13 = $row_rsPromo['p_isbn_13'];
$promo_title = $row_rsPromo['promo_title'];
$promo_author = $row_rsPromo['promo_author'];
$retailer = $row_rsPromo['retailer'];
$promo_type = $row_rsPromo['promo_type'];
$promo_title = $row_rsPromo['promo_title'];
$promo_start_date = $row_rsPromo['promo_start_date'];
$promo_end_date = $row_rsPromo['promo_end_date'];
$promo_desc = $row_rsPromo['promo_desc'];

$portal_group = $row_rsPromo['portal_group'];
$commit = $row_rsPromo['commit'];
$promoid = $row_rsPromo['promoid'];


?>
<!DOCTYPE HTML>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Promotions Edit</title>
<!--[if IE 6]>
		<script type="text/javascript"
		    src="scripts/DD_belatedPNG_0.0.8a-min.js"></script>
		<script type="text/javascript">
		// <![CDATA[
		    DD_belatedPNG.fix('.pngfix, img, #home-page-content li, #page-content li, #bottom li, #footer li, #recentcomments li span');
		// ]]>
		</script>
		<![endif]-->
<meta name="robots" content="index,follow" />
<link rel="stylesheet" id="reset-css" href="styles/common-css/reset.css?ver=1.0" type="text/css" media="screen" />
<link rel="stylesheet" id="text-css" href="styles/style1/css/text.css?ver=1.0" type="text/css" media="screen" />
<link rel="stylesheet" id="grid-960-css" href="styles/common-css/960.css?ver=1.0" type="text/css" media="screen" />
<link rel="stylesheet" id="superfish_menu-css" href="scripts/superfish-1.4.8/css/superfish.css?ver=1.0" type="text/css" media="screen" />
<link rel="stylesheet" id="pagination-css" href="scripts/pagination/pagenavi-css.css?ver=1.0" type="text/css" media="screen" />
<link rel="stylesheet" id="style-css" href="styles/style1/css/style.css?ver=1.0" type="text/css" media="screen" />
<link rel="stylesheet" id="pretty_photo-css" href="scripts/prettyPhoto/css/prettyPhoto.css?ver=1.0" type="text/css" media="screen" />
<script type="text/javascript" src="scripts/jquery-1.3.2.min.js?ver=2.9.2"></script>
<script type="text/javascript" src="scripts/cufon/cufon-yui.js?ver=1.09"></script>
<script type="text/javascript" src="scripts/cufon/eurofurence_500-eurofurence_700.font.js?ver=1.0"></script>
<script type="text/javascript" src="scripts/prettyPhoto/js/jquery.prettyPhoto.js?ver=2.5.6"></script>
<script type="text/javascript" src="scripts/jquery-validate/jquery.validate.min.js?ver=1.6"></script>
<script type="text/javascript" src="scripts/masked-input-plugin/jquery.maskedinput.min.js?ver=1.2.2"></script>
<script type="text/javascript" src="scripts/superfish-1.4.8/js/hoverIntent.js?ver=1.0.0"></script>
<script type="text/javascript" src="scripts/superfish-1.4.8/js/superfish.js?ver=1.4.8"></script>
<script type="text/javascript" src="scripts/superfish-1.4.8/js/supersubs.js?ver=0.2.0"></script>
<script type="text/javascript" src="scripts/script.js?ver=1.0"></script>
<!--[if lte IE 8]>
		    <link rel="stylesheet" href="styles/common-css/ie-all.css" media="screen" type="text/css" />
		<![endif]-->
<!--[if lte IE 7]>
		    <link rel="stylesheet" href="styles/common-css/ie6-7.css" media="screen" type="text/css" />
		<![endif]-->
<!--[if IE 6]>
		    <link rel="stylesheet" href="styles/common-css/ie6.css" media="screen" type="text/css" />
		    <style type="text/css">
			body{ behavior: url("scripts/csshover3.htc"); }
		    </style>
		<![endif]-->
</head>
<body>
<div id="wrapper-1" class="pngfix">
  <div id="top-container" class="container_24">
    <div class="clear"></div>
    <div id="top" class="grid_24">
      <div id="logo" class="grid_14">
        <h1> <a class="pngfix" style="background: transparent url( styles/style1/images/tn_logo.png) no-repeat 0 100%; width:300px; height:83px;" href="index.php">Home</a> </h1>
      </div>
      
      <!-- end logo--> 
      
      <!-- end top-icons --> 
    </div>
    <!-- end top -->
    <div class="clear"></div>
    <div id="dropdown-holder" class="grid_24">
      <div class="nav_bg pngfix">
        <ul class="sf-menu">
          <li><a href="index.php"><span>Home</span></a></li>
        </ul>
      </div>
    </div>
    <!-- end dropdown-holder --> 
    </div>
  <!-- end top-container -->
  <div class="clear"></div>
  <div id="page-content">
    <div id="page-content-header" class="container_24">
      <div id="page-title">
        <h2>Promotions Edit</h2>
        </div>
      <p class="breadcrumbs"><span class="breadcrumb_info">You are here:</span> <a href="index.php">Home</a><span class="breadarrow"> &raquo; </span><span class="current_crumb">Promotions Edit</span></p>
      </div>

    <div id="column-bg">
      <div id="column" class="container_24">
        <div id="column_1" class="column_3_of_4">
        <div class="column-content-wrapper">
              <div class="column-col-content widget_text substitute_widget_class">
                <h3 class="column-col-title2">Promotions Administration of <?php echo $promo_title ?> at <?php echo $retailer ?></h3>
                <hr width="100%" size="1" />
              
<?php $form->addTextbox("Digital ISBN 13:", "dig_isbn_13", "$dig_isbn_13") ?>

<?php $form->addTextbox("Print ISBN 13:", "p_isbn_13", "$p_isbn_13"); ?>

<?php $form->addTextbox("Title:", "promo_title", "$promo_title"); ?>

<?php $form->addTextbox("Author:", "promo_author", "$promo_author"); ?>

<?php $form->addSelect("Publishing Group", "portal_group", "$portal_group", array("Bible & Reference", "Fiction", "Non-Fiction", "Specialty", "Grupo")); ?>

          
          
          <!-- end column_1 -->

                
<?php                 
$form->addSelect("Retailers", "retailer", "$retailer", array("Amazon", "Apple", "Barnes and Noble", "Blio", "CBD","Copia", "eChristian", "Google", "KOBO","Logos","Olive Tree", "OverDrive","ReThink Books", "Sony")); ?>


<?php $form->addSelect("Promo Type", "promo_type", "$promo_type", array("Blog", "Category Merch", "eBlast", "Homepage Merch", "Price Promotions")); 
 ?>

<?php $form->addDate("Promo Start Date", "promo_start_date", "$promo_start_date", array("jqueryOptions" => array("dateFormat" => "yy-mm-dd"
)));

?>


<?php $form->addDate("Promo End Date", "promo_end_date", "$promo_end_date", array("jqueryOptions" => array(
    "dateFormat" => "yy-mm-dd"
)));

 $form->addTextarea("Promo Description", "promo_desc","$promo_desc"); ?>



<?php $form->addSelect("Commit To Portal?", "commit", "No", array("Yes", "No")); 

$form->addButton("Submit", "Submit");

$form->addHidden("promoid","$promoid");


$form->render();

?>    

                </div>
              </div>
            </div>
          </div>
          <!-- end content-wrapper -->
          
          <div class="clear"></div>
          <div class="back-to-top"><a href="#top">Back to Top</a></div>
          <div class="clear"></div>
        </div>
      </div>
      <!-- end main-content-padding -->

  </div>
  <!-- end page-content -->
  
  <div class="clear"></div>
 <?php include("incsx/footer.inc"); ?>
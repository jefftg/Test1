<?php session_start(); ?>


<!DOCTYPE HTML>

<?php

include($_SERVER["DOCUMENT_ROOT"] . "/PFBC/Form.php");

$form = new Form("targetDiv", 700);
$form->configure(array(
	"method" => "POST",
	"action" => "devo-out.php")); 
?>


  
  
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Demo</title>
  <meta name="description" content="PUT CONTEENT IN HERE"> <!-- INPUT METADATA (PRODUCT INFO) -->
  <meta name="author" content=""> <!-- INPUT METADATA (PRODUCT INFO) -->

  <!-- Mobile viewport optimized: j.mp/bplateviewport -->
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->

  <!-- CSS: implied media=all -->
  <!-- CSS concatenated and minified via ant build script-->
  	<link rel="stylesheet" id="reset-css" href="styles/common-css/reset.css?ver=1.0" type="text/css" media="screen" />
		<link rel="stylesheet" id="text-css" href="styles/style1/css/text.css?ver=1.0" type="text/css" media="screen" />
		<link rel="stylesheet" id="grid-960-css" href="styles/common-css/960.css?ver=1.0" type="text/css" media="screen" />
		<link rel="stylesheet" id="superfish_menu-css" href="scripts/superfish-1.4.8/css/superfish.css?ver=1.0" type="text/css" media="screen" />
		<link rel="stylesheet" id="pagination-css" href="scripts/pagination/pagenavi-css.css?ver=1.0" type="text/css" media="screen" />
		<link rel="stylesheet" id="style-css" href="styles/style1/css/style.css?ver=1.0" type="text/css" media="screen" />
		<link rel="stylesheet" id="pretty_photo-css" href="scripts/prettyPhoto/css/prettyPhoto.css?ver=1.0" type="text/css" media="screen" />
		
		<link rel="stylesheet" id="style47" href="styles/style47.css" type="text/css" media="screen" />
		
		<link rel="stylesheet" type="text/css" href="auto/include/jquery.autocomplete.css" />
  <!-- end CSS-->



  <!-- All JavaScript at the bottom, except for Modernizr / Respond.
  
       Modernizr enables HTML5 elements & feature detects; Respond is a polyfill for min/max-width CSS3 Media Queries
       For optimal performance, use a custom Modernizr build: www.modernizr.com/download/ -->
 
 <!--the auto-complete jq and included scripts-->
 
       
<script type="text/javascript" src="auto/include/jquery-1.2.6.pack.js"></script>
<script type="text/javascript" src="auto/include/jquery.autocomplete.pack.js"></script>


<script type="text/javascript">
$().ready(function() {
	$("#targetDiv").autocomplete("auto/include/mysql.php", {
		width: 180,
		selectFirst: true
	});
	
});
</script>  

<!--end auto-complete--> 
       
  <script src="scripts/js/modernizr.js"></script>
</head>
<body>

<div id="wrapper-1" class="pngfix">
  <div id="top-container" class="container_24">
    <div class="clear"></div>
    <article id="top" class="container_24">
      <section id="logo" class="grid_14">
        <h1> <a class="pngfix" style="background: transparent url( styles/style1/images/tn_logo.png) no-repeat 0 100%; width:300px; height:83px;" href="index.html">Home</a> </h1>
      </section>
      
      <!-- end logo--> 
      
      <!-- end top-icons --> 
    </article>
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
        <h2>Nelson Devotional Database - development site</h2>
      </div>
      <p class="breadcrumbs"><span class="breadcrumb_info"></span> 
    </div>
    
    <div id="column" class="container_24">
    <!-- begin form -->
    
        <!-- begin form -->
  
 <div class="container_24">  

<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/smoothness/jquery-ui.css"/><style type="text/css">#searchhome .pfbc-label label { font-weight: bold; }
#searchhome .pfbc-label em { font-size: .9em; color: #888; }
#searchhome .pfbc-label strong { color: #990000; }
#searchhome .pfbc-textbox, #searchhome .pfbc-textarea, #searchhome .pfbc-select { border: 1px solid #ccc; font-size: 14px; }
#searchhome .pfbc-textbox, #searchhome .pfbc-textarea { padding: 7px; }
#searchhome .pfbc-select { padding: 6px 7px; }#searchhome { width: 700px; }
#searchhome .pfbc-element { margin-bottom: 1em; padding-bottom: 1em; border-bottom: 1px solid #f4f4f4; }
#searchhome .pfbc-label { margin-bottom: .25em; }
#searchhome .pfbc-label label { display: block; }
#searchhome .pfbc-textbox, #searchhome .pfbc-textarea, #searchhome .pfbc-select { width: 700px; }
#searchhome .pfbc-buttons { text-align: right; }#searchhome .pfbc-error { padding: .5em; margin-bottom: 1em; }
#searchhome .pfbc-error ul { padding-left: 1.75em; margin: 0; margin-top: .25em; }</style><form action="devo-out-book.php" id="searchhome" method="POST"><div class="pfbc-element"><div class="pfbc-label"><label for="searchhome-element-0">Search by Book Title:</label></div><input type="text" class="pfbc-textbox" name="targetDiv" id="searchhome-element-0"/></div><div class="pfbc-element pfbc-buttons"><button type="submit" name="" id="searchhome-element-1">Submit</button></div></form><script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script><script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script><script type="text/javascript">jQuery(document).ready(function() {jQuery("#searchhome :input:visible:enabled:first").focus();jQuery("#searchhome .pfbc-element:last").css({ "margin-bottom": "0", "padding-bottom": "0", "border-bottom": "none" });jQuery("#searchhome-element-0").outerWidth(jQuery("#searchhome-element-0").width());jQuery("#searchhome-element-1").button();	});	
</script>	</div>
   
 <?php
 
 
    
    //seachfield for w/ autocomplete
    
//   $form->addElement(new Element_Textbox("Search:", "q", array(
//    	"id" => "targetDiv",
//    	"name" => "q",
//    	"description" => "Search..."
//    )));
//    
//    //button on form
//    
//    $form->addElement(new Element_Button("Go Git It!"));
//	$form->render();
?>
</div>  

<?php
//HTML code from auto on Portal
?>

<!--<div id="search" class="grid_7 prefix_17">
        <form action="devo-out.php" method="POST">
          <div class="search_box">
            <input id="targetDiv" name="q" type="text" class="inputbox_focus inputbox pngfix" placeholder="Search..." />
            <input type="submit" value="" class="search-btn pngfix" />
          </div>
        </form>
      </div>
       end search -->


      
      
      <div id="column" class="container_24">
        <div id="column_1" class="column_1_of_4">
          <div class="column-content-wrapper">
            <div class="column-col-content widget_text substitute_widget_class">

            </div>
          </div>
        </div>
      </div>
      <div id="column" class="container_24">
        <div id="column" class="column_2_of_3">
          <div class="column-content-wrapper">
            <div class="column-col-content widget_text substitute_widget_class">

            </div>
          </div>
        </div>
      </div>
      
      <!-- Scroll_begin -->
      
      <div id="column-bg">
        <div id="column" class="container_24">
          <div id="column" class="column_2_of_3">
            <div class="column-content-wrapper">
              <div class="column-col-content widget_text substitute_widget_class"> 
                <!-- HTML Codes by Quackit.com -->

              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Scroll_end --> 
      
      <!-- Dates_begin -->
      
      <div id="column-bg">
        <div id="column" class="container_24">
          <div id="column_1" class="column_1_of_4">
            <div class="column-content-wrapper">
              <div class="column-col-content widget_text substitute_widget_class">
                <div>

                </div>
              </div>
            </div>
          </div>
          
          <!-- end column_1 -->
          
          <div id="column_2" class="column_1_of_4">
            <div class="column-content-wrapper">
              <div class="column-col-content widget_text substitute_widget_class">
                <div>

                </div>
              </div>
            </div>
          </div>
          <!-- end dates --> 
        </div>
      </div>
      
      <!-- Promo_desc_URL_begin -->
      
      <div id="column-bg">
        <div id="column" class="container_24">
          <div id="column_1" class="column_2_of_3">
            <div class="column-content-wrapper">
              <div class="column-col-content widget_text substitute_widget_class">

              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="column-bg">
        <div id="column" class="container_24">
          <div id="column_1" class="column_2_of_3">
            <div class="column-content-wrapper">
              <div class="column-col-content widget_text substitute_widget_class">

              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="column-bg">
        <div id="column" class="container_24 .grid_1">
          <div id="column_1" class="column_1_of_6">
            <div class="column-content-wrapper">
              <div class="column-col-content widget_text substitute_widget_class">
                <div>

                </div>
              </div>
            </div>
          </div>
          <div id="column_2" class="column_1_of_6">
            <div class="column-content-wrapper">
              <div class="column-col-content widget_text substitute_widget_class">
                <div>

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


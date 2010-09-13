<?php
if (!defined('XOOPS_ROOT_PATH')) { exit(); }

$adminmenu = array();

$adminmenu[]= array("link"    	=> "admin/admin.php",
                    "title"    	=> _VJM_AM_MAININDEX,
					"icon"		=> "images/vjmixesmain.png");
$adminmenu[]= array("link"    	=> "admin/admin.php?op=list",
                    "title"    	=> _VJM_AM_VJMIXESLIST,
					"icon"		=> "images/videolist.png");
$adminmenu[]= array("link"    	=> "admin/admin.php?op=list&fct=cats",
                    "title"    	=> _VJM_AM_VJMIXESCATSLIST,
					"icon"		=> "images/videocatslist.png");
$adminmenu[]= array("link"    	=> "admin/admin.php?op=cats&fct=new",
                    "title"    	=> _VJM_AM_VJMIXESCATSNEW,
					"icon"		=> "images/videocatsnew.png");
$adminmenu[]= array("link"    	=> "admin/admin.php?op=new",
                    "title"    	=> _VJM_AM_VJMIXESNEWITEM,
					"icon"		=> "images/videocnew.png");

?>
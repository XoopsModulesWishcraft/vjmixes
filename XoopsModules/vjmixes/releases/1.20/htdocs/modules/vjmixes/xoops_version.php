<?php
/**
 * Private message module
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code 
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright       The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license         http://www.fsf.org/copyleft/gpl.html GNU public license
 * @package         pm
 * @since           2.3.0
 * @author          Jan Pedersen
 * @author          Taiwen Jiang <phppp@users.sourceforge.net>
 * @version         $Id: xoops_version.php 2022 2008-08-31 02:07:17Z phppp $
 */
 
/**
 * This is a temporary solution for merging XOOPS 2.0 and 2.2 series
 * A thorough solution will be available in XOOPS 3.0
 *
 */

$modversion = array();
$modversion['name'] = _VJM_MI_NAME;
$modversion['version'] = 1.20;
$modversion['description'] = _VJM_MI_DESC;
$modversion['author'] = "Simon Roberts (simon@chronolabs.org.au)";
$modversion['credits'] = "To my Friend Gary Arthy";
$modversion['license'] = "SDLC (Software Directive Licence Commercial)";
$modversion['image'] = "images/vjmixes_slogo.png";
$modversion['dirname'] = "vjmixes";
$modversion['releasedate'] = "Wed: December 09, 2009";

// Admin things
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = "admin/admin.php";
$modversion['adminmenu'] = "admin/menu.php";

// Mysql file
$modversion['sqlfile']['mysql'] = "sql/mysql.sql";

// Table
$modversion['tables'][1] = "vjmixes_video";
$modversion['tables'][2] = "vjmixes_video_category";

// Scripts to run upon installation or update
//$modversion['onInstall'] = "include/install.php";
//$modversion['onUpdate'] = "include/update.php";

$videoHandler =& xoops_getmodulehandler('video', 'vjmixes');
$videos = $videoHandler->getObjects(NULL, true);

if (is_array($videos))
foreach ($videos as $id => $video) {
	$ii++;
	$modversion['sub'][$ii]['name'] = $video->getVar('name');
	$modversion['sub'][$ii]['url'] = "index.php?op=view&id=".$id;
}

// Templates
$modversion['templates'] = array();
$modversion['templates'][1]['file'] = 'vjmixes_index.html';
$modversion['templates'][1]['description'] = '';
$modversion['templates'][2]['file'] = 'vjmixes_categories.html';
$modversion['templates'][2]['description'] = '';
$modversion['templates'][3]['file'] = 'vjmixes_info.html';
$modversion['templates'][3]['description'] = '';
$modversion['templates'][4]['file'] = 'vjmixes_category.html';
$modversion['templates'][4]['description'] = '';
$modversion['templates'][5]['file'] = 'vjmixes_vids.html';
$modversion['templates'][5]['description'] = '';

// Comments
$modversion['hasComments'] = 1;
$modversion['comments']['itemName'] = 'id';
$modversion['comments']['pageName'] = 'index.php';

// Comment callback functions
$modversion['comments']['callbackFile'] = 'include/comment_functions.php';
$modversion['comments']['callback']['approve'] = 'vjmixes_com_approve';
$modversion['comments']['callback']['update'] = 'vjmixes_com_update';

// Menu
$modversion['hasMain'] = 1;

?>
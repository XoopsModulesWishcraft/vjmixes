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
$modversion['version'] = 1.01;
$modversion['description'] = _VJM_MI_DESC;
$modversion['author'] = "Simon Roberts (simon@chronolabs.org.au)";
$modversion['credits'] = "To my Friend Gary Arthy";
$modversion['license'] = "SDLC (Software Directive Licence Commercial)";
$modversion['image'] = "images/vjmixes_slogo.png";
$modversion['dirname'] = "vjmixes";

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
$modversion['comments']['pageName'] = 'info.php';

// Comment callback functions
$modversion['comments']['callbackFile'] = 'include/comment_functions.php';
$modversion['comments']['callback']['approve'] = 'vjmixes_com_approve';
$modversion['comments']['callback']['update'] = 'vjmixes_com_update';

// Menu
$modversion['hasMain'] = 1;

/*
$modversion['config'] = array();
$modversion['config'][]=array(
	'name' => 'paypalEmail',
	'title' => '_CMP_MI_PAYPAL_EMAIL',
	'description' => '_CMP_MI_PAYPAL_EMAIL_DESC',
	'formtype' => 'textbox',
	'valuetype' => 'text',
	'default' => 'niki@chemical-reaction.biz');

$modversion['config'][]=array(
	'name' => 'paypalAmount',
	'title' => '_CMP_MI_PAYPAL_AMOUNT',
	'description' => '_CMP_MI_PAYPAL_AMOUNT_DESC',
	'formtype' => 'textbox',
	'valuetype' => 'int',
	'default' => 30);

$modversion['config'][]=array(
	'name' => 'components',
	'title' => '_CMP_MI_COMPONENTS',
	'description' => '_CMP_MI_COMPONENTS_DESC',
	'formtype' => 'select',
	'valuetype' => 'text',
	'options' => array(2 => 2, 4 => 4, 6 => 6, 10 => 10, 12 => 12, 15 => 15, 17 => 17, 20 => 20, 30 => 30, 35 => 35, 40 => 40, 60 => 60, 80 => 80, 100 => 100),
	'default' => 20);

$modversion['config'][]=array(
	'name' => 'collectcash',
	'title' => '_CMP_MI_COLLECTCASH',
	'description' => '_CMP_MI_COLLECTCASH_DESC',
	'formtype' => 'yesno',
	'valuetype' => 'int',
	'default' => 1);
	
$modversion['config'][]=array(
	'name' => 'score',
	'title' => '_CMP_MI_SCORE',
	'description' => '_CMP_MI_SCORE_DESC',
	'formtype' => 'select',
	'valuetype' => 'text',
	'options' => array(2 => 2, 4 => 4, 6 => 6, 10 => 10, 12 => 12, 15 => 15, 17 => 17, 20 => 20, 30 => 30, 35 => 35, 40 => 40, 60 => 60, 80 => 80, 100 => 100),
	'default' => 6);
	
$modversion['config'][]=array(
	'name' => 'paypalDisclaimer',
	'title' => '_CMP_MI_PAYPAL_DISCLAIMER',
	'description' => '_CMP_MI_PAYPAL_DISCLAIMER_DESC',
	'formtype' => 'textarea',
	'valuetype' => 'text',
	'default' => 'Due to molecular chargebacks and cost involved in this service your score has increased to a point where <em><strong>donation is required</strong></em>. This donation is taken in forthright of your understanding of <em><strong>molecular chargeback and payback</strong></em> in <em>chemical reactions</em>. Please ensure you fill out your details as we require you to place payment immediately to continue using this service.');
	*/
?>
<?php

	include( '../../mainfile.php' );
	
	$myts =& MyTextSanitizer::getInstance();
	
	$videoCatHandler =& xoops_getmodulehandler('video_category', 'vjmixes');
	$videoHandler =& xoops_getmodulehandler('video', 'vjmixes');
	
	$op = !empty($_REQUEST['op']) ? strtolower($_REQUEST['op']) : 'new';
	$id = !empty($_REQUEST['id']) ? (int)($_REQUEST['id']) : 0;
	$cid = !empty($_REQUEST['cid']) ? (int)($_REQUEST['cid']) : 0;
	
	$module_handler =& xoops_gethandler('module');
	$xoModule = $module_handler->getByDirname('vjmixes');
	$config_handler =& xoops_gethandler('config');
	$xoConfigs = $config_handler->getConfigList($xoModule->getVar('mid'));		

	switch ( $op )	{		
	case 'cat':
		$xoopsOption['template_main'] = "vjmixes_vids.html";
		include XOOPS_ROOT_PATH . '/header.php';
			
		$vidcat = $videoCatHandler->get($cid);
		$xoopsTpl->assign('xoops_pagetitle', $vidcat->getVar('name'));
		$xoopsTpl->assign('category', $vidcat->getVar('name'));
		
		$criteria = new Criteria('cid', $cid);
		$criteria->setOrder('RAND()');
		$videos = $videoHandler->getObjects($criteria);	
		foreach($videos as $key => $object)
			$xoopsTpl->append('videos', $object->getValues());

		$criteria = new Criteria('cid', $cid);
		$criteria->setOrder('RAND()');
		$videos = $videoHandler->getObjects($criteria);	
		$xoopsTpl->assign('video', $videos[0]->getValues());
		
		include_once XOOPS_ROOT_PATH."/modules/tag/include/tagbar.php";
		$xoopsTpl->assign('tagbar', tagBar($videos[0]->getVar('id'), $videos[0]->getVar('cid')));
				
		include XOOPS_ROOT_PATH . '/footer.php';
		exit(0);
	
		break;
	case 'view':
		$xoopsOption['template_main'] = "vjmixes_info.html";
		include XOOPS_ROOT_PATH . '/header.php';
		
		$video = $videoHandler->get($id);	
		$xoopsTpl->assign('video', $video->getValues());
		$xoopsTpl->assign('xoops_pagetitle', $video->getVar('name'));
		
		include_once XOOPS_ROOT_PATH."/modules/tag/include/tagbar.php";
		$xoopsTpl->assign('tagbar', tagBar($video->getVar('id'), $video->getVar('cid')));
		
		include XOOPS_ROOT_PATH . '/footer.php';
		exit(0);
		break;
	default:
		$xoopsOption['template_main'] = "vjmixes_index.html";
		include XOOPS_ROOT_PATH . '/header.php';
		
		$criteria = new Criteria('weight', '0', '>');
		$criteria->setOrder('weight');
		$categories = $videoCatHandler->getObjects($criteria, true);
		foreach($categories as $key => $object)
			$xoopsTpl->append('categories', $object->getValues());
		
		$criteria = new Criteria('uid', '0', '>');
		$criteria->setOrder('RAND()');
		$videos = $videoHandler->getObjects($criteria);	
		$xoopsTpl->assign('video', $videos[0]->getValues());
		
		include_once XOOPS_ROOT_PATH."/modules/tag/include/tagbar.php";
		$xoopsTpl->assign('tagbar', tagBar($videos[0]->getVar('id'), $videos[0]->getVar('cid')));
		
		include XOOPS_ROOT_PATH . '/footer.php';
		exit(0);
		break;
	}
?>
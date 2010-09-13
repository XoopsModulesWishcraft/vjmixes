<?php
	
	include_once( 'form.objects.php' );
	
	function formVideoCats($cid)
	{
		$cform = new XoopsThemeForm(_VJM_FRM_VJMIXES_CATS_FORM, 'vjmixescats');
		$cform->setExtra('enctype="multipart/form-data"');
		
		$videoCatsHandler =& xoops_getmodulehandler('video_category', 'vjmixes');
		
		if (intval($cid)<>0)
			$vcats =& $videoCatsHandler->get(intval($cid));
		else
			$vcats =& $videoCatsHandler->create();
			
		$cform->addElement(new XoopsFormText(_VJM_FRM_VJMIXES_WEIGHT, 'weight', 4, 13, !isset($_REQUEST['weight'])?$vcats->getVar('weight'):$_REQUEST['weight']));
		$cform->addElement(new XoopsFormText(_VJM_FRM_VJMIXES_NAME, 'name', 70, 128, !isset($_REQUEST['name'])?$vcats->getVar('name'):$_REQUEST['name']));
		if (strlen($vcats->getVar('image')))
			$cform->addElement(new XoopsFormLabel(_VJM_FRM_VJMIXES_CURRENT_IMAGE, "<img src='".XOOPS_URL."/uploads/".$vcats->getVar('image')."' width='160px'>"), false);
		$cform->addElement(new XoopsFormFile(_VJM_FRM_VJMIXES_IMAGE, 'image', 1024*1024*3), false);
		$description_editor = !isset($_REQUEST['description_editor'])?'xinha':$_REQUEST['description_editor'];
		$cform->addElement(new XoopsFormSelectEditor($cform, 'description_editor', $description_editor));
		$description_config['name'] = 'description';
		$description_config['editor'] = $description_editor;
		$description_config['value'] = !isset($_REQUEST['description'])?$vcats->getVar('description'):$_REQUEST['description'];
		$description_config['width'] = 379;
		$description_config['height'] = 479;
		$ele_description = new XoopsFormEditor(_VJM_FRM_VJMIXES_DESCRIPTION, 'description', $description_config);
		$ele_description->setDescription(_VJM_FRM_VJMIXES_DESCRIPTION_DESC);
		$cform->addElement($ele_description);
		$cform->addElement(new XoopsFormHidden('description_editor_current', $description_editor));
		$cform->addElement(new XoopsFormHidden('cid', $cid));
		$cform->addElement(new XoopsFormHidden('op', $_REQUEST['op']));
		$cform->addElement(new XoopsFormHidden('fct', 'save'));
		
		$cform->addElement(new XoopsFormButton('', 'contents_submit', _SUBMIT, "submit"));
		return $cform->render();
	
	}

	function formCatsList($video_objects, $videoHandler)
	{
		$lform = new XoopsThemeForm(_VJM_FRM_CATEGORY_LIST, 'videocatlist');
		$lform->setExtra('enctype="multipart/form-data"');
		foreach($video_objects as $key => $video) {
			$lele[$key] = new XoopsFormElementTray(sprintf(_VJM_ELE_VJMIXES_LIST, $video->getVar('cid')));
			$lele[$key]->setDescription( $video->getVar('name') );
			$lele[$key]->addElement(new XoopsFormLabel('', '<a href="'.XOOPS_URL.'/modules/vjmixes/admin/admin.php?op=cats&fct=edit&id='.$video->getVar('cid').'">'._EDIT.'</a>'));
			$lele[$key]->addElement(new XoopsFormLabel('', '<a href="'.XOOPS_URL.'/modules/vjmixes/admin/admin.php?op=cats&fct=delete&id='.$video->getVar('cid').'">'._DELETE.'</a>'));
			$lform->addElement($lele[$key]);
			
		}
		return $lform->render();
	}
		
	function formVideo($video_id) {
		$cform = new XoopsThemeForm(_VJM_FRM_VJMIXES_FORM, 'vjmixes');
		$cform->setExtra('enctype="multipart/form-data"');
		$videoHandler =& xoops_getmodulehandler('video', 'vjmixes');
		
		if (intval($_REQUEST['id'])<>0)
			$video =& $videoHandler->get(intval($_REQUEST['id']));
		else
			$video =& $videoHandler->create();
		
		$description_editor = !isset($_REQUEST['description_editor'])?'xinha':$_REQUEST['description_editor'];
		
		$cat = new VjmixesFormSelectCategory(_VJM_FRM_CATEGORY, 'cid', $video->getVar('cid'));
		$cat->setDescription(_VJM_FRM_CATEGORY_DESC);
		$cform->addElement($cat);

		$cform->addElement(new XoopsFormText(_VJM_FRM_VJMIXES_NAME, 'name', 70, 128, !isset($_REQUEST['name'])?$video->getVar('name'):$_REQUEST['name']));
		if (strlen($video->getVar('image')))
			$cform->addElement(new XoopsFormLabel(_VJM_FRM_VJMIXES_CURRENT_IMAGE, "<img src='".XOOPS_URL."/uploads/".$video->getVar('image')."' width='160px'>"), false);
		
		$cform->addElement(new XoopsFormFile(_VJM_FRM_VJMIXES_IMAGE, 'image', 1024*1024*3), false);
		
		$cform->addElement(new XoopsFormSelectEditor($cform, 'description_editor', $description_editor));
		$description_config['name'] = 'description';
		$description_config['editor'] = $description_editor;
		$description_config['value'] = !isset($_REQUEST['description'])?$video->getVar('description'):$_REQUEST['description'];
		$description_config['width'] = 379;
		$description_config['height'] = 479;
		$ele_description = new XoopsFormEditor(_VJM_FRM_VJMIXES_DESCRIPTION, 'description', $description_config);
		$ele_description->setDescription(_VJM_FRM_VJMIXES_DESCRIPTION_DESC);
		$cform->addElement($ele_description);

		$cform->addElement(new XoopsFormTextArea(_VJM_FRM_VJMIXES_EMBEDDED, 'embedded', !isset($_REQUEST['embedded'])?$video->getVar('embedded'):$_REQUEST['embedded'], 5, 70));

		if (class_exists('XoopsFormTag'))
			$cform->addElement(new XoopsFormTag('video_tags', 70, 255, $_REQUEST['id']));

		$cform->addElement(new XoopsFormHidden('description_editor_current', $description_editor));
		$cform->addElement(new XoopsFormHidden('id', $_REQUEST['id']));
		$cform->addElement(new XoopsFormHidden('op', $_REQUEST['op']));
		$cform->addElement(new XoopsFormHidden('fct', 'save'));
		
		$cform->addElement(new XoopsFormButton('', 'contents_submit', _SUBMIT, "submit"));
		return $cform->render();
	}	
	
	function formList($video_objects, $videoHandler)
	{
		$lform = new XoopsThemeForm(_VJM_FRM_VJMIXES_LIST, 'videolist');
		$lform->setExtra('enctype="multipart/form-data"');
		foreach($video_objects as $key => $video) {
			$lele[$key] = new XoopsFormElementTray(sprintf(_VJM_ELE_VJMIXES_LIST, $video->getVar('id')));
			$lele[$key]->setDescription( $video->getVar('name') );
			$lele[$key]->addElement(new XoopsFormLabel('', '<a href="'.XOOPS_URL.'/modules/vjmixes/admin/admin.php?op=edit&id='.$video->getVar('id').'">'._EDIT.'</a>'));
			$lele[$key]->addElement(new XoopsFormLabel('', '<a href="'.XOOPS_URL.'/modules/vjmixes/admin/admin.php?op=delete&id='.$video->getVar('id').'">'._DELETE.'</a>'));
			$lele[$key]->addElement(new XoopsFormTag('video_tags', 35, 255, $video->getVar('id')));
			$lform->addElement($lele[$key]);
			
		}
		return $lform->render();
	}
	
	function formVote($session)
	{
		$cform = new XoopsThemeForm(_VJM_FRM_VOTE_FORM, 'vote');
		$cform->setExtra('enctype="multipart/form-data"');
		$votesel = new XoopsFormSelect(_VJM_FRM_VOTE_STARS, 'stars',0 , 10);
		$votesel->addOption('10', '10 Stars');
		$votesel->addOption('9', '9 Stars');
		$votesel->addOption('8', '8 Stars');
		$votesel->addOption('7', '7 Stars');
		$votesel->addOption('6', '6 Stars');
		$votesel->addOption('5', '5 Stars');
		$votesel->addOption('4', '4 Stars');
		$votesel->addOption('3', '3 Stars');
		$votesel->addOption('2', '2 Stars');
		$votesel->addOption('1', '1 Stars');
		$cform->addElement($votesel);
		$cform->addElement(new XoopsFormHidden('op', 'vote'));
		$cform->addElement(new XoopsFormHidden('id', $session['id']));
		$cform->addElement(new XoopsFormHidden('ip', $session['ip']));
		$cform->addElement(new XoopsFormHidden('addy', $session['addy']));
		$cform->addElement(new XoopsFormButton('', 'contents_submit', _SUBMIT, "submit"));
		return $cform->render();
	}

?>

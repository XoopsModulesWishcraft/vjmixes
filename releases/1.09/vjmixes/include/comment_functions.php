<?php

function vjmixes_com_update($item_id, $total_num)
{
	$videoHandler =& xoops_getmodulehandler('video', 'vjmixes');
	$video = $videoHandler->get($item_id);
	$video->setVar('comments', $total_num);
	@$videoHandler->insert($video);
} 

function vjmixes_com_approve(&$comment)
{ 
    // notification mail here
} 


?>
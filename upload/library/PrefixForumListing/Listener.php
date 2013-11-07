<?php
class PrefixForumListing_Listener
{
	public static function template_hook($hookName, &$contents, array $hookParams, XenForo_Template_Abstract $template)
	{
		switch ($hookName)
		{
			case 'forum_view_pagenav_before':

				$templateParams = $template->getParams();

				if(	isset($templateParams['forum']['node_id']) 
					&&
					!in_array($templateParams['forum']['node_id'], XenForo_Application::get('options')->get('pfl_display_in_forums'))
				)
				{
					break;
				}
	
				$viewParams = array_merge($templateParams, $hookParams);
				$ourTemplate = $template->create('pfl_prefixes_list', $viewParams);
				$rendered = $ourTemplate->render();
				$contents .= $rendered;	
			break;
		}
	}

	public static function extendControllerPublicForum($class, array &$extend)
	{
		switch ($class)
		{
			case 'XenForo_ControllerPublic_Forum':
				$extend[] = 'PrefixForumListing_Extend_ControllerPublic_Forum';
				break;
		}
	}

	public static function extendDwDiscussionThread($class, array &$extend)
	{
		switch ($class)
		{
			case 'XenForo_DataWriter_Discussion_Thread':
				$extend[] = 'PrefixForumListing_Extend_DataWriter_Discussion_Thread';
				break;
		}
	}	
}
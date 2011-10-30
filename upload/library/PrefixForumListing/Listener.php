<?php
class PrefixForumListing_Listener
{
	public static function template_hook ($hookName, &$contents, array $hookParams, XenForo_Template_Abstract $template)
	{
		if ($hookName == 'forum_view_pagenav_before')
		{
			
			$viewParams = array_merge($template->getParams(), $hookParams); // then you have access
			$ourTemplate = $template->create('pfl_prefixes_list', $viewParams);
			$rendered = $ourTemplate->render();
			$contents .= $rendered;			
		}
	}
	
	
	public static function extend ($class, array &$extend)
	{
		if ($class == 'XenForo_ControllerPublic_Forum')
		{
			$extend[] = 'PrefixForumListing_Extend_ControllerPublic_Forum';
		}
	}
}
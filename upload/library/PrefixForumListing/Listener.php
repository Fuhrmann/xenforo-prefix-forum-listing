<?php
class PrefixForumListing_Listener
{
    public static function templateHookForumPageNavBefore($hookName, &$contents, array $hookParams, XenForo_Template_Abstract $template)
    {
        $templateParams = $template->getParams();
        if(isset($templateParams['forum']['node_id']) &&
            in_array($templateParams['forum']['node_id'], XenForo_Application::get('options')->get('pfl_display_in_forums')))
        {
            $viewParams = array_merge($templateParams, $hookParams);
            $ourTemplate = $template->create('pfl_prefixes_list', $viewParams);
            $rendered = $ourTemplate->render();
            $contents = $contents . $rendered;
        }
    }
    
    public static function templateRebuildTools($templateName, &$content, array &$containerData, XenForo_Template_Abstract $template)
    {
        $ourTemplate = $template->create('pfl_clean_cache');

        $content .= $ourTemplate;
    }

    public static function extendDatawriterDiscussionThread($class, array &$extend)
    {
        $extend[] = 'PrefixForumListing_Extend_DataWriter_Discussion_Thread';
    }

    public static function extendControllerPublicForum($class, array &$extend)
    {
        $extend[] = 'PrefixForumListing_Extend_ControllerPublic_Forum';
    }

    public static function extendControllerAdminTools($class, array &$extend)
    {
        $extend[] = 'PrefixForumListing_Extend_ControllerAdmin_Tools';
    }
}
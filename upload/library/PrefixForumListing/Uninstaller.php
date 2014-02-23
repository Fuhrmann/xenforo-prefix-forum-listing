<?php
class PrefixForumListing_Uninstaller
{
    public static function uninstall()
    {
        XenForo_Model::create('XenForo_Model_DataRegistry')->delete('PrefixesThreadsCount');
    }
}

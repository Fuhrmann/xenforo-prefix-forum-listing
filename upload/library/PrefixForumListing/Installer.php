<?php
class PrefixForumListing_Installer
{
    public static function install()
    {
        XenForo_Model::create('XenForo_Model_DataRegistry')->delete('PrefixesThreadsCount');
    }
}

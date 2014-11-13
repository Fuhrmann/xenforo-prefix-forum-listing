<?php

class PrefixForumListing_Extend_ControllerAdmin_Tools extends XFCP_PrefixForumListing_Extend_ControllerAdmin_Tools
{
    /**
     * Clean the addon cache.
     */
    public function actionCleanPrefixListingCache()
    {
        $this->_assertPostOnly();
        $this->assertAdminPermission('rebuildCache');

        $this->_getPrefixListingModel()->cleanPrefixCache();

        return $this->responseRedirect(
            XenForo_ControllerResponse_Redirect::SUCCESS,
            XenForo_Link::buildAdminLink('tools/rebuild', false, array('success' => 1))
        );
    }

    /**
     * @return PrefixForumListing_Model_PrefixListing
     */
    protected function _getPrefixListingModel()
    {
        return $this->getModelFromCache('PrefixForumListing_Model_PrefixListing');
    }
}
<?php
class PrefixForumListing_Extend_DataWriter_Discussion_Thread extends XFCP_PrefixForumListing_Extend_DataWriter_Discussion_Thread
{
    protected function _discussionPostDelete()
    {
        if ($this->get('prefix_id'))
        {
            $nodeId = $this->get('node_id');
            $this->_getPrefixListingModel()->cleanPrefixCache($nodeId, $this->get('prefix_id'));
        }

        return parent::_discussionPostDelete();
    }

    protected function _discussionPostSave()
    {
        if ($this->isInsert() || $this->isUpdate())
        {
            if ($this->get('prefix_id'))
            {
                $totalThreadsCache = $this->_getDataRegistryModel()->get('PrefixesThreadsCount');

                $nodeId = $this->getExisting('node_id');
                $totalThreadsCache[$nodeId][$this->get('prefix_id')] = NULL;
                $totalThreadsCache[$nodeId][$this->getExisting('prefix_id')] = NULL;

                if ($this->isChanged('node_id'))
                {
                    $newNodeId = $this->getNew('node_id');
                    $totalThreadsCache[$newNodeId][$this->get('prefix_id')] = NULL;
                    $totalThreadsCache[$newNodeId][$this->getExisting('prefix_id')] = NULL;
                }

                if ($this->isChanged('prefix_id'))
                {
                    $totalThreadsCache[$nodeId][$this->getNew('prefix_id')] = NULL;
                }

                if ($this->isChanged('discussion_state'))
                {
                    $totalThreadsCache[$nodeId][$this->get('prefix_id')] = NULL;
                }

                $this->_getDataRegistryModel()->set('PrefixesThreadsCount', $totalThreadsCache);
            }
        }

        return parent::_discussionPostSave();
    }

    /**
     * @return XenForo_Model_DataRegistry
     */
    protected function _getDataRegistryModel()
    {
        return $this->getModelFromCache('XenForo_Model_DataRegistry');
    }

    /**
     * @return PrefixForumListing_Model_PrefixListing
     */
    protected function _getPrefixListingModel()
    {
        return $this->getModelFromCache('PrefixForumListing_Model_PrefixListing');
    }
}

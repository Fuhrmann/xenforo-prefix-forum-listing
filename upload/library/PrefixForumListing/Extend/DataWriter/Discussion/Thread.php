<?php
class PrefixForumListing_Extend_DataWriter_Discussion_Thread extends XFCP_PrefixForumListing_Extend_DataWriter_Discussion_Thread
{
	protected function _discussionPostDelete()
	{
		if ($this->get('prefix_id'))
		{
			$totalThreadsCache = $this->_getDataRegistryModel()->get('PrefixesThreadsCount'.$this->get('node_id'));
			$totalThreadsCache[$this->get('prefix_id')] = NULL;
			$this->_getDataRegistryModel()->set('PrefixesThreadsCount'.$this->get('node_id'), $totalThreadsCache);
		}
		return parent::_discussionPostDelete();
	}


	protected function _discussionPostSave()
	{
		if ($this->isInsert() || $this->isUpdate())
		{
			if ($this->get('prefix_id'))
			{
				$totalThreadsCache = $this->_getDataRegistryModel()->get('PrefixesThreadsCount'.$this->getExisting('node_id'));
				$totalThreadsCache[$this->get('prefix_id')] = NULL;
				$totalThreadsCache[$this->getExisting('prefix_id')] = NULL;

				if ($this->isChanged('node_id'))
				{
					$this->_getDataRegistryModel()->set('PrefixesThreadsCount'.$this->getNew('node_id'), $totalThreadsCache);
				}

				if ($this->isChanged('prefix_id'))
				{
					$totalThreadsCache[$this->getNew('prefix_id')] = NULL;
				}

				if ($this->isChanged('discussion_state'))
				{
					$totalThreadsCache[$this->get('prefix_id')] = NULL;
				}

				$this->_getDataRegistryModel()->set('PrefixesThreadsCount'.$this->getExisting('node_id'), $totalThreadsCache);
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
}

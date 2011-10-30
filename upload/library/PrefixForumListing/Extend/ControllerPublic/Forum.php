<?php

class PrefixForumListing_Extend_ControllerPublic_Forum extends XFCP_PrefixForumListing_Extend_ControllerPublic_Forum
{
	public function actionIndex()
	{
		
		$response = parent::actionIndex();	
			
		$options = XenForo_Application::get('options');		
		$forumId = $this->_input->filterSingle('node_id', XenForo_Input::UINT);		 
		if (in_array($forumId, $options->pfl_display_in_forums))
		{
			$prefixes = $this->_getThreadPrefixModel()->getPrefixesInForums($forumId);
			
			foreach ($prefixes as $key => &$prefix)
			{
				if (!$this->_getThreadPrefixModel()->verifyPrefixIsUsable($prefix['prefix_id'], $forumId)){				
					unset($prefixes[$key]);
				}
				else
				{
					$threadFetchOptions = array('prefix_id' => $prefix['prefix_id']);
					$totalThreads = $this->_getThreadModel()->countThreadsInForum($forumId, $threadFetchOptions);
									 
					if ($totalThreads >= $options->pfl_donotshow_totalthreads)
					{	
						$prefix['totalThreads'] = $totalThreads;
						$prefix = $this->_getThreadPrefixModel()->preparePrefix($prefix);
					}
					else
				 	{
						unset($prefixes[$key]);
					}
				}
			}
			//Sort the prefixes		
			$this->_getPrefixListingModel()->multi_sort($prefixes, $options->pfl_display_order);
			
			$response->params['prefixes'] = $prefixes;
			
		}
		
		return $response;
	}

	
	/**
	 * @return PrefixForumListing_Model_PrefixListing
	 */
	protected function _getPrefixListingModel()
	{
		return $this->getModelFromCache('PrefixForumListing_Model_PrefixListing');
	}
	
	/**
	 * @return XenForo_Model_ThreadPrefix
	 */
	protected function _getThreadPrefixModel()
	{
		return $this->getModelFromCache('XenForo_Model_ThreadPrefix');
	}
	
	/**
	 * @return XenForo_Model_Thread
	 */
	protected function _getThreadModel()
	{
		return $this->getModelFromCache('XenForo_Model_Thread');
	}
}

	
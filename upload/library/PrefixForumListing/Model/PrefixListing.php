<?php
class PrefixForumListing_Model_PrefixListing extends XenForo_Model
{
	/**
	 * Sort a array of prefix by a key.
	 * 
	 * @param $array
	 * @param $key
	 * @param $direction
	 * 
	 * @since 1.0.0 build 1
	 */
	public $key;
	public $signal;
	
	public function multi_sort(&$array, $key, $direction) 
	{	
		$this->key = $key;
		$this->signal = ($direction == 'asc') ? '>' : '<';

		if($key == 'title')
		{
			usort($array, $this->sortByKey('title'));
		}
		else
		{
			usort($array, array($this, 'sort'));		
		}
	}
	
	public function isort($a,$b)
	{
		if(ord(substr(strtolower($a),0,1)) == ord(substr(strtolower($b),0,1))) return 0;
		return (ord(substr(strtolower($a),0,1)) < ord(substr(strtolower($b),0,1))) ? -1 : 1;
	}
	
	public function sortByKey($key)
	{
		return function ($a, $b) use ($key) {
			return strnatcmp($a[$key], $b[$key]);
		};	
	}
	
	public function sort($a, $b)
	{
		$key = $this->key;
		$signal = $this->signal;
		
		if($a[$key] == $b[$key])
		{
			return 0;
		}

		// alphabetically - not used anymore
		if ($key == 'title')
		{	
			if($signal == '>')
			{
				return ( ord(substr(strtolower($a[$key]),0,1)) > ord(substr(strtolower($b[$key]),0,1)) ) ? 1 : -1;
			}
			else
			{
				return ( ord(substr(strtolower($a[$key]),0,1)) < ord(substr(strtolower($b[$key]),0,1)) ) ? 1 : -1;			
			}
		}
		else
		{
			if($signal == '>')
			{
				return ($a[$key] > $b[$key]) ? 1 : -1;
			}
			else
			{
				return ($a[$key] < $b[$key]) ? 1 : -1;
			}
		}
	}
}
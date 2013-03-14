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
	public function multi_sort(&$array, $key, $direction) 
	{	
		if ($direction == 'asc')
		{
			$signal = '>';
		}
		else
		{
			$signal = '<';
		}
				
		$return = 'return ($a["'.$key.'"] '.$signal.' $b["'.$key.'"]) ? 1 : -1;';
		
		// alphabetically
		if ($key == 'title')
		{	
			$return =  'return (ord(substr(strtolower($a["'.$key.'"]),0,1)) '.$signal.' ord(substr(strtolower($b["'.$key.'"]),0,1))) ? 1 : -1;';
		}
		
		usort($array, create_function(
						'$a,$b',
						'if ($a["'.$key.'"] == $b["'.$key.'"]) return 0;' .
						$return
					)
		);
	}
	
	public function isort($a,$b)
	{
		if(ord(substr(strtolower($a),0,1)) == ord(substr(strtolower($b),0,1))) return 0;
		return (ord(substr(strtolower($a),0,1)) < ord(substr(strtolower($b),0,1))) ? -1 : 1;
	}
}
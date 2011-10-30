<?php
class PrefixForumListing_Model_PrefixListing extends XenForo_Model
{
	/**
	 * Sort a array of prefix by a key.
	 * 
	 * @param $array
	 * @param $key
	 * 
	 * @since 1.0.0 build 1
	 */
	public function multi_sort(&$array, $key) 
	{
		if ($key == 'title')
		{
			$return = 'return ($a["'.$key.'"] > $b["'.$key.'"]) ? 1 : -1;';
		}
		else
		{
			$return = 'return ($a["'.$key.'"] < $b["'.$key.'"]) ? 1 : -1;';
		}
		usort($array, create_function(
						'$a,$b',
						'if ($a["'.$key.'"] == $b["'.$key.'"]) return 0;' .
						$return
					)
		);
		
	}
}
<?php
class PrefixForumListing_Model_PrefixListing extends XenForo_Model
{
    /**
     * Sort a array of prefix by a key.
     *
     * @param $prefixes
     * @param $key
     * @param $direction
     *
     * @since 1.0.0 build 1
     */
    public $key;
    public $signal;

    public function multi_sort(&$prefixes, $key, $direction)
    {
        $this->key = $key;
        $this->signal = ($direction == 'asc') ? 'greater_then' : 'less_then';

        if($key == 'title')
        {
            usort($prefixes, $this->sortByKey('title', $direction));
        }
        else
        {
            usort($prefixes, array($this, 'sort'));
        }
    }

    public function isort($a,$b)
    {
        if(ord(substr(strtolower($a),0,1)) == ord(substr(strtolower($b),0,1))) return 0;
        return (ord(substr(strtolower($a),0,1)) < ord(substr(strtolower($b),0,1))) ? -1 : 1;
    }

    public function sortByKey($key, $direction)
    {
        return function ($a, $b) use ($key, $direction) {
            $direction = $direction == 'asc' ? 1 : -1;
            return $direction * strnatcmp($a[$key], $b[$key]);
        };
    }

    public function sort($a, $b)
    {
        $signal = $this->signal;
        return $this->$signal($a, $b);
    }

    public function greater_then($a, $b)
    {
        if($a[$this->key] > $b[$this->key])
        {
            return 1;
        }
    }

    public function less_then($a, $b)
    {
        if($a[$this->key] < $b[$this->key])
        {
            return 1;
        }
    }
}

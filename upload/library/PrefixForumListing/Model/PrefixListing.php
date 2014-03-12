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
    public $direction;

    public function multi_sort(&$prefixes, $key, $direction)
    {
        $this->key = $key;
        $this->direction = $direction;
        $this->signal = ($this->direction == 'asc') ? 'greater_then' : 'less_then';

        if($key == 'title')
        {
            usort($prefixes, array($this, 'sortByKey'));
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

    public function sortByKey($a, $b)
    {
        $direction = $this->direction == 'asc' ? 1 : -1;
        return $direction * strnatcmp($a[$this->key], $b[$this->key]);
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

<?php

namespace FoodAnalyzer;

class Dictionary {
    private array $_items;

    private string $_keyType;
    private string $_valueType; 

    public function __construct() 
    {
        $this->_items = array();

        $this->_keyType = "NOT SET";
        $this->_valueType = "NOT SET";
    }

    private function _validate($key, $value) : bool 
    {
        if (gettype($key) == $this->$_keyType && gettype($value) == $this->$_valueType)
        {
            return true;
        }

        return false;
    }

    public function add($key, $value) 
    {
        if ($this->_keyType == "NOT SET") 
        {
            $this->_keyType = gettype($key);
            $this->_valueType = gettype($value);
        }

        if ($this->_validate($key, $value)) 
        {
            $this->_items[$key] = $value;
        }        
    }

    public function remove($key) 
    {
        if ($this->containsKey($key)) 
        {
            unset($this->_items[$key]);
            return true;
        }
        return false;
    }

    public function containsKey($key) { return isset($this->_items[$key]); }

    public function containsValue($value) { return in_array($value, $this->_items); }

    public function get($key) { return $this->_items[$key] ?? null; }

    public function keys() { return array_keys($this->_items); }

    public function values() { return array_values($this->_items); }

    public function count() { return count($this->_items); }

    public function clear() { $this->_items = array(); }
}
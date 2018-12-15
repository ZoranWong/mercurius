<?php /** @noinspection ALL */

/**
 * Created by PhpStorm.
 * User: wangzaron
 * Date: 2018/12/15
 * Time: 8:34 PM
 */

namespace App\Traits;


trait AttributesAccessTrait
{
    public function __get($name)
    {
        // TODO: Implement __get() method.
        if(($value = $this->getAttributeValue($name)) || ($value = $this[$name])){
            return $value;
        }
        $key = upperCaseSplit($name, '_');
        return $this->getAttributeValue($key) ?? $this[$key] ;
    }

    public function __set($name, $value)
    {
        // TODO: Implement __set() method.
        $this->setAttribute(upperCaseSplit($name, '_'), $value);
    }

    public function formJson($value)
    {
        if(is_string($value)) {
            return parent::formJson($value);
        }elseif (is_array($value)) {
            return $value;
        }elseif (is_object($value)) {
            $json = [];
            foreach ($value as $key => $v) {
                $json[$key] = $v;
            }
            return $json;
        }
        return null;
    }

    public function __isset($name)
    {
        // TODO: Implement __isset() method.
        return !!$this->{$name};
    }

    public function __unset($name)
    {
        // TODO: Implement __unset() method.
        if(!$this->getAttribute($name)) {
            $name = upperCaseSplit($name, '_');
        }
        unset($this->attributes[$name], $this->relations[$name]);
    }
}

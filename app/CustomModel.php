<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomModel extends Model
{

    // public function __call($method, $parameters)
    // {
    //     if ($method == 'getNameAttribute') {
    //         return 'test';
    //         return $this->name;
    //     }

    //     return $this->forwardCallTo($this->newQuery(), $method, $parameters);
    // }

    // public function getAttribute($key)
    // {
    //     if (isset($this->translatable) && in_array($key, $this->translatable)) {
    //         $t = $this->translation ? $this->translation[$key] : null;
    //         return $t ? $t : $this->getAttributeValue($key);
    //     }

    //     return parent::getAttribute($key);
    // }

}

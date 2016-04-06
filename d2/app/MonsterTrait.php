<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonsterTrait extends Model {
    private $name;

    public function __construct($name) {
        parent::__construct();
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }
}

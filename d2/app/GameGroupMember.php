<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameGroupMember extends Model {
    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameGroup extends Model {
    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function gameGroupMembers() {
        return $this->hasMany('App\GameGroupMember');
    }

    public function addMember(GameGroupMember $member) {
        $this->gameGroupMembers()->getResults()->attach($member);
    }
}

<?php namespace App\Dao;
    abstract class AbstractDao {
        public function findByName() {
            return '';
        }

        protected abstract function getTableName();
    }
?>
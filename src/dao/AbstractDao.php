<?php namespace App\Dao;
    abstract class AbstractDao {
        public function findByName() {
            // TODO sql query on table with name;
        }

        protected abstract function getTableName();
    }
?>
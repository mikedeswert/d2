<?php
class RoboFile extends \Robo\Tasks
{
    public function deploy() {
        $this->_cleanDir('./vagrant/webroot');
        $this->_copyDir('./src', './vagrant/webroot');
    }

    public function watchSource() {
        $this->taskWatch()
            ->monitor('src', function() {
                $this->deploy();
            })->run();
    }
}

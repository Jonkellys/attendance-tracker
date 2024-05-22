<?php

    class userUpdate extends controllers {
        public function __construct() {
            parent::__construct();
        }
        
        public function userUpdate($params) {
            $this->views->getView($this, "userUpdate");
        }

    }

?>
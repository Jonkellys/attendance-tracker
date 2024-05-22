<?php

    class updateUser extends controllers {
        public function __construct() {
            parent::__construct();
        }
        
        public function updateUser($params) {
            $this->views->getView($this, "updateUser");
        }

    }

?>
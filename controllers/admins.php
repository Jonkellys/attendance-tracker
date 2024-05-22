<?php

    class admins extends controllers {
        public function __construct() {
            parent::__construct();
        }
        
        public function admins($params) {
            $this->views->getView($this, "admins");
        }

    }

?>
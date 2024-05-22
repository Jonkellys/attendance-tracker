<?php

    class deleteUsers extends controllers {
        public function __construct() {
            parent::__construct();
        }
        
        public function deleteUsers($params) {
            $this->views->getView($this, "deleteUsers");
        }

    }

?>

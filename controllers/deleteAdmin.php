<?php

    class deleteAdmin extends controllers {
        public function __construct() {
            parent::__construct();
        }
        
        public function deleteAdmin($params) {
            $this->views->getView($this, "deleteAdmin");
        }

    }

?>

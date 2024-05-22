<?php

    class updateAdmin extends controllers {
        public function __construct() {
            parent::__construct();
        }
        
        public function updateAdmin($params) {
            $this->views->getView($this, "updateAdmin");
        }

    }

?>
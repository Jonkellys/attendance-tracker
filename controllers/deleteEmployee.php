<?php

    class deleteEmployee extends controllers {
        public function __construct() {
            parent::__construct();
        }
        
        public function deleteEmployee($params) {
            $this->views->getView($this, "deleteEmployee");
        }

    }

?>

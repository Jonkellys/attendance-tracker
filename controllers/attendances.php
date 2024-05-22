<?php

    class attendances extends controllers {
        public function __construct() {
            parent::__construct();
        }
        
        public function attendances($params) {
            $this->views->getView($this, "attendances");
        }

    }

?>
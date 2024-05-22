<?php

    class employees extends controllers {
        public function __construct() {
            parent::__construct();
        }

        public function employees($params) {

            $this->views->getView($this, "employees");
        }
    }

?>
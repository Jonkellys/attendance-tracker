<?php

    class userEmployees extends controllers {
        public function __construct() {
            parent::__construct();
        }

        public function userEmployees($params) {

            $this->views->getView($this, "userEmployees");
        }
    }

?>
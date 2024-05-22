<?php

    class userRecords extends controllers {
        public function __construct() {
            parent::__construct();
        }

        public function userRecords($params) {

            $this->views->getView($this, "userRecords");
        }
    }

?>
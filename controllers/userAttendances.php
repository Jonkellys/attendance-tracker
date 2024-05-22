<?php

    class userAttendances extends controllers {
        public function __construct() {
            parent::__construct();
        }

        public function userAttendances($params) {

            $this->views->getView($this, "userAttendances");
        }
    }

?>
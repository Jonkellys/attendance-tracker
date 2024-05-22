<?php

    class deletePersonal extends controllers {
        public function __construct() {
            parent::__construct();
        }
        
        public function deletePersonal($params) {
            $this->views->getView($this, "deletePersonal");
        }

    }

?>

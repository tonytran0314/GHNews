<?php
    class App {

        public $controller = "home";
        public $action = "index";
        public $param = [];
        protected $urlArray;

        public function __construct() {

            // process the url to array
            $this->urlArray = $this->urlProcess();

            // assign the first element of urlArray to the controller property
            // then call the controller (class)
            $this->setController();

            // assign the second element of urlArray to the action property
            // then call the action (method in that class)
            $this->setAction();

            // assign the rest of urlArray to the param property
            $this->setParam();
        
            // call the action with the controller value, action value and param value above
            $this->callAction();


        }

        protected function setController() {
            if( isset($this->urlArray[0]) ) {
                if( file_exists("./mvc/controllers/". $this->urlArray[0] .".php") ) {
                    $this->controller = $this->urlArray[0];
                    unset($this->urlArray[0]);
                }
            }
            require_once "./mvc/controllers/". $this->controller .".php";
        }
        protected function setAction() {
            if( isset($this->urlArray[1]) ) {
                if( (method_exists($this->controller, $this->urlArray[1])) ) {
                    $this->action = $this->urlArray[1];
                }
                unset($this->urlArray[1]);
            }
        }

        protected function setParam() {
            if(isset($this->urlArray)) {
                $this->param = $this->urlArray;
            }
        }

        protected function callAction() {
            call_user_func_array([new $this->controller, $this->action], $this->param);
        }

        protected function urlProcess() {
            if( isset($_GET["url"]) ) {
                return explode("/", filter_var(trim($_GET["url"], "/"), FILTER_SANITIZE_URL));
            }
        }
    }
?>
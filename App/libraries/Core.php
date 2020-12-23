<?php
    class Core
    {
        protected $currcontroller = 'pages';
        protected $currmethod = 'index';
        protected $params = [];

        public function __construct()
        {
            $url = $this->geturl();

            if (file_exists('../App/controllers/' . ucwords($url[0]). '.php'))
            {
                $this->currcontroller = ucwords($url[0]);
                unset($url[0]);
            }

            require_once '../App/controllers/' . $this->currcontroller . '.php';
            $this->currcontroller = new $this->currcontroller;

            if (isset($url[1]) && (method_exists($this->currcontroller, $url[1])))
            {
                $this->currmethod = $url[1];
                unset($url[1]);
            }

            $this->params = $url ? array_values($url) : [];
            call_user_func_array([$this->currcontroller, $this->currmethod], $this->params);
        }

        public function geturl()
        {
            if (isset($_GET['url']))
            {
                $url = rtrim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);
                return($url);
            }
        }
    }
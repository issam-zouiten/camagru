<?php

    class Url {
        protected $curControl = 'Pages';
        protected $curMethod = 'index';
        protected $params = [];

        public function __construct()
        {
            chmod('../public/img', 0777);
            $_SESSION['user_img'] = (file_exists($_SESSION['user_img'])) ? $_SESSION['user_img'] : 'https://www.washingtonfirechiefs.com/Portals/20/EasyDNNnews/3584/img-blank-profile-picture-973460_1280.png';
            $url = $this->getUrl();
            if (file_exists('../app/Controllers/' . ucwords($url[0]). '.php'))
            {
                $this->curControl = ucwords($url[0]);
                unset($url[0]);
            }

            require_once '../app/Controllers/'. $this->curControl. '.php';
            $this->curControl = new $this->curControl;

            if (isset($url[1]))
            {
                if (method_exists($this->curControl, $url[1]))
                {
                    $this->curMethod = $url[1];
                    unset($url[1]);
                }
                else
                    die('<div style="margin-left:auto; margin-right:auto; width:20%;font-size: 36;margin-top: 15%"><h1>Page Not Found</h1><br><h2 style="margin-left:auto; margin-right:auto;width: 30%">404</h2></div>');
            }

            $this->params = $url ? array_values($url) : [];

            call_user_func_array([$this->curControl, $this->curMethod], $this->params);
        }
        public function getUrl() {
            if (isset($_GET['url']))
            {
                $url = rtrim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);
                return $url;
            }
        }
    }
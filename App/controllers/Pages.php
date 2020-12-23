<?php
    class Pages extends Controller
    {
        public function __construct()
        {
        }

        public function index()
        {
            $data = [
                'title' => 'camagru'
            ];
            $this->view('pages/index', $data);
            
        }
    }
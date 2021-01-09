<?php
    class Pages extends Controller {
        public function __construct()
        {
            $this->postModel = $this->model('Post');
        }

        public function index()
        {
            $post = $this->postModel->getPosts();
            $countpg = $this->postModel->countPosts();
            $data = [
                'posts' =>$post,
                'countpg' =>$countpg
            ];
            $this->view('pages/index', $data);
        }


        public function about()
        {
            $data = ['title' => 'about'];
            $this->view('pages/index', $data);
        }
    }
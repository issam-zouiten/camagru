<?php

    class Posts extends Controller {

        public function __construct()
        {
            if (!isLogged())
                redirect('users/login');

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
            $this->view('posts/index', $data);
        }

        public function add()
        {
            $data = [
                'title' =>'',
                'content' => ''
            ];
            $this->view('posts/add', $data);
        }


        public function edit_post($id)
        {
            die($id);
        }

        public function del_post($post_id)
        {
            if($this->postModel->del($post_id))
                redirect('users/profile');
            else
                die("error");
        }
    }
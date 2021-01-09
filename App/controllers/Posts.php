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

        public function takeImage()
        {
            if(isset($_POST['imgBase64']) && isset($_POST['filtstick']))
            {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $upload_dir = "../public/imgs/";
                $img = $_POST['imgBase64'];
                $filter = $_POST['filtstick'];
                $img = str_replace('data:image/png;base64,', '', $img);
                $img = str_replace(' ', '+', $img);
                $data = base64_decode($img);
                $file = $upload_dir . mktime().'.png';
                file_put_contents($file, $data);
                $sourceImage = $filter;
                $destImage = $file;
                list($srcWidth, $srcHeight) = getimagesize($sourceImage);
                $src = imagecreatefrompng($sourceImage);
                $dest = imagecreatefrompng($destImage);
                imagecopyresized($dest, $src, 0, 0, 0, 0, 200, 200, $srcWidth, $srcHeight);
                imagepng($dest, $file, 9);
                move_uploaded_file($dest, $file);
                $dt = ['userid' => $_SESSION['id'],
                'imgurl' => $file          
                ];
                if (!empty($data)) {
                    if ($this->postModel->save($dt) == true) {
                        
                    }
                
                }
            }
         
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
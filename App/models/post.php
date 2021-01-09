<?php

    class Post {

        private $db;
        private $numpg;
        public function __construct()
        {
            $this->db = new Db;
            $this->numpg = 12;
        }

        public function getPosts()
        {
            $pag = intval($_GET['start']);
            $start=$pag * $this->numpg;
            $this->db->query("SELECT *, posts.id as postId, users.id as userId FROM posts INNER JOIN users ON posts.user_id = users.id ORDER BY posts.create_at DESC limit $start,$this->numpg");
            $res = $this->db->resultSet();
            return $res;
        }
        
        public function countPosts()
        {
            $this->db->query('SELECT * FROM posts');
            $pg = $this->db->rowCount();
            $pglin = ceil($pg/$this->numpg);
            return $pglin;
        }

        public function save($data){
            $this->db->query('INSERT INTO posts (user_id, path, created_at) VALUES(:user_id, :path, NOW())');
    
            $this->db->bind(':user_id', $data['user_id']);
            $this->db->bind(':path', $data['path']);
    
            if($this->db->execute()){
                return true;
            }else {
                return false;
            }
        }

        

        public function del($id)
        {
            $this->db->query('DELETE FROM posts WHERE id = :id');
            $this->db->bind(':id', $id);

            if ($this->db->execute())
                return true;
            else
                return false;
        }

    }
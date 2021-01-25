<?php
require_once 'database.php';
try{
        $db = new PDO($DB_DSN,$DB_USER,$DB_PASSWORD, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ]);
        echo "db conection:";
        var_dump($db);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
// Create Database
// $sql = "CREATE DATABASE IF NOT EXISTS ". $DB_NAME;
// $db->exec($sql);
// // Use Database
// $sql = 'USE ' . $DB_NAME ;
// $db->exec($sql);
// Create a table of users
// try{
    // $sql = "CREATE TABLE `users` (
    // `id` int NOT NULL,
    // `fullname` varchar(255) NOT NULL,
    // `email` varchar(255) NOT NULL,
    // `username` varchar(255) NOT NULL,
    // `profile_img` varchar(255) NOT NULL DEFAULT 'https://www.washingtonfirechiefs.com/Portals/20/EasyDNNnews/3584/img-blank-profile-picture-973460_1280.png',
    // `password` varchar(255) NOT NULL,
    // `token` varchar(255) NOT NULL,
    // `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    // `verified` int NOT NULL DEFAULT '0',
    // `notification` tinyint(1) NOT NULL DEFAULT '1'
    // )";
    // $sql .= "CREATE TABLE `comments` (
    // `id` int NOT NULL,
    // `user_id` int NOT NULL,
    // `post_id` int NOT NULL,
    // `content` varchar(255) NOT NULL
    // )";
    // $sql .= "CREATE TABLE `posts` (
    // `id` int NOT NULL,
    // `user_id` int NOT NULL,
    // `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'camagru',
    // `content` varchar(255) NOT NULL,
    // `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    // `comments` int NOT NULL DEFAULT '0',
    // `likes` int NOT NULL DEFAULT '0',
    // `like_nbr` int DEFAULT '0'
    // )";
    //  $sql .= "CREATE TABLE `likes` (
    // `id` int NOT NULL,
    // `user_id` int NOT NULL,
    // `post_id` int NOT NULL
    // )";
// $db->exec($sql);
// }catch(PDOException $e){
//     echo $e->getMessage();
// }
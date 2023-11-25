<?php
namespace App\Controllers;

use App\DB;
use App\Models\Post;
use App\Models\User;

class PublicController {
    public function index(){
        
        $posts = Post::all();
        view('index', compact('posts'));
    }

    public function about(){
        view('about');
    }

    public function form(){
        var_dump($_GET);
        var_dump($_POST);
        //var_dump($_SERVER);
        view('form');
    }
    public function formPost(){
        var_dump($_GET);
        var_dump($_POST);
       
    }
}
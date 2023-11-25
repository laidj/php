<?php
namespace App\Controllers;

use App\Exceptions\NotFoundException;
use App\Models\Post;

class PostsController {
    public function index(){
        $posts = Post::all();
        view('posts/index', compact('posts'));
    }

    public function create(){
        view('posts/create');
    }

    public function store(){
        $name = md5($_FILES['image']['name'] . microtime() . rand(0, 999999999999)) . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        move_uploaded_file(
            $_FILES['image']['tmp_name'],
            __DIR__ . '/../../public/uploads/' . $name
        );
        dd($_FILES, $_POST);
        $post = new Post();
        $post->title = $_POST['title'];
        $post->body = $_POST['body'];
        $post->save();
        header('Location: /admin/posts');
    }

    public function show(){
        $post = Post::find($_GET['id']);
        if($post){
            view('posts/show', compact('post'));
        } else {
            throw new NotFoundException();
        }
    }

    public function edit(){
        $post = Post::find($_GET['id']);
        if($post){
            view('posts/edit', compact('post'));
        } else {
            throw new NotFoundException();
        }
    }
    public function update(){
        $post = Post::find($_GET['id']);
        if($post){
            $post->title = $_POST['title'];
            $post->body = $_POST['body'];
            $post->save();
            header('Location: /admin/posts');
        } else {
            throw new NotFoundException();
        }
    }
    public function destroy(){
        $post = Post::find($_GET['id']);
        if($post){
            $post->delete();
            header('Location: /admin/posts');
        } else {
            throw new NotFoundException();
        }
    }
}
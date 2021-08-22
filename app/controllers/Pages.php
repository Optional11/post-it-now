<?php


class Pages extends Controller
{
    public function __construct()
    {
        //load model to controller - just show case
        //$this->sampleModel = $this->model('Sample');
    }

    public function index()
    {
        if ($this->isLoggedIn()) {
            redirect('posts');
        }
        // get data from model
        //$samplePosts = $this->sampleModel->getPosts();

        $data = [
            'title' => 'Post It Now',
            'description' => 'Simple social network built on MVC PHP',
            //'posts' => $samplePosts,
        ];


        return $this->view('pages/index', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About us',
            'description' => 'App to share posts with other users',
        ];
        return $this->view('pages/about', $data);
    }
}

<?php

class Posts extends Controller
{

    public function __construct()
    {
        // function is defined in Controller
        if (!$this->isLoggedIn()) {
            redirect('users/login');
        }

        $this->postModel = $this->model('Post');
    }

    public function index()
    {
        //Get posts
        $posts = $this->postModel->getPosts();

        $data = [
            'posts' => $posts,
        ];
        $this->view('posts/index', $data);
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_SPOST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'title' => trim($_SPOST['title']),
                'body' => trim($_SPOST['body']),
                'user_id' => $_SESSION['user_id'],
                'title_err' => '',
                'body_err' => '',
            ];

            // Validate title
            if (empty($data['title'])) {
                $data['title_err'] = 'Please enter title';
            }

            // Validate title
            if (empty($data['body'])) {
                $data['body_err'] = 'Please enter body text';
            }

            //Make sure no errors
            if (empty($data['title_err']) && empty($data['body_err'])) {
                //validated
                if ($this->postModel->addPost($data)) {
                    flash('post_message', 'Post Added');
                    redirect('posts');
                } else {
                    die('Something went wrong');
                }
            } else {
                //load view with errors
                $this->view('posts/create', $data);
            }
        } else {
            //init view
            $data = [
                'title' => '',
                'body' => '',
            ];
            $this->view('posts/create', $data);
        }
    }

    public function show($id)
    {
        $post = $this->postModel->getPostById($id);

        $data = [
            'post' => $post,
        ];

        $this->view('posts/show', $data);
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_SPOST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'id' => $id,
                'title' => trim($_SPOST['title']),
                'body' => trim($_SPOST['body']),
                'user_id' => $_SESSION['user_id'],
                'title_err' => '',
                'body_err' => '',
            ];

            // Validate title
            if (empty($data['title'])) {
                $data['title_err'] = 'Please enter title';
            }

            // Validate title
            if (empty($data['body'])) {
                $data['body_err'] = 'Please enter body text';
            }

            //Make sure no errors
            if (empty($data['title_err']) && empty($data['body_err'])) {
                //validated
                if ($this->postModel->updatePost($data)) {
                    flash('post_message', 'Post Edited');
                    redirect('posts');
                } else {
                    die('Something went wrong');
                }
            } else {
                //load view with errors
                $this->view('posts/edit', $data);
            }
        } else {
            // can be editted only by owner of post
            // get existing post from model
            $post = $this->postModel->getPostById($id);

            //check for owner
            if ($post->userId != $_SESSION['user_id']) {
                flash('post_message', "Only owner of the post can edit it", "alert alert-danger");
                redirect('posts');
            }
            //init view
            $data = [
                'id' => $id,
                'title' => $post->title,
                'body' => $post->body,
            ];
            $this->view('posts/edit', $data);
        }
    }

    public function delete($id)
    {

        // can be editted only by owner of post
        // get existing post from model
        $post = $this->postModel->getPostById($id);

        //check for owner
        if ($post->userId != $_SESSION['user_id']) {
            flash('post_message', "Only owner can delete the post", "alert alert-danger");
            redirect('posts');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->postModel->deletePost($id)) {
                flash('post_message', 'Post Removed');
                redirect('posts');
            }
        } else {
            redirect('posts');
        }
    }
}

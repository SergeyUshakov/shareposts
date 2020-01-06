<?php

/**
 * Class Pages
 * Handles home and about pages
 */
class Pages extends Controller
{
    public function index()
    {
        if (isLoggedIn()) {
            redirect('posts');
        }

        $data = [
            'title' => 'SharePosts',
            'description' => 'Simple social network build on MVC PHP framework'
        ];

        $this->view('pages/index', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About Us',
            'description' => 'App to share posts with other users'
        ];

        $this->view('pages/about', $data);
    }
}
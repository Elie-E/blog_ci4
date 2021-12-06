<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BlogPostModel;
use App\Models\CatModel;
use Config\Database;

// use App\Entities\BlogPost;

class Blog extends BaseController
{
    public function index()
    {
        $blogPostModel = new BlogPostModel();
        // $blogPostModel = model(BlogPostModel::class);

        $data['post'] = $blogPostModel->getPost();
        $data['ids'] = [];

        foreach ($data as $posts) {
            foreach ($posts as $post){
                $data['ids'] = $blogPostModel->getCategories($post->id_blog_post);
            }
        }

        echo view('blog_main', $data);
    }

    public function view($id){

        $blogPostModel = new BlogPostModel();

        $data['post'] = $blogPostModel->getPost($id);
        $data['cat'] = $blogPostModel->getCategories($id);

        echo view('view_post', $data);
    }

    public function addPost()
    {
        if($this->request->getMethod() !== "post"){

            $catModel = new CatModel();
            $data['categories'] = $catModel->findAll();

            echo view('add_post', $data);
        } else {
            $blogPostModel = new BlogPostModel();
            $postData = array(
                'post_key' => $this->request->getPost('post_key'),
                'post_lng' => $this->request->getPost('post_lng'),
                'title' => $this->request->getPost('title'),
                'content' => $this->request->getPost('content'),
                'enabled' => $this->request->getPost('enabled'),
            );

            $catIds = $this->request->getPost('categBox');
            $postId = $blogPostModel->getInsertID();
            
            $blogPostModel->addData($postData, $catIds);
            // $blogPostModel->fillRelationTable($postId, $catIds);

            return redirect()->to(site_url('/'));
        }
    }

    public function edit($id)
    {
        if($this->request->getMethod() !== "post")
        {
            $blogPostModel = new BlogPostModel();
            $data['post'] = $blogPostModel->getPost($id);
            $data['ids'] = [];
            $data['ids'] = $blogPostModel->getCategories($data['post']->id_blog_post);

            $catModel = new CatModel();
            $data['categories'] = $catModel->findAll();

            echo view('edit_post', $data);
        } else {

            $blogPostModel = new BlogPostModel();
            $id = $this->request->getPost('id_blog_post');

            $data = array(
                'post_key' => $this->request->getPost('post_key'),
                'post_lng' => $this->request->getPost('post_lng'),
                'title' => $this->request->getPost('title'),
                'content' => $this->request->getPost('content'),
                'enabled' => $this->request->getPost('enabled'),
            );
            $blogPostModel->update($id, $data);

            return redirect()->to(site_url('/'));
        }
    }

    public function delete($id)
    {
        $blogPostModel = new BlogPostModel();
        $blogPostModel->delete($id);

        return redirect()->to(site_url('/'));
    }


    public function addRelation()
    {
        $blogPostModel = new BlogPostModel();
        $blogPostModel->relation();
    }
}

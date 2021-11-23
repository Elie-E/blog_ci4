<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BlogPostModel;
// use App\Entities\BlogPost;

class Blog extends BaseController
{
    public function index()
    {
        $blogPostModel = new BlogPostModel();
        // $blogPostModel = model(BlogPostModel::class);

        $data['post'] = $blogPostModel->getPost();

        echo view('blog_main', $data);
    }

    public function view($id){
        $blogPostModel = new BlogPostModel();
        $data['post'] = $blogPostModel->getPost($id);
       
        echo view('view_post', $data);
    }

    public function addPost()
    {
        if($this->request->getMethod() !== "post"){
            echo view('add_post');
        } else {
            $blogPostModel = new BlogPostModel();
            $data = array(
                'post_key' => $this->request->getPost('post_key'),
                'post_lng' => $this->request->getPost('post_lng'),
                'title' => $this->request->getPost('title'),
                'content' => $this->request->getPost('content'),
                'enabled' => $this->request->getPost('enabled'),
            );
            $blogPostModel->save($data);
    
            return redirect()->to(site_url('/'));
        }
    }

    public function edit($id)
    {
        if($this->request->getMethod() !== "post")
        {
            $blogPostModel = new BlogPostModel();
            $data['post'] = $blogPostModel->getPost($id)->getRow();
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
}

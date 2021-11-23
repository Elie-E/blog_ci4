<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogPostModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'blog_post';
    protected $primaryKey       = 'id_blog_post';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'App\Entities\BlogPost';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'post_key',
        'post_lng',
        'title',
        'image',
        'content',
        'enabled',
        'date_publication',
        'date_creation',
        'date_modification',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'date_creation';
    protected $updatedField  = 'date_modification';
    protected $publishedAt   = 'date_publication';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getPost($id = false){

        if($id === false){
            return $this->findAll();
        } else {

            // return $this->getWhere(['id_blog_post' => $id]);

            return $this->where(['id_blog_post' => $id])->first();
        }
    }
}
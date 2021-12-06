<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class BlogPost extends Entity
{
    protected $datamap = ['this is not a data in an array i am an object fml...'];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
}

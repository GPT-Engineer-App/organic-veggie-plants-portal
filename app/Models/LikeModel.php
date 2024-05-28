<?php namespace App\Models;

use CodeIgniter\Model;

class LikeModel extends Model {
    protected $table = 'likes';
    protected $allowedFields = ['user_id', 'product_id'];
}
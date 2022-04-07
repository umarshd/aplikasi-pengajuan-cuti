<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
  protected $table = 'users';
  protected $primaryKey = 'id';
  protected $returnType = 'array';
  protected $allowedFields = [
    'name',
    'email',
    'password',
    'roles_id',
  ];
}

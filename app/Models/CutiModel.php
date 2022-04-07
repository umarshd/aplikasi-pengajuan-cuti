<?php

namespace App\Models;

use CodeIgniter\Model;

class CutiModel extends Model
{
  protected $table = 'cutis';
  protected $primaryKey = 'id';
  protected $returnType = 'array';
  protected $allowedFields = [
    'user_id',
    'nik',
    'mulai_cuti',
    'akhir_cuti',
    'lama_cuti',
    'alasan_cuti',
    'jenis_cuti',
    'bukti_cuti',
    'status_cuti_id_by_manager',
    'status_cuti_id_by_senior_manager',
  ];
}

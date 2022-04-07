<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomModel extends Model
{
  public function getDataCutiByUserId($user_id)
  {
    $dbCuti = $this->db->table('cutis');
    $dbCuti->where('user_id', $user_id);
    $dbCuti->join('users', 'users.id=cutis.user_id')->select('cutis.*, users.name');

    return $dbCuti->get()->getResultArray();
  }

  public function getAllDataCuti()
  {
    $dbCuti = $this->db->table('cutis');
    $dbCuti->join('users', 'users.id=cutis.user_id')->select('cutis.*, users.name');

    return $dbCuti->get()->getResultArray();
  }

  public function getDataCutiById($id)
  {
    $dbCuti = $this->db->table('cutis');
    $dbCuti->where('cutis.id', $id);
    $dbCuti->join('users', 'users.id=cutis.user_id')->select('cutis.*, users.name');

    return $dbCuti->get()->getResultArray();
  }

  public function checkDataCuti($user_id, $lama_cuti, $nik, $mulai_cuti, $akhir_cuti, $alasan_cuti, $jenis_cuti, $status_cuti_id_by_manager, $status_cuti_id_by_senior_manager)
  {
    $rules = [
      'user_id' => $user_id,
      'lama_cuti' => $lama_cuti,
      'nik' => $nik,
      'mulai_cuti' => $mulai_cuti,
      'akhir_cuti' => $akhir_cuti,
      'alasan_cuti' => $alasan_cuti,
      'jenis_cuti' => $jenis_cuti,
      'status_cuti_id_by_manager' => $status_cuti_id_by_manager,
      'status_cuti_id_by_senior_manager' => $status_cuti_id_by_senior_manager
    ];
    $dbCuti = $this->db->table('cutis');
    $dbCuti->where($rules);

    return $dbCuti->get()->getResultArray();
  }
}

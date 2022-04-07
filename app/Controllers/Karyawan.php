<?php

namespace App\Controllers;

use App\Models\AuthModel;
use App\Models\CutiModel;
use App\Models\CustomModel;

class Karyawan extends BaseController
{
  protected $AuthModel;
  protected $CutiModel;
  protected $CustomModel;

  public function __construct()
  {

    $this->AuthModel = new AuthModel();
    $this->CutiModel = new CutiModel();
    $this->CustomModel = new CustomModel();
  }

  public function index()
  {
    if (session()->get('role') != 1) {
      return redirect()->to('/aksesditolak');
    }

    $user = $this->AuthModel->where('email', session()->get('email'))->first();
    $data = [
      'user' => $user,
      'cuties' => $this->CustomModel->getDataCutiByUserId($user['id']),
    ];
    return view('karyawan/index', $data);
  }

  public function tambahCuti()
  {
    if (session()->get('role') != 1) {
      return redirect()->to('/aksesditolak');
    }
    $user = $this->AuthModel->where('email', session()->get('email'))->first();
    $data = [
      'user' => $user,
    ];
    return view('karyawan/cuti/tambah', $data);
  }

  public function prosesTambahCuti()
  {
    $rules = $this->validate([
      'nik' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'nik harus di isi'
        ]
      ],
      'mulai_cuti' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'tanggal mulai cuti harus di isi'
        ]
      ],
      'akhir_cuti' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'tanggal selesai cuti harus di isi'
        ]
      ],
      'lama_cuti' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'lama cuti harus di isi'
        ]
      ],
      'jenis_cuti' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'jenis cuti harus di pilih'
        ]
      ],
      'alasan_cuti' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'alasan cuti harus di isi'
        ]
      ],
      'ajukan_cuti' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'tujuan cuti harus di isi'
        ]
      ],
      'bukti_pendukung' => [
        'rules' => 'is_image[bukti_pendukung]',
      ],

    ]);

    if (!$rules) {
      session()->setFlashdata('error', $this->validator->listErrors());
      return redirect()->back();
    }
    $ajukanCuti = $this->request->getVar('ajukan_cuti');

    if ($ajukanCuti == 'Manager') {
      $image = $this->request->getFile('bukti_pendukung');
      $user_id = $this->request->getVar('id');
      $tanggal_mulai_cuti = $this->request->getVar('mulai_cuti');
      $lama_cuti = $this->request->getVar('lama_cuti');

      $newNameImage = $user_id . '_' . $tanggal_mulai_cuti . '_' . $lama_cuti;
      $image->move('assets/img/bukti-pendukung', $newNameImage . '.' . $image->getClientExtension());

      $data = [
        'user_id' => $user_id,
        'nik' => $this->request->getVar('nik'),
        'mulai_cuti' => $this->request->getVar('mulai_cuti'),
        'akhir_cuti' => $this->request->getVar('akhir_cuti'),
        'lama_cuti' => $lama_cuti,
        'alasan_cuti' => $this->request->getVar('alasan_cuti'),
        'jenis_cuti' => $this->request->getVar('jenis_cuti'),
        'bukti_cuti' => $newNameImage . '.' . $image->getClientExtension(),
        'status_cuti_id_by_manager' => 1,
        'status_cuti_id_by_senior_manager' => null
      ];

      $this->CutiModel->insert($data);

      session()->setFlashdata('success', 'Cuti berhasil diajukan ke manager');

      return redirect()->to('/karyawan');
    } else if ($ajukanCuti == 'Senior Manager') {
      $lama_cuti = $this->request->getVar('lama_cuti');
      $user_id = $this->request->getVar('id');
      $nik = $this->request->getVar('nik');
      $mulai_cuti = $this->request->getVar('mulai_cuti');
      $akhir_cuti = $this->request->getVar('akhir_cuti');
      $alasan_cuti = $this->request->getVar('alasan_cuti');
      $jenis_cuti = $this->request->getVar('jenis_cuti');
      $status_cuti_id_by_manager = 1;
      $status_cuti_id_by_senior_manager = null;

      $dataFromDB = $this->CustomModel->checkDataCuti($user_id, $lama_cuti, $nik, $mulai_cuti, $akhir_cuti, $alasan_cuti, $jenis_cuti, $status_cuti_id_by_manager, $status_cuti_id_by_senior_manager);

      if (!$dataFromDB) {
        session()->setFlashdata('error', 'data belum diajukan ke manager');
        return redirect()->to('/karyawan');
      }

      $idCuti = $dataFromDB[0]['id'];

      $dataUpdate = [
        'status_cuti_id_by_senior_manager' => 1
      ];
      $this->CutiModel->update($idCuti, $dataUpdate);
      session()->setFlashdata('success', 'Cuti berhasil diajukan ke senior manager');

      return redirect()->to('/karyawan');
    }
  }

  public function detailCuti($id)
  {
    if (session()->get('role') != 1) {
      return redirect()->to('/aksesditolak');
    }
    $user = $this->AuthModel->where('email', session()->get('email'))->first();
    $data = [
      'user' => $user,
      'cuti' => $this->CutiModel->where('id', $id)->first(),
    ];
    return view('karyawan/cuti/detail', $data);
  }

  public function listCuti()
  {
    if (session()->get('role') != 1) {
      return redirect()->to('/aksesditolak');
    }
    $user = $this->AuthModel->where('email', session()->get('email'))->first();
    $data = [
      'user' => $user,
      'cuties' => $this->CustomModel->getAllDataCuti()
    ];
    return view('karyawan/cuti/index', $data);
  }
}

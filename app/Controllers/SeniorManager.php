<?php

namespace App\Controllers;

use App\Models\AuthModel;
use App\Models\CutiModel;
use App\Models\CustomModel;

class SeniorManager extends BaseController
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
    if (session()->get('role') != 3) {
      return redirect()->to('/aksesditolak');
    }
    $user = $this->AuthModel->where('email', session()->get('email'))->first();
    $data = [
      'user' => $user,
      'cuties' => $this->CustomModel->getAllDataCuti(),
    ];
    return view('seniormanager/index', $data);
  }

  public function detailCutiKaryawan($id)
  {
    if (session()->get('role') != 3) {
      return redirect()->to('/aksesditolak');
    }
    $user = $this->AuthModel->where('email', session()->get('email'))->first();
    $data = [
      'user' => $user,
      'cuti' => $this->CustomModel->getDataCutiById($id)[0],
    ];
    return view('seniormanager/cuti/detail', $data);
  }

  public function updateCutiKaryawan()
  {
    if (session()->get('role') != 3) {
      return redirect()->to('/aksesditolak');
    }
    $dataUpadte = $this->request->getVar('status_cuti_id_by_senior_manager');
    $id = $this->request->getVar('id');
    $data = [
      'status_cuti_id_by_senior_manager' => $dataUpadte,
    ];

    $this->CutiModel->update($id, $data);
    session()->setFlashdata('success', 'Data berhasil di update');
    return redirect()->to('/seniormanager');
  }

  public function listCuti()
  {
    if (session()->get('role') != 3) {
      return redirect()->to('/aksesditolak');
    }
    $user = $this->AuthModel->where('email', session()->get('email'))->first();
    $data = [
      'user' => $user,
      'cuties' => $this->CustomModel->getAllDataCuti()
    ];
    return view('seniormanager/cuti/index', $data);
  }
}

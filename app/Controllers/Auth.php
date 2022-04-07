<?php

namespace App\Controllers;

use App\Models\AuthModel;

class Auth extends BaseController
{
  protected $AuthModel;

  public function __construct()
  {
    $this->AuthModel = new AuthModel();
  }

  public function login()
  {
    $data = [
      'title' => 'Login | Aplikasi Pengajuan Cuti'
    ];
    return view('auth/login', $data);
  }

  public function prosesLogin()
  {
    $email = $this->request->getVar('email');
    $password = $this->request->getVar('password');

    $checkEmail = $this->AuthModel->where('email', $email)->first();
    if (!$checkEmail) {
      session()->setFlashdata('error', 'Email tidak ditemukan');
      return redirect()->back();
    }

    $checkPassword = password_verify($password, $checkEmail['password']);
    if (!$checkPassword) {
      session()->setFlashdata('error', 'Password salah');
      return redirect()->back();
    }


    session()->set([
      'email' => $checkEmail['email'],
      'role' => $checkEmail['roles_id'],
      'logged_in' => true
    ]);

    if (session()->get('role') == 1) {
      return redirect()->to('/karyawan');
    } else if (session()->get('role') == 2) {
      return redirect()->to('/manager');
    } else if (session()->get('role') == 3) {
      return redirect()->to('/seniormanager');
    }
  }

  public function logout()
  {
    session()->destroy();
    return redirect()->to('/');
  }
}

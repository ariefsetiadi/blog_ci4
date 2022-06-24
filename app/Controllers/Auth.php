<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\ModelUser;

class Auth extends BaseController
{
    public function index()
    {
        return view('auth/login');
    }

    public function login()
    {
        $val    =   $this->validate([
                        'username'  =>  [
                                            'rules'     =>  'required',
                                            'errors'    =>  [
                                                                'required'  =>  'Username wajib diisi'
                                                            ]
                                        ],
                        'password'  =>  [
                                            'rules'     =>  'required',
                                            'errors'    =>  [
                                                                'required'  =>  'Password wajib diisi'
                                                            ]
                                        ],
                    ]);

        if(!$val) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        } else {
            $session    =   session();
            $model      =   new ModelUser();
            $username   =   strtolower($this->request->getVar('username'));
            $password   =   $this->request->getVar('password');
            $data       =   $model->where('username', $username)->first();

            if($data) {
                $pass       =   $data['password'];
                $authPass   =   password_verify($password, $pass);

                if($authPass) {
                    if($data['isactive'] == TRUE) {
                        $sessionData    =   [
                                                'id'        =>  $data['id'],
                                                'fullname'  =>  $data['fullname'],
                                                'gender'    =>  $data['gender'],
                                                'image'     =>  $data['image'],
                                                'username'  =>  $data['username'],
                                                'isactive'  =>  $data['isactive'],
                                                'isLogin'   =>  TRUE
                                            ];
                                            $session->set($sessionData);
                                            return redirect()->to(base_url('cms/dashboard'));
                    } else {
                        $session->setFlashdata('message', 'Akun Tidak Aktif');
                        return redirect()->to('login');
                    }
                } else {
                    $session->setFlashdata('message', 'Username atau Password Salah');
                    return redirect()->to('login');
                }
            } else {
                $session->setFlashdata('message', 'Username atau Password Salah');
                return redirect()->to('login');
            }
        }
    }

    public function logout()
    {
        $session    =   session();
        $session->destroy();

        return redirect()->to('login');
    }
}

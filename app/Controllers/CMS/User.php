<?php

namespace App\Controllers\CMS;

use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;

use App\Models\ModelUser;

class User extends BaseController
{
    public function index()
    {
        return view('cms/user/index');
    }

    public function loadData()
    {
        $db         =   db_connect();
        $builder    =   $db->table('users')->select('fullname, gender, username, isactive, id')->where('id !=', session()->id)->where('id !=', '1')->orderby('id', 'desc');

        return DataTable::of($builder)->addNumbering('no')
            ->edit('gender', function ($data) {
                if($data->gender == '1') {
                    return 'Laki-Laki';
                } else {
                    return 'Perempuan';
                }
            })
            ->edit('isactive', function ($data) {
                if($data->isactive == '1') {
                    return '<label class="label label-success">Aktif</label>';
                } else {
                    return '<label class="label label-danger">Nonaktif</label>';
                }
            })
            ->add('action', function($data) {
                return '<a href="user/edit/' . $data->id . '" class="btn btn-sm btn-outline-warning mr-1">EDIT</a>
                        <a href="javscript:void(0)" class="btn btn-sm btn-outline-danger ml-1" data-href="user/delete/' . $data->id . '" onclick="confirmDelete(this)">HAPUS</a>';
            })
            ->toJson(true);
    }

    public function create()
    {
        return view('cms/user/create');
    }

    public function save()
    {
        $val    =   $this->validate([
                        'fullname'  => [
                            'rules'     =>  'required|max_length[255]|regex_match[/^[a-zA-Z ]*$/]',
                            'errors'    =>  [
                                'required'      =>  'Nama Lengkap wajib diisi',
                                'max_length'    =>  'Nama Lengkap maksimal 255 karakter',
                                'regex_match'   =>  'Nama Lengkap wajib huruf dan spasi',
                            ]
                        ],
                        'gender'    => [
                            'rules'     =>  'required|in_list[0,1]',
                            'errors'    =>  [
                                'required'  =>  'Jenis Kelamin wajib dipilih',
                                'in_list'   =>  'Jenis Kelamin tidak valid',
                            ]
                        ],
                        'username'  => [
                            'rules'     =>  'required|is_unique[users.username]|min_length[4]|max_length[10]|alpha_numeric|strtolower',
                            'errors'    =>  [
                                'required'      =>  'Username wajib diisi',
                                'is_unique'     =>  'Username sudah digunakan',
                                'min_length'    =>  'Username minimal 4 karakter',
                                'max_length'    =>  'Username maksimal 10 karakter',
                                'alpha_numeric' =>  'Username wajib angka atau huruf',
                            ]
                        ],
                        'isactive'  => [
                            'rules'     =>  'required|in_list[0,1]',
                            'errors'    =>  [
                                'required'  =>  'Status wajib dipilih',
                                'in_list'   =>  'Status tidak valid',
                            ]
                        ],
                    ]);

        if(!$val) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        } else {
            $user       =   new ModelUser();
            $fullname   =   ucwords(strtolower($this->request->getVar('fullname')));
            $username   =   strtolower($this->request->getVar('username'));

            $user->save([
                'fullname'      =>  $fullname,
                'gender'        =>  $this->request->getVar('gender'),
                'username'      =>  $username,
                'password'      =>  password_hash($username, PASSWORD_DEFAULT),
                'isactive'      =>  $this->request->getVar('isactive'),
                'created_at'    =>  round(microtime(true) * 1000),
                'updated_at'    =>  round(microtime(true) * 1000),
            ]);

            session()->setFlashdata('success', 'Berhasil Tambah User');
            return redirect()->to(base_url('/cms/user'));
        }
    }

    public function edit($id)
    {
        $users  =   new ModelUser;
        $data['user']   =   $users->find($id);

        return view('cms/user/edit', $data);
    }

    public function update($id)
    {
        $val    =   $this->validate([
                        'fullname'  => [
                            'rules'     =>  'required|max_length[255]|regex_match[/^[a-zA-Z ]*$/]',
                            'errors'    =>  [
                                'required'      =>  'Nama Lengkap wajib diisi',
                                'max_length'    =>  'Nama Lengkap maksimal 255 karakter',
                                'regex_match'   =>  'Nama Lengkap wajib huruf dan spasi',
                            ]
                        ],
                        'gender'    => [
                            'rules'     =>  'required|in_list[0,1]',
                            'errors'    =>  [
                                'required'  =>  'Jenis Kelamin wajib dipilih',
                                'in_list'   =>  'Jenis Kelamin tidak valid',
                            ]
                        ],
                        'username'  => [
                            'rules'     =>  'required|is_unique[users.username,id,' . $id . ']|min_length[4]|max_length[10]|alpha_numeric|strtolower',
                            'errors'    =>  [
                                'required'      =>  'Username wajib diisi',
                                'is_unique'     =>  'Username sudah digunakan',
                                'min_length'    =>  'Username minimal 4 karakter',
                                'max_length'    =>  'Username maksimal 10 karakter',
                                'alpha_numeric' =>  'Username wajib angka atau huruf',
                            ]
                        ],
                        'isactive'  => [
                            'rules'     =>  'required|in_list[0,1]',
                            'errors'    =>  [
                                'required'  =>  'Status wajib dipilih',
                                'in_list'   =>  'Status tidak valid',
                            ]
                        ],
                    ]);

        if(!$val) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        } else {
            $user       =   new ModelUser();
            $fullname   =   ucwords(strtolower($this->request->getVar('fullname')));
            $username   =   strtolower($this->request->getVar('username'));

            $user->update($id, [
                'fullname'      =>  $fullname,
                'gender'        =>  $this->request->getVar('gender'),
                'username'      =>  $username,
                'isactive'      =>  $this->request->getVar('isactive'),
                'updated_at'    =>  round(microtime(true) * 1000),
            ]);

            session()->setFlashdata('success', 'Berhasil Update User');
            return redirect()->to(base_url('/cms/user'));
        }
    }

    public function delete($id)
    {
        $user   =   new ModelUser();
        $user->delete($id);

        session()->setFlashdata('success', 'Berhasil Hapus User');
        return redirect()->to(base_url('/cms/user'));
    }
}

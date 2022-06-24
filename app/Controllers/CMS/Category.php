<?php

namespace App\Controllers\CMS;

use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;

use App\Models\ModelCategory;

class Category extends BaseController
{
    public function index()
    {
        return view('cms/category/index');
    }

    public function loadData()
    {
        $db         =   db_connect();
        $builder    =   $db->table('categories')->select('title, description, isactive, id')->orderby('id', 'desc');

        return DataTable::of($builder)->addNumbering('no')
            ->edit('isactive', function ($data) {
                if($data->isactive == '1') {
                    return '<label class="label label-success">Aktif</label>';
                } else {
                    return '<label class="label label-danger">Nonaktif</label>';
                }
            })
            ->add('action', function($data) {
                return '<a href="category/edit/' . $data->id . '" class="btn btn-sm btn-outline-warning mr-1">EDIT</a>
                        <a href="javscript:void(0)" class="btn btn-sm btn-outline-danger ml-1" data-href="category/delete/' . $data->id . '" onclick="confirmDelete(this)">HAPUS</a>';
            })
            ->toJson(true);
    }

    public function create()
    {
        return view('cms/category/create');
    }

    public function save()
    {
        $val    =   $this->validate([
                        'title' => [
                            'rules'     =>  'required|is_unique[categories.title]|max_length[255]',
                            'errors'    =>  [
                                'required'      =>  'Nama Kategori wajib diisi',
                                'is_unique'     =>  'Nama Kategori sudah digunakan',
                                'max_length'    =>  'Nama Kategori maksimal 255 karakter',
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
            $category   =   new ModelCategory();
            $title      =   ucwords(strtolower($this->request->getVar('title')));
            $slug       =   strtolower($this->request->getVar('title'));

            $category->save([
                'title'         =>  $title,
                'description'   =>  $this->request->getVar('description'),
                'isactive'      =>  $this->request->getVar('isactive'),
                'slug'          =>  url_title($slug, '-', true),
                'created_at'    =>  round(microtime(true) * 1000),
                'updated_at'    =>  round(microtime(true) * 1000),
            ]);

            session()->setFlashdata('success', 'Berhasil Tambah Kategori');
            return redirect()->to(base_url('/cms/category'));
        }
    }

    public function edit($id)
    {
        $categories =   new ModelCategory;
        $data['category']   =   $categories->find($id);

        return view('cms/category/edit', $data);
    }

    public function update($id)
    {
        $val    =   $this->validate([
                        'title' => [
                            'rules'     =>  'required|is_unique[categories.title,id,' . $id . ']|max_length[255]',
                            'errors'    =>  [
                                'required'      =>  'Nama Kategori wajib diisi',
                                'is_unique'     =>  'Nama Kategori sudah digunakan',
                                'max_length'    =>  'Nama Kategori maksimal 10 karakter',
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
            $category   =   new ModelCategory();
            $title      =   ucwords(strtolower($this->request->getVar('title')));
            $slug       =   strtolower($this->request->getVar('title'));

            $category->update($id, [
                'title'         =>  $title,
                'description'   =>  $this->request->getVar('description'),
                'isactive'      =>  $this->request->getVar('isactive'),
                'slug'          =>  url_title($slug, '-', true),
                'updated_at'    =>  round(microtime(true) * 1000),
            ]);

            session()->setFlashdata('success', 'Berhasil Update Kategori');
            return redirect()->to(base_url('/cms/category'));
        }
    }

    public function delete($id)
    {
        $category   =   new ModelCategory();
        $category->delete($id);

        session()->setFlashdata('success', 'Berhasil Hapus Kategori');
        return redirect()->to(base_url('/cms/category'));
    }
}

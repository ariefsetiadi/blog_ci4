<?php

namespace App\Controllers\CMS;

use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;

use App\Models\ModelCategory;

class Article extends BaseController
{
    public function index()
    {
        return view('cms/article/index');
    }

    public function loadData()
    {
        $db         =   db_connect();
        $builder    =   $db->table('articles')->select('thumbnail, title, isactive, id')->orderby('id', 'desc');

        return DataTable::of($builder)->addNumbering('no')
            ->edit('isactive', function ($data) {
                if($data->isactive == '1') {
                    return '<span class="badge badge-success">Published</span>';
                } else {
                    return '<span class="badge badge-danger">Draft</span>';
                }
            })
            ->add('action', function($data) {
                return '<a href="article/show/' . $data->id . '" class="btn btn-success">DETAIL</a>
                        <a href="article/edit/' . $data->id . '" class="btn btn-warning mx-2">EDIT</a>
                        <a href="javscript:void(0)" class="btn btn-danger" data-href="article/delete/' . $data->id . '" onclick="confirmDelete(this)">HAPUS</a>';
            })
            ->toJson(true);
    }

    public function create()
    {
        $category   =   new ModelCategory();
        $data['categories'] =   $category->where('isactive', true)->where('id !=', '1')->findAll();

        return view('cms/article/create', $data);
    }

    public function save()
    {
        $val    =   $this->validate([
                        'title' => [
                            'rules'     =>  'required|is_unique[articles.title]|max_length[255]',
                            'errors'    =>  [
                                'required'      =>  'Judul wajib diisi',
                                'is_unique'     =>  'Judul sudah digunakan',
                                'max_length'    =>  'Judul maksimal 255 karakter',
                            ]
                        ],
                        'category_id' => [
                            'rules'     =>  'required',
                            'errors'    =>  [
                                'required'      =>  'Nama Kategori wajib diisi',
                            ]
                        ],
                        'thumbnail' => [
                            'rules'     =>  'uploaded[img]|mime_in[img.image/png,image/jpg,image/jpeg]|max_size[img.2048]',
                            'errors'    =>  [
                                'uploaded'  =>  'Thumbnail wajib diupload',
                                'mime_in'   =>  'Thumbnail hanya boleh PNG, JPG, atau JPEG',
                                'max_size'  =>  'Thumbnail maksimal 2 MB',
                            ]
                        ],
                        'content' => [
                            'rules'     =>  'required',
                            'errors'    =>  [
                                'required'      =>  'Konten wajib diisi',
                            ]
                        ],
                    ]);

        if(!$val) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        } else {
            echo 'success';
        }
    }

    public function show($id)
    {
        # code...
    }

    public function edit($id)
    {
        # code...
    }

    public function update($id)
    {
        # code...
    }

    public function delete($id)
    {
        # code...
    }
}

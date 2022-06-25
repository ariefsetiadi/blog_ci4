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
                    return '<label class="label label-success">Aktif</label>';
                } else {
                    return '<label class="label label-danger">Nonaktif</label>';
                }
            })
            ->add('action', function($data) {
                return '<a href="article/show/' . $data->id . '" class="btn btn-sm btn-outline-success">DETAIL</a>
                        <a href="article/edit/' . $data->id . '" class="btn btn-sm btn-outline-warning mx-2">EDIT</a>
                        <a href="javscript:void(0)" class="btn btn-sm btn-outline-danger" data-href="article/delete/' . $data->id . '" onclick="confirmDelete(this)">HAPUS</a>';
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
        # code...
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

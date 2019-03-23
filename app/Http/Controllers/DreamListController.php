<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\DreamList;


class DreamListController extends Controller
{
    public function create(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'items'       => 'required|string',
            'status'      => 'required',
        ]);

        if ($validation->fails()) {
            $errors = $validation->errors();
            return [
                'status'  => 'error',
                'message' => $errors,
                'result'  => null
            ];
        }

        $dreamlist = DreamList::create($request->all());
        if ($dreamlist) {
            return [
                'status'  => 'success',
                'message' => 'data berhasil ditambahkan',
                'result'  => $dreamlist
            ];
        } else{
            return [
                'status'  => 'error',
                'message' => 'data gagal ditambahkan',
                'result'  => null
            ];
        }
    }

    public function read(Request $request)
    {
        $dreamlist = DreamList::orderBy('created_at', 'desc')->get();
        return [
            'status'  => 'success',
            'result'  => $dreamlist
        ];
    }

    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'items'       => 'required|string',
            'status'      => 'required',
        ]);

        if ($validation->fails()) {
            $errors = $validation->errors();
            return [
                'status'  => 'error',
                'message' => $errors,
                'result'  => null
            ];
        }

        $data_dreamlist = DreamList::find($id);
        if (empty($data_dreamlist)) {
            return [
                'status'  => 'error',
                'message' => 'data tidak ditemukan',
                'result'  => null
            ];
        }

        $dreamlist = $data_dreamlist->update($request->all());
        if ($dreamlist) {
            return [
                'status'  => 'success',
                'message' => 'data berhasil diubah',
                'result'  => $dreamlist
            ];
        } else{
            return [
                'status'  => 'error',
                'message' => 'data gagal diubah',
                'result'  => null
            ];
        }
    }

    public function delete(Request $request, $id)
    {
        $data_dreamlist = DreamList::find($id);
        if (empty($data_dreamlist)) {
            return [
                'status'  => 'error',
                'message' => 'data tidak ditemukan',
                'result'  => null
            ];
        }

        $dreamlist = $data_dreamlist->delete($id);
        if ($dreamlist) {
            return [
                'status'  => 'success',
                'message' => 'data berhasil dihapus',
                'result'  => $dreamlist
            ];
        } else{
            return [
                'status'  => 'error',
                'message' => 'data gagal dihapus',
                'result'  => null
            ];
        }
    }

    public function detail ($id) {
        $dreamlist = DreamList::find($id);

        if (empty($dreamlist)) {
            return [
                'status'  => 'error',
                'message' => 'data gagal ditemukan',
                'result'  => null
            ];
        }
        
        return [
            'status'  => 'success',
            'result'  => $dreamlist
        ];
    }
}

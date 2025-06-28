<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    private $arr = [
        ['id' => 1, 'nama' => 'Fajar', 'kelas' => 'XII RPL 3'],
        ['id' => 2, 'nama' => 'Ubed',  'kelas' => 'XII RPL 4'],
        ['id' => 3, 'nama' => 'Cemen', 'kelas' => 'XII RPL 5'],
    ];

    public function index()
    {
        $siswa = session('siswa_data');
        return view('siswa.index', ['siswa' => $siswa]);
    }

    public function show($id)
    {
        $siswa = collect($data)->firstWhere('id', $id); 

        if (!$siswa) {
            abort(404);
        }

        return view('siswa.show', compact('siswa'));
    }

    public function create()
    {
        return view('siswa.create');
    }

    public function store(Request $request)
    {
        $siswa = session('siswa_data', $this->arr);
        $newId = collect($siswa)->max('id') + 1;

        $siswa[] = [
            'id' => $newId,
            'kelas' => $request->kelas,
            'nama' => $request->nama, 
        ];

        session(['siswa_data' => $siswa]);
        return redirect('siswa');
    }

    public function edit($id)
    {
        $data = session('siswa_data', $this->arr);
        $siswa = collect($data)->firstWhere('id', $id); // ← FIX: gunakan data dari session

        if (!$siswa) {
            abort(404); 
        }

        return view('siswa.edit', compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        $data = session('siswa_data', $this->arr);

        foreach ($data as &$item) {
            if ($item['id'] == $id) {
                $item['nama'] = $request -> nama;
                $item['kelas'] = $request -> kelas;
            }
        }
        session(['siswa_data' => $data]);
        return redirect('siswa.index');
    }
    public function destroy($id)
    {
        $siswa = session('siswa_data', $this->arr);
        //Mencari array di colom 
        $index = array_search($id, array_coloumn($siswa,'id'));

        $array_splice($siswa, $index, 1);
        session(['siswa_data' => $siswa]);

        return redirect('siswa.index');

    }
}

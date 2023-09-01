<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ruangan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ruangan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        // Session::flash('Nama', $request->Nama);
          //    Session::flash('Jabatan', $request->Jabatan);
        //  Session::flash('Instansi', $request->Instansi);
      //  Session::flash('NIP', $request->NIP);
      //    Session::flash('Tujuan', $request->Tujuan);
     //         Session::flash('Jenis_kelamin', $request->Jenis_kelamin);
    //  Session::flash('No_telephone', $request->No_telephone); 
 
                         $request->validate([
                            'Nama' => 'required',
                            'waktu' => 'required',
                             'Jabatan' => 'required',
                                   'Instansi' => 'required',
                              'NIP' => 'required|numeric|unique:ruangan,NIP',
                                 'Tujuan' => 'required',
                                     'Jenis_kelamin' => 'required',
                             'No_telephone' => 'required|numeric',
                         ], [
                             'Nama.required' => 'Nama wajib diisi',
                             'waktu.required' => 'Waktu Wajib diisi',
                             'NIP.unique' => 'NIP sudah ada di database',
                             'Jabatan.required' => 'Jabatan wajib diisi',
                             'Instansi.required' => 'Instansi wajib diisi',
                             'NIP.required' => 'NIP wajib diisi',
                             'NIP.numeric' => 'NIP wajib ANGKA!',
                             'Tujuan.required' => 'Tujuan wajib diisi',
                             'Jenis_kelamin.required' => 'Jenis kelamin wajib diisi',
                             'No_telephone.required' => 'No telephone wajib diisi',
                             'No_telephone.numeric' => 'No telephone wajib ANGKA!',
                             
 
 
 
                         ]);
        $data = 
         [
             'Nama'=>$request->Nama,
             'waktu'=>$request->waktu,
 
             'Jabatan'=>$request->Jabatan,
             'Instansi'=>$request->Instansi,
             'NIP'=>$request->NIP,
             'Tujuan'=>$request->Tujuan,
             'Jenis_kelamin'=>$request->Jenis_kelamin,
             'No_telephone'=>$request->No_telephone,
 
              ];
     ruangan::create($data);
     return redirect()->to('ruangan/create')->with('success',' Berhasil Menambahkan DATA');     
              
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

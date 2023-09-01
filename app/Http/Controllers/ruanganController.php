<?php

namespace App\Http\Controllers;

use App\Models\ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Deletes;
use SimpleSoftwareIO\QrCode\Facades\QrCode;





class ruanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)

    {
        
        $data6 = ruangan::orderBy('id', 'desc')->get();
        return view('ruangan.index')->with('data', $data6);
    
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

      $data = ruangan::where('NIP' , $id)->first();
      return view('ruangan.edit')->with('data', $data);

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
        $request->validate([
           'Nama' => 'required',
           'waktu' => 'required',
            'Jabatan' => 'required',
            'Instansi' => 'required',
            'Tujuan' => 'required',
            'Jenis_kelamin' => 'required',
            'No_telephone' => 'required|numeric:ruangan,No_telephone',
        ], [
            'Nama.required' => 'Nama wajib diisi',
            'waktu.required' => 'Waktu Wajib diisi',

            'Jabatan.required' => 'Jabatan wajib diisi',
            'Instansi.required' => 'Instansi wajib diisi',
            'Tujuan.required' => 'Tujuan wajib diisi',
            'Jenis_kelamin.required' => 'Jenis kelamin wajib diisi',
            'No_telephone.required' => 'No telephone wajib diisi',
            'No_telephone.numeric' => 'No telephone wajib ANGKA!',


        ]);

$data = [
'Nama'=>$request->Nama,
'waktu'=>$request->waktu,
'Jabatan'=>$request->Jabatan,
'Instansi'=>$request->Instansi,
'Tujuan'=>$request->Tujuan,
'Jenis_kelamin'=>$request->Jenis_kelamin,
'No_telephone'=>$request->No_telephone,

];
ruangan::where('id', $id)->update($data);
return redirect()->to('ruangan')->with('success',' Berhasil Memperbarui DATA');     

}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $ida
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        ruangan::where('id', $id)->delete();
        return redirect()->to('ruangan')->with('success', 'Berhasil Menghapus DATA');
        

    }
   

}

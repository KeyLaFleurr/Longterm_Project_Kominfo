<?php

namespace App\Http\Controllers;

use App\Models\pendataan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Deletes;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\DB;


class pendataanController extends Controller

  


{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    
   {
        
    $data6 = pendataan::orderBy('id', 'desc')->get();
    return view('pendataan.index')->with('data', $data6);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pendataan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $request->validate([
                'tanggal'=>'required',
                'nomor_bidang'=>'required',
                'nomor_surat'=>'required',
                'asal_surat'=>'required',
                'perihal'=>'required',
                'disposisi_kabid'=>'required',
                'dokumen'=>'required',
            ],[
                'tanggal.required'=> 'Tanggal wajib diisi',
                'nomor_bidang.required'=> 'Nomor Bidang wajib diisi',
                'nomor_surat.required'=> 'Nomor Surat wajib diisi',
                'asal_surat.required'=> 'Asal Surat wajib diisi',
                'perihal.required'=> 'Perihal wajib diisi',
                'disposisi_kabid.required'=> 'Disposisi Kabid wajib diisi',
                'dokumen'=> 'Dokumen Wajib Diisi'
            ]);

        $data = [
            'tanggal' =>$request->tanggal,
            'nomor_bidang' =>$request->nomor_bidang,
            'nomor_surat' =>$request->nomor_surat,
            'asal_surat' =>$request->asal_surat,
            'perihal' =>$request->perihal,
            'disposisi_kabid' =>$request->disposisi_kabid,
            'seksi' =>$request->seksi,
            'dokumen' =>$request->dokumen,

        ];
        pendataan::create($data);
        return redirect()->to('pendataan')->with('success',' Berhasil menambahkan DATA');
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
        return view('pendataan.index');
     
    }
   
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data = pendataan::where('id' , $id)->first();
        return view('pendataan.edit')->with('data', $data);  
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
           'tanggal' => 'required',
           'nomor_bidang' => 'required',
           'nomor_surat' => 'required',
            'asal_surat' => 'required',
            'perihal' => 'required',
            'disposisi_kabid' => 'required',
            'seksi' => 'required',
            'dokumen' => 'required',
        ], [
            'tanggal.required' => 'Tanggal wajib diisi',
            'nomor_bidang.required' => 'Nomor Bidang wajib diisi',
            'nomor_surat.required' => 'Nomor Surat wajib diisi',
            'asal_surat.required' => 'Asal Surat wajib diisi',
            'perihal.required' => 'Perihal wajib diisi',
            'disposisi_kabid.required' => 'Disposisi Kabid wajib diisi',
            'seksi.required' => 'Seksi wajib diisi',
            'dokumen.required' => 'Dokumen wajib diisi',

        ]);

$data = [
'tanggal'=>$request->tanggal,
'nomor_bidang'=>$request->nomor_bidang,
'nomor_surat'=>$request->nomor_surat,
'asal_surat'=>$request->asal_surat,
'perihal'=>$request->perihal,
'disposisi_kabid'=>$request->disposisi_kabid,
'seksi'=>$request->seksi,
'dokumen'=>$request->dokumen,

];
pendataan::where('id', $id)->update($data);
return redirect()->to('pendataan')->with('success',' Berhasil Memperbarui DATA');     

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        pendataan::where('id', $id)->delete();
    
    return redirect()->to('pendataan')->with('success', ' Berhasil Menghapus DATA');
        
    }

  
}

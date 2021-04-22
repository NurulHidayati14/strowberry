<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $surats = Surat::latest()->paginate(5);
         
        return view('surats.index',compact('surats'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
  
    public function create()
    {
        return view('surats.create');
    }
  
    public function store(Request $request)
    {

        $request->validate([
            'no_surat' => 'required',
            'tgl_surat' => 'required',
            'jdl_surat' => 'required',
        ]);
         

        Surat::create($request->all());
         

        return redirect()->route('surats.index')
                        ->with('success','Surat created successfully.');
    }
  
    public function edit(Surat $surat)
    {

        return view('surats.edit',compact('surat'));
    }
  
    public function update(Request $request, Surat $surat)
    {

        $request->validate([
            'no_surat' => 'required',
            'tgl_surat' => 'required',
            'jdl_surat' => 'required',
        ]);
         

        $surat->update($request->all());
         

        return redirect()->route('surats.index')
                        ->with('success','Surat updated successfully');
    }
  
    public function destroy(Surat $surat)
    {
        /// melakukan hapus data berdasarkan parameter yang dikirimkan
        $surat->delete();
  
        return redirect()->route('surats.index')
                        ->with('success','Surat deleted successfully');
    }
}

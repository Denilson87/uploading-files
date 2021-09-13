<?php

namespace App\Http\Controllers\storeControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\candidates;
use App\Models\area;
use App\Models\lingua;
use App\Models\nivel;
use App\Models\state;
use App\Models\experiencia;
use App\Http\Requests\candidatesVerifyRequest;

class fileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \ Illuminate\Http\Response
     */
    public function index()
    {
    
        $result = state::all();
        $area = area::all();  
        $nivel = nivel::all(); 
        $experiencia = experiencia::all();     
        return view('store.jobs')
             ->with('prolist',$result)
             ->with('arealist',$area)
             ->with('nivellist',$nivel)
             ->with('explist', $experiencia);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
                'filenames' => 'required',
                'filenames.*' => 'required'
        ]);
  
        $files = [];
        if($request->hasfile('filenames'))
         {
            foreach($request->file('filenames') as $file)
            {
                $name = time().rand(1,100).'.'.$file->extension();
                $file->move(public_path('files'), $name);  
                $files[] = $name;  
            }
         }  
         $file= new candidates();
         $file ->name = $request->Name;
         $file ->surname =$request->Surname;
         $file ->email =$request ->Email;
         $file ->birthday =$request->Birthday;
         $file ->state_id =$request->Address;
         $file ->lingua_id =$request->Lingua;
         $file ->nivel_id =$request->NivelAC;
         $file ->experiencia_id=$request->Anos;
         $file ->interest=$request->Interest;
         $file ->strong=$request->Strong;
         $file ->why=$request->Why;
         $file ->whyLeft=$request->WhyLeft;
         $file ->salary=$request->Salary;
         $file ->codigoR=$request->CodigoR;
         $file ->area_id=$request->AreaCA;
         $file->filenames = $files;
         $file->save();
  
        return back()->with('success', 'Data Your files has been successfully added');
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

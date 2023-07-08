<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Talent;
use Illuminate\Support\Facades\DB;

class TalentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function dashboard(){
       
        $max = 1000;

        $min = 10;

        return view('admin.main-dashboard',[
            'title'=>'Dashboard - PT WARNA EMAS INDONESIA',
            'sumOfTalent'=>DB::table('talent')->count(),
            'maxOfFollowers'=>$max,
            'minOfFollowers'=>$min,
        ]);
    }
    public function index()
    {
        $data=Talent::orderBy('username','asc')->get();
        return view('admin.table',['title'=>'Database - PT WARNA EMAS INDONESIA','data'=>$data]);
    }

    /***
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.talent');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
   {
        $request->session()->flash('username', $request->username); 
        $request->session()->flash('followers', $request->followers); 
        $request->session()->flash('notelfon', $request->notelfon); 
        $request->session()->flash('ratecard', $request->ratecard); 
        $request->validate([
            'username'=>'required|unique:Talent,username',
            'followers'=>'required',
            'notelfon'=>'required|numeric',
            'ratecard'=>'required|numeric'
        ],[
            'username.required'=> 'Username wajib di isi',
            'username.unique'=> 'Username sudah ada dalam database',
            'followers.required'=> 'Followers wajib di isi',
            'notelfon.required'=> 'No Telfon wajib di isi',
            'notelfon.numeric'=> 'No Telfon di isi angka',
            'ratecard.required'=> 'Ratecard wajib di isi',
            'ratecard.numeric'=> 'Ratecard di isi angka',
        ]);
            $data=[
                'username'=>$request->username,
                'followers'=>$request->followers,
                'notelfon'=>$request->notelfon,
                'ratecard'=>$request->ratecard,
            ];
        Talent::create($data);
        return redirect('/admin/database')->with('success','Data berhasil ditambahkan kedalam Database');
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
        $data=Talent::find($id);
       return view('admin.edit',compact(['data']));
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
        $data=Talent::find($id);
        $data->update($request->except(['_token','submit']));
        return redirect('/admin/database')->with('success','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
   $data=Talent::find($id);
   $data->delete();
   return redirect('/admin/database')->with('success','Data berhasil dihapus');
}

}

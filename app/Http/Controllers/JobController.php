<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class JobController extends Controller
{

    public function index()
    {
        return view('jobs.index',[
            'jobs'=>Jobs::latest()->filter(request(['tag','search']))->simplePaginate(6)
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'=>'required|min:5|max:255|string',
            'company'=>['required',Rule::unique('jobs','company')],
            'tags'=> 'required|min:2',
            'location'=>'required',
            'email'=>'email|required',
            'website'=>'required',
            'description'=>'required|min:5'
        ]);

        if($request->hasFile('logo')){
            $data['logo']=$request->file('logo')->store(
                'images' );
        }else{
            $data['logo']='images/logo.png';
        }

        $job= new Jobs($data);
        $job->save();
        return redirect()->route('jobs.index')->with('message','Shpallja u postua me sukses! ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Jobs $job)
    {
        return view('jobs.show',[
            'job'=>$job
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = Jobs::where('id',$id)->firstOrFail();
        return view('jobs.edit')->with(compact('job'));
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
            'title'=>'required|min:5|max:255|string',
            'company'=>['required'],
            'tags'=> 'required|min:2',
            'location'=>'required',
            'email'=>'email|required',
            'website'=>'required',
            'description'=>'required|min:5'
        ]);
        $job = Jobs::where('id',$id)->firstOrFail();
        $data=$request->all();

        $path='';
        if($request->file('logo')!= null) {
            $path= $request->file('logo')->store('images');
            if($job->logo != 'images/no-image.png'){
                Storage::delete(
                    '/'.$job->logo);
            }
            $path=$job->logo;
        }
        $data['logo']=$path;

        $job->update($data);
        return redirect()->route('jobs.show',$job->id)->with('message','Shpallja u ndryshua me sukses! ');

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

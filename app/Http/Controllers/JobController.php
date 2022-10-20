<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class JobController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only(['create','store','edit','update','destroy']);
    }



    public function index()
    {
        return view('jobs.index',[
            'jobs'=>Jobs::latest()->filter(request(['tag','search']))->simplePaginate(6)
        ]);

    }

    public function create()
    {
        return view('jobs.create');
    }


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
        $data=$request->all();

        if($request->hasFile('logo')){
            $data['logo']=$request->file('logo')->store(
                'images' );
        }else{
            $data['logo']='images/logo.png';
        }
        $data['user_id']=auth()->id();

        $job= new Jobs($data);
        $job->save();
        return redirect()->route('jobs.index')->with('message','Shpallja u postua me sukses! ');
    }

    public function show(Jobs $job)
    {
        return view('jobs.show',[
            'job'=>$job
        ]);
    }

//    public function edit($id)
//    {
//        $user=User::all();
//        $job = Jobs::where('id',$id)->firstOrFail();
//
//        if($job->user_id != auth()->id() ){
//            abort('403','Nuk keni akses');
//        }else{
//        return view('jobs.edit')->with(compact('job'));
//        }
//        }

    public function edit($id)
    {
        $user=User::all();
        $job = Jobs::where('id',$id)->firstOrFail();

        if($job->user_id = auth()->id() OR $user->role='admin'){
            return view('jobs.edit')->with(compact('job'));
        }else{
            abort('403','Nuk keni akses');
        }
    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'title'=>'required|min:5|max:255|string',
            'company'=>['required'],
            'tags'=> 'required|min:2',
            'location'=>'required',
            'email'=>'email|required',
            'website'=>'required',
            'description'=>'required|min:5',
            'image' => 'file|image|mimes:png,jpeg,jpg|dimensions:min_width=100,min_height=200'
        ]);
        $job = Jobs::where('id',$id)->firstOrFail();
        $data=$request->all();

        $path=$job->logo;
        if($request->file('logo') != null) {
            $path= $request->file('logo')->store('images');

            if($job->logo != 'images/no-image.png'){
                Storage::delete(
                    '/'.$job->logo);
            }
            $job->logo=$path;
        }
        $data['logo']=$path;

        $job->update($data);
        return redirect()->route('jobs.index')->with('message','Shpallja u ndryshua me sukses! ');

    }


    public function destroy($id)
    {
        $job=Jobs::where('id',$id)->firstOrFail();
        $job->delete();
        return redirect()->route('jobs.index')->with('message','Shpallja u fshi me sukses');
    }

    public function register(){
        return view('auth.register');
    }

    public function manage(){
        return view('jobs.manage',['jobs'=>auth()->user()->jobs()->get()]);
    }

    public function admin(){
        $jobs=Jobs::all();
        $user=User::all();
        return view('admin.manage')->with(compact('jobs'))->with(compact('user'));
    }
}

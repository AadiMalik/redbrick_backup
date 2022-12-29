<?php

namespace App\Http\Controllers;

use App\Models\Backup;
use App\Models\User;
use Illuminate\Http\Request;

class BackupController extends Controller
{
    public function index()
    {
        $backup = Backup::orderBy('id','DESC')->with(['user_name'])->where('user_id',auth()->user()->id)->get();
        
        return view('user/backup', compact('backup'));
    }
    public function Branch()
    {
        $backup = Backup::with(['user_name'])->orderBy('created_at','DESC')->get();
        $user = User::where('backup',1)->where('part_of',Auth()->user()->email)->get();
        
        return view('user/view_backup', compact('backup','user'));
    }
    public function create()
    {
        return view('user/addbackup');
    }
    public function store(Request $request)
    {
        $validation=$request->validate(
            [
            'backup' => 'required'
        ]);
        
        $backup = new Backup;
        if($request->hasfile('backup')){
            $image = $request->file('backup');
            $size = $request->file("backup")->getSize();
            $upload = 'Backup/';
            $orignalname=$image->getClientOriginalName();
            $filename = time().$image->getClientOriginalName();
            $path    = move_uploaded_file($image->getPathName(), $upload.$filename);
            $backup->name = $orignalname;
            $backup->backup = $filename;
            $backup->size = $size;
        }
        $backup->user_id =  Auth()->user()->id;
        $backup->save();
        return response()->json(['success'=>'Successfully uploaded.']);
    }
}

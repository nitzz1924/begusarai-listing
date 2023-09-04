<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Http\Request;
// use App\Models\Master;
use App\Http\Controllers\Controller; // Update the namespace here

class MasterController extends Controller
{

   public function index()
{

   // $data = Master::where('type', '=', 'Master')->get();
   
   // dd($data);
   return view('admin.master');
}

   public function insertMaster(Request $request){
   //   dd($request->all());
		$this->validate($request, [
         'label'    =>  'required',
         'value'     =>  'required'
     ]);
     $student = new Master([
         'label'    =>  $request->get('label'),
         'value'     =>  $request->get('value'),
     ]);
     //dd($student);
     $student->save();
     return redirect()->route('admin.master')->with('success', 'Data Added');
   }
   public function deleteMaster($id)
   {
      //dd($id);
      $cliente = Master::find($id); 
      $cliente->delete(); //delete the client
      return redirect()->route('admin.master')->with('success', 'Delete successfully');
   }
   public function selectMasterList($label)
   {
      //dd($label);
      $dataList=Master::where('type', '=', 'Master')->get();
      $dataMasterList=Master::where('type', '<>', 'Master')->get();
      $dataSubList=Master::where('type', '=', $label)->get();
      $selected="";
      return view('category',compact('dataList','dataMasterList','dataSubList','selected'));
   }
}

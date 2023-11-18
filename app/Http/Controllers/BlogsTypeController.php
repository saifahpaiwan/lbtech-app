<?php

namespace App\Http\Controllers;

use App\Models\blog_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogsTypeController extends Controller
{
    public function index()
    {
        $data = blog_type::all();
        return view('blog_type.index', compact('data'));
    }

    public function create()
    {
        return view('blog_type.create');
    }

    public function edit($id)
    {
        // $data = blog_type::where('id', $id)->first();
        $data = blog_type::find($id);
        return view('blog_type.edit', compact('data'));
    }

    public function SaveBlogsType(Request $request)
    {
        $validate = [
            'name' => 'required|string|max:255', 
        ];   
        request()->validate($validate);
  
        $input = $request->all();
        // $input['name'] = $request->name_th;
        $data = blog_type::create($input); 
        // DB::table('blog_types')->insert($input);
        if($data){
            return redirect()->route('blogs.type.index')->with('success', 'บันทึกข้อมูลสำเร็จ.');
        }  else {
            return back()->with('error', 'มีข้อผิดผลาด.');
        }
    }

    public function UpdateBlogsType(Request $request)
    {
        $validate = [
            'id'   => 'required',
            'name' => 'required|string|max:255', 
        ];   
        request()->validate($validate);

        $input = $request->all();
        $data = blog_type::find($request->id); 
        $data->update($input);  
        // DB::table('blog_types')->where('id', $request->id)->update($input);
        if($data){
            return redirect()->route('blogs.type.edit', [$request->id])->with('success', 'แก้ไขข้อมูลสำเร็จ.');
        }  else {
            return back()->with('error', 'มีข้อผิดผลาด.');
        }
    }

    public function DeleteBlogsType(Request $request)
    {
        if(isset($request->id) && !empty($request->id)){
            $data = blog_type::find($request->id); 
            $data->delete(); 
            if($data){
                return redirect()->route('blogs.type.index')->with('success', 'ลบข้อมูลสำเร็จ.');
            }  else {
                return back()->with('error', 'มีข้อผิดผลาด.');
            }
        }
    }   
}

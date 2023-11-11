<?php

namespace App\Http\Controllers;

use App\Models\blog;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    public function index()
    { 
        $data = blog::where('status', 1)->get();
        return view('blogs.index', compact('data'));
    }

    public function create()
    { 
        return view('blogs.create');
    }

    public function edit($id)
    { 
        $data = blog::find($id);
        return view('blogs.edit', compact('data'));
    }

    public function SaveBlogs(Request $request)
    { 
        $validate = [
            'title' => 'required',
            'title_sub' => 'required', 
            'link_youtube' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
 
            'status' => 'required',
        ];

        if (isset($request->images_name) && !empty($request->images_name)) {
            $validate['images_name'] = 'required';
        }

        if (isset($request->file_pdf_name) && !empty($request->file_pdf_name)) {
            $validate['file_pdf_name'] = 'required';
        }
        
        request()->validate($validate);
        
        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
        $input['status']  = ($request->status==true)? true : false;
        $data = blog::create($input);
        if($data){
            return redirect()->route('blogs.index')->with('success', 'บันทึกข้อมูลสำเร็จ.');
        }  else {
            return back()->with('error', 'มีข้อผิดผลาด.');
        }
    }

    public function UpdateBlogs(Request $request)
    {
        $validate = [
            'title' => 'required',
            'title_sub' => 'required', 
            'link_youtube' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
 
            'status' => 'required',
        ];

        if (isset($request->images_name) && !empty($request->images_name)) {
            $validate['images_name'] = 'required';
        }

        if (isset($request->file_pdf_name) && !empty($request->file_pdf_name)) {
            $validate['file_pdf_name'] = 'required';
        }
        
        request()->validate($validate);

        $blog = blog::find($request->id); 
        if(isset($blog)){
            $input = $request->all();
            $input['user_id'] = auth()->user()->id;
            $input['status']  = ($request->status==true)? true : false; 
            
            $blog->update($input);
            if($blog){
                return redirect()->route('blogs.index')->with('success', 'แก้ไขข้อมูลสำเร็จ.');
            }  else {
                return back()->with('error', 'มีข้อผิดผลาด.');
            }
        } 
    } 

    public function DeleteBlogs(Request $request)
    {
        $blog = blog::find($request->id); 
        $blog->delete();
        if($blog){
            return redirect()->route('blogs.index')->with('success', 'ลบข้อมูลสำเร็จ.');
        }  else {
            return back()->with('error', 'มีข้อผิดผลาด.');
        }
    } 
}

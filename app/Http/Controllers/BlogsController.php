<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\blog_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class BlogsController extends Controller
{
    public function index()
    {
        $data = blog::where('status', 1)->get();
        return view('blogs.index', compact('data'));
    }

    public function create()
    {
        $types = blog_type::all();
        return view('blogs.create', compact('types'));
    }

    public function edit($id)
    {
        $data = blog::find($id);
        $types = blog_type::all();
        return view('blogs.edit', compact('data', 'types'));
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

        if (isset($request->image_name) && !empty($request->image_name)) {
            $validate['image_name'] =  'required|image|mimes:jpg,png,jpeg|max:2048'; // 2MB
        }

        if (isset($request->file_pdf_name) && !empty($request->file_pdf_name)) {
            $validate['file_pdf_name'] = 'required|mimes:pdf|max:2048'; // 2MB
            // csv,txt,xlx,xls,pdf
        }

        request()->validate($validate);

        #########################
        ##### UPLOADE FILE  #####
        ######################### 
        if ($request->file('image_name')) {
            if (!empty($request->file('image_name'))) {
                $uploade_location = 'images/blogs/';
                $file = $request->file('image_name');
                $file_gen = hexdec(uniqid());
                $file_ext = strtolower($file->getClientOriginalExtension());
                $fileName = $file_gen . '.' . $file_ext;
                $file->move($uploade_location, $fileName);
            }
        }

        $fileNamePDF = "";
        if ($request->file('file_pdf_name')) {
            if (!empty($request->file('file_pdf_name'))) {
                $uploade_locationPDF = 'images/blogs/pdf'; 
                $filePDF = $request->file('file_pdf_name');
                $file_genPDF = hexdec(uniqid());
                $file_extPDF = strtolower($filePDF->getClientOriginalExtension());
                $fileNamePDF = $file_genPDF . '.' . $file_extPDF;
                $filePDF->move($uploade_locationPDF, $fileNamePDF);
            }
        }


        $linkYoutube = null;
        if(isset($request->link_youtube) && !empty($request->link_youtube)){ 
            $explode1 = explode('https://youtu.be/', $request->link_youtube);
            $explode2 = explode('https://www.youtube.com/live/', $request->link_youtube);
          
            if(isset($explode1) && count($explode1) >1 ){
                $linkYoutube =  (isset($explode1[1]) && !empty($explode1[1]))? $explode1[1] : "";
            } else if(isset($explode2) && count($explode2) >1 ){
                $linkYoutube = (isset($explode2[1]) && !empty($explode2[1]))? $explode2[1] : "";
            } 
        }

       
        $input = $request->all();
        $input['image_name'] = $fileName;
        $input['file_pdf_name'] = $fileNamePDF;
        $input['link_youtube'] = $linkYoutube;
        $input['user_id'] = auth()->user()->id;
        $input['status']  = ($request->status == true) ? true : false;
        $data = blog::create($input);
        if ($data) {
            return redirect()->route('blogs.index')->with('success', 'บันทึกข้อมูลสำเร็จ.');
        } else {
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
        $fileName = $blog->image_name;
        $fileNamePDF = $blog->file_pdf_name;
        #########################
        ##### UPLOADE FILE  #####
        ######################### 
        if ($request->file('image_name')) {
            if (!empty($request->file('image_name'))) {
                $uploade_location = 'images/blogs/';

                if (isset($fileName) && !empty($fileName)) {
                    @unlink($uploade_location . $fileName);
                }

                $file = $request->file('image_name');
                $file_gen = hexdec(uniqid());
                $file_ext = strtolower($file->getClientOriginalExtension());
                $fileName = $file_gen . '.' . $file_ext;
                $file->move($uploade_location, $fileName);
            }
        }

        if ($request->file('file_pdf_name')) {
            if (!empty($request->file('file_pdf_name'))) {
                $uploade_locationPDF = 'images/blogs/pdf';

                if (isset($fileNamePDF) && !empty($fileNamePDF)) {
                    @unlink($uploade_locationPDF . $fileNamePDF);
                }

                $filePDF = $request->file('file_pdf_name');
                $file_genPDF = hexdec(uniqid());
                $file_extPDF = strtolower($filePDF->getClientOriginalExtension());
                $fileNamePDF = $file_genPDF . '.' . $file_extPDF;
                $filePDF->move($uploade_locationPDF, $fileNamePDF);
            }
        }

        $linkYoutube = null;
        if(isset($request->link_youtube) && !empty($request->link_youtube)){ 
            $explode1 = explode('https://youtu.be/', $request->link_youtube);
            $explode2 = explode('https://www.youtube.com/live/', $request->link_youtube);
          
            if(isset($explode1) && count($explode1) >1 ){
                $linkYoutube =  (isset($explode1[1]) && !empty($explode1[1]))? $explode1[1] : "";
            } else if(isset($explode2) && count($explode2) >1 ){
                $linkYoutube = (isset($explode2[1]) && !empty($explode2[1]))? $explode2[1] : "";
            } 
        }  

        if (isset($blog)) { 
            $input = $request->all();
            $input['image_name'] = $fileName;
            $input['file_pdf_name'] = $fileNamePDF;
            $input['link_youtube'] = $linkYoutube; 
            $input['user_id'] = auth()->user()->id;
            $input['status']  = ($request->status == true) ? true : false;

            $blog->update($input);
            if ($blog) {
                return redirect()->route('blogs.index')->with('success', 'แก้ไขข้อมูลสำเร็จ.');
            } else {
                return back()->with('error', 'มีข้อผิดผลาด.');
            }
        }
    }

    public function DeleteBlogs(Request $request)
    {
        $blog = blog::find($request->id);

        $fileName = $blog->image_name;
        $uploade_location = 'images/blogs/';
        if (isset($fileName) && !empty($fileName)) {
            @unlink($uploade_location . $fileName);
        }

        $blog->delete();
        if ($blog) {
            return redirect()->route('blogs.index')->with('success', 'ลบข้อมูลสำเร็จ.');
        } else {
            return back()->with('error', 'มีข้อผิดผลาด.');
        }
    }
}

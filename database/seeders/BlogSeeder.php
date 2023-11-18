<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BlogSeeder extends Seeder
{ 
    public function run()
    {
        DB::table('blogs')->insert([ 
            "title" => " Blog Test 101",
            "type_id" => "1",
            "title_sub" => "Blog Sub 101",
            "description" => "Blog Description 101",
            "image_name" => "blog_img.jpg",
            "file_pdf_name" => "blog_pdf.jpg",
            "link_youtube" => "",
    
            "meta_title" => "Blog Test 101",
            "meta_description" => "Blog Description 101",
            "meta_keywords" => "Blog Test Description",
    
            "count_view" => "5",
            "status" => true,
            "user_id" => 1
        ]);
    }
}

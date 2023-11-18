<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class blog extends Model
{
    use HasFactory;
    protected $fillable = [
        "title",
        "type_id",
        "title_sub",
        "description",
        "image_name",
        "file_pdf_name",
        "link_youtube",
        "summarynote",

        "meta_title",
        "meta_description",
        "meta_keywords",

        "count_view",
        "status",
        "user_id"
    ];

    public function rType(): HasOne
    {
        return $this->hasOne(blog_type::class, 'id', 'type_id');
    }

    public function rUser(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function mBlogImages(): HasMany
    {
        return $this->hasMany(blog_image::class, 'blog_id', 'id')->orderBy('id', 'DESC');
    }
}

<?php

namespace Application\Admin;

use Illuminate\Database\Eloquent\Model;

class ContentLang extends Model
{
    protected $table='content_lang';

    protected $fillable = [
        'name',
        'content',
        'description',
        'language_id',
        'image',
        'metatags',
    ];

    public function content(){
        return $this->belongsTo('Application\Admin\Content');
    }
}

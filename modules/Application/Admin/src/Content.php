<?php

namespace Application\Admin;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = 'content';

    protected $fillable =[
        'alias',
        'published',
        'date_start',
        'gallery_id',
        'position'
    ];

    public function contentLang()
    {
        return $this->hasMany('Application\Admin\ContentLang','content_id');
    }

    public function structure()
    {
        return $this->belongsToMany('Application\Admin\Structure')->withTimestamps();
    }
}

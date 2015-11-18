<?php

namespace Application\Admin;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\Node;

class Structure extends Node
{
    protected $table = 'structure';

    protected $fillable =[
        'alias',
        'parent_id',
        'controller',
        'position'
    ];

    public function structureLang(){
        return $this->hasMany('Application\Admin\StructureLang','structure_id');
    }
}

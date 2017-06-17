<?php

namespace Prego;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['task_name', 'project_id'];

    public function scopeProject($query, $id)
    {
    	return $query->where('project_id', $id);
    }
}

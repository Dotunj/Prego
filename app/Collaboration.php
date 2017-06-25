<?php

namespace Prego;

use Illuminate\Database\Eloquent\Model;

class Collaboration extends Model
{
    protected $table = 'project_collaborator';

    protected $fillable = ['project_id', 'collaborator_id'];

    public function user()
    {
    	return $this->belongsTo(User::class, 'collaborator_id');
    }
    
     public function scopeProject($query, $id)
    {
    	return $query->where('project_id', $id);
    }
}

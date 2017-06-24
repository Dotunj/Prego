<?php

namespace Prego;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['comments', 'project_id', 'user_id'];

    public function scopeProject($query, $id)
    {
    	return $query->where('project_id', $id);
    }
  public function user()
  {
  	return $this->belongsTo(User::class);
  }
}

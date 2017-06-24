<?php

namespace Prego;

use Illuminate\Database\Eloquent\Model;

class Collaboration extends Model
{
    protected $table = 'project_collaborator';

    protected $fillable = ['project_id', 'collaborator_id'];
}

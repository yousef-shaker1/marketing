<?php

namespace App\Models;

use App\Models\Group as GroupModel;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{   
    protected $table = 'groups';
    protected $guarded = [];
}

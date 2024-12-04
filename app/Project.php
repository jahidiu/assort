<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function floor_plans()
    {
        return $this->hasMany('App\FloorPlan', 'project_id', 'id');
    }

    public function images()
    {
        return $this->hasMany('App\ProjectImage', 'project_id', 'id');
    }

    public function videos()
    {
        return $this->hasMany('App\ProjectVideo', 'project_id', 'id');
    }

    public function ScopeOnGoingProjects($query)
    {
        return $query->where('status', 1)->orderBy('sort_number','asc');
    }

    public function ScopeUpCommingProjects($query)
    {
        return $query->where('status',2)->orderBy('sort_number','asc');;
    }
    
    public function ScopeReadyProjects($query)
    {
        return $query->where('status',3)->where('is_active',1)->orderBy('sort_number','asc');;
    }

    
}

<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function created_at_difference()
    {
        if ($this->created_at != $this->updated_at) {
            return Carbon::parse($this->updated_at)->diffForHumans();
        }
    }
}

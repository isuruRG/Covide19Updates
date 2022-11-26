<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelpAndGuide extends Model
{
    // use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'HELP_AND_GUIDE_TB';
    protected $with = ['user'];
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

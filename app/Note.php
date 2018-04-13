<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable=['notebook_id','title','body',];
    public function notebook()
            {
           	return $this->belongsTO(Notebook::class);
            }
}

<?php

namespace Modules\Doctors\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Sections\Models\Section;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'appointments',
        'section_id',
        'status'
    ];

    //? Get Doctor's image
    public function image()
    {
        return $this->morphOne(\App\Models\Image::class, 'imageable');
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}

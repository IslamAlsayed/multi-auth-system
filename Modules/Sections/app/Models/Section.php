<?php

namespace Modules\Sections\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Doctors\Models\Doctor;

class Section extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }
}

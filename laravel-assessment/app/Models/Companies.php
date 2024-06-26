<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    use HasFactory;

    protected $table = 'companies';
    protected $primaryKey = 'id';

    protected $fillable = [
        'company_name',
        'company_email',
        'company_logo',
        'company_website',
    ];
}

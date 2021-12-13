<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Student extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;
    use Sortable;

    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'major',
        'email',
        'phone_number'
    ];
    /**
     * The attributes that are sortable.
     * 
     * @var array
     */
    public $sortable= [
        'id',
        'name',
        'major'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the tasks for the employee.
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}

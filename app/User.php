<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='User';
    protected $primaryKey='Id';
    public $timestamps = false;
    public $remember_token=false;
    protected $fillable = [
       
         'FirstName', 'LastName', 'GenderId', 'UserName', 'Password', 
        'ValidationToken', 'IsValidated', 'CreatedAt', 'UpdatedAt', 'IsDeleted', 'DeletedAt'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    
}

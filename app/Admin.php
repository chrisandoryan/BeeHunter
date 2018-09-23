<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use \Illuminate\Support\Facades\Config;

class Admin extends Authenticatable
{
    protected $table, $primaryKey;
    protected $guard = 'admin';

    function __construct(array $attributes = array()) {
        parent::__construct($attributes);
        $this->table = Config::get('constants.tables.admin.name');
        $this->primaryKey = Config::get('constants.tables.admin.primary_key');
    }

    public $timestamps = false;
    protected $fillable = [
        'email', 'password',
    ];
}

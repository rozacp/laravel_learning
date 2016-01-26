<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserApi extends Model
{
    protected $table = 'users_api';

    protected $hidden = ['api_token'];

}

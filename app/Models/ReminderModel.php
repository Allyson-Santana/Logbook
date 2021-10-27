<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReminderModel extends Model
{
    protected $table = "tb_reminder";
    protected $fillable = ['ds_reminder', 'cd_user'];
    protected $primaryKey = "cd_reminder";
  
    public function reminder(){
        return $this->belongsTo(UserModel::class, 'cd_user', 'cd_user');
    }
}

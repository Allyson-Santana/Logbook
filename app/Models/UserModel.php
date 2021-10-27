<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'tb_user';
    protected $primaryKey = 'cd_user';
    protected $fillable = ['nm_user','nm_email','nm_contact_email','nm_password'];

    public function projects(){
        return $this->belongsToMany(ProjetctModel::class, 'tb_user_project', 'cd_user', 'cd_project')->withTimestamps();
    }

    public function reminders(){
        return $this->hasMany(ReminderModel::class, 'cd_user', 'cd_user');
    }

}

/*
    // Um para UM
    return $this->hasOne('Nome da Model que vai se relacionar', 'foreign-key', 'chave local que faz a referença') ;
    return $this->belongsTo('Nome da Model que vai se relacionar', 'foreign-key', 'chave local que faz a referença');
    //UM para Muito
    return $this->hasMany('Nome da Model que vai se relacionar', 'foreing key', 'chave local que faz a referença');
    return $this->belongsTo('Nome da Model que vai se relacionar',, 'chave local que faz a referença');
    // Muito para Muito
    return $this->belongsToMany('Nome da Model que vai se relacionar', 'name table pivot', 'foreing key pivot', 'foreing key')->withTimestamps();
    return $this->belongsToMany('Nome da Model que vai se relacionar', 'name table pivot', 'foreing key pivot', 'foreing key')->withTimestamps();

*/
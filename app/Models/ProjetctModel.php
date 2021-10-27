<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjetctModel extends Model
{
    protected $table = 'tb_project';
    protected $primaryKey = 'cd_project';
    protected $fillable = ['nm_project','ds_project', 'nm_email_recipient'];

    public function diarys(){
        return $this->hasMany(DiaryModel::class, 'cd_project', 'cd_project');
    }

    public function users(){
        return $this->belongsToMany(UserModel::class, 'tb_user_project', 'cd_project', 'cd_user')->withTimestamps();
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
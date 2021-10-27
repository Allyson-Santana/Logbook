<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiaryModel extends Model
{
    protected $table = 'tb_diary';
    protected $primaryKey = 'cd_diary';
    protected $fillable = [
        'dt_diary', 
        'ds_references',
        'ds_activity_preview', 
        'ds_difficulty_development', 
        'ds_guidelines_teacher_during', 
        'ds_guidelines_teacher_be',
        'cd_project'        
    ];

    public function project(){
        return $this->belongsTo(ProjetctModel::class, 'cd_project', 'cd_project');
    } 
}

/*
    // Um para UM
    return $this->hasOne('Nome da Model que vai se relacionar', 'foreign-key', 'chave local que faz a referença') ;
    return $this->belongsTo('Nome da Model que vai se relacionar', 'foreign-key', 'chave local que faz a referença');
    //UM para Muito
    return $this->hasMany('Nome da Model que vai se relacionar', 'foreing key', 'chave local que faz a referença');
    return $this->belongsTo('Nome da Model que vai se relacionar', 'foreign-key', 'chave local que faz a referença');
    // Muito para Muito
    return $this->belongsToMany('Nome da Model que vai se relacionar', 'name table pivot', 'foreing key pivot', 'foreing key')->withTimestamps();
    return $this->belongsToMany('Nome da Model que vai se relacionar', 'name table pivot', 'foreing key pivot', 'foreing key')->withTimestamps();

*/
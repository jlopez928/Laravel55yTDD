<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    //En caso de no usar la convencion, colocar el nombre de la tabla
    //protected $table = 'nombre_tabla';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'is_admin' => 'boolean'
    ];

    public static function findByEmail($email){
        //return static::where(compact('email'))->first();
        return User::where(compact('email'))->first();
    }

    public function isAdmin(){
        //return $this->email === 'jesuslopez@gmail.com';
        //se modifico el seeder User
        return $this->is_admin;
    }

    //Relacion con el modelo Profession hasOne
    public function profession() {
        //Para buscar profession_id como clave foranea en el modelo User
        return $this->belongsTo(Profession::class);
        //En caso de tener otro nombre se pasa como segundo argumento
        //return $this->belongsTo(Profession::class,'id_profesion');
    }

}

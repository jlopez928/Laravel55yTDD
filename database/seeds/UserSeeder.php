<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Profession;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //**************Consultas SQL Directamente       
        //$professions = DB::select('select id from professions where title = "Desarrollador back-end"');
        //$professions = DB::select('select id from professions where title = ?',['Desarrollador back-end']);
        //$professions = DB::select('select id from professions where title = ? limit 0,1',['Desarrollador back-end']);

        //dd($professions);
        
        //*************Constructor de Consultas SQL de Laravel
        //$professions = DB::table('professions')->select('id')->take(1)->get();
        //$profession = DB::table('professions')->select('id')->first();
        //$profession = DB::table('professions')->select('id')->where('title','=','Desarrollador back-end')->first();
        //$profession = DB::table('professions')->select('id','title')->where('title','=','Desarrollador back-end')->first();
        //$profession = DB::table('professions')->where('title','=','Desarrollador back-end')->first();
        //$profession = DB::table('professions')->where('title','Desarrollador back-end')->first();
        //$profession = DB::table('professions')->where(['title' => 'Desarrollador back-end'])->first();
        
        /*$professionId = DB::table('professions')
            //->where(['title' => 'Desarrollador back-end'])
            ->where('title','Desarrollador back-end')
            ->value('id');*/

        //dd($professions->first()->id);
        //dd($professionId);

        //
        /*DB::table('users')->insert([
            'name' => 'Jesus Lopez',
            'email' => 'jesuslopez@gmail.com',
            'password' => bcrypt('laravel'),
            //'profession_id' => $professions[0]->id,
            //'profession_id' => $profession->id,
            'profession_id' => $professionId
        ]);*/

        //***************Con Modelo Eloquent de Laravel
        $professionId = Profession::where(['title' => 'Desarrollador back-end'])->value('id');

        User::create([
            'name' => 'Jesus Lopez',
            'email' => 'jesuslopez@gmail.com',
            'password' => bcrypt('laravel'),
            'profession_id' => $professionId,
            'is_admin' => true
        ]);
        
        User::create([
            'name' => 'Jesus Lopez2',
            'email' => 'jesuslopez2@gmail.com',
            'password' => bcrypt('laravel'),
            'profession_id' => $professionId
        ]);
        
        User::create([
            'name' => 'Jesus Lopez3',
            'email' => 'jesuslopez3@gmail.com',
            'password' => bcrypt('laravel'),
            'profession_id' => null
        ]);

        //Creando usuarios con factory
        factory(User::class)->create([
            'profession_id' => $professionId
        ]);
        
        //Creando 10 usuarios aleatorios
        factory(User::class, 10)->create();
    }
}

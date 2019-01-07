<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //**************Consultas SQL Manual        
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
        
        $professionId = DB::table('professions')
            //->where(['title' => 'Desarrollador back-end'])
            ->where('title','Desarrollador back-end')
            ->value('id');

        //dd($professions->first()->id);
        dd($professionId);

        //
        DB::table('users')->insert([
            'name' => 'Jesus Lopez',
            'email' => 'jesuslopez@gmail.com',
            'password' => bcrypt('laravel'),
            //'profession_id' => $professions[0]->id,
            //'profession_id' => $profession->id,
            'profession_id' => $professionId,
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Profession;

class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //**************Consultas SQL Directamente       
        //DB::insert('insert into professions (title) values ("Desarrollador back-end")');
        //DB::insert('insert into professions (title) values (?)',['Desarrollador back-end']);
        /*DB::insert('insert into professions (title) values (:title)',[
            'title' => 'Desarrollador back-end'
        ]);*/
        
        //***************Constructor de Consultas SQL de Laravel
        /*DB::table('professions')->insert([
            'title' => 'Desarrollador back-end',
        ]);

        DB::table('professions')->insert([
            'title' => 'Desarrollador front-end',
        ]);
        
        DB::table('professions')->insert([
            'title' => 'Diseñador Web',
        ]);*/

        //***************Con Modelo Eloquent de Laravel
       Profession::create(['title' => 'Desarrollador back-end']);
       Profession::create(['title' => 'Desarrollador front-end']);
       Profession::create(['title' => 'Diseñador Web']);

       //Creando 17 usuarios aleatorios
       //factory(Profession::class)->times(17)->create();
       factory(Profession::class, 17)->create();
        
    }
}

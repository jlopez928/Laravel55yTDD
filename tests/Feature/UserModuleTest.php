<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use App\User;

class UserModuleTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    function it_shows_the_users_list()
    {
        //Agregando usuario para que la prueba pase
        factory(User::class)->create([
            'name' => 'Joel'
        ]);
        
        factory(User::class)->create([
            'name' => 'Ellie'
        ]);

        $this->get('/usuarios')
        ->assertStatus(200)
        ->assertSee('Listado de Usuarios')
        ->assertSee('Joel')
        ->assertSee('Ellie');
    }
    
    /** @test */
    function it_shows_a_default_message_if_the_users_list_is_empty()
    {
        //DB::table('users')->truncate();

        $this->get('/usuarios')
        ->assertStatus(200)
        ->assertSee('No hay usuarios registrados');
    }

    /** @test */
    /*function it_loads_the_users_details_page()
    {
        
        $this->get('/usuarios/5')
        ->assertStatus(200)
        ->assertSee('Mostrando detalle del usuario: 5');

    }
    
    /** @test */
    function it_displays_the_users_details()
    {
        $user = factory(User::class)->create([
            'name' => 'Duilio Palacios'
        ]);
        
        $this->get('/usuarios/'.$user->id) // usuario/id_usuario
        ->assertStatus(200)
        ->assertSee('Duilio Palacios');
    }
    
    /** @test */
    function it_loads_the_new_users_page()
    {
        $this->get('/usuarios/nuevo')
        ->assertStatus(200)
        ->assertSee('Crear usuario nuevo');
    }

}

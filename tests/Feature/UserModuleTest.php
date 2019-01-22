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

    /** @test */
    function it_displays_a_404_error_if_the_user_is_not_found()
    {
        $this->get('/usuarios/1000')
        ->assertStatus(404)
        ->assertSee('Página no encontrada');
    }

        /** @test */
        function it_creates_a_new_user()
        {
            
            $this->withoutExceptionHandling();
            
            $this->post('/usuarios/', [
                'name' => 'Jesus Lopez',
                'email' => 'jesuslopez@gmail.com',
                'password' => '123456'
            //])->assertRedirect('usuarios');
            ])->assertRedirect(route('users'));
            //->assertSee('Procesando informacion...');

            //Para hacer pruebas directamente en la BD
            /*$this->assertDatabaseHas('users', [
                'name' => 'Jesus Lopez',
                'email' => 'jesuslopez@gmail.com'
            ]);*/

            //Para hacer pruebas directamente a la BD incluyendo el password
            $this->assertCredentials([
                'name' => 'Jesus Lopez',
                'email' => 'jesuslopez@gmail.com',
                'password' => '123456'
            ]);
        }

        /** @test */
        function the_name_is_required() {

            //$this->withoutExceptionHandling();

            $this->from('usuarios/nuevo')->post('/usuarios/', [
                'name' => '',
                'email' => 'jesuslopez@gmail.com',
                'password' => '123456'
            ])
            ->assertRedirect(route('users.create'))
            ->assertSessionHasErrors(['name' => 'El campo nombre es obligatorio']);

            /*$this->assertDatabaseMissing('users', [
                'email' => 'jesuslopez@gmail.com'
            ]);*/

            $this->assertEquals(0, User::count());
            
        }

}

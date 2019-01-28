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
        ->assertSee('Crear Usuario');
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
        
        /** @test */
        function the_email_is_required() {

            //$this->withoutExceptionHandling();

            $this->from('usuarios/nuevo')->post('/usuarios/', [
                'name' => 'Duilio',
                'email' => '',
                'password' => '123456'
            ])
            ->assertRedirect(route('users.create'))
            ->assertSessionHasErrors(['email']);

            /*$this->assertDatabaseMissing('users', [
                'email' => 'jesuslopez@gmail.com'
            ]);*/

            $this->assertEquals(0, User::count());
            
        }
        
        /** @test */
        function the_email_must_be_valid() {

            //$this->withoutExceptionHandling();

            $this->from('usuarios/nuevo')->post('/usuarios/', [
                'name' => 'Duilio',
                'email' => 'correo-no-valido',
                'password' => '123456'
            ])
            ->assertRedirect(route('users.create'))
            ->assertSessionHasErrors(['email']);

            /*$this->assertDatabaseMissing('users', [
                'email' => 'jesuslopez@gmail.com'
            ]);*/

            $this->assertEquals(0, User::count());
            
        }
        
        /** @test */
        function the_email_must_be_unique() {

            //$this->withoutExceptionHandling();

            factory(User::class)->create([
                'email' => 'duilio@gmail.com'
            ]);

            $this->from('usuarios/nuevo')->post('/usuarios/', [
                'name' => 'Duilio',
                'email' => 'duilio@gmail.com',
                'password' => '123456'
            ])
            ->assertRedirect(route('users.create'))
            ->assertSessionHasErrors(['email']);

            /*$this->assertDatabaseMissing('users', [
                'email' => 'jesuslopez@gmail.com'
            ]);*/

            $this->assertEquals(1, User::count());
            
        }

        /** @test */
        function the_password_is_required() {

            //$this->withoutExceptionHandling();

            $this->from('usuarios/nuevo')->post('/usuarios/', [
                'name' => 'Duilio',
                'email' => 'duilio@gmail.com',
                'password' => ''
            ])
            ->assertRedirect(route('users.create'))
            ->assertSessionHasErrors(['password']);

            /*$this->assertDatabaseMissing('users', [
                'email' => 'jesuslopez@gmail.com'
            ]);*/

            $this->assertEquals(0, User::count());
            
        }
        
        /** @test */
        //PRUEBA IMCOMPLETA
        function the_password_is_over_six() {

            self::markTestIncomplete();
            return;

            //$this->withoutExceptionHandling();

            $this->from('usuarios/nuevo')->post('/usuarios/', [
                'name' => 'kkkkk',
                'email' => '555@gmail.com',
                'password' => '123456'
            ])
            ->assertRedirect(route('users.create'))
            ->assertSessionHasErrors(['password']);

            /*$this->assertDatabaseMissing('users', [
                'email' => 'jesuslopez@gmail.com'
            ]);*/

            //$this->assertEquals(0, User::count());
            
        }


        /** @test */
        function it_loads_the_edit_user_page()
        {

            //$this->withoutExceptionHandling();

            $user = factory(User::class)->create();

            // usuarios/editar?id=5
            //$this->get('/usuarios/editar', ['id' => $user-id])
            $this->get("/usuarios/{$user->id}/editar")
            ->assertStatus(200)
            ->assertViewIs('users.edit')
            ->assertSee('Editar Usuario')
            //->assertViewHas('user',$user);
            //Comparacion de los objetos
            ->assertViewHas('user', function($viewUser) use ($user){
                return $viewUser->id === $user->id;
            });
        }

        /** @test */
        function it_updates_a_user()
        {
            
            //$this->withoutExceptionHandling();

            $user = factory(User::class)->create();
            
            $this->put("/usuarios/{$user->id}", [
                'name' => 'Jesus Lopez',
                'email' => 'jesuslopez@gmail.com',
                'password' => '123456'
            //])->assertRedirect('usuarios');
            ])->assertRedirect("/usuarios/{$user->id}");
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
        function the_name_is_required_when_updating_the_user() {

            //$this->withoutExceptionHandling();

            $user = factory(User::class)->create();

            $this->from("usuarios/{$user->id}/editar")->put("usuarios/{$user->id}", [
                'name' => '',
                'email' => 'jesuslopez@gmail.com',
                'password' => '123456'
            ])
            ->assertRedirect("usuarios/{$user->id}/editar")
            ->assertSessionHasErrors(['name']);

            $this->assertDatabaseMissing('users', [
                'email' => 'jesuslopez@gmail.com'
            ]);

        }


        /** @test */
        function the_email_must_be_valid_when_updating_the_user() {

            //$this->withoutExceptionHandling();

            $user = factory(User::class)->create();

            $this->from("usuarios/{$user->id}/editar")->put("usuarios/{$user->id}", [
                'name' => 'Jesus Lopez',
                'email' => 'correo-no-valido',
                'password' => '123456'
            ])
            ->assertRedirect("usuarios/{$user->id}/editar")
            ->assertSessionHasErrors(['email']);

            $this->assertDatabaseMissing('users', [
                'name' => 'Jesus Lopez'
            ]);
                
        }
            
        /** @test */
        //PRUEBA IMCOMPLETA
        function the_email_must_be_unique_when_updating_the_user() {
 
            self::markTestIncomplete();
            return;
            
            //$this->withoutExceptionHandling();
            
            $user = factory(User::class)->create([
                    'email' => 'duilio@gmail.com'
                ]);

            $this->from("usuarios/{$user->id}/editar")
                ->put("usuarios/{$user->id}", [
                'name' => 'Duilio',
                'email' => 'duilio@gmail.com',
                'password' => '123456'
            ])
            ->assertRedirect(route('users.create'))
            ->assertSessionHasErrors(['email']);

            /*$this->assertDatabaseMissing('users', [
                'email' => 'jesuslopez@gmail.com'
            ]);*/

            $this->assertEquals(1, User::count());
                
        }
    
        /** @test */
        function the_password_is_required_when_updating_the_user() {
    
            //$this->withoutExceptionHandling();
            
            $user = factory(User::class)->create();

            $this->from("usuarios/{$user->id}/editar")
                ->put("usuarios/{$user->id}", [
                    'name' => 'Duilio',
                    'email' => 'duilio@gmail.com',
                    'password' => ''
                ])
                ->assertRedirect("usuarios/{$user->id}/editar")
                ->assertSessionHasErrors(['password']);
    
                $this->assertDatabaseMissing('users', [
                    'email' => 'duilio@gmail.com'
                ]);
    
        }


}

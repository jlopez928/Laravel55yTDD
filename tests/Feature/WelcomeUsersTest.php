<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WelcomeUsersTest extends TestCase
{

    /** @test */
    function it_welcomes_users_with_nickname()
    {
            $this->get('/saludo/Jesus/Moncho')
            ->assertStatus(200)
            ->assertSee('Bienvenido Jesus, tu apodo es Moncho');
    }

    /** @test */
    function it_welcomes_users_without_nickname()
    {
        $this->get('/saludo/Jesus')
        ->assertStatus(200)
        ->assertSee('Bienvenido Jesus');
    }
}

<?php

namespace Tests\Unit;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;


class UserStoreTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testUserAdd()
    {
        $user = User::factory()->create();
        $dbUser = User::first();

        $this->assertNotNull($dbUser);
        $this->assertTrue($dbUser->id == $user->id);
    }


}

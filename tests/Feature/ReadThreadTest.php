<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use Tests\TestCase;
use App\Models\User;
use App\Models\Thread;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ReadThreadTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp():void
    {
        parent::setUp();
        $this->thread =Thread::factory()->create();
    }
    /**
     * A basic test example.
     */
    public function a_user_can_browse_all_threads(): void
    {
        $this->thread =Thread::factory()->create();
        $response = $this->get('/threads');

        //$response->assertStatus(200);
        $response->assertsee($this->thread->title);

   }

   public function a_user_can_browse_single_threads(): void
   {
    $this->thread =Thread::factory()->create();
       $response = $this->get('/threads//'.$this->thread->id);

       //$response->assertStatus(200);
       $response->assertsee($this->thread->title);

  }

  public function a_user_can_read_areply(){

  }
}
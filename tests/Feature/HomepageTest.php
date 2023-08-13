<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Employee;

class HomepageTest extends TestCase
{
    use RefreshDatabase;

    public function testHomepageDisplaysStatistics()
    {
        // Insert sample data into the database (using factories or seeders)

        // Simulate a request to the homepage
        $response = $this->get('/');

        // Assert that the response status is 200 (OK)
        $response->assertStatus(200);

        // Assert that the view is being used
        $response->assertViewIs('home');

        // Assert that the response contains specific content
        $response->assertSee('Departments');
        $response->assertSee('No Department Employees');
    }

}

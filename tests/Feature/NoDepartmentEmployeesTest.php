<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NoDepartmentEmployeesTest extends TestCase
{
    use RefreshDatabase;

    public function testNoDepartmentEmployeesTable()
    {
        // Insert sample data into the database (including employees with no department)

        // Simulate a request to the "No Department Employees" route
        $response = $this->get('/employee/no-department');

        // Assert that the response status is 200 (OK)
        $response->assertStatus(200);

        // Assert that the view is being used
        $response->assertViewIs('employee.no_department');

        // Assert that the response contains specific content
        $response->assertSee('No Department Employees');
        $response->assertSee('Employee Name');
        $response->assertSee('Employee Position');
        $response->assertSee('Employee Salary');
        $response->assertSee('Employment Date');
    }

}

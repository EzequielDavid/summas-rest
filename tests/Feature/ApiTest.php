<?php

namespace Tests\Feature;

use App\Models\Designer;
use App\Models\Developer;
use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApiTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetEmployees()
    {
        $response = $this->getJson('/api/employees');

        $response->assertStatus(200);
    }
    public function testGetEmployeesWithParam()
    {
        $response = $this->getJson('/api/employees?orderParam=name');

        $response->assertStatus(200);
    }
    public function testInsertEmployeeDeveloper()
    {
        $response = $this->postJson('/api/developer',[
            'company_id'=>1,
            'name'=>'ryften',
            'surname'=>'lopez',
            'age'=>'24',
            'language'=>'php',
        ]);

        $response->assertStatus(201)
        ->assertJson(['created'=>true]);
    }
    public function testUpdateEmployeeDeveloper()
    {
        $developer=Developer::first();
        $response = $this->putJson('/api/developer/'.$developer->id,[
            'company_id'=>1,
            'name'=>'sandra',
            'surname'=>'lopez',
            'age'=>'24',
            'id'=>1,
            'position_id'=>1,
            'language'=>'php',
        ]);

        $response->assertStatus(201)
            ->assertJson(['created'=>true]);
    }
    public function testInsertEmployeeDesigner()
    {
        $response = $this->postJson('/api/designer',[
            'company_id'=>1,
            'name'=>'maria',
            'surname'=>'aguirre',
            'age'=>'24',
            'type'=>'web',
        ]);

        $response->assertStatus(201)
            ->assertJson(['created'=>true]);
    }
    public function testUpdateEmployeeDesigner()
    {
        $designer=Designer::first();
        $response = $this->putJson('/api/designer/'.$designer->id,[
            'company_id'=>1,
            'name'=>'sandra',
            'surname'=>'malde',
            'age'=>'24',
            'id'=>1,
            'position_id'=>1,
            'type'=>'graphic',
        ]);
        $response->assertStatus(201)
            ->assertJson(['created'=>true]);
    }
    public function testDeleteEmployeeDesigner()
    {
        $employee=Employee::first();
        $response = $this->deleteJson('/api/employees/'.$employee->id);
        $response->assertStatus(204);
    }
}

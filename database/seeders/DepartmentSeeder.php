<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //CBS

        Department::firstorcreate([
            'name' => 'Administration'
        ])->companies()->attach([1]);
        Department::firstorcreate([
            'name' => 'Finance'
        ])->companies()->attach([1]);
        Department::firstorcreate([
            'name' => 'Human Resource'
        ])->companies()->attach([1]);
        Department::firstorcreate([
            'name' => 'Legal'
        ])->companies()->attach([1]);
        Department::firstorcreate([
            'name' => 'Risk'
        ])->companies()->attach([1]);
        Department::firstorcreate([
            'name' => 'Strategy'
        ])->companies()->attach([1]);
        Department::firstorcreate([
            'name' => 'Tax'
        ])->companies()->attach([1]);

        //CICL
        Department::firstorcreate([
            'name' => 'Centum Investment'
        ])->companies()->attach([3]);
        Department::firstorcreate([
            'name' => 'Internal Audit'
        ])->companies()->attach([3]);

        //Nabo Capital
        Department::firstorcreate([
            'name' => 'Investment'
        ])->companies()->attach([6]);
        Department::firstorcreate([
            'name' => 'Operations'
        ])->companies()->attach([6]);
        Department::firstorcreate([
            'name' => 'Marketing'
        ])->companies()->attach([6]);
        Department::firstorcreate([
            'name' => 'Private Wealth'
        ])->companies()->attach([6]);


        //Centum RE
        Department::firstorcreate([
            'name' => 'Commercial'
        ])->companies()->attach([4]);
        Department::firstorcreate([
            'name' => 'Development Management'
        ])->companies()->attach([4]);
        Department::firstorcreate([
            'name' => 'Executive Office'
        ])->companies()->attach([4]);
        Department::firstorcreate([
            'name' => 'Finance'
        ])->companies()->attach([4]);
        Department::firstorcreate([
            'name' => 'Project Management'
        ])->companies()->attach([4]);
        Department::firstorcreate([
            'name' => 'Real Estate'
        ])->companies()->attach([4]);
        Department::firstorcreate([
            'name' => 'Sales and Marketing'
        ])->companies()->attach([4]);
        Department::firstorcreate([
            'name' => 'Technical/Project Design'
        ])->companies()->attach([4]);
        Department::firstorcreate([
            'name' => 'Urban Management'
        ])->companies()->attach([4]);
        Department::firstorcreate([
            'name' => 'Utilities/Project Management'
        ])->companies()->attach([4]);

        //Tier Data Limited
        Department::firstorcreate([
            'name' => 'Administration'
        ])->companies()->attach([8]);
        Department::firstorcreate([
            'name' => 'Business Development'
        ])->companies()->attach([8]);
        Department::firstorcreate([
            'name' => 'Infrastructure'
        ])->companies()->attach([8]);
        Department::firstorcreate([
            'name' => 'Innovations'
        ])->companies()->attach([8]);
        Department::firstorcreate([
            'name' => 'Service Delivery'
        ])->companies()->attach([8]);


        //N/A
        Department::firstorcreate([
            'name' => 'N/A'
        ])->companies()->attach([2, 5, 7, 9, 10, 11, 12]);
    }
}

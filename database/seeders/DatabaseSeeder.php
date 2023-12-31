<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::create([
        //     'user_id'    => 'SRSFS425',
        //     'name'      => 'Admin',
        //     'email'     => 'dev@example.com',
        //     'password'  => bcrypt('devkh123'),
        //     'salutation'  => 'Mr',
        //     'gender'      => 'L',
        //     'institution' => 'UNILA',
        //     'country'       => 'Indonesia',
        //     'no_tlp'  => '085741492045',
        //     'type_user'  => 'reviewer',
        //     'level'  => 'reviewer',
        // ]);

        $categories = [
            ['name'  => 'Genetic, degenerative and metabolic disease'],
            ['name'  => 'Pharmacy and Nursing'],
            ['name'  => 'Health Technology '],
            ['name'  => 'Immunology'],
            ['name'  => 'Nutrition and Public Health'],
            ['name'  => 'Biochemistry and Biomolecules'],
            ['name'  => 'Women and Child Health'],
            ['name'  => 'Communicable Disease'],
            ['name'  => 'Environment and Health'],
        ];

        foreach ($categories as $ct) {
            \App\Models\Category::create($ct);
        }
    }
}

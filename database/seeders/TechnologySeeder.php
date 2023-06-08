<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = ['PHP', 'HTLM', 'CSS', 'Bootstrap', 'JavaScript', 'Vue.js', 'Laravel', 'MySQL'];

        foreach ($technologies as $technology_value) {
            $new_tech = new Technology();
            $new_tech->name = $technology_value;
            $new_tech->slug = Str::slug($technology_value);
            $new_tech->save();
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\License;
use Illuminate\Database\Seeder;

class LicenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        License::insert([
            "LicenseID" => 10000,
            "LicenseTitle" => "User License",
        ]);

        License::insert([
            "LicenseID" => 20000,
            "LicenseTitle" => "Admin License",
        ]);
    }
}
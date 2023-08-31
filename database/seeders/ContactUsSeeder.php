<?php

namespace Database\Seeders;

use App\Models\ContactUs;
use Illuminate\Database\Seeder;

class ContactUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $is_exist = ContactUs::get();
        if (count($is_exist) < 15) {
            $count = 15 - count($is_exist);
            ContactUs::factory()->times($count)->create();
        }
    }
}

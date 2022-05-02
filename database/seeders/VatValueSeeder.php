<?php

namespace Database\Seeders;

use App\Models\VatValue;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VaTValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VatValue::create([
            'vat_value' => 19,
        ]);
    }
}

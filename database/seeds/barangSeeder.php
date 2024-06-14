<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class barangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i=0;$i<100;$i++)
        {
            $filePath = $imageStoragePath . '/' . $imageName;
            DB::table('barang')->insert([
                'namabrg' => $faker->sentence(1),
                'harga' => $faker->randomNumber(5),
                'bahan' => $faker->word(),
                'jumlahbrg' => $faker->randomNumber(2),
                'merekBrg' => $faker->word(),
                'foto' => $filePath,
            ]);
        }
    }
}
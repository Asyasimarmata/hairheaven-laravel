<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $kategori = ['Rambut Kering', 'Rambut Rusak', 'Rambut Berminyak', 'Rambut Rontok', 'Rambut Ketombean'];
        for($i=1;$i<100;$i++)
        {
            DB::table('produk')->insert([
            'nama' => $faker->words(3, true), 
            'deskripsi' => $faker->paragraph, 
            'harga' => $faker->numberBetween(10000, 100000), 
            'kategori' => $faker->randomElement($kategori), 
            'gambar' => $faker->imageUrl(640, 480, 'products', true), 
            'tersedia' => $faker->boolean 
            ]);
        }
    }
}

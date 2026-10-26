<?php

namespace Database\Seeders;

use App\Models\Mobil;
use Illuminate\Database\Seeder;

class MobilSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nama' => 'Avanza 1.5 G CVT', 'brand' => 'Toyota', 'harga' => 275000000, 'tahun' => 2024, 'transmisi' => 'CVT', 'bahan_bakar' => 'Bensin', 'status' => 'tersedia', 'foto' => 'https://images.unsplash.com/photo-1549399542-7e3f8b79c341'],
            ['nama' => 'Civic RS Turbo', 'brand' => 'Honda', 'harga' => 615000000, 'tahun' => 2023, 'transmisi' => 'CVT', 'bahan_bakar' => 'Bensin', 'status' => 'tersedia', 'foto' => null],
            ['nama' => 'Xpander Ultimate', 'brand' => 'Mitsubishi', 'harga' => 330000000, 'tahun' => 2024, 'transmisi' => 'Matic', 'bahan_bakar' => 'Bensin', 'status' => 'tersedia', 'foto' => null],
            ['nama' => 'Fortuner VRZ', 'brand' => 'Toyota', 'harga' => 560000000, 'tahun' => 2022, 'transmisi' => 'Matic', 'bahan_bakar' => 'Diesel', 'status' => 'sold', 'foto' => null],
            ['nama' => 'Ioniq 5', 'brand' => 'Hyundai', 'harga' => 750000000, 'tahun' => 2024, 'transmisi' => 'Matic', 'bahan_bakar' => 'Listrik', 'status' => 'tersedia', 'foto' => null],
            ['nama' => 'Brio RS', 'brand' => 'Honda', 'harga' => 225000000, 'tahun' => 2023, 'transmisi' => 'Manual', 'bahan_bakar' => 'Bensin', 'status' => 'tersedia', 'foto' => null],
            ['nama' => 'Corolla Cross Hybrid', 'brand' => 'Toyota', 'harga' => 490000000, 'tahun' => 2024, 'transmisi' => 'CVT', 'bahan_bakar' => 'Hybrid', 'status' => 'tersedia', 'foto' => null],
            ['nama' => 'Pajero Sport Dakar', 'brand' => 'Mitsubishi', 'harga' => 620000000, 'tahun' => 2023, 'transmisi' => 'Matic', 'bahan_bakar' => 'Diesel', 'status' => 'sold', 'foto' => null],
        ];

        foreach ($data as $item) {
            Mobil::create($item);
        }
    }
}
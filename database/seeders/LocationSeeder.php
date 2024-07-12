<?php

namespace Database\Seeders;

use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $provincesPath = storage_path('app/data/provinces.json');
        $regenciesPath = storage_path('app/data/regencies.json');
        $districtsPath = storage_path('app/data/districts.json');
        $villagesPath = storage_path('app/data/villages.json');

        $provinces = json_decode(file_get_contents($provincesPath), true);
        $regencies = json_decode(file_get_contents($regenciesPath), true);
        $districts = json_decode(file_get_contents($districtsPath), true);
        $villages = json_decode(file_get_contents($villagesPath), true);

        echo "Memulai proses seeder data Provinsi...\n";
        foreach ($provinces as  $index => $province) {
            if ($index === 8 || $index === 9) {
                $newProvince = Province::create([
                    'name' => $province['name'],
                    'code' => $province['code']
                ]);

                echo "Memulai proses seeder data Kabupaten...\n";
                foreach ($regencies as $regency) {
                    if ($province['id'] == $regency['provinsi_id']) {
                        $newRegency = Regency::create([
                            'type' => $regency['type'],
                            'name' => $regency['name'],
                            'code' => $regency['code'],
                            'full_code' => $regency['full_code'],
                            'province_id' => $newProvince->id,
                        ]);

                        $chunk_districts = array_chunk($districts, 1000);
                        foreach ($chunk_districts as $key_district => $chunk_district) {
                            echo "Memulai proses seeder data Kecamatan... ke " . $key_district + 1 . "000\n";
                            foreach ($chunk_district as $district) {
                                if ($regency['id'] == $district['kabupaten_id']) {
                                    $newDistrict = District::create([
                                        'name' => $district['name'],
                                        'code' => $district['code'],
                                        'full_code' => $district['full_code'],
                                        'regency_id' => $newRegency->id,
                                    ]);

                                    $chunk_villages = array_chunk($villages, 1000);
                                    foreach ($chunk_villages as $key_village => $chunk_village) {
                                        echo "Memulai proses seeder data Kelurahan... ke " . $key_village + 1 . "000\n";
                                        foreach ($chunk_village as $village) {
                                            if ($district['id'] == $village['kecamatan_id']) {
                                                Village::create([
                                                    'name' => $village['name'],
                                                    'code' => $village['code'],
                                                    'full_code' => $village['full_code'],
                                                    'pos_code' => $village['pos_code'],
                                                    'district_id' => $newDistrict->id,
                                                ]);
                                            }
                                        }
                                        echo "Done seeder data Kelurahan... ke " . $key_village + 1 . "000\n";
                                    }
                                }
                            }
                            echo "Done seeder data Kecamatan... ke " . $key_district + 1 . "000\n";
                        }
                    }
                }
                echo "Done seeder data Kabupaten...\n";
            }
        }
        echo "Done seeder data Provinsi...\n";
    }
}

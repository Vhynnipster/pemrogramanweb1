<?php
require __DIR__ . '/../vendor/autoload.php';
use Faker\Factory;

$faker = Factory::create('id_ID'); // Bahasa Indonesia

// Data pribadi
echo $faker->name; // Budi Santoso
echo $faker->email; // budi.santoso@gmail.com
echo $faker->phoneNumber; // +62 812 3456 7890
echo $faker->address; // Jl. Merdeka No. 17, Jakarta

// Data perusahaan
echo $faker->company; // PT Maju Mundur
echo $faker->jobTitle; // Software Engineer

// Data acak
echo $faker->numberBetween(1, 100); // 42
echo $faker->randomElement(['merah', 'biru', 'hijau']); // biru
echo $faker->sentence(5); // Lima kata kalimat acak.

// Generate banyak data
for ($i = 0; $i < 5; $i++) {
    echo $faker->name . " - " . $faker->email . "\n";
}
<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class TherapistSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Therapist data with realistic names and specializations
        $therapists = [
            [
                'name' => 'Dr. Sarah Johnson',
                'email' => 'sarah.johnson@spa.com',
                'phone' => '+1-555-0123',
                'bio' => 'Specialized in deep tissue massage and sports therapy with over 8 years of experience. Certified in various massage techniques including Swedish, deep tissue, and hot stone therapy.',
                'image' => 'therapists/sarah-johnson.jpg',
                'availability' => json_encode([
                    'monday' => ['09:00' => '17:00'],
                    'tuesday' => ['09:00' => '17:00'],
                    'wednesday' => ['09:00' => '17:00'],
                    'thursday' => ['09:00' => '17:00'],
                    'friday' => ['09:00' => '15:00'],
                    'saturday' => ['10:00' => '14:00'],
                    'sunday' => []
                ]),
                'is_active' => true,
            ],
            [
                'name' => 'Michael Chen',
                'email' => 'michael.chen@spa.com',
                'phone' => '+1-555-0124',
                'bio' => 'Expert in aromatherapy and relaxation massage. Trained in Eastern massage techniques and specializes in stress relief and holistic wellness treatments.',
                'image' => 'therapists/michael-chen.jpg',
                'availability' => json_encode([
                    'monday' => ['12:00' => '20:00'],
                    'tuesday' => ['12:00' => '20:00'],
                    'wednesday' => ['12:00' => '20:00'],
                    'thursday' => ['12:00' => '20:00'],
                    'friday' => ['12:00' => '20:00'],
                    'saturday' => ['09:00' => '17:00'],
                    'sunday' => []
                ]),
                'is_active' => true,
            ],
            [
                'name' => 'Emily Rodriguez',
                'email' => 'emily.rodriguez@spa.com',
                'phone' => '+1-555-0125',
                'bio' => 'Specializes in prenatal massage and reflexology. Has extensive experience working with clients who have specific health conditions and require gentle, therapeutic approaches.',
                'image' => 'therapists/emily-rodriguez.jpg',
                'availability' => json_encode([
                    'monday' => ['08:00' => '16:00'],
                    'tuesday' => ['08:00' => '16:00'],
                    'wednesday' => [],
                    'thursday' => ['08:00' => '16:00'],
                    'friday' => ['08:00' => '16:00'],
                    'saturday' => ['09:00' => '13:00'],
                    'sunday' => ['10:00' => '15:00']
                ]),
                'is_active' => true,
            ],
            [
                'name' => 'James Thompson',
                'email' => 'james.thompson@spa.com',
                'phone' => '+1-555-0126',
                'bio' => 'Certified sports massage therapist with background in physical therapy. Specializes in injury rehabilitation, deep tissue work, and athletic performance enhancement.',
                'image' => 'therapists/james-thompson.jpg',
                'availability' => json_encode([
                    'monday' => ['14:00' => '22:00'],
                    'tuesday' => ['14:00' => '22:00'],
                    'wednesday' => ['14:00' => '22:00'],
                    'thursday' => ['14:00' => '22:00'],
                    'friday' => ['14:00' => '22:00'],
                    'saturday' => ['10:00' => '18:00'],
                    'sunday' => []
                ]),
                'is_active' => true,
            ],
            [
                'name' => 'Lisa Anderson',
                'email' => 'lisa.anderson@spa.com',
                'phone' => '+1-555-0127',
                'bio' => 'Master esthetician and massage therapist with expertise in facial treatments, body wraps, and detoxification therapies. Provides holistic wellness solutions.',
                'image' => 'therapists/lisa-anderson.jpg',
                'availability' => json_encode([
                    'monday' => ['10:00' => '18:00'],
                    'tuesday' => ['10:00' => '18:00'],
                    'wednesday' => ['10:00' => '18:00'],
                    'thursday' => ['10:00' => '18:00'],
                    'friday' => ['10:00' => '18:00'],
                    'saturday' => ['09:00' => '16:00'],
                    'sunday' => ['11:00' => '15:00']
                ]),
                'is_active' => true,
            ],
        ];

        foreach ($therapists as $therapist) {
            DB::table('therapists')->insert([
                'name' => $therapist['name'],
                'email' => $therapist['email'],
                'phone' => $therapist['phone'],
                'bio' => $therapist['bio'],
                'image' => $therapist['image'],
                'availability' => $therapist['availability'],
                'is_active' => $therapist['is_active'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
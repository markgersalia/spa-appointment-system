<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListingSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $spaServices = [
            [
                'title' => 'Swedish Full Body Massage',
                'description' => 'Classic Swedish massage technique using long, flowing strokes to promote relaxation, improve circulation, and relieve muscle tension. Perfect for stress relief and overall wellness.',
                'type' => 'service',
                'duration' => 60,
                'price' => 1200,
                'availability' => json_encode(['always_available' => true]),
            ],
            [
                'title' => 'Deep Tissue Therapeutic Massage',
                'description' => 'Intensive deep tissue massage targeting chronic muscle tension and adhesions. Ideal for athletes and those with persistent muscle pain.',
                'type' => 'service',
                'duration' => 90,
                'price' => 1800,
                'availability' => json_encode(['always_available' => true]),
            ],
            [
                'title' => 'Hot Stone Massage Therapy',
                'description' => 'Smooth, heated basalt stones are incorporated into the massage to relieve muscle stiffness and increase circulation while promoting deep relaxation.',
                'type' => 'service',
                'duration' => 75,
                'price' => 1500,
                'availability' => json_encode(['always_available' => true]),
            ],
            [
                'title' => 'Aromatherapy Relaxation Massage',
                'description' => 'Customized blend of essential oils combined with gentle massage techniques to enhance physical and emotional well-being.',
                'type' => 'service',
                'duration' => 60,
                'price' => 1400,
                'availability' => json_encode(['always_available' => true]),
            ],
            [
                'title' => 'Prenatal & Pregnancy Massage',
                'description' => 'Gentle, safe massage specially designed for expecting mothers to relieve pregnancy discomfort and reduce stress.',
                'type' => 'service',
                'duration' => 60,
                'price' => 1300,
                'availability' => json_encode(['always_available' => true]),
            ],
            [
                'title' => 'Sports Massage Therapy',
                'description' => 'Targeted massage therapy for athletes, focusing on muscle groups used in specific sports to enhance performance and prevent injuries.',
                'type' => 'service',
                'duration' => 60,
                'price' => 1600,
                'availability' => json_encode(['always_available' => true]),
            ],
            [
                'title' => 'Couples Romantic Spa Package',
                'description' => 'Side-by-side massages for couples in a private, romantic atmosphere with aromatherapy and complimentary refreshments.',
                'type' => 'service',
                'duration' => 90,
                'price' => 2800,
                'availability' => json_encode(['always_available' => true]),
            ],
            [
                'title' => 'Detoxifying Body Wrap',
                'description' => 'Full-body treatment using natural clay and seaweed to detoxify, hydrate, and rejuvenate the skin.',
                'type' => 'service',
                'duration' => 45,
                'price' => 1000,
                'availability' => json_encode(['always_available' => true]),
            ],
            [
                'title' => 'Reflexology Foot Treatment',
                'description' => 'Ancient healing practice applying pressure to specific points on the feet to promote health throughout the body.',
                'type' => 'service',
                'duration' => 30,
                'price' => 800,
                'availability' => json_encode(['always_available' => true]),
            ],
            [
                'title' => 'Facial Rejuvenation Treatment',
                'description' => 'Luxury facial treatment including cleansing, exfoliation, massage mask, and moisturizing for glowing skin.',
                'type' => 'service',
                'duration' => 60,
                'price' => 1100,
                'availability' => json_encode(['always_available' => true]),
            ],
            [
                'title' => 'Corporate Wellness Package',
                'description' => 'Specialized package for office workers focusing on neck, shoulder, and back relief from computer-related stress.',
                'type' => 'service',
                'duration' => 45,
                'price' => 900,
                'availability' => json_encode(['from' => '09:00', 'to' => '17:00', 'weekdays_only' => true]),
            ],
            [
                'title' => 'Weekend Spa Retreat',
                'description' => 'Half-day spa experience including massage, facial, healthy lunch, and relaxation time in our tranquil garden.',
                'type' => 'service',
                'duration' => 240,
                'price' => 3500,
                'availability' => json_encode(['always_available' => true]),
            ],
            [
                'title' => 'Private Meditation & Yoga Session',
                'description' => 'Personalized session combining gentle stretching, meditation, and breathing exercises for ultimate mind-body balance.',
                'type' => 'service',
                'duration' => 60,
                'price' => 1000,
                'availability' => json_encode(['always_available' => true]),
            ],
            [
                'title' => 'Deluxe Spa Day Package',
                'description' => 'All-day luxury experience including massage, facial, body treatment, healthy lunch, and access to all spa facilities.',
                'type' => 'service',
                'duration' => 300,
                'price' => 4500,
                'availability' => json_encode(['always_available' => true]),
            ],
        ];

        foreach ($spaServices as $service) {
            $availability = $service['availability'];
            $isAlwaysAvailable = true;
            
            if (is_string($availability)) {
                $decoded = json_decode($availability, true);
                $isAlwaysAvailable = $decoded['always_available'] ?? true;
            } else {
                $isAlwaysAvailable = $availability['always_available'] ?? true;
            }

            DB::table('listings')->insert([
                'images' => json_encode(['spa-' . strtolower(str_replace(' ', '', $service['title'])) . '.jpg']),
                'title' => $service['title'],
                'description' => $service['description'],
                'type' => $service['type'],
                'duration' => $service['duration'],
                'price' => $service['price'],
                'availability' => $service['availability'],
                'is_always_available' => $isAlwaysAvailable,
                'available_from' => Carbon::now()->subDays(1),
                'available_to' => Carbon::now()->addYears(1),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}

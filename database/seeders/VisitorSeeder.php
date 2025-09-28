<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Visitor;

class VisitorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $visitors = [
            // Kelas XI
            [
                'full_name' => 'Ahmad Rizki Pratama',
                'school_name' => 'SMA Negeri 1 Jakarta',
                'class_level' => 'XI'
            ],
            [
                'full_name' => 'Siti Nurhaliza',
                'school_name' => 'SMA Negeri 2 Bandung',
                'class_level' => 'XI'
            ],
            [
                'full_name' => 'Budi Santoso',
                'school_name' => 'SMA Negeri 3 Surabaya',
                'class_level' => 'XI'
            ],
            [
                'full_name' => 'Dewi Sartika',
                'school_name' => 'SMA Labschool Jakarta',
                'class_level' => 'XI'
            ],
            [
                'full_name' => 'Reza Firmansyah',
                'school_name' => 'SMA Negeri 1 Yogyakarta',
                'class_level' => 'XI'
            ],

            // Kelas XII
            [
                'full_name' => 'Andi Setiawan',
                'school_name' => 'SMA Negeri 1 Makassar',
                'class_level' => 'XII'
            ],
            [
                'full_name' => 'Maya Putri Indira',
                'school_name' => 'SMA Negeri 5 Jakarta',
                'class_level' => 'XII'
            ],
            [
                'full_name' => 'Fajar Nugroho',
                'school_name' => 'SMA Negeri 1 Semarang',
                'class_level' => 'XII'
            ],
            [
                'full_name' => 'Lina Marlina',
                'school_name' => 'SMA Negeri 2 Medan',
                'class_level' => 'XII'
            ],
            [
                'full_name' => 'Dimas Pratama Putra',
                'school_name' => 'SMA Negeri 1 Denpasar',
                'class_level' => 'XII'
            ],
            [
                'full_name' => 'Rika Amelia',
                'school_name' => 'SMA Negeri 8 Jakarta',
                'class_level' => 'XII'
            ],
            [
                'full_name' => 'Bayu Aji Pamungkas',
                'school_name' => 'SMA Negeri 1 Malang',
                'class_level' => 'XII'
            ],

            // Alumni
            [
                'full_name' => 'Sarah Nafisa',
                'school_name' => 'SMA Negeri 1 Bogor',
                'class_level' => 'Alumni'
            ],
            [
                'full_name' => 'Arief Rahman',
                'school_name' => 'SMA Negeri 3 Bandung',
                'class_level' => 'Alumni'
            ],
            [
                'full_name' => 'Indah Permatasari',
                'school_name' => 'SMA Negeri 1 Tangerang',
                'class_level' => 'Alumni'
            ],
            [
                'full_name' => 'Hendra Gunawan',
                'school_name' => 'SMA Negeri 2 Bekasi',
                'class_level' => 'Alumni'
            ],
            [
                'full_name' => 'Nurul Aini Fadilah',
                'school_name' => 'SMA Negeri 1 Depok',
                'class_level' => 'Alumni'
            ],

            // Masyarakat Umum
            [
                'full_name' => 'Bambang Sutrisno',
                'school_name' => 'Universitas Indonesia',
                'class_level' => 'Umum'
            ],
            [
                'full_name' => 'Ratna Dewi',
                'school_name' => 'Institut Teknologi Bandung',
                'class_level' => 'Umum'
            ],
            [
                'full_name' => 'Eko Prasetyo',
                'school_name' => 'Universitas Gadjah Mada',
                'class_level' => 'Umum'
            ],
            [
                'full_name' => 'Sari Melati',
                'school_name' => 'Universitas Airlangga',
                'class_level' => 'Umum'
            ],
            [
                'full_name' => 'Agus Salim',
                'school_name' => 'Institut Pertanian Bogor',
                'class_level' => 'Umum'
            ]
        ];

        foreach ($visitors as $visitor) {
            Visitor::create($visitor);
        }
    }
}

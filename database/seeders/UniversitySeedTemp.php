<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\University;

class UniversitySeedTemp extends Seeder
{
    /**
     * Run the database seeds.
     * Mapping booth positions based on floor plan layout
     * SVG viewBox: 0 0 800 600 (800px width, 600px height)
     */
    public function run(): void
    {
        // Clear existing universities first (disable foreign key checks)
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        University::truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $universities = [
            // Center booths (Premium positions near stage) - B5-B11
            [
                'name' => 'Universitas Indonesia',
                'slug' => 'universitas-indonesia',
                'type' => 'PTN',
                'category' => 'Campuran',
                'description' => 'Universitas Indonesia (UI) adalah perguruan tinggi negeri yang berlokasi di Depok, Jawa Barat dan Jakarta. UI merupakan universitas tertua di Indonesia dan salah satu universitas terkemuka di Asia.',
                'official_link' => 'https://www.ui.ac.id',
                'social_media' => ['Instagram' => 'https://www.instagram.com/universitasindonesia/'],
                'booth_number' => 'B5',
                'x_position' => 330,
                'y_position' => 300,
                'booth_type' => 'center',
                'logo_color' => '#1E40AF'
            ],
            [
                'name' => 'Institut Teknologi Bandung',
                'slug' => 'institut-teknologi-bandung',
                'type' => 'PTN',
                'category' => 'Saintek',
                'description' => 'Institut Teknologi Bandung (ITB) adalah sebuah perguruan tinggi negeri yang berkedudukan di Kota Bandung. ITB merupakan sekolah tinggi teknik pertama di Indonesia.',
                'official_link' => 'https://www.itb.ac.id',
                'social_media' => ['Instagram' => 'https://www.instagram.com/itbofficial/'],
                'booth_number' => 'B4',
                'x_position' => 430,
                'y_position' => 300,
                'booth_type' => 'center',
                'logo_color' => '#DC2626'
            ],
            [
                'name' => 'Universitas Gadjah Mada',
                'slug' => 'universitas-gadjah-mada',
                'type' => 'PTN',
                'category' => 'Campuran',
                'description' => 'Universitas Gadjah Mada (UGM) adalah universitas negeri pertama yang didirikan oleh Pemerintah Republik Indonesia setelah kemerdekaan, berlokasi di Yogyakarta.',
                'official_link' => 'https://ugm.ac.id',
                'social_media' => ['Instagram' => 'https://www.instagram.com/ugmyogyakarta/'],
                'booth_number' => 'B6',
                'x_position' => 330,
                'y_position' => 380,
                'booth_type' => 'center',
                'logo_color' => '#059669'
            ],
            [
                'name' => 'Institut Pertanian Bogor',
                'slug' => 'institut-pertanian-bogor',
                'type' => 'PTN',
                'category' => 'Saintek',
                'description' => 'Institut Pertanian Bogor (IPB) adalah perguruan tinggi pertanian terkemuka di Indonesia yang berlokasi di Bogor, Jawa Barat.',
                'official_link' => 'https://ipb.ac.id',
                'social_media' => ['Instagram' => 'https://www.instagram.com/ipbuniversity/'],
                'booth_number' => 'B7',
                'x_position' => 430,
                'y_position' => 380,
                'booth_type' => 'center',
                'logo_color' => '#7C3AED'
            ],
            [
                'name' => 'Universitas Airlangga',
                'slug' => 'universitas-airlangga',
                'type' => 'PTN',
                'category' => 'Campuran',
                'description' => 'Universitas Airlangga (UNAIR) adalah perguruan tinggi negeri yang berlokasi di Surabaya, Jawa Timur. Terkenal dengan fakultas kedokteran dan farmasi yang berkualitas.',
                'official_link' => 'https://unair.ac.id',
                'social_media' => ['Instagram' => 'https://www.instagram.com/universitasairlangga/'],
                'booth_number' => 'B8',
                'x_position' => 330,
                'y_position' => 460,
                'booth_type' => 'center',
                'logo_color' => '#EA580C'
            ],
            [
                'name' => 'Universitas Brawijaya',
                'slug' => 'universitas-brawijaya',
                'type' => 'PTN',
                'category' => 'Campuran',
                'description' => 'Universitas Brawijaya (UB) adalah perguruan tinggi negeri di Malang, Jawa Timur yang terkenal dengan program studi teknik dan pertaniannya.',
                'official_link' => 'https://ub.ac.id',
                'social_media' => ['Instagram' => 'https://www.instagram.com/universitasbrawijaya/'],
                'booth_number' => 'B9',
                'x_position' => 430,
                'y_position' => 460,
                'booth_type' => 'center',
                'logo_color' => '#BE185D'
            ],

            // Left side booths - B18, B19, B15, B13 (Stage side)
            [
                'name' => 'Universitas Bina Nusantara',
                'slug' => 'universitas-bina-nusantara',
                'type' => 'PTS',
                'category' => 'Saintek',
                'description' => 'Universitas Bina Nusantara (BINUS) adalah universitas swasta terkemuka di Jakarta yang fokus pada teknologi, bisnis, dan desain.',
                'official_link' => 'https://binus.ac.id',
                'social_media' => ['Instagram' => 'https://www.instagram.com/binusuniversity/'],
                'booth_number' => 'B18',
                'x_position' => 230,
                'y_position' => 300,
                'booth_type' => 'stage_side',
                'logo_color' => '#0891B2'
            ],
            [
                'name' => 'Universitas Pelita Harapan',
                'slug' => 'universitas-pelita-harapan',
                'type' => 'PTS',
                'category' => 'Campuran',
                'description' => 'Universitas Pelita Harapan (UPH) adalah universitas swasta yang berlokasi di Tangerang, dikenal dengan pendidikan berkualitas internasional.',
                'official_link' => 'https://uph.edu',
                'social_media' => ['Instagram' => 'https://www.instagram.com/uph_edu/'],
                'booth_number' => 'B19',
                'x_position' => 130,
                'y_position' => 300,
                'booth_type' => 'stage_side',
                'logo_color' => '#4338CA'
            ],
            [
                'name' => 'Universitas Trisakti',
                'slug' => 'universitas-trisakti',
                'type' => 'PTS',
                'category' => 'Campuran',
                'description' => 'Universitas Trisakti adalah universitas swasta di Jakarta yang memiliki berbagai fakultas unggulan termasuk kedokteran, teknik, dan ekonomi.',
                'official_link' => 'https://trisakti.ac.id',
                'social_media' => ['Instagram' => 'https://www.instagram.com/universitastrisakti/'],
                'booth_number' => 'B15',
                'x_position' => 130,
                'y_position' => 460,
                'booth_type' => 'stage_side',
                'logo_color' => '#DC2626'
            ],

            // Right side booths - B1, B2, B3, A1, A2
            [
                'name' => 'Universitas Telkom',
                'slug' => 'universitas-telkom',
                'type' => 'PTS',
                'category' => 'Saintek',
                'description' => 'Universitas Telkom (Tel-U) adalah universitas swasta di Bandung yang fokus pada teknologi informasi dan komunikasi.',
                'official_link' => 'https://telkomuniversity.ac.id',
                'social_media' => ['Instagram' => 'https://www.instagram.com/telkomuniversity/'],
                'booth_number' => 'B1',
                'x_position' => 630,
                'y_position' => 220,
                'booth_type' => 'corner',
                'logo_color' => '#7C2D12'
            ],
            [
                'name' => 'Sekolah Tinggi Akuntansi Negara',
                'slug' => 'sekolah-tinggi-akuntansi-negara',
                'type' => 'Kedinasan',
                'category' => 'Soshum',
                'description' => 'Sekolah Tinggi Akuntansi Negara (STAN) adalah perguruan tinggi kedinasan di bawah Kementerian Keuangan yang mencetak tenaga ahli di bidang keuangan negara.',
                'official_link' => 'https://pknstan.ac.id',
                'social_media' => ['Instagram' => 'https://www.instagram.com/pknstanofficial/'],
                'booth_number' => 'B2',
                'x_position' => 630,
                'y_position' => 300,
                'booth_type' => 'corner',
                'logo_color' => '#059669'
            ],
            [
                'name' => 'Universitas Diponegoro',
                'slug' => 'universitas-diponegoro',
                'type' => 'PTN',
                'category' => 'Campuran',
                'description' => 'Universitas Diponegoro (UNDIP) adalah perguruan tinggi negeri di Semarang, Jawa Tengah dengan berbagai program studi unggulan.',
                'official_link' => 'https://undip.ac.id',
                'social_media' => ['Instagram' => 'https://www.instagram.com/undipofficial/'],
                'booth_number' => 'B3',
                'x_position' => 630,
                'y_position' => 380,
                'booth_type' => 'corner',
                'logo_color' => '#1D4ED8'
            ],

            // Corner booths - A1, A2 (Right corner)
            [
                'name' => 'Universitas Padjadjaran',
                'slug' => 'universitas-padjadjaran',
                'type' => 'PTN',
                'category' => 'Campuran',
                'description' => 'Universitas Padjadjaran (UNPAD) adalah perguruan tinggi negeri di Bandung dan Jatinangor yang memiliki fakultas kedokteran terkemuka.',
                'official_link' => 'https://unpad.ac.id',
                'social_media' => ['Instagram' => 'https://www.instagram.com/unpadofficial/'],
                'booth_number' => 'A1',
                'x_position' => 630,
                'y_position' => 460,
                'booth_type' => 'corner',
                'logo_color' => '#9333EA'
            ],
            [
                'name' => 'Akademi Kepolisian',
                'slug' => 'akademi-kepolisian',
                'type' => 'Kedinasan',
                'category' => 'Soshum',
                'description' => 'Akademi Kepolisian (AKPOL) adalah institusi pendidikan tinggi kepolisian yang mencetak perwira Polri.',
                'official_link' => 'https://akpol.ac.id',
                'social_media' => ['Instagram' => 'https://www.instagram.com/akpol_official/'],
                'booth_number' => 'A2',
                'x_position' => 630,
                'y_position' => 520,
                'booth_type' => 'corner',
                'logo_color' => '#B91C1C'
            ]
        ];

        foreach ($universities as $university) {
            University::create($university);
        }
    }
}

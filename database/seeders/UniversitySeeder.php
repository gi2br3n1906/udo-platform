<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\University;

class UniversitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $universities = [
            // PTN - Perguruan Tinggi Negeri (Premium positions near stage)
            [
                'name' => 'Universitas Indonesia',
                'slug' => 'ui',
                'type' => 'PTN',
                'category' => 'Campuran',
                'description' => 'Universitas Indonesia (UI) adalah perguruan tinggi negeri yang berlokasi di Depok, Jawa Barat dan Jakarta. UI merupakan universitas tertua di Indonesia dan salah satu universitas terkemuka di Asia.',
                'official_link' => 'https://www.ui.ac.id',
                'social_media' => [
                    'Instagram' => 'https://www.instagram.com/universitasindonesia/',
                    'YouTube' => 'https://www.youtube.com/user/HumasUI',
                    'TikTok' => 'https://www.tiktok.com/@universitasindonesia'
                ],
                'booth_number' => 'B5',
                'x_position' => 360,
                'y_position' => 320,
                'booth_type' => 'center',
                'logo_color' => '#1E40AF'
            ],
            [
                'name' => 'Institut Teknologi Bandung',
                'slug' => 'itb',
                'type' => 'PTN',
                'category' => 'Saintek',
                'description' => 'Institut Teknologi Bandung (ITB) adalah sebuah perguruan tinggi negeri yang berkedudukan di Kota Bandung. ITB merupakan sekolah tinggi teknik pertama di Indonesia.',
                'official_link' => 'https://www.itb.ac.id',
                'social_media' => [
                    'Instagram' => 'https://www.instagram.com/itbofficial/',
                    'YouTube' => 'https://www.youtube.com/user/itbofficial',
                    'Twitter' => 'https://twitter.com/itbofficial'
                ]
            ],
            [
                'name' => 'Universitas Gadjah Mada',
                'slug' => 'ugm',
                'type' => 'PTN',
                'category' => 'Campuran',
                'description' => 'Universitas Gadjah Mada (UGM) adalah universitas negeri pertama yang didirikan oleh Pemerintah Republik Indonesia setelah kemerdekaan, berlokasi di Yogyakarta.',
                'official_link' => 'https://ugm.ac.id',
                'social_media' => [
                    'Instagram' => 'https://www.instagram.com/ugmyogyakarta/',
                    'YouTube' => 'https://www.youtube.com/user/UGMYogyakarta',
                    'TikTok' => 'https://www.tiktok.com/@ugmyogyakarta'
                ]
            ],
            [
                'name' => 'Institut Pertanian Bogor',
                'slug' => 'ipb',
                'type' => 'PTN',
                'category' => 'Saintek',
                'description' => 'Institut Pertanian Bogor (IPB) adalah perguruan tinggi pertanian terkemuka di Indonesia yang berlokasi di Bogor, Jawa Barat.',
                'official_link' => 'https://ipb.ac.id',
                'social_media' => [
                    'Instagram' => 'https://www.instagram.com/ipbuniversity/',
                    'YouTube' => 'https://www.youtube.com/user/IPBUniversity'
                ]
            ],
            [
                'name' => 'Universitas Airlangga',
                'slug' => 'unair',
                'type' => 'PTN',
                'category' => 'Campuran',
                'description' => 'Universitas Airlangga (UNAIR) adalah perguruan tinggi negeri yang berlokasi di Surabaya, Jawa Timur. Terkenal dengan fakultas kedokteran dan farmasi yang berkualitas.',
                'official_link' => 'https://unair.ac.id',
                'social_media' => [
                    'Instagram' => 'https://www.instagram.com/universitasairlangga/',
                    'YouTube' => 'https://www.youtube.com/user/UniversitasAirlangga'
                ]
            ],

            // PTS - Perguruan Tinggi Swasta
            [
                'name' => 'Universitas Bina Nusantara',
                'slug' => 'binus',
                'type' => 'PTS',
                'category' => 'Saintek',
                'description' => 'Universitas Bina Nusantara (BINUS) adalah universitas swasta terkemuka di Jakarta yang fokus pada teknologi, bisnis, dan desain.',
                'official_link' => 'https://binus.ac.id',
                'social_media' => [
                    'Instagram' => 'https://www.instagram.com/binusuniversity/',
                    'YouTube' => 'https://www.youtube.com/user/binusuniversity',
                    'TikTok' => 'https://www.tiktok.com/@binusuniversity'
                ]
            ],
            [
                'name' => 'Universitas Pelita Harapan',
                'slug' => 'uph',
                'type' => 'PTS',
                'category' => 'Campuran',
                'description' => 'Universitas Pelita Harapan (UPH) adalah universitas swasta yang berlokasi di Tangerang, dikenal dengan pendidikan berkualitas internasional.',
                'official_link' => 'https://uph.edu',
                'social_media' => [
                    'Instagram' => 'https://www.instagram.com/uph_edu/',
                    'YouTube' => 'https://www.youtube.com/user/uphofficial'
                ]
            ],
            [
                'name' => 'Universitas Trisakti',
                'slug' => 'trisakti',
                'type' => 'PTS',
                'category' => 'Campuran',
                'description' => 'Universitas Trisakti adalah universitas swasta di Jakarta yang memiliki berbagai fakultas unggulan termasuk kedokteran, teknik, dan ekonomi.',
                'official_link' => 'https://trisakti.ac.id',
                'social_media' => [
                    'Instagram' => 'https://www.instagram.com/universitastrisakti/',
                    'YouTube' => 'https://www.youtube.com/user/UniversitasTrisakti'
                ]
            ],
            [
                'name' => 'Universitas Telkom',
                'slug' => 'telkom',
                'type' => 'PTS',
                'category' => 'Saintek',
                'description' => 'Universitas Telkom (Tel-U) adalah universitas swasta di Bandung yang fokus pada teknologi informasi dan komunikasi.',
                'official_link' => 'https://telkomuniversity.ac.id',
                'social_media' => [
                    'Instagram' => 'https://www.instagram.com/telkomuniversity/',
                    'YouTube' => 'https://www.youtube.com/user/TelkomUniversity',
                    'TikTok' => 'https://www.tiktok.com/@telkomuniversity'
                ]
            ],

            // Kedinasan
            [
                'name' => 'Sekolah Tinggi Akuntansi Negara',
                'slug' => 'stan',
                'type' => 'Kedinasan',
                'category' => 'Soshum',
                'description' => 'Sekolah Tinggi Akuntansi Negara (STAN) adalah perguruan tinggi kedinasan di bawah Kementerian Keuangan yang mencetak tenaga ahli di bidang keuangan negara.',
                'official_link' => 'https://pknstan.ac.id',
                'social_media' => [
                    'Instagram' => 'https://www.instagram.com/pknstanofficial/',
                    'YouTube' => 'https://www.youtube.com/channel/UC-PKN-STAN'
                ]
            ],
            [
                'name' => 'Sekolah Tinggi Transportasi Darat',
                'slug' => 'sttd',
                'type' => 'Kedinasan',
                'category' => 'Saintek',
                'description' => 'Sekolah Tinggi Transportasi Darat (STTD) adalah perguruan tinggi kedinasan di bawah Kementerian Perhubungan untuk bidang transportasi darat.',
                'official_link' => 'https://sttd.ac.id',
                'social_media' => [
                    'Instagram' => 'https://www.instagram.com/sttd_official/',
                    'YouTube' => 'https://www.youtube.com/channel/UC-STTD'
                ]
            ],
            [
                'name' => 'Akademi Kepolisian',
                'slug' => 'akpol',
                'type' => 'Kedinasan',
                'category' => 'Soshum',
                'description' => 'Akademi Kepolisian (AKPOL) adalah institusi pendidikan tinggi kepolisian yang mencetak perwira Polri.',
                'official_link' => 'https://akpol.ac.id',
                'social_media' => [
                    'Instagram' => 'https://www.instagram.com/akpol_official/',
                    'YouTube' => 'https://www.youtube.com/channel/UC-AKPOL'
                ]
            ],

            // Tambahan PTN lainnya
            [
                'name' => 'Universitas Brawijaya',
                'slug' => 'ub',
                'type' => 'PTN',
                'category' => 'Campuran',
                'description' => 'Universitas Brawijaya (UB) adalah perguruan tinggi negeri di Malang, Jawa Timur yang terkenal dengan program studi teknik dan pertaniannya.',
                'official_link' => 'https://ub.ac.id',
                'social_media' => [
                    'Instagram' => 'https://www.instagram.com/universitasbrawijaya/',
                    'YouTube' => 'https://www.youtube.com/user/UniversitasBrawijaya'
                ]
            ],
            [
                'name' => 'Universitas Diponegoro',
                'slug' => 'undip',
                'type' => 'PTN',
                'category' => 'Campuran',
                'description' => 'Universitas Diponegoro (UNDIP) adalah perguruan tinggi negeri di Semarang, Jawa Tengah dengan berbagai program studi unggulan.',
                'official_link' => 'https://undip.ac.id',
                'social_media' => [
                    'Instagram' => 'https://www.instagram.com/undipofficial/',
                    'YouTube' => 'https://www.youtube.com/user/undipofficial'
                ]
            ],
            [
                'name' => 'Universitas Padjadjaran',
                'slug' => 'unpad',
                'type' => 'PTN',
                'category' => 'Campuran',
                'description' => 'Universitas Padjadjaran (UNPAD) adalah perguruan tinggi negeri di Bandung dan Jatinangor yang memiliki fakultas kedokteran terkemuka.',
                'official_link' => 'https://unpad.ac.id',
                'social_media' => [
                    'Instagram' => 'https://www.instagram.com/unpadofficial/',
                    'YouTube' => 'https://www.youtube.com/user/unpadofficial'
                ]
            ]
        ];

        foreach ($universities as $university) {
            University::create($university);
        }
    }
}

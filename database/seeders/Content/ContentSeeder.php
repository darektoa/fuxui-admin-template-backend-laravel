<?php

namespace Database\Seeders\Content;

use App\Models\Content\{Content, Directory};
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $aboutOverviewContents = [
            [
                'name'      => 'Title Overview',
                'codename'  => 'aboutOverviewTitle',
                'text'      => 'PT Parama Agung Karya',
                'order'     => 1,
            ],
            [
                'name'      => 'Description Overview',
                'codename'  => 'aboutOverviewDescription',
                'text'      => "
                    Puji Syukur kami panjatkan kepada Tuhan Yang Maha Kuasa, karena atas berkat, rahmat, kasih saying, dan izin-Nya, kami dapat memperkenalkan PT. Parama Agung Karya melalui web Company Profile.\n
                    PT. Parama Agung Karya merupakan Perusahaan Swasta, yang bergerak di bidang konstruksi dan non-konstruksi seperti furniture hal tersebut merupakan komitmen kami terhadap pengguna jasa.\n
                    PT. Parama Agung Karya membantu dalam pekerjaan-pekerjaan anda, yang sesuai dengan keahlian kami.\n",
                'order'     => 2,
            ],
        ];

        $aboutOurVisionsContents = [
            [
                'name'      => 'Title Our Vision',
                'codename'  => 'aboutOurVisionsTitle',
                'text'      => 'Visi Kami',
                'order'     => 1,
            ],
            [
                'name'      => 'Description Our Vision',
                'codename'  => 'aboutOurVisionsDescription',
                'text'      => 'Terbentuknya Sistem Kerja Yang Adaptif, Professional Serta Menjunjung Tinggi Nilai-Nilai Loyalitas Dan Independen',
                'order'     => 2,
            ],
        ];

        $aboutOurMissionsContents = [
            [
                'name'      => 'Title Our Missions',
                'codename'  => 'aboutOurMissionsTitle',
                'text'      => 'Misi Kami',
                'order'     => 1,
            ],
            [
                'name'      => 'Title Mission 1',
                'codename'  => 'aboutMissionTitle1',
                'text'      => 'Memperluas Jaringan',
                'order'     => 2,
            ],
            [
                'name'      => 'Description Mission 1',
                'codename'  => 'aboutMissionDescription1',
                'text'      => 'Mengembangkan jaringan dan memperluas hubungan kerjasama dengan mitra pemerintah dan swasta.',
                'order'     => 3,
            ],
            [
                'name'      => 'Title Mission 2',
                'codename'  => 'aboutMissionTitle2',
                'text'      => 'Membangun Kebersamaan',
                'order'     => 4,
            ],
            [
                'name'      => 'Description Mission 2',
                'codename'  => 'aboutMissionDescription2',
                'text'      => 'Mengembangkan jaringan dan memperluas hubungan kerjasama dengan mitra pemerintah dan swasta.',
                'order'     => 5,
            ],
            [
                'name'      => 'Title Mission 3',
                'codename'  => 'aboutMissionTitle3',
                'text'      => 'Menguatkan Kerjasama',
                'order'     => 4,
            ],
            [
                'name'      => 'Description Mission 3',
                'codename'  => 'aboutMissionDescription3',
                'text'      => 'Menguatkan hubungan kerjasama dengan semangat loyalitas.',
                'order'     => 5,
            ],
            [
                'name'      => 'Title Mission 4',
                'codename'  => 'aboutMissionTitle4',
                'text'      => 'Kontribusi Positif',
                'order'     => 6,
            ],
            [
                'name'      => 'Description Mission 4',
                'codename'  => 'aboutMissionDescription4',
                'text'      => 'Berkontribusi positif terhadap pembangunan masyarakat dan lingkungan sekitar.',
                'order'     => 7,
            ],
        ];

        $blogContents = [
            [
                'name'      => 'Title',
                'codename'  => 'blogTitle',
                'text'      => 'Berita Terupdate Tentang Kami',
                'order'     => 1,
            ],
        ];

        $certificateContents = [
            [
                'name'      => 'Title',
                'codename'  => 'certificateTitle',
                'text'      => 'Sertifikasi Kami',
                'order'     => 1,
            ],
        ];

        $clientContents = [
            [
                'name'      => 'Title',
                'codename'  => 'clientTitle',
                'text'      => 'Klien Kami:',
                'order'     => 1,
            ],
        ];

        $contactContactContents = [
            [
                'name'      => 'Title',
                'codename'  => 'contactTitle',
                'text'      => 'Kontak Kami',
                'order'     => 1,
            ],
            [
                'name'      => 'Description',
                'codename'  => 'contactDescription',
                'text'      => 'Hubungi Kami Dan Mari Mulai Percakapan. Kami Siap Mendengarkan Dan Membantu Anda Di Setiap Langkah.',
                'order'     => 2,
            ],
            [
                'name'      => 'Link Map Location',
                'codename'  => 'contactMapLocation',
                'text'      => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.8803506775944!2d106.79408177546998!3d-6.279457193709387!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f1952c92652d%3A0x12b969e291ff64b0!2sJl.%20RS.%20Fatmawati%20Raya%20No.1%2C%20RT.11%2FRW.7%2C%20Gandaria%20Sel.%2C%20Kec.%20Cilandak%2C%20Kota%20Jakarta%20Selatan%2C%20Daerah%20Khusus%20Ibukota%20Jakarta%2012420!5e0!3m2!1sid!2sid!4v1713520921520!5m2!1sid!2sid',
                'order'     => 4,
            ],
            [
                'name'      => 'Email',
                'codename'  => 'contactEmail',
                'text'      => 'ptparamaagungkarya@gmail.com',
                'order'     => 5,
            ],
            [
                'name'      => 'Telphone',
                'codename'  => 'contactTelphone',
                'text'      => '021-22705111',
                'order'     => 6,
            ],
            [
                'name'      => 'Office Location',
                'codename'  => 'contactOfficeLocation',
                'text'      => 'Jl. RS. Fatmawati No. 1, Kelurahan Gandaria Selatan, Kecamatan Cilandak Jakarta Selatan 12420',
                'order'     => 7,
            ],
        ];

        $projectContents = [
            [
                'name'      => 'Title',
                'codename'  => 'projectTitle',
                'text'      => 'Proyek Terbaru Kami',
                'order'     => 1,
            ],
        ];


        $serviceContents = [
            [
                'name'      => 'Title',
                'codename'  => 'serviceTitle',
                'text'      => 'Layanan Kami',
                'order'     => 1,
            ],
        ];

        foreach($aboutOverviewContents as $content) {
            Directory::where('codename', 'overview')
                ->first()
                ->contents()
                ->create($content);
        }

        foreach($aboutOurVisionsContents as $content) {
            Directory::where('codename', 'ourVisions')
                ->first()
                ->contents()
                ->create($content);
        }

        foreach($aboutOurMissionsContents as $content) {
            Directory::where('codename', 'ourMissions')
                ->first()
                ->contents()
                ->create($content);
        }

        foreach($blogContents as $content) {
            Directory::where('codename', 'blog')
                ->first()
                ->contents()
                ->create($content);
        }

        foreach($certificateContents as $content) {
            Directory::where('codename', 'certificate')
                ->first()
                ->contents()
                ->create($content);
        }

        foreach($clientContents as $content) {
            Directory::where('codename', 'client')
                ->first()
                ->contents()
                ->create($content);
        }

        foreach($contactContactContents as $content) {
            Directory::where('codename', 'contact')
                ->first()
                ->contents()
                ->create($content);
        }

        foreach($projectContents as $content) {
            Directory::where('codename', 'project')
                ->first()
                ->contents()
                ->create($content);
        }

        foreach($serviceContents as $content) {
            Directory::where('codename', 'service')
                ->first()
                ->contents()
                ->create($content);
        }
    }
}

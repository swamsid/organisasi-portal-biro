<?php

namespace Database\Seeders;

use App\Models\DetailMasterF02;
use App\Models\MasterF02;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasterF02Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'indikator' => 'Tersedia Standar
                Pelayanan (SP) sesuai
                dengan ketentuan
                peraturan perundangundangan yang berlaku.',
                'jenis' => 'A',
                'kategori_id' => 1,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Tidak tersedia Standar
                        Pelayanan.'
                    ],
                    [
                        'value' => 1,
                        'jawaban' => 'Tersedia SP namun
                        tidak memenuhi 14
                        komponen.
                        '
                    ],
                    [
                        'value' => 2,
                        'jawaban' => 'Tersedia SP yang
                        memenuhi 14
                        komponen.                        
                        '
                    ],
                    [
                        'value' => 3,
                        'jawaban' => 'Tersedia SP yang
                        memenuhi 14
                        komponen dan
                        dilakukan penetapan.'
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'Tersedia SP yang
                        memenuhi 14
                        komponen, melibatkan
                        masyarakat dalam
                        penyusunan SP, dan
                        dilakukan penetapan.'
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'Tersedia SP yang
                        memenuhi 14
                        komponen, melibatkan
                        masyarakat dalam
                        penyusunan SP,
                        dilakukan penetapan,
                        dan dilakukan monev.'
                    ],
                ],
            ],
            [
                'indikator' => 'Proses penyusunan dan
                perubahan SP telah
                melibatkan unsur
                masyarakat.
                ',
                'jenis' => 'A',
                'kategori_id' => 1,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Penyusunan SP tanpa
                        melibatkan unsur
                        masyarakat dan pihak
                        terkait (stakeholder).'
                    ],
                    [
                        'value' => 1,
                        'jawaban' => 'Penyusunan SP telah
                        melibatkan minimal 1
                        unsur masyarakat.'
                    ],
                    [
                        'value' => 2,
                        'jawaban' => 'Penyusunan SP telah
                        melibatkan minimal 2
                        unsur masyarakat.'
                    ],
                    [
                        'value' => 3,
                        'jawaban' => 'Penyusunan SP telah
                        melibatkan minimal 3
                        unsur masyarakat.'
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'Penyusunan SP telah
                        melibatkan minimal 4
                        unsur masyarakat.
                        '
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'Penyusunan SP telah
                        melibatkan lebih dari 4
                        unsur masyarakat.'
                    ],
                ],
            ],
            [
                'indikator' => 'Jumlah media publikasi
                untuk komponen service
                delivery',
                'jenis' => 'A',
                'kategori_id' => 1,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Tidak ada publikasi SP.'
                    ],
                    [
                        'value' => 1,
                        'jawaban' => 'Tersedia publikasi SP hanya
                        sebagian dari komponen
                        service delivery baik pada
                        media cetak/non elektronik
                        maupun media elektronik.'
                    ],
                    [
                        'value' => 2,
                        'jawaban' => 'Tersedia publikasi SP
                        seluruh komponen service
                        delivery pada 2 atau lebih
                        media publikasi namun
                        belum dipublikasikan pada
                        SIPP Nasional.'
                    ],
                    [
                        'value' => 3,
                        'jawaban' => 'Tersedia publikasi SP
                        seluruh komponen service
                        delivery pada 2 media
                        publikasi dan pada SIPP
                        Nasional.'
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'Tersedia publikasi SP
                        seluruh komponen service
                        delivery pada 3 media
                        publikasi dan pada SIPP
                        Nasional.'
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'Tersedia publikasi SP
                        seluruh komponen service
                        delivery pada 4 atau lebih
                        media publikasi dan pada
                        SIPP Nasional.'
                    ],
                ],
            ],
            [
                'indikator' => 'Telah dilakukan
                peninjauan ulang secara
                berkala terhadap
                Standar Pelayanan',
                'jenis' => 'A',
                'kategori_id' => 1,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Tidak dilaksanakan
                        peninjauan ulang secara
                        berkala terhadap Standar
                        Pelayanan.
                        '
                    ],
                    [
                        'value' => 1,
                        'jawaban' => 'Dilakukan peninjauan
                        ulang 3 tahun atau lebih
                        terhadap seluruh jenis
                        layanan.
                        '
                    ],
                    [
                        'value' => 2,
                        'jawaban' => 'Dilakukan peninjauan
                        ulang 2 tahun sekali
                        terhadap sebagian jenis
                        layanan.'
                    ],
                    [
                        'value' => 3,
                        'jawaban' => 'Dilakukan peninjauan
                        ulang 2 tahun sekali
                        terhadap seluruh jenis
                        layanan.'
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'Dilakukan peninjauan
                        ulang 1 tahun sekali atau
                        lebih cepat terhadap
                        sebagian jenis layanan.'
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'Dilakukan peninjauan
                        ulang 1 tahun sekali atau
                        lebih cepat terhadap
                        seluruh jenis layanan.'
                    ],
                ],
            ],
            [
                'indikator' => 'Pemenuhan siklus
                Maklumat Pelayanan
                (ketersediaan,
                penetapan, dan
                publikasi)
                ',
                'jenis' => 'A',
                'kategori_id' => 1,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Tidak tersedia Maklumat
                        Pelayanan'
                    ],
                    [
                        'value' => 1,
                        'jawaban' => '. Tersedia Maklumat
                        Pelayanan namun belum
                        ditetapkan.'
                    ],
                    [
                        'value' => 2,
                        'jawaban' => '. Tersedia Maklumat
                        Pelayanan yang sudah
                        ditetapkan namun isinya
                        belum sesuai dengan
                        peraturan perundangan
                        yang berlaku.'
                    ],
                    [
                        'value' => 3,
                        'jawaban' => 'Tersedia Maklumat
                        Pelayanan yang sudah
                        ditetapkan dan isinya telah sesuai dengan peraturan
                        perundangan yang berlaku.'
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'Tersedia Maklumat
                        Pelayanan yang sudah
                        ditetapkan, isinya telah
                        sesuai dengan peraturan
                        perundangan yang berlaku,
                        dan dipublikasikan pada
                        media non elektronik.'
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'Tersedia Maklumat
                        Pelayanan yang sudah
                        ditetapkan, isinya telah
                        sesuai dengan peraturan
                        perundangan yang berlaku,
                        dan dipublikasikan pada
                        media non elektronik dan
                        elektronik.'
                    ],
                ],
            ],
            [
                'indikator' => 'SKM yang dilaksanTidak
                dilaksanakan
                peninjauan ulang secara
                berkala terhadap
                Standar Pelayanan.
                0. Dilakukan
                peninjauan ulang 3
                tahun atau lebih
                terhadap seluruh
                jenis layanan.
                1. Dilakukan
                peninjauan ulang 2
                tahun sekali terhadap sebagian
                jenis layanan.
                2. Dilakukan
                peninjauan ulang 2
                tahun sekali
                terhadap seluruh
                jenis layanan.
                3. Dilakukan
                peninjauan ulang 1
                tahun sekali atau
                lebih cepat terhadap
                sebagian jenis
                layanan.
                4. Dilakukan
                peninjauan ulang 1
                tahun sekali atau
                lebih cepat terhadap
                seluruh jenis
                layanan.
                akan sesuai dengan
                Peraturan Menteri
                ',
                'jenis' => 'A',
                'kategori_id' => 1,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Belum melaksanakan SKM.'
                    ],
                    [
                        'value' => 1,
                        'jawaban' => 'Sudah melaksanakan SKM
                        namun tidak sesuai dengan
                        Peraturan Menteri PANRB
                        yang berlaku.
                        '
                    ],
                    [
                        'value' => 2,
                        'jawaban' => 'Sudah melaksanakan SKM
                        sesuai dengan Peraturan
                        Menteri PANRB yang
                        berlaku.'
                    ],
                    [
                        'value' => 3,
                        'jawaban' => 'Sudah melaksanakan SKM
                        sesuai dengan
                        PermenPANRB yang berlaku dan dipublikasikan
                        pada media non-elektronik.'
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'Sudah melaksanakan SKM
                        sesuai dengan
                        PermenPANRB yang
                        berlaku dan dipublikasikan
                        pada media non-elektronik
                        dan elektronik.'
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'Sudah melaksanakan SKM
                        sesuai dengan
                        PermenPANRB yang
                        berlaku dan dipublikasikan
                        pada media non-elektronik
                        dan elektronik serta
                        dilakukan tindak lanjut
                        hasil SKM.'
                    ],
                ],
            ],
            [
                'indikator' => 'Jumlah media publikasi
                hasil SKM.',
                'jenis' => 'A',
                'kategori_id' => 1,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Tidak dipublikasikan.'
                    ],
                    [
                        'value' => 1,
                        'jawaban' => 'SKM dipublikasikan pada 1
                        (satu) media publikasi.
                        '
                    ],
                    [
                        'value' => 2,
                        'jawaban' => 'SKM dipublikasikan pada 2
                        (dua) media publikasi.
                        '
                    ],
                    [
                        'value' => 3,
                        'jawaban' => 'SKM dipublikasikan pada 3
                        (tiga) media publikasi.'
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'SKM dipublikasikan pada 4
                        (empat) media publikasi.'
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'SKM dipublikasikan pada
                        lebih dari 4 (empat) media
                        publikasi lainnya.
                        '
                    ],
                ],
            ],
            [
                'indikator' => 'Persentase rencana
                tindak lanjut hasil SKM
                yang telah selesai
                ditindaklanjuti ',
                'jenis' => 'A',
                'kategori_id' => 1,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Tidak ada rencana tindak
                        lanjut SKM.'
                    ],
                    [
                        'value' => 1,
                        'jawaban' => 'Ada rencana tindak lanjut
                        tapi belum dilaksanakan.
                        '
                    ],
                    [
                        'value' => 2,
                        'jawaban' => 'Tindak lanjut hasil SKM
                        dilaksanakan kurang dari
                        30%, dibuktikan dengan
                        laporan pelaksanaannya.
                        '
                    ],
                    [
                        'value' => 3,
                        'jawaban' => 'Tindak lanjut hasil SKM
                        dilaksanakan 30-80%,
                        dibuktikan dengan laporan
                        pelaksanaannya.'
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'Tindak lanjut hasil SKM
                        dilaksanakan lebih dari
                        80%, dibuktikan dengan
                        laporan pelaksanaannya.'
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'Tindak lanjut hasil SKM
                        dilaksanakan 100%,
                        dibuktikan dengan laporan
                        pelaksanaannya.'
                    ],
                ],
            ],
            [
                'indikator' => 'Kecepatan tindak lanjut
                hasil SKM seluruh jenis
                pelayanan
                ',
                'jenis' => 'A',
                'kategori_id' => 1,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Rekomendasi hasil SKM
                        tidak ditindaklanjuti.'
                    ],
                    [
                        'value' => 1,
                        'jawaban' => 'Rekomendasi hasil SKM
                        ditindaklanjuti seluruhnya 1 tahun setelah laporan
                        SKM diterbitkan.'
                    ],
                    [
                        'value' => 2,
                        'jawaban' => 'Rekomendasi hasil SKM
                        ditindaklanjuti seluruhnya
                        9 bulan setelah laporan
                        SKM diterbitkan.
                        '
                    ],
                    [
                        'value' => 3,
                        'jawaban' => 'Rekomendasi hasil SKM
                        ditindaklanjuti seluruhnya
                        6 bulan setelah laporan
                        SKM diterbitkan.'
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'Rekomendasi hasil SKM
                        ditindaklanjuti seluruhnya
                        3 bulan setelah laporan
                        SKM diterbitkan.'
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'Rekomendasi hasil SKM
                        ditindaklanjuti seluruhnya
                        1 bulan setelah laporan
                        SKM diterbitkan.'
                    ],
                ],
            ],
            [
                'indikator' => 'Tersedia waktu
                pelayanan yang
                memudahkan
                pengguna layanan.',
                'jenis' => 'A',
                'kategori_id' => 2,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Tidak memiliki kebijakan
                        jam pelayanan/kerja.'
                    ],
                    [
                        'value' => 1,
                        'jawaban' => 'Memiliki kebijakan jam
                        pelayanan/kerja.'
                    ],
                    [
                        'value' => 2,
                        'jawaban' => 'Memiliki kebijakan jam
                        pelayanan/kerja dan 1
                        unsur lainnya.
                        '
                    ],
                    [
                        'value' => 3,
                        'jawaban' => 'Memiliki kebijakan jam
                        pelayanan/kerja dan 2
                        unsur lainnya.'
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'Memiliki kebijakan jam
                        pelayanan/kerja dan 3
                        unsur lainnya.
                        '
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'Memiliki kebijakan jam
                        pelayanan/kerja dan 4
                        atau lebih unsur lainnya.
                        '
                    ],
                ],
            ],
            [
                'indikator' => 'Tersedia Kode Etik dan
                Kode Perilaku
                Pelaksana dan/atau Budaya Pelayanan di
                lingkungan instansi.
                ',
                'jenis' => 'A',
                'kategori_id' => 2,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Tidak tersedia aturan
                        kode etik dan kode
                        perilaku.
                        '
                    ],
                    [
                        'value' => 1,
                        'jawaban' => 'Aturan kode etik dan kode
                        perilaku Pelaksana
                        Pelayanan hanya meliputi
                        nilai dasar hak dan
                        kewajiban.'
                    ],
                    [
                        'value' => 2,
                        'jawaban' => 'Aturan kode etik dan kode
                        perilaku Pelaksana
                        Pelayanan meliputi nilai
                        dasar hak kewajiban dan
                        1 (satu) unsur lainnya.'
                    ],
                    [
                        'value' => 3,
                        'jawaban' => 'Aturan kode etik dan kode
                        perilaku Pelaksana
                        Pelayanan meliputi nilai
                        dasar hak dan kewajiban
                        dan 2 (dua) unsur
                        lainnya.
                        '
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'Aturan kode etik dan kode
                        perilaku Pelaksana
                        Pelayanan meliputi nilai
                        dasar hak dan kewajiban
                        dan 3 (tiga) unsur lainnya.'
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'Aturan kode etik dan kode
                        perilaku Pelaksana
                        Pelayanan meliputi nilai
                        dasar hak dan kewajiban
                        dan 4 (empat) unsur
                        lainnya.
                        '
                    ],
                ],
            ],
            [
                'indikator' => 'Tersedia mekanisme
                yang dibangun untuk
                menjaga dan
                meningkatkan motivasi
                kerja Pelaksana
                pelayanan
                ',
                'jenis' => 'A',
                'kategori_id' => 2,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Tidak tersedia
                        mekanisme peningkatan
                        motivasi kerja.
                        '
                    ],
                    [
                        'value' => 1,
                        'jawaban' => 'Tersedia 1 jenis
                        mekanisme peningkatan
                        motivasi kerja'
                    ],
                    [
                        'value' => 2,
                        'jawaban' => 'Tersedia 2 jenis
                        mekanisme peningkatan
                        motivasi kerja
                        '
                    ],
                    [
                        'value' => 3,
                        'jawaban' => '. Tersedia 3 jenis
                        mekanisme peningkatan
                        motivasi kerja'
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'Tersedia 4 jenis
                        mekanisme peningkatan
                        motivasi kerja'
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'Tersedia lebih dari 4
                        jenis mekanisme
                        peningkatan motivasi
                        kerja'
                    ],
                ],
            ],
            [
                'indikator' => 'Tersedia kriteria
                pemberian penghargaan
                bagi pegawai yang
                berprestasi.
                ',
                'jenis' => 'A',
                'kategori_id' => 2,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Tidak ada pemberian
                        penghargaan.'
                    ],
                    [
                        'value' => 1,
                        'jawaban' => 'Ada pemberian
                        penghargaan hanya
                        berdasarkan 1-2 unsur
                        kecuali kinerja.'
                    ],
                    [
                        'value' => 2,
                        'jawaban' => 'Ada pemberian
                        penghargaan berdasarkan
                        3-5 unsur kecuali kinerja.
                        '
                    ],
                    [
                        'value' => 3,
                        'jawaban' => 'Ada pemberian
                        penghargaan berdasarkan 1-2 unsur termasuk
                        kinerja.'
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'Ada pemberian
                        penghargaan berdasarkan
                        3-4 unsur termasuk
                        kinerja.
                        '
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'Ada pemberian
                        penghargaan berdasarkan
                        5-6 unsur termasuk
                        kinerja.'
                    ],
                ],
            ],
            [
                'indikator' => 'Tersedia pelaksana
                yang menerapkan
                budaya pelayanan
                ',
                'jenis' => 'A',
                'kategori_id' => 2,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Tidak menerapkan budaya
                        layanan.'
                    ],
                    [
                        'value' => 1,
                        'jawaban' => ' Pelaksana pelayanan
                        menerapkan 1 (satu) unsur
                        budaya pelayanan.'
                    ],
                    [
                        'value' => 2,
                        'jawaban' => 'Pelaksana pelayanan
                        menerapkan 2 (dua) unsur
                        budaya pelayanan.
                        '
                    ],
                    [
                        'value' => 3,
                        'jawaban' => 'Pelaksana pelayanan
                        menerapkan 3 (tiga) unsur
                        budaya pelayanan.
                        '
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'Pelaksana pelayanan
                        menerapkan 4 (empat) unsur
                        budaya pelayanan.
                        '
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'Pelaksana pelayanan
                        menerapkan 5 (lima) unsur
                        budaya pelayanan.'
                    ],
                ],
            ],
            [
                'indikator' => 'Tersedia tempat parkir
                dengan fasilitas
                pendukung yang
                memadai
                ',
                'jenis' => 'A',
                'kategori_id' => 3,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Tidak tersedia tempat
                        parkir'
                    ],
                    [
                        'value' => 1,
                        'jawaban' => 'Tersedia tempat parkir
                        dan memiliki 1 fasilitas
                        parkir.'
                    ],
                    [
                        'value' => 2,
                        'jawaban' => 'Tersedia tempat parkir
                        dan memiliki 2 fasilitas
                        parkir.'
                    ],
                    [
                        'value' => 3,
                        'jawaban' => 'Tersedia tempat parkir
                        dan memiliki 3 fasilitas
                        parkir.'
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'Tersedia tempat parkir
                        dan memiliki 4 fasilitas
                        parkir.'
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'Tersedia tempat parkir
                        dan memiliki 5 atau lebih
                        fasilitas parkir.'
                    ],
                ],
            ],
            [
                'indikator' => 'Tersedia ruang tunggu
                dengan fasilitas wajib
                dan pelengkap
                ',
                'jenis' => 'A',
                'kategori_id' => 3,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Tidak tersedia fasilitas
                        apapun.'
                    ],
                    [
                        'value' => 1,
                        'jawaban' => 'Tersedia fasilitas wajib.'
                    ],
                    [
                        'value' => 2,
                        'jawaban' => 'Tersedia fasilitas wajib
                        dan 1 fasilitas pelengkap.'
                    ],
                    [
                        'value' => 3,
                        'jawaban' => 'Tersedia fasilitas wajib
                        dan 2 fasilitas pelengkap.
                        '
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'Tersedia fasilitas wajib
                        dan 3 fasilitas pelengkap.
                        '
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'Tersedia fasilitas wajib
                        dan 4 atau lebih fasilitas
                        pelengkap.
                        '
                    ],
                ],
            ],
            [
                'indikator' => 'Tersedia sarana toilet
                pengguna layanan yang
                layak pakai
                ',
                'jenis' => 'A',
                'kategori_id' => 3,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Tidak tersedia toilet
                        pengguna layanan.'
                    ],
                    [
                        'value' => 1,
                        'jawaban' => 'Toilet pengguna layanan
                        dengan 1 kondisi.
                        '
                    ],
                    [
                        'value' => 2,
                        'jawaban' => 'Toilet pengguna layanan
                        dengan 2 kondisi.'
                    ],
                    [
                        'value' => 3,
                        'jawaban' => 'Toilet pengguna layanan
                        dengan 3 kondisi.'
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'Toilet pengguna layanan
                        dengan 4 kondisi.'
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'Toilet pengguna layanan
                        dengan lebih dari 4
                        kondisi.'
                    ],
                ],
            ],
            [
                'indikator' => 'Tersedia sarana
                prasarana bagi
                pengguna layanan
                kelompok rentan',
                'jenis' => 'A',
                'kategori_id' => 3,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Tidak tersedia sarana
                        prasarana bagi pengguna
                        layanan kelompok rentan.'
                    ],
                    [
                        'value' => 1,
                        'jawaban' => 'Tersedia 1-3 sarana
                        prasarana bagi pengguna
                        layanan kelompok rentan.'
                    ],
                    [
                        'value' => 2,
                        'jawaban' => 'Tersedia 4-6 sarana
                        prasarana bagi pengguna
                        layanan kelompok rentan.'
                    ],
                    [
                        'value' => 3,
                        'jawaban' => 'Tersedia 7-9 sarana
                        prasarana bagi pengguna
                        layanan kelompok rentan.'
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'Tersedia 10-12 sarana
                        prasarana bagi pengguna
                        layanan kelompok rentan.
                        '
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'Tersedia 13 atau lebih
                        sarana prasarana bagi
                        pengguna layanan
                        kelompok rentan.
                        '
                    ],
                ],
            ],
            [
                'indikator' => 'Tersedia sarana
                prasarana penunjang.',
                'jenis' => 'A',
                'kategori_id' => 3,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Tidak tersedia fasilitas
                        penunjang.'
                    ],
                    [
                        'value' => 1,
                        'jawaban' => 'Tersedia 1 fasilitas
                        penunjang.'
                    ],
                    [
                        'value' => 2,
                        'jawaban' => 'Tersedia 2 fasilitas
                        penunjang.'
                    ],
                    [
                        'value' => 3,
                        'jawaban' => 'Tersedia 3 fasilitas
                        penunjang.
                        '
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'Tersedia 4 fasilitas
                        penunjang.
                        '
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'Tersedia 5 atau lebih
                        fasilitas penunjang.
                        '
                    ],
                ],
            ],
            [
                'indikator' => 'Sarana Front Office (FO)
                Informasi di unit
                layanan.
                ',
                'jenis' => 'A',
                'kategori_id' => 3,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Tidak tersedia sarana FO
                        informasi layanan.
                        '
                    ],
                    [
                        'value' => 1,
                        'jawaban' => 'Tersedia sarana FO
                        informasi layanan dengan
                        1 fasilitas.
                        '
                    ],
                    [
                        'value' => 2,
                        'jawaban' => 'Tersedia sarana FO
                        informasi layanan dengan
                        2 fasilitas.
                        '
                    ],
                    [
                        'value' => 3,
                        'jawaban' => 'Tersedia sarana FO
                        informasi layanan dengan
                        3 fasilitas.'
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'Tersedia sarana FO
                        informasi layanan dengan
                        4 fasilitas.'
                    ],
                    [
                        'value' => 5,
                        'jawaban' => '. Tersedia sarana FO
                        informasi layanan dengan
                        5 atau lebih fasilitas.
                        '
                    ],
                ],
            ],
            [
                'indikator' => 'Tersedia sistem
                informasi pelayanan
                publik untuk informasi
                publik.',
                'jenis' => 'A',
                'kategori_id' => 4,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Tidak tersedia sistem
                        informasi pelayanan
                        publik baik elektronik
                        maupun non elektronik.'
                    ],
                    [
                        'value' => 1,
                        'jawaban' => 'Tersedia sistem informasi
                        pelayanan publik non
                        elektronik melalui media
                        lisan (pusat informasi).
                        '
                    ],
                    [
                        'value' => 2,
                        'jawaban' => 'Tersedia sistem informasi
                        pelayanan publik non
                        elektronik melalui media
                        lisan (pusat informasi)
                        serta media papan
                        pengumuman dan media
                        cetak.'
                    ],
                    [
                        'value' => 3,
                        'jawaban' => 'Tersedia Sistem informasi
                        pelayanan publik
                        elektronik namun belum
                        online (e-kiosk/ display
                        TV/ layar monitor).'
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'Tersedia Sistem informasi
                        pelayanan publik berbasis
                        online/website.'
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'Sistem informasi
                        pelayanan publik telah
                        online/website dan
                        terhubung dengan sistem
                        informasi pelayanan
                        publik nasional serta
                        telah menginput layanan
                        yang ditetapkan ke dalam
                        sistem informasi
                        pelayanan publik
                        nasional.'
                    ],
                ],
            ],
            [
                'indikator' => 'Tersedia sistem
                informasi pelayanan
                publik pendukung
                operasional pelayanan.',
                'jenis' => 'A',
                'kategori_id' => 4,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Tidak tersedia sistem
                        informasi pendukung
                        operasional pelayanan
                        publik.'
                    ],
                    [
                        'value' => 1,
                        'jawaban' => 'SIPP didukung dengan
                        sistem informasi yang
                        minimal memenuhi unsur
                        data pendukung
                        pelayanan (standar
                        pelayanan).
                        '
                    ],
                    [
                        'value' => 2,
                        'jawaban' => 'SIPP didukung dengan
                        sistem informasi yang
                        minimal memenuhi unsur
                        data pendukung
                        pelayanan (standar
                        pelayanan) dan
                        pengelolaan pengaduan
                        SP4N-LAPOR.'
                    ],
                    [
                        'value' => 3,
                        'jawaban' => 'SIPP didukung dengan
                        sistem informasi yang
                        minimal memenuhi unsur
                        data pendukung
                        pelayanan (standar
                        pelayanan), pengelolaan
                        pengaduan SP4N-LAPOR,
                        dan survey kepuasan
                        masyarakat.'
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'SIPP didukung dengan
                        sistem informasi yang
                        minimal memenuhi unsur
                        data pendukung
                        pelayanan (standar
                        pelayanan), pengelolaan
                        pengaduan SP4N-LAPOR,
                        survey kepuasan
                        masyarakat, dan penilaian
                        kinerja pemberi
                        pelayanan.'
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'SIPP didukung dengan
                        sistem informasi yang
                        minimal memenuhi unsur
                        data pendukung
                        pelayanan (standar
                        pelayanan), pengelolaan
                        pengaduan SP4N-LAPOR,
                        survey kepuasan masyarakat, pemberi
                        kinerja pelayanan, FAQ
                        dan/atau pengelolaan
                        keuangan pelayanan
                        publik bagi layanan
                        berbayar, atau unsur
                        pendukung lainnya.
                        '
                    ],
                ],
            ],
            [
                'indikator' => 'Kualitas penggunaan
                SIPP Elektronik
                (Website/Aplikasi).
                ',
                'jenis' => 'A',
                'kategori_id' => 4,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'SIPP Elektronik tidak
                        terhubung secara daring.'
                    ],
                    [
                        'value' => 1,
                        'jawaban' => 'SIPP Elektronik berbasis
                        website/aplikasi mudah
                        dioperasikan.
                        '
                    ],
                    [
                        'value' => 2,
                        'jawaban' => 'SIPP Elektronik berbasis
                        website/aplikasi mudah
                        dioperasikan, mudah
                        diakses.
                        '
                    ],
                    [
                        'value' => 3,
                        'jawaban' => 'SIPP Elektronik berbasis
                        website/aplikasi mudah
                        dioperasikan, mudah
                        diakses, kompatibel.
                        '
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'SIPP Elektronik berbasis
                        website/aplikasi yang
                        mudah dioperasikan,
                        mudah diakses,
                        kompatibel, merupakan
                        kanal digital resmi
                        pemerintah
                        (domain.go.id).'
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'SIPP Elektronik berbasis
                        website/aplikasi yang
                        mudah dioperasikan,
                        mudah diakses,
                        kompatibel, merupakan
                        kanal digital resmi
                        pemerintah (domain.go.id)
                        dan navigasi yang mudah
                        dipahami.'
                    ],
                ],
            ],
            [
                'indikator' => 'Pemutakhiran data dan
                informasi kanal digital.',
                'jenis' => 'A',
                'kategori_id' => 4,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Tersedia data dan
                        informasi pelayanan
                        publik yang tidak
                        dimutakhirkan.'
                    ],
                    [
                        'value' => 1,
                        'jawaban' => 'Pemutakhiran data dan
                        informasi pelayanan
                        publik telah dilakukan
                        secara tahunan.'
                    ],
                    [
                        'value' => 2,
                        'jawaban' => 'Pemutakhiran data dan
                        informasi pelayanan
                        publik telah dilakukan
                        secara semesteran.'
                    ],
                    [
                        'value' => 3,
                        'jawaban' => 'Pemutakhiran data dan
                        informasi pelayanan
                        publik secara bulanan.'
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'Pemutakhiran data dan
                        informasi pelayanan
                        publik dilakukan secara
                        mingguan.'
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'Pemutakhiran data dan
                        informasi pelayanan
                        publik dilakukan secara
                        harian dan detail/sangat
                        lengkap.'
                    ],
                ],
            ],
            [
                'indikator' => 'Tersedia sarana
                konsultasi dan
                pengaduan secara tatap
                muka yang berkualitas',
                'jenis' => 'A',
                'kategori_id' => 5,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Tidak tersedia Sarana
                        konsultasi pengaduan
                        pengguna layanan.'
                    ],
                    [
                        'value' => 1,
                        'jawaban' => 'Sarana konsultasi
                        pengaduan pengguna
                        layanan dengan 1
                        fasilitas.'
                    ],
                    [
                        'value' => 2,
                        'jawaban' => 'Sarana konsultasi
                        pengaduan pengguna
                        layanan dengan 2
                        fasilitas.'
                    ],
                    [
                        'value' => 3,
                        'jawaban' => 'Sarana konsultasi
                        pengaduan pengguna
                        layanan dengan 3
                        fasilitas.'
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'Sarana konsultasi
                        pengaduan pengguna
                        layanan dengan 4
                        fasilitas.'
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'Sarana konsultasi
                        pengaduan pengguna
                        layanan dengan 5 atau
                        lebih fasilitas.
                        '
                    ],
                ],
            ],
            [
                'indikator' => 'Tersedia sarana dan
                media konsultasi serta
                pengaduan yang bisa
                dimanfaatkan semua
                lapisan masyarakat.',
                'jenis' => 'A',
                'kategori_id' => 5,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Tidak ada sarana dan
                        petugas.'
                    ],
                    [
                        'value' => 1,
                        'jawaban' => 'Hanya terdapat media
                        konsultasi dan pengaduan
                        secara offline menyatu
                        dengan front office.
                        '
                    ],
                    [
                        'value' => 2,
                        'jawaban' => 'Hanya terdapat media
                        konsultasi dan pengaduan
                        secara offline namun
                        terpisah dengan front
                        office.'
                    ],
                    [
                        'value' => 3,
                        'jawaban' => 'Terdapat media konsultasi
                        dan pengaduan secara
                        offline menyatu satu
                        dengan front office dan
                        tersedia secara online'
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'Terdapat media konsultasi
                        dan pengaduan secara
                        offline secara terpisah dari
                        front office, serta tersedia
                        secara online.'
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'Terdapat media konsultasi
                        dan pengaduan secara
                        offline terpisah dari front
                        office, dan terhubung
                        dengan SP4N-LAPOR!'
                    ],
                ],
            ],
            [
                'indikator' => 'Tersedia akuntabilitas
                hasil konsultasi
                dan/atau pengaduan.',
                'jenis' => 'A',
                'kategori_id' => 5,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Tidak ada dokumentasi.'
                    ],
                    [
                        'value' => 1,
                        'jawaban' => 'Terdapat dokumentasi
                        yang diarsipkan.'
                    ],
                    [
                        'value' => 2,
                        'jawaban' => 'Terdapat dokumentasi
                        yang diarsipkan dan
                        dituangkan dalam
                        laporan.'
                    ],
                    [
                        'value' => 3,
                        'jawaban' => 'Terdapat dokumentasi
                        diarsipkan, dituangkan
                        dalam laporan, dan
                        dilakukan monev.'
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'Terdapat dokumentasi
                        diarsipkan, dituangkan
                        dalam laporan, dilakukan
                        monev, dan
                        ditindaklanjuti.'
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'Terdapat dokumentasi
                        diarsipkan, dituangkan
                        dalam laporan, dilakukan
                        monev, ditindaklanjuti,
                        dan dipublikasikan.'
                    ],
                ],
            ],
            [
                'indikator' => 'Tersedia tindak lanjut
                atas konsultasi dan
                pengaduan dari semua
                lapisan masyarakat.',
                'jenis' => 'A',
                'kategori_id' => 5,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Tidak ada konsultasi atau
                        pengaduan yang
                        ditindaklanjuti.'
                    ],
                    [
                        'value' => 1,
                        'jawaban' => '< 50% konsultasi atau
                        pengaduan ditindaklanjuti
                        hingga selesai yang tidak
                        menggunakan SP4NLAPOR!.'
                    ],
                    [
                        'value' => 2,
                        'jawaban' => '≥ 50% konsultasi atau
                        pengaduan ditindaklanjuti
                        hingga selesai yang tidak
                        menggunakan SP4NLAPOR!.'
                    ],
                    [
                        'value' => 3,
                        'jawaban' => '< 50% konsultasi atau
                        pengaduan yang masuk ke
                        SP4N-LAPOR! dan
                        ditindaklanjuti hingga
                        selesai.'
                    ],
                    [
                        'value' => 4,
                        'jawaban' => '≥ 50% - 90% konsultasi atau
                        pengaduan yang masuk ke
                        SP4N-LAPOR! dan ditindaklanjuti hingga
                        selesai.'
                    ],
                    [
                        'value' => 5,
                        'jawaban' => '≥ 90% konsultasi atau
                        pengaduan yang masuk ke
                        SP4N-LAPOR! dan
                        ditindaklanjuti hingga
                        selesai.'
                    ],
                ],
            ],
            [
                'indikator' => 'Penciptaan Inovasi
                Pelayanan Publik.
                ',
                'jenis' => 'A',
                'kategori_id' => 6,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Tidak tersedia inovasi.'
                    ],
                    [
                        'value' => 1,
                        'jawaban' => 'Belum ada inovasi,
                        masih dalam proses
                        pembelajaran berinovasi.'
                    ],
                    [
                        'value' => 2,
                        'jawaban' => 'Sudah ada inovasi
                        namun kurang dari 1
                        tahun.
                        '
                    ],
                    [
                        'value' => 3,
                        'jawaban' => 'Sudah ada inovasi lebih
                        dari 1 tahun namun
                        belum diikutsertakan
                        dalam kompetisi (level
                        apapun).'
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'Sudah ada inovasi lebih
                        dari 1 tahun dan sudah
                        diikutsertakan dalam
                        kompetisi level apapun'
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'Inovasi yang
                        dilaksanakan sudah
                        mendapatkan prestasi
                        pada level (apapun).
                        '
                    ],
                ],
            ],
            [
                'indikator' => 'Sumber daya yang
                mendukung
                keberlanjutan Inovasi
                Pelayanan Publik.',
                'jenis' => 'A',
                'kategori_id' => 6,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Belum ada sumber daya yang
                        mendukung keberlanjutan
                        inovasi.'
                    ],
                    [
                        'value' => 1,
                        'jawaban' => 'Sumber daya yang
                        mendukung keberlanjutan
                        inovasi dalam bentuk
                        rancangan payung hukum.
                        '
                    ],
                    [
                        'value' => 2,
                        'jawaban' => 'Sumber daya yang
                        mendukung keberlanjutan
                        inovasi dalam bentuk payung
                        hukum.'
                    ],
                    [
                        'value' => 3,
                        'jawaban' => 'Sumber daya yang
                        mendukung keberlanjutan
                        inovasi dalam bentuk payung
                        hukum dan 1 kondisi
                        lainnya.'
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'Sumber daya yang
                        mendukung keberlanjutan
                        inovasi dalam bentuk payung
                        hukum dan 2 kondisi
                        lainnya.'
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'Sumber daya yang
                        mendukung keberlanjutan
                        inovasi dalam bentuk payung
                        hukum dan 3 kondisi
                        lainnya.
                        '
                    ],
                ],
            ],
            [
                'indikator' => 'Tersedia sistem antrian
                untuk menunjang
                pelayanan.',
                'jenis' => 'A',
                'kategori_id' => 7,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Tidak tersedia sistem antrian.
                        '
                    ],
                    [
                        'value' => 1,
                        'jawaban' => 'Tersedia sistem antrian
                        dengan 1 fasilitas.'
                    ],
                    [
                        'value' => 2,
                        'jawaban' => 'Tersedia sistem antrian
                        dengan 2 fasilitas.'
                    ],
                    [
                        'value' => 3,
                        'jawaban' => 'Tersedia sistem antrian
                        dengan 3 fasilitas.
                        '
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'Tersedia sistem antrian
                        dengan 4 fasilitas.
                        '
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'Tersedia sistem antrian
                        dengan lebih dari 4 fasilitas.
                        '
                    ],
                ],
            ],
            [
                'indikator' => 'Tersedia Standar
                Pelayanan (SP) sesuai
                dengan ketentuan
                peraturan perundangundangan yang
                berlaku.
                ',
                'jenis' => 'B',
                'kategori_id' => 1,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Tidak tersedia Standar
                        Pelayanan.'
                    ],
                    [
                        'value' => 1,
                        'jawaban' => 'Tersedia SP namun tidak
                        memenuhi 14 komponen.'
                    ],
                    [
                        'value' => 2,
                        'jawaban' => 'Tersedia SP yang memenuhi
                        14 komponen.'
                    ],
                    [
                        'value' => 3,
                        'jawaban' => 'Tersedia SP yang memenuhi
                        14 komponen dan dilakukan
                        penetapan.'
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'Tersedia SP yang memenuhi
                        14 komponen, melibatkan
                        masyarakat dalam
                        penyusunan SP, dan
                        dilakukan penetapan.'
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'Tersedia SP yang memenuhi
                        14 komponen, melibatkan
                        masyarakat dalam
                        penyusunan SP, dilakukan
                        penetapan, dan dilakukan
                        monev.'
                    ],
                ],
            ],
            [
                'indikator' => 'Proses penyusunan dan
                perubahan SP telah
                melibatkan unsur
                masyarakat.',
                'jenis' => 'B',
                'kategori_id' => 1,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Penyusunan SP tanpa
                        melibatkan unsur masyarakat
                        dan pihak terkait
                        (stakeholder).'
                    ],
                    [
                        'value' => 1,
                        'jawaban' => 'Penyusunan SP telah
                        melibatkan minimal 1 unsur
                        masyarakat.'
                    ],
                    [
                        'value' => 2,
                        'jawaban' => 'Penyusunan SP telah
                        melibatkan minimal 2 unsur
                        masyarakat.
                        '
                    ],
                    [
                        'value' => 3,
                        'jawaban' => 'Penyusunan SP telah
                        melibatkan minimal 3 unsur
                        masyarakat.'
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'Penyusunan SP telah
                        melibatkan minimal 4 unsur
                        masyarakat.
                        '
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'Penyusunan SP telah
                        melibatkan lebih dari 4 unsur
                        masyarakat.
                        '
                    ],
                ],
            ],
            [
                'indikator' => 'Jumlah media publikasi
                untuk komponen
                service delivery',
                'jenis' => 'B',
                'kategori_id' => 1,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Tidak ada publikasi SP.'
                    ],
                    [
                        'value' => 1,
                        'jawaban' => 'Tersedia publikasi SP hanya
                        sebagian dari komponen service
                        delivery baik pada media
                        cetak/non elektronik maupun
                        media elektronik.'
                    ],
                    [
                        'value' => 2,
                        'jawaban' => 'Tersedia publikasi SP seluruh
                        komponen service delivery pada
                        2 atau lebih media publikasi
                        namun belum dipublikasikan
                        pada SIPP Nasional.'
                    ],
                    [
                        'value' => 3,
                        'jawaban' => 'Tersedia publikasi SP seluruh
                        komponen service delivery pada
                        2 media publikasi dan pada
                        SIPP Nasional.'
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'Tersedia publikasi SP seluruh
                        komponen service delivery pada
                        3 media publikasi dan pada
                        SIPP Nasional.'
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'Tersedia publikasi SP seluruh
                        komponen service delivery pada
                        4 atau lebih media publikasi
                        dan pada SIPP Nasional.'
                    ],
                ],
            ],
            [
                'indikator' => 'Pemenuhan siklus
                Maklumat Pelayanan
                (ketersediaan,
                penetapan, dan
                publikasi)
                ',
                'jenis' => 'B',
                'kategori_id' => 1,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Tidak tersedia Maklumat
                        Pelayanan.'
                    ],
                    [
                        'value' => 1,
                        'jawaban' => 'Tersedia Maklumat Pelayanan
                        namun belum ditetapkan.'
                    ],
                    [
                        'value' => 2,
                        'jawaban' => 'Tersedia Maklumat Pelayanan
                        yang sudah ditetapkan
                        namun isinya belum sesuai
                        dengan peraturan
                        perundangan yang berlaku'
                    ],
                    [
                        'value' => 3,
                        'jawaban' => 'Tersedia Maklumat Pelayanan
                        yang sudah ditetapkan dan
                        isinya telah sesuai dengan
                        peraturan perundangan yang
                        berlaku.'
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'Tersedia Maklumat Pelayanan
                        yang sudah ditetapkan, isinya
                        telah sesuai dengan
                        peraturan perundangan yang
                        berlaku, dan dipublikasikan
                        pada media non elektronik.'
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'Tersedia Maklumat Pelayanan
                        yang sudah ditetapkan, isinya
                        telah sesuai dengan
                        peraturan perundangan yang
                        berlaku, dan dipublikasikan
                        pada media non elektronik
                        dan elektronik.
                        '
                    ],
                ],
            ],
            [
                'indikator' => 'SKM yang dilaksanakan
                sesuai dengan
                PermenPANRB',
                'jenis' => 'B',
                'kategori_id' => 1,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Belum melaksanakan SKM.'
                    ],
                    [
                        'value' => 1,
                        'jawaban' => 'Sudah melaksanakan SKM
                        namun tidak sesuai dengan
                        PermenPANRB yang berlaku'
                    ],
                    [
                        'value' => 2,
                        'jawaban' => 'Sudah melaksanakan SKM
                        sesuai dengan PermenPANRB
                        yang berlaku.'
                    ],
                    [
                        'value' => 3,
                        'jawaban' => 'Sudah melaksanakan SKM
                        sesuai dengan PermenPANRB
                        yang berlaku dan dipublikasikan
                        pada media non-elektronik.'
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'Sudah melaksanakan SKM
                        sesuai dengan PermenPANRB
                        yang berlaku dan dipublikasikan
                        pada media non-elektronik dan
                        elektronik.'
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'Sudah melaksanakan SKM
                        sesuai dengan PermenPANRB
                        yang berlaku dan dipublikasikan
                        pada media non-elektronik dan
                        elektronik serta dilakukan
                        tindak lanjut hasil SKM.'
                    ],
                ],
            ],
            [
                'indikator' => 'Jumlah media publikasi
                hasil SKM.',
                'jenis' => 'B',
                'kategori_id' => 1,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Tidak dipublikasikan'
                    ],
                    [
                        'value' => 1,
                        'jawaban' => 'SKM dipublikasikan pada 1
                        (satu) media publikasi.'
                    ],
                    [
                        'value' => 2,
                        'jawaban' => 'SKM dipublikasikan pada 2
                        (dua) media publikasi.'
                    ],
                    [
                        'value' => 3,
                        'jawaban' => 'SKM dipublikasikan pada 3 (tiga)
                        media publikasi.'
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'SKM dipublikasikan pada 4
                        (empat) media publikasi.'
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'SKM dipublikasikan pada lebih
                        dari 4 (empat) media publikasi
                        lainnya.'
                    ],
                ],
            ],
            [
                'indikator' => 'Persentase rencana
                tindak lanjut hasil SKM
                yang telah selesai
                ditindaklanjuti ',
                'jenis' => 'B',
                'kategori_id' => 1,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Tidak ada rencana tindak lanjut
                        SKM.'
                    ],
                    [
                        'value' => 1,
                        'jawaban' => 'Ada rencana tindak lanjut tapi
                        belum dilaksanakan.'
                    ],
                    [
                        'value' => 2,
                        'jawaban' => 'Tindak lanjut hasil SKM
                        dilaksanakan kurang dari 30%,
                        dibuktikan dengan laporan
                        pelaksanaannya.'
                    ],
                    [
                        'value' => 3,
                        'jawaban' => 'Tindak lanjut hasil SKM
                        dilaksanakan 30-80%,
                        dibuktikan dengan laporan
                        pelaksanaannya.'
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'Tindak lanjut hasil SKM
                        dilaksanakan lebih dari 80%,
                        dibuktikan dengan laporan
                        pelaksanaannya.'
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'Tindak lanjut hasil SKM
                        dilaksanakan 100%, dibuktikan'
                    ],
                ],
            ],
            [
                'indikator' => 'Kecepatan tindak lanjut
                hasil SKM seluruh jenis
                pelayanan
                ',
                'jenis' => 'B',
                'kategori_id' => 1,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Rekomendasi hasil SKM tidak
                        ditindaklanjuti.
                        '
                    ],
                    [
                        'value' => 1,
                        'jawaban' => 'Rekomendasi hasil SKM
                        ditindaklanjuti seluruhnya 1
                        tahun setelah laporan SKM
                        diterbitkan.'
                    ],
                    [
                        'value' => 2,
                        'jawaban' => 'Rekomendasi hasil SKM
                        ditindaklanjuti seluruhnya 9
                        bulan setelah laporan SKM
                        diterbitkan'
                    ],
                    [
                        'value' => 3,
                        'jawaban' => 'Rekomendasi hasil SKM
                        ditindaklanjuti seluruhnya 6
                        bulan setelah laporan SKM
                        diterbitkan.'
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'Rekomendasi hasil SKM
                        ditindaklanjuti seluruhnya 3
                        bulan setelah laporan SKM
                        diterbitkan.'
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'Rekomendasi hasil SKM
                        ditindaklanjuti seluruhnya 1
                        bulan setelah laporan SKM
                        diterbitkan.'
                    ],
                ],
            ],
            [
                'indikator' => 'Tersedia waktu
                pelayanan yang
                memudahkan
                pengguna layanan.',
                'jenis' => 'B',
                'kategori_id' => 2,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Tidak tersedia bentuk waktu
                        yang memudahkan pengguna
                        layanan.'
                    ],
                    [
                        'value' => 1,
                        'jawaban' => 'Tersedia 1 bentuk waktu yang
                        memudahkan pengguna
                        layanan.'
                    ],
                    [
                        'value' => 2,
                        'jawaban' => 'Tersedia 2 bentuk waktu yang
                        memudahkan pengguna
                        layanan.'
                    ],
                    [
                        'value' => 3,
                        'jawaban' => 'Tersedia 3 bentuk waktu yang
                        memudahkan pengguna
                        layanan'
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'Tersedia 4 bentuk waktu yang
                        memudahkan pengguna
                        layanan.'
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'Tersedia lebih dari 4 bentuk
                        waktu yang memudahkan
                        pengguna layanan.'
                    ],
                ],
            ],
            [
                'indikator' => 'Tersedia Kode Etik dan
                Kode Perilaku Pelaksana dan/atau Budaya
                Pelayanan di lingkungan
                instansi.',
                'jenis' => 'B',
                'kategori_id' => 2,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Tidak tersedia aturan kode
                        etik dan kode perilaku.'
                    ],
                    [
                        'value' => 1,
                        'jawaban' => 'Aturan kode etik dan kode
                        perilaku Pelaksana Pelayanan
                        hanya meliputi nilai dasar
                        hak dan kewajiban.'
                    ],
                    [
                        'value' => 2,
                        'jawaban' => 'Aturan kode etik dan kode
                        perilaku Pelaksana Pelayanan
                        meliputi nilai dasar hak
                        kewajiban dan 1 (satu) unsur
                        lainnya.'
                    ],
                    [
                        'value' => 3,
                        'jawaban' => 'Aturan kode etik dan kode
                        perilaku Pelaksana Pelayanan
                        meliputi nilai dasar hak dan
                        kewajiban dan 2 (dua) unsur
                        lainnya.
                        '
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'Aturan kode etik dan kode
                        perilaku Pelaksana Pelayanan
                        meliputi nilai dasar hak dan
                        kewajiban dan 3 (tiga) unsur
                        lainnya.'
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'Aturan kode etik dan kode
                        perilaku Pelaksana Pelayanan
                        meliputi nilai dasar hak dan
                        kewajiban dan 4 (empat)
                        unsur lainnya.'
                    ],
                ],
            ],
            [
                'indikator' => 'Tersedia mekanisme
                unit kerja yang
                dibangun untuk
                menjaga dan
                meningkatkan motivasi
                kerja Pelaksana
                pelayanan
                ',
                'jenis' => 'B',
                'kategori_id' => 2,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Tidak tersedia mekanisme
                        peningkatan motivasi kerja'
                    ],
                    [
                        'value' => 1,
                        'jawaban' => 'Tersedia 1 jenis mekanisme
                        peningkatan motivasi kerja'
                    ],
                    [
                        'value' => 2,
                        'jawaban' => 'Tersedia 2 jenis mekanisme
                        peningkatan motivasi kerja'
                    ],
                    [
                        'value' => 3,
                        'jawaban' => 'Tersedia 3 jenis mekanisme
                        peningkatan motivasi kerja'
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'Tersedia 4 jenis mekanisme
                        peningkatan motivasi kerja'
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'Tersedia lebih dari 4 jenis
                        mekanisme peningkatan
                        motivasi kerja'
                    ],
                ],
            ],
            [
                'indikator' => 'Tersedia kriteria
                pemberian penghargaan
                bagi pegawai yang
                berprestasi.',
                'jenis' => 'B',
                'kategori_id' => 2,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Tidak ada pemberian
                        penghargaan.'
                    ],
                    [
                        'value' => 1,
                        'jawaban' => 'Ada pemberian penghargaan
                        hanya berdasarkan 1-2 unsur
                        kecuali kinerja.'
                    ],
                    [
                        'value' => 2,
                        'jawaban' => 'Ada pemberian penghargaan
                        berdasarkan 3-5 unsur kecuali
                        kinerja.
                        '
                    ],
                    [
                        'value' => 3,
                        'jawaban' => 'Ada pemberian penghargaan
                        berdasarkan 1-2 unsur
                        termasuk kinerja.'
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'Ada pemberian penghargaan
                        berdasarkan 3-4 unsur
                        termasuk kinerja'
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'Ada pemberian penghargaan
                        berdasarkan 5-6 unsur
                        termasuk kinerja.'
                    ],
                ],
            ],
            [
                'indikator' => 'Tersedia pelaksana
                yang menerapkan
                budaya pelayanan
                ',
                'jenis' => 'B',
                'kategori_id' => 2,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Tidak menerapkan budaya
                        layanan.'
                    ],
                    [
                        'value' => 1,
                        'jawaban' => 'Pelaksana pelayanan
                        menerapkan 1 (satu) unsur
                        budaya pelayanan.'
                    ],
                    [
                        'value' => 2,
                        'jawaban' => 'Pelaksana pelayanan
                        menerapkan 2 (dua) unsur
                        budaya pelayanan'
                    ],
                    [
                        'value' => 3,
                        'jawaban' => 'Pelaksana pelayanan
                        menerapkan 3 (tiga) unsur
                        budaya pelayanan.'
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'Pelaksana pelayanan
                        menerapkan 4 (empat) unsur
                        budaya pelayanan.
                        '
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'Pelaksana pelayanan
                        menerapkan 5 (lima) unsur
                        budaya pelayanan.'
                    ],
                ],
            ],
            [
                'indikator' => 'Tersedia layanan
                elektronik yang mudah
                diakses
                ',
                'jenis' => 'B',
                'kategori_id' => 3,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Layanan elektronik yang tidak
                        mudah diakses.'
                    ],
                    [
                        'value' => 1,
                        'jawaban' => 'Tersedia layanan elektronik
                        dengan 1 kondisi.'
                    ],
                    [
                        'value' => 2,
                        'jawaban' => 'Tersedia layanan elektronik
                        dengan 2 kondisi.'
                    ],
                    [
                        'value' => 3,
                        'jawaban' => 'Tersedia layanan elektronik
                        dengan 3 kondisi.'
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'Tersedia layanan elektronik
                        dengan 4 kondisi.'
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'Tersedia layanan elektronik
                        dengan lebih dari 4 kondisi.'
                    ],
                ],
            ],
            [
                'indikator' => 'Tersedia layanan
                elektronik yang
                memudahkan interaksi
                antara penyedia dengan
                pengguna layanan',
                'jenis' => 'B',
                'kategori_id' => 3,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Tidak tersedia fasilitas apapun.'
                    ],
                    [
                        'value' => 1,
                        'jawaban' => 'Tersedia fasilitas wajib.'
                    ],
                    [
                        'value' => 2,
                        'jawaban' => 'Tersedia fasilitas wajib dan 1
                        fasilitas pelengkap.'
                    ],
                    [
                        'value' => 3,
                        'jawaban' => 'Tersedia fasilitas wajib dan 2
                        fasilitas pelengkap.
                        '
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'Tersedia fasilitas wajib dan 3
                        fasilitas pelengkap.'
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'Tersedia fasilitas wajib dan 4
                        atau lebih fasilitas pelengkap.'
                    ],
                ],
            ],
            [
                'indikator' => 'Tersedia fitur
                keamanan pada
                layanan elektronik',
                'jenis' => 'B',
                'kategori_id' => 3,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Tidak tersedia fitur
                        keamanan pada layanan
                        elektronik.'
                    ],
                    [
                        'value' => 1,
                        'jawaban' => 'Memiliki 1 fitur keamanan
                        pada layanan elektronik.'
                    ],
                    [
                        'value' => 2,
                        'jawaban' => 'Memiliki 2 fitur keamanan
                        pada layanan elektronik.'
                    ],
                    [
                        'value' => 3,
                        'jawaban' => 'Memiliki 3 fitur keamanan
                        pada layanan elektronik.
                        '
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'Memiliki 4 fitur keamanan
                        pada layanan elektronik.'
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'Memiliki lebih dari 4 fitur
                        keamanan pada layanan
                        elektronik.'
                    ],
                ],
            ],
            [
                'indikator' => 'Tersedia Layanan
                Elektronik yang secara visual memudahkan
                pengguna layanan',
                'jenis' => 'B',
                'kategori_id' => 3,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Tidak tersedia Layanan
                        Elektronik yang secara visual memudahkan pengguna
                        layanan'
                    ],
                    [
                        'value' => 1,
                        'jawaban' => 'tersedia Layanan Elektronik
                        yang secara visual
                        memudahkan pengguna
                        layanan yang memenuhi 1
                        unsur'
                    ],
                    [
                        'value' => 2,
                        'jawaban' => 'tersedia Layanan Elektronik
                        yang secara visual
                        memudahkan pengguna
                        layanan yang memenuhi 2
                        unsur'
                    ],
                    [
                        'value' => 3,
                        'jawaban' => 'tersedia Layanan Elektronik
                        yang secara visual
                        memudahkan pengguna
                        layanan yang memenuhi 3
                        unsur'
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'tersedia Layanan Elektronik
                        yang secara visual
                        memudahkan pengguna
                        layanan yang memenuhi 4
                        unsur'
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'tersedia Layanan Elektronik
                        yang secara visual
                        memudahkan pengguna
                        layanan yang memenuhi lebih
                        dari 4 unsur'
                    ],
                ],
            ],
            [
                'indikator' => 'Tersedia layanan daring
                pendukung yang
                memanfaatkan media
                elektronik lainnya di
                luar situs dan aplikasi
                ',
                'jenis' => 'B',
                'kategori_id' => 3,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Tidak tersedia layanan daring
                        pendukung.'
                    ],
                    [
                        'value' => 1,
                        'jawaban' => '1 media elektronik.'
                    ],
                    [
                        'value' => 2,
                        'jawaban' => '2 media elektronik.'
                    ],
                    [
                        'value' => 3,
                        'jawaban' => '3 media elektronik.'
                    ],
                    [
                        'value' => 4,
                        'jawaban' => '4 media elektronik.'
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'lebih dari 4 media elektronik.'
                    ],
                ],
            ],
            [
                'indikator' => 'Tersedia penyimpanan
                data yang membantu
                aktivitas pengguna
                layanan
                ',
                'jenis' => 'B',
                'kategori_id' => 3,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Tidak disediakan'
                    ],
                    [
                        'value' => 1,
                        'jawaban' => 'Menggunakan penyimpanan
                        data yang tidak berbayar'
                    ],
                    [
                        'value' => 2,
                        'jawaban' => 'Memanfaatkan penyimpanan
                        data bersama'
                    ],
                    [
                        'value' => 3,
                        'jawaban' => 'Menggunakan/menyewa
                        penyimpanan data dengan
                        pihak ketiga'
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'Hanya menggunakan
                        penyimpanan data dengan
                        server sendiri namun tidak
                        memanfaatkan backup di
                        cloud'
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'Menggunakan penyimpanan
                        data dengan server sendiri dan
                        memanfaatkan backup di
                        cloud'
                    ],
                ],
            ],
            [
                'indikator' => 'Tersedia sistem
                informasi pelayanan
                publik untuk informasi
                publik.',
                'jenis' => 'B',
                'kategori_id' => 4,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Tidak tersedia sistem informasi
                        pelayanan publik baik elektronik
                        maupun nonelektronik.'
                    ],
                    [
                        'value' => 1,
                        'jawaban' => 'Tersedia sistem informasi
                        pelayanan publik non elektronik
                        melalui media lisan (pusat
                        informasi).'
                    ],
                    [
                        'value' => 2,
                        'jawaban' => 'Tersedia sistem informasi
                        pelayanan publik non elektronik
                        melalui media lisan (pusat
                        informasi) serta media papan
                        pengumuman dan media cetak.'
                    ],
                    [
                        'value' => 3,
                        'jawaban' => 'Tersedia Sistem informasi
                        pelayanan publik elektronik
                        namun belum online (e-kiosk/
                        display TV/ layar monitor).'
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'Tersedia Sistem informasi
                        pelayanan publik berbasis
                        online/website.'
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'Sistem informasi pelayanan
                        publik telah online/website dan
                        terhubung dengan sistem
                        informasi pelayanan publik
                        nasional serta telah menginput
                        layanan yang ditetapkan ke dalam
                        sistem informasi pelayanan publik
                        nasional.'
                    ],
                ],
            ],
            [
                'indikator' => 'Tersedia sistem
                informasi pelayanan
                publik pendukung
                operasional pelayanan.',
                'jenis' => 'B',
                'kategori_id' => 4,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Tidak tersedia sistem informasi
                        pendukung operasional
                        pelayanan publik.'
                    ],
                    [
                        'value' => 1,
                        'jawaban' => 'SIPP didukung dengan sistem
                        informasi yang minimal
                        memenuhi unsur data
                        pendukung pelayanan (standar
                        pelayanan).
                        '
                    ],
                    [
                        'value' => 2,
                        'jawaban' => 'SIPP didukung dengan sistem
                        informasi yang minimal
                        memenuhi unsur data
                        pendukung pelayanan (standar
                        pelayanan) dan pengelolaan
                        pengaduan SP4N-LAPOR.'
                    ],
                    [
                        'value' => 3,
                        'jawaban' => 'SIPP didukung dengan sistem
                        informasi yang minimal
                        memenuhi unsur data
                        pendukung pelayanan (standar
                        pelayanan), pengelolaan
                        pengaduan SP4N-LAPOR, dan
                        survey kepuasan masyarakat.'
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'SIPP didukung dengan sistem
                        informasi yang minimal
                        memenuhi unsur data
                        pendukung pelayanan (standar
                        pelayanan), pengelolaan
                        pengaduan SP4N-LAPOR, survey
                        kepuasan masyarakat, dan
                        penilaian kinerja pemberi
                        pelayanan.'
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'SIPP didukung dengan sistem
                        informasi yang minimal
                        memenuhi unsur data
                        pendukung pelayanan (standar
                        pelayanan), pengelolaan
                        pengaduan SP4N-LAPOR, survey
                        kepuasan masyarakat, pemberi
                        kinerja pelayanan, FAQ
                        dan/atau pengelolaan keuangan
                        pelayanan publik bagi layanan
                        berbayar, atau unsur
                        pendukung lainnya.'
                    ],
                ],
            ],
            [
                'indikator' => 'Kualitas penggunaan
                SIPP Elektronik
                (Website/Aplikasi).
                ',
                'jenis' => 'B',
                'kategori_id' => 4,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'SIPP Elektronik tidak terhubung
                        secara daring.'
                    ],
                    [
                        'value' => 1,
                        'jawaban' => 'SIPP Elektronik berbasis
                        website/aplikasi mudah
                        dioperasikan.'
                    ],
                    [
                        'value' => 2,
                        'jawaban' => '2. SIPP Elektronik berbasis
                        website/aplikasi mudah
                        dioperasikan, mudah diakses'
                    ],
                    [
                        'value' => 3,
                        'jawaban' => '3. SIPP Elektronik berbasis
                        website/aplikasi mudah
                        dioperasikan, mudah diakses,
                        kompatibel.'
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'SIPP Elektronik berbasis
                        website/aplikasi yang mudah
                        dioperasikan, mudah diakses,
                        kompatibel, merupakan kanal
                        digital resmi pemerintah
                        (domain.go.id).'
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'SIPP Elektronik berbasis
                        website/aplikasi yang mudah
                        dioperasikan, mudah diakses,
                        kompatibel, merupakan kanal
                        digital resmi pemerintah
                        (domain.go.id) dan navigasi yang
                        mudah dipahami.'
                    ],
                ],
            ],
            [
                'indikator' => 'Pemutakhiran data dan
                informasi kanal digital.
                ',
                'jenis' => 'B',
                'kategori_id' => 4,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Tersedia data dan informasi
                        pelayanan publik yang tidak
                        dimutakhirkan. '
                    ],
                    [
                        'value' => 1,
                        'jawaban' => 'Pemutakhiran data dan informasi
                        pelayanan publik telah dilakukan
                        secara tahunan.'
                    ],
                    [
                        'value' => 2,
                        'jawaban' => 'Pemutakhiran data dan informasi
                        pelayanan publik telah dilakukan
                        secara semesteran'
                    ],
                    [
                        'value' => 3,
                        'jawaban' => 'Pemutakhiran data dan informasi
                        pelayanan publik secara bulanan.'
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'Pemutakhiran data dan informasi
                        pelayanan publik dilakukan
                        secara mingguan.'
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'Pemutakhiran data dan informasi
                        pelayanan publik dilakukan secara harian dan detail/sangat
                        lengkap.'
                    ],
                ],
            ],
            [
                'indikator' => 'Tersedia media
                konsultasi dan
                pengaduan secara
                daring',
                'jenis' => 'B',
                'kategori_id' => 5,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Tidak tersedia media konsultasi
                        dan pengaduan pengguna
                        layanan.'
                    ],
                    [
                        'value' => 1,
                        'jawaban' => 'Tersedia 1 jenis media
                        konsultasi dan pengaduan
                        pengguna layanan.'
                    ],
                    [
                        'value' => 2,
                        'jawaban' => 'Tersedia 2 jenis media
                        konsultasi dan pengaduan
                        pengguna layanan'
                    ],
                    [
                        'value' => 3,
                        'jawaban' => 'Tersedia 3 jenis media
                        konsultasi dan pengaduan
                        pengguna layanan'
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'Tersedia 4 jenis media
                        konsultasi dan pengaduan
                        pengguna layanan
                        '
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'Tersedia lebih dari 4 jenis media
                        konsultasi dan pengaduan
                        pengguna layanan'
                    ],
                ],
            ],
            [
                'indikator' => 'Kecepatan respon
                konsultasi dan
                pengaduan ',
                'jenis' => 'B',
                'kategori_id' => 5,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Respon terhadap konsultasi dan
                        pengaduan lebih dari 14 x 24
                        jam.'
                    ],
                    [
                        'value' => 1,
                        'jawaban' => 'Respon terhadap konsultasi dan
                        pengaduan 14x24 jam atau lebih
                        cepat.'
                    ],
                    [
                        'value' => 2,
                        'jawaban' => 'Respon terhadap konsultasi dan
                        pengaduan 7x24 jam atau lebih
                        cepat.
                        '
                    ],
                    [
                        'value' => 3,
                        'jawaban' => 'Respon terhadap konsultasi dan
                        pengaduan 5x24 jam atau lebih
                        cepat.'
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'Respon terhadap konsultasi dan
                        pengaduan 3x24 jam atau lebih
                        cepat.'
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'Respon terhadap konsultasi dan
                        pengaduan 1x24 jam atau lebih
                        cepat.'
                    ],
                ],
            ],
            [
                'indikator' => 'Tersedia akuntabilitas
                hasil konsultasi
                dan/atau pengaduan.
                ',
                'jenis' => 'B',
                'kategori_id' => 5,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Tidak ada dokumentasi.
                        '
                    ],
                    [
                        'value' => 1,
                        'jawaban' => 'Terdapat dokumentasi yang
                        diarsipkan.'
                    ],
                    [
                        'value' => 2,
                        'jawaban' => 'Terdapat dokumentasi yang
                        diarsipkan dan dituangkan
                        dalam laporan.
                        '
                    ],
                    [
                        'value' => 3,
                        'jawaban' => 'Terdapat dokumentasi
                        diarsipkan, dituangkan dalam
                        laporan, dan dilakukan monev.'
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'Terdapat dokumentasi
                        diarsipkan, dituangkan dalam
                        laporan, dilakukan monev, dan
                        ditindaklanjuti.'
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'Terdapat dokumentasi
                        diarsipkan, dituangkan dalam
                        laporan, dilakukan monev,
                        ditindaklanjuti, dan
                        dipublikasikan.'
                    ],
                ],
            ],
            [
                'indikator' => 'Tersedia tindak lanjut
                atas konsultasi dan
                pengaduan dari semua
                lapisan masyarakat.',
                'jenis' => 'B',
                'kategori_id' => 5,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Tidak ada konsultasi atau
                        pengaduan yang ditindaklanjuti.
                        '
                    ],
                    [
                        'value' => 1,
                        'jawaban' => '< 50% konsultasi atau
                        pengaduan ditindaklanjuti
                        hingga selesai yang tidak
                        menggunakan SP4N-LAPOR!.'
                    ],
                    [
                        'value' => 2,
                        'jawaban' => '≥ 50% konsultasi atau
                        pengaduan ditindaklanjuti
                        hingga selesai yang tidak
                        menggunakan SP4N-LAPOR!.
                        '
                    ],
                    [
                        'value' => 3,
                        'jawaban' => '< 50% konsultasi atau
                        pengaduan yang masuk ke
                        SP4N-LAPOR! dan
                        ditindaklanjuti hingga selesai.'
                    ],
                    [
                        'value' => 4,
                        'jawaban' => '≥ 50% - 90% konsultasi atau
                        pengaduan yang masuk ke
                        SP4N-LAPOR! dan
                        ditindaklanjuti hingga selesai.'
                    ],
                    [
                        'value' => 5,
                        'jawaban' => '≥ 90% konsultasi atau
                        pengaduan yang masuk ke
                        SP4N-LAPOR! dan
                        ditindaklanjuti hingga selesai.'
                    ],
                ],
            ],
            [
                'indikator' => 'Penciptaan Inovasi
                Pelayanan Publik.
                ',
                'jenis' => 'B',
                'kategori_id' => 6,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Tidak tersedia inovasi.
                        '
                    ],
                    [
                        'value' => 1,
                        'jawaban' => 'Belum ada inovasi, masih dalam
                        proses pembelajaran berinovasi.'
                    ],
                    [
                        'value' => 2,
                        'jawaban' => 'Sudah ada inovasi namun
                        kurang dari 1 tahun.'
                    ],
                    [
                        'value' => 3,
                        'jawaban' => 'Sudah ada inovasi lebih dari 1
                        tahun namun belum
                        diikutsertakan dalam kompetisi
                        (level apapun).'
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'Sudah ada inovasi lebih dari 1
                        tahun dan sudah diikutsertakan
                        dalam kompetisi level apapun.'
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'Inovasi yang dilaksanakan sudah
                        mendapatkan prestasi pada level
                        (apapun).'
                    ],
                ],
            ],
            [
                'indikator' => 'Sumber daya yang
                mendukung
                keberlanjutan Inovasi
                Pelayanan Publik.
                ',
                'jenis' => 'B',
                'kategori_id' => 6,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Belum ada sumber daya yang
                        mendukung keberlanjutan
                        inovasi.'
                    ],
                    [
                        'value' => 1,
                        'jawaban' => 'Sumber daya yang mendukung
                        keberlanjutan inovasi dalam
                        bentuk rancangan payung
                        hukum'
                    ],
                    [
                        'value' => 2,
                        'jawaban' => 'Sumber daya yang mendukung
                        keberlanjutan inovasi dalam
                        bentuk payung hukum'
                    ],
                    [
                        'value' => 3,
                        'jawaban' => 'Sumber daya yang mendukung
                        keberlanjutan inovasi dalam
                        bentuk payung hukum dan 1
                        kondisi lainnya'
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'Sumber daya yang mendukung
                        keberlanjutan inovasi dalam
                        bentuk payung hukum dan 2
                        kondisi lainnya.'
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'Sumber daya yang mendukung
                        keberlanjutan inovasi dalam
                        bentuk payung hukum dan 3
                        kondisi lainnya.'
                    ],
                ],
            ],
            [
                'indikator' => 'Tersedia sistem antrian
                untuk menunjang
                pelayanan.',
                'jenis' => 'B',
                'kategori_id' => 7,
                'detail' => [
                    [
                        'value' => 0,
                        'jawaban' => 'Tidak tersedia sistem antrian.'
                    ],
                    [
                        'value' => 1,
                        'jawaban' => 'Tersedia sistem antrian dengan 1
                        fasilitas.'
                    ],
                    [
                        'value' => 2,
                        'jawaban' => 'Tersedia sistem antrian dengan 2
                        fasilitas.'
                    ],
                    [
                        'value' => 3,
                        'jawaban' => 'Tersedia sistem antrian dengan 3
                        fasilitas.'
                    ],
                    [
                        'value' => 4,
                        'jawaban' => 'Tersedia sistem antrian dengan 4
                        fasilitas.'
                    ],
                    [
                        'value' => 5,
                        'jawaban' => 'Tersedia sistem antrian dengan
                        lebih dari 4 fasilitas.'
                    ],
                ],
            ],
        ];

        foreach ($data as $item) {
            $master_f02 = MasterF02::create([
                'indikator' => $item['indikator'],
                'jenis' => $item['jenis'],
                'kategori_id' => $item['kategori_id'],
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            foreach ($item['detail'] as $detailItem) {
                $detail_master_f02 = DetailMasterF02::create([
                    'header_id' => $master_f02->id,
                    'value' => $detailItem['value'],
                    'jawaban' => $detailItem['jawaban'],
                    'created_by' => 1,
                    'updated_by' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}

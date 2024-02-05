<?php

return [

    'bulan' => [
        '1' => 'Januari',
        '2' => 'Februari',
        '3' => 'Mac',
        '4' => 'April',
        '5' => 'Mei',
        '6' => 'Jun',
        '7' => 'Julai',
        '8' => 'Ogos',
        '9' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Disember',
    ],

    'role' => [
        'modul' => [
            1 => 'SKPAK',
            2 => 'SPKS',
            3 => 'SKIPS',
            4 => 'iKEPS',
            5 => 'Admin',
        ],
        'pilihan_proses' => [
            1 => 'Pengurusan Pengguna',
            2 => 'Pentadbiran Sistem Dan Pengurusan Instrumen Peperiksaan Dan Pengisian',
            3 => 'Pengisian Data Pemeriksaan Dan Penilaian',
            4 => 'Modul Verifikasi Dan Validasi Data Pemeriksaan Dan Penilaian',
            5 => 'Laporan Penarafan / Muat Turun',
            6 => 'Analisa & Dashboard',
        ],
        'had_capaian' => [
            1 => 'Tambah Data',
            2 => 'Kemaskini Data',
            3 => 'Delete Data',
            4 => 'Lihat Sahaja',
        ],
        'jenis_peranan' => [
            1 => 'PPD',
            2 => 'JPN',
            3 => 'etc',
        ],
    ],

    'ikeps' => [
        'ada_tiada' => [
            1 => 'Ada',
            0 => 'Tiada',
        ],

        'gunasama' => [
            1 => 'Ya',
            0 => 'Tidak',
        ],

        'masih_digunakan' => [
            1 => 'Ya',
            0 => 'Tidak',
        ],

        'status_fizikal' => [
            1 => 'Selesa',
            2 => 'Tidak Selesa',
            3 => 'Kefungsian',
            4 => 'Sekuriti',
            5 => 'Keselamatan',
        ],

        'prasarana_sukan' => [
            'padang_sekolah' => [
                'title' => '2. Padang Sekolah',
                'main' => 'Padang Sekolah',
                'sub' => [
                    'kt_400' => '2.1 Keluasan Trek 400M',
                    'kt_300' => '2.2 Keluasan Trek 300M',
                    'kt_200' => '2.3 Keluasan Trek 200M',
                    'ktk_200' => '2.4 Keluasan Trek Kurang 200M',
                    'status_padang' => [
                        '1' => 'Hak Sekolah',
                        '0' => 'Tidak',
                    ],
                    'gred_padang' => [
                        'K' => 'Khas',
                        'A' => 'A',
                        'B' => 'B',
                        'C' => 'C',
                    ],
                ],
            ],
            'trek_sintetik' => [
                'title' => '3. Trek Sintetik',
                'main' => 'Trek Sintetik',
                'sub' => [
                    'trek_400' => '3.1 Trek 400M',
                    'trek_200' => '3.2 Trek 200M',
                    'trek_lain' => '3.3 Lain-lain',
                ],
            ],
            'astaka' => [
                'title' => '4. Astaka',
                'main' => 'Astaka',
                'sub' => [
                    'km_500' => '4.1 Kapasiti Melebihi 500',
                    'kk_500' => '4.1 Kapasiti Kurang 500',
                ],
            ],
            'dewan' => [
                'title' => '5. Dewan',
                'main' => 'Dewan',
                'sub' => [
                    'dewan_besar' => '5.1 Dewan Besar',
                    'dewan_khas' => '5.2 Dewan Khas Untuk Sukan',
                ],
            ],
            'bilik_sukan' => [
                'title' => '6. Bilik Peralatan Sukan (anggaran 1 kelas = 3 bay)',
                'main' => 'Bilik Peralatan Sukan',
                'sub' => [
                    'stor_1' => '6.1 Stor 1 Bay',
                    'stor_2' => '6.2 Stor 2 Bay',
                    'stor_3' => '6.3 Stor 3 Bay',
                ],
            ],
            'bilik_persalinan' => [
                'title' => '7. Bilik Persalinan',
                'main' => 'Bilik Persalinan',
                'sub' => [
                    'murid_lelaki' => '7.1 Murid Lelaki',
                    'murid_perempuan' => '7.2 Murid Perempuan',
                ],
            ],
            'gelanggang_serbaguna' => [
                'title' => '8. Gelanggang Serbaguna',
                'main' => 'Gelanggang Serbaguna',
                'sub' => [
                    'terbuka_berbumbung' => '8.1 Gelanggan Terbuka Berbumbung',
                    'terbuka' => '8.2 Gelanggan Terbuka',
                ],
            ],
            'bilik_kecergasan' => [
                'title' => '9. Bilik Kecergasan',
                'main' => 'Bilik Kecergasan',
            ],
            'makmal_sains' => [
                'title' => '10. Makmal Sains Sukan',
                'main' => 'Makmal Sains Sukan',
            ],
            'kolam_renang' => [
                'title' => '11. Kolam Renang',
                'main' => 'Kolam Renang',
            ],
        ],

        'kemudahan_sukan' => [
            'bola_sepak' => [
                'title' => '1. Padang Bola Sepak',
                'main' => 'Padang Bola Sepak',
                'sub' => [
                    'bs_saiz_standard' => '1.1 Saiz Padang Standard Pertandingan',
                    'bs_saiz_latihan' => '1.2 Saiz Padang Untuk Latihan Sahaja',
                ],
            ],
            'hoki' => [
                'title' => '2. Padang Hoki',
                'main' => 'Padang Hoki',
                'sub' => [
                    'hoki_saiz_standard' => '2.1 Saiz Padang Standard Pertandingan',
                    'hoki_saiz_latihan' => '2.2 Saiz Padang Untuk Latihan Sahaja',
                    'hoki_rumput_standard' => '2.2 Padang Rumput Standard Pertandingan',
                    'hoki_rumput_latihan' => '2.2 Padang Rumput Untuk Latihan Sahaja',
                ],
            ],
            'bola_jaring' => [
                'title' => '3. Bola Jaring',
                'main' => 'Bola Jaring',
                'sub' => [
                    'bj_dewan' => '3.1 Gelanggang Dalam Dewan',
                    'bj_berbumbung' => '3.2 Gelanggang Terbuka Berbumbung',
                    'bj_hardcourt' => '3.3 Gelanggang Terbuka (Hardcourt)',
                    'bj_berumput' => '3.4 Gelanggang Terbuka (Berumput)',
                ],
            ],
            'sepak_takraw' => [
                'title' => '4. Sepak Takraw',
                'main' => 'Sepak Takraw',
                'sub' => [
                    'st_dewan' => '4.1 Gelanggang Dalam Dewan',
                    'st_berbumbung' => '4.2 Gelanggang Terbuka Berbumbung',
                    'st_terbuka' => '4.3 Gelanggang Terbuka',
                ],
            ],
            'bola_tampar' => [
                'title' => '5. Bola Tampar',
                'main' => 'Bola Tampar',
                'sub' => [
                    'bt_dewan' => '5.1 Gelanggang Dalam Dewan',
                    'bt_berbumbung' => '5.2 Gelanggang Terbuka Berbumbung',
                    'bt_terbuka' => '5.3 Gelanggang Terbuka',
                ],
            ],
            'badminton' => [
                'title' => '6. Badminton',
                'main' => 'Badminton',
                'sub' => [
                    'badminton_dewan' => '6.1 Gelanggang Dalam Dewan',
                    'badminton_berbumbung' => '6.2 Gelanggang Terbuka Berbumbung',
                    'badminton_terbuka' => '6.3 Gelanggang Terbuka',
                ],
            ],
            'kriket' => [
                'title' => '7. Kriket',
                'main' => 'Kriket',
                'sub' => [
                    'kriket_standard' => '7.1 Saiz Padang Standard Pertandingan',
                    'kriket_latihan' => ' 7.2 Saiz Padang Untuk Latihan Sahaja',
                ],
            ],
            'tenis' => [
                'title' => '8. Tenis',
                'main' => 'Tenis',
                'sub' => [
                    'tenis_terbuka' => '8.1 Gelanggang Terbuka',
                ],
            ],
            'ping_pong' => [
                'title' => '9. Ping Pong',
                'main' => 'Ping Pong',
                'sub' => [
                    'pp_tertutup' => '9.1 Dalam Dewan Tertutup',
                    'pp_terbuka' => '9.2 Dewan Serbaguna Terbuka Berbumbung',
                ],
            ],
            'sofbol' => [
                'title' => '10. Sofbol',
                'main' => 'Sofbol',
                'sub' => [
                    'sofbol_standard' => '10.1 Saiz Padang Standard Pertandingan',
                    'sofbol_latihan' => '10.2 Saiz Padang Untuk Latihan Sahaja',
                ],
            ],
            'memanah' => [
                'title' => '11. Memanah',
                'main' => 'Memanah',
                'sub' => [
                    'memanah_standard' => '11.1 Lapang Sasar Standard Pertandingan',
                    'memanah_latihan' => '11.2 Lapang Sasar Untuk Latihan Sahaja',
                ],
            ],
            'skuasy' => [
                'title' => '12. Skuasy',
                'main' => 'Skuasy',
                'sub' => [
                    'skuasy_dewan' => '12.1 Gelanggang Dalam Dewan',
                ],
            ],
            'gimnastik_artistik' => [
                'title' => '13. Gimnastik Artistik',
                'main' => 'Gimnastik Artistik',
                'sub' => [
                    'ga_standard' => '13.1 Dewan Standard Pertandingan',
                    'ga_latihan' => '13.2 Dewan Untuk Latihan Sahaja',
                ],
            ],
            'gimnastik_berirama' => [
                'title' => '13. Gimnastik Berirama',
                'main' => 'Gimnastik Berirama',
                'sub' => [
                    'gb_standard' => '14.1 Dewan Standard Pertandingan',
                    'gb_latihan' => '14.2 Dewan Untuk Latihan Sahaja',
                ],
            ],
            'bola_baling' => [
                'title' => '15. Bola Baling',
                'main' => 'Bola Baling',
                'sub' => [
                    'bb_dewan' => '15.1 Gelanggang Dalam Dewan',
                    'bb_berbumbung' => '15.2 Gelanggang Terbuka Berbumbung',
                    'bb_hardcourt' => '15.3 Gelanggang Terbuka (Hardcourt)',
                    'bb_berumput' => '15.4 Gelanggang Terbuka (Berumput)',
                ],
            ],
            'bola_keranjang' => [
                'title' => '16. Bola Keranjang',
                'main' => 'Bola Keranjang',
                'sub' => [
                    'bk_dewan' => '16.1 Gelanggang Dalam Dewan',
                    'bk_berbumbung' => '16.2 Gelanggang Terbuka Berbumbung',
                    'bk_terbuka' => '16.3 Gelanggang Terbuka',
                ],
            ],
            'ragbi' => [
                'title' => '17. Ragbi',
                'main' => 'Ragbi',
                'sub' => [
                    'ragbi_standard' => '17.1 Saiz Padang Standard Pertandingan',
                    'ragbi_latihan' => '17.2 Saiz Padang Untuk Latihan Sahaja',
                ],
            ],
            'futsal' => [
                'title' => '18. Futsal',
                'main' => 'Futsal',
                'sub' => [
                    'futsal_dewan' => '18.1 Gelanggang Dalam Dewan',
                    'futsal_berbumbung' => '18.2 Gelanggang Terbuka Berbumbung',
                    'futsal_terbuka' => '18.3 Gelanggang Terbuka',
                ],
            ],
            'boling_tenpin' => [
                'title' => '19. Boling Tenpin',
                'main' => 'Boling Tenpin',
                'sub' => [
                    'bt_8' => '19.1 8 Lorong',
                    'bt_12' => '19.2 12 Lorong',
                    'bt_lain' => '19.3 Lain-lain Lorong',
                ],
            ],
            'lain' => [
                'title' => '20. Lain-Lain',
                'main' => 'Lain-Lain',
                'sub' => [
                    'lain_kemudahan' => '20.1 Lain-lain Kemudahan Sukan',
                ],
            ],
        ],

        'perancangan_sukan' => [
            'perancangan' => [
                'sukan_utama' => '1. Sukan Utama (Sekolah Berwatak dalam Sukan)',
                'inisiatif_sekolah' => '2. Inisiatif Sekolah Mewujudkan Program Pembangunan Bakat Sukan',
                'projek_msn' => '3. Projek Sukan Sekolah Dengan Majlis Sukan Negeri/ Majlis Sukan Negara (MSN)/ Kementerian Belia dan Sukan (KBS)/ atau Persatuan Sukan Kebangsaan',
                'projek_kpm' => '4. Projek/ Program Sukan Disekolah yang Dianjurkan oleh Kementerian Pendidikan Malaysia',
                'ladap' => '5. In House Training Pengurusan Sukan di Sekolah (Latihan Dalam Perkhidmatan LADAP)',
            ],
            'kursus' => [
                'pengurusan_sukan' => '6.1 Kursus Pengurusan Sukan',
                'kejurulatihan' => '6.2 Kursus Kejurulatihan',
                'kepegawaian' => '6.3 Kursus Kepegawaian',
                'sains_sukan' => '6.4 Kursus Sains Sukan'
            ],
        ],

        'status_penyertaan' => [
            'jenis_penyertaan' => [
                'zon',
                'daerah',
                'bahagian',
                'negeri',
                'kebangsaan',
                'antarabangsa',
            ],
        
            'sukan_mssm' => [
                'akuatik' => 'Akuatik',
                'badminton' => 'Badminton',
                'bola_baling' => 'Bola Baling',
                'bola_jaring' => 'Bola Jaring',
                'bola_keranjang' => 'Bola Keranjang',
                'bola_sepak' => 'Bola Sepak',
                'bola_tampar' => 'Bola Tampar',
                'boling_tenpin' => 'Boling Tenpin',
                'catur' => 'Catur',
                'gimnastik_artistik' => 'Gimnastik Artistik',
                'gimnastik_berirama' => 'Gimnastik Berirama',
                'golf' => 'Golf',
                'hoki' => 'Hoki',
                'kriket' => 'Kriket',
                'memanah' => 'Memanah',
                'merentas_desa' => 'Merentas Desa',
                'olahraga' => 'Olahraga',
                'pelayaran' => 'Pelayaran',
                'ping_pong' => 'Ping Pong',
                'ragbi' => 'Ragbi',
                'sepak_takraw' => 'Sepak Takraw',
                'skuasy' => 'Skuasy',
                'sofbol' => 'Sofbol',
                'tenis' => 'Tenis',
            ],

            'sukan_lain' => [
                'angkat_berat' => 'Angkat Berat',
                'ekuestrian' => 'Ekuestrian',
                'formula_future' => 'Formula Future',
                'futsal' => 'Futsal',
                'kabaddi' => 'Kabaddi',
                'lawn_bowl' => 'Lawn Bowl',
                'lumba_basikal' => 'Lumba Basikal',
                'menembak' => 'Menembak',
                'muay_thai' => 'Muay Thai',
                'petanque' => 'Petanque',
                'silambam' => 'Silambam',
                'silat_olahraga' => 'Silat Olahraga',
                'taekwondo' => 'Taekwondo',
                'tinju' => 'Tinju',
                'wushu' => 'Wushu',
                'lain_1' => 'Lain-Lain 1 (Sila Pilih)',
                'lain_2' => 'Lain-Lain 2 (Sila Pilih)',
                'lain_3' => 'Lain-Lain 3 (Sila Pilih)',
            ],
        ],

        'program_sekolah' => [
            'sukan_tahunan' => 'Kejohanan Olahraga Sekolah/ Sukan Tahunan Sekolah',
            'merentas_desa' => 'Kejohanan Merentas Desa',
            'sukantara' => 'Sukantara',
            'sukan_tahap_1' => 'Sukan Tahap 1',
            'sukan_pendidikan_khas' => 'Sukan Pendidikan Khas',
            'program_sukan' => 'Program Sukan/ Kecergasan',
            'anugerah_sukan' => 'Majlis Anugerah Sukan',
            'sukan_antara_rumah' => 'Pertandingan sukan antara rumah sukan sekolah',
            'sukan_antara_kelas' => 'Pertandingan sukan antara kelas',
            'sukan_antara_unit' => 'Pertandingan sukan antara Unit Sukan dan Permainan',
            'perlawanan_persahabatan' => 'Perlawanan Persahabatan dengan Sekolah / Pasukan lain',
            'sukan_mini' => 'Sukan Mini',
            'sukan_prasekolah' => 'Sukan Prasekolah',
            'klinik_sukan' => 'Klinik Sukan Sekolah 1Murid1Sukan',
            'hari_sukan' => 'Hari Sukan Negara',
            'lain' => 'Lain-Lain',
        ],

    ],

    'skips' => [
        'penubuhan_pendaftaran' => [
            'kelulusan_penubuhan' => '1.1 Surat Kelulusan Penubuhan',
            'perakuan_pendaftaran' => '1.2 Perakuan Pendaftaran',
            'permit_pengelola' => '1.3 Permit Pengelola',
            'permit_pekerja' => '1.4 Permit Pekerja',
            'kelulusan_pengetua' => '1.5 Surat Kelulusan Pengetua ',
            'permit_guru' => '1.6 Permit Guru',
            'suratcara_pengelola' => '1.7 Suratcara Pengelola',
            'yuran_dan_bayaran_lain' => '1.8 Yuran dan Bayaran Lain',
            'surat_surat_sokongan_agensi' => '1.9 Surat-surat Sokongan Agensi',
        ],
        'pengurusan_institusi' => [
            'piagam_pelanggan' => '2.1. Piagam Pelanggan',
            'visi_dan_misi' => '2.2. Visi dan Misi',
            'perancangan_strategik' => '2.3. Perancangan Strategik / Hala Tuju',
            'surat_surat_pelantikan' => '2.4 Surat Surat Perlantikan',
            'pelantikan_pengelola' => '2.4.1 Surat Pelantikan Pengelola',
            'pelantikan_pengetua_dan_kontrak_kerja' => '2.4.2 Surat Pelantikan Pengetua Dan Kontrak Kerja',
            'pelantikan_guru_dan_kontrak_kerja' => '2.4.3 Surat Pelantikan Guru Dan Kontrak Kerja',
            'pelantikan_pekerja_dan_kontrak_kerja' => '2.4.4 Surat Pelantikan Pekerja Dan Kontrak Kerja',
            'kebenaran_mengajar_guru_kerajaan' => '2.4.5 Surat Kebenaran Mengajar (Guru Kerajaan)',
            'rekod_profil' => '2.5 Rekod Profil',
            'profil_institusi' => '2.5.1 Profil Institusi',
            'profil_guru' => '2.5.2 Profil Guru',
            'profil_staf' => '2.5.3 Profil Staf',
            'profil_pelajar' => '2.5.4 Profil Pelajar',
            'pengurusan_rekod' => '2.6 Pengurusan Rekod',
            'rekod_pendaftaran_pelajar' => '2.6.1 Rekod Pendaftaran Pelajar',
            'rekod_sijil_tamat_belajar' => '2.6.2 Rekod Sijil Tamat Belajar',
            'rekod_kedatangan_pelajar' => '2.6.3 Rekod Kedatangan Pelajar',
            'rekod_kedatangan_guru' => '2.6.4 Rekod Kedatangan Guru',
            'rekod_pelawat' => '2.6.5 Rekod Pelawat',
            'takwim_tahunan' => '2.7. Takwim Tahunan Pusat Bahasa/Pusat Kemahiran',
            'perkhidmatan_pelanggan' => '2.8. Perkhidmatan Pelanggan',
            'paparan_untuk_makluman_umum' => '2.9. Paparan untuk Makluman Umum',
            'pengurusan_aduan' => '2.10 Pengurusan Aduan',
        ],
        'pengurusan_kurikulum' => [
            'sukatan_pelajaran' => '3.1 Sukatan Pelajaran',
            'dokumen_rekod_mengajar' => '3.2 Dokumen Rekod Mengajar',
            'mesyuarat_kurikulum' => '3.3 Mesyuarat Kurikulum',
            'mata_pelajaran_yang_diajar' => '3.4 Mata Pelajaran Yang Diajar',
            'bahan_bantu_mengajar' => '3.5 Bahan Bantu Mengajar',
            'rekod_pencerapan' => '3.6 Rekod Pencerapan',
        ],
        'pengajaran_pembelajaran' => [
            'pengajaran_dan_pembelajaran' => '4.1 Pengajaran Dan Pembelajaran',
            'kaedah_metodologi_pengajaran' => '4.2 Kaedah / Metodologi Pengajaran',
            'latihan' => '4.3 Latihan',
            'penggunaan_bahan_bantu_mengajar' => '4.4 Penggunaan Bahan Bantu Mengajar',
        ],
        'pengurusan_penilaian' => [
            'pelaksanaan_penilaian_peperiksaan' => '5.1 Pelaksanaan Penilaian / Peperiksaan',
            'rekod_penilaian_peperiksaan' => '5.2 Rekod Penilaian / Peperiksaan',
            'akreditasi_sijil_oleh_badan_antarabangsa' => '5.3 Akreditasi Sijil oleh Badan Antarabangsa',
        ],
    ],
];
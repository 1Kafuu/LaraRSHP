@extends('layouts.app')
@section('title', 'Rumah Sakit Hewan Pendidikan Universitas Airlangga')
@section('styles')
    <style>
        :root {
            --accent: #ffeb3b;
            --primary: #002984;
            --white: #ffffff;
            --light-gray: #f5f5f5;
            --dark-gray: #333333;
            --black: #000000;
        }

        * {
            text-align: left;
        }

        body {
            background-color: var(--white);
            color: var(--dark-gray);
        }

        .text-header {
            text-align: center;
            padding: 20px;
            font-size: 50px;
        }

        h2 {
            color: var(--primary);
            margin: 1.5rem 0 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid var(--accent);
        }

        h3 {
            color: var(--primary);
            margin: 1.2rem 0 0.8rem;
        }

        p {
            margin-bottom: 1rem;
        }

        .service-section {
            background-color: var(--light-gray);
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        ul {
            margin-left: 1.5rem;
            margin-bottom: 1rem;
        }

        li {
            margin-bottom: 0.5rem;
        }

        .highlight {
            background-color: var(--accent);
            padding: 0.2rem 0.5rem;
            border-radius: 4px;
            font-weight: bold;
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-top: 1rem;
        }

        .grid-item {
            background-color: var(--white);
            border-radius: 8px;
            padding: 1.2rem;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            border-left: 4px solid var(--primary);
        }


        @media (max-width: 768px) {
            .grid-container {
                grid-template-columns: 1fr;
            }

            h1 {
                font-size: 1.8rem;
            }
        }
    </style>
@endsection

    @section('content')
        <h1 class="text-header">Layanan Umum</h1>
        <section class="service-section">
            <h2>Poliklinik</h2>
            <p>Poliklinik adalah layanan rawat jalan dimana pelayanan kesehatan hewan dilakukan tanpa pasien menginap.
                Poliklinik melayani tindakan observasi, diagnosis, pengobatan, rehabilitasi medik, serta pelayanan
                kesehatan lainnya seperti permintaan surat keterangan sehat.</p>

            <p>Tindakan observasi dan diagnosis, juga bisa diteguhkan dengan berbagai macam pemeriksaan yang bisa kami
                lakukan, misalnya:</p>
            <ul>
                <li>Pemeriksaan sitologi</li>
                <li>Pemeriksaan dermatologi</li>
                <li>Pemeriksaan hematologi</li>
                <li>Pemeriksaan radiologi</li>
                <li>Pemeriksaan ultrasonografi</li>
                <li>Pemeriksaan elektrokardiografi</li>
            </ul>

            <p>Bilamana diperlukan pemeriksaan-pemeriksaan lain yang diperlukan seperti pemeriksaan kultur bakteri, atau
                pemeriksaan jaringan/histopatologi, dan lain-lain kami bekerja sama dengan Fakultas Kedokteran Hewan
                Universitas Airlangga untuk membantu melakukan pemeriksaan-pemeriksaan tersebut.</p>

            <p>Selain itu kami mempunyai <span class="highlight">rapid test</span> untuk pemeriksaan cepat, untuk
                meneguhkan diagnosa penyakit-penyakit berbahaya pada:</p>
            <ul>
                <li><strong>Kucing:</strong> panleukopenia, calicivirus, rhinotracheitis, FIP</li>
                <li><strong>Anjing:</strong> parvovirus, canine distemper</li>
            </ul>

            <h3>Layanan Kesehatan Hewan di Poliklinik</h3>
            <div class="grid-container">
                <div class="grid-item">
                    <h4>Rawat Jalan</h4>
                    <p>Layanan pemeriksaan dan pengobatan tanpa perlu menginap</p>
                </div>
                <div class="grid-item">
                    <h4>Vaksinasi</h4>
                    <p>Pemberian vaksin untuk mencegah penyakit menular</p>
                </div>
                <div class="grid-item">
                    <h4>Akupuntur</h4>
                    <p>Terapi alternatif untuk berbagai kondisi kesehatan</p>
                </div>
                <div class="grid-item">
                    <h4>Kemoterapi</h4>
                    <p>Pengobatan untuk hewan penderita kanker</p>
                </div>
                <div class="grid-item">
                    <h4>Fisioterapi</h4>
                    <p>Terapi fisik untuk pemulihan fungsi tubuh</p>
                </div>
                <div class="grid-item">
                    <h4>Mandi Terapi</h4>
                    <p>Perawatan kulit dan bulu dengan bahan khusus</p>
                </div>
            </div>
        </section>

        <section class="service-section">
            <h2>Rawat Inap</h2>
            <p>Rawat inap dilakukan pada pasien-pasien yang berat atau parah dan membutuhkan perawatan intensif. Pasien
                akan diobservasi dan mendapat perawatan intensif dibawah pengawasan dokter dan paramedis yang handal.
            </p>

            <p>Sebelum rawat inap, klien wajib mengisi <span class="highlight">informed consent</span> yang artinya
                klien telah diberi penjelasan yang detail tentang kondisi penyakit pasien dan menyetujui rencana terapi
                yang akan dijalankan sepengetahuan klien. Klien juga diberitahu biaya yang dibebankan untuk semua
                layanan.</p>

            <p><strong>RSHP menerima pembayaran tunai maupun kartu debit bank.</strong></p>
        </section>

        <section class="service-section">
            <h2>Bedah</h2>

            <h3>Tindakan Bedah Minor</h3>
            <div class="grid-container">
                <div class="grid-item">
                    <h4>Jahit Luka</h4>
                    <p>Penanganan luka dengan teknik penjahitan</p>
                </div>
                <div class="grid-item">
                    <h4>Kastrasi</h4>
                    <p>Prosedur sterilisasi pada hewan jantan</p>
                </div>
                <div class="grid-item">
                    <h4>Othematoma</h4>
                    <p>Penanganan pembengkakan darah di telinga</p>
                </div>
                <div class="grid-item">
                    <h4>Scaling - Root Planning</h4>
                    <p>Pembersihan karang gigi dan perawatan akar gigi</p>
                </div>
                <div class="grid-item">
                    <h4>Ekstraksi Gigi</h4>
                    <p>Pencabutan gigi yang bermasalah</p>
                </div>
            </div>

            <h3>Tindakan Bedah Mayor</h3>
            <div class="grid-container">
                <div class="grid-item">
                    <h4>Gastrotomi; Entrotomi; Enterektomi</h4>
                    <p>Operasi pada saluran pencernaan</p>
                </div>
                <div class="grid-item">
                    <h4>Salivary Mucocele</h4>
                    <p>Penanganan kelenjar ludah yang bermasalah</p>
                </div>
                <div class="grid-item">
                    <h4>Ovariohisterektomi; Sectio Caesar; Piometra</h4>
                    <p>Operasi sistem reproduksi betina</p>
                </div>
                <div class="grid-item">
                    <h4>Sistotomi; Urethrostomi</h4>
                    <p>Operasi pada sistem saluran kemih</p>
                </div>
                <div class="grid-item">
                    <h4>Fraktur Tulang</h4>
                    <p>Penanganan patah tulang</p>
                </div>
                <div class="grid-item">
                    <h4>Hernia Diafragmatika</h4>
                    <p>Perbaikan hernia pada diafragma</p>
                </div>
                <div class="grid-item">
                    <h4>Hernia Perinealis</h4>
                    <p>Perbaikan hernia di daerah perineum</p>
                </div>
                <div class="grid-item">
                    <h4>Hernia Inguinalis</h4>
                    <p>Perbaikan hernia di daerah selangkangan</p>
                </div>
                <div class="grid-item">
                    <h4>Eksisi Tumor</h4>
                    <p>Pengangkatan tumor atau benjolan abnormal</p>
                </div>
            </div>
        </section>

        <section class="service-section">
            <h2>Pemeriksaan</h2>
            <div class="grid-container">
                <div class="grid-item">
                    <h4>Pemeriksaan Sitologi</h4>
                    <p>Analisis sel untuk mendiagnosis penyakit</p>
                </div>
                <div class="grid-item">
                    <h4>Pemeriksaan Dermatologi</h4>
                    <p>Pemeriksaan khusus untuk masalah kulit</p>
                </div>
                <div class="grid-item">
                    <h4>Pemeriksaan Hematologi</h4>
                    <p>Analisis darah untuk mendeteksi kelainan</p>
                </div>
                <div class="grid-item">
                    <h4>Pemeriksaan Radiografi</h4>
                    <p>Pencitraan dengan sinar-X</p>
                </div>
                <div class="grid-item">
                    <h4>Pemeriksaan Ultrasonografi</h4>
                    <p>Pencitraan dengan gelombang ultrasonik</p>
                </div>
            </div>
        </section>

        <section class="service-section">
            <h2>Grooming</h2>
            <p>Selain layanan medis, Rumah Sakit Hewan Pendidikan Universitas Airlangga juga melayani grooming pada
                hewan kesayangan untuk menjaga kebersihan dan kesehatan kulit serta bulu hewan peliharaan Anda.</p>
        </section>
    @endsection
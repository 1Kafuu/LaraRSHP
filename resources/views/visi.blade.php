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
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-align: left;
        }

        body {
            background-color: var(--white);
            color: var(--dark-gray);
        }

        header {
            background-color: #002984;
            color: white;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .logo {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 10px;
            text-indent: 10px;
        }

        .logo h1 {
            color: white;
            margin: auto;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
            font-weight: bold;
        }

        header img {
            height: 50px;
        }


        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 0;
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

        .btn {
            display: inline-block;
            padding: 12px 20px;
            margin: 10px 5px;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
            transition: 0.3s ease;
            border: none;
        }
        
        .vision-mission-section {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            line-height: 1.6;
        }

        .vision-mission-section h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 40px;
            font-size: 2.2rem;
            position: relative;
        }

        .vision-mission-section h2:after {
            content: '';
            display: block;
            width: 80px;
            height: 4px;
            background: #3498db;
            margin: 10px auto;
            border-radius: 2px;
        }

        .vision-container,
        .mission-container {
            display: flex;
            align-items: flex-start;
            margin-bottom: 50px;
            background: #f8f9fa;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .vision-icon,
        .mission-icon {
            flex: 0 0 80px;
            margin-right: 25px;
            color: #3498db;
        }

        .vision-content,
        .mission-content {
            flex: 1;
        }

        .vision-content h3,
        .mission-content h3 {
            color: #2c3e50;
            margin-bottom: 15px;
            font-size: 1.8rem;
        }

        .vision-content p {
            font-size: 1.1rem;
            color: #555;
        }

        .mission-content ul {
            padding-left: 20px;
        }

        .mission-content li {
            margin-bottom: 10px;
            font-size: 1.1rem;
            color: #555;
        }

        .values-container {
            margin-top: 40px;
        }

        .values-container h3 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
            font-size: 1.8rem;
        }

        .values-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
        }

        .value-item {
            background: white;
            border-radius: 8px;
            padding: 25px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-top: 4px solid #3498db;
        }

        .value-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        .value-item h4 {
            color: #2c3e50;
            margin-bottom: 10px;
            font-size: 1.3rem;
        }

        .value-item p {
            color: #666;
            font-size: 1rem;
        }

        @media (max-width: 768px) {

            .vision-container,
            .mission-container {
                flex-direction: column;
                text-align: center;
            }

            .vision-icon,
            .mission-icon {
                margin-right: 0;
                margin-bottom: 15px;
            }

            .values-grid {
                grid-template-columns: 1fr;
            }
        }

        footer {
            background-color: var(--primary);
            color: var(--white);
            text-align: center;
            padding: 1.5rem 0;
            margin-top: 2rem;
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
        <section class="vision-mission-section">
            <h2>Visi dan Misi</h2>

            <div class="vision-container">
                <div class="vision-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="48" height="48">
                        <path
                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
                    </svg>
                </div>
                <div class="vision-content">
                    <h3>Visi Kami</h3>
                    <p>Menjadi rumah sakit hewan terdepan yang memberikan pelayanan kesehatan hewan yang komprehensif,
                        berkualitas tinggi, dan berkelanjutan dengan pendekatan holistik untuk meningkatkan
                        kesejahteraan
                        hewan dan kepuasan pemiliknya.</p>
                </div>
            </div>

            <div class="mission-container">
                <div class="mission-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="48" height="48">
                        <path
                            d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z" />
                    </svg>
                </div>
                <div class="mission-content">
                    <h3>Misi Kami</h3>
                    <ul>
                        <li>Menyediakan layanan medis veteriner yang komprehensif dengan standar tertinggi dan teknologi
                            terkini</li>
                        <li>Mengutamakan kesejahteraan hewan dalam setiap aspek pelayanan dan perawatan</li>
                        <li>Meningkatkan kesadaran masyarakat tentang pentingnya kesehatan hewan melalui edukasi dan
                            konsultasi</li>
                        <li>Mengembangkan sumber daya manusia yang profesional, berkompeten, dan berintegritas</li>
                        <li>Menjalin kemitraan dengan berbagai institusi untuk pengembangan ilmu kedokteran hewan</li>
                        <li>Memberikan layanan yang terjangkau dan aksesibel bagi seluruh masyarakat</li>
                    </ul>
                </div>
            </div>

            <div class="values-container">
                <h3>Nilai-Nilai Kami</h3>
                <div class="values-grid">
                    <div class="value-item">
                        <h4>Profesionalisme</h4>
                        <p>Memberikan pelayanan dengan kompetensi dan etika profesi yang tinggi</p>
                    </div>
                    <div class="value-item">
                        <h4>Integritas</h4>
                        <p>Berkomitmen pada kejujuran dan transparansi dalam setiap tindakan</p>
                    </div>
                    <div class="value-item">
                        <h4>Empati</h4>
                        <p>Memahami kebutuhan hewan dan kepedulian terhadap pemiliknya</p>
                    </div>
                    <div class="value-item">
                        <h4>Inovasi</h4>
                        <p>Terus mengembangkan metode dan teknologi untuk perawatan terbaik</p>
                    </div>
                    <div class="value-item">
                        <h4>Kolaborasi</h4>
                        <p>Bekerja sama dengan berbagai pihak untuk hasil yang optimal</p>
                    </div>
                    <div class="value-item">
                        <h4>Keunggulan</h4>
                        <p>Selalu berusaha memberikan yang terbaik dalam setiap layanan</p>
                    </div>
                </div>
            </div>
        </section>
    @endsection

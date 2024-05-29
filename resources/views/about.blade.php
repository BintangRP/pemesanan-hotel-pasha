@extends('layouts.index')

@section('title', 'About Hotel Pasha')

@section('content')<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        p {
            margin-bottom: 15px;
        }

        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .contact-item i {
            font-size: 1.2em;
            color: #007bff;
        }

        .contact-item span {
            font-size: 1.1em;
        }

        .map {
            margin-top: 20px;
            text-align: center;
        }

        .map iframe {
            width: 100%;
            height: 450px;
            border: 0;
            border-radius: 8px;
        }
    </style>
    <div class="container">
        <h1 class="fw-semibold">Kontak Detail - Hotel Pasha</h1>
        <div class="contact-info">
            <div class="contact-item">
                <i class="fas fa-map-marker-alt"></i>
                <span>123 Jalan Pasha, Jakarta, Indonesia</span>
            </div>
            <div class="contact-item">
                <i class="fas fa-phone-alt"></i>
                <span>+62 123 456 7890</span>
            </div>
            <div class="contact-item">
                <i class="fas fa-envelope"></i>
                <span>info@hotelpasha.com</span>
            </div>
            <div class="contact-item">
                <i class="fas fa-clock"></i>
                <span>Senin - Jumat: 08:00 - 20:00</span>
            </div>
            <div class="contact-item">
                <i class="fas fa-clock"></i>
                <span>Sabtu - Minggu: 09:00 - 18:00</span>
            </div>
        </div>
        <div class="map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.270804474231!2d109.24651231184785!3d-7.435257773225737!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e655ea49d9f9885%3A0x62be0b6159700ec9!2sInstitut%20Teknologi%20Telkom%20Purwokerto!5e0!3m2!1sid!2sid!4v1716923762865!5m2!1sid!2sid"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>

@endsection

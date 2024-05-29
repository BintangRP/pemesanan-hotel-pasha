@extends('layouts.index')

@section('title', 'Gebyar Discount Hotel Pasha')

@section('content')
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
    <div class="container-lg">
        <section>
            <!-- Chart Container -->
            <h2 class="fw-semibold text-center">Popularitas Bulan
                <script>
                    document.write(new Date().toLocaleString('default', {
                        month: 'long'
                    }))
                </script>
            </h2>
            <div class="chart-container mt-4 text-center my-5">
                <canvas id="myChart"></canvas>
            </div>
        </section>

        <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
            <h1 class="text-body-emphasis mt-5 fw-bold">Price List</h1>
            <p class="fs-5 text-body-secondary">Experience ultimate comfort and luxury tailored to your needs with our
                competitive room rates starting from just IDR 500,000 per night – book your perfect stay today and enjoy
                unparalleled amenities and service!</p>
        </div>
        <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm border-primary">
                    <div class="card-header py-3 text-bg-primary border-primary">
                        <h4 class="my-0 fw-normal">Standar</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">Rp.100k<small
                                class="text-body-secondary fw-light">/day</small>
                        </h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>Basic amenities</li>
                            <li>Suitable for solo travelers</li>
                            <li>Suitable for solo couples</li>
                            <li>Money Friendly</li>
                        </ul>
                        <a href="/pesan" class="w-100 btn btn-lg btn-primary">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm border-primary">
                    <div class="card-header py-3 text-bg-primary border-primary">
                        <h4 class="my-0 fw-normal">Deluxe</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">Rp.500k<small
                                class="text-body-secondary fw-light">/day</small>
                        </h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>More spacious</li>
                            <li>Includes additional amenities like a minibar and a better view.</li>
                            <li>Suitable for couples</li>
                        </ul>
                        <a href="/pesan" class="w-100 btn btn-lg btn-primary">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm border-primary">
                    <div class="card-header py-3 text-bg-primary border-primary">
                        <h4 class="my-0 fw-normal">Family</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">Rp.1.000k<small
                                class="text-body-secondary fw-light">/day</small>
                        </h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>Large rooms</li>
                            <li>Suitable for families</li>
                            <li>includes multiple beds</li>
                            <li>and extra amenities</li>
                        </ul>
                        <a href="/pesan" class="w-100 btn btn-lg btn-primary">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-lg">
            <h2 class=" text-center mb-4">Perbandingan Tipe Kamar</h2>
            <table>
                <tr>
                    <th class="text-bg-primary border-white text-center">Tipe Kamar</th>
                    <th class="text-bg-primary border-white text-center">Harga sewa / malam (IDR)</th>
                    <th class="text-bg-primary border-white text-center">Features</th>
                </tr>
                <tr>
                    <td>Standard</td>
                    <td>100,000</td>
                    <td>Basic amenities, suitable for solo travelers or couples.</td>
                </tr>
                <tr>
                    <td>Deluxe</td>
                    <td>500,000</td>
                    <td>More spacious, includes additional amenities like a minibar and a better view.</td>
                </tr>
                <tr>
                    <td>Family</td>
                    <td>1,000,000</td>
                    <td>Large rooms, suitable for families, includes multiple beds and extra amenities.</td>
                </tr>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Check if PHP variables are defined
        <?php if (isset($jumlahPemesanStandar) && isset($jumlahPemesanDeluxe) && isset($jumlahPemesanFamily)): ?>
        // Parse PHP variables to JavaScript
        let PemesanStandar = parseInt('<?php echo $jumlahPemesanStandar; ?>');
        let PemesanDeluxe = parseInt('<?php echo $jumlahPemesanDeluxe; ?>');
        let PemesanFamily = parseInt('<?php echo $jumlahPemesanFamily; ?>');

        // Get the canvas context
        const ctx = document.getElementById('myChart').getContext('2d');

        // Create the pie chart
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Tipe Standar', 'Tipe Deluxe', 'Tipe Family'],
                datasets: [{
                    label: 'Popularitas',
                    data: [PemesanStandar, PemesanDeluxe, PemesanFamily],
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)'
                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        <?php endif; ?>
    </script>
@endsection

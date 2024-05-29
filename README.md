# Pemesanan Hotel
## Project Overview

Proyek ini dibangun menggunakan framework Laravel, yang adalah sebuah framework aplikasi web berbasis PHP yang dikenal karena sintaksnya yang elegan dan fitur-fitur yang solid. Proyek ini menawarkan sistem yang komprehensif untuk booking kamar hotel, termasuk fungsi booking, halaman landing, tentang web, dan grafik popularitas real-time sesuai dengan customer yang sudah membooking kamar.

## Folder Structure

The folder structure of this Laravel project is as follows:

```
├── app
│   ├── Console
│   ├── Exceptions
│   ├── Http
│   │   ├── Controllers
│   │   ├── Middleware
│   ├── Models
│   ├── Providers
├── bootstrap
├── config
├── database
│   ├── factories
│   ├── migrations
│   ├── seeders
├── public
├── resources
│   ├── js
│   ├── sass
│   ├── views
├── routes
├── storage
│   ├── app
│   ├── framework
│   ├── logs
├── tests
├── vendor
```

### Folder Descriptions

- **app/**: Berisi kode inti aplikasi, termasuk controller, model, dan middleware.
  - **Console/**: Berisi perintah custom artisan.
  - **Exceptions/**: Berisi handler dan custom exception.
  - **Http/**: Berisi controllers, middleware, dan request form.
    - **Controllers/**: Berisi penerapan kontroller HTTP untuk menangani request yang datang 
    - **Middleware/**: Berisi middleware untuk menyaring permintaan HTTP yang masuk ke aplikasi.
  - **Models/**: Berisi model-model Eloquent, yang mewakili tabel-tabel database.
  - **Providers/**: Berisi penyedia layanan aplikasi.
  
- **bootstrap/**: Berisi file `app.php` memuat file yang memperkenalkan framework dan mengkonfigurasi autoloading. Direktori ini juga berisi direktori cache yang berisi file-file yang dihasilkan framework untuk optimasi performansi seperti file cache rute dan layanan

- **config/**: Berisi semua file konfigurasi untuk aplikasi.

- **database/**: Berisi file-file yang terkait dengan database.
  - **factories/**: Berisi file factory model untuk menghasilkan data uji.
  - **migrations/**: Berisi file migrasi database.
  - **seeders/**: Berisi file seeder database untuk mengisi database dengan data contoh.

- **public/**: Dokumen root server web. Berisi aset seperti gambar, JavaScript, dan CSS.

- **resources/**: Berisi template view dan aset mentah seperti CSS dan JavaScript.
  - **js/**: Berisi file JavaScript.
  - **sass/**: Berisi file SASS/SCSS untuk gaya.
  - **views/**: Berisi template Blade untuk view.

- **routes/**: Berisi definisi semua rute.
  - **web.php**: Berisi rute untuk antarmuka web.
  - **api.php**: Berisi rute untuk endpoint API.

- **storage/**: Berisi template Blade yang dikompilasi, sesi berbasis file, cache berbasis file, dan file lain yang dihasilkan oleh aplikasi.
  - **app/**: Berisi file aplikasi.
  - **framework/**: Berisi file yang dihasilkan oleh framework dan cache.
  - **logs/**: Berisi file log aplikasi.

- **tests/**: Berisi tes otomatis.

- **vendor/**: Berisi dependensi Composer.

## Programming Resources

### Laravel Framework

- **Eloquent ORM**: Laravel memiliki ORM built-in yang memudahkan penggunaan ActiveRecord untuk bekerja dengan database. Setiap tabel database memiliki model yang sesuai yang digunakan untuk berinteraksi dengan tabel tersebut.

- **Routing**: Fungsi routing Laravel sangat mudah dan fleksibel. Rute didefinisikan dalam file routes/web.php dan routes/api.php.

- **Blade Templating**: Blade adalah engine templating yang kuat dari Laravel. Ini memberikan shortcut yang nyaman untuk operasi PHP yang umum dan membantu menjaga view Anda bersih dan baca.

- **Middleware**: Middleware memberikan mekanisme yang nyaman untuk mengfilter permintaan HTTP yang masuk ke aplikasi Anda.

- **Artisan Console**: Laravel memiliki antarmuka command-line yang disebut Artisan, yang memberikan beberapa perintah yang berguna untuk digunakan saat mengembangkan aplikasi Anda.

- **Service Providers**: Service providers adalah tempat sentral dari semua bootstrapping aplikasi Laravel. Aplikasi Anda sendiri, serta semua layanan inti Laravel, dibootstrapping melalui service providers.

### Key Concepts

- **MVC Architecture**: Laravel mengikuti pola desain Model-View-Controller (MVC), memastikan pemisahan jelas antara lapisan logika, presentasi, dan data.

- **Service Container**: Kontainer layanan Laravel adalah alat yang kuat untuk mengelola ketergantungan kelas dan melakukan injeksi dependensi.

- **Event Broadcasting**: Laravel membuatnya mudah untuk menyiarakan acara-acara melalui koneksi WebSocket, memungkinkan pembaruan waktu nyata pada aplikasi Anda.

## Getting Started

To get started with this Laravel project, you need to have the following prerequisites:

- PHP >= 7.3
- Composer
- Node.js & npm

### Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/your-repository.git
    cd your-repository
    ```

2. Install dependencies:
    ```bash
    composer install
    npm install
    ```

3. Copy the `.env.example` file to `.env` and configure your environment settings:
    ```bash
    cp .env.example .env
    ```

4. Generate the application key:
    ```bash
    php artisan key:generate
    ```

5. Run database migrations and seeders:
    ```bash
    php artisan migrate --seed
    ```

6. Start the development server:
    ```bash
    php artisan serve
    ```
    
## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

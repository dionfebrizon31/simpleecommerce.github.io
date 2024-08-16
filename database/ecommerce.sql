-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jul 2024 pada 06.58
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id_detail` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`id_detail`, `id_pesanan`, `id_produk`, `kuantitas`, `total_harga`) VALUES
(1, 1, 9, 2, 59998000),
(2, 1, 8, 2, 113996000),
(3, 2, 9, 2, 59998000),
(4, 2, 8, 2, 113996000),
(5, 3, 15, 20, 242170000),
(6, 5, 9, 2, 59998000),
(7, 5, 15, 2, 84215000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Lenovo'),
(2, 'Asus'),
(3, 'HP'),
(4, 'Acer'),
(5, 'Dell');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `kuantitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_user`, `id_produk`, `kuantitas`) VALUES
(22, 0, 9, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_pesanan` date NOT NULL,
  `no_tujuan` varchar(13) NOT NULL,
  `alamat_tujuan` text NOT NULL,
  `bukti_bayar` varchar(255) NOT NULL,
  `status_pesanan` enum('pending','dikirim','ditolak','diterima') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_user`, `tgl_pesanan`, `no_tujuan`, `alamat_tujuan`, `bukti_bayar`, `status_pesanan`) VALUES
(1, 3, '2024-07-08', '081350631980', 'sadasdasdasd Kabupaten Pulang Pisau Provinsi Kalimantan Tengah Kode Pos 74811 tiki T25; 4200000; 24 Hari', '', 'dikirim'),
(2, 3, '2024-07-08', '081350631980', 'sadasdasdasd Kabupaten Pulang Pisau Provinsi Kalimantan Tengah Kode Pos 74811 tiki T25; 4200000; 24 Hari', '', 'pending'),
(3, 3, '2024-07-09', '081350631980', 'sdfghjklmnbhguj Kabupaten Lebak Provinsi Banten Kode Pos 42319 jne JTR; 115000; 8-9 Hari', '', 'pending'),
(4, 3, '2024-07-09', '081350631980', 'sdfghjklmnbhguj Kabupaten Lebak Provinsi Banten Kode Pos 42319 jne JTR; 115000; 8-9 Hari', '', 'pending'),
(5, 3, '2024-07-10', '08', 'alamat kota  Kabupaten Bengkulu Tengah Provinsi Bengkulu Kode Pos 38319 tiki REG; 49000; 3 Hari', 'LENOVO Yoga Slim 7 Pro 14ACH5.jpg', 'dikirim');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(1000) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar_produk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `deskripsi`, `harga`, `gambar_produk`) VALUES
(8, 2, 'ASUS Zenbook 14X OLED Space Edition UX5401', ' <p>ASUS Zenbook 14X OLED Space Edition adalah laptop ASUS terbaru yang dibuat untuk memperingati 25 tahun laptop ASUS dikirim ke luar angkasa. Laptop ini punya desain bertema luar angkasa yang elegan di depan dan pada keyboard. Ada juga layar ZenVision OLED 3.5 inci di cover yang bertugas menampilkan notifikasi, animasi, dan teks yang dipersonalisasi.</p><p>Laptop ASUS Zenbook 14X OLED Space Edition memiliki layar 14 inci OLED dengan rasio 16:10 resolusi 4K. Layar NanoEdge nyaman dipandang dan sudah divalidasi PANTONE. Rasio layar ke bodinya mencapai 92%. Sertifikasi TUV Rheinland membuat mata tidak cepat lelah.</p><h3>Spesifikasi Laptop ASUS Zenbook 14X OLED Space Edition</h3><ul><li><strong>Prosesor:</strong> Intel Core i7-12700H clock up to 4.7 GHz (24MB Cache, 6P + 8E Cores)</li><li><strong>VGA:</strong> Integrated Intel Iris Xe Graphics</li><li><strong>RAM:</strong> 16GB LPDDR5</li><li><strong>Storage:</strong> 1 TB M.2 NVMe PCIe 4.0 SSD</li><li><strong>Layar:</strong> 14 inci OLED 4K 3840 x 2400 piksel, DCI-P3 Color, VESA Certified</li><li><strong>Webcam:</strong> 720p HD Camera with Privacy Shutter</li><li><strong>Port:</strong> USB Gen 3.2 Type A, Thunderbolt 4, HDMI 2.0, Audio Jack, MicroSD Reader</li><li><strong>Audio:</strong> Speaker built-in, Array Microphone, Harman/Kardon</li><li><strong>Network:</strong> WiFi 6E (802.11ax) Dual Band 2×2 + Bluetooth 5.0</li><li><strong>Baterai:</strong> 63WHrs 4-cell Li-ion</li><li><strong>Dimensi:</strong> 31.12 x 22.11 x 1.59 cm, berat: 1.4 kg.</li></ul> ', 26999000, 'Laptop-ASUS-Keluaran-Baru-Zenbook-14X-OLED-Space-Edition.jpg'),
(9, 2, 'ASUS Zenbook Pro 14 Duo OLED UX8402', ' <p>ASUS Zenbook Pro 14 Duo OLED adalah laptop yang bagus untuk Anda yang sering kerja multitasking. Kelebihan laptop ASUS terbaik 2024 ini adalah punya dua layar. Layar utama punya luas 14.5 inci dengan resolusi 2.8K (2880 x 1800 piksel). Rasio layar 16:10, memiliki rasio layar ke bodi 93%, dan DCI-P3 color gamut. Layar kedua berjenis layar sentuh dengan luas 12.7 inci, resolusi 2.8K, dan 100% DCI-P3 color gamut.</p><p>Desain dua layar inovatif selain memudahkan Anda mengoperasikan dua layar, juga dapat memaksimalkan sirkulasi udara. Tenaga kencangnya didukung oleh prosesor Intel Core generasi ke-12 dengan 14 core (6 performance + 8 efficiency core). Untuk transfer data, laptop ini sudah dibekali Dual Thunderbolt 4. Layout keyboard ergonomis dari ASUS ErgoSense memberi kenyamanan saat mengetik.</p><h3>Spesifikasi Laptop ASUS Zenbook Pro 14 Duo OLED</h3><ul><li><strong>Prosesor:</strong> Intel Core i7-12700H clock up to 4.7 GHz (24MB Cache, 6P + 8E Cores)</li><li><strong>VGA:</strong> Integrated Intel Iris Xe Graphics</li><li><strong>RAM:</strong> 16GB LPDDR5</li><li><strong>Storage:</strong> 512 GB M.2 NVMe PCIe 4.0 SSD</li><li><strong>Layar:</strong> 14.5 inci OLED 2.8K 2880 x 1800 piksel, 120Hz Refresh Rate, DCI-P3 Color</li><li><strong>Webcam:</strong> 720p HD Camera</li><li><strong>Port:</strong> USB 3.2 Type A, Thunderbolt 4, HDMI 2.1, Audio Jack, MicroSD Reader</li><li><strong>Audio:</strong> Smart Amp, Array Microphone, Harman/Kardon</li><li><strong>Network:</strong> WiFi 6E (802.11ax) Dual Band 2×2 + Bluetooth 5.0</li><li><strong>Baterai:</strong> 76WHrs 4-cell Li-ion</li><li><strong>Dimensi:</strong> 32.35 x 22.47 x 1.79 cm, berat: 1.7 kg.</li></ul> ', 29999000, 'Laptop-ASUS-terbaik-Zenbook-Pro-14-Duo-OLED.jpg'),
(12, 2, 'ASUS Vivobook Pro 16X OLED N7601', ' <p>ASUS Vivobook Pro 16X OLED adalah laptop ASUS terbaru 2024 yang ditenagai tenaga kencang Intel Core generasi ke-12 seri H. VGA yang digunakan adalah NVIDIA GeForce RTX 3060 GPU. Laptop ini handal untuk menjalankan aplikasi berat dan gaming. Laptop ASUS Vivobook Pro 16X OLED memiliki sistem pendingin berventilasi empat dan baterai 90Wh kapasitas besar.</p><p>Laptop ini memiliki layar OLED NanoEdge 16 inci dengan resolusi 4K dengan refresh rate 120Hz yang memanjakan mata. Layarnya memiliki rasio aspek 16:10, nyaman untuk digunakan kerja atau membuat desain grafis. Rasio layar ke bodi mencapai 90.3% dan memiliki waktu respon 0.2 ms. Gamut warna dapat disesuaikan dan PANTONE yang divalidasi.</p><h3>Spesifikasi Laptop ASUS Vivobook Pro 16X OLED</h3><ul><li><strong>Prosesor:</strong> Intel Core i9-12900H clock up to 5.0 GHz (24MB Cache, 6P + 8E Cores)</li><li><strong>VGA:</strong> NVIDIA GeForce RTX 3060 6GB GDDR6</li><li><strong>RAM:</strong> 16GB DDR5 + 16GB DDR5 SO-DIMM</li><li><strong>Storage:</strong> 1TB M.2 NVMe PCIe 4.0 SSD</li><li><strong>Layar:</strong> 16 inci OLED 4K 3840 x 2400 piksel, 120Hz Refresh Rate, DCI-P3, VESA Certified</li><li><strong>Webcam:</strong> 1080p FHD Camera with Privacy Shutter</li><li><strong>Port:</strong> USB 3.2 Type A, USB 3.2 Type C, Thunderbolt 4, HDMI 2.1, RJ45 Gigabit Ethernet</li><li><strong>Audio:</strong> Smart Amp, Array Microphone, Harman/Kardon</li><li><strong>Network:</strong> WiFi 6E (802.11ax) Dual Band 2×2 + Bluetooth 5.0</li><li><strong>Baterai:</strong> 90WHrs 4-cell Li-ion</li><li><strong>Dimensi:</strong> 35.54 x 24.85 x 2.19 cm, berat: 2.3 kg.</li></ul> ', 33999000, 'Laptop-ASUS-terbaru-2022-Vivobook-Pro-16X-OLED.jpg'),
(13, 2, 'ASUS Vivobook Pro 15X OLED K6501', ' <p>ASUS Vivobook Pro 15X OLED adalah laptop yang bagus untuk meningkatkan kreativitas Anda. Kelebihan laptop ASUS terbaru 2024 ini adalah ditenagai prosesor Intel Core seri H generasi ke-12 dan VGA NVIDIA GeForce RTX 3060 GPU. Layar OLED NanoEdge 15.6 inci dengan resolusi 2.8K dan Refresh Rate 120Hz akan memanjakan mata Anda saat bekerja lama.</p><p>Sistem kipas ganda dan empat ventilasi menjaga performa laptop tetap konsisten. Baterai 76 Wh berkapasitas tinggi memberikan daya yang andal dan bisa diandalkan untuk membuat dan editing konten. Laptop ini memiliki bodi kuat dengan sertifikasi Military-Grade 810H Standard. Keyboard ASUS ErgoSense memberikan kenyamanan saat Anda mengetik.</p><h3>Spesifikasi Laptop ASUS Vivobook Pro 15X OLED</h3><ul><li><strong>Prosesor:</strong> Intel Core i7-12650H clock up to 4.7 GHz (24MB Cache, 10 Cores)</li><li><strong>VGA:</strong> NVIDIA RTX 3060 6GB GDDR6</li><li><strong>RAM:</strong> 16GB DDR5</li><li><strong>Storage:</strong> 512GB M.2 NVMe PCIe SSD</li><li><strong>Layar:</strong> 15.6 inci OLED 2.8K 2880 x 1620 piksel, 120Hz Refresh Rate, DCI-P3 Color, VESA Certified</li><li><strong>Webcam:</strong> 1080p FHD Camera with Privacy Shutter</li><li><strong>Port:</strong> USB Gen 3.2 Type A, Thunderbolt 4, HDMI 2.1, Audio Jack, MicroSD Reader</li><li><strong>Audio:</strong> Speaker built-in, Array Microphone, Harman/Kardon</li><li><strong>Network:</strong> WiFi 6E (802.11ax) Dual Band 2×2 + Bluetooth 5.0</li><li><strong>Baterai:</strong> 76WHrs 4-cell Li-ion</li><li><strong>Dimensi:</strong> 35.54 x 23.98 x 2.09 cm, berat: 2.1 kg.</li></ul> ', 24499000, 'Harga-ASUS-Vivobook-Pro-15X-OLED-terbaru-2022-500x317.jpg'),
(14, 2, 'ASUS Zenbook S 13 OLED UM5302', ' <p>ASUS Zenbook S 13 OLED adalah salah satu laptop paling ringan. Beratnya hanya 1.1 kg saja. Desain elegan dan kuat memiliki gaya elegan yang mendukung untuk terus produktif. Teknologi canggih dalam sasis magnesium alumunium alloy berukuran 14.9 mm super tipis membuatnya tangguh.</p><p>Laptop ASUS terbaru 2024 ini ditenagai prosesor AMD Ryzen 6000 Series dengan grafis AMD Radeon. Layar 13.3 inci dengan rasio 16:10 NanoEdge nyaman untuk digunakan bekerja. Layarnya memiliki NanoEdge 2.8K OLED ini memiliki sertifikat Dolby Vision untuk hadirkan pengalaman menonton yang luar biasa. Suaranya juga jernih dan powerful dengan sistem audio besutan Dolby Atmos.</p><h3>Spesifikasi Laptop ASUS Zenbook S 13 OLED</h3><ul><li><strong>Prosesor:</strong> AMD Ryzen 7 6800U clock up to 4.7 GHz (16MB Cache, 8 Cores)</li><li><strong>VGA:</strong> AMD Radeon Graphics</li><li><strong>RAM:</strong> 16GB LPDDR5</li><li><strong>Storage:</strong> 1TB M.2 NVMe PCIe 4.0 SSD</li><li><strong>Layar:</strong> 13.3 inci OLED 2.8K 2880 x 1620 piksel, DCI-P3 Color, VESA Certified</li><li><strong>Webcam:</strong> 720p HD Camera</li><li><strong>Port:</strong> USB Gen 3.2 Type C, Audio Jack</li><li><strong>Audio:</strong> Smart Amp, Speaker built-in, Harman/Kardon</li><li><strong>Network:</strong> WiFi 6E (802.11ax) Dual Band 2×2 + Bluetooth 5.0</li><li><strong>Baterai:</strong> 67WHrs 4-cell Li-ion</li><li><strong>Dimensi:</strong> 29.67 x 21.05 x 1.49 cm, berat: 1.1 kg.</li></ul> ', 19999000, 'Laptop-ASUS-Terbaru-Zenbook-S-13-OLED.jpg'),
(15, 1, 'LENOVO IdeaPad IP330S-14IKB', ' <p>Lenovo Ideapad IP330S merupakan laptop 14 inci yang sangat mumpuni untuk Anda bawa ke mana saja. Karena laptop besutan Lenovo ini memiliki bobot yang ringan dan monitor mengusung bezel yang tipis. Tak hanya tampilannya yang ringkas, Lenovo IdeaPad IP330S dibekali dengan prosesor Intel Core i5-8250U yang dirancang dengan prosesor Kaby Lake R yang memiliki performa yang menakjubkan. Untuk grafisnya, Lenovo IdeaPad IP330S menggunakan chip grafis AMD Radeon 540 yang mampu memberikan performa grafis yang mengagumkan. Ada beberapa keunggulan lain yang dimiliki oleh Lenovo IdeaPad IP330S.</p><p>Spesifikasi</p><figure class=\"table\"><table><tbody><tr><td><strong>Platform</strong></td><td>Notebook</td></tr><tr><td><strong>Tipe Prosesor</strong></td><td>Intel Core i5</td></tr><tr><td><strong>Processor Onboard</strong></td><td>Intel® Core™ i5-8250U Processor (1.60 GHz, Up to 3.40 GHz, 6M Cache)</td></tr><tr><td><strong>Kapasitas Penyimpanan</strong></td><td>1TB HDD</td></tr><tr><td><strong>Ukuran Layar</strong></td><td>14 Inch</td></tr><tr><td><strong>Resolusi Layar</strong></td><td>1920 x 1080</td></tr><tr><td><strong>Tipe Layar</strong></td><td>IPS</td></tr><tr><td><strong>Layar Sentuh</strong></td><td>Tidak</td></tr><tr><td><strong>Wireless Network Type</strong></td><td>Integrated</td></tr><tr><td><strong>Wireless Network Protocol</strong></td><td>802.11 ac</td></tr><tr><td><strong>Wireless Bluetooth</strong></td><td>Integrated</td></tr><tr><td><strong>Antarmuka / Interface</strong></td><td><ul><li>1 x USB Type-C™</li><li>1 x USB 3.0</li><li>1 x USB 2.0</li><li>Audio Jack</li></ul></td></tr><tr><td><strong>Keyboard</strong></td><td>Standard Keyboard</td></tr><tr><td><strong>Ragam Input Device</strong></td><td>Touchpad</td></tr><tr><td><strong>Audio</strong></td><td>Integrated</td></tr><tr><td><strong>Speaker</strong></td><td>Integrated</td></tr><tr><td><strong>Sistem Operasi</strong></td><td>Microsoft Windows 10 Home</td></tr><tr><td><strong>Baterai</strong></td><td>3 Cell</td></tr><tr><td><strong>Daya / Power</strong></td><td>External AC Adapter</td></tr><tr><td><strong>Dimensi (PTL)</strong></td><td>327 x 236 x 19.3 mm</td></tr><tr><td><strong>Berat Produk</strong></td><td>1.7</td></tr></tbody></table></figure> ', 12108500, '5c8b08d3aa3a6.jpg'),
(16, 1, 'LENOVO Legion Y520-15IKBN - Black', ' <p>Lenovo Legion Y520 memudahkan Anda untuk memasuki arena Gaming dari mana saja karena memiliki bobot yang ringan, bodi tipis, dan kinerja Gaming super mulus. Y520 memiliki ketebalan bodi sekitar 25.8mm dan berat 2.5 kg. Laptop Gaming Lenovo Y520 ditenagai Processor Intel® Core™ i7 generasi ke-7 dan pengolah grafis NVIDIA GTX 1050Ti yang menjanjikan performa Gaming dan multimedia yang juga dilengkapi dengan kemampuan audio kelas premium.&nbsp;</p><p>Spesifikasi</p><figure class=\"table\"><table><tbody><tr><td><strong>Platform</strong></td><td>Notebook</td></tr><tr><td><strong>Tipe Prosesor</strong></td><td>Intel Core i7</td></tr><tr><td><strong>Processor Onboard</strong></td><td>Intel® Core™ i7-7700HQ Processor (6M Cache, 2.80 GHz)</td></tr><tr><td><strong>Kapasitas Penyimpanan</strong></td><td>1TB HDD</td></tr><tr><td><strong>Memori Standar</strong></td><td>8GB DDR4</td></tr><tr><td><strong>Card Reader Provided</strong></td><td>4 -in- 1 card reader (SD / SDHC / SDXC / MMC)</td></tr><tr><td><strong>Tipe Grafis</strong></td><td>Nvidia GeForce GTX1050Ti 4 GB</td></tr><tr><td><strong>Ukuran Layar</strong></td><td>15.6 Inch</td></tr><tr><td><strong>Resolusi Layar</strong></td><td>1920 x 1080</td></tr><tr><td><strong>Tipe Layar</strong></td><td>IPS</td></tr><tr><td><strong>Layar Sentuh</strong></td><td>Tidak</td></tr><tr><td><strong>Networking</strong></td><td>Integrated</td></tr><tr><td><strong>Kecepatan Jaringan</strong></td><td>10 / 100 / 1000 Mbps</td></tr><tr><td><strong>Wireless Network Type</strong></td><td>Integrated</td></tr><tr><td><strong>Wireless Network Protocol</strong></td><td>802.11 ac</td></tr><tr><td><strong>Wireless Bluetooth</strong></td><td>Integrated</td></tr><tr><td><strong>Antarmuka / Interface</strong></td><td><ul><li>1 USB 3.1 (Type C)</li><li>2 USB 3.0</li><li>1 USB 2.0</li><li>HDMI</li><li>LAN Port</li><li>Audio Jack</li></ul></td></tr><tr><td><strong>Keyboard</strong></td><td>Standard Keyboard</td></tr><tr><td><strong>Ragam Input Device</strong></td><td>Touch Pad</td></tr><tr><td><strong>Audio</strong></td><td>Integrated</td></tr><tr><td><strong>Speaker</strong></td><td>Integrated</td></tr><tr><td><strong>Sistem Operasi</strong></td><td>Microsoft Windows 10</td></tr><tr><td><strong>Baterai</strong></td><td>3 Cell</td></tr></tbody></table></figure> ', 15817500, '5a28a96ef233d.jpg'),
(17, 1, 'LENOVO IdeaPad Flex 5 14ALC7', ' <p>Lenovo Yoga Slim 7 Pro adalah laptop dengan performa kencang berkat prosesor AMD Ryzen 5000 H-Series terbaru. Prosesor dengan 8 core dengan arsitektur 7nm menjamin kinerja laptop lebih efisien. Grafisnya ditenagai oleh AMD Radeon terintegrasi yang bisa mengolah multimedia dengan lancar. Kombinasi RAM dan Storage SSD besar membuat semua kerjaan lancar.</p><p>Spesifikasi</p><figure class=\"table\"><table><tbody><tr><td><strong>Platform</strong></td><td>Notebook</td></tr><tr><td><strong>Tipe Prosesor</strong></td><td>AMD Octa Core</td></tr><tr><td><strong>Processor Onboard</strong></td><td>AMD&nbsp;Ryzen&nbsp;9&nbsp;5900HX&nbsp;Processor&nbsp;(16M&nbsp;Cache,&nbsp;up&nbsp;to&nbsp;4.6&nbsp;GHz)</td></tr><tr><td><strong>Kapasitas Penyimpanan</strong></td><td>1TB SSD</td></tr><tr><td><strong>Memori Standar</strong></td><td>16GB DDR4</td></tr><tr><td><strong>Tipe Grafis</strong></td><td>AMD Radeon Graphics</td></tr><tr><td><strong>Ukuran Layar</strong></td><td>14 Inch</td></tr><tr><td><strong>Resolusi Layar</strong></td><td>2880 x 1800</td></tr><tr><td><strong>Tipe Layar</strong></td><td>IPS</td></tr><tr><td><strong>Layar Sentuh</strong></td><td>Tidak</td></tr><tr><td><strong>Networking</strong></td><td>Integrated</td></tr><tr><td><strong>Wireless Bluetooth</strong></td><td>Integrated</td></tr><tr><td><strong>Antarmuka / Interface</strong></td><td><ul><li>1x USB 3.2 Gen 1 (Always On)</li><li>2x USB-C 3.2 Gen 2 (support data transfer, Power Delivery 3.0 and DisplayPort 1.4)</li><li>1x Headphone / microphone combo jack (3.5mm)</li></ul></td></tr><tr><td><strong>Keyboard</strong></td><td>Backlit keyboard</td></tr><tr><td><strong>Audio</strong></td><td>Integrated</td></tr><tr><td><strong>Speaker</strong></td><td>Integrated</td></tr><tr><td><strong>Kamera</strong></td><td>IR &amp; 720p + ToF Sensor</td></tr><tr><td><strong>Sistem Operasi</strong></td><td>Microsoft Windows 10 Home</td></tr><tr><td><strong>Software Lainnya</strong></td><td>Office Home and Student</td></tr><tr><td><strong>Dimensi (PTL)</strong></td><td>312.4 x 221.4 x 14.6-16.9 mm</td></tr><tr><td><strong>Berat Produk</strong></td><td>1.32 kg</td></tr><tr><td><strong>Lain-lain</strong></td><td><ul><li>WLAN + Bluetooth: 11ax, 2x2 + BT5.1</li><li>Detail speaker: Stereo speakers, 2W x2, Dolby Atmos, Harman Speakers</li></ul></td></tr></tbody></table></figure> ', 18314000, 'LENOVO Yoga Slim 7 Pro 14ACH5.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `level` enum('admin','member') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_lengkap`, `foto`, `level`) VALUES
(2, 'admin', 'admin', 'admin', '2.png', 'admin'),
(3, 'member', 'member', 'member', '3.png', 'member');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

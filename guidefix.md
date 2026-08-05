**PROTOTYPE APLIKASI DATA MAHASISWA PKL/MAGANG DAN FASILITAS**

**Deskripsi Program**

SIMAPRA (Sistem Informasi Manajemen Praktik Kerja Lapangan) merupakan aplikasi berbasis web yang digunakan untuk mengelola seluruh proses PKL/Magang mahasiswa mulai dari pendataan peserta, penempatan pada instansi, pencatatan aktivitas harian, validasi kegiatan oleh pembimbing instansi, hingga pelaporan hasil PKL.

Sistem menerapkan **Role Based Access Control (RBAC)** sehingga setiap pengguna hanya dapat mengakses menu sesuai kewenangannya.

**Tujuan Program**

SIMAPRA dikembangkan untuk:

- Mengelola seluruh proses Praktik Kerja Lapangan (PKL) mahasiswa secara terintegrasi mulai dari pengajuan hingga penyelesaian PKL.
- Mengelola data master yang meliputi mahasiswa, instansi mitra, pembimbing instansi, periode PKL, fasilitas, serta pengguna sistem.
- Memfasilitasi proses pengajuan PKL secara digital beserta verifikasi dan persetujuan oleh administrator.
- Mengelola penempatan mahasiswa ke instansi mitra beserta penentuan pembimbing instansi, periode pelaksanaan, dan fasilitas yang diberikan.
- Memfasilitasi mahasiswa dalam mengisi logbook harian, mengunggah dokumentasi kegiatan, serta mengelola dokumen PKL secara digital.
- Mempermudah pembimbing instansi dalam melakukan monitoring, validasi logbook, memberikan catatan bimbingan, serta melakukan penilaian terhadap mahasiswa.
- Menyediakan sistem monitoring perkembangan PKL secara real-time melalui dashboard sesuai peran pengguna (Administrator, Mahasiswa, dan Pembimbing Instansi).
- Mengelola seluruh dokumen PKL secara terpusat sehingga mudah diakses, ditelusuri, dan terdokumentasi dengan baik.
- Menghasilkan rekapitulasi data dan laporan PKL secara otomatis yang dapat ditampilkan maupun diekspor ke dalam format PDF dan Excel.
- Menerapkan sistem Role Based Access Control (RBAC) sehingga setiap pengguna hanya dapat mengakses fitur sesuai dengan hak akses dan tanggung jawabnya.

**Permasalahan yang Teridentifikasi**

Sebelum menggunakan SIMAPRA, pelaksanaan Praktik Kerja Lapangan (PKL) masih menghadapi berbagai kendala dalam proses administrasi maupun monitoring, di antaranya:

- Data mahasiswa, instansi mitra, dan pembimbing instansi masih dikelola secara terpisah sehingga sulit dipantau dan diperbarui.
- Proses pengajuan PKL masih dilakukan secara manual sehingga verifikasi dan persetujuan membutuhkan waktu yang lebih lama.
- Penempatan mahasiswa ke instansi beserta pembimbing belum terdokumentasi dalam satu sistem yang terintegrasi.
- Pencatatan aktivitas harian (logbook) masih dilakukan secara manual atau menggunakan dokumen terpisah sehingga berisiko hilang dan sulit dipantau.
- Pengumpulan dokumen PKL dilakukan melalui berbagai media sehingga proses penyimpanan, pencarian, dan pengarsipan menjadi kurang efektif.
- Pembimbing instansi mengalami kesulitan dalam memonitor perkembangan mahasiswa, memberikan catatan bimbingan, serta melakukan validasi logbook secara berkala.
- Proses penilaian mahasiswa masih dilakukan secara manual sehingga rekapitulasi nilai memerlukan waktu yang lebih lama dan berpotensi menimbulkan kesalahan.
- Administrator mengalami kesulitan dalam memantau status pengajuan, penempatan, pelaksanaan, hingga penyelesaian PKL secara real-time.
- Penyusunan laporan dan rekapitulasi data PKL masih dilakukan secara manual sehingga kurang efisien dan membutuhkan waktu yang cukup lama.

SIMAPRA hadir sebagai sistem informasi terintegrasi yang menghubungkan seluruh proses PKL, mulai dari pengajuan, verifikasi, penempatan, pelaksanaan, monitoring, validasi, penilaian, hingga pelaporan dalam satu platform berbasis web sehingga pengelolaan PKL menjadi lebih efektif, efisien, transparan, dan terdokumentasi dengan baik.

**User Sistem**

**A. Admin Aplikasi**

Bertugas mengelola seluruh data master dan transaksi.

Hak akses:

- Login
- Dashboard
- Kelola data Mahasiswa
- Kelola data Instansi
- Kelola data Pembimbing Instansi
- Kelola Periode PKL
- Penempatan Mahasiswa
- Kelola Fasilitas
- Monitoring Logbook
- Monitoring Dokumen
- Monitoring Penilaian
- Laporan
- Manajemen User

**B. Mahasiswa**

Bertugas melaksanakan PKL dan mengisi aktivitas.

Hak akses:

- Login
- Dashboard
- Melihat penempatan
- Mengisi Logbook
- Upload Dokumen
- Melihat Status Validasi
- Melihat Nilai
- Edit Profil

**C. Pembimbing PKL dari Instansi**

Bertugas melakukan pembimbingan selama mahasiswa berada di perusahaan.

Hak akses:

- Login
- Dashboard
- Daftar Mahasiswa Bimbingan
- Validasi Logbook
- Memberikan Catatan
- Memberi dan validasi nilai mahasiswa
- Melihat Dokumen Mahasiswa

**User dan IPO**

| **User**            | **Input**                                                   | **Process**                             | **Output**                    |
| ------------------- | ----------------------------------------------------------- | --------------------------------------- | ----------------------------- |
| Admin               | Data mahasiswa, instansi, pembimbing, penempatan, fasilitas | CRUD seluruh data master dan monitoring | Data PKL tersimpan,           |
| Mahasiswa           | Aktivitas harian, dokumen                                   | Mengisi logbook dan upload dokumen      | Riwayat aktivitas             |
| Pembimbing Instansi | Validasi logbook, nilai, komentar                           | Memeriksa aktivitas mahasiswa           | Logbook tervalidasi dan nilai |

**Modul/Fitur Aplikasi SIMAPRA**

| **Modul**                    | **Fungsi**                                                                                                            |
| ---------------------------- | --------------------------------------------------------------------------------------------------------------------- |
| **Login**                    | Autentikasi pengguna berdasarkan hak akses (Administrator, Mahasiswa, dan Pembimbing Instansi).                       |
| **Dashboard**                | Menampilkan ringkasan data, statistik, notifikasi, dan informasi sesuai peran pengguna.                               |
| **Pengajuan PKL**            | Mahasiswa mengajukan PKL dengan memilih instansi, mengisi data pengajuan, dan mengunggah dokumen persyaratan.         |
| **Verifikasi Pengajuan**     | Administrator memverifikasi, menyetujui, atau menolak pengajuan PKL mahasiswa.                                        |
| **Data Mahasiswa**           | Mengelola data identitas mahasiswa peserta PKL (CRUD).                                                                |
| **Data Instansi**            | Mengelola data perusahaan atau instansi mitra tempat pelaksanaan PKL (CRUD).                                          |
| **Data Pembimbing Instansi** | Mengelola data pembimbing dari setiap instansi mitra (CRUD).                                                          |
| **Data Periode PKL**         | Mengelola periode pelaksanaan PKL beserta status periode aktif.                                                       |
| **Data Fasilitas**           | Mengelola jenis fasilitas yang diberikan kepada mahasiswa selama PKL.                                                 |
| **Penempatan PKL**           | Menentukan penempatan mahasiswa ke instansi, pembimbing instansi, periode PKL, serta fasilitas yang diterima.         |
| **Logbook Harian**           | Mahasiswa mengisi aktivitas harian dan mengunggah dokumentasi kegiatan PKL.                                           |
| **Validasi Logbook**         | Pembimbing Instansi memeriksa, memberikan catatan, menyetujui, atau meminta revisi logbook mahasiswa.                 |
| **Upload Dokumen PKL**       | Mahasiswa mengunggah dokumen PKL seperti surat pengantar, laporan akhir, sertifikat, dan dokumen pendukung lainnya.   |
| **Penilaian PKL**            | Pembimbing Instansi memberikan nilai, evaluasi, dan rekomendasi terhadap mahasiswa.                                   |
| **Monitoring PKL**           | Administrator memantau status pengajuan, penempatan, logbook, dokumen, penilaian, dan progres PKL secara keseluruhan. |
| **Laporan**                  | Menampilkan rekapitulasi data PKL serta menyediakan fitur ekspor ke format PDF dan Excel.                             |
| **Manajemen User**           | Mengelola akun pengguna, hak akses (RBAC), serta aktivasi akun sistem.                                                |

**Fitur Pendukung Sistem**

| **Fitur**                            | **Fungsi**                                                                                                                                        |
| ------------------------------------ | ------------------------------------------------------------------------------------------------------------------------------------------------- |
| **Search**                           | Memudahkan pencarian data mahasiswa, instansi, pembimbing instansi, pengajuan PKL, logbook, dan dokumen secara cepat.                             |
| **Filter**                           | Menyaring data berdasarkan periode PKL, status pengajuan, status penempatan, status logbook, instansi, maupun mahasiswa.                          |
| **Export PDF**                       | Menghasilkan laporan PKL dalam format PDF yang siap dicetak.                                                                                      |
| **Export Excel**                     | Mengekspor data PKL ke dalam format Excel untuk kebutuhan pengolahan data lebih lanjut.                                                           |
| **Upload File**                      | Mendukung unggahan dokumen dengan format PDF, JPG, JPEG, dan PNG sesuai kebutuhan administrasi PKL.                                               |
| **Notifikasi**                       | Memberikan pemberitahuan mengenai status pengajuan PKL, validasi logbook, revisi, penilaian, dan informasi penting lainnya.                       |
| **Riwayat Aktivitas**                | Menyimpan histori aktivitas pengguna dan perubahan data untuk memudahkan proses monitoring serta audit.                                           |
| **Dashboard Statistik**              | Menampilkan grafik dan ringkasan data terkait pengajuan, penempatan, logbook, dokumen, penilaian, dan perkembangan PKL sesuai hak akses pengguna. |
| **Role Based Access Control (RBAC)** | Membatasi akses fitur berdasarkan peran pengguna, yaitu Administrator, Mahasiswa, dan Pembimbing Instansi.                                        |
| **Backup Database**                  | Membantu administrator melakukan pencadangan data untuk menjaga keamanan dan ketersediaan informasi.                                              |
| **Responsive Design**                | Menyediakan tampilan aplikasi yang optimal pada perangkat desktop, tablet, maupun smartphone.                                                     |

**Penyesuaian Modul Aplikasi**

Administrator

Administrator bertanggung jawab mengelola seluruh data master, transaksi, monitoring, dan pelaporan pelaksanaan PKL.

Hak akses Administrator:

- Dashboard
- Verifikasi Pengajuan PKL
- Kelola Mahasiswa
- Kelola Instansi
- Kelola Pembimbing Instansi
- Kelola Periode PKL
- Penempatan Mahasiswa
- Kelola Fasilitas
- Monitoring Logbook
- Monitoring Dokumen PKL
- Monitoring Penilaian
- Laporan
- Manajemen User

Mahasiswa

Mahasiswa menggunakan sistem untuk mengajukan PKL, melaksanakan kegiatan PKL, mengunggah dokumen, serta memantau perkembangan pelaksanaan PKL.

Hak akses Mahasiswa:

- Dashboard
- Pengajuan PKL
- Status Pengajuan
- Data Penempatan
- Logbook Harian
- Upload Dokumen PKL
- Status Validasi Logbook
- Nilai PKL
- Profil

Pembimbing Instansi

Pembimbing Instansi bertugas melakukan pembimbingan, monitoring, validasi logbook, serta memberikan penilaian kepada mahasiswa yang berada di bawah bimbingannya.

Hak akses Pembimbing Instansi:

- Dashboard
- Mahasiswa Bimbingan
- Validasi Logbook
- Catatan Bimbingan
- Penilaian Mahasiswa
- Dokumen Mahasiswa
- Profil

**Dashboard Monitoring**

Dashboard Administrator

Dashboard Administrator berfungsi sebagai pusat monitoring seluruh proses Praktik Kerja Lapangan (PKL), mulai dari pengajuan, verifikasi, penempatan, pelaksanaan, hingga penyelesaian PKL. Dashboard ini menyajikan ringkasan data, statistik, dan notifikasi untuk membantu administrator dalam mengambil keputusan serta melakukan pengawasan terhadap seluruh aktivitas PKL.

Informasi yang ditampilkan:

- Total Mahasiswa PKL
- Total Mahasiswa PKL Aktif
- Total Mahasiswa PKL Selesai
- Total Instansi Mitra
- Total Pembimbing Instansi
- Pengajuan PKL Menunggu Verifikasi
- Mahasiswa Menunggu Penempatan
- Logbook Menunggu Validasi
- Dokumen PKL Menunggu Verifikasi
- Penilaian yang Belum Selesai
- Total Dokumen PKL yang Diunggah
- Grafik Mahasiswa PKL per Periode
- Grafik Status Pengajuan PKL
- Grafik Status Penempatan PKL
- Grafik Progress Pelaksanaan PKL
- Grafik Status Validasi Logbook
- Notifikasi Aktivitas Terbaru

Dashboard Mahasiswa

Dashboard Mahasiswa berfungsi untuk memberikan informasi mengenai perkembangan pelaksanaan PKL yang sedang dijalani, mulai dari proses pengajuan hingga hasil akhir PKL. Dashboard ini membantu mahasiswa memantau seluruh tahapan PKL dalam satu halaman.

Informasi yang ditampilkan:

- Status Pengajuan PKL
- Status Penempatan PKL
- Informasi Instansi
- Informasi Pembimbing Instansi
- Periode PKL
- Progress Pengisian Logbook
- Jumlah Logbook Tervalidasi
- Jumlah Logbook Menunggu Validasi
- Jumlah Logbook Direvisi
- Dokumen PKL yang Telah Diunggah
- Status Validasi Logbook Terakhir
- Nilai PKL (apabila telah diberikan)
- Notifikasi Terbaru

Dashboard Pembimbing Instansi

Dashboard Pembimbing Instansi berfungsi untuk memantau seluruh mahasiswa bimbingan, melakukan validasi logbook, memberikan catatan bimbingan, serta melakukan penilaian secara lebih efektif.

Informasi yang ditampilkan:

- Jumlah Mahasiswa Bimbingan
- Daftar Mahasiswa PKL Aktif
- Logbook Menunggu Validasi
- Logbook Direvisi
- Logbook Telah Divalidasi
- Jumlah Dokumen Mahasiswa
- Penilaian yang Belum Diisi
- Penilaian yang Telah Diselesaikan
- Statistik Validasi Logbook
- Statistik Penilaian Mahasiswa
- Aktivitas Mahasiswa Terbaru
- Notifikasi Terbaru

\# ALUR PROSES SIMAPRA

\## (SISTEM INFORMASI MANAJEMEN PRAKTIK KERJA LAPANGAN)

\---

\## TAHAP PROSES

1\. \*\*PENGAJUAN PKL\*\*

Mahasiswa membuat pengajuan PKL.

2\. \*\*VERIFIKASI ADMIN\*\*

Admin memeriksa dan memverifikasi pengajuan.

3\. \*\*PENEMPATAN\*\*

Admin melakukan penempatan mahasiswa yang disetujui.

4\. \*\*AKTIF PKL\*\*

Mahasiswa resmi aktif dan dapat melaksanakan PKL.

5\. \*\*VALIDASI LOGBOOK\*\*

Pembimbing memvalidasi logbook mahasiswa.

6\. \*\*PENILAIAN\*\*

Pembimbing memberikan penilaian dan evaluasi.

7\. \*\*REKAP & LAPORAN\*\*

Admin melakukan rekap dan mencatat laporan.

\---

\## AKTOR & AKTIVITAS

\### 1. MAHASISWA

\- \*\*START\*\* → Login

\- \*\*Mengajukan PKL\*\*

\- Memilih Instansi

\- Mengisi Data Pengajuan

\- Upload Surat Pengantar (jika diperlukan)

\- \*\*Status Pengajuan : MENUNGGU\*\*

\- Memeriksa Pengajuan

\- Memeriksa Data

\- Memeriksa Lampiran

\- Memastikan Kelayakan

\- \*\*DITOLAK\*\*

\- Memeriksa Data

\- Memeriksa Lampiran

\- Memastikan Kelayakan

\- \*\*Informasi Penempatan\*\*

\- Lokasi / Instansi

\- Pembimbing Instansi

\- Periodo PKL

\- Fasilitas

\- \*\*Status PKL : AKTIF\*\*

(Mahasiswa resmi aktif PKL)

\- \*\*Melaksanakan PKL\*\*

\- Mengisi Logbook Harian

\- Upload Dokumentasi

\- Upload Dokumen PKL

\- \*\*Status Penempatan : AKTIF\*\*

(Mahasiswa resmi aktif PKL)

\- \*\*Upload Laporan Akhir & Dokumen Pendukung\*\*

\- \*\*Status Penempatan : SELESAI\*\*

\- Memeriksa Laporan

\- Memeriksa Data

\- Memeriksa Lampiran

\- Memastikan Kelayakan

\- \*\*Status Penempatan : DITOLAK\*\*

\- Memeriksa Laporan

\- Memeriksa Data

\- Memeriksa Lampiran

\- Memastikan Kelayakan

\- \*\*Status Penempatan : DIBATALKAN\*\*

(Pemenuhan dibatalkan)

\- \*\*Validasi Logbook\*\*

\- Memvalidasi

\- Memberikan Catatan

\- Jika belum sesuai → Revisi

\- \*\*Status Logbook : TERVALIDASI\*\*

\- \*\*Penilaian & Evaluasi\*\*

\- Memberikan Nilai

\- Memberikan Evaluasi

\- Memberikan Rekomendasi

\- \*\*Rekap & Laporan\*\*

\- Rekap Mahasiswa

\- Rekap Instansi

\- Rekap Penilaian

\- Rekap Logbook

\- Rekap Fasilitas

\- Cetak Laporan

\- \*\*End\*\*

\---

\### 2. ADMINISTRATOR

\- \*\*Login\*\*

\- \*\*Mengajukan PKL\*\*

\- Memilih Instansi

\- Mengisi Data Pengajuan

\- Upload Surat Pengantar (jika diperlukan)

\- \*\*Status Pengajuan : MENUNGGU\*\*

\- Memeriksa Pengajuan

\- Memeriksa Data

\- Memeriksa Lampiran

\- Memastikan Kelayakan

\- \*\*DITOLAK\*\*

\- Memeriksa Data

\- Memeriksa Lampiran

\- Memastikan Kelayakan

\- \*\*Informasi Penempatan\*\*

\- Lokasi / Instansi

\- Pembimbing Instansi

\- Periodo PKL

\- Fasilitas

\- \*\*Status PKL : AKTIF\*\*

(Mahasiswa resmi aktif PKL)

\- \*\*Melaksanakan PKL\*\*

\- Mengisi Logbook Harian

\- Upload Dokumentasi

\- Upload Dokumen PKL

\- \*\*Status Penempatan : AKTIF\*\*

(Mahasiswa resmi aktif PKL)

\- \*\*Upload Laporan Akhir & Dokumen Pendukung\*\*

\- \*\*Status Penempatan : SELESAI\*\*

\- Memeriksa Laporan

\- Memeriksa Data

\- Memeriksa Lampiran

\- Memastikan Kelayakan

\- \*\*Status Penempatan : DITOLAK\*\*

\- Memeriksa Laporan

\- Memeriksa Data

\- Memeriksa Lampiran

\- Memastikan Kelayakan

\- \*\*Status Penempatan : DIBATALKAN\*\*

(Pemenuhan dibatalkan)

\- \*\*Validasi Logbook\*\*

\- Memvalidasi

\- Memberikan Catatan

\- Jika belum sesuai → Revisi

\- \*\*Status Logbook : TERVALIDASI\*\*

\- \*\*Penilaian & Evaluasi\*\*

\- Memberikan Nilai

\- Memberikan Evaluasi

\- Memberikan Rekomendasi

\- \*\*Rekap & Laporan\*\*

\- Rekap Mahasiswa

\- Rekap Instansi

\- Rekap Penilaian

\- Rekap Logbook

\- Rekap Fasilitas

\- Cetak Laporan

\- \*\*End\*\*

\---

\### 3. PEMBIMBING INSTANSI

\- \*\*DRAFT\*\*

(Belum Disajikan)

\- \*\*MENUNGGU\*\*

(Menunggu Verifikasi)

\- \*\*DISETUJUI\*\*

(Pengajuan Disetujui)

\- \*\*DITOLAK\*\*

(Pengajuan Ditolak)

\---

\## STATUS PROSES

\### A. STATUS PENGAJUAN PKL

\- \*\*DRAFT\*\* - Belum Disajikan

\- \*\*MENUNGGU\*\* - Menunggu Verifikasi

\- \*\*DISETUJUI\*\* - Pengajuan Disetujui

\- \*\*DITOLAK\*\* - Pengajuan Ditolak

\### B. STATUS PENEMPATAN

\- \*\*BELUM DITEMPATKAN\*\* - Belum ada penempatan

\- \*\*AKTIF\*\* - Mahasiswa aktif PKL

\- \*\*SELESAI\*\* - PKL selesai

\- \*\*DIBATALKAN\*\* - Pemenuhan dibatalkan

\### C. STATUS LOGBOOK

\- \*\*DRAFT\*\* - Logbook disimpan

\- \*\*MENUNGGU VALIDASI\*\* - Menunggu validasi pembimbing

\- \*\*REVISI\*\* - Perlu diperbaiki mahasiswa

\- \*\*TERVALIDASI\*\* - Logbook disetujui

\---

\## KETERANGAN

\- \*\*Alur Proses Utama\*\*

\- \*\*Alur Pengembalian / Revisi\*\*

\- \*\*Aktivitas Mahasiswa\*\*

\- \*\*Informasi / Output\*\*

\---

\## CATATAN PENTING

\- Mahasiswa hanya dapat mengisi logbook setelah \*\*Status Penempatan = AKTIF\*\*.

\- Setiap proses memiliki status untuk memudahkan \*\*tracking\*\* dan \*\*monitoring\*\*.

\- Semua aktivitas tercatat dalam \*\*Audit Log\*\*.

**Urutan Proses Berdasarkan SOP**

| **Tahap** | **Aktor**                       | **Aktivitas**                                                                                                                                                                      |
| --------- | ------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| **1**     | Mahasiswa                       | Login ke sistem SIMAPRA.                                                                                                                                                           |
| **2**     | Mahasiswa                       | Mengajukan PKL dengan memilih instansi, mengisi data pengajuan, dan mengunggah surat pengantar (jika diperlukan).                                                                  |
| **3**     | Admin                           | Memverifikasi data pengajuan PKL yang diajukan mahasiswa.                                                                                                                          |
| **4**     | Admin                           | Menyetujui atau menolak pengajuan PKL. Jika ditolak, mahasiswa memperbaiki pengajuan dan mengajukannya kembali.                                                                    |
| **5**     | Admin                           | Menetapkan penempatan PKL yang meliputi instansi, pembimbing instansi, periode PKL, fasilitas, serta mengubah status penempatan menjadi **Aktif**.                                 |
| **6**     | Mahasiswa                       | Melihat informasi penempatan dan mulai melaksanakan PKL sesuai instansi yang telah ditetapkan.                                                                                     |
| **7**     | Mahasiswa                       | Mengisi logbook harian, mengunggah dokumentasi kegiatan, dan mengunggah dokumen PKL selama masa pelaksanaan PKL.                                                                   |
| **8**     | Pembimbing Instansi             | Memantau aktivitas mahasiswa, memeriksa logbook, memvalidasi logbook, dan memberikan catatan atau permintaan revisi apabila diperlukan.                                            |
| **9**     | Mahasiswa & Pembimbing Instansi | Mahasiswa memperbaiki logbook sesuai catatan pembimbing, kemudian pembimbing melakukan validasi ulang hingga status logbook menjadi **Tervalidasi**.                               |
| **10**    | Mahasiswa & Pembimbing Instansi | Menjelang akhir PKL, mahasiswa mengunggah laporan akhir beserta dokumen pendukung. Pembimbing memberikan nilai, evaluasi, dan rekomendasi. Status PKL berubah menjadi **Selesai**. |
| **11**    | Admin                           | Melakukan monitoring seluruh proses PKL serta menghasilkan laporan berupa rekap mahasiswa, instansi, logbook, penilaian, fasilitas, dan laporan PKL.                               |

\# SKEMA NAVIGASI SISTEM INFORMASI PKL / MAGANG MAHASISWA

\---

\## LOGIN

\- \*\*Username\*\*

\- \*\*Password\*\*

\- \*\*Masuk\*\*

\---

\## PERAN PENGGUNA

\### 🎓 MAHASISWA

Mengelola aktivitas PKL, pengajuan, logbook, dokumen, dan melihat nilai.

\### 🛠️ ADMINISTRATOR

Mengelola data master, verifikasi, penempatan, monitoring, fasilitas, dan laporan.

\### 🏢 PEMBIMBING INSTANSI

Memverifikasi logbook, memberikan bimbingan, penilaian, dan evaluasi mahasiswa.

\---

\## DASHBOARD & NOTIFIKASI

\### Dashboard

\- Pengajuan PKL

\- Penempatan

\- Logbook

\- Dokumen

\- Nilai & Evaluasi

\### Notifikasi (untuk semua peran)

\- Rapat

\- Informasi

\- Pengajuan

\- Penempatan

\- Logbook

\- Dokumen

\- Nilai & Evaluasi

\---

\## ALUR AKTIVITAS PER PERAN

\### 1. AKTIVITAS MAHASISWA UTAMA

1\. Ajukan PKL

2\. Lihat Status

3\. Lihat Penempatan

4\. Isi Logbook

5\. Upload Dokumen

6\. Lihat Nilai

\---

\### 2. ALUR ADMINISTRATOR UTAMA

1\. Verifikasi Pengajuan

2\. Menetapkan Penempatan

3\. Monitoring

4\. Rekap & Laporan

\---

\### 3. ALUR PEMBIMBING UTAMA

1\. Validasi Logbook

2\. Beri Catatan/Revisi

3\. Beri Penilaian & Evaluasi

\---

\## LEGENDA / KETERANGAN

\- \*\*Menu Utama\*\*

\- \*\*Sub Menu\*\*

\- \*\*Alur Proses\*\*

\- \*\*Mahasiswa\*\*

\- \*\*Administrator\*\*

\- \*\*Pembimbing Instansi\*\*

\---

\## CATATAN SISTEM

\- Mahasiswa terlebih dahulu melakukan \*\*Pengajuan PKL\*\* ke instansi.

\- Admin memverifikasi pengajuan, kemudian melakukan \*\*penempatan\*\* mahasiswa.

\- Mahasiswa melaksanakan PKL, mengisi \*\*logbook\*\* dan mengunggah \*\*dokumen\*\*.

\- Pembimbing Instansi memvalidasi logbook, memberikan \*\*catatan\*\*, serta memberikan \*\*penilaian & evaluasi\*\*.

\- Admin melakukan \*\*monitoring\*\* dan menghasilkan \*\*laporan\*\*.

**Tabel Master (7 Data Master)**

| **No** | **Nama Tabel**          | **Fungsi**                                                                     |
| ------ | ----------------------- | ------------------------------------------------------------------------------ |
| 1      | **Users**               | Menyimpan akun login seluruh pengguna (Admin, Mahasiswa, Pembimbing Instansi). |
| 2      | **Roles**               | Menyimpan jenis hak akses pengguna (Admin, Mahasiswa, Pembimbing).             |
| 3      | **Mahasiswa**           | Menyimpan data identitas mahasiswa peserta PKL.                                |
| 4      | **Instansi**            | Menyimpan data perusahaan atau instansi tempat PKL.                            |
| 5      | **pembimbing_instansi** | Menyimpan data pembimbing dari setiap Divisi dalam Instansi.                   |
| 6      | **periode_pkl**         | Menyimpan periode PKL (semester, tanggal mulai, tanggal selesai, status).      |
| 7      | **fasilitas**           | Menyimpan daftar fasilitas yang dapat diberikan kepada mahasiswa selama PKL.   |

**Tabel Transaksi (7 Data Transaksi)**

| **No** | **Nama Tabel**          | **Fungsi**                                                                                                                         |
| ------ | ----------------------- | ---------------------------------------------------------------------------------------------------------------------------------- |
| 1      | **pengajuan_pkl**       | Menyimpan data pengajuan PKL yang dibuat mahasiswa beserta statusnya (Menunggu, Disetujui, Ditolak).                               |
| 2      | **penempatan_pkl**      | Menyimpan hasil penempatan mahasiswa ke instansi beserta pembimbing, periode, dan tanggal mulai PKL.                               |
| 3      | **logbook**             | Menyimpan aktivitas harian mahasiswa selama PKL.                                                                                   |
| 4      | **validasi_logbook**    | Menyimpan hasil validasi logbook oleh pembimbing instansi beserta komentar dan status validasi.                                    |
| 5      | **dokumen_pkl**         | Menyimpan seluruh dokumen PKL yang diunggah mahasiswa (surat pengantar, laporan akhir, sertifikat, dan dokumen pendukung lainnya). |
| 6      | **penilaian**           | Menyimpan nilai akhir dan evaluasi yang diberikan oleh pembimbing instansi.                                                        |
| 7      | **mahasiswa_fasilitas** | Menyimpan data fasilitas yang diterima setiap mahasiswa selama PKL.                                                                |

\# STRUKTUR TABEL DATABASE SIMAPRA

\## (LENGKAP DENGAN TABEL INSTANSI)

\---

\## DAFTAR TABEL

1\. \[roles\](#tabel-roles)

2\. \[users\](#tabel-users)

3\. \[mahasiswa\](#tabel-mahasiswa)

4\. \[pembimbing_instansi\](#tabel-pembimbing_instansi)

5\. \[instansi\](#tabel-instansi) ⬅️ \*\*TAMBAHAN\*\*

6\. \[pengajuan_pkl\](#tabel-pengajuan_pkl)

7\. \[penempatan_pkl\](#tabel-penempatan_pkl)

8\. \[audit_log\](#tabel-audit_log)

9\. \[dokument_pkl\](#tabel-dokument_pkl)

10\. \[penilaian\](#tabel-penilaian)

11\. \[mahasiswa_fasilitas\](#tabel-mahasiswa_fasilitas)

\---

\## TABEL ROLES

| Kolom | Tipe Data | Keterangan |

|-------------|---------------|--------------------------|

| \*\*PK\*\* id | BIGINT | Primary Key |

| name | VARCHAR(50) | Nama peran |

| description | VARCHAR(255) | Deskripsi peran |

| created_at | TIMESTAMP | Waktu dibuat |

\---

\## TABEL USERS

| Kolom | Tipe Data | Keterangan |

|-------------|---------------|--------------------------|

| \*\*PK\*\* id | BIGINT | Primary Key |

| role_id | BIGINT | Foreign Key → roles.id |

| name | VARCHAR(100) | Nama pengguna |

| email | VARCHAR(100) | Email pengguna |

| password | VARCHAR(255) | Password (hash) |

| phone | VARCHAR(20) | Nomor telepon |

| status | TINYINT | Status akun |

| created_at | TIMESTAMP | Waktu dibuat |

| updated_at | TIMESTAMP | Waktu diperbarui |

\---

\## TABEL MAHASISWA

| Kolom | Tipe Data | Keterangan |

|----------------|---------------|--------------------------------|

| \*\*PK\*\* id | BIGINT | Primary Key |

| user_id | BIGINT | Foreign Key → users.id |

| nisn | VARCHAR(20) | Nomor Induk Siswa Nasional |

| program_stud | VARCHAR(100) | Program studi |

| angkatan | YEAR | Tahun angkatan |

| created_at | TIMESTAMP | Waktu dibuat |

| updated_at | TIMESTAMP | Waktu diperbarui |

\---

\## TABEL PEMBIMBING_INSTANSI

| Kolom | Tipe Data | Keterangan |

|----------------|---------------|--------------------------------|

| \*\*PK\*\* id | BIGINT | Primary Key |

| user_id | BIGINT | Foreign Key → users.id |

| instansi_id | BIGINT | Foreign Key → instansi.id |

| nama | VARCHAR(100) | Nama pembimbing |

| jabatan | VARCHAR(100) | Jabatan di instansi |

| created_at | TIMESTAMP | Waktu dibuat |

| updated_at | TIMESTAMP | Waktu diperbarui |

\---

\## TABEL INSTANSI ⬅️ \*\*TAMBAHAN\*\*

| Kolom | Tipe Data | Keterangan |

|----------------|---------------|--------------------------------|

| \*\*PK\*\* id | BIGINT | Primary Key |

| nama_instansi | VARCHAR(100) | Nama instansi/perusahaan |

| alamat | TEXT | Alamat lengkap instansi |

| kota | VARCHAR(50) | Kota tempat instansi |

| provinsi | VARCHAR(50) | Provinsi tempat instansi |

| kode_pos | VARCHAR(10) | Kode pos |

| telepon | VARCHAR(20) | Nomor telepon instansi |

| email | VARCHAR(100) | Email instansi |

| website | VARCHAR(100) | Website instansi (opsional) |

| bidang_usaha | VARCHAR(100) | Bidang usaha instansi |

| status_aktif | TINYINT | Status aktif instansi (1=aktif, 0=nonaktif) |

| created_at | TIMESTAMP | Waktu dibuat |

| updated_at | TIMESTAMP | Waktu diperbarui |

\---

\## TABEL PENGAJUAN_PKL

| Kolom | Tipe Data | Keterangan |

|-------------------|-------------------------|-----------------------------------|

| \*\*PK\*\* id | BIGINT | Primary Key |

| mahasiswa_id | BIGINT | Foreign Key → mahasiswa.id |

| instansi_id | BIGINT | Foreign Key → instansi.id |

| tanggal_pengajuan | DATE | Tanggal pengajuan |

| status | ENUM('menunggu', 'diterima', 'ditolak') | Status pengajuan |

| catatan | TEXT | Catatan tambahan |

| created_at | TIMESTAMP | Waktu dibuat |

| updated_at | TIMESTAMP | Waktu diperbarui |

\---

\## TABEL PENEMPATAN_PKL

| Kolom | Tipe Data | Keterangan |

|-------------------|-------------------------|-----------------------------------|

| \*\*PK\*\* id | BIGINT | Primary Key |

| pengajuan_id | BIGINT | Foreign Key → pengajuan_pkl.id |

| mahasiswa_id | BIGINT | Foreign Key → mahasiswa.id |

| instansi_id | BIGINT | Foreign Key → instansi.id |

| periode_mulai | DATE | Tanggal mulai PKL |

| periode_selesai | DATE | Tanggal selesai PKL |

| status | ENUM('aktif', 'selesai', 'batal') | Status penempatan |

| created_at | TIMESTAMP | Waktu dibuat |

| updated_at | TIMESTAMP | Waktu diperbarui |

\---

\## TABEL AUDIT_LOG

| Kolom | Tipe Data | Keterangan |

|-------------|---------------|--------------------------|

| \*\*PK\*\* id | BIGINT | Primary Key |

| user_id | BIGINT | Foreign Key → users.id |

| action | VARCHAR(100) | Aksi yang dilakukan |

| description | TEXT | Deskripsi aksi |

| ip_address | VARCHAR(100) | Alamat IP pengguna |

| created_at | TIMESTAMP | Waktu dibuat |

\---

\## TABEL DOKUMENT_PKL

| Kolom | Tipe Data | Keterangan |

|----------------|---------------|--------------------------|

| \*\*PK\*\* id | BIGINT | Primary Key |

| user_id | BIGINT | Foreign Key → users.id |

| jenis_dokumen | VARCHAR(100) | Jenis dokumen |

| file_path | VARCHAR(100) | Path penyimpanan file |

| keterangan | VARCHAR(100) | Keterangan tambahan |

| created_at | TIMESTAMP | Waktu dibuat |

| updated_at | TIMESTAMP | Waktu diperbarui |

\---

\## TABEL PENILAIAN

| Kolom | Tipe Data | Keterangan |

|-------------------|-------------------------|----------------------------------|

| \*\*PK\*\* id | BIGINT | Primary Key |

| user_id | BIGINT | Foreign Key → users.id |

| nilai | VARCHAR(100) | Nilai (misal: A, B, C, dst) |

| komentar | VARCHAR(100) | Komentar penilaian |

| tanggal_pengajuan | DATE | Tanggal penilaian |

| status | ENUM('sangat', 'sangat')| \*Perlu dicek ulang nilai ENUM\* |

| created_at | TIMESTAMP | Waktu dibuat |

| updated_at | TIMESTAMP | Waktu diperbarui |

\---

\## TABEL MAHASISWA_FASILITAS

| Kolom | Tipe Data | Keterangan |

|-------------|---------------|--------------------------|

| \*\*PK\*\* id | BIGINT | Primary Key |

| user_id | BIGINT | Foreign Key → users.id |

| keterangan | VARCHAR(100) | Keterangan fasilitas |

| status | VARCHAR(100) | Status fasilitas |

| created_at | TIMESTAMP | Waktu dibuat |

| updated_at | TIMESTAMP | Waktu diperbarui |

\---

\## RELASI ANTAR TABEL (LENGKAP)

| Tabel | Foreign Key | Merujuk ke | Jenis Relasi |

|--------------------|--------------------|----------------------|--------------|

| users | role_id | roles.id | Many-to-One |

| mahasiswa | user_id | users.id | One-to-One |

| pembimbing_instansi| user_id | users.id | One-to-One |

| instansi| instansi_id | instansi.id | Many-to-One |

| pengajuan_pkl | mahasiswa_id | mahasiswa.id | Many-to-One |

| pengajuan_pkl | instansi_id | instansi.id | Many-to-One |

| penempatan_pkl | pengajuan_id | pengajuan_pkl.id | One-to-One |

| penempatan_pkl | mahasiswa_id | mahasiswa.id | Many-to-One |

| penempatan_pkl | instansi_id | instansi.id | Many-to-One |

| audit_log | user_id | users.id | Many-to-One |

| dokument_pkl | user_id | users.id | Many-to-One |

| penilaian | user_id | users.id | Many-to-One |

| mahasiswa_fasilitas| user_id | users.id | Many-to-One |

\---

\## DIAGRAM RELASI (Mermaid.js)

\`\`\`mermaid

erDiagram

roles ||--o{ users : "memiliki"

users ||--|| mahasiswa : "adalah"

users ||--|| pembimbing_instansi : "adalah"

pembimbing_instansi }o--|| instansi : "bekerja di"

mahasiswa ||--o{ pengajuan_pkl : "mengajukan"

pengajuan_pkl }o--|| instansi : "diajukan ke"

pengajuan_pkl ||--|| penempatan_pkl : "menghasilkan"

penempatan_pkl }o--|| mahasiswa : "untuk"

penempatan_pkl }o--|| instansi : "di"

users ||--o{ audit_log : "mencatat"

users ||--o{ dokument_pkl : "mengunggah"

users ||--o{ penilaian : "dinilai"

users ||--o{ mahasiswa_fasilitas : "mendapat"

roles {

BIGINT id PK

VARCHAR(50) name

VARCHAR(255) description

TIMESTAMP created_at

}

users {

BIGINT id PK

BIGINT role_id FK

VARCHAR(100) name

VARCHAR(100) email

VARCHAR(255) password

VARCHAR(20) phone

TINYINT status

TIMESTAMP created_at

TIMESTAMP updated_at

}

instansi {

BIGINT id PK

VARCHAR(100) nama_instansi

TEXT alamat

VARCHAR(50) kota

VARCHAR(50) provinsi

VARCHAR(10) kode_pos

VARCHAR(20) telepon

VARCHAR(100) email

VARCHAR(100) website

VARCHAR(100) bidang_usaha

TINYINT status_aktif

TIMESTAMP created_at

TIMESTAMP updated_at

}

mahasiswa {

BIGINT id PK

BIGINT user_id FK

VARCHAR(20) nisn

VARCHAR(100) program_stud

YEAR angkatan

TIMESTAMP created_at

TIMESTAMP updated_at

}

pembimbing_instansi {

BIGINT id PK

BIGINT user_id FK

BIGINT instansi_id FK

VARCHAR(100) nama

VARCHAR(100) jabatan

TIMESTAMP created_at

TIMESTAMP updated_at

}

pengajuan_pkl {

BIGINT id PK

BIGINT mahasiswa_id FK

BIGINT instansi_id FK

DATE tanggal_pengajuan

ENUM status

TEXT catatan

TIMESTAMP created_at

TIMESTAMP updated_at

}

penempatan_pkl {

BIGINT id PK

BIGINT pengajuan_id FK

BIGINT mahasiswa_id FK

BIGINT instansi_id FK

DATE periode_mulai

DATE periode_selesai

ENUM status

TIMESTAMP created_at

TIMESTAMP updated_at

}

audit_log {

BIGINT id PK

BIGINT user_id FK

VARCHAR(100) action

TEXT description

VARCHAR(100) ip_address

TIMESTAMP created_at

}

dokument_pkl {

BIGINT id PK

BIGINT user_id FK

VARCHAR(100) jenis_dokumen

VARCHAR(100) file_path

VARCHAR(100) keterangan

TIMESTAMP created_at

TIMESTAMP updated_at

}

penilaian {

BIGINT id PK

BIGINT user_id FK

VARCHAR(100) nilai

VARCHAR(100) komentar

DATE tanggal_pengajuan

ENUM status

TIMESTAMP created_at

TIMESTAMP updated_at

}

mahasiswa_fasilitas {

BIGINT id PK

BIGINT user_id FK

VARCHAR(100) keterangan

VARCHAR(100) status

TIMESTAMP created_at

TIMESTAMP updated_at

}

**Konsep Kerja SIMAPRA**

SIMAPRA menerapkan konsep sistem informasi terintegrasi, di mana seluruh data PKL tersimpan dalam satu basis data dan dapat diakses sesuai hak akses masing-masing pengguna.Alur kerja sistem dimulai dari administrator yang mengelola data mahasiswa, tempat PKL, dan penempatan DPL.

Selanjutnya, mahasiswa melaksanakan PKL dengan mengisi logbook harian dan mengunggah dokumen yang diperlukan. Dosen Pembimbing Lapangan kemudian memvalidasi logbook, memberikan bimbingan, serta melakukan penilaian. Seluruh data yang telah diproses akan direkap secara otomatis sehingga administrator dapat menghasilkan laporan pelaksanaan PKL dengan lebih cepat dan akurat.

Dengan konsep tersebut, SIMAPRA mampu meningkatkan efisiensi administrasi PKL, mempermudah proses monitoring, serta menyediakan informasi yang akurat dan terdokumentasi dengan baik bagi seluruh pihak yang terlibat.

**Data Fasilitas Mahasiswa**

Admin dapat menentukan fasilitas yang diterima mahasiswa selama menjalani PKL, seperti:

- Transportasi
- Konsumsi
- Seragam
- Sertifikat
- Laptop
- Akses Sistem
- Ruang Kerja
- Pembimbing Lapangan
- Uang Saku (jika ada)

Setiap fasilitas memiliki informasi:

- Nama Mahasiswa
- Nama Fasilitas
- Tanggal Diberikan
- Status (Sudah/Belum)
- Catatan

\# AKTOR & AKTIVITAS SISTEM PKL

\---

\## 👤 ADMIN HR

\- Login

\- Kelola Master Data

\- Verifikasi Pengajuan

\- Menentukan Penempatan

\- Monitoring PKL

\- Upload Dokumen

\- Rekap / Cetak Laporan

\---

\## 🎓 MAHASISWA

\- Login

\- Pengajuan PKL

\- Isi Logbook

\- Upload Dokumen

\---

\## 🏢 PEMBIMBING INSTANSI

\- Login

\- Validasi Logbook

\- Memberikan Catatan dan Evaluasi

\- Input Nilai

\---

\## 📋 RINGKASAN AKTIVITAS PER AKTOR

| No | Aktivitas | Admin HR | Mahasiswa | Pembimbing Instansi |

|----|-----------|:--------:|:---------:|:-------------------:|

| 1 | Login | ✅ | ✅ | ✅ |

| 2 | Kelola Master Data | ✅ | | |

| 3 | Pengajuan PKL | | ✅ | |

| 4 | Verifikasi Pengajuan | ✅ | | |

| 5 | Menentukan Penempatan | ✅ | | |

| 6 | Isi Logbook | | ✅ | |

| 7 | Validasi Logbook | | | ✅ |

| 8 | Memberikan Catatan dan Evaluasi | | | ✅ |

| 9 | Input Nilai | | | ✅ |

| 10 | Monitoring PKL | ✅ | | |

| 11 | Upload Dokumen | ✅ | ✅ | |

| 12 | Rekap / Cetak Laporan | ✅ | | |

\---

\## 🔄 ALUR PROSES SINGKAT

\`\`\`mermaid

flowchart LR

M\[Mahasiswa\] -->|Pengajuan PKL| A\[Admin HR\]

A -->|Verifikasi & Penempatan| M

M -->|Isi Logbook & Upload Dokumen| P\[Pembimbing Instansi\]

P -->|Validasi & Nilai| M

A -->|Monitoring & Laporan| A

\# PROSES LOGIN SISTEM PKL

\---

\## AKTOR

\- Admin

\- Mahasiswa

\- Pembimbing Instansi

\---

\## FLOWCHART LOGIN

\`\`\`mermaid

flowchart TD

A\[Mulai\] --> B\[Buka Halaman Login\]

B --> C\[Masukkan Username dan Password\]

C --> D\[Klik Login\]

D --> E\[Sistem Validasi Akun\]

E --> F{Akun valid?}

F -->|Ya| G\[Berhasil Login\]

F -->|Tidak| H\[Tampilkan Pesan Gagal\]

H --> I\[Kembali ke Login\]

I --> B

G --> J\[Akses Dashboard sesuai Peran\]

J --> K\[Selesai\]

\# PROSES PENGAJUAN PKL (MAHASISWA)

\---

\## AKTOR

\- Mahasiswa

\---

\## FLOWCHART PENGAJUAN PKL

\`\`\`mermaid

flowchart TD

A\[Mulai\] --> B\[Login\]

B --> C\[Pilih Menu Pengajuan PKL\]

C --> D\[Pilih Instansi\]

D --> E\[Isi form pengajuan\]

E --> F\[Upload surat pengantar\]

F --> G\[Klik Kirim\]

G --> H{Validasi kelengkapan data?}

H -->|Tidak| I\[Tampilkan pesan kesalahan\]

I --> J\[Kembali ke Isi form pengajuan\]

J --> E

H -->|Ya| K\[Simpan pengajuan\]

K --> L\[Status Menunggu Verifikasi\]

L --> M\[End\]

\# PROSES VERIFIKASI PENGAJUAN PKL (ADMIN HR)

\---

\## AKTOR

\- Admin HR

\---

\## FLOWCHART VERIFIKASI PENGAJUAN

\`\`\`mermaid

flowchart TD

A\[Mulai\] --> B\[Login\]

B --> C\[Buka menu verifikasi\]

C --> D\[Pilih pengajuan\]

D --> E\[Periksa data\]

E --> F{Apakah data layak?}

F -->|Tidak| G\[Status "Ditolak"\]

G --> H\[Berikan catatan/minta revisi\]

H --> I\[Berikan notifikasi ke mahasiswa\]

I --> J\[End\]

F -->|Ya| K\[Status "Disetujui"\]

K --> L\[Berikan notifikasi ke mahasiswa\]

L --> M\[End\]

\# PROSES PENEMPATAN MAHASISWA (ADMIN HR)

\---

\## AKTOR

\- Admin HR

\- Mahasiswa

\---

\## FLOWCHART PENEMPATAN MAHASISWA

\`\`\`mermaid

flowchart TD

A\[Mulai\] --> B\[Admin HR: Login\]

B --> C\[Buka menu penempatan\]

C --> D\[Pilih mahasiswa\]

D --> E\[Pilih instansi\]

E --> F\[Pilih pembimbing instansi\]

F --> G\[Pilih periode PKL\]

G --> H\[Tetapkan fasilitas\]

H --> I\[Simpan penempatan\]

I --> J\[Sistem: status = Aktif\]

J --> K\[Mahasiswa melihat informasi penempatan\]

K --> L\[End\]

\# PROSES ISI LOGBOOK (MAHASISWA)

\---

\## AKTOR

\- Mahasiswa

\---

\## FLOWCHART ISI LOGBOOK

\`\`\`mermaid

flowchart TD

A\[Mulai\] --> B\[Login\]

B --> C\[Buka Menu Logbook\]

C --> D\[Tambah Aktivitas\]

D --> E\[Isi Aktivitas Harian\]

E --> F\[Upload Dokumentasi\]

F --> G\[Klik Simpan\]

G --> H\[Sistem: Simpan Data Logbook\]

H --> I{Data Valid?}

I -->|Ya| J\[Set Status = Menunggu Validasi\]

I -->|Tidak| K\[Tampilkan pesan kesalahan\]

K --> L\[Kembali ke Isi Aktivitas Harian\]

L --> E

J --> M\[Konfirmasi Simpan Berhasil\]

M --> N\[End\]

\# PROSES VALIDASI LOGBOOK (PEMBIMBING INSTANSI)

\---

\## AKTOR

\- Pembimbing Instansi

\- Mahasiswa

\---

\## FLOWCHART VALIDASI LOGBOOK

\`\`\`mermaid

flowchart TD

A\[Mulai\] --> B\[Pembimbing: Login\]

B --> C\[Buka daftar logbook\]

C --> D\[Pilih mahasiswa\]

D --> E\[Periksa aktivitas\]

E --> F{Aktivitas sesuai?}

F -->|Tidak| G\[Berikan catatan\]

G --> H\[Sistem: status = Revisi\]

H --> I\[Mahasiswa memperbaiki\]

I --> J\[Validasi ulang\]

J --> E

F -->|Ya| K\[Sistem: status = Tervalidasi\]

K --> L\[End\]

\# PROSES UPLOAD DOKUMEN PKL (MAHASISWA)

\---

\## AKTOR

\- Mahasiswa

\---

\## FLOWCHART UPLOAD DOKUMEN PKL

\`\`\`mermaid

flowchart TD

A\[Mulai\] --> B\[Login\]

B --> C\[Menu Dokumen\]

C --> D\[Pilih jenis dokumen\]

D --> E\[Upload file\]

E --> F{Apakah file sesuai?}

F -->|Tidak| G\[Upload ulang\]

G --> E

F -->|Ya| H\[Klik Simpan Dokumen\]

H --> I\[Dokumen berhasil diupload\]

I --> J\[End\]

\# PROSES PENILAIAN MAHASISWA (PEMBIMBING INSTANSI)

\---

\## AKTOR

\- Pembimbing Instansi

\---

\## FLOWCHART PENILAIAN MAHASISWA

\`\`\`mermaid

flowchart TD

A\[Mulai\] --> B\[Pembimbing: Login\]

B --> C\[Pilih Mahasiswa\]

C --> D\[Isi Nilai\]

D --> E\[Isi Evaluasi\]

E --> F\[Isi Rekomendasi\]

F --> G\[Simpan Penilaian\]

G --> H\[Sistem: Notifikasi nilai tersimpan\]

H --> I\[Sistem: status PKL = Selesai\]

I --> J\[End\]

\# PROSES MONITORING PKL (ADMINISTRATOR)

\---

\## AKTOR

\- Administrator

\---

\## FLOWCHART MONITORING PKL

\`\`\`mermaid

flowchart TD

A\[Mulai\] --> B\[Login\]

B --> C\[Dashboard\]

C --> D\[Lihat Pengajuan\]

C --> E\[Lihat Penempatan\]

C --> F\[Lihat Logbook\]

C --> G\[Lihat Dokumen\]

D --> H\[Sistem: Generate Monitoring Progres\]

E --> H

F --> H

G --> H

H --> I{Tampilkan Dashboard Monitoring}

I --> J\[Export PDF\]

J --> K\[Export Data PDF\]

K --> L\[End\]

I --> M\[Lihat Dashboard\]

M --> L

\# PROSES REKAP DATA DAN LAPORAN (ADMINISTRATOR)

\---

\## AKTOR

\- Administrator

\---

\## FLOWCHART REKAP DATA DAN LAPORAN

\`\`\`mermaid

flowchart TD

A\[Mulai\] --> B\[Login\]

B --> C\[Pilih Menu Laporan\]

C --> D\[Pilih Periode\]

D --> E\[Pilih Jenis Laporan\]

E --> F\[Sistem: Generate Laporan\]

F --> G{Pilih Format Ekspor}

G -->|Excel| H\[Export ke Excel\]

G -->|PDF| I\[Export ke PDF\]

G -->|Dashboard| J\[Tampilkan di Dashboard\]

H --> K\[End\]

I --> K

J --> K

\# DOKUMENTASI SISTEM INFORMASI PKL / MAGANG MAHASISWA

\## DAFTAR ISI

1\. \[Arsitektur Sistem\](#arsitektur-sistem)

2\. \[Sequence Diagram - Login\](#sequence-diagram-login)

3\. \[Sequence Diagram - Pengajuan PKL\](#sequence-diagram-pengajuan-pkl)

4\. \[Sequence Diagram - Verifikasi Pengajuan\](#sequence-diagram-verifikasi-pengajuan)

5\. \[Sequence Diagram - Penempatan Mahasiswa\](#sequence-diagram-penempatan-mahasiswa)

6\. \[Sequence Diagram - Pengisian Logbook\](#sequence-diagram-pengisian-logbook)

7\. \[Sequence Diagram - Validasi Logbook\](#sequence-diagram-validasi-logbook)

8\. \[Sequence Diagram - Upload Dokumen PKL\](#sequence-diagram-upload-dokumen-pkl)

9\. \[Sequence Diagram - Penilaian PKL\](#sequence-diagram-penilaian-pkl)

10\. \[Sequence Diagram - Monitoring PKL\](#sequence-diagram-monitoring-pkl)

11\. \[Sequence Diagram - Rekap dan Laporan\](#sequence-diagram-rekap-dan-laporan)

12\. \[Alur Proses Utama\](#alur-proses-utama)

\---

\## ARSITEKTUR SISTEM

\### STRUKTUR ARSITEKTUR

\`\`\`mermaid

flowchart TB

subgraph PENGGUNA\["👤 PENGGUNA"\]

A1\[Administrator\]

A2\[Mahasiswa\]

A3\[Dosen Pembimbing DPL\]

end

subgraph PROTOKOL\["🌐 PROTOKOL"\]

P\[HTTP / HTTPS\]

end

subgraph CLIENT\["💻 CLIENT BROWSER"\]

C1\[Google Chrome\]

C2\[Microsoft Edge\]

C3\[Mozilla Firefox\]

C4\[Safari\]

end

subgraph PRESENTASI\["🎨 PRESENTATION LAYER Frontend"\]

F1\[HTML5\]

F2\[Tailwind CSS\]

F3\[JavaScript\]

end

subgraph APLIKASI\["⚙️ APPLICATION LAYER Backend PHP"\]

B1\[Authentication\]

B2\[Session Management\]

B3\[Role Management\]

B4\[CRUD Mahasiswa\]

B5\[CRUD Tempat PKL\]

B6\[CRUD DPL\]

B7\[Logbook Management\]

B8\[Document Management\]

B9\[Monitoring PKL\]

B10\[Assessment Management\]

end

subgraph REPORT\["📊 REPORT GENERATOR"\]

R\[Report Generator\]

end

subgraph DATABASE\["🗄️ DATABASE SERVER"\]

DB\[(MySQL)\]

subgraph TABEL\["Tabel"\]

T1\[Users\]

T2\[Mahasiswa\]

T3\[Dosen_Pembimbing\]

T4\[Tempat_Pkl\]

T5\[Pendaftaran_Pkl\]

T6\[logbook\]

T7\[dokumen\]

T8\[penilaian\]

end

end

PENGGUNA --> PROTOKOL

PROTOKOL --> CLIENT

CLIENT --> PRESENTASI

PRESENTASI --> APLIKASI

APLIKASI --> REPORT

REPORT --> DATABASE

APLIKASI --> DATABASE

sequenceDiagram

participant User as User

participant LoginPage as Halaman Login

participant AuthController as Auth Controller

participant AuthService as Auth Service

participant Database as Database

User->>LoginPage: 1. Buka halaman login

LoginPage->>User: 2. Tampilkan form login

User->>LoginPage: 3. Masukkan username & password

User->>LoginPage: 4. Kirim data login

LoginPage->>AuthController: 4. Kirim data login

AuthController->>AuthService: 5. Verifikasi akun

AuthService->>Database: 6. Ambil data akun

Database-->>AuthService: 7. Kembalikan data akun

AuthService-->>AuthController: 8. Validasi data

AuthController-->>LoginPage: 9. Hasil verifikasi (valid/tidak valid)

alt Valid

AuthController->>AuthService: 10. Buat session

LoginPage->>User: 11. Tampilkan dashboard sesuai role

else Tidak Valid

LoginPage->>User: Tampilkan pesan gagal login

End

sequenceDiagram

participant Mahasiswa

participant HalamanPengajuan as Halaman Pengajuan

participant PengajuanController as Pengajuan Controller

participant PengajuanService as Pengajuan Service

participant Database

Mahasiswa->>HalamanPengajuan: 1. Pilih menu Pengajuan PKL

HalamanPengajuan->>Mahasiswa: 2. Tampilkan form pengajuan

Mahasiswa->>HalamanPengajuan: 3. Pilih instansi

Mahasiswa->>HalamanPengajuan: 4. Isi data pengajuan

Mahasiswa->>HalamanPengajuan: 5. Unggah surat pengantar

Mahasiswa->>HalamanPengajuan: 6. Tekan tombol Kirim

HalamanPengajuan->>PengajuanController: 7. Kirim data pengajuan

PengajuanController->>PengajuanService: 7. Kirim data pengajuan

PengajuanService->>PengajuanController: 8. Validasi data

PengajuanController->>Database: 9. Simpan ke tabel pengajuan_pkl

Database-->>PengajuanController: 9.1 Data tersimpan (status="Menunggu Verifikasi")

PengajuanController-->>HalamanPengajuan: 10. Pengembalian hasil (berhasil)

HalamanPengajuan->>Mahasiswa: 11. Tampilkan notifikasi berhasil

Mahasiswa-->>Mahasiswa: 12. Notifikasi pengajuan berhasil

sequenceDiagram

participant Admin

participant HalamanVerifikasi as Halaman Verifikasi

participant VerifikasiController as Verifikasi Controller

participant Database

participant Mahasiswa

Admin->>HalamanVerifikasi: 1. Buka menu Verifikasi

HalamanVerifikasi->>Admin: 2. Tampilkan daftar pengajuan

Admin->>HalamanVerifikasi: 3. Pilih salah satu pengajuan

HalamanVerifikasi->>Admin: 4. Tampilkan detail pengajuan

Admin->>HalamanVerifikasi: 5. Lakukan pemeriksaan

Admin->>HalamanVerifikasi: 6. Buat keputusan

HalamanVerifikasi->>VerifikasiController: 7. Kirim keputusan + catatan

VerifikasiController->>Database: 8. Perbarui status pengajuan

Database-->>VerifikasiController: 9. Konfirmasi berhasil diperbarui

alt Disetujui

VerifikasiController->>Database: 10a. Set status = "Disetujui"

Database-->>VerifikasiController: 10b. Konfirmasi

VerifikasiController-->>HalamanVerifikasi: 11. Notifikasi keputusan

HalamanVerifikasi->>Admin: 11. Notifikasi keputusan berhasil

VerifikasiController->>Mahasiswa: 12. Kirim notifikasi ke Mahasiswa

else Ditolak

VerifikasiController->>Database: 10a. Set status = "Ditolak" + catatan revisi

Database-->>VerifikasiController: 10b. Konfirmasi

VerifikasiController-->>HalamanVerifikasi: 11. Notifikasi keputusan

HalamanVerifikasi->>Admin: 11. Notifikasi keputusan berhasil

VerifikasiController->>Mahasiswa: 12. Kirim notifikasi ke Mahasiswa

End

sequenceDiagram

participant Admin

participant HalamanPenempatan as Halaman Penempatan

participant PenempatanController as Penempatan Controller

participant Database

participant Mahasiswa

Admin->>HalamanPenempatan: 1. Buka menu Penempatan

HalamanPenempatan->>Admin: 2. Tampilkan daftar pengajuan disetujui

Admin->>HalamanPenempatan: 3. Pilih mahasiswa

Admin->>HalamanPenempatan: 4. Pilih instansi

Admin->>HalamanPenempatan: 5. Pilih pembimbing instansi

Admin->>HalamanPenempatan: 6. Pilih periode PKL

Admin->>HalamanPenempatan: 7. Tentukan fasilitas

Admin->>HalamanPenempatan: 8. Simpan penempatan

HalamanPenempatan->>PenempatanController: 8. Kirim data penempatan

PenempatanController->>Database: 9. Simpan ke tabel penempatan_pkl

Database-->>PenempatanController: 10. Data berhasil disimpan (status="Aktif")

PenempatanController-->>HalamanPenempatan: 11. Konfirmasi berhasil

HalamanPenempatan->>Admin: 11. Konfirmasi berhasil

PenempatanController->>Mahasiswa: 12. Kirim informasi penempatan

sequenceDiagram

participant Mahasiswa

participant HalamanLogbook as Halaman Logbook

participant LogbookController as Logbook Controller

participant Database

participant Pembimbing

Mahasiswa->>HalamanLogbook: 1. Buka menu Logbook

HalamanLogbook->>Mahasiswa: 2. Tampilkan riwayat logbook

Mahasiswa->>HalamanLogbook: 3. Pilih Tambah

HalamanLogbook->>Mahasiswa: 3. Tampilkan form tambah logbook

Mahasiswa->>HalamanLogbook: 4. Isi data (Tanggal, Aktivitas, Dokumentasi)

Mahasiswa->>HalamanLogbook: 5. Tekan Simpan

HalamanLogbook->>LogbookController: 6. Kirim data logbook

LogbookController->>Database: 7. Simpan ke tabel logbook

Database-->>LogbookController: 8. Data berhasil disimpan (status="Menunggu Validasi")

LogbookController-->>HalamanLogbook: 9. Konfirmasi berhasil

HalamanLogbook->>Mahasiswa: 10. Notifikasi berhasil disimpan

LogbookController->>Pembimbing: 11. Kirim notifikasi logbook baru

sequenceDiagram

participant Pembimbing

participant HalamanValidasi as Halaman Validasi

participant ValidasiController as Validasi Controller

participant Database

participant Mahasiswa

Pembimbing->>HalamanValidasi: 1. Buka daftar logbook

HalamanValidasi->>Pembimbing: 2. Tampilkan logbook mahasiswa

Pembimbing->>HalamanValidasi: 3. Baca aktivitas logbook

Pembimbing->>HalamanValidasi: 4. Pilih Validasi

HalamanValidasi->>ValidasiController: 5. Kirim data validasi (id, keputusan, catatan)

alt Sesuai

ValidasiController->>Database: 7a. Update status = "Tervalidasi"

Database-->>ValidasiController: 8a. Konfirmasi berhasil

ValidasiController-->>HalamanValidasi: 9a. Tampilkan hasil validasi

HalamanValidasi->>Pembimbing: 10. Tampilkan hasil validasi

ValidasiController->>Mahasiswa: 11. Kirim notifikasi hasil validasi

else Belum Sesuai

ValidasiController->>Database: 7b. Update status = "Revisi" + catatan

Database-->>ValidasiController: 8b. Konfirmasi berhasil

ValidasiController-->>HalamanValidasi: 9b. Tampilkan hasil validasi + catatan

HalamanValidasi->>Pembimbing: 10. Tampilkan hasil validasi + catatan

ValidasiController->>Mahasiswa: 11. Kirim notifikasi hasil validasi

End

sequenceDiagram

participant Mahasiswa

participant HalamanDokumen as Halaman Dokumen

participant DokumenController as Dokumen Controller

participant Storage as Penyimpanan Server

participant Database

Mahasiswa->>HalamanDokumen: 1. Buka menu Dokumen

HalamanDokumen->>Mahasiswa: 2. Tampilkan halaman Dokumen

Mahasiswa->>HalamanDokumen: 3. Pilih jenis dokumen

Mahasiswa->>HalamanDokumen: 4. Unggah file dokumen

HalamanDokumen->>DokumenController: 5. Kirim file ke server

DokumenController->>DokumenController: 5.1 Validasi format file

DokumenController-->>HalamanDokumen: 5.2 Hasil validasi (berhasil/gagal)

alt Valid

DokumenController->>Storage: 6. Simpan file dokumen

Storage-->>DokumenController: 6.1 File berhasil disimpan

DokumenController->>Database: 7. Simpan data ke tabel dokumen_pkl

Database-->>DokumenController: 7.1 Data berhasil disimpan

DokumenController-->>HalamanDokumen: 8. Tampilkan pesan berhasil

HalamanDokumen->>Mahasiswa: 8. Tampilkan pesan berhasil

else Tidak Valid

DokumenController-->>HalamanDokumen: 5.2 Tampilkan pesan error

HalamanDokumen->>Mahasiswa: 5.2 Tampilkan pesan error

End

sequenceDiagram

participant Pembimbing

participant HalamanPenilaian as Halaman Penilaian

participant PenilaianController as Penilaian Controller

participant Database

participant Mahasiswa

Pembimbing->>HalamanPenilaian: 1. Buka menu Penilaian

HalamanPenilaian->>Pembimbing: 2. Tampilkan daftar mahasiswa

Pembimbing->>HalamanPenilaian: 3. Pilih mahasiswa

Pembimbing->>HalamanPenilaian: 4. Isi nilai

Pembimbing->>HalamanPenilaian: 5. Isi evaluasi

Pembimbing->>HalamanPenilaian: 6. Isi rekomendasi

Pembimbing->>HalamanPenilaian: 7. Kirim data penilaian

HalamanPenilaian->>PenilaianController: 7. Kirim data penilaian

PenilaianController->>Database: 8. Simpan ke tabel penilaian_pkl

Database-->>PenilaianController: 8.1 Data berhasil disimpan

PenilaianController->>Database: 9. Update status PKL = "Selesai"

Database-->>PenilaianController: 9.1 Status berhasil diupdate

PenilaianController-->>HalamanPenilaian: 10. Konfirmasi berhasil

HalamanPenilaian->>Pembimbing: 10. Tampilkan pesan berhasil

PenilaianController->>Mahasiswa: 11. Mahasiswa dapat melihat hasil

sequenceDiagram

participant Admin

participant Dashboard

participant MonitoringController as Monitoring Controller

participant Database

Admin->>Dashboard: 1. Buka Dashboard

Dashboard->>MonitoringController: 2. Request seluruh data PKL

MonitoringController->>Database: 3. Ambil data Pengajuan

Database-->>MonitoringController: 3.1 Data Pengajuan

MonitoringController->>Database: 4. Ambil data Penempatan

Database-->>MonitoringController: 4.1 Data Penempatan

MonitoringController->>Database: 5. Ambil data Logbook

Database-->>MonitoringController: 5.1 Data Logbook

MonitoringController->>Database: 6. Ambil data Penilaian

Database-->>MonitoringController: 6.1 Data Penilaian

MonitoringController->>Database: 7. Ambil data Dokumen

Database-->>MonitoringController: 7.1 Data Dokumen

MonitoringController-->>Dashboard: 8. Kirim seluruh data PKL

Dashboard->>Admin: 9. Tampilkan statistik & ringkasan data

Admin->>Dashboard: 10. Monitoring (grafik, filter, detail)

sequenceDiagram

participant Admin

participant HalamanLaporan as Halaman Laporan

participant LaporanController as Laporan Controller

participant Database

Admin->>HalamanLaporan: 1. Buka menu Laporan

HalamanLaporan->>Admin: 1.1 Tampilkan halaman Laporan

Admin->>HalamanLaporan: 2. Pilih periode

Admin->>HalamanLaporan: 3. Pilih jenis laporan

Admin->>HalamanLaporan: 4. Kirim permintaan laporan

HalamanLaporan->>LaporanController: 4. Kirim permintaan (periode, jenis)

LaporanController->>Database: 5. Ambil data sesuai permintaan

Database-->>LaporanController: 5.1 Data laporan

LaporanController->>LaporanController: 6. Menyusun rekapitulasi data

LaporanController->>LaporanController: 7. Menghasilkan laporan (PDF/Excel)

LaporanController-->>HalamanLaporan: 8. Kirim hasil laporan

HalamanLaporan->>Admin: 8.1 Tampilkan hasil laporan

Admin->>HalamanLaporan: 9. Unduh laporan (PDF/Excel)

HalamanLaporan->>Admin: 9.1 File laporan (PDF/Excel) diunduh

flowchart TD

A\[Mulai\] --> B\[Login\]

B --> C\[Pengajuan PKL\]

C --> D\[Verifikasi Pengajuan\]

D --> E{Hasil Verifikasi?}

E -->|Ditolak| F\[Pengajuan Ditolak\]

F --> G\[Mahasiswa memperbaiki & mengajukan ulang\]

G --> C

E -->|Disetujui| H\[Penempatan Mahasiswa\]

H --> I\[Pengisian Logbook\]

I --> J\[Validasi Logbook\]

J --> K{Hasil Validasi?}

K -->|Revisi| L\[Revisi Logbook\]

L --> M\[Mahasiswa memperbaiki\]

M --> J

K -->|Tervalidasi| N\[Penilaian Mahasiswa\]

N --> O\[Monitoring PKL oleh Administrator\]

O --> P\[Rekap dan Laporan\]

P --> Q\[Selesai\]
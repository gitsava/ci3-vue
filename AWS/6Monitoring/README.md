# Tujuan Pembelajaran
Dengan mempelajari modul ini, Anda akan mengetahui bagaimana cara:

  - Menjelaskan pendekatan yang dapat memantau lingkungan AWS.
  - Menjabarkan manfaat Amazon CloudWatch.
  - Menerangkan manfaat AWS CloudTrail.
  - Memaparkan manfaat dari AWS Trusted Advisor.

Persiapkan diri Anda, pasang sabuk pengaman dengan kencang, dan mari kita mulai perjalanannya!

# Pengenalan ke Pemantauan dan Analitik
Ingat kembali skenario kedai kopi kita. Sebagai pemilik, tentu Anda ingin mengetahui apa yang terjadi di sana sepanjang hari guna memastikan semuanya berjalan lancar.

Tetapi, Anda juga tak ingin hanya berdiri dan diam di sana seharian. Alangkah lebih baiknya Anda bisa mengecek kembali kinerja toko ketika sudah menjelang petang dengan mengajukan beberapa pertanyaan, seperti:

  - Berapa banyak kopi yang terjual?
  - Berapa lama rata-rata waktu tunggu seseorang saat memesan kopi?
  - Apakah persediaan hari ini habis?

Bahkan, akan sangat membantu jika Anda bisa mendapat notifikasi ketika waktu tunggu pemesanan terlalu lama. Sehingga Anda dapat terjun langsung ke sana atau menyuruh pegawai lain membantu pekerjaan tersebut.

Setiap bisnis--termasuk kedai kopi kita--dapat menggunakan metrik untuk mengukur seberapa baik sistem dan proses yang berjalan.

Nah, `proses mengamati sistem; mengumpulkan metrik; dan mengevaluasinya dari waktu ke waktu untuk membuat keputusan atau mengambil tindakan,` disebut dengan `monitoring atau pemantauan`.

Tahukah Anda pentingnya sebuah pemantauan? Kegiatan ini perlu Anda lakukan ketika menggunakan layanan berbasis cloud untuk memastikan sumber daya AWS berjalan sesuai dengan harapan.

Misalnya, Anda dapat melakukan proses scaling (penyesuaian kapasitas) secara otomatis jika sebuah EC2 instance dalam keadaan over-utilized (digunakan secara berlebihan). Atau, Anda juga bisa menerima pemberitahuan jika suatu aplikasi mulai mengirimkan respons kesalahan dengan kecepatan tinggi.

Oke, untuk beberapa modul berikutnya kita akan membahas berbagai layanan yang dapat membantu Anda memonitor lingkungan AWS. Pemantauan dapat digunakan untuk mengukur performa dari sistem, memberi peringatan jika ada yang tak beres, bahkan dapat membantu proses `debugging (identifikasi dan perbaikan eror)`.
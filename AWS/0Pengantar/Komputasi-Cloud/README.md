# Komputasi Cloud
Sebelum kita melangkah ke bagian AWS lebih dalam, mari kita persempit lingkupan pembahasannya, yaitu mengenai definisi kerja dari cloud.

Apa yang tebersit di pikiran Anda saat mendengar kata cloud? Jika Anda membayangkan gumpalan awan, Anda tidak salah karena memang kebanyakan ilustrasi jaringan komputer memuat simbol cloud atau awan yang merupakan perumpamaan dari internet.

Tapi, kenapa internet disimbolkan dengan awan? Nah, menurut newyorker.com, simbol awan dipakai karena merepresentasikan keberadaan data kita ada di suatu tempat di luar sana, mengambang, melayang, nirkabel, tersedia di mana saja dan kapan saja ketika kita membutuhkannya. Istilah awan juga menarik karena merupakan kebalikan dari dunia material yang riil seperti colokan, kabel, hard disk, dsb [2].

Sekarang, apa yang dimaksud dengan cloud computing? Menurut AWS, cloud computing--di kelas ini kita menyebutnya dengan komputasi cloud--adalah penggunaan sesuai kebutuhan (on-demand) sumber daya IT melalui internet dengan harga sesuai pemakaian (pay-as-you-go) [3]. Mari kita uraikan definisi tersebut.
======================================================================================================================
`Penggunaan sesuai kebutuhan`, ini menunjukkan bahwa AWS memiliki sumber daya yang Anda butuhkan kapan pun dan di mana pun. Tak perlu memberi tahu AWS kapan Anda akan membutuhkannya. Jika tiba-tiba Anda membutuhkan 300 server virtual, lakukan beberapa klik saja dan mereka pun akan langsung tersedia.
Demikian pula ketika Anda membutuhkan penyimpanan sebesar 2000 terabyte misalnya, silakan gunakan penyimpanan tersebut sesuai kebutuhan. Saat tidak membutuhkannya lagi, klik untuk melepasnya. Semudah itu. Fleksibilitas semacam ini tak mungkin Anda dapatkan di data center on-premise (lokal).

`Sumber daya IT` sebenarnya adalah bagian besar dari filosofi AWS. AWS memiliki ratusan layanan unggulan. Mengapa begitu banyak? Jawabannya sangat sederhana: karena bisnis membutuhkannya. Di AWS pun ada beberapa sumber daya IT yang sudah umum digunakan di sejumlah perusahaan.
Contohnya begini. Anggaplah Anda menggunakan database (basis data) MySQL di perusahaan tempat Anda bekerja.

Apakah kemampuan untuk menginstal mesin MySQL membuat perusahaan Anda menjadi lebih bersaing daripada kompetitor? Mungkin tidak.

Apakah dengan menyimpan backup (cadangan) membuat perusahaan Anda lebih unggul dari perusahaan lain? Sekali lagi, diragukan.

Data di dalam database, cara membangun tabel, dan mengelola strukturnya itulah yang membuat perusahaan Anda menjadi pembeda di antara pesaing yang lain.

Di AWS, hal semacam itu disebut undifferentiated heavy lifting (semua proses kerja yang tidak menambah nilai bagi perusahaan) dari IT. Proses kerja IT yang umum--seperti instalasi OS, pembaruan perangkat lunak, dll--seringkali dilakukan secara repetitif dan akhirnya memakan waktu.
Nah, hadirlah AWS untuk membantu Anda menangani hal-hal semacam itu. Jadi, Anda bisa fokus pada bisnis perusahaan Anda.

`Melalui internet`, ini menyiratkan bahwa Anda dapat mengakses sumber daya tersebut--yang telah dipaparkan sebelumnya--menggunakan web browser atau secara terprogram.
======================================================================================================================

Tak perlu kontrak apa pun, cukup bayar dengan mekanisme pay-as-you-go (sesuai pemakaian). Sama halnya seperti skenario kedai kopi kita. Anda tak perlu mempekerjakan banyak pegawai terus-menerus, cukup di waktu jam sibuk saja. Bahkan di waktu malam hingga pagi, Anda tak butuh pegawai sama sekali karena kedai kopi tutup. Itulah cloud computing alias komputasi cloud.

Sebelum datangnya komputasi cloud, perusahaan yang ingin membuat data center harus membangunnya sendiri dan harus memprediksikan beban kerja layanan. Ini tentu akan sangat merepotkan karena perlu biaya yang cukup besar.

Sebuah data center biasanya terdiri dari rak-rak komputer yang berjajar; jaringan yang kompleks; dan juga sistem penyimpanan yang terkelola. Selain itu, perusahaan juga harus mengeluarkan dana untuk membayar sewa bangunan, kebersihan, listrik, pendingin, dan keamanan.

Dan meskipun data center telah siap digunakan, perusahaan wajib memastikan bahwa data center tersebut mampu melayani kebutuhan beban kerja. Kenapa begitu?

Anggaplah begini. Suatu perusahaan telah berhasil membangun data center untuk menopang kebutuhan website-nya. Setiap hari website tersebut rata-rata diakses oleh 10.000 pengunjung, namun umumnya pada hari minggu jumlahnya hanya 5.000 saja. Angka ini berubah lagi di hari-hari spesial seperti malam tahun baru ketika tiba-tiba 30.000 pengunjung membanjirinya. Lantas website tersebut pun down beberapa kali.

Nah, bagaimana cara mengatasi masalah ini? Tenang, dengan komputasi cloud semua akan terselesaikan. Anda bisa menyesuaikan kemampuan data center sesuai kebutuhan beban kerja. Tidak akan kekurangan atau berlebihan. Nanti kita akan membahas ini lebih detail. Sekarang, mari kita menyimak materi berikutnya!
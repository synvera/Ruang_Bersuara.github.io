# Ruang Bersuara

Menjelaskan tentang sebuah tempat dimana kalian bisa bercerita tanpa di judge oleh orang lain

<br>

## I. Halaman pertama atau page 1 ( index.html)
kalian akan mengetahui tujuan dari web ini ( yaa.... sebenarnya hanya gabut sih ) tetapi kalian bisa ko untuk berekspresi
## II. Halaman ke dua atau page 2 ( Tahap1.html )
Nah... disini kalian harus mengisi nama kalian, bebas sih sebenarnya asal jangan disalah gunakan. Tetapi disini adalah part paling penting sebelum ke halaman/page selanjutnya. Karena disini nama kalian akan dimasukan ke dalam 
> localStorage <br>

atau bisa disebut oleh database yang hanya sekali pakai 

Setelah nama kalian masuk, nama kalian akan terus dipakai hingga page terakhir. 

Makanya kenapa saya bilang ini penting 
## III. Halaman ke tiga atau page 3 ( Tahap2.html)
Nama kalian akan terpapang jelas di tengah bagian atas. Dengan menggunakan logika 
<pre>
 const name = getUsername();
    const greeting = document.getElementById("greeting");
</pre>

source code tersebut berfungsi untuk memanggil nama yang sudah ada di dalam localStorage si Tahap1.html

<pre>
if (btn && input) {
  btn.addEventListener("click", () => {
    const name = input.value.trim();
    if (!name) {
      alert("Masukkan nama dulu!");
      return;
    }
    localStorage.setItem("username", name);
    // dan ini berfungsi untuk si data menyimpan nama yg sudah di isi pengguna
    window.location.href = "Tahap2.html";
    // dengan kode diatas, itu berfungsi untuk mengeksekusi program untuk pindah page
  });
}
</pre>
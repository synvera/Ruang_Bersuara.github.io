// ===== Tahap.js =====

// halaman tahap 1
const form = document.getElementById("nameForm");
const input = document.getElementById("nameInput");
const btn = document.getElementById("submitBtn");

if (form && input) {
  form.addEventListener("submit", async (e) => {
    e.preventDefault();
    const name = input.value.trim();
    if (!name) {
      alert("Masukkan nama dulu!");
      return;
    }
    // simpan nama ke localStorage
    localStorage.setItem("username", name);

    // coba kirim nama ke server agar tersimpan di database juga
    try {
      const res = await fetch('save_name.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ name })
      });
      // parse respons (tidak wajib, tapi berguna untuk debugging)
      const data = await res.json().catch(() => null);
      if (!res.ok) {
        console.warn('save_name.php returned non-OK', data);
      }
    } catch (err) {
      // gagal kirim ke server — jangan blokir UX, hanya log
      console.warn('Gagal mengirim nama ke server:', err);
    }

    // pindah ke Tahap2.html
    window.location.href = "Tahap2.html";
  });
}

// fungsi ambil nama
function getUsername() {
  return localStorage.getItem("username") || null;
}

// fungsi hapus nama
function clearUsername() {
  localStorage.removeItem("username");
}

window.getUsername = getUsername;
window.clearUsername = clearUsername;

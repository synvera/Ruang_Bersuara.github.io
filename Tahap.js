// ===== Tahap.js =====

// halaman tahap 1
const input = document.getElementById("nameInput");
const btn = document.getElementById("submitBtn");

if (btn && input) {
  btn.addEventListener("click", () => {
    const name = input.value.trim();
    if (!name) {
      alert("Masukkan nama dulu!");
      return;
    }
    // simpan nama ke localStorage
    localStorage.setItem("username", name);
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

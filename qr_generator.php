<?php
// Memulai sesi untuk memeriksa status login admin
session_start();

// Jika admin belum login, alihkan ke halaman login
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.html');
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembuat QR Code - Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    
    <script src="https://unpkg.com/qr-code-styling@1.5.0/lib/qr-code-styling.js"></script>

    <style>
        :root {
            --primary: #8B0000; --secondary: #E2725B; --accent-green: #9CAD84;
            --background: #f7fafc; --text-dark: #333333;
        }
        body { font-family: 'Inter', sans-serif; background-color: var(--background); }
        .font-display { font-family: 'Playfair Display', serif; }
        .btn { padding: 0.6rem 1.2rem; border-radius: 0.5rem; font-weight: 600; transition: all 0.2s; color: white; border: none; cursor: pointer; text-decoration: none; display: inline-block; }
        .btn-primary { background-color: var(--primary); }
        .btn-primary:hover { background-color: #6d0000; }
        .btn-secondary { background-color: var(--secondary); }
        .btn-secondary:hover { background-color: #c96148; }
        .btn-green { background-color: var(--accent-green); }
        .btn-green:hover { background-color: #8aa176; }
        .form-input { border: 1px solid #ddd; border-radius: 0.5rem; padding: 0.5rem 1rem; width: 100%; }
        #qrcode-container {
            display: flex; justify-content: center; align-items: center; padding: 1rem;
            background-color: white; border-radius: 0.5rem; box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            min-height: 300px; width: 300px; margin: auto;
        }
    </style>
</head>
<body class="bg-gray-100">
    <header class="bg-white shadow-md">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div>
                <h1 class="font-display text-3xl" style="color: var(--primary);">Pembuat QR Code</h1>
                <p class="text-gray-600">Alat Internal Admin</p>
            </div>
            <a href="admin.html" class="btn btn-secondary">Kembali ke Dashboard</a>
        </div>
    </header>

    <main class="container mx-auto p-6 grid grid-cols-1 md:grid-cols-2 gap-8">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="font-display text-2xl mb-4">Opsi Kustomisasi</h2>
            <div class="space-y-4">
                <div>
                    <label for="url-input" class="block text-sm font-medium text-gray-700">URL Tujuan</label>
                    <input type="text" id="url-input" class="form-input mt-1" value="https://mahasiswafin.my.id/">
                </div>
                <div>
                    <label for="color-input" class="block text-sm font-medium text-gray-700">Warna QR Code</label>
                    <input type="color" id="color-input" class="w-full h-10 p-1 border border-gray-300 rounded-md" value="#8B0000">
                </div>
                <div>
                    <label for="logo-input" class="block text-sm font-medium text-gray-700">Logo (Opsional)</label>
                    <input type="file" id="logo-input" class="mt-1 text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100" accept="image/png, image/jpeg, image/svg">
                </div>
                <button id="generate-btn" class="btn btn-primary w-full !mt-6">Buat / Perbarui QR Code</button>
            </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="font-display text-2xl mb-4 text-center">Hasil</h2>
            <div id="qrcode-container">
                <p class="text-gray-400">QR Code akan muncul di sini</p>
            </div>
            <button id="download-btn" class="btn btn-green w-full mt-4 hidden">Unduh Gambar (.png)</button>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const generateBtn = document.getElementById('generate-btn');
            const urlInput = document.getElementById('url-input');
            const colorInput = document.getElementById('color-input');
            const logoInput = document.getElementById('logo-input');
            const qrcodeContainer = document.getElementById('qrcode-container');
            const downloadBtn = document.getElementById('download-btn');
            
            let qrCode = null;
            let logoUrl = null;

            function generateQRCode() {
                const url = urlInput.value.trim();
                if (!url) {
                    alert('URL tidak boleh kosong!');
                    return;
                }

                qrcodeContainer.innerHTML = '';

                qrCode = new QRCodeStyling({
                    width: 280,
                    height: 280,
                    data: url,
                    image: logoUrl,
                    dotsOptions: {
                        color: colorInput.value,
                        type: "rounded"
                    },
                    backgroundOptions: {
                        color: "#ffffff",
                    },
                    imageOptions: {
                        crossOrigin: "anonymous",
                        margin: 5
                    }
                });

                qrCode.append(qrcodeContainer);
                downloadBtn.classList.remove('hidden');
            }

            logoInput.addEventListener('change', (e) => {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = (event) => {
                        logoUrl = event.target.result;
                        generateQRCode();
                    };
                    reader.readAsDataURL(file);
                }
            });

            generateBtn.addEventListener('click', generateQRCode);
            downloadBtn.addEventListener('click', () => {
                if (qrCode) {
                    qrCode.download({ name: "qrcode-menu", extension: "png" });
                }
            });

            generateQRCode();
        });
    </script>
</body>
</html>

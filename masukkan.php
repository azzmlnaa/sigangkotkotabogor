<?php include "config/koneksi.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width,
initial-scale=1,
maximum-scale=1,
user-scalable=no">

<title>Masukkan Pengguna</title>

<!-- Bootstrap -->
<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

<!-- Bootstrap Icons -->
<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

<!-- CSS -->
<link rel="stylesheet"
href="assets/css/masukkan.css">

</head>

<body>

<div class="feedback-container">

    <!-- HEADER -->
    <div class="top-header">

        <a href="index.php" class="back-btn">
            <i class="bi bi-arrow-left"></i>
        </a>

        <div>

            <div class="page-title">
                Masukkan Pengguna
            </div>

            <small>
                Kirim kritik dan saran untuk aplikasi
            </small>

        </div>

    </div>

    <!-- CARD -->
    <div class="feedback-card">

        <div class="icon-box">
            <i class="bi bi-chat-dots-fill"></i>
        </div>

        <h5 class="fw-bold mb-2">
            Berikan Masukkan
        </h5>

        <p class="desc">
            Kritik dan saran Anda membantu meningkatkan
            kualitas layanan SIG Trayek Angkot Bogor.
        </p>

        <!-- FORM -->
        <form action="proses-masukkan.php" method="POST">

            <div class="mb-3">

                <label class="form-label">
                    Nama
                </label>

                <input type="text"
                name="nama"
                class="form-control"
                placeholder="Masukkan nama"
                required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Email
                </label>

                <input type="email"
                name="email"
                class="form-control"
                placeholder="Masukkan email"
                required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Jenis Masukkan
                </label>

                <select name="jenis"
                class="form-select"
                required>

                    <option value="">
                        -- Pilih --
                    </option>

                    <option value="Kritik">
                        Kritik
                    </option>

                    <option value="Saran">
                        Saran
                    </option>

                    <option value="Laporan">
                        Laporan Error
                    </option>

                </select>

            </div>

            <div class="mb-4">

                <label class="form-label">
                    Pesan
                </label>

                <textarea
                name="pesan"
                class="form-control textarea"
                placeholder="Tulis masukkan Anda..."
                required></textarea>

            </div>

            <button type="submit"
            class="submit-btn">

                <i class="bi bi-send-fill"></i>

                Kirim Masukkan

            </button>

        </form>

    </div>

</div>

</body>
</html>
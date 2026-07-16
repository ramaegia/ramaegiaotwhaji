<?php

class Dashboard extends Model
{
    // ==========================
    // DASHBOARD ADMIN
    // ==========================

    public function totalUser()
    {
        return $this->db->query("
            SELECT COUNT(*)
            FROM users
        ")->fetchColumn();
    }

    public function totalProduk()
    {
        return $this->db->query("
            SELECT COUNT(*)
            FROM produk
        ")->fetchColumn();
    }

    public function totalKategori()
    {
        return $this->db->query("
            SELECT COUNT(*)
            FROM kategori
        ")->fetchColumn();
    }

    public function totalTransaksi()
    {
        return $this->db->query("
            SELECT COUNT(*)
            FROM transaksi
        ")->fetchColumn();
    }

    public function totalPendapatan()
    {
        return $this->db->query("
            SELECT IFNULL(SUM(total_harga),0)
            FROM transaksi
            WHERE status='Selesai'
        ")->fetchColumn();
    }

    public function transaksiTerbaru()
    {
        return $this->db->query("
            SELECT
                transaksi.*,
                users.nama,
                produk.nama_produk
            FROM transaksi
            JOIN users
                ON users.id = transaksi.user_id
            LEFT JOIN produk
                ON produk.id = transaksi.produk_id
            ORDER BY transaksi.id DESC
            LIMIT 5
        ")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function grafikPenjualan()
    {
        return $this->db->query("
            SELECT
                MONTH(created_at) AS bulan,
                SUM(total_harga) AS total
            FROM transaksi
            GROUP BY MONTH(created_at)
            ORDER BY MONTH(created_at)
        ")->fetchAll(PDO::FETCH_ASSOC);
    }

    // ==========================
    // DASHBOARD USER
    // ==========================

    public function totalPesananUser($userId)
    {
        $stmt = $this->db->prepare("
            SELECT COUNT(*)
            FROM transaksi
            WHERE user_id=?
        ");

        $stmt->execute([$userId]);

        return $stmt->fetchColumn();
    }

    public function pesananMenunggu($userId)
    {
        $stmt = $this->db->prepare("
            SELECT COUNT(*)
            FROM transaksi
            WHERE user_id=?
            AND status='Pending'
        ");

        $stmt->execute([$userId]);

        return $stmt->fetchColumn();
    }

    public function pesananDiproses($userId)
    {
        $stmt = $this->db->prepare("
            SELECT COUNT(*)
            FROM transaksi
            WHERE user_id=?
            AND status='Diproses'
        ");

        $stmt->execute([$userId]);

        return $stmt->fetchColumn();
    }

    public function pesananSelesai($userId)
    {
        $stmt = $this->db->prepare("
            SELECT COUNT(*)
            FROM transaksi
            WHERE user_id=?
            AND status='Selesai'
        ");

        $stmt->execute([$userId]);

        return $stmt->fetchColumn();
    }

    public function produkTerbaru()
    {
        return $this->db->query("
            SELECT *
            FROM produk
            ORDER BY id DESC
            LIMIT 4
        ")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function riwayatUser($userId)
    {
        $stmt = $this->db->prepare("
            SELECT
                transaksi.*,
                produk.nama_produk,
                produk.gambar
            FROM transaksi
            LEFT JOIN produk
                ON produk.id = transaksi.produk_id
            WHERE transaksi.user_id=?
            ORDER BY transaksi.id DESC
            LIMIT 5
        ");

        $stmt->execute([$userId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
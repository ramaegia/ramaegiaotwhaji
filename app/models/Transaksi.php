<?php

class Transaksi extends Model
{
    private $table = "transaksi";

    // ===========================
    // Semua Transaksi
    // ===========================
    public function getAll()
    {
        $sql = "
            SELECT
                transaksi.*,
                users.nama,
                produk.nama_produk,
                produk.gambar
            FROM transaksi
            JOIN users ON users.id = transaksi.user_id
            LEFT JOIN produk ON produk.id = transaksi.produk_id
            ORDER BY transaksi.id DESC
        ";

        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    // ===========================
    // Riwayat User
    // ===========================
    public function getByUser($id)
    {
        $stmt = $this->db->prepare("
            SELECT
                transaksi.*,
                produk.nama_produk,
                produk.gambar,
                produk.harga
            FROM transaksi
            LEFT JOIN produk
                ON produk.id = transaksi.produk_id
            WHERE transaksi.user_id=?
            ORDER BY transaksi.id DESC
        ");

        $stmt->execute([$id]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ===========================
    // Detail
    // ===========================
    public function getById($id)
    {
        $stmt = $this->db->prepare("
            SELECT *
            FROM transaksi
            WHERE id=?
        ");

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // ===========================
    // Detail Lengkap
    // ===========================
    public function getDetail($id)
    {
        $stmt = $this->db->prepare("
            SELECT
                transaksi.*,
                users.nama,
                users.email,
                produk.nama_produk,
                produk.gambar,
                produk.harga
            FROM transaksi
            JOIN users
                ON users.id = transaksi.user_id
            LEFT JOIN produk
                ON produk.id = transaksi.produk_id
            WHERE transaksi.id=?
        ");

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // ===========================
    // Produk
    // ===========================
    public function getProduk()
    {
        return $this->db
            ->query("SELECT * FROM produk ORDER BY nama_produk")
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    // ===========================
    // Tambah
    // ===========================
    public function tambah($data)
    {
        $stmt = $this->db->prepare("
            INSERT INTO transaksi
            (
                user_id,
                produk_id,
                total_harga,
                status,
                created_at
            )
            VALUES
            (?,?,?,?,NOW())
        ");

        return $stmt->execute([
            $data['user_id'],
            $data['produk_id'],
            $data['total_harga'],
            "Pending"
        ]);
    }

    // ===========================
    // Upload Bukti
    // ===========================
    public function uploadBukti($id,$gambar)
    {
        $stmt = $this->db->prepare("
            UPDATE transaksi
            SET bukti_transfer=?
            WHERE id=?
        ");

        return $stmt->execute([
            $gambar,
            $id
        ]);
    }

    // ===========================
    // Update Status
    // ===========================
    public function updateStatus($id,$status)
    {
        $stmt = $this->db->prepare("
            UPDATE transaksi
            SET status=?
            WHERE id=?
        ");

        return $stmt->execute([
            $status,
            $id
        ]);
    }

    // ===========================
    // Pendapatan
    // ===========================
    public function totalPendapatan()
    {
        return $this->db
            ->query("
                SELECT IFNULL(SUM(total_harga),0)
                FROM transaksi
                WHERE status='Selesai'
            ")
            ->fetchColumn();
    }

    // ===========================
    // Total Transaksi
    // ===========================
    public function totalTransaksi()
    {
        return $this->db
            ->query("
                SELECT COUNT(*)
                FROM transaksi
            ")
            ->fetchColumn();
    }
}
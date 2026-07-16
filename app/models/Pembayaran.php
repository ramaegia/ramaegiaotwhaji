<?php

class Pembayaran extends Model
{
    private $table = "pembayaran";

    // ==========================
    // Semua Pembayaran
    // ==========================
    public function getAll()
    {
        $sql = "
        SELECT
            pembayaran.*,
            users.nama,
            transaksi.total_harga
        FROM pembayaran
        JOIN users
            ON users.id = pembayaran.user_id
        JOIN transaksi
            ON transaksi.id = pembayaran.transaksi_id
        ORDER BY pembayaran.id DESC
        ";

        return $this->db
            ->query($sql)
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    // ==========================
    // Detail Pembayaran
    // ==========================
    public function getById($id)
    {
        $stmt = $this->db->prepare("
            SELECT
                pembayaran.*,
                users.nama,
                users.email,
                transaksi.total_harga
            FROM pembayaran
            JOIN users
                ON users.id = pembayaran.user_id
            JOIN transaksi
                ON transaksi.id = pembayaran.transaksi_id
            WHERE pembayaran.id=?
        ");

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // ==========================
    // Simpan Pembayaran
    // ==========================
    public function tambah($data)
    {
        $stmt = $this->db->prepare("
        INSERT INTO pembayaran
        (
            transaksi_id,
            user_id,
            nominal,
            metode,
            bukti,
            status,
            created_at
        )
        VALUES(?,?,?,?,?,?,NOW())
        ");

        return $stmt->execute([
            $data['transaksi_id'],
            $data['user_id'],
            $data['nominal'],
            $data['metode'],
            $data['bukti'],
            'Pending'
        ]);
    }

    // ==========================
    // Update Status Pembayaran
    // ==========================
    public function updateStatus($id, $status)
    {
        // Update status pembayaran
        $stmt = $this->db->prepare("
            UPDATE pembayaran
            SET status=?
            WHERE id=?
        ");

        $stmt->execute([
            $status,
            $id
        ]);

        // Ambil transaksi terkait
        $stmt = $this->db->prepare("
            SELECT transaksi_id
            FROM pembayaran
            WHERE id=?
        ");

        $stmt->execute([$id]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {

            $statusTransaksi = "Pending";

            if ($status == "Diterima") {
                $statusTransaksi = "Diproses";
            }

            if ($status == "Selesai") {
                $statusTransaksi = "Selesai";
            }

            if ($status == "Ditolak") {
                $statusTransaksi = "Dibatalkan";
            }

            $stmt2 = $this->db->prepare("
                UPDATE transaksi
                SET status=?
                WHERE id=?
            ");

            $stmt2->execute([
                $statusTransaksi,
                $row['transaksi_id']
            ]);
        }

        return true;
    }

    // ==========================
    // Riwayat Pembayaran User
    // ==========================
    public function getByUser($user_id)
    {
        $stmt = $this->db->prepare("
            SELECT
                pembayaran.*,
                transaksi.total_harga
            FROM pembayaran
            JOIN transaksi
                ON transaksi.id = pembayaran.transaksi_id
            WHERE pembayaran.user_id=?
            ORDER BY pembayaran.id DESC
        ");

        $stmt->execute([$user_id]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ==========================
    // Hitung Total Pembayaran
    // ==========================
    public function totalPembayaran()
    {
        return $this->db
            ->query("
                SELECT COUNT(*)
                FROM pembayaran
            ")
            ->fetchColumn();
    }
}
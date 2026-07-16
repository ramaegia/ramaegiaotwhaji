<?php

class Laporan extends Model
{
    public function getAll()
    {
        return $this->db
            ->query("
                SELECT
                    transaksi.*,
                    users.nama,
                    produk.nama_produk
                FROM transaksi
                JOIN users
                    ON users.id = transaksi.user_id
                JOIN produk
                    ON produk.id = transaksi.produk_id
                ORDER BY transaksi.id DESC
            ")
            ->fetchAll(PDO::FETCH_ASSOC);
    }

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
}
<?php

class Keranjang extends Model
{
    public function getAll($userId)
    {
        $stmt = $this->db->prepare("
            SELECT
                keranjang.*,
                produk.nama_produk,
                produk.harga,
                produk.gambar
            FROM keranjang
            JOIN produk
                ON produk.id = keranjang.produk_id
            WHERE keranjang.user_id = ?
            ORDER BY keranjang.id DESC
        ");

        $stmt->execute([$userId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function tambah($userId, $produkId)
    {
        $cek = $this->db->prepare("
            SELECT id, qty
            FROM keranjang
            WHERE user_id=? AND produk_id=?
        ");

        $cek->execute([$userId,$produkId]);

        $data = $cek->fetch(PDO::FETCH_ASSOC);

        if($data){

            $update = $this->db->prepare("
                UPDATE keranjang
                SET qty=qty+1
                WHERE id=?
            ");

            return $update->execute([$data['id']]);
        }

        $stmt = $this->db->prepare("
            INSERT INTO keranjang(user_id,produk_id)
            VALUES(?,?)
        ");

        return $stmt->execute([$userId,$produkId]);
    }

    public function hapus($id)
    {
        $stmt = $this->db->prepare("
            DELETE FROM keranjang
            WHERE id=?
        ");

        return $stmt->execute([$id]);
    }
    public function tambahQty($id)
{
    $stmt = $this->db->prepare("
        UPDATE keranjang
        SET qty = qty + 1
        WHERE id = ?
    ");

    return $stmt->execute([$id]);
}

public function kurangQty($id)
{
    $cek = $this->db->prepare("
        SELECT qty
        FROM keranjang
        WHERE id = ?
    ");

    $cek->execute([$id]);

    $data = $cek->fetch(PDO::FETCH_ASSOC);

    if($data['qty'] > 1){

        $stmt = $this->db->prepare("
            UPDATE keranjang
            SET qty = qty - 1
            WHERE id = ?
        ");

        return $stmt->execute([$id]);
    }

    return false;
}
}
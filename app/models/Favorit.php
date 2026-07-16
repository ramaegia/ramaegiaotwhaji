<?php

class Favorit extends Model
{
    // ==========================
    // Tambah Favorit
    // ==========================
    public function tambah($user,$produk)
    {
        if($this->cek($user,$produk)){
            return true;
        }

        $stmt = $this->db->prepare("
            INSERT INTO favorit(user_id,produk_id)
            VALUES(?,?)
        ");

        return $stmt->execute([
            $user,
            $produk
        ]);
    }

    // ==========================
    // Hapus Favorit
    // ==========================
    public function hapus($user,$produk)
    {
        $stmt = $this->db->prepare("
            DELETE FROM favorit
            WHERE user_id=?
            AND produk_id=?
        ");

        return $stmt->execute([
            $user,
            $produk
        ]);
    }

    // ==========================
    // Cek Favorit
    // ==========================
    public function cek($user,$produk)
    {
        $stmt = $this->db->prepare("
            SELECT *
            FROM favorit
            WHERE user_id=?
            AND produk_id=?
        ");

        $stmt->execute([
            $user,
            $produk
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // ==========================
    // Semua Favorit User
    // ==========================
    public function getAll($user)
    {
        $stmt = $this->db->prepare("
            SELECT
                favorit.*,
                produk.*
            FROM favorit
            JOIN produk
            ON produk.id=favorit.produk_id
            WHERE favorit.user_id=?
            ORDER BY favorit.id DESC
        ");

        $stmt->execute([$user]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ==========================
    // Alias untuk Dashboard
    // ==========================
    public function getByUser($user)
    {
        return $this->getAll($user);
    }

    // ==========================
    // Hitung Favorit
    // ==========================
    public function jumlahFavorit($user)
    {
        $stmt = $this->db->prepare("
            SELECT COUNT(*) as total
            FROM favorit
            WHERE user_id=?
        ");

        $stmt->execute([$user]);

        return $stmt->fetchColumn();
    }
}
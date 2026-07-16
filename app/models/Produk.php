<?php

class Produk extends Model
{
    private $table = "produk";

    // ==========================
    // Ambil Semua Produk
    // ==========================
    public function getAll($keyword = "")
    {
        try {

            if ($keyword != "") {

                $stmt = $this->db->prepare("
                    SELECT produk.*, kategori.nama_kategori
                    FROM produk
                    JOIN kategori
                    ON produk.kategori_id = kategori.id
                    WHERE produk.nama_produk LIKE ?
                    OR kategori.nama_kategori LIKE ?
                    ORDER BY produk.id DESC
                ");

                $like = "%" . $keyword . "%";

                $stmt->execute([$like, $like]);

                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }

            return $this->db->query("
                SELECT produk.*, kategori.nama_kategori
                FROM produk
                JOIN kategori
                ON produk.kategori_id = kategori.id
                ORDER BY produk.id DESC
            ")->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {

            throw $e;

        }
    }

    // ==========================
    // Ambil Semua Kategori
    // ==========================
    public function getKategori()
    {
        return $this->db
            ->query("SELECT * FROM kategori ORDER BY nama_kategori ASC")
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    // ==========================
    // Ambil Produk Berdasarkan ID
    // ==========================
    public function getById($id)
    {
        $stmt = $this->db->prepare("
            SELECT *
            FROM produk
            WHERE id=?
        ");

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // ==========================
    // Tambah Produk
    // ==========================
    public function tambah($data)
    {
        try {

            $stmt = $this->db->prepare("
                INSERT INTO produk
                (
                    kategori_id,
                    nama_produk,
                    harga,
                    stok,
                    deskripsi,
                    gambar
                )
                VALUES (?,?,?,?,?,?)
            ");

            return $stmt->execute([
                $data['kategori_id'],
                $data['nama_produk'],
                $data['harga'],
                $data['stok'],
                $data['deskripsi'],
                $data['gambar']
            ]);

        } catch (PDOException $e) {

            throw $e;

        }
    }

    // ==========================
    // Update Produk
    // ==========================
    public function update($data)
    {
        try {

            if (!empty($data['gambar'])) {

                // hapus gambar lama
                $lama = $this->getById($data['id']);

                if (!empty($lama['gambar'])) {

                    $file = "public/uploads/" . $lama['gambar'];

                    if (file_exists($file)) {
                        unlink($file);
                    }

                }

                $stmt = $this->db->prepare("
                    UPDATE produk
                    SET
                        kategori_id=?,
                        nama_produk=?,
                        harga=?,
                        stok=?,
                        deskripsi=?,
                        gambar=?
                    WHERE id=?
                ");

                return $stmt->execute([
                    $data['kategori_id'],
                    $data['nama_produk'],
                    $data['harga'],
                    $data['stok'],
                    $data['deskripsi'],
                    $data['gambar'],
                    $data['id']
                ]);

            }

            $stmt = $this->db->prepare("
                UPDATE produk
                SET
                    kategori_id=?,
                    nama_produk=?,
                    harga=?,
                    stok=?,
                    deskripsi=?
                WHERE id=?
            ");

            return $stmt->execute([
                $data['kategori_id'],
                $data['nama_produk'],
                $data['harga'],
                $data['stok'],
                $data['deskripsi'],
                $data['id']
            ]);

        } catch (PDOException $e) {

            throw $e;

        }
    }

    // ==========================
    // Hapus Produk
    // ==========================
    public function hapus($id)
    {
        // cek apakah produk sudah dipakai transaksi
        $cek = $this->db->prepare("
            SELECT COUNT(*) 
            FROM transaksi
            WHERE produk_id=?
        ");

        $cek->execute([$id]);

        if ($cek->fetchColumn() > 0) {

            throw new PDOException("Produk sudah dipakai transaksi.");

        }

        // ambil gambar
        $produk = $this->getById($id);

        if (!empty($produk['gambar'])) {

            $file = "public/uploads/" . $produk['gambar'];

            if (file_exists($file)) {
                unlink($file);
            }

        }

        $stmt = $this->db->prepare("
            DELETE FROM produk
            WHERE id=?
        ");

        return $stmt->execute([$id]);
    }
}
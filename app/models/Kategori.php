<?php

class Kategori extends Model
{
    private $table = "kategori";

    public function getAll()
    {
        $stmt = $this->db->query("SELECT * FROM {$this->table} ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id=?");
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function tambah($data)
{
    try{

        $stmt = $this->db->prepare("
        INSERT INTO kategori
        (
            nama_kategori
        )
        VALUES(?)
        ");

        return $stmt->execute([

            $data['nama_kategori']

        ]);

    }catch(PDOException $e){

        die($e->getMessage());

    }
}

   public function update($data)
{
    try{

        $stmt = $this->db->prepare("
        UPDATE kategori

        SET

        nama_kategori=?

        WHERE id=?
        ");

        return $stmt->execute([

            $data['nama_kategori'],
            $data['id']

        ]);

    }catch(PDOException $e){

        die($e->getMessage());

    }
}

    public function hapus($id)
    {
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id=?");
        return $stmt->execute([$id]);
    }
}
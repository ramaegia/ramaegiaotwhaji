<?php

class UserManagement extends Model
{
    public function getAll()
    {
        return $this->db
            ->query("SELECT * FROM users ORDER BY id DESC")
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id=?");
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($data)
    {
        $stmt = $this->db->prepare("
            UPDATE users
            SET
                nama=?,
                email=?,
                role=?
            WHERE id=?
        ");

        return $stmt->execute([
            $data['nama'],
            $data['email'],
            $data['role'],
            $data['id']
        ]);
    }

    public function hapus($id)
    {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id=?");

        return $stmt->execute([$id]);
    }
}
<?php

class Profil extends Model
{
    public function getById($id)
    {
        $stmt = $this->db->prepare("
            SELECT *
            FROM users
            WHERE id=?
        ");

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($data)
    {
        if ($data['foto'] != "") {

            $stmt = $this->db->prepare("
                UPDATE users
                SET
                    nama=?,
                    email=?,
                    foto=?
                WHERE id=?
            ");

            return $stmt->execute([
                $data['nama'],
                $data['email'],
                $data['foto'],
                $data['id']
            ]);

        } else {

            $stmt = $this->db->prepare("
                UPDATE users
                SET
                    nama=?,
                    email=?
                WHERE id=?
            ");

            return $stmt->execute([
                $data['nama'],
                $data['email'],
                $data['id']
            ]);

        }
    }

    public function updatePassword($id,$password)
    {
        $stmt=$this->db->prepare("
            UPDATE users
            SET password=?
            WHERE id=?
        ");

        return $stmt->execute([
            $password,
            $id
        ]);
    }
}
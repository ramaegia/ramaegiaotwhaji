<?php

class User extends Model
{
    private $table = "users";

    // Login
    public function login($email)
    {
        $stmt = $this->db->prepare("
            SELECT *
            FROM users
            WHERE email = ?
            LIMIT 1
        ");

        $stmt->execute([$email]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Register
    public function register($data)
    {
        $stmt = $this->db->prepare("
            INSERT INTO users
            (
                nama,
                email,
                password,
                role
            )
            VALUES
            (
                ?, ?, ?, ?
            )
        ");

        return $stmt->execute([
            $data['nama'],
            $data['email'],
            password_hash($data['password'], PASSWORD_DEFAULT),
            "user"
        ]);
    }

    // Semua user
    public function getAll()
    {
        return $this->db
            ->query("
                SELECT *
                FROM users
                ORDER BY id DESC
            ")
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    // Detail user
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

    // Update profil
    public function update($data)
    {
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
    }

    // Hapus user
    public function delete($id)
    {
        $stmt = $this->db->prepare("
            DELETE FROM users
            WHERE id=?
        ");

        return $stmt->execute([$id]);
    }

    // Total user
    public function totalUser()
    {
        return $this->db
            ->query("
                SELECT COUNT(*)
                FROM users
            ")
            ->fetchColumn();
    }
}
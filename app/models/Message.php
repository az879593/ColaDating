<?php

class Message
{
    private $__db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getUserByID($id)
    {
        $this->db->query('SELECT * FROM tbl_users WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();

        return $row;
    }

    public function getUserList()
    {
        $this->db->query('SELECT * FROM tbl_users WHERE id != :id');
        $this->db->bind(':id', $_SESSION['user_id']);
        $results = $this->db->resultSet();

        return $results;
    }

    public function getMatchList()
    {
        $this->db->query('SELECT u.id, u.username, u.nickname,u.phonenumber, u.email,
            u.profile_picture, m.user1_id, m.user2_id, m.match_status
            FROM tbl_users AS u
            INNER JOIN tbl_match AS m
            ON u.id = m.user1_id
            WHERE user2_id = :id
            UNION
            SELECT u.id, u.username, u.nickname,u.phonenumber, u.email,
            u.profile_picture, m.user1_id, m.user2_id, m.match_status
            FROM tbl_users AS u
            INNER JOIN tbl_match AS m
            ON u.id = m.user2_id
            WHERE user1_id = :id');
        $this->db->bind(':id', $_SESSION['user_id']);
        $results = $this->db->resultSet();

        return $results;
    }

    public function getAllMessages()
    {
        $this->db->query('SELECT * FROM tbl_message');

        $results = $this->db->resultSet();

        return $results;
    }

    public function getMessagesByID($user1, $user2)
    {
        $this->db->query('SELECT * FROM tbl_message
            WHERE (from_user = :user1 AND to_user = :user2)
            OR (from_user = :user2 AND to_user = :user1)
            ORDER BY msg_time DESC');

        $this->db->bind(':user1', $user1);
        $this->db->bind(':user2', $user2);
        $results = $this->db->resultSet();

        return $results;
    }

    public function sendMessage($data)
    {
        $this->db->query('INSERT INTO tbl_message (from_user, to_user, message) VALUES
            (:from_user, :to_user, :message)');

        // Bind value
        $this->db->bind(':from_user', $data['from_id']);
        $this->db->bind(':to_user', $data['to_id']);
        $this->db->bind(':message', $data['text']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

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
        // $this->db->query('SELECT u.id, u.username, u.nickname,u.phonenumber, u.email,
        //     u.profile_picture, m.user1_id, m.user2_id, m.match_status, m.latest_msg_id
        //     FROM tbl_users AS u
        //     INNER JOIN tbl_match AS m
        //     ON u.id = m.user1_id
        //     WHERE user2_id = :id
        //     UNION
        //     SELECT u.id, u.username, u.nickname,u.phonenumber, u.email,
        //     u.profile_picture, m.user1_id, m.user2_id, m.match_status, m.latest_msg_id
        //     FROM tbl_users AS u
        //     INNER JOIN tbl_match AS m
        //     ON u.id = m.user2_id
        //     WHERE user1_id = :id');

        $this->db->query('SELECT u.id, u.username, u.nickname,u.phonenumber, u.email,
        u.profile_picture, m.user1_id, m.user2_id, m.match_status, m.latest_msg_id, msg.message, msg.msg_time
        FROM tbl_users AS u
        INNER JOIN tbl_match AS m
        ON u.id = m.user1_id
        LEFT JOIN tbl_message AS msg
        ON msg.msg_id = m.latest_msg_id
        WHERE user2_id = :id
        UNION
        SELECT u.id, u.username, u.nickname,u.phonenumber, u.email,
        u.profile_picture, m.user1_id, m.user2_id, m.match_status, m.latest_msg_id, msg.message, msg.msg_time
        FROM tbl_users AS u
        INNER JOIN tbl_match AS m
        ON u.id = m.user2_id
        LEFT JOIN tbl_message AS msg
        ON msg.msg_id = m.latest_msg_id
        WHERE user1_id = :id
        ORDER BY msg_time DESC');
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

    public function getMessagesID($from_id, $to_id)
    {
        $this->db->query('SELECT MAX(msg_id) AS msg_id FROM tbl_message
            WHERE from_user = :from_user AND to_user = :to_user');
        $this->db->bind(':from_user', $from_id);
        $this->db->bind(':to_user', $to_id);
        $result = $this->db->single();

        return $result;
    }

    public function getRandomUser(){
        $this->db->query('SELECT * FROM `tbl_users`
        ORDER BY RAND() LIMIT 1');
        $result = $this->db->single();
        return $result;
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
            
        } else {
            return false;
        }
    }

    public function updateLatestMessage($data)
    {
        $this->db->query('UPDATE tbl_match SET latest_msg_id = :latest_msg_id
            WHERE (user1_id = :from_user AND user2_id = :to_user)
            OR (user2_id = :from_user AND user1_id = :to_user)');
        $this->db->bind(':from_user', $data['from_id']);
        $this->db->bind(':to_user', $data['to_id']);
        // $msgid = $this->getMessagesID($data['from_id'], $data['to_id'])->id;
        $this->db->bind(':latest_msg_id', $data['msg_id']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

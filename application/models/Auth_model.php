<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public static $TABLE = 'authentications';
    public static $UID = 'uid';
    public static $NAME = 'name';
    public static $EMAIL = 'email';
    public static $PASSWORD = 'password';

    public function get($uid)
    {
        $result = $this->db->get_where(self::$TABLE, array(self::$UID => $uid));
        return $result->row_array();
    }

    public function update($input, $uid)
    {
        $this->db->where(self::$UID, $uid);
        $this->db->update(self::$TABLE, $input);
    }

    /**
     * Method ini digunakan untuk melakukan proses login.
     *
     * @param $email: String
     * @param $password: String
     * @return array
     */
    public function login($input)
    {
        $data = $this->db->get_where(
            self::$TABLE,
            array(self::$EMAIL => $input[self::$EMAIL]),
            1);

        return $data->result();
    }

    /**
     * Method ini digunakan untuk melakukan proses Register.
     *
     * @param $data: Array
     * @return Boolean
     */
    public function register($input = array())
    {
        $data = $this->db->get_where(self::$TABLE, array('email' => $input['email']));

        if ($data->num_rows == 0) {
            $this->db->insert(self::$TABLE, $input);
            return true;
        } else {
            return false;
        }
    }

    public function email_exist($email)
    {
        $result = $this->db->get_where(self::$TABLE, array('email' => $email));

        return $result->result();
    }
}
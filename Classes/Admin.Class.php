<?php

require_once "Database Connection.Class.php";

class Admin extends Dbh {
    public $admin_id, $admin_name, $admin_email, $admin_phone;

    public function getadminInfo($admin_email, $admin_pwd) {
        $query = "SELECT * FROM admin WHERE admin_email = ? AND admin_pwd = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$admin_email, $admin_pwd]);
        $values = $stmt->fetchAll();

        if (count($values) === 1) {
            foreach($values as $value) {
                $this->admin_id = $value['admin_id'];
                $this->admin_name = $value['admin_name'];
                $this->admin_email = $value['admin_email'];
                $this->admin_phone = $value['admin_phone'];
            }

            return 1;
        }

        else {
            return 0;
        }
    }
}
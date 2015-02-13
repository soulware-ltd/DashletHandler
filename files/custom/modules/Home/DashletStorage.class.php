<?php

/**
 * Class DashletStorage
 * @property MysqliManager $db
 */
class DashletStorage {

    private $table = 'dashlet_storage';

    private $db;
    private $user;

    public function __construct(){
        $this->db = DBManagerFactory::getInstance();
        $this->user = $GLOBALS['current_user'];
    }

    public function getDefaultRecords(){
        return $this->query("select id, user_id, title from {$this->table} where user_id is null");
    }

    public function get($uid){
        $row = $this->query("select * from {$this->table} where user_id=:user_id", array(':user_id' => $uid), true);
        if(!$row)
            return false;
        $row['data'] = unserialize(base64_decode($row['data']));
        return $row;
    }

    public function getDataByID($id){
        $row = $this->query("select `data` from {$this->table} where id=:id and user_id is null", array(':id' => $id));
        if(!$row)
            return false;
        return unserialize(base64_decode($row[0]['data']));
    }

    public function delete($id){
        $this->query("delete from {$this->table} where id=:id", array(':id' => $id));
    }
    public function addDefaultRecord($title, $data){
        $data = base64_encode(serialize($data));
        $this->query("insert into {$this->table} (`id`, `user_id`, `title`, `data`) values(:id, null, :title, :data)", array(
            ':id'       => create_guid(),
            ':title'    => $title,
            ':data'     => $data
        ));
    }

    public function save($uid, $data){
        $data = base64_encode(serialize($data));
        $this->query("delete from {$this->table} where user_id=:user_id", array(':user_id' => $uid));
        $this->query("insert into {$this->table} (`id`, `user_id`, `title`, `data`) values(:id, :user_id, null, :data)", array(
            ':id'       => create_guid(),
            ':user_id'  => $uid,
            ':data'     => $data
        ));
    }

    private function query($q, $params = array(), $one = false){
        $db = $this->db;
        if($params) {
            foreach ($params as &$param)
                $param = $db->quoted($param);

            $q = strtr($q, $params);
        }
        $result = $db->query($q);

        if(!is_bool($result)) {
            if($one)
                return $db->fetchByAssoc($result);
            $res = array();

            while($row = $db->fetchByAssoc($result))
                $res[] = $row;

            return $res;
        }
        return $result;
    }
}

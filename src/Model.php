<?php

namespace Src;

class Model
{
    public static function find()
    {
        return new Query();
    }

//    public function find($table, $limit, $offset, $order = null)
//    {
//        if (!empty($order)) {
//            $orderBy = "ORDER BY $order DESC";
//            $statement = $this->pdo->prepare("SELECT * FROM $table $orderBy LIMIT :limit OFFSET :offset");
//        } else {
//            $statement = $this->pdo->prepare("SELECT * FROM $table LIMIT :limit OFFSET :offset");
//        }
//
//        $statement->execute([
//            'limit' => $limit,
//            'offset' => $offset
//        ]);
//        return $statement->fetchAll(PDO::FETCH_ASSOC);
//    }
    
    public function findOne($table, $id)
    {
        $statement = $this->pdo->prepare("SELECT * FROM $table WHERE id = :id");
        $statement->execute([
            'id' => $id
        ]);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function save($query, $array, $update = null)
    {
        $statement = $this->pdo->prepare($query);
        return $statement->execute($array);
    }
    
    public function count($table)
    {
        $count = $this->pdo->query("SELECT COUNT(*) FROM $table");
        return $count->fetchColumn();
    }
}

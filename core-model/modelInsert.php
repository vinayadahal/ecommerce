<?php

class modelInsert {

    public function insert($table, $col = NULL, $returnId = NULL) {
        $info = array_values($col);
        $field = "`" . implode("`,`", array_keys($col)) . "`";
        $cnt = count($col);
        for ($i = 0; $i < $cnt; $i++) {
            $bind_val[] = '?';
        }
        $b_val = implode(",", $bind_val);
        $query = "INSERT INTO $table ($field)VALUES($b_val);";
        $this->loadDatabase();
        $bind = $this->dbh->prepare($query);
        for ($i = 0; $i < $cnt; $i++) {
            $bind->bindParam($i + 1, $info[$i]);
        }
        try {
            $result = $bind->execute();
        } catch (Exception $ex) {
            if ($ex->getCode() == '23000') {
                (new error())->insertQueryError();
            }
            exit();
        }
        if ($returnId != NULL && $returnId == TRUE) {
            return $this->dbh->lastInsertId();
        }
        $this->dbh = NULL; // closing DB connection
        if ($result == 1) {
            return true;
        } else {
            return false;
        }
    }

}

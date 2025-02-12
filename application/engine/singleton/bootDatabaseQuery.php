<?php 

class DB {
    public $host    = 'localhost';
    public $user    = 'root';
    public $pass    = '';
    public $db      = 'tes23';
    public $port    = '3307';

    public static function dbCheckOrCreate()
    {
        $conn = static::conn();
        if ($conn) {
            $cekDb = mysqli_select_db($conn, (new self)->db);
            if ($cekDb) {
                return "Database ".(new self)->db." Ada";
            }else{
                $queryCreateDb = mysqli_query($conn, "CREATE DATABASE ".(new self)->db);
                if ($queryCreateDb) {
                    return "Database ".(new self)->db." Tidak Ada dan Berhasil membuat ".(new self)->db;
                }
            }
        }else{
            return "Database ".(new self)->db." Tidak Bisa Konek, Pastikan host, user, dan pass sudah benar!";
        }
    }

    public static function conn(){
        return mysqli_connect((new self)->host, (new self)->user, (new self)->pass, (new self)->db, (new self)->port);
    }

    public static function dbquery($qr, $type=""){
        $query = mysqli_query((new self)->conn(), $qr);
        $box = [];
        while ($data = mysqli_fetch_object($query) ) {
            $box[] = $data;
        }
        if ($type == "count") {
            return count($box);
        }
        return $box;
    }

    public static function getColumnNameString($table, $row){
        $data = (new self)->dbquery("
            SELECT
                COLUMN_NAME as nama_kolom
            FROM
                information_schema. COLUMNS
            WHERE
                TABLE_SCHEMA = '".(new self)->db."'
            AND TABLE_NAME = '".$table."'
            AND ORDINAL_POSITION = ".$row."
        ");
        $nama = "";
        foreach ($data as $key => $value) {
            $nama .= $value->nama_kolom;
        }
        return $nama;
    }

    public static function getColumnNameArray($table){
        $data = (new self)->dbquery("
            SELECT
                COLUMN_NAME as nama_kolom
            FROM
                information_schema. COLUMNS
            WHERE
                TABLE_SCHEMA = '".(new self)->db."'
                AND TABLE_NAME = '".$table."'
        ");
        $nama = array();
        foreach ($data as $key => $value) {
            $nama[] = $value->nama_kolom;
        }
        return $nama;
    }

    public static function checkColumnExist($table, $row){
        return (new self)->dbquery("
                SELECT
                    COLUMN_NAME as nama_kolom
                FROM
                    information_schema. COLUMNS
                WHERE
                    TABLE_SCHEMA = '".(new self)->db."'
                AND TABLE_NAME = '".$table."'
                AND ORDINAL_POSITION = ".$row."
            ", "count");
    }

    public static function checkTableExistOrCreateOrAlter($table, $tablestruktur){
        $getConnection = (new self)->conn();
        $query = mysqli_query($getConnection, "DESCRIBE $table ");
        if ($query) {

            $aa = (new self)->ArrColumnName($table);
            $bb = array_keys($tablestruktur);

            if (count($aa) > count($bb)) {
                foreach ($aa as $ay => $ax) {
                    if (in_array($ax, $bb)) {
                    }else{
                        (new self)->query("
                            ALTER TABLE ".$table."
                            DROP COLUMN ".$ax.";
                        ");
                    }
                }
            }else{
                $no = 1;
                foreach ($tablestruktur as $key => $value) {
                    if ((new self)->cekColumn($table, $no) == 0) {
                        (new self)->query("

                            ALTER TABLE ".$table."
                            ADD ".$key." ".$value.";
                        ");
                    }else{
                        if ((new self)->getColumnName($table, $no) != $key) {
                            (new self)->query("

                                ALTER TABLE ".$table."
                                CHANGE COLUMN ".(new self)->getColumnName($table, $no)." ".$key." ".$value.";
                            ");
                        }
                    }
                    $no++;
                }
            }
            return 'tersedia';
        }else{
            $mystructure = "";
            $no = 0;
            foreach ($tablestruktur as $key => $value) {
                if ($no == 0) {
                    $mystructure .= $key.' '.$value;
                }else{
                    $mystructure .= ','.$key.' '.$value;
                }
                $no++;
            }
            $createtable = mysqli_query($getConnection, 'CREATE TABLE '.$table.' ('.$mystructure.') ');
            if ($createtable) {
                return 'dibuat';
            }else{
                return 'gagal';
            }
        }
    }
    //Simpel
    public static function query($e)
    {
        $conn = (new self)->conn();
        $query = mysqli_query($conn, $e);
        return $query;
    }
    //Data Object
    public static function query_result_object($e)
    {
        $conn = (new self)->conn();
        $query = mysqli_query($conn, $e);
        $box = [];
        if($query != false){
            while ($data = mysqli_fetch_object($query) ) {
                $box[] = $data;
            }
        }
        return $box;
    }
    //Data Object 1 Row, jadi tanpa looping
    public static function query_result_object_row($e)
    {
        $conn = (new self)->conn();
        $query = mysqli_query($conn, $e);
        $box = [];
        while ($data = mysqli_fetch_object($query) ) {
            $box[] = $data;
        }
        return $box[0];
    }
    //Data Array
    public static function query_result_array($e)
    {
        $conn = (new self)->conn();
        $query = mysqli_query($conn, $e);
        $box = [];
        while ($data = mysqli_fetch_array($query) ) {
            $box[] = $data;
        }
        return $box;
    }
    //Data Array Assoc, index berupa nama bukan int
    public static function query_result_assoc($e)
    {
        $conn = (new self)->conn();
        $query = mysqli_query($conn, $e);
        $box = [];
        while ($data = mysqli_fetch_assoc($query) ) {
            $box[] = $data;
        }
        return $box;
    }

    public static function sql_save_query($table, $data_arr){
        $conn = (new self)->conn();
        $keys = array_keys($data_arr);
        $name_of_query = "INSERT INTO ";
        $namaTable = $table;
        $data_keys = " (";
        foreach ($keys as $key => $nilai_key) {
            if ($key == 0) {
                $data_keys .= $nilai_key;
            }else{
                $data_keys .= ','.$nilai_key;
            }
        }
        $data_keys .= ")";
        $data_keys .= " VALUES ";
        $nilai_data = "(";
        for ($i=0; $i < count($data_arr); $i++) {
            if ($i == 0) {
                $nilai_data .= '"'.$data_arr[$keys[$i]].'"';
            }else{
                $nilai_data .= ',"'.$data_arr[$keys[$i]].'"';
            }
        }
        $nilai_data .= ")";
        $nilai_query = $name_of_query.$namaTable.$data_keys.$nilai_data;
        $query = mysqli_query($conn, $nilai_query);
        return $query;
    }
    /*
    public static function get_table($table='')
    {
        return (new self)->query_result_array("SELECT * FROM `".$table."`");
    }


    // hitung total query data
    public static function count_query($e)
    {
        $conn = (new self)->conn();
        $query = mysqli_query($conn, $e);
        $box = [];
        while ($data = mysqli_fetch_object($query) ) {
            $box[] = $data;
        }
        return count($box);
    }
    // nah ini rumusnya tadi
    public static function sql_like_table($arr, $search){
        $table_row_data = "";
        $table_row_data .= "(";
        foreach ($arr as $key => $value) {
            if ($key == 0) {
                $table_row_data .= $value." LIKE '%".$search."%' ";
            }else{
                $table_row_data .= ' OR '.$value." LIKE '%".$search."%' ";
            }
        }
        $table_row_data .= ")";
        return $table_row_data;
    }

    public static function sql_order_table($arr, $order){
        if ($order != "") {
            $columnName = "";
            foreach ($arr as $key => $nilaicolumn) {
                if ($key == $order[0]["column"]) {
                    $columnName = $nilaicolumn;
                }
            }
            $columnOrder = $_POST["order"][0]["dir"];
            $order = 'ORDER BY '.$columnName.' '.$columnOrder.' ';
        }else{
            $order = ' ORDER BY id DESC ';
        }

        return $order;
    }

    

    public static function sql_update_query($table, $data_arr, $where){
        $conn = (new self)->conn();

        $data = "data saya ok";
        $keys = array_keys($data_arr);
        $keys2 = array_keys($where);
        $name_of_query = "UPDATE ";
        $namaTable = $table;
        $nilai_data = " SET ";
        for ($i=0; $i < count($data_arr); $i++) {
            if ($i == 0) {
                $nilai_data .= $keys[$i].' = "'.$data_arr[$keys[$i]].'"';
            }else{
                $nilai_data .= ', '.$keys[$i].' = "'.$data_arr[$keys[$i]].'"';
            }
        }
        $argument = " WHERE ";
        for ($y=0; $y < count($where); $y++) {
            if ($y == 0) {
                $argument .= $keys2[$y]." = '".$where[$keys2[$y]]."' ";
            }else{
                $argument .= " AND ".$keys2[$y]." = '".$where[$keys2[$y]]."' ";
            }
        }
        $nilai_query = $name_of_query.$namaTable.$nilai_data.$argument;
        $query = mysqli_query($conn, $nilai_query);
        return $query;
    }

    public static function sql_delete_query($table, $where){
        $conn = (new self)->conn();
        $keys2 = array_keys($where);
        $argument = " WHERE ";
        for ($y=0; $y < count($where); $y++) {
            if ($y == 0) {
                $argument .= $keys2[$y]." = '".$where[$keys2[$y]]."' ";
            }else{
                $argument .= " AND ".$keys2[$y]." = '".$where[$keys2[$y]]."' ";
            }
        }
        $delete_query = "DELETE FROM ".$table.$argument;

        $query = mysqli_query($conn, $delete_query);
        return $query;

    }*/
}

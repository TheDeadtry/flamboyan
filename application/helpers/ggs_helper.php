<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


function formatTanggal($data=""){
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    return date('d-m-Y', strtotime( str_replace(".","-",$data) ) );
}

function bagi($a){
    $b = count($a);
    for ($i=0; $i < $b; $i+=4) { 
        $c[] = array_slice($a, $i, 4);
    }

    return array_merge($c);
}

function buat_array($a){

	for ($i=0; $i < $a; $i++) { 
		$x[] = $i;
	}

	return array($x);
}

function bagi_bagi($a, $z){
    $b = count($a);
    for ($i=0; $i < $b; $i+=$z) { 
        $c[] = array_slice($a, $i, $z);
    }

    return array_merge($c);
}

function ToInsert($data = [], $table = 'test', $wht = '') {
    // Memeriksa apakah data tidak kosong
    if (count($data) > 0) {
        // Mendapatkan nama kolom dari elemen pertama data
        $columns = array_keys($data[0]);
        $sql = '';
        
        // Bagian INSERT INTO
        $sql .= 'INSERT INTO ';
        $sql .= $table;
        $sql .= '(';
        $sql .= implode(',', array_map(function($col) {
            return "`$col`";
        }, $columns));
        $sql .= ')';
        $sql .= "\n";
        
        // Bagian SELECT
        $sql .= 'SELECT ';
        $sql .= implode(',', array_map(function($col) {
            return "a.$col";
        }, $columns));
        $sql .= ' FROM (';
        
        // Menyiapkan SELECT bagian UNION ALL
        $sql .= implode("\n UNION ALL \n", array_map(function($row) use ($columns) {
            $selectPart = 'SELECT ';
            $selectPart .= implode(',', array_map(function($col) use ($row) {
                if (isset($row[$col])) {
                    return '"' . addslashes($row[$col]) . '" AS `' . $col . '`';
                } else {
                    return '"-" AS `' . $col . '`';
                }
            }, $columns));
            return $selectPart;
        }, $data));
        
        $sql .= ') a';
        
        // Jika $wht adalah array, tambahkan LEFT JOIN dan WHERE clause
        if (is_array($wht)) {
            $sql .= ' LEFT JOIN ' . $table . ' ON ';
            $sql .= implode(' AND ', array_map(function($whtCol) use ($table) {
                return $table . '.' . $whtCol . ' = a.' . $whtCol;
            }, $wht));
            $sql .= ' WHERE ';
            $sql .= implode(' AND ', array_map(function($whtCol) use ($table) {
                return $table . '.' . $whtCol . ' IS NULL';
            }, $wht));
        }
        
        return $sql;
    } else {
        // Jika data kosong, kembalikan array kosong
        return [];
    }
}

function ToSelect($data = [], $table = 'test', $wht = '') {
    // Memeriksa apakah data tidak kosong
    if (count($data) > 0) {
        // Mendapatkan nama kolom dari elemen pertama data
        $columns = array_keys($data[0]);
        $sql = '';

        // Bagian SELECT
        $sql .= 'SELECT ';
        $sql .= implode(',', array_map(function($col) {
            return "a.$col";
        }, $columns));
        $sql .= ' FROM (';

        // Menyiapkan SELECT bagian UNION ALL
        $sql .= implode("\n UNION ALL \n", array_map(function($row) use ($columns) {
            $selectPart = 'SELECT ';
            $selectPart .= implode(',', array_map(function($col) use ($row) {
                if (isset($row[$col])) {
                    return '"' . addslashes($row[$col]) . '" AS `' . $col . '`';
                } else {
                    return '"-" AS `' . $col . '`';
                }
            }, $columns));
            return $selectPart;
        }, $data));

        $sql .= ') a';

        // Jika $wht adalah array, tambahkan LEFT JOIN dan WHERE clause
        if (is_array($wht)) {
            $sql .= ' LEFT JOIN ' . $table . ' ON ';
            $sql .= implode(' AND ', array_map(function($whtCol) use ($table) {
                return $table . '.' . $whtCol . ' = a.' . $whtCol;
            }, $wht));
            $sql .= ' WHERE ';
            $sql .= implode(' AND ', array_map(function($whtCol) use ($table) {
                return $table . '.' . $whtCol . ' IS NULL';
            }, $wht));
        }

        return $sql;
    } else {
        // Jika data kosong, kembalikan array kosong
        return [];
    }
}

function ToUpdate($data=[], $table = 'test', $wht = 'kode') {
    // Memeriksa apakah data tidak kosong
    if (count($data) > 0) {
        // Mendapatkan nama kolom dari elemen pertama data
        $columns = array_keys($data[0]);
        $sql = '';
        
        // Bagian UPDATE
        $sql .= 'UPDATE ';
        $sql .= $table;
        $sql .= ' aa , ( ';
        $sql .= 'SELECT ';
        $sql .= implode(',', array_map(function($col) {
            return "a.$col";
        }, $columns));
        $sql .= ' FROM (';
        
        // Menyiapkan SELECT bagian UNION ALL
        $sql .= implode("\n UNION ALL \n", array_map(function($row) use ($columns) {
            $selectPart = 'SELECT ';
            $selectPart .= implode(',', array_map(function($col) use ($row) {
                return '"' . addslashes($row[$col]) . '" AS `' . $col . '`';
            }, $columns));
            return $selectPart;
        }, $data));
        
        $sql .= ') a ) bb SET ';
        $sql .= implode(',', array_map(function($col) {
            return "aa.$col = bb.$col";
        }, $columns));
        $sql .= ' WHERE ';
        
        // Menambahkan kondisi WHERE
        if (is_array($wht)) {
            $sql .= implode(' AND ', array_map(function($whtCol) use ($table) {
                return "aa.$whtCol = bb.$whtCol";
            }, $wht));
        } else {
            $sql .= "aa.$wht = bb.$wht";
        }
        
        return $sql;
    } else {
        // Jika data kosong, kembalikan array kosong
        return [];
    }
}

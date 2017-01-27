<?php
class DB extends \PDO
{
    protected $settings = [
        'host' => 'localhost',
        'username' => 'root',
        'password' => '',
        'dbname' => 'chat',
        'charset' => 'utf8',
        'driver' => 'pdo'
    ];
    public $db;
    private $sql;
    private $tableName;
    private $where;
    private $join;
    private $orderBy;
    private $groupBy;
    private $limit;
    private $page;
    private $totalRecord;
    private $pageCount;
    private $paginationLimit;
    private $html;
    public function __construct(){
        try {
            $this->db = new PDO('mysql:host=' . $this->settings['host'] . ';dbname='.$this->settings['dbname'] . ';charset=' . $this->settings['charset'], $this->settings['username'], $this->settings['password']);
        }catch(PDOException $e){
            echo 'HATA : ' . $e->getMessage();
        }
    }
    public function select($tableName){
        $this->sql = 'SELECT * FROM `' . $tableName . '`';
        $this->tableName = $tableName;
        return $this;
    }
    public function from($from){
        $this->sql = str_replace('*', $from, $this->sql);
        return $this;
    }
    public function where($column, $value = '', $mark = '=', $logical = '&&'){
        $this->where[] = array(
            $column,
            $value,
            $mark,
            $logical
        );
        return $this;
    }
    public function or_where($column, $value, $mark = '='){
        $this->where($column, $value, $mark, '||');
        return $this;
    }
    public function join($targetTable, $joinSql, $joinType = 'inner'){
        $this->join[] = ' ' . strtoupper($joinType) . ' JOIN ' . $targetTable . ' ON ' . sprintf($joinSql, $targetTable, $this->tableName);
        return $this;
    }
    public function orderby($columnName, $sort = 'ASC'){
        $this->orderBy = ' ORDER BY ' . $columnName . ' ' . strtoupper($sort);
        return $this;
    }
    public function groupby($columnName){
        $this->groupBy = ' GROUP BY ' . $columnName;
        return $this;
    }
    public function limit($start, $limit){
        $this->limit = ' LIMIT ' . $start . ',' . $limit;
        return $this;
    }
    public function run($single = false){
        if ($this->join) {
            $this->sql .= implode(' ', $this->join);
            $this->join = null;
        }
        $this->get_where();
        if ($this->groupBy) {
            $this->sql .= $this->groupBy;
            $this->groupBy = null;
        }
        if ($this->orderBy) {
            $this->sql .= $this->orderBy;
            $this->orderBy = null;
        }
        if ($this->limit) {
            $this->sql .= $this->limit;
            $this->limit = null;
        }
        $query = $this->db->query($this->sql);
        if ($single){
            return $query->fetch(parent::FETCH_ASSOC);
        }else {
            return $query->fetchAll(parent::FETCH_ASSOC);
        }
    }
    private function get_where(){
        if (is_array($this->where) && count($this->where) > 0) {
            $this->sql .= ' WHERE ';
            $where = array();
            foreach ($this->where as $key => $arg) {
                if (strstr($arg[1], 'FIND_IN_SET')) {
                    $where[] = ($key > 0 ? $arg[3] : null) . $arg[1];
                } else {
                    $where[] = ($key > 0 ? $arg[3] : null) . ' `' . $arg[0] . '` ' . strtoupper($arg[2]) . ' ' . (strstr($arg[2], 'IN') ? '(' : '"') . $arg[1] . (strstr($arg[2], 'IN') ? ')' : '"');
                }
            }
            $this->sql .= implode(' ', $where);
            $this->where = null;
        }
    }
    public function insert($tableName){
        $this->sql = 'INSERT INTO ' . $tableName;
        return $this;
    }
    public function set($columns){
        $val = array();
        $col = array();
        foreach ($columns as $column => $value) {
            $val[] = $value;
            $col[] = $column . ' = ? ';
        }
        $this->sql .= ' SET ' . implode(', ', $col);
        $this->get_where();
        $query =$this->db->prepare($this->sql);
        $result = $query->execute($val);
        return $result;
    }
    public function lastId(){
        return $this->lastInsertId();
    }
    public function update($columnName){
        $this->sql = 'UPDATE ' . $columnName;
        return $this;
    }
    public function delete($columnName){
        $this->sql = 'DELETE FROM ' . $columnName;
        return $this;
    }
    public function done(){
        $this->get_where();
        $query = $this->db->exec($this->sql);
        return $query;
    }
    public function total(){
        if ($this->join){
            $this->sql .= implode(' ', $this->join);
            $this->join = null;
        }
        $this->get_where();
        if ($this->orderBy){
            $this->sql .= $this->orderBy;
            $this->orderBy = null;
        }
        if ($this->groupBy){
            $this->sql .= $this->groupBy;
            $this->groupBy = null;
        }
        if ($this->limit){
            $this->sql .= $this->limit;
            $this->limit = null;
        }
        $query = $this->db->query($this->sql)->fetch(parent::FETCH_ASSOC);
        return $query['total'];
    }
}
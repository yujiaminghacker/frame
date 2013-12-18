<?php 
class Model{
	//当前草做的数据库表
	public $table;
	public $opt=array(
		"where"=>"",
		"field"=>"*",
		"group"=>"",
		"having"=>"",
		"limit"=>"",
		"order"=>""
	);
	public function __construct($table){
		//数据库链接
		$this->connect();
		$this->table=$table;
	}
	//字段全部
	public function field($arg){
		$this->opt['field']=" ". $arg." ";
	}
	//查找
	public function where($arg){
	$this->opt['where']=" WHERE ".$arg;
	return $this;
	}
	//group
	public function group($arg){
	$this->opt['group']=" GROUP BY ".$arg;
	return $this;
	}
	//LIMIT
	public function limit($arg){
		$this->opt['limit']=" LIMIT ".$arg;
		return $this;
	}
	//having
	public function having($arg){
		$this->opt['having']=" HAVING ".$arg;
		return $this;
	}
	//order
	public function order($arg){
		$this->opt['order']=" ORDER BY ".$arg;
		return $this;
	}
	//只查找一条
	public function find(){
		$this->limit(1);
		$result =$this->select();
		if(!empty($result)){
			return current($result);
		}
	}

	//查询数据
	public function select(){
		$sql = "SELECT {$this->opt['field']} FROM " .$this->table.
			$this->opt['where'].$this->opt['group'].$this->opt['having'].
			$this->opt['order'].$this->opt['limit'];
		return $this->query($sql);
	}

	//数据库连接
	public function connect(){
		$this->link=new Mysqli(C("DB_HOST"),C("DB_USER"),C("DB_PASSWORD"),C("DB_NAME"));
		if($this->link->connect_errno){
			error($this->link->connect_error);
		}
		$this->link->query("SET NAMES utf8");
	}
	//发送查询
	public function query($sql){
		$result = $this->link->query($sql);
		if(!$result)return null;
		$rows=array();
		while ($row=$result->fetch_assoc()) {
			$rows[]=$row;
		}
	return $rows;
	}
	//添加
	public function insert($data=null){
		$data=$data?$data:$_POST;
		if(empty($data))return;
		$field=array_keys($data);
		$sql = "INSERT INTO ".$this->table.
		"(".implode(",", $field).") VALUES(";
		foreach($data as $field=>$value){
			$sql.="'".addslashes($value)."',";
		}	

		$sql = substr($sql, 0,-1).")";
		return $this->exe($sql);
	}

	//修改数据
	public function update($data=null){
		$data = $data?$data:$_POST;
		if(!$this->opt['where'] || empty($data))return;
		$sql = " UPDATE ".$this->table." SET ";
		foreach($data as $field=>$value){
			$sql.=$field."='".addslashes($value)."',";
		}
		$sql=substr($sql,0,-1).$this->opt['where'];
		$s = $this->exe($sql);
		return $s===false?false:true;
	}
	//del
	public function delete(){
		if(!$this->opt['where'])return;
		$sql = "DELETE FROM ".$this->table.$this->opt['where'].
			$this->opt['order'].
			$this->opt['limit'];
		return $this->exe($sql);
	}
	//处理增/删/改
	public function exe($sql){
		$stat = $this->link->query($sql);
		if(!$stat)return false;
		return 	$this->link->insert_id?//插入的idS
				$this->link->insert_id:
				$this->link->affected_rows;//受影响的条数


	}
}
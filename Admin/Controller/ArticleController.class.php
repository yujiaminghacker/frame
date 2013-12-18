<?php 
header("Contet-type:text/html;charset=utf-8");
class ArticleController extends Controller{
	private $db;
	public function __construct(){
		parent::__construct();//调用父级的构造函数
		$this->db=new Model("article");
	}
	//显示文章列表
	public function show(){
		$m=new Model("article");
		$data = $m->select();
		$this->assign("data",$data);
		$this->display("show.html");
	}
	//添加数据
	public function add(){
		if($_POST){
			$m = new Model("article");
			if($m->insert()){
				$this->success("添加成功","?c=Article&m=show");
			}else{
				$this->error("添加失败");
			}
		}else{
			$this->display("add.html");
		}
	}

	//修改文章
	public function edit(){
		if($_POST){
		if($this->db->where("aid={$_POST['aid']}")->update()){
				$this->success('修改成功',"?c=Article&m=show");
			}else{
				$this->error("修改失败");
			}
		}else{
			$aid = intval($_GET['aid']);
			$field = $this->db->where("aid=$aid")->find();
			$this->assign("field",$field);
			$this->display("edit.html");
		}
	}
	//删除文章
	public function del(){
		$aid=intval($_GET['aid']);
		if($aid){
			if($this->db->where("aid=$aid")->delete()){
				$this->success('删除成功',"?c=Article&m=show");
			}else{
				$this->error("删除失败");
			}
		}
	}
}
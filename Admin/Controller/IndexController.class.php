<?php
class IndexController extends Controller{
	public function Index(){
		header("Contet-type:text/html;charset=utf-8");
		$model = new Model("alticle");
		// $a=$model->query("select * from article");
		// p($a);
	}
}	
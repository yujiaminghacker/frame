<?php /* Smarty version 2.6.26, created on 2013-12-18 20:12:07
         compiled from edit.html */ ?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>发表文章</title>
</head>
<body>
<form action="?c=Article&m=edit" method="post">
		<input type='hidden' name='aid' value="<?php echo $this->_tpl_vars['field']['aid']; ?>
"/>
	<table border=1>
		<tr>
			<th>标题</th>
			<th>
				<input type="text" name="title" value="<?php echo $this->_tpl_vars['field']['title']; ?>
"/>
			</th>
		</tr>
		<tr>
			<th>内容</th>
			<th>
				<textarea name="con" ><?php echo $this->_tpl_vars['field']['con']; ?>
</textarea>
			</th>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" value="提交">
			</td>
		</tr>
	</table>
</form>
</body>
</html>
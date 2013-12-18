<?php /* Smarty version 2.6.26, created on 2013-12-18 19:15:40
         compiled from show.html */ ?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>show </title>
</head>
<body>
<h1><a href="?c=Article&m=add">添加</a></h1>
<?php unset($this->_sections['n']);
$this->_sections['n']['loop'] = is_array($_loop=($this->_tpl_vars['data'])) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['n']['name'] = 'n';
$this->_sections['n']['show'] = true;
$this->_sections['n']['max'] = $this->_sections['n']['loop'];
$this->_sections['n']['step'] = 1;
$this->_sections['n']['start'] = $this->_sections['n']['step'] > 0 ? 0 : $this->_sections['n']['loop']-1;
if ($this->_sections['n']['show']) {
    $this->_sections['n']['total'] = $this->_sections['n']['loop'];
    if ($this->_sections['n']['total'] == 0)
        $this->_sections['n']['show'] = false;
} else
    $this->_sections['n']['total'] = 0;
if ($this->_sections['n']['show']):

            for ($this->_sections['n']['index'] = $this->_sections['n']['start'], $this->_sections['n']['iteration'] = 1;
                 $this->_sections['n']['iteration'] <= $this->_sections['n']['total'];
                 $this->_sections['n']['index'] += $this->_sections['n']['step'], $this->_sections['n']['iteration']++):
$this->_sections['n']['rownum'] = $this->_sections['n']['iteration'];
$this->_sections['n']['index_prev'] = $this->_sections['n']['index'] - $this->_sections['n']['step'];
$this->_sections['n']['index_next'] = $this->_sections['n']['index'] + $this->_sections['n']['step'];
$this->_sections['n']['first']      = ($this->_sections['n']['iteration'] == 1);
$this->_sections['n']['last']       = ($this->_sections['n']['iteration'] == $this->_sections['n']['total']);
?>
	<li>title:<?php echo $this->_tpl_vars['data'][$this->_sections['n']['index']]['title']; ?>

		con:<?php echo $this->_tpl_vars['data'][$this->_sections['n']['index']]['con']; ?>

		<a href="?c=Article&m=edit&aid=<?php echo $this->_tpl_vars['data'][$this->_sections['n']['index']]['aid']; ?>
">
			\<编辑
		</a> |
		<a href="?c=Article&m=del&aid=<?php echo $this->_tpl_vars['data'][$this->_sections['n']['index']]['aid']; ?>
">
			删除>
		</a> |
	 </li>
<?php endfor; endif; ?>
</body>
</html>
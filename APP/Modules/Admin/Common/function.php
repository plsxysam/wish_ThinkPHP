<?php 

/**
 * 递归重组节点信息为多维数组
 * $node [要处理的节点数组]	
 * $pid  [父级ID]
 */
function node_merge ($node, $pid = 0){
	$arr =  array();

	foreach ($node as $v) {
		if($v['pid'] == $pid){
			$v['child'] = node_merge($node, $v['id']);
			$arr[] = $v;
		}
	}
	return $arr;

}
 ?>
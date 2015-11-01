<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>商品类别信息管理</title>
</head>
<body>
    <center>
        <h3>浏览商品类别信息</h3>
        <table width="600" border="1">
            <tr>
                <th>ID号</th>
                <th>类别名称</th>
                <th>父级ID</th>
                <th>路径path</th>
                <th>操作</th>
            </tr>
<?php
      //载入配置文件
      require('../../public/config.php');
      //连接数据库操作
      $link = @mysql_connect(HOST,USER,PASS) or die('数据库连接失败');

      mysql_select_db(DBNAME,$link);
      mysql_set_charset('utf8');

      //4.定义sql语句并执行
      $sql = "select * from ".PREFIX."type order by concat(path,id)";

      $result = mysql_query($sql);

      //判断并遍历输出结果集
      if($result && mysql_num_rows($result) > 0){ 
          while($row = mysql_fetch_assoc($result)){ 
          	//处理类别名称
          	$m = substr_count($row['path'],',')-1;
         	$padding = str_repeat("&nbsp;",$m*3)."|-";
              echo "<tr>";    
              echo "<td>{$row['id']}</td>";
              echo "<td>{$padding}{$row['name']}</td>";
              echo "<td>{$row['pid']}</td>";
              echo "<td>{$row['path']}</td>";
              echo "<td>
              	<a href='add.php?pid={$row['id']}&path={$row['path']}&name={$row['name']}'>添加</a>
              	<a href='update.php?id={$row['id']}&path={$row['path']}&name={$row['name']}'>修改</a>
              	<a href='action.php?a=delete&id={$row['id']}'>删除</a>
                </td>";
              echo "</tr>";
          }
      }else{ 
          echo "<tr>";
          echo "<td colspan='5'>暂无数据</td>";
          echo "</tr>";
      }


?>          
        </table>
    </center>
</body>
</html>





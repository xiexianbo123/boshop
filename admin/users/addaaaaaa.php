<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>用户添加</title>
</head>
<body>
	<form action="../useraction.php?a=doAdd" method="post">
		<table width="350" border="0">
			<tr>
				<td>登陆账号:</td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr>
				<td>真实姓名:</td>
				<td><input type="text" name="name" value=""></td>
			</tr>
			<tr>
				<td>密码:</td>
				<td><input type="password" name="pass"></td>
			</tr>
			<tr>
				<td>再次密码:</td>
				<td><input type="password" name="repass"></td>
			</tr>
			<tr>
				<td>性别:</td>
				<td>
					<input type="radio" name="sex" value="1" checked/>男
					<input type="radio" name="sex" value="0"/>女
				</td>
			</tr>
				<tr>
					<td>地址:</td>
					<td><input type="text" name="address" value=""></td>
				</tr>
				<tr>
					<td>邮编:</td>
					<td><input type="text" name="code"></td>
				</tr>
				<tr>
					<td>电话:</td>
					<td><input type="text" name="phone"></td>
				</tr>
				<tr>
					<td>email:</td>
					<td><input type="text" name="email"></td>
				</tr>
				<tr>
					<td>状态:</td>
					<td>
						<input type="radio" name="state" value="0">管理员
						<input type="radio" name="state" value="1" checked />普通会员
						<input type="radio" name="state" value="2">禁用
					</td>
				</tr>

				<tr>
					<td colspan="2">
						<input type="submit" value="增加" />
						<input type="reset" value="重置" />
					</td>
				</tr>
		</table>
	</form>
</body>
</html>
<%@ page language="java" import="java.util.*" pageEncoding="UTF-8"%>
<%
String path = request.getContextPath();
String basePath = request.getScheme()+"://"+request.getServerName()+":"+request.getServerPort()+path+"/";
%>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <base href="<%=basePath%>">
    
    <title>My JSP 'index.jsp' starting page</title>
	<meta http-equiv="pragma" content="no-cache">
	<meta http-equiv="cache-control" content="no-cache">
	<meta http-equiv="expires" content="0">    
	<meta http-equiv="keywords" content="keyword1,keyword2,keyword3">
	<meta http-equiv="description" content="This is my page">
	<!--
	<link rel="stylesheet" type="text/css" href="styles.css">
	-->
  </head>
  
  <body>
    <form action="login">
		<table align="center">
			<caption>用户登陆</caption>
			<tr>
				<td>用户名：<input type="text" name="user" /></td>
			</tr>
			<tr>
				<td>密码：&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="password" /></td>
			</tr>
			<tr align="center">
				<td colspan="2"><input type="submit" value="添加" /><input
					type="reset" value="重填" /></td>
			</tr>
		</table>
	</form>
  </body>
</html>

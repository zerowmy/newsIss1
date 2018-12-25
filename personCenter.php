<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>个人中心</title>
<style type="text/css">
	*{margin:0px; padding:0px;}
	h2{color:#ff0; background:#e7b862; text-align:center;height:40px;line-height:40px;font-size:28px;}
	.info{ margin:15px auto; height:300px; font-size:28px;}
	.info .info_img{ display:inline-block; vertical-align:middle; height:220px; }
	.info .info_tab{ display:inline-block; vertical-align:middle; height:220px; line-height: 70px;background: pink;}
</style>
</head>
<body>
<h2>个人用户中心</h2>
<%
	mysql.driver();
	Connection con = null;	
	Statement sql = null;
	con = DriverManager.getConnection(mysql.DB_URL, mysql.DB_USERNAME, mysql.DB_PASSWORD);
	//与Mysql数据库连接后，得到连接对象con
	sql = con.createStatement();
	//n_title,n_content,n_author,n_date
	String username = (String)session.getAttribute("username");
	int id = 0;
	String sex = "";
	String age = "";
	String email = "";
	ResultSet rs = sql.executeQuery("select * from user where username='"+username+"'");
	while(rs.next())
	{
		id = rs.getInt(1);
		sex = rs.getString(4);
		age = rs.getString(5);
		email = rs.getString(6);
		/* System.out.print(rs.getString(1));//ID
		System.out.print(rs.getString(2));//姓名
		System.out.print(rs.getString(3));//密码
		System.out.print(rs.getString(4));//性别
		System.out.print(rs.getString(5));//出生年份
		System.out.print(rs.getString(6));//电子邮箱 */
	}
	sex = sex.equals("0")?"女":"男";
%>
<div class="info">
	<img class="info_img" src="images/people.png" width="230" height="230" alt="self"/>
	<div class="info_tab">
	用户ID:&emsp;<%=id %>&emsp;
	用&ensp;户&ensp;名:&emsp;<%=username %><br />
	性&emsp;别:&emsp;<%=sex %>&emsp;&ensp;
	出生日期:&emsp;<%=age %>年<br />
	邮&emsp;箱:&emsp;<%=email %>
	</div>
</div>
</body>
</html>
/*
on error resume next
connstr="Provider=Microsoft.Jet.OLEDB.4.0;Data Source="&Server.MapPath("../#senlonsuanming.asp")
set conn=server.createobject("ADODB.CONNECTION")
conn.open connstr
If Err Then
response.Write "连接数据库出错!"
err.Clear
Set conn = Nothing
Response.End
End If
*/

// Connecting, selecting database
$dbconn = pg_connect("host=localhost port=5432 dbname=senlon user=postgres password=123456789")
    or die('Could not connect: ' . pg_last_error());
<%
on error resume next
connstr="Provider=Microsoft.Jet.OLEDB.4.0;Data Source="&Server.MapPath("../#senlonsuanming.asp")
set conn=server.createobject("ADODB.CONNECTION")
conn.open connstr
If Err Then
response.Write "�������ݿ����!"
err.Clear
Set conn = Nothing
Response.End
End If
%>
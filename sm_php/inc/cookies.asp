<%
'写入cookies---writecookies()
function writecookies()
dim xing,ming,xingbie,xuexing,nian1,yue1,ri1,hh1,mm1
xing=newtrim(request("xing"))
ming=newtrim(request("ming"))
xingbie=newtrim(request("xingbie"))
xuexing=newtrim(request("xuexing"))
'公历
nian1=newtrim(request("nian"))
yue1=newtrim(request("yue"))
ri1=newtrim(request("ri"))
hh1=newtrim(request("hh"))
mm1=newtrim(request("mm"))
'农历
dim glstr,nlstr
glstr=nian1&"-"&yue1&"-"&ri1
nlstr=hhcal(glstr)
dim nlarray,nlnian,nlyue,nlri,sx
nlarray=split(nlstr,"|",-1,1)
nlnian=nlarray(0)
nlyue=nlarray(1)
nlri=nlarray(2)
sx=nlarray(3)

response.Cookies("laisuanming").Expires=date+1
response.Cookies("laisuanming")("xing")=xing
response.Cookies("laisuanming")("ming")=ming
response.Cookies("laisuanming")("xingbie")=xingbie
response.Cookies("laisuanming")("xuexing")=xuexing
'公历
response.Cookies("laisuanming")("nian1")=nian1
response.Cookies("laisuanming")("yue1")=yue1
response.Cookies("laisuanming")("ri1")=ri1
response.Cookies("laisuanming")("hh1")=hh1
response.Cookies("laisuanming")("mm1")=mm1
'农历
response.Cookies("laisuanming")("nian2")=nlnian
response.Cookies("laisuanming")("yue2")=nlyue
response.Cookies("laisuanming")("ri2")=nlri
response.Cookies("laisuanming")("hh2")=hh1
response.Cookies("laisuanming")("mm2")=mm1
response.Cookies("laisuanming")("sx")=sx
end function
%>
<%
'清除cookies---clearcookies()
function clearcookies()
response.Cookies("laisuanming")("xing")=""
response.Cookies("laisuanming")("ming")=""
response.Cookies("laisuanming")("xingbie")=""
response.Cookies("laisuanming")("xuexing")=""
'公历
response.Cookies("laisuanming")("nian1")=""
response.Cookies("laisuanming")("yue1")=""
response.Cookies("laisuanming")("ri1")=""
response.Cookies("laisuanming")("hh1")=""
response.Cookies("laisuanming")("mm1")=""
'农历
response.Cookies("laisuanming")("nian2")=""
response.Cookies("laisuanming")("yue2")=""
response.Cookies("laisuanming")("ri2")=""
response.Cookies("laisuanming")("hh2")=""
response.Cookies("laisuanming")("mm2")=""
response.Cookies("laisuanming")("sx")=""
end function
%>
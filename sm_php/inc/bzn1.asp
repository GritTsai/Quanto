<%Dim yearlast
Dim day60
Dim a(1000)
Dim nlsc(100)
Dim sczy(100)
Dim scsy(100)
Dim jz(100)
dim  dayname(31)
dim MonName(13)
dim rn
dim mdn1
'È·¶¨½ÚÆø yzn1 ÔÂÖ§  ÆğÔË»ùÊı qyjsn1
mdn1=bzm1 * 100 + bzd1
if(mdn1>=204 and mdn1<= 305) then
mzn1 = 3
qyjsn1 = ((bzm1 - 2) * 30 + bzd1 - 4) \ 3
end if

if(mdn1>=306 and mdn1<=404) then
mzn1 = 4
qyjsn1 = ((bzm1 - 3) * 30 + bzd1 - 6) \ 3
end if

if(mdn1>=405 and mdn1<= 504) then
mzn1 = 5
qyjsn1 = ((bzm1 - 4) * 30 + bzd1 - 5) \ 3
end if

if(mdn1>=505 and mdn1<=  605) then
mzn1 = 6
qyjsn1 = ((bzm1 - 5) * 30 + bzd1 - 5) \ 3
end if

if(mdn1>=606 and mdn1<= 706) then
mzn1 = 7
qyjsn1 = ((bzm1 - 6) * 30 + bzd1 - 6) \ 3
end if

if(mdn1>=707 and mdn1<= 807) then
mzn1 = 8
qyjsn1 = ((bzm1 - 7) * 30 + bzd1 - 7) \ 3
end if

if(mdn1>=808 and mdn1<=907) then
mzn1 = 9
qyjsn1 = ((bzm1 - 8) * 30 + bzd1 - 8) \ 3
end if

if(mdn1>=908 and mdn1<=1007) then
mzn1 = 10
qyjsn1 = ((bzm1 - 9) * 30 + bzd1 - 8) \ 3
end if

if(mdn1>=1008 and mdn1<= 1106) then
mzn1 = 11
qyjsn1 = ((bzm1 - 10) * 30 + bzd1 - 8) \ 3
end if

if(mdn1>=1107 and mdn1<=  1207) then
mzn1 = 0
qyjsn1 = ((bzm1 - 11) * 30 + bzd1 - 7) \ 3
end if

if(mdn1>=1208 and mdn1<=  1231) then
mzn1 = 1
qyjsn1 = (bzd1 - 8) \ 3
end if

if(mdn1>=101 and mdn1<= 105) then
mzn1 = 1
qyjsn1 = (30 + bzd1 - 4) \ 3
end if

if(mdn1>=106 and mdn1<=  203) then
mzn1 = 2
qyjsn1 = ((bzm1 - 1) * 30 + bzd1 - 6) \ 3
end if

'È·¶¨Äê¸ÉºÍÄêÖ§ ygn1 Äê¸É yzn1 ÄêÖ§
if(mdn1>=204 and mdn1<=1231) then
ygn1 = (bzy1 - 3) Mod 10
yzn1 = (bzy1 - 3) Mod 12
end if
if(mdn1>=101 and mdn1<=203 ) then
ygn1 = (bzy1 - 4) Mod 10
yzn1 = (bzy1 - 4) Mod 12
end if

'È·¶¨ÔÂ¸É mgn1 ÔÂ¸É

If (mzn1 > 2 And mzn1 <= 11) Then

mgn1 = (ygn1 * 2 + mzn1 + 8) Mod 10
Else
mgn1 = (ygn1 * 2 + mzn1) Mod 10
End If

'´Ó¹«Ôª0Äêµ½Ä¿Ç°Äê·İµÄÌìÊı yearlast

yearlast = (bzy1 - 1) * 5 + (bzy1 - 1) \ 4 - (bzy1 - 1) \ 100 + (bzy1 - 1) \ 400
'¼ÆËãÄ³ÔÂÄ³ÈÕÓëµ±Äê1ÔÂ0ÈÕµÄÊ±¼ä²î£¨ÒÔÈÕÎªµ¥Î»£©yearday

For i = 1 To bzm1 - 1
Select Case i
Case 1, 3, 5, 7, 8, 10, 12
yearday = yearday + 31
Case 4, 6, 9, 11
yearday = yearday + 30
Case 2
If (bzy1 Mod 4 = 0) And ((bzy1 Mod 100) <> 0) Or (bzy1 Mod 400 = 0) Then
yearday = yearday + 29
Else
yearday = yearday + 28
End If
End Select

next

yearday = yearday + bzd1

'¼ÆËãÈÕµÄÁùÊ®¼××ÓÊı day60
day60 = (yearlast + yearday + 6015) Mod 60

'È·¶¨ ÈÕ¸É dgn1  ÈÕÖ§  dzn1
dgn1 = day60 Mod 10
dzn1 = day60 Mod 12
'È·¶¨ Ê±¸É tgn1 Ê±Ö§ tzn1
tzn1 = (bzh1 + 3) \ 2 Mod 12
'tgn1 = (dgn1 * 2 + tzn1 + 8) Mod 10
If (tzn1 = 0) Then
tgn1 = (dgn1 * 2 + tzn1) Mod 10

Else
tgn1 = (dgn1 * 2 + tzn1 + 8) Mod 10
End If

'°Ñ ÄêÔÂÈÕÊ± ×ª»»³ÉÎª Éú³½°Ë×Ö
Select Case yzn1
Case 1
yzgn1 = 0
Case 2, 8
yzgn1 = 6
Case 3
yzgn1 = 1
Case 4
yzgn1 = 2
Case 5, 11
yzgn1 = 5
Case 6
yzgn1 = 3
Case 7
yzgn1 = 4
Case 9
yzgn1 = 7
Case 10
yzgn1 = 8
Case 0
yzgn1 = 9
End Select


'ÔÂÖ§ÄÉ¸É mzgn1

Select Case mzn1
Case 1
mzgn1 = 0
Case 2, 8
mzgn1 = 6
Case 3
mzgn1 = 1
Case 4
mzgn1 = 2
Case 5, 11
mzgn1 = 5
Case 6
mzgn1 = 3
Case 7
mzgn1 = 4
Case 9
mzgn1 = 7
Case 10
mzgn1 = 8
Case 0
mzgn1 = 9
End Select

'ÈÕÖ§ÄÉ¸É dzgn1

Select Case dzn1
Case 1
dzgn1 = 0
Case 2, 8
dzgn1 = 6
Case 3
dzgn1 = 1
Case 4
dzgn1 = 2
Case 5, 11
dzgn1 = 5
Case 6
dzgn1 = 3
Case 7
dzgn1 = 4
Case 9
dzgn1 = 7
Case 10
dzgn1 = 8
Case 0
dzgn1 = 9
End Select

'Ê±Ö§ÄÉ¸É tzgn1

Select Case tzn1
Case 1
tzgn1 = 0
Case 2, 8
tzgn1 = 6
Case 3
tzgn1 = 1
Case 4
tzgn1 = 2
Case 5, 11
tzgn1 = 5
Case 6
tzgn1 = 3
Case 7
tzgn1 = 4
Case 9
tzgn1 = 7
Case 10
tzgn1 = 8
Case 0
tzgn1 = 9
End Select

'µ½´Ë£¬Íê³É¸÷µØÖ§ËùÄÉÌì¸ÉµÄÈ·¶¨ÈÎÎñ
yg1n1=a(20 + ygn1)
yz1n1=a(30 + yzn1)
mg1n1=a(20 + mgn1)
mz1n1=a(30 + mzn1)
dg1n1=a(20 + dgn1)
dz1n1=a(30 + dzn1)
tg1n1=a(20 + tgn1)
tz1n1=a(30 + tzn1)
ygzn1=a(20 + ygn1)&a(30 + yzn1)
mgzn1=a(20 + mgn1)&a(30 + mzn1)
dgzn1=a(20 + dgn1)&a(30 + dzn1)
tgzn1=a(20 + tgn1)&a(30 + tzn1)%>
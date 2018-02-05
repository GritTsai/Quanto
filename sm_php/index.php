<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta charset="utf-8">
<title>Senlon免费在线算命系统 V3.1</title>
<style type="text/css">
<!--
.STYLE1 {color: #FF0000}
-->
</style>

<?php
include 'top.php';
include 'conn.php';
include 'inc/function.php';
include 'inc/getuc.php';
?>

<div id="right">
<?php
  include 'right.php';
?>
</div>

<div id="left">
<div style="width:100%">
<?php
if ($xing<>"") {
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="b1" style="table-layout:fixed;word-wrap:break-word;">
  <tbody>
    <tr>
      <td class=ttop style="PADDING-BOTTOM: 1px" valign="top">当前算命者信息</td>
    </tr>
    <tr>
      <td class=new style="PADDING-BOTTOM: 8px" valign="top">姓名：<font color="#FF0000"><?php echo $xing.$ming;?></font> 性别：<?php echo $xingbie;?>
          <?php if($xuexing <> "") {?>
血型：<?php echo $xuexing ?> 型
		  <?php } ?>
		  <?php
		    echo '血型：'.$xuexing.'型';
		  ?>
出生:<font color="#0000ff"><?php echo $nian1.'年'.$yue1.'月'.$ri1.'日'.$hh1.'时'.$mm1.'分';?></font> 今年<?php echo $userll;?>岁 属相:<?php echo $sx;?>&nbsp;星座:<?php echo Constellation($yue1, $ri1);?>&nbsp;
<input name="button2" type="button" class="button" style="cursor:hand;COLOR: #ff0000;FONT-WEIGHT: bold;" onClick="(location='cookieclear.asp')" value="重新测试" />
     </td>
    </tr>
     <tr>
      <td class=new style="PADDING-BOTTOM: 8px" vAlign=top><div align="center">
        <input type="button" value="生辰八字" style='cursor:hand;' onClick="(location='sm/sm.asp?sm=1')" class="button">
        <input type="button" value="八字测算" onClick="(location='sm/sm.asp?sm=2')" style="cursor:hand;" class="button" /> 
        <input type="button" value="日干论命" onClick="(location='sm/sm.asp?sm=3')" style="cursor:hand;COLOR: #0000ff;" class="button" />
        <input type="button" value="称骨论命" onClick="(location='sm/sm.asp?sm=4')" style="cursor:hand;" class="button" />
        <input type="button" value="姓名测试" onClick="(location='sm/sm.asp?sm=5')" style="cursor:hand;" class="button" />
        <input type="button" value="姓名配对" onClick="(location='sm/sm.asp?sm=6')" style="cursor:hand;COLOR: #0000ff;" class="button" />
        <input type="button" value="属相性格" onClick="(location='astro/astro_show.asp?flag=5&xiao=<?php echo $sx; ?>')" style="cursor:hand;" class="button" />
      </td>
    </tr>
    <tr>
      <td class=new style="PADDING-BOTTOM: 8px" vAlign=top><div align="center">
        <input type="button" value="身体保健" style='cursor:hand;' onClick="(location='astro/baojian.asp')" class="button">
        <input type="button" value="EQ 曲线" onClick="(location='astro/eq.asp')" style="cursor:hand;" class="button" /> 
        <input type="button" value="五大建议" onClick="(location='astro/wu.asp')" style="cursor:hand;COLOR: #0000ff;" class="button" />
        <input type="button" value="生日密码" onClick="(location='astro/astro_show.asp?flag=8&flag1=生日书&m=<?php echo $yue1.'&d='.$ri1; ?>')" style="cursor:hand;" class="button" />
        <input type="button" value="生日花语" onClick="(location='astro/astro_show.asp?flag=8&flag1=生日花&m=<?php echo $yue1.'&d='.$ri1; ?>')" style="cursor:hand;" class="button" />
        <input type="button" value="血型性格" onClick="(location='astro/astro_show.asp?flag=6&xuexing=<?php echo $xuexing; ?>')" style="cursor:hand;" class="button" />
        <input type="button" value="星座名人" style='cursor:hand;' onClick="(location='astro/mingren.asp')" class="button">
      </td>
    </tr>
    <tr>
      <td class=new style="PADDING-BOTTOM: 8px" vAlign=top><div align="center">
        <input type="button" value="IQ 揭密" onClick="(location='astro/iq.asp')" style="cursor:hand;" class="button" /> 
        <input type="button" value="个人实力" onClick="(location='astro/shili.asp')" style="cursor:hand;" class="button" />
        <input type="button" value="失败剖析" onClick="(location='astro/shibai.asp')" style="cursor:hand;" class="button" />
        <input type="button" value="三世财运" onClick="(location='yuce/sanshishu.asp')" style="cursor:hand;" class="button" />
        <input type="button" value="十二星座" onClick="(location='astro/index.asp')" style="cursor:hand;COLOR: #0000ff;" class="button" /> 
        <input type="button" value="周公解梦" onClick="(location='chouqian/zgjm.asp')" style="cursor:hand;" class="button" />
		<input type="button" value="观音灵签" onClick="(location='chouqian/guanyin.asp')" style="cursor:hand;COLOR: #FF0000;" class="button" />
      </td>
    </tr>
  </tbody>
</table>
<?php }else{ ?><script type="text/javascript" language="JavaScript">
<!--
function checkbz()
{
var year=document.sm.nian.value;
var month=document.sm.yue.value;
var day=document.sm.ri.value;
var hour=document.sm.hh.value;
var now=new Date();
var nowyear=now.getYear();
var nowmonth=now.getMonth();
if (year=='')
{
alert('请选择出生年份！');
document.sm.nian.focus()
return false;
}
//if (year>nowyear || year <=nowyear-100 || isNaN(year))
if (year <=nowyear-100 || isNaN(year))
{
alert('请选择正确的出生年份！');
document.sm.nian.focus()
return false;
}
if ( month=='')
{
alert('请选择出生月份！');
document.sm.yue.focus()
return false;
}
if (day=='')
{
alert('请选择出生日期！');
document.sm.ri.focus()
return false;
}
if ((month==2 && day>29) || ((month==1 || month==3 || month==5 || month==7 || month==8 || month==10|| month==12) && day>31) || ((month==4 || month==6 || month==9 || month==11 ) && day>30))
{
alert('请选择正确的出生日期！');
document.sm.ri.focus()
return false;
}
if ( hour=='')
{
alert('请选择出生时间！');
document.sm.hh.focus()
return false;
}
while(document.sm.xing.value.indexOf(" ")!=-1){
document.sm.xing.value=document.sm.xing.value.replace(" ","");
}
while(document.sm.xing.value.indexOf("	")!=-1){
document.sm.xing.value=document.sm.xing.value.replace("	","");
}
if (document.sm.xing.value=='')
{
alert('请输入您的姓氏！');
document.sm.xing.focus()
return false;
}
if (document.sm.xing.value.length < 1 || document.sm.xing.value.length>2)
{
alert("错误：姓氏应在1-2个字之间！");
document.sm.xing.focus();
return (false);
}

while(document.sm.ming.value.indexOf(" ")!=-1){
document.sm.ming.value=document.sm.ming.value.replace(" ","");
}
while(document.sm.ming.value.indexOf("	")!=-1){
document.sm.ming.value=document.sm.ming.value.replace("	","");
}
if (document.sm.ming.value=='')
{
alert('请输入您的名字！');
document.sm.ming.focus()
return false;
}
if (document.sm.ming.value.length < 1 || document.sm.ming.value.length>2)
{
alert("错误：名字应在1-2个字之间！");
document.sm.ming.focus();
return (false);
}
var b=document.sm.xingbie.value;
if (b=='')
{
alert('请选择您的性别！');
document.sm.xingbie.focus()
return false;
}
}
//-->
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="b1" style="table-layout:fixed;word-wrap:break-word;">
 <form method="post" action="sm/sm.asp?sm=1" name="sm"  onsubmit="return checkbz();">
   <tbody>
   <tr>
     <td class=ttop style="PADDING-BOTTOM: 1px" valign="top"> 输入资料立刻开始免费算命</td>
   </tr>
   <tr>
      <td class=new style="PADDING-BOTTOM: 8px" valign="top"><b><img src="images/help.gif" width="16" height="16">&nbsp;算命说明：</b>姓名必须输入中文，生日必须输入公历（公历即阳历/新历，农历即阴历/旧历）；如果不分析血型，血型可任选；如果不分析八字等，出生时分可任选；不影响其它测试结果。输入完毕后请点击下面的开始算命按钮开始！</td>
    </tr>
    <tr>
      <td class=new style="PADDING-BOTTOM: 8px" valign="top"><div align="center"><a title="如果您只知道生日的农历日期，不要紧，请点这里去查询公历日期" style="CURSOR: hand" onClick="window.open('wannianli.htm','nongli','left=0,top=0,width=780,height=540,scrollbars=no,resizable=no,status=no')" href="#wnl"><font color="red">[只知道农历请点此查公历]</font></a>&nbsp;<a title="不知道出生时间怎么办" style="CURSOR: hand" onClick="window.open('htm_nobirth.htm','nobirth','left=0,top=0,width=600,height=480,scrollbars=yes,resizable=no,status=no')" href="#nobirth"><font color="red">[不知道出生时间怎么办]</font></a>&nbsp;</div></td>
    </tr>
    <tr>
      <td align="center" vAlign=top class=new style="PADDING-BOTTOM: 8px">姓：<input type="txt" name="xing" size="4" value="" onKeypress="if ((event.keyCode != 13 && event.keyCode < 160)) event.returnValue = false;">
  	名：<input type="txt" name="ming" size="4" value="" onKeypress="if ((event.keyCode != 13 && event.keyCode < 160)) event.returnValue = false;">
  	<select name="xingbie" size="1" style="font-size: 9pt">
	<option value="" selected>性别</option>
	<option value="男">男</option>
	<option value="女">女</option>
  	</select>
  	<select name="xuexing" size="1" style="font-size: 9pt">
  	<option value="">血型</option>
  	<option value="A">A型</option>
  	<option value="B">B型</option>
  	<option value="O">O型</option>
  	<option value="AB">AB型</option>
  	</select>
  	公历生日:
       <select name="nian" size="1" style="font-size: 9pt">
	   <?php
	   date_default_timezone_set('PRC');
	   $cur_year=date("Y"); 
	   for($i=1950; $i<=$cur_year; $i++) 
	   {
		   echo '<option value='.$i; 
		   if($i==1988)
		   {echo ' selected';} 
	       echo '>'.$i.'</option>';
		} 
		?>
     </select>
     年
     <select size="1" name="yue" style="font-size: 9pt">
	  <?php
	   $cur_mon=date("m"); 
	   for($i=1; $i<=12; $i++) 
	   {
		   echo '<option value='.$i; 
		   if($i==$cur_mon)
		   {echo '&nbsp;selected';} 
	       echo '>'.$i.'</option>';
		} 
		?>
     </select>
     月
     <select size="1" name="ri" style="font-size: 9pt">
      <?php
	  $cur_day=date("d"); 
	   for($i=1; $i<=31; $i++) 
	   {
		   echo '<option value='.$i; 
		   if($i==$cur_day)
		   {echo ' selected';} 
	       echo '>'.$i.'</option>';
		} 
		?>
     </select>
     日
     <select size="1" name="hh" style="font-size: 9pt">
	   <?php
	   for($i=0; $i<=23; $i++) 
	   {
		   //echo '<option value='.DiZhi($i);
		   echo '<option value='.$i; 
	       echo '>'.$i.'</option>';
		} 
		?>
	   ?>
     </select>
     点
     <select size="1" name="mm" style="font-size: 9pt">
       <option value="0">未知</option>
		<?php
	   for($i=0; $i<=59; $i++) 
	   {
		   echo '<option value='.$i; 
	       echo '>'.$i.'</option>';
		} 
		?>
     </select>
     分 </td>
    </tr>
    <tr>
      <td align="center"  vAlign=middle class=new style="PADDING-BOTTOM: 8px">
	  &nbsp;<input type="submit" value="开始算命" style='cursor:hand;COLOR: #ff0099;' class="button">
      </td>
    </tr>
    <tr>
      <td align="center"  vAlign=middle class=new style="PADDING-BOTTOM: 8px">
	  <input type="button" value="黄道查询" onClick="(location='yuce/hdjr.asp')" style="cursor:hand;" class="button" /> 
	  <input type="button" value="观音灵签" onClick="(location='chouqian/guanyin.asp')" style="cursor:hand;COLOR: #0000ff;" class="button" />
	  <input type="button" value="诸葛神算" onClick="(location='chouqian/zgss.asp')" style="cursor:hand;" class="button" /> 
	  <input type="button" value="周公解梦" onClick="(location='chouqian/zgjm.asp')" style="cursor:hand;COLOR: #0000ff;" class="button" />	
	  <input type="button" value="号码吉凶" onClick="(location='yuce/hmjx.asp')" style="cursor:hand;" class="button" />
	  <input type="button" value="姓名配对" onClick="(location='qinglv/pd_name.asp')" style="cursor:hand;COLOR: #0000ff;" class="button" />
      </td>
    </tr>
  </tbody>
  </form>
</table>
<?php } 
// Performing SQL query
$query = 'SELECT * FROM hdrl where gn='."'2006-06-06 00:00:00'";
echo $query;
$result = pg_query($query) or die('Query failed: ' . pg_last_error());
echo "\nresult:".$result;
$arr = pg_fetch_array($result, 0, PGSQL_ASSOC);
echo $arr["nn"];
echo $arr['nn'];
?> 
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="b1" style="table-layout:fixed;word-wrap:break-word;">
  <tbody>
    <tr>
      <td class="ttop" style="PADDING-BOTTOM: 1px" valign="top">今日黄历</td>
    </tr> 
    <tr>
      <td valign="top" PADDING-BOTTOM: 8px"><font color="red"><?php echo "2006-06-06"?></font> <?php echo $arr["nn"]." ".$arr["suici"]?><font color=red><?php echo $arr["cong"]?></font></td>
    </tr>
    <tr>
      <td valign="top"PADDING-BOTTOM: 8px"><strong>宜</strong> <font color="red"> <?php echo $arr["yi"]?></font></td>
    </tr>
    <tr>
      <td valign="top"PADDING-BOTTOM: 8px"><strong>忌</strong> <font color="blue"> <?php echo $arr["ji"]?> </font></td>
    </tr>
  </tbody>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="b1" style="table-layout:fixed;word-wrap:break-word;">
  <tbody>
    <tr>
      <td class="new" style="PADDING-BOTTOM: 8px" valign="top">
        <p><span class="red">程序简介：</span><br/>本算命系统为目前最强大、最完善、测算功能最多的免费在线电脑算命系统！目前可以为您提供包括：生辰八字、八字测算、日干论命、称骨论命、姓名测试、姓命配对、上辈为人、姓氏起源；星座查询、星座运程、星座配对、星座测试、星座名人、生日密码、EQ测试、个性测试、人际关系测试、性格测试、爱情运势分析；在线排盘、四柱八字排盘、大六壬起课、六爻起卦、奇门遁甲起局、玄空飞星排盘、金口诀立课、紫微斗数排盘、真太阳时间修正、地区经度查询；抽签占卜、观音灵签、吕祖灵签、黄大仙灵签、关帝神签、天后灵签、诸葛神算、周公解梦；情侣速配、星座对对配、姓名配对关系提示、姓名五格配对、生辰八字配对、生肖血型配对、QQ号码缘分测试；三世财运、指纹预测、生男生女、QQ号码/手机号码/电话号码吉凶测算、耳鸣预测、眼跳预测、心惊预测、面热预测、择吉黄历、结婚吉日；身份证算命、婚姻指数测试等相关内容。 </p>
        <p><span class="red">免责声明：</span><br/>          1.本算命系统来源于中国民俗学的一些测算方法，并非科学研究成果，仅供休闲娱乐，请勿迷信，按此操作一切后果自负！<br>
          2.任何人均不得将本算命系统用于任何非法用途，且必须自行承担因使用本系统带来的任何后果和责任。 如果您觉得本站不错，那么希望您把本站推荐给您的好友，或者链接到您的网页和博客上，谢谢！(by Senlon)</p>
        <script type="text/javascript" src="images/urlcopy.js"></script></td>
    </tr>
  </tbody>
</table>
</div>
</div>
<?php 
/*
function newtrim($str)
{
    $j = strlen($str);
    $result="";

    for($i=0; $i<$j; $i++)
    {
	    $c = substr($str, $i, 1);
        switch($c)
        {
            case chr(8):  //退格
            case chr(9):  //tab
            case chr(10): //换行
            case chr(13): //回车
            case chr(255): //特殊空格
                break; //跳过上述字符
            default:
                $result= $result.$c;
        }
	}
    return $result;
}*/

$res = getnum('蔡');
$res=getsancai(getnum('蔡'),getnum('俊'),getnum('朝'));
echo '我的三才：'.$res;

$res=Constellation(6,22);
echo $res;

$lunar=new Lunar();
$month=$lunar->convertSolarToLunar(2018,2,4);//将阳历转换为阴历 
echo '<pre>'; 
print_r($month);
//$res=GbToBig('皑伤泄');//转繁体字
$res=nayin("甲午");
echo $res;
include "foot.php";
?>
</body>
</html>
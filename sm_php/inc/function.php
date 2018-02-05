<?php
//去除输入字符中的空格---newtrim函数
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
}

//得到一个汉字的笔画数---getnum()函数
function getnum($txt)
{
	//UTF-8 汉字
	if(preg_match("/^[\x{4e00}-\x{9fa5}]+$/u", $txt))
	{
		//echo '汉字';
	} else 
	{
		echo '非汉字';
		return 0;
	}
	
	// Performing SQL query
	$query = 'select * from bihua';
	$result = pg_query($query) or die('Query failed: ' . pg_last_error());

	while($row = pg_fetch_row($result))
	{
		if(strstr($row[1], $txt)) //['hanzi']
		{
			return $row[0]; //['num']
		}
	}
	
	echo $txt.' not found';
	return 0; //not found
}

//由天格、人格、地格数得到三才---getsancai()函数
function getsancai($tiange,$renge,$dige)
{
	$tian=($tiange % 10);
	$ren=($renge % 10);
	$di=($dige % 10);
	
	switch($tian)
	{
	case 1:
		$tiantxt="木";
		break;
	case 2:
		$tiantxt="木";
		break;
	case 3:
		$tiantxt="火";
		break;
	case 4:
		$tiantxt="火";
		break;
	case 5:
		$tiantxt="土";
		break;
	case 6:
		$tiantxt="土";
		break;
	case 7:
		$tiantxt="金";
		break;
	case 8:
		$tiantxt="金";
		break;
	case 9:
		$tiantxt="水";
		break;
	case 10:
		$tiantxt="水";
		break;
	case 0:
		$tiantxt="水";
		break;
	}
	
	switch($ren)
	{
	case 1:
		$rentxt="木";
		break;
	case 2:
		$rentxt="木";
		break;
	case 3:
		$rentxt="火";
		break;
	case 4:
		$rentxt="火";
		break;
	case 5:
		$rentxt="土";
		break;
	case 6:
		$rentxt="土";
		break;
	case 7:
		$rentxt="金";
		break;
	case 8:
		$rentxt="金";
		break;
	case 9:
		$rentxt="水";
		break;
	case 10:
		$rentxt="水";
		break;
	case 0:
		$rentxt="水";
		break;
	}
	
	switch($di)
	{
	case 1:
		$ditxt="木";
		break;
	case 2:
		$ditxt="木";
		break;
	case 3:
		$ditxt="火";
		break;
	case 4:
		$ditxt="火";
		break;
	case 5:
		$ditxt="土";
		break;
	case 6:
		$ditxt="土";
		break;
	case 7:
		$ditxt="金";
		break;
	case 8:
		$ditxt="金";
		break;
	case 9:
		$ditxt="水";
		break;
	case 10:
		$ditxt="水";
		break;
	case 0:
		$ditxt="水";
		break;
	}
	
	$total=$tiantxt.$rentxt.$ditxt;
	return $total;
}

//从日期得到星座
function Constellation($month, $day)
{
 // 检查参数有效性 
 if ($month < 1 || $month > 12 || $day < 1 || $day > 31) return false;

 // 星座名称以及开始日期
 $constellations = array(
  array( "20" => "水瓶座"),
  array( "19" => "双鱼座"),
  array( "21" => "白羊座"),
  array( "20" => "金牛座"),
  array( "21" => "双子座"),
  array( "22" => "巨蟹座"),
  array( "23" => "狮子座"),
  array( "23" => "处女座"),
  array( "23" => "天秤座"),
  array( "24" => "天蝎座"),
  array( "22" => "射手座"),
  array( "22" => "摩羯座")
 );

 list($constellation_start, $constellation_name) = each($constellations[(int)$month-1]);

 if ($day < $constellation_start) list($constellation_start, $constellation_name) = each($constellations[($month -2 < 0) ? $month = 11: $month -= 2]);

 return $constellation_name;
}


class Lunar{ 
  var $MIN_YEAR=1891; 
  var $MAX_YEAR=2100; 
  var $lunarInfo=array( 
    array(0,2,9,21936),array(6,1,30,9656),array(0,2,17,9584),array(0,2,6,21168),array(5,1,26,43344),array(0,2,13,59728), 
    array(0,2,2,27296),array(3,1,22,44368),array(0,2,10,43856),array(8,1,30,19304),array(0,2,19,19168),array(0,2,8,42352), 
    array(5,1,29,21096),array(0,2,16,53856),array(0,2,4,55632),array(4,1,25,27304),array(0,2,13,22176),array(0,2,2,39632), 
    array(2,1,22,19176),array(0,2,10,19168),array(6,1,30,42200),array(0,2,18,42192),array(0,2,6,53840),array(5,1,26,54568), 
    array(0,2,14,46400),array(0,2,3,54944),array(2,1,23,38608),array(0,2,11,38320),array(7,2,1,18872),array(0,2,20,18800), 
    array(0,2,8,42160),array(5,1,28,45656),array(0,2,16,27216),array(0,2,5,27968),array(4,1,24,44456),array(0,2,13,11104), 
    array(0,2,2,38256),array(2,1,23,18808),array(0,2,10,18800),array(6,1,30,25776),array(0,2,17,54432),array(0,2,6,59984), 
    array(5,1,26,27976),array(0,2,14,23248),array(0,2,4,11104),array(3,1,24,37744),array(0,2,11,37600),array(7,1,31,51560), 
    array(0,2,19,51536),array(0,2,8,54432),array(6,1,27,55888),array(0,2,15,46416),array(0,2,5,22176),array(4,1,25,43736), 
    array(0,2,13,9680),array(0,2,2,37584),array(2,1,22,51544),array(0,2,10,43344),array(7,1,29,46248),array(0,2,17,27808), 
    array(0,2,6,46416),array(5,1,27,21928),array(0,2,14,19872),array(0,2,3,42416),array(3,1,24,21176),array(0,2,12,21168), 
    array(8,1,31,43344),array(0,2,18,59728),array(0,2,8,27296),array(6,1,28,44368),array(0,2,15,43856),array(0,2,5,19296), 
    array(4,1,25,42352),array(0,2,13,42352),array(0,2,2,21088),array(3,1,21,59696),array(0,2,9,55632),array(7,1,30,23208), 
    array(0,2,17,22176),array(0,2,6,38608),array(5,1,27,19176),array(0,2,15,19152),array(0,2,3,42192),array(4,1,23,53864), 
    array(0,2,11,53840),array(8,1,31,54568),array(0,2,18,46400),array(0,2,7,46752),array(6,1,28,38608),array(0,2,16,38320), 
    array(0,2,5,18864),array(4,1,25,42168),array(0,2,13,42160),array(10,2,2,45656),array(0,2,20,27216),array(0,2,9,27968), 
    array(6,1,29,44448),array(0,2,17,43872),array(0,2,6,38256),array(5,1,27,18808),array(0,2,15,18800),array(0,2,4,25776), 
    array(3,1,23,27216),array(0,2,10,59984),array(8,1,31,27432),array(0,2,19,23232),array(0,2,7,43872),array(5,1,28,37736), 
    array(0,2,16,37600),array(0,2,5,51552),array(4,1,24,54440),array(0,2,12,54432),array(0,2,1,55888),array(2,1,22,23208), 
    array(0,2,9,22176),array(7,1,29,43736),array(0,2,18,9680),array(0,2,7,37584),array(5,1,26,51544),array(0,2,14,43344), 
    array(0,2,3,46240),array(4,1,23,46416),array(0,2,10,44368),array(9,1,31,21928),array(0,2,19,19360),array(0,2,8,42416), 
    array(6,1,28,21176),array(0,2,16,21168),array(0,2,5,43312),array(4,1,25,29864),array(0,2,12,27296),array(0,2,1,44368), 
    array(2,1,22,19880),array(0,2,10,19296),array(6,1,29,42352),array(0,2,17,42208),array(0,2,6,53856),array(5,1,26,59696), 
    array(0,2,13,54576),array(0,2,3,23200),array(3,1,23,27472),array(0,2,11,38608),array(11,1,31,19176),array(0,2,19,19152), 
    array(0,2,8,42192),array(6,1,28,53848),array(0,2,15,53840),array(0,2,4,54560),array(5,1,24,55968),array(0,2,12,46496), 
    array(0,2,1,22224),array(2,1,22,19160),array(0,2,10,18864),array(7,1,30,42168),array(0,2,17,42160),array(0,2,6,43600), 
    array(5,1,26,46376),array(0,2,14,27936),array(0,2,2,44448),array(3,1,23,21936),array(0,2,11,37744),array(8,2,1,18808), 
    array(0,2,19,18800),array(0,2,8,25776),array(6,1,28,27216),array(0,2,15,59984),array(0,2,4,27424),array(4,1,24,43872), 
    array(0,2,12,43744),array(0,2,2,37600),array(3,1,21,51568),array(0,2,9,51552),array(7,1,29,54440),array(0,2,17,54432), 
    array(0,2,5,55888),array(5,1,26,23208),array(0,2,14,22176),array(0,2,3,42704),array(4,1,23,21224),array(0,2,11,21200), 
    array(8,1,31,43352),array(0,2,19,43344),array(0,2,7,46240),array(6,1,27,46416),array(0,2,15,44368),array(0,2,5,21920), 
    array(4,1,24,42448),array(0,2,12,42416),array(0,2,2,21168),array(3,1,22,43320),array(0,2,9,26928),array(7,1,29,29336), 
    array(0,2,17,27296),array(0,2,6,44368),array(5,1,26,19880),array(0,2,14,19296),array(0,2,3,42352),array(4,1,24,21104), 
    array(0,2,10,53856),array(8,1,30,59696),array(0,2,18,54560),array(0,2,7,55968),array(6,1,27,27472),array(0,2,15,22224), 
    array(0,2,5,19168),array(4,1,25,42216),array(0,2,12,42192),array(0,2,1,53584),array(2,1,21,55592),array(0,2,9,54560) 
  ); 
  /** 
  * 将阳历转换为阴历 
  * @param year 公历-年 
  * @param month 公历-月 
  * @param date 公历-日 
  */ 
  function convertSolarToLunar($year,$month,$date){//debugger; 
    $yearData=$this->lunarInfo[$year-$this->MIN_YEAR]; 
    if($year==$this->MIN_YEAR&&$month<=2&&$date<=9){ 
      return array(1891,'正月','初一','辛卯',1,1,'兔'); 
    } 
    return $this->getLunarByBetween($year,$this->getDaysBetweenSolar($year,$month,$date,$yearData[1],$yearData[2])); 
  } 
  function convertSolarMonthToLunar($year,$month){ 
    $yearData=$this->lunarInfo[$year-$this->MIN_YEAR]; 
    if($year==$this->MIN_YEAR&&$month<=2&&$date<=9){ 
      return array(1891,'正月','初一','辛卯',1,1,'兔'); 
    } 
    $month_days_ary=array(31,28,31,30,31,30,31,31,30,31,30,31); 
    $dd=$month_days_ary[$month]; 
    if($this->isLeapYear($year)&& $month==2)$dd++; 
    $lunar_ary=array(); 
    for ($i=1;$i<$dd;$i++){ 
      $array=$this->getLunarByBetween($year,$this->getDaysBetweenSolar($year,$month,$i,$yearData[1],$yearData[2])); 
      $array[]=$year.'-'.$month.'-'.$i; 
      $lunar_ary[$i]=$array; 
    } 
    return $lunar_ary; 
  } 
  /** 
  * 将阴历转换为阳历 
  * @param year 阴历-年 
  * @param month 阴历-月，闰月处理：例如如果当年闰五月，那么第二个五月就传六月，相当于阴历有13个月，只是有的时候第13个月的天数为0 
  * @param date 阴历-日 
  */ 
  function convertLunarToSolar($year,$month,$date){ 
    $yearData=$this->lunarInfo[$year-$this->MIN_YEAR]; 
    $between=$this->getDaysBetweenLunar($year,$month,$date); 
    $res=mktime(0,0,0,$yearData[1],$yearData[2],$year); 
    $res=date('Y-m-d',$res+$between*24*60*60); 
    $day=explode('-',$res); 
    $year=$day[0]; 
    $month=$day[1]; 
    $day=$day[2]; 
    return array($year,$month,$day); 
  } 
  /** 
  * 判断是否是闰年 
  * @param year 
  */ 
  function isLeapYear($year){ 
    return (($year%4==0&&$year%100!=0)||($year%400==0)); 
  } 
  /** 
  * 获取干支纪年 
  * @param year 
  */ 
  function getLunarYearName($year){ 
    $sky=array('庚','辛','壬','癸','甲','乙','丙','丁','戊','己'); 
    $earth=array('申','酉','戌','亥','子','丑','寅','卯','辰','巳','午','未'); 
    $year=$year.''; 
    return $sky[$year{3}].$earth[$year%12]; 
  } 
  /** 
  * 根据阴历年获取生肖 
  * @param year 阴历年 
  */ 
  function getYearZodiac($year){ 
    $zodiac=array('猴','鸡','狗','猪','鼠','牛','虎','兔','龙','蛇','马','羊'); 
    return $zodiac[$year%12]; 
  } 
  /** 
  * 获取阳历月份的天数 
  * @param year 阳历-年 
  * @param month 阳历-月 
  */ 
  function getSolarMonthDays($year,$month){ 
    $monthHash=array('1'=>31,'2'=>$this->isLeapYear($year)?29:28,'3'=>31,'4'=>30,'5'=>31,'6'=>30,'7'=>31,'8'=>31,'9'=>30,'10'=>31,'11'=>30,'12'=>31); 
    return $monthHash["$month"]; 
  } 
  /** 
  * 获取阴历月份的天数 
  * @param year 阴历-年 
  * @param month 阴历-月，从一月开始 
  */ 
  function getLunarMonthDays($year,$month){ 
    $monthData=$this->getLunarMonths($year); 
    return $monthData[$month-1]; 
  } 
  /** 
  * 获取阴历每月的天数的数组 
  * @param year 
  */ 
  function getLunarMonths($year){ 
    $yearData=$this->lunarInfo[$year-$this->MIN_YEAR]; 
    $leapMonth=$yearData[0]; 
    $bit=decbin($yearData[3]); 
    for ($i=0;$i<strlen($bit);$i ++){ 
      $bitArray[$i]=substr($bit,$i,1); 
    } 
    for($k=0,$klen=16-count($bitArray);$k<$klen;$k++){ 
      array_unshift($bitArray,'0'); 
    } 
    $bitArray=array_slice($bitArray,0,($leapMonth==0?12:13)); 
    for($i=0;$i<count($bitArray);$i++){ 
      $bitArray[$i]=$bitArray[$i] + 29; 
    } 
    return $bitArray; 
  } 
  /** 
  * 获取农历每年的天数 
  * @param year 农历年份 
  */ 
  function getLunarYearDays($year){ 
    $yearData=$this->lunarInfo[$year-$this->MIN_YEAR]; 
    $monthArray=$this->getLunarYearMonths($year); 
    $len=count($monthArray); 
    return ($monthArray[$len-1]==0?$monthArray[$len-2]:$monthArray[$len-1]); 
  } 
  function getLunarYearMonths($year){//debugger; 
    $monthData=$this->getLunarMonths($year); 
    $res=array(); 
    $temp=0; 
    $yearData=$this->lunarInfo[$year-$this->MIN_YEAR]; 
    $len=($yearData[0]==0?12:13); 
    for($i=0;$i<$len;$i++){ 
      $temp=0; 
      for($j=0;$j<=$i;$j++){ 
        $temp+=$monthData[$j]; 
      } 
      array_push($res,$temp); 
    } 
    return $res; 
  } 
  /** 
  * 获取闰月 
  * @param year 阴历年份 
  */ 
  function getLeapMonth($year){ 
    $yearData=$this->lunarInfo[$year-$this->MIN_YEAR]; 
    return $yearData[0]; 
  } 
  /** 
  * 计算阴历日期与正月初一相隔的天数 
  * @param year 
  * @param month 
  * @param date 
  */ 
  function getDaysBetweenLunar($year,$month,$date){ 
    $yearMonth=$this->getLunarMonths($year); 
    $res=0; 
    for($i=1;$i<$month;$i++){ 
      $res+=$yearMonth[$i-1]; 
    } 
    $res+=$date-1; 
    return $res; 
  } 
  /** 
  * 计算2个阳历日期之间的天数 
  * @param year 阳历年 
  * @param cmonth 
  * @param cdate 
  * @param dmonth 阴历正月对应的阳历月份 
  * @param ddate 阴历初一对应的阳历天数 
  */ 
  function getDaysBetweenSolar($year,$cmonth,$cdate,$dmonth,$ddate){ 
    $a=mktime(0,0,0,$cmonth,$cdate,$year); 
    $b=mktime(0,0,0,$dmonth,$ddate,$year); 
    return ceil(($a-$b)/24/3600); 
  } 
  /** 
  * 根据距离正月初一的天数计算阴历日期 
  * @param year 阳历年 
  * @param between 天数 
  */ 
  function getLunarByBetween($year,$between){//debugger; 
    $lunarArray=array(); 
    $yearMonth=array(); 
    $t=0; 
    $e=0; 
    $leapMonth=0; 
    $m=''; 
    if($between==0){ 
      array_push($lunarArray,$year,'正月','初一'); 
      $t=1; 
      $e=1; 
    }else{ 
      $year=$between>0? $year : ($year-1); 
      $yearMonth=$this->getLunarYearMonths($year); 
      $leapMonth=$this->getLeapMonth($year); 
      $between=$between>0?$between : ($this->getLunarYearDays($year)+$between); 
      for($i=0;$i<13;$i++){ 
        if($between==$yearMonth[$i]){ 
          $t=$i+2; 
          $e=1; 
          break; 
        }else if($between<$yearMonth[$i]){ 
          $t=$i+1; 
          $e=$between-(empty($yearMonth[$i-1])?0:$yearMonth[$i-1])+1; 
          break; 
        } 
      } 
      $m=($leapMonth!=0&&$t==$leapMonth+1)?('闰'.$this->getCapitalNum($t- 1,true)):$this->getCapitalNum(($leapMonth!=0&&$leapMonth+1<$t?($t-1):$t),true); 
      array_push($lunarArray,$year,$m,$this->getCapitalNum($e,false)); 
    } 
    array_push($lunarArray,$this->getLunarYearName($year));// 天干地支 
    array_push($lunarArray,$t,$e); 
    array_push($lunarArray,$this->getYearZodiac($year));// 12生肖 
    array_push($lunarArray,$leapMonth);// 闰几月 
    return $lunarArray; 
  } 
  /** 
  * 获取数字的阴历叫法 
  * @param num 数字 
  * @param isMonth 是否是月份的数字 
  */ 
  function getCapitalNum($num,$isMonth){ 
    $isMonth=$isMonth||false; 
    $dateHash=array('0'=>'','1'=>'一','2'=>'二','3'=>'三','4'=>'四','5'=>'五','6'=>'六','7'=>'七','8'=>'八','9'=>'九','10'=>'十 '); 
    $monthHash=array('0'=>'','1'=>'正月','2'=>'二月','3'=>'三月','4'=>'四月','5'=>'五月','6'=>'六月','7'=>'七月','8'=>'八月','9'=>'九月','10'=>'十月','11'=>'冬月','12'=>'腊月'); 
    $res=''; 
    if($isMonth){ 
      $res=$monthHash[$num]; 
    }else{ 
      if($num<=10){ 
        $res='初'.$dateHash[$num]; 
      }else if($num>10&&$num<20){ 
        $res='十'.$dateHash[$num-10]; 
      }else if($num==20){ 
        $res="二十"; 
      }else if($num>20&&$num<30){ 
        $res="廿".$dateHash[$num-20]; 
      }else if($num==30){ 
        $res="三十"; 
      } 
    } 
    return $res; 
  } 
}

//获取繁体字
function GbToBig($content)
{
	//UTF-8 汉字
	if(preg_match("/^[\x{4e00}-\x{9fa5}]+$/u", $content))
	{
		//echo '汉字';
	} else 
	{
		echo '非汉字';
		return 0;
	}

	$s="皑,蔼,碍,爱,翱,袄,奥,坝,罢,摆,败,颁,办,绊,帮,绑,镑,谤,剥,饱,宝,报,鲍,辈,贝,钡,狈,备,惫,绷,笔,毕,毙,闭,边,编,贬,变,辩,辫,鳖,瘪,濒,滨,宾,摈,饼,拨,钵,铂,驳,卜,补,参,蚕,残,惭,惨,灿,苍,舱,仓,沧,厕,侧,册,测,层,诧,搀,掺,蝉,馋,谗,缠,铲,产,阐,颤,场,尝,长,偿,肠,厂,畅,钞,车,彻,尘,陈,衬,撑,称,惩,诚,骋,痴,迟,驰,耻,齿,炽,冲,虫,宠,畴,踌,筹,绸,丑,橱,厨,锄,雏,础,储,触,处,传,疮,闯,创,锤,纯,绰,辞,词,赐,聪,葱,囱,从,丛,凑,窜,错,达,带,贷,担,单,郸,掸,胆,惮,诞,弹,当,挡,党,荡,档,捣,岛,祷,导,盗,灯,邓,敌,涤,递,缔,点,垫,电,淀,钓,调,迭,谍,叠,钉,顶,锭,订,东,动,栋,冻,斗,犊,独,读,赌,镀,锻,断,缎,兑,队,对,吨,顿,钝,夺,鹅,额,讹,恶,饿,儿,尔,饵,贰,发,罚,阀,珐,矾,钒,烦,范,贩,饭,访,纺,飞,废,费,纷,坟,奋,愤,粪,丰,枫,锋,风,疯,冯,缝,讽,凤,肤,辐,抚,辅,赋,复,负,讣,妇,缚,该,钙,盖,干,赶,秆,赣,冈,刚,钢,纲,岗,皋,镐,搁,鸽,阁,铬,个,给,龚,宫,巩,贡,钩,沟,构,购,够,蛊,顾,剐,关,观,馆,惯,贯,广,规,硅,归,龟,闺,轨,诡,柜,贵,刽,辊,滚,锅,国,过,骇,韩,汉,阂,鹤,贺,横,轰,鸿,红,后,壶,护,沪,户,哗,华,画,划,话,怀,坏,欢,环,还,缓,换,唤,痪,焕,涣,黄,谎,挥,辉,毁,贿,秽,会,烩,汇,讳,诲,绘,荤,浑,伙,获,货,祸,击,机,积,饥,讥,鸡,绩,缉,极,辑,级,挤,几,蓟,剂,济,计,记,际,继,纪,夹,荚,颊,贾,钾,价,驾,歼,监,坚,笺,间,艰,缄,茧,检,碱,硷,拣,捡,简,俭,减,荐,槛,鉴,践,贱,见,键,舰,剑,饯,渐,溅,涧,浆,蒋,桨,奖,讲,酱,胶,浇,骄,娇,搅,铰,矫,侥,脚,饺,缴,绞,轿,较,秸,阶,节,茎,惊,经,颈,静,镜,径,痉,竞,净,纠,厩,旧,驹,举,据,锯,惧,剧,鹃,绢,杰,洁,结,诫,届,紧,锦,仅,谨,进,晋,烬,尽,劲,荆,觉,决,诀,绝,钧,军,骏,开,凯,颗,壳,课,垦,恳,抠,库,裤,夸,块,侩,宽,矿,旷,况,亏,岿,窥,馈,溃,扩,阔,蜡,腊,莱,来,赖,蓝,栏,拦,篮,阑,兰,澜,谰,揽,览,懒,缆,烂,滥,捞,劳,涝,乐,镭,垒,类,泪,篱,离,里,鲤,礼,丽,厉,励,砾,历,沥,隶,俩,联,莲,连,镰,怜,涟,帘,敛,脸,链,恋,炼,练,粮,凉,两,辆,谅,疗,辽,镣,猎,临,邻,鳞,凛,赁,龄,铃,凌,灵,岭,领,馏,刘,龙,聋,咙,笼,垄,拢,陇,楼,娄,搂,篓,芦,卢,颅,庐,炉,掳,卤,虏,鲁,赂,禄,录,陆,驴,吕,铝,侣,屡,缕,虑,滤,绿,峦,挛,孪,滦,乱,抡,轮,伦,仑,沦,纶,论,萝,罗,逻,锣,箩,骡,骆,络,妈,玛,码,蚂,马,骂,吗,买,麦,卖,迈,脉,瞒,馒,蛮,满,谩,猫,锚,铆,贸,么,霉,没,镁,门,闷,们,锰,梦,谜,弥,觅,绵,缅,庙,灭,悯,闽,鸣,铭,谬,谋,亩,钠,纳,难,挠,脑,恼,闹,馁,腻,撵,捻,酿,鸟,聂,啮,镊,镍,柠,狞,宁,拧,泞,钮,纽,脓,浓,农,疟,诺,欧,鸥,殴,呕,沤,盘,庞,国,爱,赔,喷,鹏,骗,飘,频,贫,苹,凭,评,泼,颇,扑,铺,朴,谱,脐,齐,骑,岂,启,气,弃,讫,牵,扦,钎,铅,迁,签,谦,钱,钳,潜,浅,谴,堑,枪,呛,墙,蔷,强,抢,锹,桥,乔,侨,翘,窍,窃,钦,亲,轻,氢,倾,顷,请,庆,琼,穷,趋,区,躯,驱,龋,颧,权,劝,却,鹊,让,饶,扰,绕,热,韧,认,纫,荣,绒,软,锐,闰,润,洒,萨,鳃,赛,伞,丧,骚,扫,涩,杀,纱,筛,晒,闪,陕,赡,缮,伤,赏,烧,绍,赊,摄,慑,设,绅,审,婶,肾,渗,声,绳,胜,圣,师,狮,湿,诗,尸,时,蚀,实,识,驶,势,释,饰,视,试,寿,兽,枢,输,书,赎,属,术,树,竖,数,帅,双,谁,税,顺,说,硕,烁,丝,饲,耸,怂,颂,讼,诵,擞,苏,诉,肃,虽,绥,岁,孙,损,笋,缩,琐,锁,獭,挞,抬,摊,贪,瘫,滩,坛,谭,谈,叹,汤,烫,涛,绦,腾,誊,锑,题,体,屉,条,贴,铁,厅,听,烃,铜,统,头,图,涂,团,颓,蜕,脱,鸵,驮,驼,椭,洼,袜,弯,湾,顽,万,网,韦,违,围,为,潍,维,苇,伟,伪,纬,谓,卫,温,闻,纹,稳,问,瓮,挝,蜗,涡,窝,呜,钨,乌,诬,无,芜,吴,坞,雾,务,误,锡,牺,袭,习,铣,戏,细,虾,辖,峡,侠,狭,厦,锨,鲜,纤,咸,贤,衔,闲,显,险,现,献,县,馅,羡,宪,线,厢,镶,乡,详,响,项,萧,销,晓,啸,蝎,协,挟,携,胁,谐,写,泻,谢,锌,衅,兴,汹,锈,绣,虚,嘘,须,许,绪,续,轩,悬,选,癣,绚,学,勋,询,寻,驯,训,讯,逊,压,鸦,鸭,哑,亚,讶,阉,烟,盐,严,颜,阎,艳,厌,砚,彦,谚,验,鸯,杨,扬,疡,阳,痒,养,样,瑶,摇,尧,遥,窑,谣,药,爷,页,业,叶,医,铱,颐,遗,仪,彝,蚁,艺,亿,忆,义,诣,议,谊,译,异,绎,荫,阴,银,饮,樱,婴,鹰,应,缨,莹,萤,营,荧,蝇,颖,哟,拥,佣,痈,踊,咏,涌,优,忧,邮,铀,犹,游,诱,舆,鱼,渔,娱,与,屿,语,吁,御,狱,誉,预,驭,鸳,渊,辕,园,员,圆,缘,远,愿,约,跃,钥,岳,粤,悦,阅,云,郧,匀,陨,运,蕴,酝,晕,韵,杂,灾,载,攒,暂,赞,赃,脏,凿,枣,灶,责,择,则,泽,贼,赠,扎,札,轧,铡,闸,诈,斋,债,毡,盏,斩,辗,崭,栈,战,绽,张,涨,帐,账,胀,赵,蛰,辙,锗,这,贞,针,侦,诊,镇,阵,挣,睁,狰,帧,郑,证,织,职,执,纸,挚,掷,帜,质,钟,终,种,肿,众,诌,轴,皱,昼,骤,猪,诸,诛,烛,瞩,嘱,贮,铸,筑,驻,专,砖,转,赚,桩,庄,装,妆,壮,状,锥,赘,坠,缀,谆,浊,兹,资,渍,踪,综,总,纵,邹,诅,组,钻,致,钟,么,为,只,凶,准,启,板,里,雳,余,链,泄";
	$t="皚,藹,礙,愛,翺,襖,奧,壩,罷,擺,敗,頒,辦,絆,幫,綁,鎊,謗,剝,飽,寶,報,鮑,輩,貝,鋇,狽,備,憊,繃,筆,畢,斃,閉,邊,編,貶,變,辯,辮,鼈,癟,瀕,濱,賓,擯,餅,撥,缽,鉑,駁,蔔,補,參,蠶,殘,慚,慘,燦,蒼,艙,倉,滄,廁,側,冊,測,層,詫,攙,摻,蟬,饞,讒,纏,鏟,産,闡,顫,場,嘗,長,償,腸,廠,暢,鈔,車,徹,塵,陳,襯,撐,稱,懲,誠,騁,癡,遲,馳,恥,齒,熾,沖,蟲,寵,疇,躊,籌,綢,醜,櫥,廚,鋤,雛,礎,儲,觸,處,傳,瘡,闖,創,錘,純,綽,辭,詞,賜,聰,蔥,囪,從,叢,湊,竄,錯,達,帶,貸,擔,單,鄲,撣,膽,憚,誕,彈,當,擋,黨,蕩,檔,搗,島,禱,導,盜,燈,鄧,敵,滌,遞,締,點,墊,電,澱,釣,調,叠,諜,疊,釘,頂,錠,訂,東,動,棟,凍,鬥,犢,獨,讀,賭,鍍,鍛,斷,緞,兌,隊,對,噸,頓,鈍,奪,鵝,額,訛,惡,餓,兒,爾,餌,貳,發,罰,閥,琺,礬,釩,煩,範,販,飯,訪,紡,飛,廢,費,紛,墳,奮,憤,糞,豐,楓,鋒,風,瘋,馮,縫,諷,鳳,膚,輻,撫,輔,賦,複,負,訃,婦,縛,該,鈣,蓋,幹,趕,稈,贛,岡,剛,鋼,綱,崗,臯,鎬,擱,鴿,閣,鉻,個,給,龔,宮,鞏,貢,鈎,溝,構,購,夠,蠱,顧,剮,關,觀,館,慣,貫,廣,規,矽,歸,龜,閨,軌,詭,櫃,貴,劊,輥,滾,鍋,國,過,駭,韓,漢,閡,鶴,賀,橫,轟,鴻,紅,後,壺,護,滬,戶,嘩,華,畫,劃,話,懷,壞,歡,環,還,緩,換,喚,瘓,煥,渙,黃,謊,揮,輝,毀,賄,穢,會,燴,彙,諱,誨,繪,葷,渾,夥,獲,貨,禍,擊,機,積,饑,譏,雞,績,緝,極,輯,級,擠,幾,薊,劑,濟,計,記,際,繼,紀,夾,莢,頰,賈,鉀,價,駕,殲,監,堅,箋,間,艱,緘,繭,檢,堿,鹼,揀,撿,簡,儉,減,薦,檻,鑒,踐,賤,見,鍵,艦,劍,餞,漸,濺,澗,漿,蔣,槳,獎,講,醬,膠,澆,驕,嬌,攪,鉸,矯,僥,腳,餃,繳,絞,轎,較,稭,階,節,莖,驚,經,頸,靜,鏡,徑,痙,競,淨,糾,廄,舊,駒,舉,據,鋸,懼,劇,鵑,絹,傑,潔,結,誡,屆,緊,錦,僅,謹,進,晉,燼,盡,勁,荊,覺,決,訣,絕,鈞,軍,駿,開,凱,顆,殼,課,墾,懇,摳,庫,褲,誇,塊,儈,寬,礦,曠,況,虧,巋,窺,饋,潰,擴,闊,蠟,臘,萊,來,賴,藍,欄,攔,籃,闌,蘭,瀾,讕,攬,覽,懶,纜,爛,濫,撈,勞,澇,樂,鐳,壘,類,淚,籬,離,裏,鯉,禮,麗,厲,勵,礫,曆,瀝,隸,倆,聯,蓮,連,鐮,憐,漣,簾,斂,臉,鏈,戀,煉,練,糧,涼,兩,輛,諒,療,遼,鐐,獵,臨,鄰,鱗,凜,賃,齡,鈴,淩,靈,嶺,領,餾,劉,龍,聾,嚨,籠,壟,攏,隴,樓,婁,摟,簍,蘆,盧,顱,廬,爐,擄,鹵,虜,魯,賂,祿,錄,陸,驢,呂,鋁,侶,屢,縷,慮,濾,綠,巒,攣,孿,灤,亂,掄,輪,倫,侖,淪,綸,論,蘿,羅,邏,鑼,籮,騾,駱,絡,媽,瑪,碼,螞,馬,罵,嗎,買,麥,賣,邁,脈,瞞,饅,蠻,滿,謾,貓,錨,鉚,貿,麽,黴,沒,鎂,門,悶,們,錳,夢,謎,彌,覓,綿,緬,廟,滅,憫,閩,鳴,銘,謬,謀,畝,鈉,納,難,撓,腦,惱,鬧,餒,膩,攆,撚,釀,鳥,聶,齧,鑷,鎳,檸,獰,甯,擰,濘,鈕,紐,膿,濃,農,瘧,諾,歐,鷗,毆,嘔,漚,盤,龐,國,愛,賠,噴,鵬,騙,飄,頻,貧,蘋,憑,評,潑,頗,撲,鋪,樸,譜,臍,齊,騎,豈,啓,氣,棄,訖,牽,扡,釺,鉛,遷,簽,謙,錢,鉗,潛,淺,譴,塹,槍,嗆,牆,薔,強,搶,鍬,橋,喬,僑,翹,竅,竊,欽,親,輕,氫,傾,頃,請,慶,瓊,窮,趨,區,軀,驅,齲,顴,權,勸,卻,鵲,讓,饒,擾,繞,熱,韌,認,紉,榮,絨,軟,銳,閏,潤,灑,薩,鰓,賽,傘,喪,騷,掃,澀,殺,紗,篩,曬,閃,陝,贍,繕,傷,賞,燒,紹,賒,攝,懾,設,紳,審,嬸,腎,滲,聲,繩,勝,聖,師,獅,濕,詩,屍,時,蝕,實,識,駛,勢,釋,飾,視,試,壽,獸,樞,輸,書,贖,屬,術,樹,豎,數,帥,雙,誰,稅,順,說,碩,爍,絲,飼,聳,慫,頌,訟,誦,擻,蘇,訴,肅,雖,綏,歲,孫,損,筍,縮,瑣,鎖,獺,撻,擡,攤,貪,癱,灘,壇,譚,談,歎,湯,燙,濤,縧,騰,謄,銻,題,體,屜,條,貼,鐵,廳,聽,烴,銅,統,頭,圖,塗,團,頹,蛻,脫,鴕,馱,駝,橢,窪,襪,彎,灣,頑,萬,網,韋,違,圍,爲,濰,維,葦,偉,僞,緯,謂,衛,溫,聞,紋,穩,問,甕,撾,蝸,渦,窩,嗚,鎢,烏,誣,無,蕪,吳,塢,霧,務,誤,錫,犧,襲,習,銑,戲,細,蝦,轄,峽,俠,狹,廈,鍁,鮮,纖,鹹,賢,銜,閑,顯,險,現,獻,縣,餡,羨,憲,線,廂,鑲,鄉,詳,響,項,蕭,銷,曉,嘯,蠍,協,挾,攜,脅,諧,寫,瀉,謝,鋅,釁,興,洶,鏽,繡,虛,噓,須,許,緒,續,軒,懸,選,癬,絢,學,勳,詢,尋,馴,訓,訊,遜,壓,鴉,鴨,啞,亞,訝,閹,煙,鹽,嚴,顔,閻,豔,厭,硯,彥,諺,驗,鴦,楊,揚,瘍,陽,癢,養,樣,瑤,搖,堯,遙,窯,謠,藥,爺,頁,業,葉,醫,銥,頤,遺,儀,彜,蟻,藝,億,憶,義,詣,議,誼,譯,異,繹,蔭,陰,銀,飲,櫻,嬰,鷹,應,纓,瑩,螢,營,熒,蠅,穎,喲,擁,傭,癰,踴,詠,湧,優,憂,郵,鈾,猶,遊,誘,輿,魚,漁,娛,與,嶼,語,籲,禦,獄,譽,預,馭,鴛,淵,轅,園,員,圓,緣,遠,願,約,躍,鑰,嶽,粵,悅,閱,雲,鄖,勻,隕,運,蘊,醞,暈,韻,雜,災,載,攢,暫,贊,贓,髒,鑿,棗,竈,責,擇,則,澤,賊,贈,紮,劄,軋,鍘,閘,詐,齋,債,氈,盞,斬,輾,嶄,棧,戰,綻,張,漲,帳,賬,脹,趙,蟄,轍,鍺,這,貞,針,偵,診,鎮,陣,掙,睜,猙,幀,鄭,證,織,職,執,紙,摯,擲,幟,質,鍾,終,種,腫,衆,謅,軸,皺,晝,驟,豬,諸,誅,燭,矚,囑,貯,鑄,築,駐,專,磚,轉,賺,樁,莊,裝,妝,壯,狀,錐,贅,墜,綴,諄,濁,茲,資,漬,蹤,綜,總,縱,鄒,詛,組,鑽,緻,鐘,麼,為,隻,兇,準,啟,闆,裡,靂,餘,鍊,洩";

	$c=split(",", $s);
	$d=split(",", $t);

	$bigContent=array(); 
	print $content;
	$len = mb_strlen($content,"utf-8");
			print count($d);
	for($i=0; $i<$len; $i++)
	{
		$hz=mb_substr($content,$i,1,"utf-8");

		for($j=0; $j<1275; $j++)
		{
			if(0==strcmp($hz,$c[$j]))
			{
				array_push($bigContent, $d[$j]);
				break;
			}
		}
		if($j>=1275) //not found
		{
			array_push($bigContent, $hz);
		}
	}
	return implode($bigContent);
}

//得到一个汉字字意五行
function getzywx($txt)
{
	//UTF-8 汉字
	if(preg_match("/^[\x{4e00}-\x{9fa5}]+$/u", $txt))
	{
		//echo '汉字';
	} else 
	{
		echo '非汉字';
		return 0;
	}
	
	// Performing SQL query
	$query = 'select * from hzwh';
	$result = pg_query($query) or die('Query failed: ' . pg_last_error());

	while($row = pg_fetch_row($result))
	{
		if(mb_strstr($row[1], $txt, false, "utf-8")) //['hz']
		{
			return $row[0]; //['wh']
		}
	}
	
	echo $txt.' not found';
	return 0; //not found
}

//根据笔画数得到五行（金木水火土）
function getbhwx($sc)
{
	$sc=($sc % 10);
	
	switch($sc)
	{
	case 1:
		$sctxt="木";
		break;
	case 2:
		$sctxt="木";
		break;
	case 3:
		$sctxt="火";
		break;
	case 4:
		$sctxt="火";
		break;
	case 5:
		$sctxt="土";
		break;
	case 6:
		$sctxt="土";
		break;
	case 7:
		$sctxt="金";
		break;
	case 8:
		$sctxt="金";
		break;
	case 9:
		$sctxt="水";
		break;
	case 10:
		$sctxt="水";
		break;
	case 0:
		$sctxt="水";
		break;
	}
	return $sctxt;
}

//得到一个数字(如时辰小时)的地支
function DiZhi($i)
{
	$i=($i % 24);
	switch($i)
	{
	case 0:
		$dz="子";
		break;
	case 1:
		$dz="丑";
		break;
	case 2:
		$dz="丑";
		break;
	case 3:
		$dz="寅";
		break;
	case 4:
		$dz="寅";
		break;
	case 5:
		$dz="卯";
		break;
	case 6:
		$dz="卯";
		break;
	case 7:
		$dz="辰";
		break;
	case 8:
		$dz="辰";
		break;
	case 9:
		$dz="巳";
		break;
	case 10:
		$dz="巳";
		break;
	case 11:
		$dz="午";
		break;
	case 12:
		$dz="午";
		break;
	case 13:
		$dz="未";
		break;
	case 14:
		$dz="未";
		break;
	case 15:
		$dz="申";
		break;
	case 16:
		$dz="申";
		break;
	case 17:
		$dz="酉";
		break;
	case 18:
		$dz="酉";
		break;
	case 19:
		$dz="戌";
		break;
	case 20:
		$dz="戌";
		break;
	case 21:
		$dz="亥";
		break;
	case 22:
		$dz="亥";
		break;
	case 23:
		$dz="子";
		break;
	}
	return $dz;
}

//作用暂时未知，似乎是从吉凶得到权重数
function getpf($sc)
{
	if(0==strcmp($sc, "大吉"))
	{
		$szpf=12;
	} else if (0==strcmp($sc, "吉"))
	{
		$szpf=8;
	} else if (0==strcmp($sc, "半吉"))
	{
		$szpf=5;
	} else if (0==strcmp($sc, "平"))
	{
		$szpf=4;
	} else if (0==strcmp($sc, "半凶"))
	{
		$szpf=2;
	} else if (0==strcmp($sc, "凶"))
	{
		$szpf=1;
	} else if (0==strcmp($sc, "大凶"))
	{
		$szpf=0;
	} else 
	{
		echo "unexpected word ".$sc;
		$szpf=0;
	}
	return $szpf;
}

//从甲子得到纳音，如‘乙丑’对应‘海中金’
function nayin($tgdz)
{
	// Performing SQL query
	$query = 'select * from jiazi';
	$result = pg_query($query) or die('Query failed: ' . pg_last_error());

	while($row = pg_fetch_row($result))
	{
		if(mb_strstr($row[1], $tgdz, false, "utf-8")) //['jiazi']
		{
			return $row[2]; //['layin']
		}
	}
	
	echo $tgdz.' not found';
	return 0; //not found
}

function tgdzwx($tgdz)
{
	switch($tgdz)
	{
	case "子":
		$wx="水";
		break;
	case "亥":
		$wx="水";
		break;
	case "寅":
		$wx="木";
		break;
	case "卯":
		$wx="木";
		break;
	case "巳":
		$wx="火";
		break;
	case "午":
		$wx="火";
		break;
	case "申":
		$wx="金";
		break;
	case "酉":
		$wx="金";
		break;
	case "辰":
		$wx="土";
		break;
	case "戌":
		$wx="土";
		break;
	case "丑":
		$wx="土";
		break;
	case "未":
		$wx="土";
		break;
    case "甲":
		$wx="木";
		break;
    case "乙":
		$wx="木";
		break;
    case "丙":
		$wx="火";
		break;
    case "丁":
		$wx="火";
		break;
    case "戊":
		$wx="土";
		break;
    case "己":
		$wx="土";
		break;
    case "庚":
		$wx="金";
		break;
    case "辛":
		$wx="金";
		break;
    case "壬":
		$wx="水";
		break;
    case "癸":
		$wx="水";
		break;
	default:
		echo "unexpected word: ".$tgdz;
		$wx="水";
	}
	
	return $wx;
}

//由月份得到四季
function siji($yue)
{
	switch($yue)
	{
	case 12:
	case 1:
	case 2:
		$sj="冬";
		return $sj;
	case 3:
	case 4:
	case 5:
		$sj="春";
		return $sj;
	case 6:
	case 7:
	case 8:
		$sj="夏";
		return $sj;
	case 9:
	case 10:
	case 11:
		$sj="秋";
		return $sj;
	}

	return 0;
}

?>
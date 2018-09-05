<?php
class Calendar {
	static function b2cCalendar($YYYY, $MM, $index) {
		$strCalendar = "";
		if ($MM == "")
			$MM = date ( 'm' );
		if ($YYYY == "")
			$YYYY = date ( 'Y' );
		if (checkdate ( $MM, 1, $YYYY )) {
			$stringDate = strftime ( "%d %b %Y", mktime ( 0, 0, 0, $MM, 1, $YYYY ) );
			$days = strftime ( "%d", mktime ( 0, 0, 0, $MM + 1, 0, $YYYY ) );
			$firstDay = strftime ( "%w", mktime ( 0, 0, 0, $MM, 1, $YYYY ) );
			$lastDay = strftime ( "%w", mktime ( 0, 0, 0, $MM, $days, $YYYY ) );
			$printDays = $days;
			$strCalendar .= "<table border=\"0\" cellpadding=\"0\" cellspacing=\"1\" class=\"tbldate\" id=\"tbldate$index\">";
			$strCalendar .= "<tr class=\"tit none\"><th colspan=\"7\" valign=\"top\">" . date ( "Y年m月", mktime ( 0, 0, 0, $MM, 1, $YYYY ) ) . "</th></tr>";
			$strCalendar .= "<tr class=\"none\"><th>一</th><th>二</th><th>三</th><th>四</th><th>五</th><th>六</th><th>日</th></tr>";

			$currentDays = 1;
			for($a = 0; $a < 5; $a ++) {
				$strCalendar .= "<tr class=\"none\">";
				$diffDays = $firstDay - $lastDay;
				if ($currentDays == 1 && ($firstDay > $lastDay || $firstDay == 0) && $diffDays != 1) {
					for($x = $lastDay; $x > 0; $x --) {
						$printDays = $days - $x + 1;
						$strCalendar .= self::_b2cCalendarDay ( $YYYY, $MM, $printDays );
					}
					$nblank = empty ( $firstDay ) ? 7 - $lastDay : $firstDay - $lastDay;
					for($z = 1; $z < $nblank; $z ++) {
						$strCalendar .= "<td class=\"none\">&nbsp;</td>";
					}
					$firstDay = empty ( $firstDay ) ? 7 : $firstDay;
					for($y = $firstDay; $y <= 7; $y ++) {
						$strCalendar .= self::_b2cCalendarDay ( $YYYY, $MM, $currentDays );
						$currentDays ++;
					}
				} elseif ($firstDay != 1 && $currentDays == 1) {
					for($z = 0; $z < $firstDay - 1; $z ++) {
						$strCalendar .= "<td class=\"none\">&nbsp;</td>";
					}
					for($y = $firstDay; $y <= 7; $y ++) {
						$strCalendar .= self::_b2cCalendarDay ( $YYYY, $MM, $currentDays );
						$currentDays ++;
					}
				} else {
					for($u = 1; $u <= 7; $u ++) {
						if ($currentDays <= $days) {
							$strCalendar .= self::_b2cCalendarDay ( $YYYY, $MM, $currentDays );
							$currentDays ++;
						} else {
							$strCalendar .= "<td" . ($u > 5 ? " class=\"week\"" : "") . ">&nbsp;</td>";
						}
					}
				}
				$strCalendar .= "</tr>";
			}
			$strCalendar .= "</table>";
		}
		return $strCalendar;
	}

	//
	private static function _b2cCalendarDay($year, $month, $day) {
		$newdate = $year . ($month < 10 ? '0' . $month : $month) . ($day < 10 ? '0' . $day : $day);
		$weekday = date ( 'w', strtotime ( $newdate ) );
		$css = $newdate == date ( 'Ymd' ) ? ' today' : '';
		$css .= $weekday == 6 || ! $weekday ? " weeked" : "";
		if (date ( 'Ymd' ) >= $newdate) {
			return "<td class=\"none$css\">$day</td>";
		} else {
			return "<td id=\"$newdate\" class=\"item$css\"><span>$day</span></td>";
		}
	}
	
	//
	static function b2bCalendar($YYYY, $MM, $index, $seats = 53) {
		$strCalendar = "";
		if ($MM == "")
			$MM = date ( 'm' );
		if ($YYYY == "")
			$YYYY = date ( 'Y' );
		if (checkdate ( $MM, 1, $YYYY )) {
			$stringDate = strftime ( "%d %b %Y", mktime ( 0, 0, 0, $MM, 1, $YYYY ) );  //exit($stringDate);
			$days = strftime ( "%d", mktime ( 0, 0, 0, $MM + 1, 0, $YYYY ) );  //exit($days);  //当月总天数
			
            $firstDay = strftime ( "%w", mktime ( 0, 0, 0, $MM, 1, $YYYY ) ); //exit($firstDay);  //某周的第几天（第几列 0-6）
			$lastDay = strftime ( "%w", mktime ( 0, 0, 0, $MM, $days, $YYYY ) ); //exit($MM.'|'.$lastDay);
            
            
			$printDays = $days;
			$strCalendar .= "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" monthnum=". date("n") ." class=\"tbldate\" id=\"tbldate$index\">";
			$strCalendar .= "<tbody><tr class=\"none\"><th colspan=\"7\" valign=\"top\">" . date ( "Y年m月", mktime ( 0, 0, 0, $MM, 1, $YYYY ) ) . "<em class=\"calclose calmyflag\" ></em></th></tr>";
			$strCalendar .= "<tr class=\"none\"><th width=\"100\">一</th><th width=\"100\">二</th><th width=\"100\">三</th><th width=\"100\">四</th><th width=\"100\">五</th><th width=\"100\">六</th><th width=\"100\">日</th></tr>";
            
            //a是行数变量
			$currentDays = 1;
			for($a = 0; $a < 5; $a ++) {  
				$strCalendar .= "<tr align=\"left\" valign=\"top\" class=\"none\">";
				$diffDays = $firstDay - $lastDay;
				if ($currentDays == 1 && ($firstDay > $lastDay || $firstDay == 0) && $diffDays != 1) { //30 31 号的特殊处理
					for($x = $lastDay; $x > 0; $x --) {
						$printDays = $days - $x + 1;
						$strCalendar .= self::_b2bCalendarDay ( $YYYY, $MM, $printDays, $seats );
					}
					$nblank = empty ( $firstDay ) ? 7 - $lastDay : $firstDay - $lastDay;
					for($z = 1; $z < $nblank; $z ++) {
						$strCalendar .= "<td class=\"none\">&nbsp;</td>";
					}
					$firstDay = empty ( $firstDay ) ? 7 : $firstDay;
					for($y = $firstDay; $y <= 7; $y ++) {
						$strCalendar .= self::_b2bCalendarDay ( $YYYY, $MM, $currentDays, $seats );
						$currentDays ++;
					}
                    
                    
				} elseif ($firstDay != 1 && $currentDays == 1) {  //正式从1号开始 第一行不是7天的 单独处理                
					for($z = 0; $z < $firstDay - 1; $z ++) {
						$strCalendar .= "<td class=\"none\">&nbsp;</td>";
					}
					for($y = $firstDay; $y <= 7; $y ++) {
						$strCalendar .= self::_b2bCalendarDay ( $YYYY, $MM, $currentDays, $seats );
						$currentDays ++;
					}
				} else {
                   
                   //1行 7天的处理
					for($u = 1; $u <= 7; $u ++) {
						if ($currentDays <= $days) {
							$strCalendar .= self::_b2bCalendarDay ( $YYYY, $MM, $currentDays, $seats );
							$currentDays ++;
						} else {
							$strCalendar .= "<td class=\"none\">&nbsp;</td>";
						}
					}
				}
				$strCalendar .= "</tr>";
			}
			$strCalendar .= "</tbody></table>";
		}
		return $strCalendar;
	}
    
	/**
     * 
     * @param type $YYYY
     * @param type $MM
     * @param type $index
     * @param type $seats
     * @param type $i 
     * @return string
     */
        
	static function newCalendar($YYYY, $MM, $index, $seats = 53, $i=0) {
            $strCalendar = "";
	    ! $MM && $MM = date ( 'm' );
            ! $YYYY && $YYYY = date ( 'Y' );
            if (checkdate ( $MM, 1, $YYYY )) {
                $stringDate = strftime ( "%d %b %Y", mktime ( 0, 0, 0, $MM, 1, $YYYY ) );  //exit($stringDate);
                $days = strftime ( "%d", mktime ( 0, 0, 0, $MM + 1, 0, $YYYY ) );  //exit($days);  //当月总天数

                $firstDayofW = strftime ( "%w", mktime ( 0, 0, 0, $MM, 1, $YYYY ) )+1; //exit($firstDay);  //某周的第几天（第几列 0-6周一至周日）//+1表示周日至周六
                $lastDayofW = strftime ( "%w", mktime ( 0, 0, 0, $MM, $days, $YYYY ) ); //exit($MM.'|'.$lastDay);
                $firstDayofW = $firstDayofW == 0 ? 7 : $firstDayofW;
                $lastDayofW = $lastDayofW == 0 ? 7 :$lastDayofW;            
                $style = $i==0 ? '' : 'style="display: none;"';
                $strCalendar .= "<table ".$style."  monthnum=". date("n") ." class=\"create-calendar-table calendar-table clearfix\" id=\"tbldate$index\">";
        //      $strCalendar .= "<tbody><tr class=\"none\"><th  colspan=\"7\" valign=\"top\">" . date ( "Y年m月", mktime ( 0, 0, 0, $MM, 1, $YYYY ) ) . "<em class=\"calclose calmyflag\" ></em></th></tr>";
                $strCalendar .= "<tr ><th>&nbsp;</th><th>日</th><th>一</th><th>二</th><th>三</th><th>四</th><th>五</th><th>六</th></tr>";

                if( ($firstDayofW ==6 && $days ==31 ) || ($firstDayofW ==7 && $days >=30)){
                    $rows = 6;
                }else if($firstDayofW == 1 && $days ==28){
                    $rows = 4;
                }else{
                    $rows = 5 ;
                }
            
            //a是行数变量
                $currentDays = 1;
                for($i = 1; $i <= $rows; $i++) {
                    $strCalendar .= "<tr>";
                    if($i==1){
                        $strCalendar .= "<td style=\"vertical-align: middle;\" rowspan=\"".$rows."\">".$MM."月</td>";
                    }   
                    for($k=1; $k<=7; $k++){
                        if( ($i == 1 && $k < $firstDayofW) || ($i == $rows && $currentDays > $days)){
                            $strCalendar .= "<td>&nbsp;</td>"; 
                        }else{
                            $strCalendar .= self::_b2bCalendarDay($YYYY, $MM, $currentDays, $seats);
                            $currentDays++;
                        }
                    }
                    $strCalendar .= "</tr>";
                }
                $strCalendar .= "</tbody></table>";
            }
            return $strCalendar;
	}    
    
    
	static function dyCalendar($YYYY, $MM, $index, $seats = 53) {
		$strCalendar = "";
		if ($MM == "")
			$MM = date ( 'm' );
		if ($YYYY == "")
			$YYYY = date ( 'Y' );
		if (checkdate ( $MM, 1, $YYYY )) {
			$stringDate = strftime ( "%d %b %Y", mktime ( 0, 0, 0, $MM, 1, $YYYY ) );
			$days = strftime ( "%d", mktime ( 0, 0, 0, $MM + 1, 0, $YYYY ) );
			$firstDay = strftime ( "%w", mktime ( 0, 0, 0, $MM, 1, $YYYY ) );
			$lastDay = strftime ( "%w", mktime ( 0, 0, 0, $MM, $days, $YYYY ) );
			$printDays = $days;
			$strCalendar .= "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"tbldate\" id=\"tbldate$index\">";
			$strCalendar .= "<tbody><tr class=\"none\"><th colspan=\"7\" valign=\"top\">" . date ( "Y年m月", mktime ( 0, 0, 0, $MM, 1, $YYYY ) ) . "</th></tr>";
			$strCalendar .= "<tr class=\"none\"><th width=\"100\">一</th><th width=\"100\">二</th><th width=\"100\">三</th><th width=\"100\">四</th><th width=\"100\">五</th><th width=\"100\">六</th><th width=\"100\">日</th></tr>";
            
			$currentDays = 1;
			for($a = 0; $a < 5; $a ++) {
				$strCalendar .= "<tr align=\"left\" valign=\"top\" class=\"none\">";
				$diffDays = $firstDay - $lastDay;
				if ($currentDays == 1 && ($firstDay > $lastDay || $firstDay == 0) && $diffDays != 1) {
					for($x = $lastDay; $x > 0; $x --) {
						$printDays = $days - $x + 1;
						$strCalendar .= self::_b2bCalendarDay ( $YYYY, $MM, $printDays, $seats );
					}
					$nblank = empty ( $firstDay ) ? 7 - $lastDay : $firstDay - $lastDay;
					for($z = 1; $z < $nblank; $z ++) {
						$strCalendar .= "<td class=\"none\">&nbsp;</td>";
					}
					$firstDay = empty ( $firstDay ) ? 7 : $firstDay;
					for($y = $firstDay; $y <= 7; $y ++) {
						$strCalendar .= self::_b2bCalendarDay ( $YYYY, $MM, $currentDays, $seats );
						$currentDays ++;
					}
				} elseif ($firstDay != 1 && $currentDays == 1) {
					for($z = 0; $z < $firstDay - 1; $z ++) {
						$strCalendar .= "<td class=\"none\">&nbsp;</td>";
					}
					for($y = $firstDay; $y <= 7; $y ++) {
						$strCalendar .= self::_b2bCalendarDay ( $YYYY, $MM, $currentDays, $seats );
						$currentDays ++;
					}
				} else {
					for($u = 1; $u <= 7; $u ++) {
						if ($currentDays <= $days) {
							$strCalendar .= self::_b2bCalendarDay ( $YYYY, $MM, $currentDays, $seats );
							$currentDays ++;
						} else {
							$strCalendar .= "<td class=\"none\">&nbsp;</td>";
						}
					}
				}
				$strCalendar .= "</tr>";
			}
			$strCalendar .= "</tbody></table>";
            
		}
		return $strCalendar;
	}
	
	//
	private static function _b2bCalendarDay($year, $month, $day, $seats = 53) {
            $newdate = $year . ($month < 10 ? '0' . intval($month) : $month) . ($day < 10 ? '0' . intval($day) : $day);
            $weekday = date ( 'w', strtotime ( $newdate ) );  //day of week (0-6)
            $css = $newdate == date ( 'Ymd' ) ? ' today' : ''; //当天
            $css .= $weekday == 6 || ! $weekday ? " weeked" : ""; //周末(0,6)
            if (date ( 'Ymd' ) > $newdate) {
                return "<td  data-date=\"$newdate\" class=\"$css\">$day</td>";
            }elseif($seats === false){
                return "<td data-date=\"$newdate\" class=\"allow-date$css\">$day<div class=\"item-number\">总:<input type=\"text\" value=\"0\" datatype=\"int0\" class=\"count selectday\"></div></td>";            
            } else {
                return "<td data-date=\"$newdate\" class=\"allow-date$css\">$day<div class=\"item-number\">总:<input type=\"text\" value=\"0\" datatype=\"int0\" class=\"count selectday\"></div></td>";
            }
	}
	
	//
	static function show($dates, $year, $month) {
		$strCalendar = "";
		$rili = new Rili ();
		if ($month == "")
			$month = date ( 'm' );
		if ($year == "")
			$year = date ( 'Y' );
		if (checkdate ( $month, 1, $year )) {
			$stringDate = strftime ( "%d %b %Y", mktime ( 0, 0, 0, $month, 1, $year ) );
			$days = strftime ( "%d", mktime ( 0, 0, 0, $month + 1, 0, $year ) );
			$firstDay = strftime ( "%w", mktime ( 0, 0, 0, $month, 1, $year ) );
			$lastDay = strftime ( "%w", mktime ( 0, 0, 0, $month, $days, $year ) );
			$printDays = $days;
			$strCalendar .= "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"lststartdate\">";
			$strCalendar .= "<tr class=\"none\"><th class=\"t\" colspan=\"7\">" . date ( "Y年m月", mktime ( 0, 0, 0, $month, 1, $year ) ) . "</th></tr>";
			$strCalendar .= "<tr class=\"none\"><th>一</th><th>二</th><th>三</th><th>四</th><th>五</th><th class=\"week\">六</th><th class=\"week\">日</th></tr>";
				
			$currentDays = 1;
			for($a = 0; $a < 5; $a ++) {
				$strCalendar .= "<tr class=\"none\" align=\"left\" valign=\"top\">";
				$diffDays = $firstDay - $lastDay;
	
				if ($currentDays == 1 && ($firstDay > $lastDay || $firstDay == 0) && $diffDays != 1) {
					for($x = $lastDay; $x > 0; $x --) {
						$printDays = $days - $x + 1;
						$strCalendar .= self::_showDay ( $dates, $year, $month, $printDays, $rili );
					}
					$nblank = empty ( $firstDay ) ? 7 - $lastDay : $firstDay - $lastDay;
					for($z = 1; $z < $nblank; $z ++) {
						$strCalendar .= "<td>&nbsp;</td>";
					}
					$firstDay = empty ( $firstDay ) ? 7 : $firstDay;
					for($y = $firstDay; $y <= 7; $y ++) {
						$strCalendar .= self::_showDay ( $dates, $year, $month, $currentDays, $rili );
						$currentDays ++;
					}
				} elseif ($firstDay != 1 && $currentDays == 1) {
					for($z = 0; $z < $firstDay - 1; $z ++) {
						$strCalendar .= "<td>&nbsp;</td>";
					}
					for($y = $firstDay; $y <= 7; $y ++) {
						$strCalendar .= self::_showDay ( $dates, $year, $month, $currentDays, $rili );
						$currentDays ++;
					}
				} else {
					for($u = 1; $u <= 7; $u ++) {
						if ($currentDays <= $days) {
							$strCalendar .= self::_showDay ( $dates, $year, $month, $currentDays, $rili );
							$currentDays ++;
						} else {
							$strCalendar .= "<td" . ($u > 5 ? " class=\"week\"" : "") . ">&nbsp;</td>";
						}
					}
				}
				$strCalendar .= "</tr>";
			}
			$strCalendar .= "</table>";
		}
		return $strCalendar;
	}
	
	private static function _showDay($dates, $year, $month, $day, $rili) {
		global $todaytime;
		$month = ( int ) $month;
		$newtime = strtotime ( "$year-$month-$day" );
		list ($cs, $holiday, $nongli) = self::getHoliday($year, $month, $day, $rili);
		$cs .= $newtime == $todaytime ? " startdayitemtoday" : "";
	
		$url = "";
		$body = $day;
		$css = $holiday ? $cs : "none $cs";
		$strToday = Common::formatDate ( 'Y-m-d 周w', $newtime, 1 ) . "（{$nongli}）";
		$title = $strToday;
		if ($todaytime <= $newtime) {
			for($i = 0; $i < count ( $dates ); $i ++) {
				$linetime = strtotime ( $dates [$i] ['linedate'] );
				if ($linetime == $newtime) {
					$price = $dates [$i] ['price'];
					$pricechild = $dates [$i] ['pricechild'];
					$pricemarket = $dates [$i] ['pricemarket'];
					$pricemarketchild = $dates [$i] ['pricemarketchild'];
					$orders = $dates [$i] ['plans'] - $dates [$i] ['seats'];
					$seat = $dates [$i] ['seats'] ? "<b>" . ($dates[$i]['seats'] < 10 ? $dates[$i]['seats'] : "&gt;9") . "</b>" : "满";
					
					$title = "$title<br />
同行价：成人&yen;<b>{$price}</b>、儿童&yen;<b>" . ($pricechild ? $pricechild : $price) . "</b><br />
门市价：成人&yen;<b>{$pricemarket}</b>、儿童&yen;<b>" . ($pricemarketchild ? $pricemarketchild : $pricemarket) . "</b><br />
" . ( $orders ? "已订：<b>$orders</b>、" : "" ) . "余位：<b>$seat</b>";
//计划数：<b>{$dates[$i]['plans']}</b>、已订：<b>" . ($orders ? $orders : "-") . "</b>、余位：<b>" . ($dates [$i] ['seats'] ? "<b>" . ($dates[$i]['seats'] < 10 ? $dates[$i]['seats'] : "&gt;9") . "</b>" : "满") . "</b>";
					$price = $pricemarket ? "&yen;$pricemarket" : "电议";
					if ($dates [$i] ['seats']) {
						$url = "location.href='transaction.line.buy.html?id={$dates [$i] ['id']}';";
						$css = "active $cs";
					} else {
						$css = $cs;
					}
					$body = "$day<br /><em>余$seat</em><br /><strong>$price</strong>";
				}
			}
		}
		if ($holiday) $holiday = "<b>$holiday</b>" . ($title == $strToday ? "<br />" : "");
		$title = $holiday ? "$holiday
$title" : $title;
		return "<td" . ($url ? " onclick=\"$url\"" : "") . ($title ? " title=\"$title\"" : "") . " class=\"$css\">$body</td>";;
	}

	//
	private static function getHoliday($year, $month, $day, $rili) {
		$week = date ('w', strtotime ( "$year-$month-$day" ));
		$nongli = $rili->GongToNong ( "$year-$month-$day", 3 );
		$noli = str_replace ( '-', '.', substr ( $rili->GongToNong ( "$year-$month-$day" ), 5 ));
		$yali = "$month.$day";
		$qingmin = floor ( ($year - 2000) / 2 ) % 2 ? 5 : 4;

		$nl = explode ( ',', _ETU6_NONGLI_HOLIDAY_ );
		$nls = explode ( '|', $nl [0] );
		$nlns = explode ( '|', $nl [1] );

		$rl = explode ( ',', _ETU6_YANGLI_HOLIDAY_ );
		$rls = explode ( '|', $rl [0] );
		$rlns = explode ( '|', $rl [1] );

		$css = "";
		$holiday = "";
		if (in_array ( $noli, $nls )) {
			for ($i=0; $i<count($nls); $i++) {
				if ($nls [$i] === $noli) {
					$css = "holiday";
					$holiday = $nlns [$i];
					break;
				}
			}
		} elseif (in_array ( $yali, $rls )) {
			for ($i=0; $i<count($rls); $i++) {
				if ($rls [$i] === $yali) {
					$css = "holiday";
					$holiday = $rlns [$i];
					break;
				}
			}
		} elseif ($month == 4 && $day == $qingmin) {
			$css = "holiday";
			$holiday = "清明节";
		} elseif ($week == 6 || $week == 0) {
			$css = "week";
		}
		return [$css, $holiday, $nongli];
	}
}

<?php 

 function getAvatar(){

	$avatar = __PUBLIC__ . '/Home/avatar/' . floor(rand(1, 10)) . '.gif';

	return $avatar;
}

function displayDateIfNotNull($date, $format){
    // dump($date);
    if($date == null || $date == '' || $date == 0){
        return '';
    }else{
        return date($format, $date);
    }
}

function multi_array_sort($arrays,$sort_key,$sort_order=SORT_DESC,$sort_type=SORT_NUMERIC ){   
    if(is_array($arrays)){   
        foreach ($arrays as $array){   
            if(is_array($array)){   
                $key_arrays[] = $array[$sort_key];   
            }else{   
                return false;   
            }   
        }   
    }else{   
        return false;   
    }  
    array_multisort($key_arrays,$sort_order,$sort_type,$arrays);   
    return $arrays;   
}  

function formatMoney($money){

	if(!$money)
		$money = 0;

	$return = round($money, 1) . '元';
    if(($money / 100) >= 1){
        $return = round(($money / 100), 0) . '百元';
    }
    if(($money / 1000) >= 1){
        $return = round(($money / 1000), 0) . '千元';
    }
	if(($money / 10000) >= 1){
		$return = round(($money / 10000), 0) . '万元';
	}

	return $return;
}

function getFormattedCounts($count){

    $count = round($count);
	$strlen=strlen($count);
	$newnum="";
	for ($i = 0; $i < $strlen; $i++) {
	 $newnum.="<span class='framed-text'>".substr($count,$i,1)."</span>";
	}

	// dump($count);
	// dump($newnum);

	return $newnum;
}

function returnZeroButNotNull($int){

	if(!$int)
		return 0;

	return $int;
}

function searchDict($criteria, $dict, $returnField='value'){

    $arr = C($dict);

    if($returnField == 'value'){

        return $arr[$criteria];

    }else{

         return array_search($criteria, $arr);

    }
}

function time_tran($the_time) {  
    $now_time = time();  
    $show_time = $the_time;  
    $dur = $now_time - $show_time;  
    if ($dur < 0) {  
        return $the_time;  
    } else {  
        if ($dur < 60) {  
            return $dur . '秒前';  
        } else {  
            if ($dur < 3600) {  
                return floor($dur / 60) . '分钟前';  
            } else {  
                if ($dur < 86400) {  
                    return floor($dur / 3600) . '小时前';  
                } else {  
                    if ($dur < 259200) {//3天内  
                        return floor($dur / 86400) . '天前';  
                    } else {  
                        return date('m-d H:i', $the_time); 
                    }  
                }  
            }  
        }  
    }  
}  
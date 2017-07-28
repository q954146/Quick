<?php
/**
 * Created by PhpStorm.
 * User: zimo
 * Date: 2017/7/25
 * Time: 14:11
 */

/**
 * 对数组中的两个数进行交换
 * @param $array
 * @param $a
 * @param $b
 */
function swap(&$array,$a,$b){
    $t = $array[$a];
    $array[$a] = $array[$b];
    $array[$b] = $t;
}

/**
 * 获取位置
 * @param $array
 * @param $low
 * @param $high
 * @return mixed
 */
function qSort(&$array,$low,$high){
    $pivot = $array[$low];//基准数
    while ($low < $high){
        //从右向左，若当前数字大于基准数则不作调换，否则，当前数字位置与基准数位置互换
        while ($low < $high && $array[$high] >= $pivot){
            $high--;
        }
        swap($array,$low,$high);
        //从左向右，若当前数字小于基准数则不作调换，否则，当前数字位置与基准数位置互换
        while ($low < $high && $array[$low] <= $pivot){
            $low++;
        }
        swap($array,$high,$low);
    }
    return $low;//此时high==low
}

/**
 * 快排主函数
 * @param array $array
 * @param $left
 * @param $right
 */
function quickSort(&$array,$left,$right){
    if ($left > $right) return;
    $pivot = qSort($array,$left,$right);
    quickSort($array,$left,$pivot-1);
    quickSort($array,$pivot+1,$right);
}


$array = [9,1,5,8,3,7,4,6,2];
quickSort($array,0,count($array)-1);
print_r($array);


/**
 * php的引用（&符号）
 * 在PHP中变量名和变量的内容是不一样的，因此同样的内容可以有不同的名字，在PHP中引用意味着用不同的名字访问同一变量内容
 * 例如在此次编程中，quickSort、qSort、swap函数需要访问同一变量。因此，在$array变脸前加了&符号
 */

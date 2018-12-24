<?php
/**
 * Created by PhpStorm.
 * User: wangzaron
 * Date: 2018/12/15
 * Time: 9:24 PM
 */

/**
 * c类型属性转换成驼峰规则
 * */
if(!function_exists('upperCaseSplit')){
    /**
     * c类型属性转换成驼峰规则
     * @param string $des
     * @param string $delimiter
     * @return string
     */
    function upperCaseSplit(string $des, string $delimiter = ' ')
    {
        $strArr = preg_split('/(?=[A-Z])/', $des);
        if(count($strArr) <= 1){
            return $des;
        }
        return strtolower(implode($strArr, $delimiter));
    }
}

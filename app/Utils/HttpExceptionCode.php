<?php
/**
 * 这里定义http请求接口错误逻辑编码
 * Created by PhpStorm.
 * User: wang
 * Date: 2018/11/24
 * Time: 下午1:28
 */


########################### 通用错误编码 ####################################
const HTTP_SUCCESS = 0;

// 验证过去
const HTTP_AUTH_EXPIRED = 100000;

// 未登录（无法通过验证）
const HTTP_UN_AUTH = 100001;

// 用户已经注册（用户已存在）
const HTTP_USER_REGISTERED = 100002;

// 不存在对应用户
const HTTP_USER_NOT_EXIST = 100003;

const HTTP_MOBILE_ERROR = 100004;

const HTTP_PASSWORD_ERROR = 100005;

########################### 通用错误编码 ####################################
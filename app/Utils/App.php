<?php
/**
 * Created by PhpStorm.
 * User: wang
 * Date: 2018/11/25
 * Time: 下午10:37
 */

const DISCOUNT_CARD = 'discount';

const COUPON_CARD = 'coupon';

const CASH_CARD = 'cash';

const GIFT_CARD = 'gift';

const MEMBER_CARD = 'member_card';

const CARD_TYPE_COLLECTION = [
    DISCOUNT_CARD,
    COUPON_CARD,
    CASH_CARD,
    GIFT_CARD
];

const CARD_STATUS_UN_EFFECTIVE = 'un_effective';
const CARD_STATUS_EFFECTIVE = 'effective';
const CARD_STATUS_USED = 'used';
const CARD_STATUS_OVER_DATE = 'over_date';

const CARD_STATUS_COLLECTION = [
    CARD_STATUS_UN_EFFECTIVE,
    CARD_STATUS_EFFECTIVE,
    CARD_STATUS_USED,
    CARD_STATUS_OVER_DATE
];
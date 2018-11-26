<?php

namespace App\Models;

use App\Models\Traits\QueryTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * mercurius 提供的后台管理模块，每个模块对应一类操作集合为特定类型用户不同的管理界面
 *
 * */
class Module extends Model
{
    use QueryTrait;

    // 平台管理后台
    const PLATFORM_MANAGEMENT_MODULE = 'platform.management.module';

    // 商户管理后台
    const MERCHANT_MANAGEMENT_MODULE = 'merchant.management.module';

    // 连锁店铺收银管理后台
    const SHOP_MANAGEMENT_MODULE = 'shop.management.module';
}

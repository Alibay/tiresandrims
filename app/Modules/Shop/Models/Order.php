<?php

namespace App\Modules\Shop\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'shop_orders';

    const STATUS_NEW = 'NEW';
    const STATUS_RESERVE = 'RESERVE';
    const STATUS_SHIPMENT = 'SHIPMENT';
    const STATUS_TRANSIT = 'TRANSIT';
    const STATUS_IN_STOCK = 'IN_STOCK';
    const STATUS_COMPLETED = 'COMPLETED';
    const STATUS_CANCELED = 'CANCELED';

    public static $statuses = [
        self::STATUS_NEW,
        self::STATUS_RESERVE,
        self::STATUS_SHIPMENT,
        self::STATUS_TRANSIT,
        self::STATUS_IN_STOCK,
        self::STATUS_COMPLETED,
        self::STATUS_CANCELED,
    ];
}

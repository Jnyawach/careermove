<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * Class STKPush
 * @package App
 * @property string $result_desc
 * @property string $result_code
 * @property string $merchant_request_id
 * @property string $checkout_request_id
 * @property string $amount
 * @property string $mpesa_receipt_number
 * @property string $transaction_date
 * @property string $phone_number
 * @property string $order_id
 */
class MpesaStkPush extends Model
{
    use HasFactory;
    protected $fillable = [
        'result_desc',
        'result_code',
        'merchant_request_id',
        'checkout_request_id',
        'amount',
        'mpesa_receipt_number',
        'transaction_date',
        'phone_number',
        'order_id'
    ];



}

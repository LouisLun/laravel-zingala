<?php
namespace LouisLun\LaravelZingala\Contracts;

interface TransactionState
{
    /**
     * @var string 消費者尚未在 payment_url 上進行操作
     */
    const CONSUMER_NOT_YET_ACTED_ON_PAYMENT_URL = '001';

    /**
     * @var string 此交易已轉專人審核處理中
     */
    const TRANSACTION_UNDER_MANUAL_REVIEW = '002';

    /**
     * @var string Y) 交易已核准但尚未請款
     * (如 capture 參數設定為 true，則會排程批次作業，若在零卡分期發動批次前都會停留在此狀態)
     */
    const TRANSACTION_APPROVED_NOT_CAPTURED = '003';

    /**
     * @var string Y-) 交易請款中
     */
    const TRANSACTION_CAPTURE_IN_PROGRESS = '004';

    /**
     * @var string Y+) 交易已撥款
     */
    const TRANSACTION_FUNDED = '005';

    /**
     * @var string N) 交易失敗(婉拒)
     */
    const TRANSACTION_FAILED_DECLINED = '006';

    /**
     * @var string B/C) 交易在核准後通知取消或已全額退款
     */
    const TRANSACTION_CANCELLED_OR_FULLY_REFUNDED = '007';

    /**
     * @var string O) 訂單在審核時取消或逾時取消
     */
    const ORDER_CANCELLED_DURING_REVIEW_OR_TIMED_OUT = '008';

    /**
     * @var string 部份取消資料處理中
     */
    const PARTIAL_CANCELLATION_PENDING = '009';
}

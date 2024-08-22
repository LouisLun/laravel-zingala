<?php
namespace LouisLun\LaravelZingala\Contracts;

interface ResultCode
{
    /**
     * @var string 成功
     */
    const SUCCESS = '000';

    /**
     * @var string 訂單不存在
     */
    const ORDER_NOT_FOUND = '100';

    /**
     * @var string 此訂單編號己重複
     */
    const ORDER_NUMBER_DUPLICATE = '101';

    /**
     * @var string 此訂單編號己交易
     */
    const ORDER_ALREADY_PROCESSED = '102';

    /**
     * @var string 此訂單未獲授權
     */
    const ORDER_UNAUTHORIZED = '103';

    /**
     * @var string 訂單無法部分取消
     */
    const ORDER_CANNOT_BE_PARTIALLY_CANCELLED = '104';

    /**
     * @var string 此訂單已申請過全額退款
     */
    const ORDER_ALREADY_FULLY_REFUNDED = '105';

    /**
     * @var string 退款金額高於交易金額
     */
    const REFUND_AMOUNT_EXCEEDS_TRANSACTION = '106';

    /**
     * @var string 此訂單已請款
     */
    const ORDER_ALREADY_CHARGED = '107';

    /**
     * @var string 此訂單審核為婉拒
     */
    const ORDER_REJECTED_AFTER_REVIEW = '108';

    /**
     * @var string 此訂單尚在審核程序中
     */
    const ORDER_UNDER_REVIEW = '109';

    /**
     * @var string 請款金額訂單金額不符
     */
    const CHARGE_AMOUNT_MISMATCH = '110';

    /**
     * @var string 訂單己超過可退款時間
     */
    const ORDER_REFUND_TIME_EXCEEDED = '111';

    /**
     * @var string 訂單部份取消資料處理中，請隔日或稍後再試
     */
    const ORDER_PARTIAL_CANCELLATION_PENDING = '112';

    /**
     * @var string 訂單部份取消剩餘金額低於訂單最低交易金額
     */
    const ORDER_PARTIAL_REMAINING_AMOUNT_BELOW_MINIMUM = '113';

    /**
     * @var string 此訂單已核准但尚有資料待補建檔，請隔日或稍後再試
     */
    const ORDER_APPROVED_PENDING_INFORMATION = '199';

    /**
     * @var string 參數錯誤
     */
    const PARAMETER_ERROR = '200';

    /**
     * @var string 驗證錯誤
     */
    const VALIDATION_ERROR = '201';

    /**
     * @var string 查無相關的文審要件資料
     */
    const NO_RELEVANT_DOCUMENTATION_FOUND = '202';

    /**
     * @var string 額度不足
     */
    const INSUFFICIENT_BALANCE = '300';

    /**
     * @var string 訂單已逾時且未有結果
     */
    const ORDER_TIMED_OUT_NO_RESULT = '301';

    /**
     * @var string 消費者已在 payment_url 進行操作，轉專人審核中
     */
    const ORDER_UNDER_MANUAL_REVIEW = '302';

    /**
     * @var string 申請人 ID 與商家指定訂購人 ID 不同，訂單取消
     */
    const ORDER_ID_MISMATCH_CANCELLED = '303';

    /**
     * @var string 系統發生錯誤
     */
    const SYSTEM_ERROR = '900';

    /**
     * @var string 其他
     */
    const OTHER = '999';
}

<?php
namespace LouisLun\LaravelZingala;

use GuzzleHttp\Client;
use LouisLun\LaravelZingala\Contracts\IZingala;
use LouisLun\LaravelZingala\Crypto;
use LouisLun\LaravelZingala\Exceptions\ZingalaConnectException;
use LouisLun\LaravelZingala\Response;

class Zingala
{
    /**
     * @var array config
     */
    protected array $config;

    /**
     * @var \GuzzleHttp\Client
     */
    protected Client $client;

    /**
     * @var string 0Card-Merchant-Id
     */
    protected $merchantID;

    /**
     * @var string 0Card-API-Key
     */
    protected $apiKey;

    /**
     * @var string AESKEY(HMAC-SHA256解密我方回傳notify_url時的客戶資料)
     */
    protected $aesKey;

    /**
     * @var string AESIV(HMAC-SHA256解密我方回傳notify_url時的客戶資料)
     */
    protected $aesIV;

    /**
     * @var \LouisLun\LaravelZingala\Crypto 加密器
     */
    protected Crypto $crypto;

    /**
     * constructor
     *
     * @param array $config config
     */
    public function __construct(array $config = [])
    {
        $this->config = $config;
        $this->merchantID = $config['merchantID'];
        $this->apiKey = $config['apiKey'];
        $this->aesKey = $config['aesKey'];
        $this->aesIV = $config['aesIV'];
        $isSandBox = $config['isSandbox'] ?? false;
        $debug = $config['debug'] ?? false;

        $baseUri = $isSandBox ? IZingala::SANDBOX_API_HOST : IZingala::API_HOST;
        $headers = [
            'Content-Type' => 'application/json',
            'charset' => 'utf8',
            '0Card-Merchant-Id' => $this->merchantID,
            '0Card-API-Key' => $this->apiKey,
        ];

        $this->client = new Client([
            'base_uri' => $baseUri,
            'headers' => $headers,
            'http_errors' => false,
            'debug' => $debug,
        ]);

        $this->crypto = new Crypto($this->aesKey, $this->aesIV);

        return $this;
    }

    /**
     * get http client
     * @return \GuzzleHttp\Client
     */
    public function client(): \GuzzleHttp\Client
    {
        return $this->client;
    }

    /**
     * call api handler
     *
     * @param string $method
     * @param string $uri
     * @param array $params
     * @param array $headers
     * @param array $options
     * @return \LouisLun\LaravelZingala\Response
     * @throws \LouisLun\LaravelZingala\Exceptions\ZingalaConnectException
     */
    public function requestHandler(string $method, $uri = '', array $params = [], array $headers = [], $options = [])
    {
        $stats = null;
        $options['on_stats'] = function (\GuzzleHttp\TransferStats $transferStats) use (&$stats) {
            $stats = $transferStats;
        };

        if (!empty($headers)) {
            $options['headers'] = $headers;
        }

        if ($method == 'GET') {
            $query = http_build_query($params);
            $uri = "$uri?$query";
        } else {
            $body = json_encode($params);
            $options['body'] = $body;
        }

        try {
            $response = $this->client()->request($method, $uri, $options);
        } catch (\GuzzleHttp\Exception\ConnectException $e) {
            throw new ZingalaConnectException($e->getMessage(), $e->getCode(), $e->getPrevious(), $e->getHandlerContext());
        }

        return new Response($response, $stats);
    }

    /**
     * payment(reserve_ec)
     *
     * @param array $params
     * @return \LouisLun\LaravelZingala\Response
     * @throws \LouisLun\LaravelZingala\Exceptions\ZingalaConnectException
     */
    public function payment(array $params)
    {
        return $this->requestHandler('POST', $this->parseApiUri(IZingala::REQUEST_PAYMENT), $params);
    }

    /**
     * inquiry
     *
     * @param array $params
     * @return \LouisLun\LaravelZingala\Response
     * @throws \LouisLun\LaravelZingala\Exceptions\ZingalaConnectException
     */
    public function inquiry(array $params)
    {
        return $this->requestHandler('POST', $this->parseApiUri(IZingala::REQUEST_INQUIRY), $params);
    }

    /**
     * refund
     *
     * @param array $params
     * @return \LouisLun\LaravelZingala\Response
     * @throws \LouisLun\LaravelZingala\Exceptions\ZingalaConnectException
     */
    public function refund(array $params)
    {
        return $this->requestHandler('POST', $this->parseApiUri(IZingala::REQUEST_REFUND), $params);
    }

    /**
     * @param string $key
     * @return string
     */
    public function parseApiUri($key)
    {
        return IZingala::REQUEST_API_URL_MAP[$key];
    }

    /**
     * @return \LouisLun\LaravelZingala\Crypto
     */
    public function crypto(): \LouisLun\LaravelZingala\Crypto
    {
        return $this->crypto;
    }
}

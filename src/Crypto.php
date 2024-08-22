<?php
namespace LouisLun\LaravelZingala;

class Crypto
{
    protected string $key;

    protected ?string $iv;

    public function __construct(string $key, ?string $iv = null)
    {
        $this->key = $key;
        $this->iv = $iv;
    }

    /**
     * encrypt
     *
     * @param array|string $payload
     * @return string
     */
    public function encrypt(array|string $payload)
    {
        if (is_array($payload)) {
            $payload = json_encode($payload);
        }

        $payload = $this->urlencode_dot_net($payload);
        $str = openssl_encrypt($payload, 'aes-256-cbc', $this->key, 0, $this->iv);
        return $str;
    }

    /**
     * decrypt
     *
     * @param string $payload
     * @return array|null
     */
    public function decrypt(string $payload)
    {
        $data = openssl_decrypt($payload, 'aes-256-cbc', $this->key, 0, $this->iv);
        try {
            return json_decode($data, true);
        } catch (\Exception) {
            return null;
        }
    }

    protected function urlencode_dot_net(string $data)
    {
        $data = urlencode($data);
        $data = preg_replace('/\'/', '%27', $data);
        $data = preg_replace('/\~/', '%7e', $data);
        $data = preg_replace('/\%20/', '+', $data);
        return $data;
    }

    protected function urldecode_dot_net(string $data)
    {
        return urldecode($data);
    }
}


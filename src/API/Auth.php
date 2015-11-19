<?php
namespace mikemix\Wiziq\API;

use mikemix\Wiziq\Common\Api\AuthInterface;

final class Auth implements AuthInterface
{
    /** @var string */
    private $secretAcessKey;

    /** @var string */
    private $accessKey;

    /** @var int */
    private $currentTime;

    public function __construct($secretAcessKey, $accessKey, $currentTime = null)
    {
        $this->secretAcessKey = $secretAcessKey;
        $this->accessKey      = $accessKey;
        $this->currentTime    = $currentTime ? (int)$currentTime : time();
    }

    /**
     * {@inheritdoc}
     */
    public function prepareRequest($methodName, array $data)
    {
        $requestParameters['access_key'] = $this->accessKey;
        $requestParameters['timestamp']  = $this->currentTime;
        $requestParameters['method']     = $methodName;

        $signatureBase = '';
        foreach ($requestParameters as $key => $value) {
            if ($signatureBase) {
                $signatureBase .= '&';
            }

            $signatureBase .= "$key=$value";
        }

        return array_merge(
            $requestParameters,
            ['signature' => base64_encode($this->hmacsha1($signatureBase))],
            $data
        );
    }

    /**
     * Based on code from api.wiziq.com
     *
     * @param string $data
     * @return string
     */
    private function hmacsha1($data)
    {
        $key       = urlencode($this->secretAcessKey);
        $blocksize = 64;

        if (strlen($key) > $blocksize) {
            $key = pack('H*', sha1($key));
        }

        $key  = str_pad($key,$blocksize,chr(0x00));
        $ipad = str_repeat(chr(0x36),$blocksize);
        $opad = str_repeat(chr(0x5c),$blocksize);
        $hmac = pack(
            'H*',sha1(
                ($key^$opad).pack(
                    'H*',sha1(
                        ($key^$ipad).$data
                    )
                )
            )
        );

        return $hmac;
    }
}

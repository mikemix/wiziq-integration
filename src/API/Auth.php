<?php
namespace mikemix\Wiziq\API;

class Auth
{
    /** @var string */
    protected $secretAcessKey;

    /** @var string */
    protected $accessKey;

    /** @var int */
    protected $currentTime;

    public function __construct($secretAcessKey, $accessKey, $currentTime = null)
    {
        $this->secretAcessKey = $secretAcessKey;
        $this->accessKey      = $accessKey;
        $this->currentTime    = $currentTime ? (int)$currentTime : time();
    }

    /**
     * @param string $methodName Method name
     * @param array $data        Method payload
     * @return array             Send ready request payload
     */
    public function preparePayload($methodName, array $data)
    {
        $requestParameters = [];
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
     * @param int $blocksize
     * @return string
     */
    protected function hmacsha1($data, $blocksize = 64)
    {
        $key = urlencode($this->secretAcessKey);

        if (strlen($key) > $blocksize) {
            $key = pack('H*', sha1($key));
        }

        $key  = str_pad($key, $blocksize, chr(0x00));
        $ipad = str_repeat(chr(0x36), $blocksize);
        $opad = str_repeat(chr(0x5c), $blocksize);
        return pack('H*', sha1(($key^$opad).pack('H*', sha1(($key^$ipad).$data))));
    }
}

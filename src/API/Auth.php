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

    public function __construct($secretAcessKey, $accessKey)
    {
        $this->secretAcessKey = $secretAcessKey;
        $this->accessKey      = $accessKey;
    }

    /**
     * @param string $methodName Method name
     * @param array $data        Method payload
     * @return array             Send ready request payload
     */
    public function preparePayload($methodName, array $data)
    {
        $params = [];
        $params['access_key'] = $this->accessKey;
        $params['timestamp']  = $this->getCurrentTime();
        $params['method']     = $methodName;

        $hmacsha = $this->hmacsha1(urldecode(http_build_query($params, '', '&')));

        return array_merge(
            $params,
            ['signature' => base64_encode($hmacsha)],
            $this->prepareValues($data)
        );
    }

    /**
     * @param array $data
     * @return array
     */
    protected function prepareValues(array $data)
    {
        foreach ($data as $key => $val) {
            if (is_bool($data[$key])) {
                $data[$key] = (int)$val;
            } elseif (null === $val) {
                $data[$key] = '';
            }
        }

        return $data;
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

    /**
     * @return int
     */
    protected function getCurrentTime()
    {
        if (!$this->currentTime) {
            $this->currentTime = time();
        }

        return $this->currentTime;
    }

    /**
     * @param int $time
     * @internal For tests only
     */
    public function setCurrentTime($time)
    {
        $this->currentTime = $time;
    }
}

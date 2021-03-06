<?php

namespace Imrostom\Muthofun;

use Imrostom\Muthofun\Models\Muthofun as MuthofunModel;

class Muthofun
{

    private $username;
    private $password;
    private $unicode;
    private $msg;
    private $msgLog = [];

    public function __construct()
    {
        $this->username = config('muthofun.username');
        $this->password = config('muthofun.password');
        $this->unicode  = config('muthofun.unicode');
    }

    public function messages(array $msg)
    {
        $this->msg = $msg;

        return $this;
    }

    public function send()
    {
        if (empty($this->msg)) {
            return false;
        }

        if ($this->is_multi($this->msg)) {
            if (!blank($this->msg)) {
                foreach ($this->msg as $msg) {
                    $response[] = $this->validateSendMessage($msg);
                }
            }
        } else {
            $response = $this->validateSendMessage($this->msg);
        }
        return $response;
    }

    private function validateSendMessage($msg)
    {
        $returnArray['status'] = false;
        $returnArray['msg']    = 'The message sending fail.';

        $flag = true;
        if (!isset($msg['message'])) {
            $flag = false;
        }

        if (!isset($msg['mobile'])) {
            $flag = false;
        }

        if ($flag) {
            $sendSMSResult      = $this->sendSMS($msg['mobile'], $msg['message']);
            $sendSMSResultArray = $this->xmlToArray($sendSMSResult);

            if (config('muthofun.database')) {
                $this->saveDatabase($msg);
            }

            if (!isset($sendSMSResultArray['error']) && !blank($sendSMSResultArray['error'])) {
                $returnArray['status'] = true;
                $returnArray['msg']    = 'The message sending successfully.';
            }
            $returnArray = array_merge($returnArray, $sendSMSResultArray);
        }
        $returnArray = array_merge($returnArray, $msg);
        return $returnArray;
    }

    private function saveDatabase($msg)
    {
        $muthofun                 = new MuthofunModel;
        $muthofun->phone          = $msg['mobile'];
        $muthofun->message        = $msg['message'];
        $muthofun->misc           = json_encode($msg);
        $muthofun->create_user_id = auth()->id() ?? 0;
        $muthofun->save();
    }

    public function is_multi($a)
    {
        $rv = array_filter($a, 'is_array');
        if (count($rv) > 0) {
            return true;
        }
        return false;
    }

    public function xmlToArray($xmlString)
    {
        $xml  = simplexml_load_string($xmlString, "SimpleXMLElement", LIBXML_NOCDATA);
        $json = json_encode($xml);
        return json_decode($json, true);
    }

    public function sendSMS($mobiles, $message)
    {
        // make sure passed string is url encoded
        $message = rawurlencode($message);
        $url     = "http://clients.muthofun.com:8901/esmsgw/sendsms.jsp?user=$this->username&password=$this->password&mobiles=$mobiles&sms=$message&unicode=$this->unicode";

        $c = curl_init();
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($c, CURLOPT_URL, $url);
        $response = curl_exec($c);
        return $response;
    }
}

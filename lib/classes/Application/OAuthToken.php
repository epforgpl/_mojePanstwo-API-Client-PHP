<?php
/**
 * Created by PhpStorm.
 * User: adamciezkowski
 * Date: 11/14/13
 * Time: 9:47 AM
 */

namespace MP;


class OAuthToken extends OAuth
{
    public $requests_prefix = '/oauth/access_tokens/';

    public function save($data)
    {
        return $this->request('save', $data);
    }

    public function find($type, $queryData)
    {
        $return = $this->request('find/' . $type, $queryData);
        return ($type == 'first') ? array_shift($return['access_tokens']) : $return['access_tokens'];
    }
} 
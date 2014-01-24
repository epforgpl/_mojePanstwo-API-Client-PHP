<?php
/**
 * Created by PhpStorm.
 * User: adamciezkowski
 * Date: 11/14/13
 * Time: 9:56 AM
 */

namespace MP;


class OAuthRefreshToken extends OAuth
{
    public $requests_prefix;

    public function find($type, $queryData)
    {
        $return = $this->request('find/' . $type, $queryData);
        return ($type == 'first') ? array_shift($return['refresh_tokens']) : $return['refresh_tokens'];
    }

    public function save($data)
    {
        return $this->request('save', $data);
    }
} 
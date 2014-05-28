<?php
/**
 * Created by PhpStorm.
 * User: adamciezkowski
 * Date: 11/13/13
 * Time: 4:36 PM
 */

namespace MP;


class OAuthCode extends OAuth
{
    public $requests_prefix = '/oauth/auth_codes/';

    public function save($data)
    {
        return $this->request('save', $data);
    }

    public function findByCode($code)
    {
        return $this->request('find/' . $code);
    }
} 
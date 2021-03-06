<?php
/**
 * Created by PhpStorm.
 * User: adamciezkowski
 * Date: 11/13/13
 * Time: 3:47 PM
 */

namespace MP;


class OAuthClient extends OAuth
{
    public $requests_prefix = '/oauth/clients/';

    public function getRedirectURL($client_id) {
        return $this->request($client_id);
    }
} 
<?php
/**
 * Created by PhpStorm.
 * User: adamciezkowski
 * Date: 11/12/13
 * Time: 4:21 PM
 */

namespace MP;


class OAuth extends Application
{
    protected $requests_prefix = '/oauth/';

    public function authorize($response_type, $client_id, $redirect_url)
    {
        $this->post = false;
        return $this->request('authorize', array(
                'respone_type' => $response_type,
                'client_id' => $client_id,
                'redirect_url' => $redirect_url)
        );
    }

    public function token($grant_type, $code, $client_id, $client_secret)
    {
        $this->post = false;
        return $this->request('token', array(
            'grant_type' => $grant_type,
            'code' => $code,
            'client_id' => $client_id,
            'client_secret' => $client_secret,
        ));
    }

    public function userinfo($access_token)
    {
        $this->post = false;
        return $this->request('userinfo', array(
            'access_token' => $access_token,
        ));
    }

    public function Client()
    {
        return new OAuthClient($this->user_id);
    }

    public function AuthCode()
    {
        return new OAuthCode($this->user_id);
    }

    public function AccessToken()
    {
        return new OAuthToken($this->user_id);
    }

    public function RefreshToken()
    {
        return new OAuthToken($this->user_id);
    }

} 
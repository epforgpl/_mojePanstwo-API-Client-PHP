<?php
/**
 * Created by PhpStorm.
 * User: adamciezkowski
 * Date: 11/12/13
 * Time: 12:27 PM
 */

namespace MP;
class PaszportUser extends Paszport
{
    protected $requests_prefix = '/paszport/users/';

    public function info($params = array())
    {
        return $this->request('info', $params);
    }

    public function login($params = array())
    {
        return $this->request('login', $params);
    }

    public function logout()
    {
        // @TODO : nie tu końcowo raczej nic nie bedzie, ale zostawiamy definicje na wszelki wypadek
    }

    public function setPassword($params = array())
    {
        return $this->request('setpassword', $params, 'POST');
    }

    public function add($params = array())
    {
        return $this->request('add', $params);
    }

    public function delete()
    {
        return $this->request('delete');
    }

    public function reset($data)
    {
        return $this->request('reset', $data);
    }

    public function avatar($data)
    {
        return $this->request('avatar', $data, 'POST');
    }

    public function avatarinline($id = null)
    {
        if (is_null($id)) {
            $id = $this->user_id;
        }

        return array_pop($this->request('avatarinline/' . $id));
    }

} 
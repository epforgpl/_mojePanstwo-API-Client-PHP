<?php
/**
 * Created by PhpStorm.
 * User: adamciezkowski
 * Date: 11/12/13
 * Time: 10:58 AM
 */

namespace MP;


class Geo extends Application
{
    public $requests_prefix = '/geo/';

    public function wojewodztwa()
    {
        return $this->request('wojewodztwa');
    }

    public function powiaty($id = null)
    {
        if (is_null($id)) {
            return false;
        }
        return $this->request('powiaty/index/' . $id);
    }

    public function gminy($id = null)
    {
        if (is_null($id)) {
            return false;
        }
        return $this->request('gminy/index/' . $id);
    }

    public function resolve($lat = null, $lng = null)
    {
        if (is_null($lat) || is_null($lng)) {
            return false;
        }
        return $this->request("geo/resolve/$lat/$lng");
    }
} 
<?php
/**
 * Created by PhpStorm.
 * User: adamciezkowski
 * Date: 11/25/13
 * Time: 3:28 PM
 */

namespace MP;


class Obszary extends API
{
    public $requests_prefix = '/obszary/';

    public function getGmina($queryData = array(), $type = 'first')
    {
        return $this->request('gminy/' . $type, $queryData, 'POST');
    }

    public function getPowiat($queryData = array(), $type = 'first')
    {
        return $this->request('powiaty/' . $type, $queryData, 'POST');
    }

    public function getWojewodztwo($queryData = array(), $type = 'first')
    {
        return $this->request('wojewodztwa/' . $type, $queryData, 'POST');
    }

    public function getMiejscowosc($queryData = array(), $type = 'first')
    {
        return $this->request('miejscowosci/' . $type, $queryData, 'POST');
    }
} 
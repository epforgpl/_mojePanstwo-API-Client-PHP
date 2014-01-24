<?php
/**
 * Created by PhpStorm.
 * User: adamciezkowski
 * Date: 11/15/13
 * Time: 3:14 PM
 */

namespace MP;


class KodyPocztowe extends Application
{

    protected $requests_prefix = '/kodyPocztowe/';

    public function searchCode($q)
    {

        $data = @$this->request('codes/' . $q);
        return @$data['search'];

    }

    public function searchCities($q)
    {

        $appDane = new Dane();
        return $appDane->searchDataset('miejscowosci', array(
            'conditions' => array(
                'q' => '"' . $q . '"',
            ),
            'limit' => 30,
        ));

    }

    public function searchAddresses($city_id, $street = '')
    {

        $data = @$this->request('cities/' . $city_id . '/addresses', array(
            'street' => $street
        ));
        return @$data['search'];

    }
} 
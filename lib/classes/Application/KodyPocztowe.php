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

    protected $requests_prefix = '/kody_pocztowe/';

    public function searchCode($q)
    {
        return @$this->request($q);
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
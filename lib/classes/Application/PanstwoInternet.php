<?php
/**
 * Created by PhpStorm.
 * User: adamciezkowski
 * Date: 11/15/13
 * Time: 3:14 PM
 */

namespace MP;


class PanstwoInternet extends Application
{

    protected $requests_prefix = '/PanstwoInternet/';


    public function getAnnualTwitterStats($year)
    {

        $data = @$this->request('getAnnualTwitterStats/' . $year);
        return $data;

    }

    public function getTwitterAccountsTypes()
    {

        $data = @$this->request('getTwitterAccountsTypes');
        return $data;

    }

    public function getTwitterAccountsGroupByTypes($types, $sort)
    {

        $data = @$this->request('getTwitterAccountsGroupByTypes', array(
            'types' => $types,
            'sort' => $sort,
        ));

        if (is_array($data) && !empty($data)) {
            foreach ($data as &$d) {

                if (isset($d['search'])
                    // && isset($data['search']['dataobjects'])
                    // && is_array($data['search']['dataobjects'])
                    // && !empty($data['search']['dataobjects'])
                ) {

                    $objects = array();
                    foreach ($d['search']['dataobjects'] as $dataobject)
                        $objects[] = $this->Dane()->interpretateObject($dataobject);
                    $d['objects'] = $objects;
                    unset($d['search']);

                }
            }
        }

        return $data;

    }

    public function getTwitterTweetsGroupByTypes($types, $sort)
    {

        $data = @$this->request('getTwitterTweetsGroupByTypes', array(
            'types' => $types,
            'sort' => $sort,
        ));

        if (is_array($data) && !empty($data)) {
            foreach ($data as &$d) {

                if (isset($d['search'])
                    // && isset($data['search']['dataobjects'])
                    // && is_array($data['search']['dataobjects'])
                    // && !empty($data['search']['dataobjects'])
                ) {

                    $objects = array();
                    foreach ($d['search']['dataobjects'] as $dataobject)
                        $objects[] = $this->Dane()->interpretateObject($dataobject);
                    $d['objects'] = $objects;
                    unset($d['search']);

                }
            }
        }

        return $data;

    }

} 
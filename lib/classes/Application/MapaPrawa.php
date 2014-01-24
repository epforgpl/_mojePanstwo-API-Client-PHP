<?php
/**
 * Created by PhpStorm.
 * User: adamciezkowski
 * Date: 11/15/13
 * Time: 3:14 PM
 */

namespace MP;


class MapaPrawa extends Application
{

    protected $requests_prefix = '/MapaPrawa/';

    public function loadBlockData($dataset, $object_id)
    {

        $data = @$this->request('loadBlockData', array(
            'dataset' => $dataset,
            'object_id' => $object_id,
        ));
        return $data;

    }

    public function loadItemData($dataset, $object_id, $blockId, $currentPage, $limitPerPage, $lang)
    {

        $data = @$this->request('loadItemData', array(
            'dataset' => $dataset,
            'object_id' => $object_id,
            'blockId' => $blockId,
            'currentPage' => $currentPage,
            'limitPerPage' => $limitPerPage,
            'lang' => $lang,
        ));
        return $data;

    }

} 
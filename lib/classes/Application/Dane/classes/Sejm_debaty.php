<?php
/**
 * Created by PhpStorm.
 * User: adamciezkowski
 * Date: 03/12/13
 * Time: 13:04
 */

namespace MP\Dane;


class Sejm_debaty extends DocDataObject
{

    protected $_fields = array(
        'title' => 'tytul',
        'shortTitle' => 'tytul',
    );

    public function getLabel()
    {
        return 'Debata na posiedzeniu Sejmu <strong>' . $this->getData('sejm_posiedzenia.tytul') . '</strong>';
    }

    public function getThumbnailUrl($size = false)
    {
        return $this->getData('liczba_wystapien') ? 'http://resources.sejmometr.pl/stenogramy/subpunkty/' . $this->getId() . '.jpg' : false;
    }

} 
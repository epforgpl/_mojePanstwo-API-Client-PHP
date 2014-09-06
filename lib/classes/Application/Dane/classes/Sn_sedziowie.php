<?php
/**
 * Created by PhpStorm.
 * User: adamciezkowski
 * Date: 03/12/13
 * Time: 14:52
 */

namespace MP\Dane;


class Sn_sedziowie extends DocDataObject
{
    public function getLabel()
    {
        return '<strong>Sędzia</strong> Sądu Najwyższego';
    }

    public function getTitle()
    {
        return $this->getShortTitle();
    }

    public function getShortTitle()
    {
        return $this->getData('nazwa');
    }
    
    public function hasHighlights()
    {
        return false;
    }
} 
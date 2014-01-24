<?php
/**
 * Created by PhpStorm.
 * User: adamciezkowski
 * Date: 03/12/13
 * Time: 14:04
 */

namespace MP\Dane;


class Poslowie_wspolpracownicy extends DocDataObject
{
    public function getLabel()
    {
        return '<strong>' . $this->getData('funkcja') . '</strong> posła <strong><a href="/dane/poslowie/' . $this->getData('posel_id') . '">' . $this->getData('poslowie.dopelniacz') . '</a></strong>';
    }

    public function getTitle()
    {
        return $this->getShortTitle();
    }

    public function getShortTitle()
    {
        return $this->getData('nazwa');
    }
} 
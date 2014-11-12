<?php
/**
 * Created by PhpStorm.
 * User: adamciezkowski
 * Date: 03/12/13
 * Time: 11:55
 */

namespace MP\Dane;


class Sejm_dezyderaty extends DocDataObject
{
	
	protected $tiny_label = 'Sejm';
	
    public function getTitle()
    {
        return $this->getData('tytul');
    }

    public function getShortTitle()
    {
        return $this->getData('tytul');
    }

    public function getLabel()
    {
        return '<strong>Dezyderat</strong> ' . $this->getData('sejm_komisje.dopelniacz');
    }
} 
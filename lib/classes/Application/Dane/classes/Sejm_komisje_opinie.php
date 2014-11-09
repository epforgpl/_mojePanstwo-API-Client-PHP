<?php
/**
 * Created by PhpStorm.
 * User: adamciezkowski
 * Date: 03/12/13
 * Time: 12:27
 */

namespace MP\Dane;


class Sejm_komisje_opinie extends DocDataObject
{
	
	protected $tiny_label = 'Sejm';
	
    public function getLabel()
    {
        return '<strong>Opinia</strong> ' . $this->getData('sejm_komisje.dopelniacz');
    }

    public function getShortTitle()
    {
        return $this->getData('tytul');
    }

    public function getTitle()
    {
        return $this->getShortTitle();
    }
} 
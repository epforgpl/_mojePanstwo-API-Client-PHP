<?php
/**
 * Created by PhpStorm.
 * User: adamciezkowski
 * Date: 03/12/13
 * Time: 12:05
 */

namespace MP\Dane;


class Sp_tezy extends DocDataObject
{
	
	protected $tiny_label = 'Teza sądu';
	
    public function getLabel()
    {
        return '<strong>Teza</strong> ' . $this->getData('sady_sp.dopelniacz');
    }

    public function getShortTitle()
    {

        return $this->getData('teza');

    }


}
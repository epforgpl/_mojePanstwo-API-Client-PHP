<?php
/**
 * Created by PhpStorm.
 * User: adamciezkowski
 * Date: 03/12/13
 * Time: 13:04
 */

namespace MP\Dane;


class Sejm_komisje extends DocDataObject
{
	
	protected $tiny_label = 'Komisja sejmowa';
	
    public function getLabel()
    {
        return 'Komisja sejmowa';
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
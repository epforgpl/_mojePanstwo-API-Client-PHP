<?php
/**
 * Created by PhpStorm.
 * User: adamciezkowski
 * Date: 03/12/13
 * Time: 14:40
 */

namespace MP\Dane;


class Senatorowie extends DocDataObject
{	
	
	protected $tiny_label = 'Senator';
	
    public function getLabel()
    {
        return 'Senator';
    }

    public function getTitle()
    {
        return $this->getShortTitle();
    }
    
    public function getDescription()
    {
        return false;
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
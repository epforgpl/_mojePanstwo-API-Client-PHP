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
	
	protected $tiny_label = 'Osoba';
	
	protected $schema = array(
		array('poslowie.nazwa', 'Zatrudniający', 'string', array(
			'link' => array(
				'dataset' => 'poslowie',
				'object_id' => '$poslowie.id',
			),
		)),
	);
	
	protected $hl_fields = array('poslowie.nazwa');
	
    public function getLabel()
    {
        return 'Współpracownik posła';
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
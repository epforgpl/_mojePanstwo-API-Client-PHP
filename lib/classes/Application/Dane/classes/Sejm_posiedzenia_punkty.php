<?

namespace MP\Dane;

class Sejm_posiedzenia_punkty extends DocDataObject
{
	
	protected $schema = array(
		array('sejm_posiedzenia.tytul', 'Posiedzenie'),
		array('liczba_debat', 'Liczba debat', 'integer'),
		array('liczba_wystapien', 'Liczba wystąpień', 'integer'),
		array('liczba_glosowan', 'Liczba głosowań', 'integer'),
		array('numer', 'Numer punktu'),
	);
		
    protected $routes = array(
        'title' => 'tytul',
        'shortTitle' => 'tytul',
        'date' => 'data',
    );
    
    protected $hl_fields = array(
    	'sejm_posiedzenia.tytul', 'numer', 'liczba_wystapien', 'liczba_glosowan',
    );

    public function getLabel()
    {
        return '<strong>Punkt</strong> porządku dziennego w Sejmie';
    }


}
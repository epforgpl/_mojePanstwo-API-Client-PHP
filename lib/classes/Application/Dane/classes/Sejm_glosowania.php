<?

namespace MP\Dane;

class Sejm_glosowania extends DocDataObject
{
	
	protected $schema = array(
		array('sejm_posiedzenia.tytul', 'Numer posiedzenia', 'string', array(
			'link' => array(
				'dataset' => 'sejm_posiedzenia',
				'object_id' => '$sejm_posiedzenia.id',
			),
		)),
		array('numer', 'Numer głosowania'),
		array('wynik_id', 'Wynik', 'vote'),
	);
	
    protected $routes = array(
        'title' => 'tytul',
        'shortTitle' => 'tytul',
        'date' => 'czas',
        'time' => 'czas',
    );
    
    protected $hl_fields = array(
    	'sejm_posiedzenia.tytul', 'numer', 'wynik_id'
    );
    
    public function getLabel()
    {
        return 'Głosowanie w Sejmie';
    }

}
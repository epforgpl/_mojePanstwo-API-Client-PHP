<?

namespace MP\Dane;

class Radni_dzielnic extends DataObject
{	

	protected $schema = array(
		array('dzielnice.nazwa', 'Dzielnica', 'string', array(
			'link' => array(
				'dataset' => 'dzielnice',
				'object_id' => '$dzielnice.id',
			),
		)),
		array('gminy.nazwa', 'Gmina', 'string', array(
			'link' => array(
				'dataset' => 'gminy',
				'object_id' => '$gminy.id',
			),
		)),
		array('liczba_glosow', 'Liczba głosów', 'integer'),
		array('okreg_numer', 'Okręg wyborczy', 'string'),
		array('okreg_ulice', 'Ulice w okręgu', 'string'),
		array('partia_wspierany_przez', 'Wspierany przez', 'string'),

		array('dyzur', 'Dyżur', 'string'),
		array('tel', 'Telefon', 'string'),
		array('email', 'Email', 'string'),
		array('www', 'Strona WWW', 'string'),

		array('wyksztalcenie', 'Wykształcenie', 'string'),
		array('zawod', 'Zawód', 'string'),
		array('miejsce_pracy', 'Miejsce pracy', 'string'),

		array('kadencja', 'Kadencja', 'string'),
		array('funkcja', 'Funkcja publiczne obecnie', 'string'),
		array('funkcje_publiczne_kiedys', 'Funkcje publiczne w przeszłości', 'string'),
		array('ngo', 'Działalność w NGO', 'string'),
		
		array('social', 'Aktywność społeczna', 'string'),
		array('sukcesy', 'Sukcesy', 'string'),
	);
	
		
	
    
    protected $hl_fields = array(
    	'gminy.nazwa', 'dzielnice.nazwa', 'liczba_glosow'
    );

	
	public function getTitle()
    {
        return $this->getShortTitle();
    }
    
    public function getShortTitle()
    {
        return $this->getData('nazwisko') . ' ' . $this->getData('imie');
    }
	
	public function hasHighlights()
    {
        return false;
    }
    
    public function getLabel()
    {
	    return 'Radny dzielnicy';
    }
    
    public function getUrl()
    {
	    return '/dane/gminy/' . $this->getData('gminy.id') . '/dzielnice/' . $this->getId();
    }
}
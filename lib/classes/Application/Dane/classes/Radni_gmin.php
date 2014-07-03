<?

namespace MP\Dane;

class Radni_gmin extends DataObject
{
	
	protected $schema = array(
		array('gminy.nazwa', 'Gmina', 'string', array(
			'link' => array(
				'dataset' => 'gminy',
				'object_id' => '$gminy.id',
			),
		)),
		
		array('oswiadczenie_id', 'Powiązania ze służbami PRL', 'string', array(
			'dictionary' => array(
				'1' => 'Praca',
				'2' => 'Służba',
				'3' => 'Współpraca',
				'4' => 'Brak danych',
			),
		)),

		array('rady_gmin_komitety.nazwa', 'Komitet wyborczy'),
		array('poparcie', 'Poparcie', 'string'),
		array('rady_gmin_okregi.nr_okregu', 'Numer okręgu', 'integer'),

		array('numer_listy', 'Numer listy', 'string'),
		array('pozycja', 'Pozycja na liście', 'integer'),

		array('liczba_glosow', 'Liczba głosów', 'integer'),
		array('procent_glosow_w_okregu', 'Popracie w okręgu', 'percent'),

		array('miejsce_zamieszkania', 'Miejsce zamieszkania', 'string'),
		array('obywatelstwo', 'Obywatelstwo', 'string'),
	);	
	
	
	
	
	
	
    protected $routes = array(
        'title' => 'nazwa',
        'shortTitle' => 'nazwa',
    );
    
    protected $hl_fields = array(
    	'gminy.nazwa', 'rady_gmin_komitety.nazwa', 'liczba_glosow'
    );

    public function getLabel()
    {
        $output = $this->getShortLabel();
        $output .= ' <a href="/dane/gminy/' . $this->getData('gmina_id') . '">' . $this->getData('gminy.nazwa') . '</a>';
        return $output;
    }
    
    public function getShortLabel()
    {
        $output = ($this->getData('plec') == 'K') ? 'Radna' : 'Radny';
        return $output . ' gminy';
    }
    
    public function hasHighlights()
    {
        return false;
    }
    
    public function getUrl()
    {
	    return '/dane/gminy/' . $this->getData('gmina_id') . '/radni/' . $this->getId();
    }
    
    public function getThumbnailUrl($size = '0')
    {
    	if( $this->getData('avatar')=='1' )
	        return 'http://resources.sejmometr.pl/avatars/5/' . $this->getData('avatar_id') . '.jpg';
	    elseif( $this->getData('plec')=='K' )
	        return 'http://resources.sejmometr.pl/avatars/g/w.png';
	    else 
	        return 'http://resources.sejmometr.pl/avatars/g/m.png';
    }

}
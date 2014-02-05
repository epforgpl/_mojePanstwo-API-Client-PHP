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
		array('rady_gmin_komitety.nazwa', 'Komitet wyborczy'),
		array('liczba_glosow', 'Liczba głosów', 'integer'),
		array('procent_glosow_w_okregu', 'Popracie', 'percent'),
		array('oswiadczenie_id', 'Powiązania ze służbami PRL', 'string', array(
			'dictionary' => array(
				'1' => 'Praca',
				'2' => 'Służba',
				'3' => 'Współpraca',
				'4' => 'Brak danych',
			),
		)),
	);	
	
    protected $routes = array(
        'title' => 'nazwa',
        'shortTitle' => 'nazwa',
    );
    
    protected $hl_fields = array(
    	'gminy.nazwa', 'rady_gmin_komitety.nazwa', 'liczba_glosow', 'procent_glosow_w_okregu', 'oswiadczenie_id'
    );

    public function getLabel()
    {
        $output = ($this->getData('plec') == 'K') ? 'Radna' : 'Radny';
        $output .= ' gminy <a href="/dane/gminy/' . $this->getData('gmina_id') . '">' . $this->getData('gminy.nazwa') . '</a>';
        return $output;
    }

}
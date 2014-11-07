<?

namespace MP\Dane;

class Sa_orzeczenia extends DataObject
{
	
	protected $schema = array(
		array('skarzony_organ_str', 'Skarżony organ'),
		array('wynik_str', 'Wynik'),
		array('dlugosc_rozpatrywania', 'Długość postępowania', 'integer', array(
			'dopelniacz' => array('dzień', 'dni', 'dni'),
		)),
	);
	
    protected $routes = array(
        'title' => 'sygnatura',
        'shortTitle' => 'sygnatura',
        'date' => 'data_orzeczenia',
        'label' => 'tytul_skrocony',
    );
	
	protected $hl_fields = array(
    	'skarzony_organ_str', 'wynik_str'
    );

}
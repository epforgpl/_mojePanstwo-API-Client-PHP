<?

namespace MP\Dane;

class Zamowienia_publiczne extends DocDataObject
{
	
	protected $schema = array(
		array('zamawiajacy_nazwa', 'Zamawiający'),
		array('zamawiajacy_miejscowosc', 'Miejscowość'),
		array('data_publikacji', 'Data publikacji', 'date'),
		/*
		array('status_id', 'Status', 'text', array(
			'dictionary' => array(
				'0' => 'Aktywne',
				'2' => 'Rozstrzygnięte'
			)
		)),
		array('tryb_id', 'Tryb', 'text'),
		array('rodzaj_id', 'Rodzaj', 'text'),
		*/
		
	);
	
    protected $routes = array(
        'title' => 'nazwa',
        'shortTitle' => 'nazwa',
        'date' => 'data_publikacji',
    );
	
	protected $hl_fields = array(
    	'zamawiajacy_nazwa', 'zamawiajacy_miejscowosc',
    );
	
    public function getLabel()
    {

        return 'Zamówienie publiczne nr <strong>' . $this->getData('pozycja') . '</strong>';

    }

}
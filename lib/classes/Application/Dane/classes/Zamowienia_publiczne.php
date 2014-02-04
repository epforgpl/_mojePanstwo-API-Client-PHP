<?

namespace MP\Dane;

class Zamowienia_publiczne extends DocDataObject
{
	
	protected $schema = array(
		array('zamawiajacy_nazwa', 'Zamawiający'),
		array('zamawiajacy_miejscowosc', 'Miejscowość'),
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

        return 'Zamówienie publiczne nr <strong>' . $this->getData('ogloszenie_nr') . '</strong>';

    }

}
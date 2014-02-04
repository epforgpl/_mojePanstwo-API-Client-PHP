<?

namespace MP\Dane;

class Kody_pocztowe extends DataObject
{
	
	protected $schema = array(
		array('wojewodztwo', 'Województwo'),
		array('miejscowosci_str', 'Miejscowości'),
	);
	
    protected $routes = array(
        'title' => 'kod',
        'shortTitle' => 'kod',
    );
	
	protected $hl_fields = array('wojewodztwo', 'miejscowosci_str');
	
    public function getLabel()
    {
        return 'Kod pocztowy';
    }

}
<?

namespace MP\Dane;

class Krs_podmioty extends DataObject
{
	
	protected $schema = array(
		array('id', 'ID'),
		array('krs', 'KRS'),
		array('data_rejestracji', 'Data rejestracji'),
		array('nazwa', 'Nazwa'),
		array('adres_miejscowosc', 'Miejscowość'),
		array('wartosc_kapital_zakladowy', 'Kapitał zakładowy', 'pln'),
		array('forma_prawna_str', 'Forma prawna'),
	);
	
    protected $routes = array(
        'title' => 'nazwa',
        'shortTitle' => 'nazwa_skrocona',
        'date' => false,
    );
    
    protected $hl_fields = array(
    	'krs', 'adres_miejscowosc', 'data_rejestracji', 'wartosc_kapital_zakladowy'
    );
    
    public $force_hl_fields = true;
 	
    public function getLabel()
    {
        return _ucfirst($this->getData('forma_prawna_str'));
    }

}
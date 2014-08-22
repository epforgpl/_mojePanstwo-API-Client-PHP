<?

namespace MP\Dane;

class Krs_podmioty extends DataObject
{
	
	protected $schema = array(
		array('id', 'ID'),
		array('krs', 'KRS'),
		array('nip', 'NIP'),
		array('regon', 'REGON'),
		array('data_rejestracji', 'Data rejestracji'),
		array('data_dokonania_wpisu', 'Data dokonania wpisu'),
		array('nazwa', 'Nazwa'),
		array('adres_miejscowosc', 'Miejscowość'),
		array('forma_prawna_str', 'Forma prawna'),
		array('email', 'Email'),
		array('www', 'WWW'),
		
		/*
		array('wartosc_kapital_zakladowy', 'Kapitał zakładowy', 'pln'),
		array('wartosc_czesc_kapitalu_wplaconego', 'Cześć kapitału wpłaconego', 'pln'),
		array('wartosc_kapital_docelowy', 'Kapitał docelowy', 'pln'),
		array('wartosc_nominalna_akcji', 'Wartość nominalna akcji', 'pln'),
		array('wartosc_nominalna_podwyzszenia_kapitalu', 'Wartość nominalna podwyższenia kapitału', 'pln'),
		*/
		
		array('oznaczenie_sadu', 'Sąd', 'string', array(
			'truncate' => 30,
		)),
		array('sygnatura_akt', 'Sygnatura akt'),
		array('wczesniejsza_rejestracja_str', 'Wcześniejsza rejestracja'),
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
 	
 	public function __construct($params = array())
    {

        parent::__construct($params);

        if( !empty($this->data) )
	        foreach( $this->data as $key => &$val )
		        if( !trim(str_replace('-', '', $val)) )
		        	$val = false;

    }
 	
    public function getLabel()
    {
        return _ucfirst($this->getData('forma_prawna_str'));
    }
    
    public function hasHighlights()
    {
        return false;
    }

}
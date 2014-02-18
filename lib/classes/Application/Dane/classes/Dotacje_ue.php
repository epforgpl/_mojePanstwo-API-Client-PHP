<?

namespace MP\Dane;

class Dotacje_ue extends DataObject
{
	
	protected $schema = array(
		array('symbol', 'Umowa'),
		array('beneficjent_nazwa', 'Beneficjent'),
		array('wartosc_ogolem', 'Wartość projektu', 'pln'),
		array('dofinansowanie_ue', 'Dofinansowanie UE', 'pln'),
	);
	
    protected $routes = array(
        'title' => 'tytul',
        'shortTitle' => 'tytul',
        'date' => 'data_rozpoczecia',
    );
    
    protected $hl_fields =array(
    	'symbol', 'beneficjent_nazwa', 'wartosc_ogolem', 'dofinansowanie_ue'
    );
		
    public function getLabel()
    {
        return 'Dotacja unijna';
    }
    
}
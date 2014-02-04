<?

namespace MP\Dane;

class Prawo extends DocDataObject
{
	
	protected $schema = array(
		array('id', 'ID'),
		array('sygnatura', 'Sygnatura'),
		array('data_publikacji', 'Data publikacji'),
		array('data_wejscia_w_zycie', 'Data wejścia w życie'),
	);
	
    protected $routes = array(
        'title' => 'tytul',
        'shortTitle' => 'tytul_skrocony',
        'date' => 'data_publikacji',
        'label' => 'label'
    );
    
    protected $hl_fields = array(
    	'sygnatura', 'data_publikacji', 'data_wejscia_w_zycie'
    );
    
    public $force_hl_fields = true;

}
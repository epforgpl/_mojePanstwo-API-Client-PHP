<?

namespace MP\Dane;

class Prawo extends DocDataObject
{
	
	protected $schema = array(
		array('id', 'ID'),
		array('sygnatura', 'Sygnatura'),
		array('data_wydania', 'Data wydania'),
		array('data_publikacji', 'Data publikacji'),
		array('data_wejscia_w_zycie', 'Data wejścia w życie'),
		array('isap_status_str', 'Status'),
	);
	
    protected $routes = array(
        'title' => 'tytul',
        'shortTitle' => 'tytul_skrocony',
        'date' => 'data_publikacji',
        'label' => 'label'
    );
    
    protected $hl_fields = array(
    	'isap_status_str', 'sygnatura', 'data_publikacji', 'data_wejscia_w_zycie'
    );
    
    public function getLabel() {
	    
	    // return $this->getData('status_id');
	    return $this->getData('label');
	    
    }
    
    public $force_hl_fields = true;

}
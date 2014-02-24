<?

namespace MP\Dane;

class Ustawy extends DataObject
{
	
	protected $schema = array(
		array('status_id', 'Status', 'string', array(
			'dictionary' => array(
				'1' => 'Obowiązująca',
				'2' => 'Nieobowiązująca',
			),
		)),
		array('data_wydania', 'Data wydania'),
		array('data_publikacji', 'Data publikacji'),
		array('data_wejscia_w_zycie', 'Data wejścia w życie'),
	);
	
    protected $routes = array(
        'title' => 'tytul',
        'shortTitle' => 'tytul_skrocony',
        'date' => false,
    );
    
    protected $hl_fields = array(
    	'status_id', 'data_wydania', 'data_publikacji', 'data_wejscia_w_zycie'
    );

    public function getLabel()
    {
        return 'Ustawa';
    }
    
    public function getFullLabel()
    {
        return 'Ustawa z dnia ' . dataSlownie( $this->getData('data_wydania') );
    }

}
<?

namespace MP\Dane;

class Legislacja_projekty_ustaw extends DocDataObject
{
	
	protected $schema = array(
		array('autorzy_html', 'Autor'),
		array('opis', 'Opis', 'string', array(
			'truncate' => 120,
		)),
		array('status_str', 'Status'),
		array('data', 'Data', 'date')
	);
	
    protected $routes = array(
        'title' => 'tytul',
        'shortTitle' => 'tytul_skrocony',
        'date' => 'data',
        'label' => 'label',
        'description' => 'opis',
    );
    
    protected $hl_fields = array(
    	'autorzy_html', 'status_str'
    );

    public function getLabel()
    {
        return 'Projekt ustawy';
    }
    
    public function getFullLabel()
    {
        return 'Projekt ustawy z ' . dataSlownie( $this->getDate() );
    }

}
<?

namespace MP\Dane;

class Legislacja_projekty_uchwal extends DocDataObject
{
	
	protected $schema = array(
		array('autorzy_html', 'Autor'),
		array('opis', 'Opis', 'string', array(
			'truncate' => 120,
		)),
		array('status_str', 'Status'),
	);
	
    protected $routes = array(
        'title' => 'tytul',
        'shortTitle' => 'tytul_skrocony',
        'date' => 'data',
        'label' => 'label'
    );
    
    protected $hl_fields = array(
    	'autorzy_html', 'opis', 'status_str'
    );

    public function getLabel()
    {
        return 'Projekt uchwały Sejmu';
    }

}
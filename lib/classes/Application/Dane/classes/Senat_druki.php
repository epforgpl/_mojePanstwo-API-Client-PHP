<?

namespace MP\Dane;

class Senat_druki extends DocDataObject
{
	
	protected $schema = array(
		array('numer', 'Numer'),
	);
	
    protected $routes = array(
        'title' => 'tytul',
        'shortTitle' => 'tytul',
        'date' => 'data',
    );
    
    protected $hl_fields = array(
    	'numer'
    );

    public function getLabel()
    {
        return 'Druk senacki';
    }
    
    public function getFullLabel()
    {
        return 'Druk senacki z dnia ' . dataSlownie( $this->getDate() );
    }

}
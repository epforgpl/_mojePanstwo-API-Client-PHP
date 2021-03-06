<?

namespace MP\Dane;

class Krakow_glosowania_glosy extends DocDataObject
{
	
	protected $tiny_label = 'Głos';
	
	protected $schema = array(
		array('druk_id', 'Druk', 'string', array(
			'link' => array(
				'dataset' => 'rady_druki',
				'object_id' => '$druk_id',
			),
		)),
		array('numer_punktu', 'Punkt', 'string'),
		array('opis', 'Temat')
	);
	
    protected $routes = array(
        'title' => 'krakow_posiedzenia_punkty.tytul',
        'shortTitle' => 'krakow_posiedzenia_punkty.tytul',
        'date' => 'krakow_glosowania.data_start',
    );
    
    protected $hl_fields = array();
	
	public function __construct($params = array())
    {

        parent::__construct($params);
				
		/*
        if( $this->getData('druk_id') ) {
        	$this->hl_fields[] = 'druk_id';
        }
        */

    }
	
    public function getThumbnailUrl($size = '3')
    {
		
		return false;
        $dokument_id = $this->getData('rady_druki.dokument_id');
        return $dokument_id ? 'http://docs.sejmometr.pl/thumb/' . $size . '/' . $dokument_id . '.png' : false;

    }
	
	public function getShortLabel()
    {
        return 'Punkt porządku dziennego';
    }
	
    public function getLabel()
    {
        return 'Debata na posiedzeniu <strong>' . $this->getData('gminy.rada_nazwa_dopelniacz') . '</strong>';
    }
    
	public function getUrl()
	{
		return '/dane/gminy/903/punkty/' . $this->getData('krakow_posiedzenia_punkty.id');
	}
    
    public function getPosition()
    {
	   return $this->getData('numer');
    }
    
    
    
    public function hasHighlights(){
	    return false;
    }

}
<?

namespace MP\Dane;

class Krakow_posiedzenia_punkty extends DocDataObject
{
	
	protected $tiny_label = 'Samorząd';
	
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
        'title' => 'tytul',
        'shortTitle' => 'tytul',
        'date' => 'krakow_posiedzenia.data',
        'position' => 'numer_punktu',
        'description' => 'opis',
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
    	if( $this->getData('yt_video_id') )
	        return 'http://img.youtube.com/vi/' . $this->getData('yt_video_id') . '/mqdefault.jpg';
	    else
	    	return false;
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
		return '/dane/gminy/903/punkty/' . $this->getId();
	}
    
    public function getPosition()
    {
	   return '#' . $this->getData('numer');
    }
    
    
    
    public function hasHighlights(){
	    return false;
    }

}
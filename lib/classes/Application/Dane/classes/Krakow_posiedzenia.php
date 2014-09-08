<?

namespace MP\Dane;

class Krakow_posiedzenia extends DocDataObject
{
	
	protected $schema = array(
		array('numer', 'Numer posiedzenia'),
	);
	
    protected $routes = array(
        'title' => 'fullTitle',
        'shortTitle' => 'fullTitle',
        'date' => 'data',
    );
    
    /*
    protected $hl_fields = array(
    	'gminy.rada_nazwa', 'numer', 'liczba_debat',
    );
    */
	
	public function __construct($params = array())
    {

        parent::__construct($params);

        $this->data['fullTitle'] = 'Sesja <strong>' . $this->getData('krakow_sesje.str_numer') . '</strong> <br/> Posiedzenie <strong>#' . $this->getData('numer') . '</strong>';

    }
	
    public function getLabel()
    {
        return 'Posiedzenie Rady Miasta Kraków';
    }

    public function getThumbnailUrl($size = '3')
    {
    	if( $this->getData('preview_yt_id') )
	        return 'http://img.youtube.com/vi/' . $this->getData('preview_yt_id') . '/mqdefault.jpg';
	    else
	    	return false;
    }
    
    public function getUrl()
    {
	    return '/dane/gminy/903/posiedzenia/' . $this->getId();
    }

}
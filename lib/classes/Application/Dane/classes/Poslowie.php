<?

namespace MP\Dane;

class Poslowie extends DataObject
{

    protected $schema = array(
		array('sejm_kluby.nazwa', '', 'string', array(
			'img' => 'http://resources.sejmometr.pl/s_kluby/{$klub_id}_a_t.png',
		)),
		array('zawod', 'Zawód', 'string', array(
			'normalizeText' => true,
		)),
		array('data_urodzenia', 'Wiek', 'date', array(
			'format' => 'wiek',
		)),
		array('liczba_wypowiedzi', 'Liczba wystąpień', 'integer'),
		array('liczba_przelotow', 'Liczba przelotów', 'integer'),
		array('liczba_przejazdow', 'Liczba przejazdów', 'integer'),
	);
    
    protected $routes = array(
        'title' => 'nazwa',
        'shortTitle' => 'nazwa',
    );
    
    protected $hl_fields = array(
    	'sejm_kluby.nazwa', 'zawod', 'data_urodzenia'
    );
	
	public function __construct($params = array())
    {
    	parent::__construct($params);
    	
    	if( $this->data('klub_id')=='7' )    	
	    	unset( $this->schema[0][3]['img'] );
	    	
    }
	
    public function getLabel()
    {
        return 'Poseł na Sejm RP';
    }

    public function getThumbnailUrl($size = '0')
    {
        return 'http://resources.sejmometr.pl/mowcy/a/' . $size . '/' . $this->getData('mowca_id') . '.jpg';
    }


}
<?

namespace MP\Dane;

class Poslowie extends DataObject
{

    protected $schema = array(
		array('sejm_kluby.nazwa', 'Klub parlamentarny', 'string', array(
			'img' => 'http://resources.sejmometr.pl/s_kluby/{$klub_id}_a_t.png',
		)),
		array('zawod', 'Zawód', 'string', array(
			'normalizeText' => true,
		)),
		array('data_urodzenia', 'Wiek', 'date', array(
			'format' => 'wiek',
		)),
	);
    
    protected $routes = array(
        'title' => 'nazwa',
        'shortTitle' => 'nazwa',
    );
    
    protected $hl_fields = array(
    	'sejm_kluby.nazwa', 'zawod', 'data_urodzenia'
    );
	
    public function getLabel()
    {
        return 'Poseł na Sejm RP';
    }

    public function getThumbnailUrl($size = '0')
    {
        return 'http://resources.sejmometr.pl/mowcy/a/' . $size . '/' . $this->getData('mowca_id') . '.jpg';
    }


}
<?

namespace MP\Dane;

class Sejm_interpelacje extends DocDataObject
{

    public function __construct($params = array())
    {
        parent::__construct($params);

        if ($this->data['poslowie_str'])
            $this->data['poslowie_str'] = preg_replace('/href\=\"\/(.*?)\/([0-9]+)\"/i', 'href="/dane/$1/$2"', $this->data['poslowie_str']);

    }

    protected $_fields = array(
        'title' => 'tytul',
        'shortTitle' => 'tytul_skrocony',
        'date' => 'data_wplywu',
    );

    public function getLabel()
    {
        return '<strong>Interpelacja</strong> nr ' . $this->getData('numer');
    }
    
    public function getHighlightsFields()
    {
	    
	    return array(
	    	'poslowie_str' => array(
	    		'label' => 'Od',
	    		'img' => 'http://resources.sejmometr.pl/mowcy/a/3/' . $this->getData('mowca_id') . '.jpg',
	    	),
	    	'adresaci_str' => 'Do',
	    );
	    	    
    }

}
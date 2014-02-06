<?

namespace MP;

class API
{

    protected $requests_prefix = '/';
    public $lastResponseBody = false;
    protected $user_id = null;
    protected $stream_id = 1;

    protected $strings = array(
        'miesiace' => array(
            'celownik' => array(
                1 => 'stycznia',
                2 => 'lutego',
                3 => 'marca',
                4 => 'kwietnia',
                5 => 'maja',
                6 => 'czerwca',
                7 => 'lipca',
                8 => 'sierpnia',
                9 => 'września',
                10 => 'października',
                11 => 'listopada',
                12 => 'grudnia',
            ),
        ),
    );
	
    public function __construct($options = array())
    {
        if( isset($options['user_id']) && $options['user_id'] )
            $this->user_id = $options['user_id'];
        
        if( isset($options['stream_id']) && $options['stream_id'] )
	        $this->stream_id = $options['stream_id'];
    }

    private function getRequestURL($resource)
    {

        return API_PROTOCOL . API_HOST . $this->requests_prefix . $resource . '.' . API_FORMAT;
    }

    public function request($resource, $params = array(), $method = 'GET')
    {

        if (!$resource)
            return false;

        if (!in_array($method, array('GET', 'POST')))
            $method = 'GET';


        $url = $this->getRequestURL($resource);
        $query = http_build_query($params);
        $additional_headers = array();
        if ($this->user_id) {
            array_push($additional_headers, 'Auth-User-ID: ' . $this->user_id);
        }
        if ($this->stream_id) {
            array_push($additional_headers, 'Auth-Stream-ID: ' . $this->stream_id);
        }

        if (defined('MPAPI_DEVKEY'))
            array_push($additional_headers, 'X-DEVKEY: ' . MPAPI_DEVKEY);

        $curl_options = array(
            CURLOPT_AUTOREFERER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => $additional_headers,
        );


        if ($method == 'GET') {

            $curl_options[CURLOPT_URL] = $url;
            if ($query)
                $curl_options[CURLOPT_URL] .= '?' . $query;

        } elseif ($method == 'POST') {

            $curl_options[CURLOPT_URL] = $url;
            $curl_options[CURLOPT_POST] = true;
            $curl_options[CURLOPT_POSTFIELDS] = $query;

        }


        if (defined('MPAPI_DEBUG') && (MPAPI_DEBUG == '1')) {
            debug($curl_options[CURLOPT_URL], true, false);
            if (!empty($params))
                debug($params, true, false);
        }

        $ch = curl_init();
        curl_setopt_array($ch, $curl_options);
        $res_body = curl_exec($ch);
        curl_close($ch);

        if (defined('MPAPI_DEBUG') && (MPAPI_DEBUG == '1')) {
            debug($res_body, true, false);
        }

        $this->lastResponseBody = $res_body;
        return @json_decode($res_body, 1);

    }

    public function dataSlownie($data)
    {

        $parts = explode('-', substr($data, 0, 10));
        if (count($parts) != 3) return $data;

        $rok = (int)$parts[2];
        $miesiac = (int)$parts[1];
        $dzien = (int)$parts[0];

        return '<span class="_ds" value="' . strip_tags($data) . '">' . $rok . ' ' . $this->strings['miesiace']['celownik'][$miesiac] . ' ' . $dzien . ' r.</span>';
    }
    
    public function pl_wiek( $data )
	{
		$birthDate = explode("-", substr($data, 0, 10));
	    $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[2], $birthDate[0]))) > date("md") ? ((date("Y") - $birthDate[0]) - 1) : (date("Y") - $birthDate[0]));
	    return $age;
	}
	
	function pl_dopelniacz($count = 0, $formA = '', $formB = '', $formC = '', $options = array())
	{
	    if ($count == 0)
	        return '';
	
	    elseif ($count == 1)
	        $r = $formA;
	
	    elseif ($count < 5)
	        $r = $formB;
	
	    elseif ($count < 22)
	        $r = $formC;
	
	    else {
	        $d = $count % 10;
	        if ($d < 2)
	            $r = $formC;
	
	        elseif ($d < 5)
	            $r = $formB;
	
	        else
	            $r = $formC;
	    }
	
	
	    $options['numberTag'] = isset($options['numberTag']) ? $options['numberTag'] : false;
		
		$output = '';
		
	    if( $options['numberTag'] )
	        $output .= '<' . $options['numberTag'] . '>';
	    
	    $output .= $count;
	    
	    if( $options['numberTag'] )
		    '</' . $options['numberTag'] . '>';
	
		$output .= '&nbsp;' . $r;
		
	    return $output;
	}

    final public function Dane()
    {
        return new Dane($this->user_id, $this->stream_id);
    }

    final public function Paszport()
    {
        return new Paszport($this->user_id, $this->stream_id);
    }

    final public function Powiadomienia()
    {
        return new Powiadomienia($this->user_id, $this->stream_id);
    }

    final public function Geo()
    {
        return new Geo($this->user_id, $this->stream_id);
    }

    final public function OAuth()
    {
        return new OAuth();
    }

    final public function KodyPocztowe()
    {
        return new KodyPocztowe();
    }

    final public function PanstwoInternet()
    {
        return new PanstwoInternet();
    }

    final public function MapaPrawa()
    {
        return new MapaPrawa();
    }

    final public function ZamowieniaPubliczne()
    {
        return new ZamowieniaPubliczne();
    }
    
    final public function BDL()
    {
        return new BDL();
    }

    final public function document($id)
    {
        return new Document($id);
    }

}
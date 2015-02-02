<?

namespace MP;

require_once('exceptions.php');

class API
{

    protected $requests_prefix = '/';
    public $lastResponseBody = false;
    protected $user_id = null;
    protected $timer = array();
    protected $urlMode = '';
    protected $passExceptions = array();

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
    	$this->setOptions( $options );
    }

	public function setUrlMode( $mode )
	{
		return ( $this->urlMode = $mode );
	}
	
    private function getRequestURL($resource)
    {

        return API_PROTOCOL . API_HOST . $this->requests_prefix . $resource . '.' . API_FORMAT;
    }

    public function request($resource, $params = array(), $method = 'GET')
    {
    	 	    	
        if (!$resource)
            throw new ApiBadInvocation('Resource has to be specified');
				
        if (!in_array($method, array('GET', 'POST', 'DELETE', 'PUT')))
            throw new RequestMethodNotSupported('GET');
		
		if( $params===null )
			$params = array();
		
		$timer = array(
			'resource' => $resource,
			'params' => $params,
			'start' => $this->getmicrotime(),
			'phases' => array(
				array(
					'id' => 'init',
					'tic' => $this->getmicrotime(),
				),
			),
		);
			
        $url = $this->getRequestURL($resource);
        $query = http_build_query($params);
        $additional_headers = array();
                
        if ($this->user_id)
            array_push($additional_headers, 'X-USER-ID: ' . $this->user_id);

        if (defined('MPAPI_DEVKEY'))
            array_push($additional_headers, 'X-DEVKEY: ' . MPAPI_DEVKEY);

        $curl_options = array(
            CURLOPT_AUTOREFERER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FAILONERROR => false, // doesn't fail on http errors
            CURLOPT_HTTPHEADER => $additional_headers,
        );
        

        if ($method == 'POST') {
            $curl_options[CURLOPT_POST] = true;
            $curl_options[CURLOPT_POSTFIELDS] = $query;         
		
		} elseif($method == 'DELETE') {
			$curl_options[CURLOPT_CUSTOMREQUEST] = 'DELETE';
			
        } elseif($method == 'PUT') {
	        $curl_options[CURLOPT_PUT] = true;
			$curl_options[CURLOPT_CUSTOMREQUEST] = 'PUT';
			$curl_options[CURLOPT_POSTFIELDS] = $query;
			
        }
		
        $curl_options[CURLOPT_URL] = $url;
        if( $query && ($method != 'POST') )
            $curl_options[CURLOPT_URL] .= '?' . $query;

        if (defined('MPAPI_DEBUG') && (MPAPI_DEBUG == '1')) {
            debug('[' . $method . '] ' . $curl_options[CURLOPT_URL], true, false);
            if (!empty($params))
                debug($params, true, false);
            if (!empty($additional_headers))
                debug($additional_headers, true, false);
        }

        $ch = curl_init();
        curl_setopt_array($ch, $curl_options);
        
        $timer['phases'][] = array(
        	'id' => 'query',
        	'tic' => $this->getmicrotime(),
        );
        
        $res_body = curl_exec($ch);
		
		$timer['phases'][] = array(
        	'id' => 'postprocessing',
        	'tic' => $this->getmicrotime(),
        );
		
        // check error status
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curl_errno = curl_errno($ch);
        $curl_error = curl_error($ch);

        curl_close($ch);

        if ($curl_errno) {
            throw new ApiConnectionException($curl_errno, $curl_error);
        }

        if ($http_status >= 400) {
            if ($http_status == 422) {
                throw new ApiValidationException($http_status, $res_body);
            }
            if ($http_status == 418) {
                throw new ApiCustomException($http_status, $res_body);
            }

            foreach($this->passExceptions as $code => $class) {
                if ($http_status == $code) {
                    throw new $class('API thrown: ' . $res_body);
                }
            }

            throw new ApiHttpException($http_status, $res_body);
        }

        if (defined('MPAPI_DEBUG') && (MPAPI_DEBUG == '1'))
            debug($res_body, true, false);

        $this->lastResponseBody = $res_body;
        $output = @json_decode($res_body, 1);
        
        $timer['stop'] = $this->getmicrotime();
        $this->timer = $timer;
        
        if (defined('MPAPI_TIMER') && (MPAPI_TIMER == '1')) {
        	debug( $this->getRequestTimer() );
        }
        
        return $output;
    }
	
	public function getRequestTimer() {
		
		$phases = array();
		
		$phases = $this->timer['phases'];
		
		$output = array(
			'resource' => $this->timer['resource'],
			'duration' => $this->timer['stop'] - $this->timer['start'],
			'phases' => $phases,
		);
		
		return $output;
		
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
	
	public function getOptions()
	{
		return array(
			'user_id' => $this->user_id,
            'passExceptions' => $this->passExceptions
		);
	}
	
	public function setOptions($options = array())
	{
		if( isset($options['user_id']) && $options['user_id'] )
            $this->user_id = $options['user_id'];

        if (isset($options['passExceptions']) && !empty($options['passExceptions'])) {
            $this->passExceptions = (array) $options['passExceptions'];
        }
	}
	
	private function getmicrotime(){ 
	    list($usec, $sec) = explode(" ",microtime()); 
	    return ((float)$usec + (float)$sec); 
    } 
	
    final public function Dane()
    {
        return new Dane( $this->getOptions() );
    }

    final public function Paszport()
    {
        return new Paszport( $this->getOptions() );
    }

    final public function Powiadomienia()
    {
        return new Powiadomienia( $this->getOptions() );
    }

    final public function Geo()
    {
        return new Geo( $this->getOptions() );
    }

    final public function OAuth()
    {
        return new OAuth( $this->getOptions() );
    }

    final public function KodyPocztowe()
    {
        return new KodyPocztowe( $this->getOptions() );
    }

    final public function PanstwoInternet()
    {
        return new PanstwoInternet( $this->getOptions() );
    }
    
    final public function Media()
    {
        return new Media( $this->getOptions() );
    }
    
    final public function KRS()
    {
        return new KRS( $this->getOptions() );
    }
    
    final public function Ustawy()
    {
        return new Ustawy( $this->getOptions() );
    }
    
    final public function Prawo()
    {
        return new Prawo( $this->getOptions() );
    }

    final public function MapaPrawa()
    {
        return new MapaPrawa( $this->getOptions() );
    }

    final public function Pisma()
    {
        return new Pisma( $this->getOptions() );
    }

    final public function ZamowieniaPubliczne()
    {
        return new ZamowieniaPubliczne( $this->getOptions() );
    }
    
    final public function BDL()
    {
        return new BDL( $this->getOptions() );
    }
    
    final public function Sejmometr()
    {
        return new Sejmometr( $this->getOptions() );
    }
    
    final public function KtoTuRzadzi()
    {
        return new KtoTuRzadzi( $this->getOptions() );
    }
    
    final public function Kultura()
    {
        return new Kultura( $this->getOptions() );
    }
    
    final public function Finanse()
    {
        return new Finanse( $this->getOptions() );
    }
    
    final public function WyjazdyPoslow()
    {
        return new WyjazdyPoslow( $this->getOptions() );
    }
    
    final public function WydatkiPoslow()
    {
        return new WydatkiPoslow( $this->getOptions() );
    }

    final public function HandelZagraniczny()
    {
        return new HandelZagraniczny( $this->getOptions() );
    }

    final public function document($id)
    {
        return new Document($id);
    }

}
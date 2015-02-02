<?

namespace MP;

class HandelZagraniczny extends Application
{

    protected $requests_prefix = '/handelzagraniczny/';

    public function getCountriesData($year)
    {
        return @$this->request('stats', array(
            'year'    => $year
        ));
    }

}
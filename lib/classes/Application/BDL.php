<?

namespace MP;

class BDL extends Application
{

    protected $requests_prefix = '/bdl/';

    public function getDataForDimmesions( $dims )
    {
        $data = @$this->request('dataForDimmesions', array(
        	'dims' => $dims,
        ));
        return @$data['data'];
    }

}
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
    
    public function getChartDataForDimmesions( $dims )
    {
        $data = @$this->request('chartDataForDimmesions', array(
        	'dims' => $dims,
        ));
        return @$data['data'];
    }
    
    public function getDataForDimension( $dim_id )
    {
        $data = @$this->request('dataForDimmesion/' . $dim_id);
        return @$data['data'];
    }
    
    public function getLocalDataForDimension( $dim_id, $level )
    {
        $data = @$this->request('localDataForDimension/' . $dim_id, array(
        	'level' => $level,
        ));
        return @$data['data'];
    }
    
}
<?

namespace MP;

class Finanse extends Application
{

    protected $requests_prefix = '/finanse/';

    public function getBudgetSpendings()
    {
        return @$this->request('getBudgetSpendings');
    }
    
    public function getBudgetSections()
    {
        return @$this->request('getBudgetSections');
    }
    
    public function getBudgetData($params)
    {
        return @$this->request('getBudgetData', $params);
    }    

}
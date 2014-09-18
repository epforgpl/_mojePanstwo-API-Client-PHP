<?

namespace MP;

class Finanse extends Application
{

    protected $requests_prefix = '/finanse/';

    public function getBudgetSpendings()
    {
        return @$this->request('getBudgetSpendings');
    }

}
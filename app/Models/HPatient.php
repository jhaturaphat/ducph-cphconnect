namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HPatient extends Model
{
    protected $connection = 'mysql_hos';
    protected $table = 'patient';    
    protected $primaryKey = 'hn';
}
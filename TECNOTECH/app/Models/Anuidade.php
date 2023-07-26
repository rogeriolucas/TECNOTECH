<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anuidade extends Model
{
    protected $fillable = ['ano', 'valor'];

    public function associados()
    {
        return $this->belongsToMany(Associado::class, 'pagamentos_anuidades')
            ->withPivot('pago');
    }
}
 
    public function anuidadesPagas()
        {
            return $this->belongsToMany(AnuidadePagas::class, 'pagamentos_anuidades')
                ->withPivot('pago');
        }

        public function anuidadesDevidas()
        {
            return Anuidade::where('ano', '>=', $this->data_filiacao->year)
                ->orderBy('ano', 'asc')
                ->get();
        }
    
        
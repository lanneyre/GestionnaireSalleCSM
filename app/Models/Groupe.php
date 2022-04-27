<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Groupe extends Model
{
    use HasFactory, SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'effectif',
        'debut',
        'fin'
    ];

    function formatDate($champ)
    {
        if (empty($champ) || !in_array($champ, $this->fillable)) {
            return "";
        }
        try {
            $date = new \DateTime($this->$champ);
        } catch (\Exception $e) {
            return $this->$champ;
        }
        return $date->format('d-m-Y');
    }

    function status($m = -1, $y = -1)
    {
        $m = ($m == -1) ? date("m") : $m;
        $y = ($y == -1) ? date("Y") : $y;
        $n = cal_days_in_month(CAL_GREGORIAN, $m, $y);
        $ddo = new \DateTime("$y-$m-01");
        $ddf = new \DateTime("$y-$m-$n");
        $dd = new \DateTime($this->debut);
        $df = new \DateTime($this->fin);
        if ($ddo->diff($df)->format("%r%a") < 0) {
            return "table-secondary";
        } else if ($ddf->diff($dd)->format("%r%a") > 0) {
            return "table-warning";
        } else {
            return "table-light";
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Groupe;
use App\Models\Planning;
use App\Models\Salle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    const month = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];

    function welcome(Request $request)
    {
        $groupes = Groupe::all();
        $salles = Salle::all();
        $month = !empty($request['month']) ? $request['month'] : \date("n");
        //$nameMonth = self::month[$month - 1];
        $year = !empty($request['year']) ? $request['year'] : \date("Y");
        $colonne = \cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $plannings = Planning::whereMonth("date", $month)->whereYear("date", $year)->get();
        $planning = [];
        foreach ($plannings as $p) {
            # code...
            $planning[$p->date][$p->id_groupe] = $p->id_salle;
        }
        return view("welcome", ["groupes" => $groupes, "salles" => $salles, "month" => self::month, "m" => $month, "year" => $year, "nbJour" => $colonne, "planning" => $planning]);
    }

    function savePlanning(Request $request)
    {
        $salle = ($request->salle == "null") ? null : $request->salle;
        $groupe = $request->groupe;
        $date = $request->date;
        $reqSQL = "SELECT * FROM `plannings` WHERE `date` = ? AND `id_groupe` = ?";
        $plan = DB::select($reqSQL, [$date, $groupe]);
        // echo "groupe : " . $groupe;
        // echo "date : " . $date;
        var_dump($plan);
        if (empty($plan)) {
            $requetInsert = "INSERT INTO `plannings` (`created_at`, `updated_at`, `date`, `id_groupe`, `id_salle`) VALUES (NOW(), NOW(), :date, :id_groupe, :id_salle)";
            DB::insert($requetInsert, ["date" => $date, 'id_groupe' => $groupe, "id_salle" => $salle]);
        } else {
            $requestUpdate = "UPDATE `plannings` SET `id_salle` = :id_salle, `updated_at` = NOW() WHERE `plannings`.`id` = :id ";
            DB::update($requestUpdate, ["id" => $plan[0]->id, "id_salle" => $salle]);
        }
    }

    function demo(Groupe $groupe)
    {
        var_dump($groupe->nom);
    }
}

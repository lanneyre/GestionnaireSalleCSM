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
use Illuminate\Support\Facades\Redirect;
use PDF;

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

    function printPdf(Request $request)
    {
        $validated = $request->validate([
            'dd' => 'required|date',
            'df' => 'required|date'
        ]);
        if (sizeof($validated) == 2) {
            $groupes = Groupe::all();
            $salles = Salle::all();
            $salle = [];
            foreach ($salles as $s) {
                # code...
                $salle[$s->id] = $s;
            }

            $start = new \dateTime($request['dd']);
            $dateToWork = new \dateTime($request['dd']);
            $dateToWork->modify("+6 days");

            $end = new \dateTime($request['df']);
            //echo $end->diff($start)->format('%r%a');
            if ($end->diff($start)->format('%r%a') > 0) {
                $end->setDate($start->format('Y'), $start->format('m'), $start->format('d'));
            }
            if ($end->diff($dateToWork)->format('%r%a') > 0) {
                $dateToWork->setDate($end->format('Y'), $end->format('m'), $end->format('d'));
            }
            // $colonne = $start->diff($end)->format('%a');
            $page = ceil($start->diff($end)->format('%a') / 7);
            $page = $page == 0 ? 1 : $page;
            $plannings = Planning::where("date", ">=", $start->format('Y-m-d'))->whereYear("date", "<=", $end->format('Y-m-d'))->get();

            $planning = [];

            foreach ($plannings as $p) {
                # code...
                $planning[$p->date][$p->id_groupe] = $p->id_salle;
            }

            PDF::setOptions([
                "defaultFont" => "Courier",
                "defaultPaperSize" => "a4",
                "orientation" => "landscape"
            ]);

            // L'instance PDF avec la vue resources/views/posts/show.blade.php
            $pdf = PDF::loadView('pdf', ["page" => $page, "dateToWork" => $dateToWork, "groupes" => $groupes, "salles" => $salle, "month" => self::month, "start" => $start, "end" => $end, "planning" => $planning])->setPaper('a4', 'landscape');
            // Lancement du téléchargement du fichier PDF
            return $pdf->stream("planning.pdf");
        }
        return Redirect::back()->withErrors('Echec export' . $start->diff($end)->format('%a'));
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
}

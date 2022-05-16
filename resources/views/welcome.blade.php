@extends('Layout.layout')

@section('main')
    <header class="row">
        <section class="col-2">
            Affichage :
            <a href="{{ route('setAffichage') }}"> {{ ucfirst($affichage) }} </a> &darr; <br>
            <form action="{{ route('setTri') }}" method="GET" id="orderByForm">
                <label for="orderBy">Trier par : </label>
                <select name="orderBy" id="orderBy">
                    @if ($affichage == 'salle')
                        <option value="numOfficiel" @if ($tri == 'numOfficiel') selected @endif>Numéro</option>
                        <option value="nom" @if ($tri == 'nom') selected @endif>Nom</option>
                        <option value="superficie" @if ($tri == 'superficie') selected @endif>Superficie</option>
                        <option value="nbMaxApprenants" @if ($tri == 'nbMaxApprenants') selected @endif>NB Apprenants
                        </option>
                        <option value="etage" @if ($tri == 'etage') selected @endif>Etage</option>
                    @else
                        <option value="nom" @if ($tri == 'nom') selected @endif>Nom</option>
                        <option value="effectif" @if ($tri == 'effectif') selected @endif>Effectif</option>
                        <option value="debut" @if ($tri == 'debut') selected @endif>Début</option>
                        <option value="fin" @if ($tri == 'fin') selected @endif>Fin</option>
                    @endif
                </select>
            </form>
        </section>
        <section class="col-10">
            <div class="row justify-content-around">
                <button type="button" name="yearMinus" id="yearMinus" class="col-1 btn btn-primary">
                    << </button>
                        <button type="button" name="monthMinus" id="monthMinus" class="col-1 btn btn-primary">
                            < </button>
                                <select class="col-1 primary" name="month" id="monthActual">
                                    @foreach ($month as $key => $moi)
                                        <option value="{{ $key + 1 }}"
                                            @if ($key == $m - 1) selected @endif>
                                            {{ $moi }}</option>
                                    @endforeach
                                </select>
                                <select class="col-1 primary" name="year" id="yearActual">
                                    @for ($y = 2000; $y < 2050; $y++)
                                        <option value="{{ $y }}"
                                            @if ($y == $year) selected @endif>
                                            {{ $y }}</option>
                                    @endfor
                                </select>
                                <button type="button" name="monthPlus" id="monthPlus" class="col-1 btn btn-primary"> >
                                </button>
                                <button type="button" name="yearPlus" id="yearPlus" class="col-1 btn btn-primary"> >>
                                </button>
            </div>
        </section>

    </header>
    @if ($affichage == 'salle')
        @include('affichage.welcomeSalle')
    @else
        @include('affichage.welcomeGroupe')
    @endif

    <form action="/" method="GET" class="" id="changemonth">
        <div class="hidden" id="oldmonth">{{ $m }}</div>
        <div class="hidden" id="oldyear">{{ $year }}</div>
        <input type="hidden" name="month" id="month" value="">
        <input type="hidden" name="year" id="year" value="">
    </form>
@endsection
@section('script')
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="js/main.js"></script>
    @if ($affichage == 'salle')
        <script src="js/mainSalle.js"></script>
    @else
        <script src="js/mainGroupe.js"></script>
    @endif
@endsection
@section('formPDF')
    <form action="{{ route('printPdf') }}" method="post" class="row" id="print">
        @csrf
        <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <span class="input-group-text" id="">Du</span>
            </div>
            <input type="date" class="form-control" name="dd"
                value="{{ \date('Y-m-d', mktime(0, 0, 0, $m, 1, $year)) }}">
        </div>
        <div class="input-group input-group-sm">
            <div class="input-group-prepend">
                <span class="input-group-text" id="">Au</span>
            </div>
            <input type="date" class="form-control" name="df"
                value="{{ \date('Y-m-d', mktime(0, 0, 0, $m, cal_days_in_month(CAL_GREGORIAN, $m, $year), $year)) }}">
        </div>
        <div class="input-group input-group-sm">
            <button type="submit" class="btn btn-outline-light">Imprimer</button>
        </div>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="onePage" name="OnePage" value="OnePage">
            <label class="form-check-label text-white" for="onePage">One Page</label>
        </div>
    </form>
@endsection

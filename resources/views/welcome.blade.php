@extends("Layout.layout")

@section('main')
    <header class="row">
        <section class="col-2">
            Groupes &darr;
            <br>&nbsp;
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
    <section class="row">
        <div class="col-2 d-flex flex-column">
            <div class="col-12 mb-2 p-1">&nbsp;</div>
            @foreach ($groupes as $groupe)
                <div class="col-12 p-1 lignePlanning">{{ $groupe->nom }}</div>
            @endforeach
        </div>
        <div class="col-10 overflow-auto">
            <div class="row d-flex flex-nowrap">
                @for ($i = 1; $i <= $nbJour; $i++)
                    <div class="col m-0 p-0 d-flex flex-column flex-nowrap colonneJour">
                        <div class="hplan col-12 p-0 m-0 mb-2 border-right border-1 border-dark p-1 text-center">
                            {{ $i < 10 ? '0' . $i : $i }}
                        </div>
                        @foreach ($groupes as $groupe)
                            @if (\date('w', mktime(1, 0, 0, $m, $i, $year)) != 0 && \date('w', mktime(1, 0, 0, $m, $i, $year)) != 6)
                                <div class="lignePlanning m-0 p-0 col-12 border-right border-1 border-dark p-1">
                                    <select
                                        name="g-{{ $groupe->id }}-d-{{ $m }}-{{ $i }}-{{ $year }}"
                                        id="g-{{ $groupe->id }}-d-{{ $m }}-{{ $i }}-{{ $year }}"
                                        class="salles">
                                        <option value="null">--Salle--</option>
                                        @foreach ($salles as $salle)
                                            @php
                                                $date = $year . '-' . ($m < 10 ? '0' : '') . $m . '-' . ($i < 10 ? '0' : '') . $i;
                                            @endphp
                                            <option value="{{ $salle->id }}"
                                                @if (isset($planning[$date][$groupe->id]) && $planning[$date][$groupe->id] == $salle->id) selected @endif>
                                                {{ $salle->numOfficiel }}</option>
                                        @endforeach
                                    </select>
                                @else
                                    <div class="lignePlanningWE m-0 p-0 col-12 border-right border-1 border-dark p-1">
                                        &nbsp;
                            @endif

                    </div>
                @endforeach
            </div>
            @endfor
        </div>
        </div>
    </section>
    <form action="/" method="GET" class="" id="changemonth">
        <div class="hidden" id="oldmonth">{{ $m }}</div>
        <div class="hidden" id="oldyear">{{ $year }}</div>
        <input type="hidden" name="month" id="month" value="">
        <input type="hidden" name="year" id="year" value="">
    </form>
@endsection

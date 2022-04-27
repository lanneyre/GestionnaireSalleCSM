<section class="row">
    <div class="col-2 d-flex flex-column">
        <div class="col-12 mb-2 p-1">&nbsp;</div>
        @foreach ($salles as $salle)
            <div class="col-12 p-1 lignePlanning">{{ $salle->numOfficiel }}</div>
        @endforeach
    </div>
    <div class="col-10 overflow-auto">
        <div class="row d-flex flex-nowrap">
            @for ($i = 1; $i <= $nbJour; $i++)
                <div class="col m-0 p-0 d-flex flex-column flex-nowrap colonneJour">
                    <div class="hplan col-12 p-0 m-0 mb-2 border-right border-1 border-dark p-1 text-center">
                        {{ $i < 10 ? '0' . $i : $i }}
                    </div>
                    @foreach ($salles as $salle)
                        @if (\date('w', mktime(1, 0, 0, $m, $i, $year)) != 0 && \date('w', mktime(1, 0, 0, $m, $i, $year)) != 6)
                            <div class="lignePlanning m-0 p-0 col-12 border-right border-1 border-dark p-1">
                                <select
                                    name="s-{{ $salle->id }}-d-{{ $m }}-{{ $i }}-{{ $year }}"
                                    id="s-{{ $salle->id }}-d-{{ $m }}-{{ $i }}-{{ $year }}"
                                    class="salles">
                                    <option value="null">--Groupes--</option>
                                    @foreach ($groupes as $groupe)
                                        @if ($groupe->status($m, $year) == 'table-light')
                                            @php
                                                $date = $year . '-' . ($m < 10 ? '0' : '') . $m . '-' . ($i < 10 ? '0' : '') . $i;
                                            @endphp
                                            <option value="{{ $groupe->id }}"
                                                @if (isset($planning[$date][$groupe->id]) && $planning[$date][$groupe->id] == $salle->id) selected @endif>
                                                {{ $groupe->nom }}
                                            </option>
                                        @endif
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
</section>

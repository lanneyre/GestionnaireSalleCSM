    <header class="row">
        <section class="col-10">
            <img src="storage/Logo.png" alt="Campus Sud Des Métiers" class="logo">
            <strong>Répartition des salles</strong>
        </section>
    </header>
    <br>&nbsp;
    <section class="row">
        <table class="table printpdf onepage">
            <thead>
                <tr>
                    <th>&nbsp;</th>
                    @php
                        $d = 0;
                    @endphp
                    @while ($end->diff($start)->format('%r%a') <= 0)
                        @if ($start->format('w') != 0 && $start->format('w') != 6)
                            <th>
                                &nbsp;
                                <div>{{ $start->format('d / m / Y') }}</div>
                            </th>
                        @endif
                        @php
                            $start->modify('+1 day');
                            $d++;
                        @endphp
                    @endwhile
                </tr>
            </thead>
            @php
                $start->modify('-' . $d . ' days');
            @endphp
            <tbody>
                @foreach ($salles as $salle)
                    @if ($salle->id != 1 && $salle->id != 2)
                        <tr>
                            <th>{{ $salle->numOfficiel }}</th>
                            @php
                                $d = 0;
                            @endphp
                            @while ($end->diff($start)->format('%r%a') <= 0)
                                @if ($start->format('w') != 0 && $start->format('w') != 6)
                                    <td>
                                        @if (isset($planning[$start->format('Y-m-d')]))
                                            @php
                                                $g = array_search($salle->id, $planning[$start->format('Y-m-d')]);
                                            @endphp
                                            @if ($g !== false)
                                                {{ $groupes[$g]->nom }}
                                            @else
                                                &nbsp;
                                            @endif
                                        @else
                                            &nbsp;
                                        @endif
                                    </td>
                                @endif
                                @php
                                    $start->modify('+1 day');
                                    $d++;
                                @endphp
                            @endwhile
                            @php
                                $start->modify('-' . $d . ' days');
                            @endphp
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </section>
    <!-- Saut de page -->

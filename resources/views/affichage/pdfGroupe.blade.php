@while ($page > 0)
    <header class="row">
        <section class="col-10">
            <img src="storage/Logo.png" alt="Campus Sud Des Métiers" class="logo">
            <strong>Répartition des groupes</strong>
        </section>
    </header>
    <br>&nbsp;
    <section class="row">
        <table class="table printpdf">
            <thead>
                <tr>
                    <th>&nbsp;</th>
                    @php
                        $d = 0;
                    @endphp
                    @while ($dateToWork->diff($start)->format('%r%a') <= 0)
                        @if ($start->format('w') != 0 && $start->format('w') != 6)
                            <th>{{ $start->format('d / m / Y') }}</th>
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
                @foreach ($groupes as $groupe)
                    @if ($groupe->status($dateToWork->format('m'), $dateToWork->format('Y')) == 'table-light')
                        <tr>
                            <th>{{ $groupe->nom }}</th>
                            @php
                                $d = 0;
                            @endphp
                            @while ($dateToWork->diff($start)->format('%r%a') <= 0)
                                @if ($start->format('w') != 0 && $start->format('w') != 6)
                                    <td>
                                        @if (isset($planning[$start->format('Y-m-d')][$groupe->id]))
                                            {{ $salles[$planning[$start->format('Y-m-d')][$groupe->id]]->numOfficiel }}
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

    @php
        $start->modify('+7 days');
        $dateToWork->modify('+7 days');
        // echo $end->diff($dateToWork)->format('%r%a');
        if ($end->diff($dateToWork)->format('%r%a') > 0) {
            $dateToWork->setDate($end->format('Y'), $end->format('m'), $end->format('d'));
        }
        $page--;
    @endphp
    @if ($page > 0)
        <div style="page-break-after: always;"></div>
    @endif
@endwhile

@extends("Layout.layout")

@section('main')
    <table class="table table-striped" id="sortTableSalle">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Numéro</th>
                <th scope="col">Nom</th>
                <th scope="col">Apprenants</th>
                <th scope="col">Superficie</th>
                <th scope="col">Etage</th>
                <th scope="col">&nbsp;</th>
                <th scope="col">&nbsp;</th>
                <th scope="col">
                    <a href="#" class="btn btn-outline-primary" tabindex="-1" role="button" aria-disabled="true"
                        data-toggle="modal" data-target="#ModalAdd">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-plus-lg" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                        </svg>
                    </a>
                    @include('Salles.modalAdd')
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($salles as $salle)
                <tr>
                    <td>{{ $salle->id }}</td>
                    <td>{{ $salle->numOfficiel }}</td>
                    <td>{{ $salle->nom }}</td>
                    <td>{{ $salle->nbMaxApprenants }}</td>
                    <td>{{ $salle->superficie }}</td>
                    <td>{{ $salle->etage }}</td>
                    <td>
                        <a href="#" class="btn btn-outline-success" tabindex="-1" role="button" aria-disabled="true"
                            data-toggle="modal" data-target="#ModalView{{ $salle->id }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-eye" viewBox="0 0 16 16">
                                <path
                                    d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                <path
                                    d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                            </svg></a>
                        @include('Salles.modalView')
                    </td>
                    <td>
                        <a href="#" class="btn btn-outline-warning" tabindex="-1" role="button" aria-disabled="true"
                            data-toggle="modal" data-target="#ModalEdit{{ $salle->id }}" data-toggle="modal"
                            data-target="#ModalEdit{{ $salle->id }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-pen" viewBox="0 0 16 16">
                                <path
                                    d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
                            </svg>
                        </a>
                        @include('Salles.modalEdit')
                    </td>
                    <td>
                        <a href="#" class="btn btn-outline-danger" tabindex="-1" role="button" aria-disabled="true"
                            data-toggle="modal" data-target="#Modaldelete{{ $salle->id }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-trash" viewBox="0 0 16 16">
                                <path
                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                <path fill-rule="evenodd"
                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                            </svg>
                        </a>
                        @include('Salles.modalDelete')
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
@section('script')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script>
        $('#sortTableSalle').DataTable();
    </script>
@endsection

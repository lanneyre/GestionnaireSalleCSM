@extends("Layout.layoutPDF")

@section('main')
    @if ($affichage == 'salle')
        @include('affichage.pdfSalle')
    @else
        @include('affichage.pdfGroupe')
    @endif
@endsection
@section('script')
    <script src="js/main.js"></script>
@endsection

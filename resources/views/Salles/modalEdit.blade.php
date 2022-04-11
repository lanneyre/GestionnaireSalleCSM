<!-- Modal -->
<div class="modal fade" id="ModalEdit{{ $salle->id }}" tabindex="-1" role="dialog"
    aria-labelledby="ModalEditLabel{{ $salle->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('salle.update', $salle) }}">
                @method("PUT")
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalEditLabel{{ $salle->id }}">
                        <div class="form-group">
                            <label for="nom{{ $salle->id }}">Nom</label>
                            <input type="text" class="form-control" id="nom{{ $salle->id }}"
                                value="{{ $salle->nom }}" name="nom">
                        </div>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="numOfficiel{{ $salle->id }}">Numéro</label>
                        <input type="text" class="form-control" id="numOfficiel{{ $salle->id }}"
                            value="{{ $salle->numOfficiel }}" name="numOfficiel">
                    </div>
                    <div class="form-group">
                        <label for="nbMaxApprenants{{ $salle->id }}">Effectif max :</label>
                        <input type="number" class="form-control" id="nbMaxApprenants{{ $salle->id }}"
                            value="{{ $salle->nbMaxApprenants }}" name="nbMaxApprenants">
                    </div>
                    <div class="form-group">
                        <label for="superficie{{ $salle->id }}">Supérficie</label>
                        <input type="number" class="form-control" id="superficie{{ $salle->id }}"
                            value="{{ $salle->superficie }}" name="superficie">
                    </div>
                    <div class="form-group">
                        <label for="etage{{ $salle->id }}">Etage</label>
                        <input type="number" class="form-control" id="etage{{ $salle->id }}"
                            value="{{ $salle->etage }}" name="etage">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Sauvegarder</button>
                </div>
            </form>
        </div>
    </div>

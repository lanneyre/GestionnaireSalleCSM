<!-- Modal -->
<div class="modal fade" id="ModalEdit{{ $groupe->id }}" tabindex="-1" role="dialog"
    aria-labelledby="ModalEditLabel{{ $groupe->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('groupe.update', $groupe) }}">
                @method("PUT")
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalEditLabel{{ $groupe->id }}">
                        <div class="form-group">
                            <label for="nom{{ $groupe->id }}">Nom</label>
                            <input type="text" class="form-control" id="nom{{ $groupe->id }}"
                                value="{{ $groupe->nom }}" name="nom">
                        </div>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="effectif{{ $groupe->id }}">Effectif max :</label>
                        <input type="number" class="form-control" id="effectif{{ $groupe->id }}"
                            value="{{ $groupe->effectif }}" name="effectif">
                    </div>
                    <div class="form-group">
                        <label for="debut{{ $groupe->id }}">Debut formation :</label>
                        <input type="date" class="form-control" id="debut{{ $groupe->id }}"
                            value="{{ $groupe->debut }}" name="debut">
                    </div>
                    <div class="form-group">
                        <label for="fin{{ $groupe->id }}">Fin formation :</label>
                        <input type="date" class="form-control" id="fin{{ $groupe->id }}"
                            value="{{ $groupe->fin }}" name="fin">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Sauvegarder</button>
                </div>
            </form>
        </div>
    </div>

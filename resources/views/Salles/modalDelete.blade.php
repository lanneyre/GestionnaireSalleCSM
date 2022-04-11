<!-- Modal -->
<div class="modal fade" id="Modaldelete{{ $salle->id }}" tabindex="-1" role="dialog"
    aria-labelledby="ModaldeleteLabel{{ $salle->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModaldeleteLabel{{ $salle->id }}">{{ $salle->nom }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" role="alert">
                    Voulez-vous vraiment supprimer cette salle ?
                </div>
                <form action="{{ route('salle.destroy', $salle) }}" method="post">
                    @csrf
                    @method("DELETE")
                    <div class="row">
                        <div class="col-6"><button class="btn btn-danger" type="submit">Oui</button></div>
                        <div class="col-6"><button type="button" class="btn btn-secondary"
                                data-dismiss="modal">Non</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

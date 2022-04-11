<!-- Modal -->
<div class="modal fade" id="Modaldelete{{ $groupe->id }}" tabindex="-1" role="dialog"
    aria-labelledby="ModaldeleteLabel{{ $groupe->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModaldeleteLabel{{ $groupe->id }}">{{ $groupe->nom }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" role="alert">
                    Voulez-vous vraiment supprimer ce groupe ?
                </div>
                <form action="{{ route('groupe.destroy', $groupe) }}" method="post">
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

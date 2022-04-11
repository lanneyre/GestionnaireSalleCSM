<!-- Modal -->
<div class="modal fade" id="ModalView{{ $salle->id }}" tabindex="-1" role="dialog"
    aria-labelledby="ModalViewLabel{{ $salle->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalViewLabel{{ $salle->id }}">{{ $salle->nom }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">Numéro :</div>
                    <div class="col-6">{{ $salle->numOfficiel }}</div>
                    <div class="col-6">Effectif max :</div>
                    <div class="col-6">{{ $salle->nbMaxApprenants }}</div>
                    <div class="col-6">Superficie : </div>
                    <div class="col-6">{{ $salle->superficie }}</div>
                    <div class="col-6">Etage :</div>
                    <div class="col-6">{{ $salle->etage }}</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

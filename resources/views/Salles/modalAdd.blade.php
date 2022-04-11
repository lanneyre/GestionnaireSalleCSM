<!-- Modal -->
<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="ModalAddLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('salle.store') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalAddLabel">
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" id="nom" value="" name="nom">
                        </div>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="numOfficiel">Numéro</label>
                        <input type="text" class="form-control" id="numOfficiel" value="" name="numOfficiel">
                    </div>
                    <div class="form-group">
                        <label for="nbMaxApprenants">Effectif max :</label>
                        <input type="number" class="form-control" id="nbMaxApprenants" value=""
                            name="nbMaxApprenants">
                    </div>
                    <div class="form-group">
                        <label for="superficie">Supérficie</label>
                        <input type="number" class="form-control" id="superficie" value="" name="superficie">
                    </div>
                    <div class="form-group">
                        <label for="etage">Etage</label>
                        <input type="number" class="form-control" id="etage" value="" name="etage">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Créer la salle</button>
                </div>
            </form>
        </div>
    </div>

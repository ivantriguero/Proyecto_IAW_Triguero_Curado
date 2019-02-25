<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Está seguro de que desea eliminar el cliente?<br>
        <?php
        var_dump($_GET);
        ?>
        </div>
      <div class="modal-footer">
        <a>Close</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Save changes</button>
      </div>
    </div>
  </div>
</div>
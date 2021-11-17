<div class="contein-editor col-sm-12">
  <div>
    <br>
    <br>
  </div>
  <!-- <div class="editor-brs">
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
        </div> -->
  <div class="container">
    <form action="keys/agregar-post-key.php" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-9">
          <!-- <h3>Demo:</h3> -->
          <div class="docs-demo">
            <div class="img-container">
              <img src="" alt="">
            </div>
          </div>
        </div>
        <div class="col-md-3 textos_stados">
          <h4>Escribe un comentario</h4>
          <textarea class="form-control col-sm-12" name="estado_post" id="" cols="20" placeholder="Escribe aqui!" rows="5" maxlength="115"></textarea>
          <label for="">Maximo 115 Caracteres</label>
          <br>
        </div>

      </div>
      <div class="row" id="actions">
        <div class="col-md-9 docs-buttons">
          <!-- <h3>Toolbar:</h3> -->
          <div class="btn-group">
            <br>
            <!-- <button type="button" class="btn btn-primary" data-method="setDragMode" data-option="crop" title="Crop">
              <span class="docs-tooltip" data-toggle="tooltip" title="cropper.setDragMode(&quot;crop&quot;)">
                <span class="fa fa-crop-alt"></span>
              </span>
            </button> -->
          </div>

          <div class="btn-group">
            <button type="button" class="btn btn-primary" data-method="zoom" data-option="0.1" title="Zoom In">
              <span class="docs-tooltip" data-toggle="tooltip" title="cropper.zoom(0.1)">
                <span class="fa fa-search-plus"></span>
              </span>
            </button>
            <button type="button" class="btn btn-primary" data-method="zoom" data-option="-0.1" title="Zoom Out">
              <span class="docs-tooltip" data-toggle="tooltip" title="cropper.zoom(-0.1)">
                <span class="fa fa-search-minus"></span>
              </span>
            </button>
          </div>

          <div class="btn-group">
            <button type="button" class="btn btn-primary" data-method="move" data-option="-10" data-second-option="0" title="Move Left">
              <span class="docs-tooltip" data-toggle="tooltip" title="cropper.move(-10, 0)">
                <span class="fa fa-arrow-left"></span>
              </span>
            </button>
            <button type="button" class="btn btn-primary" data-method="move" data-option="10" data-second-option="0" title="Move Right">
              <span class="docs-tooltip" data-toggle="tooltip" title="cropper.move(10, 0)">
                <span class="fa fa-arrow-right"></span>
              </span>
            </button>
            <button type="button" class="btn btn-primary" data-method="move" data-option="0" data-second-option="-10" title="Move Up">
              <span class="docs-tooltip" data-toggle="tooltip" title="cropper.move(0, -10)">
                <span class="fa fa-arrow-up"></span>
              </span>
            </button>
            <button type="button" class="btn btn-primary" data-method="move" data-option="0" data-second-option="10" title="Move Down">
              <span class="docs-tooltip" data-toggle="tooltip" title="cropper.move(0, 10)">
                <span class="fa fa-arrow-down"></span>
              </span>
            </button>
          </div>

          <div class="btn-group">
            <button type="button" class="btn btn-primary" data-method="rotate" data-option="-45" title="Rotate Left">
              <span class="docs-tooltip" data-toggle="tooltip" title="cropper.rotate(-45)">
                <span class="fa fa-undo-alt"></span>
              </span>
            </button>
            <button type="button" class="btn btn-primary" data-method="rotate" data-option="45" title="Rotate Right">
              <span class="docs-tooltip" data-toggle="tooltip" title="cropper.rotate(45)">
                <span class="fa fa-redo-alt"></span>
              </span>
            </button>
          </div>

          <div class="btn-group">
            <button type="button" class="btn btn-primary" data-method="scaleX" data-option="-1" title="Flip Horizontal">
              <span class="docs-tooltip" data-toggle="tooltip" title="cropper.scaleX(-1)">
                <span class="fa fa-arrows-alt-h"></span>
              </span>
            </button>
            <button type="button" class="btn btn-primary" data-method="scaleY" data-option="-1" title="Flip Vertical">
              <span class="docs-tooltip" data-toggle="tooltip" title="cropper.scaleY(-1)">
                <span class="fa fa-arrows-alt-v"></span>
              </span>
            </button>
            <button type="button" class="btn btn-primary" data-method="reset" title="Reset">
              <span class="docs-tooltip" data-toggle="tooltip" title="cropper.reset()">
                <span class="fa fa-sync-alt"></span>
              </span>
            </button>
          </div>




          <div class="btn-group">
            <button type="submit" class="btn btn-success" data-method="getCroppedCanvas" data-option="{ &quot;maxWidth&quot;: 4096, &quot;maxHeight&quot;: 4096 }">
              <span class="docs-tooltip" data-toggle="tooltip" title="Publicar">
                Publicar
              </span>
            </button>
            <div type="button" data-method="destroy" class="btn btn-danger hidde_editor">
              <span class="docs-tooltip" data-toggle="tooltip" title="Cancelar">
                Cancelar
              </span>
            </div>
          </div>
          <div class="btn-group">

          </div>
          <input type="hidden" name="foto" value="" id="base65">
          <input type="hidden" value="" name="opcion" id="optionpost">
          <input type="hidden" value="" name="extencion" id="extencion">
          <input type="hidden" value="" name="time" id="time1">





          <!-- Show the cropped image in modal -->

          <!-- alert para visualizar y descargar foto -->
          <div class="modal fade docs-cropped" id="getCroppedCanvasModal" role="dialog" aria-hidden="true" aria-labelledby="getCroppedCanvasTitle" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="getCroppedCanvasTitle">Cropped</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body"></div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <a class="btn btn-primary" id="download" href="javascript:void(0);" download="cropped.jpg">Download</a>
                </div>
              </div>
            </div>
          </div>

        </div><!-- /.docs-buttons -->

        <div class="col-md-3 docs-toggles">
          <div class="dropdown dropup docs-options">
            <!-- <button type="button" class="btn btn-primary btn-block dropdown-toggle" id="toggleOptions" data-toggle="dropdown" aria-expanded="true">
            Toggle Options
          </button> -->

          </div><!-- /.dropdown -->
        </div>
    </form><!-- /.docs-toggles -->
  </div>
</div>
</div>
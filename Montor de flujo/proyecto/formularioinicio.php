  <div class="col-2">
    <label>
      Nombre
      <input placeholder="-" tabindex="1" />
    </label>
  </div>
  <div class="col-2">
    <label>
      Apellido
      <input placeholder="-" tabindex="2" />
    </label>
  </div>
  <div class="col-3">
    <label>
      C.I.
      <input placeholder="-" tabindex="3" value="<?php echo $iduser; ?>" />
    </label>
  </div>
  <div class="col-3">
    <label>
      ¿A que plantel pertence?
      <select tabindex="4">
        <option>Docente</option>
        <option>Estudiantil</option>
        <option>Administrativo</option>
      </select>
    </label>
  </div>
  <div class="col-3">
    <label>
      ¿Qué quiere cancelar?
      <select tabindex="5">
        <option>Matricula</option>
        <option>Cursos de temporada</option>
        <option>Tramite curricular</option>
        <option>Tramite administrativo</option>
        <option>Certificación</option>
        <option>Solicitud de traslado</option>
        <option>Tramite interno</option>
      </select>
    </label>
  </div>

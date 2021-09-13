@extends('store.storeLayout'), @section('content')
<img src="{{asset('img/images/banners/emprego.png')}}" style="width: 100%; margin-top:-60px;" />
<main id="main">

  <section id="quem_somos">
    <div class="container-fluid">
      <section id="team" class="team">
        <div class="container">
          <div class="section-title" style="margin-top:-80px;">
            <h2>Emprego </h2>
            <address1>Junte-se a nossa equipe!
            </address1>
          </div>
        </div>
      </section>
      <!-- ======= Contact Section ======= -->
      <div class="container lst">

        @if (count($errors) > 0)
        <div class="alert alert-danger">
          <strong>Sorry!</strong> There were more problems with your HTML input.<br><br>
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
    
        @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
        @endif    
     <form method="post" action="{{route('store.join-us')}}" enctype="multipart/form-data" style="margin-top:-70px;">
          @csrf
          <div class="row">
          <div class="col-md-6 form-group">
            <label for="name">Nome: *</label>
            <input type="text" name="Name" class="form-control" id="Name" placeholder="Teu Nome" data-rule="minlen:2"
              data-msg="Please enter at least 2 chars " required>
          </div>
    
          <div class="col-md-6 form-group mt-3 mt-md-0">
            <label for="">Apelido: *</label>
            <input type="text" class="form-control" name="Surname" id="Surname" placeholder="Teu apelido"
              data-rule="minlen:2" data-msg="Please enter at least 2 chars" required>
          </div>
          <div class="col-md-6 form-group">
            <label for="name">E-mail: *</label>
            <input type="email" name="Email" class="form-control" id="Email" placeholder="E-mail" data-rule="minlen:4"
              data-msg="Please enter at least 4 chars" required>
          </div>
          <div class="col-md-6 form-group mt-3 mt-md-0">
            <label for="Birthday">Data de Nacimento: *</label>
            <input type="date" class="form-control" name="Birthday" id="Birthday" placeholder="" data-rule="email"
              data-msg="Please enter a valid email" required>
          </div>
          <div class="col-md-2 form-group">
    
            <label for="experience">state / Morada *</label>
            <br>
            <select name="Address" id="Address">
            @php foreach($prolist->all() as $pro) {
            echo "<option value=".$pro->id.">".$pro->nome." </option>"; $select_attribute=''; } @endphp
            </select>
          </div>
          <div class="col-md-2 form-group">
    
            <label for="experience">Proficiencia no ingles*</label>
            <br>
            <select name="Lingua" id="Lingua">
              <option value="" selected>Razoavel</option>
              <option value="">Intermediario</option>
              <option value="">Fluente</option>
            </select>
          </div>
          <div class="col-md-2 form-group mt-2 mt-md-0">
            <label for="">Codigo de referência *</label>
            <input type="number" class="form-control" name="CodigoR" id="CodigoR"
              placeholder="Digite o codigo de referencia" required>
          </div>
          <div class="col-md-2 form-group">
            <label for="experience">Nível Académico *</label>
            <br>
            <select name="NivelAC" id="NivelAC">
            @php foreach($nivellist->all() as $nivel) {
              echo "<option value=".$nivel->id.">".$nivel->nome." </option>"; $select_attribute=''; } @endphp
            </select>
          </div>
          <div class="col-md-2 form-group">
            <label for="experience">Anos de experiencia *</label>
            <br>
            <select name="Anos" id="Anos">
            @php foreach($explist->all() as $years) {
               echo "<option value=".$years->id.">".$years->ano." </option>"; $select_attribute=''; } @endphp
            </select>
          </div>
    
          <div class="col-md-2 form-group">
            <label for="experience">Área a se candidatar *</label>
            <br>
            <select name="AreaCA" id="AreaCA">
            @php foreach($arealist->all() as $area) {
            echo "<option value=".$area->id.">".$area->nome." </option>"; $select_attribute=''; } @endphp
            </select>
          </div>
    
          <div class="col-md-6 form-group">
            <label for="name">Qual é o interesse em trabalhar na Projenity: *</label>
            <div class="form-group mt-3">
              <textarea class="form-control" name="Interest" id="Interest" rows="5"
                placeholder="O meu interesse em trabalhar na Projenity..." required></textarea>
            </div>
          </div>
          <div class="col-md-6 form-group">
            <label for="name">Descreve seus pontos fortes: *</label>
            <div class="form-group mt-3">
              <textarea class="form-control" name="Strong" id="Strong" rows="5" placeholder="Os meus pontos fortes..."
                required></textarea>
            </div>
          </div>
          <div class="col-md-6 form-group">
            <label for="name">Porque devemos contrata-lo? *</label>
            <div class="form-group mt-3">
              <textarea class="form-control" name="Why" id="Why" rows="5" placeholder="Porque..." required></textarea>
            </div>
          </div>
          <div class="col-md-6 form-group">
            <label for="name">Porque deixou a empresa anterior ? *</label>
            <div class="form-group mt-3">
              <textarea class="form-control" name="WhyLeft" id="WhyLeft" rows="5"
                placeholder="Deixei a empresa anterior orque..." required></textarea>
            </div>
          </div>
          <div class="col-md-3 form-group mt-2 mt-md-0">
            <label for="">Qual é a sua pretensão salarial ? *</label>
            <input type="number" class="form-control" name="Salary" id="Salary" placeholder="$" required>
          </div>
          <div class="input-group hdtuto control-group lst increment">
            <input type="file" name="filenames[]" class="myfrm form-control">
            <div class="input-group-btn">
              <button class="btn btn-success" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Add</button>
            </div>
          </div>
          <div class="clone hide">
            <div class="hdtuto control-group lst input-group" style="margin-top:10px">
              <input type="file" name="filenames[]" class="myfrm form-control">
              <div class="input-group-btn">
                <button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i>
                  Remove</button>
              </div>
            </div>
          </div>
    <br> 
    <div>
          <button type="submit" class="btn btn-success" style="margin-top:10px">Enviar</button>
        </div>
        </div>
        </form>
      </div>
    
      <script type="text/javascript">
        $(document).ready(function () {
          $(".btn-success").click(function () {
            var lsthmtl = $(".clone").html();
            $(".increment").after(lsthmtl);
          });
          $("body").on("click", ".btn-danger", function () {
            $(this).parents(".hdtuto").remove();
          });
        });
      </script>
</main>
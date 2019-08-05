@extends("web.layout")


@section("contenido")

<section id="contacto">
       <hr>
        <div class="container">
            <div class="row">
            <div class="col">
                <form action="#" method="post"> 
                <h1 class="text-center">Contacto</h1>
                
      
            
                    <input type="text" name="nombre" placeholder="Nombre" >
                    <input type="text" name="apellido" placeholder="Apellido">                    
                    <input type="text" name="correo" placeholder="Correo">
                    <textarea name="mensaje" placeholder="Escribe aquí: "></textarea>           
                                 
                        <div class="form-group" id="checkbox">
                            <label class="titulo">Modelos favoritos</label>
                            <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="modelos[]" value="Originals">
                            Orginals
                            </label>
                            </div>                        
                            <div class="form-check">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="modelos[]" value="Performance">
                                Performance
                                </label>
                            </div>                        
                            <div class="form-check">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="modelos[]" value="Style">
                                Style
                                </label>
                            </div>
                        </div>
                    <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                </form>
            </div>        
        </div>            
    </div>
</section>
@endsection
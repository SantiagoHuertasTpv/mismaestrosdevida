<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; color: #333; }
        .card { border: 1px solid #ddd; padding: 20px; border-radius: 10px; }
        .gold { color: #b45309; font-weight: bold; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Tienes un nuevo testimonio para revisar</h2>
        <p><span class="gold">De:</span> {{ $comentario->tunombre }}</p>
        <p><span class="gold">Maestro:</span> {{ $comentario->nombremaestro }}</p>
        <p><span class="gold">Titular:</span> {{ $comentario->comentario_corto }}</p>
        <hr>
        <p><strong>Mensaje:</strong></p>
        <p>{{ $comentario->comentario_largo }}</p>
        <br>

         <hr>
<p>Recuerda que está <strong>desactivado</strong> por defecto.</p>

<div style="margin-top: 30px; text-align: center;">
  <a href="{{ route('comentarios.activar', ['id' => $comentario->id, 'token' => $comentario->token]) }}" 
   style="background-color: #b45309; color: white; padding: 12px 25px; text-decoration: none; border-radius: 50px;">
    🚀 ACTIVAR COMENTARIO SEGURO
</a>
</div>
        
    </div>

   
</body>
</html>
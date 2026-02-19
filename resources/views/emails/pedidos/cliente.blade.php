<!DOCTYPE html>
<html>

<body style="background-color: #000; color: #fff; font-family: sans-serif; padding: 20px;">
    <div style="max-width: 600px; margin: auto; background-color: #1a1a1a; padding: 40px; border-radius: 20px; border: 1px solid #333;">
        <h1 style="color: #f59e0b; text-transform: uppercase; letter-spacing: 2px;">¡Pedido Confirmado!</h1>
        <p>Hola <strong>{{ $pedido->nombre }}</strong>,</p>
        <p>Hemos recibido tu pedido correctamente. Aquí tienes los detalles:</p>

        <div style="background-color: #2a2a2a; padding: 20px; border-radius: 10px; margin: 20px 0;">
            <p style="margin: 5px 0;"><strong>Nº de Pedido:</strong> #{{ $pedido->id }}</p>
            <p style="margin: 5px 0;"><strong>Cantidad:</strong> {{ $pedido->cantidad }} libro(s)</p>
            <p style="margin: 5px 0;"><strong>Dirección:</strong> {{ $pedido->direccion }}, {{ $pedido->ciudad }}</p>
            @if($pedido->observaciones)
            <p style="margin: 15px 0 5px 0; color: #f59e0b;"><strong>Notas adicionales:</strong></p>
            <p style="margin: 0; font-style: italic; color: #ccc;">"{{ $pedido->observaciones }}"</p>
            @endif
        </div>



        <p>Te avisaremos en cuanto el envío esté en camino.</p>
        <p style="color: #f59e0b; font-weight: bold;">Mis Maestros de Vida</p>
    </div>
</body>

</html>
<!DOCTYPE html>
<html>
<body style="font-family: sans-serif; padding: 20px;">
    <h2>🔔 Nuevo Pedido Recibido (#{{ $pedido->id }})</h2>
    <p><strong>Cliente:</strong> {{ $pedido->nombre }}</p>
    <p><strong>Email:</strong> {{ $pedido->email }}</p>
    <p><strong>Teléfono:</strong> {{ $pedido->telefono }}</p>
    <p><strong>Cantidad:</strong> {{ $pedido->cantidad }}</p>
    <p><strong>Dirección:</strong> {{ $pedido->direccion }}, {{ $pedido->ciudad }} ({{ $pedido->cp }})</p>
    <p><strong>Nota:</strong> {{ $pedido->nota ?? 'Sin notas' }}</p>
    @if($pedido->observaciones)
        <p style="margin: 15px 0 5px 0; color: #f59e0b;"><strong>Notas adicionales:</strong></p>
        <p style="margin: 0; font-style: italic; color: #ccc;">"{{ $pedido->observaciones }}"</p>
    @endif
</body>
</html>
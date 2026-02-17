{{-- resources/views/emails/pedidos/cliente.blade.php --}}
@component('mail::message')
# ¡Gracias! Hemos recibido tu pedido

Tu número de pedido es: **#{{ $pedido->id }}**

**Datos de envío**
- Nombre: {{ $pedido->nombre ?? '—' }}
- Dirección: {{ $pedido->direccion }}
- Ciudad: {{ $pedido->ciudad }}
- Provincia: {{ $pedido->provincia ?? '—' }}
- CP: {{ $pedido->cp }}
- País: {{ $pedido->pais }}
- Cantidad: {{ $pedido->cantidad }}

@if($pedido->nota)
**Nota:** {{ $pedido->nota }}
@endif

Gracias por apoyar *Mis Maestros de Vida*.
@endcomponent

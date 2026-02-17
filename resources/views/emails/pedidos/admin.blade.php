{{-- resources/views/emails/pedidos/admin.blade.php --}}
@component('mail::message')
# Nuevo pedido recibido

**Pedido:** #{{ $pedido->id }}

- Email: {{ $pedido->email }}
- Nombre: {{ $pedido->nombre ?? '—' }}
- Teléfono: {{ $pedido->telefono ?? '—' }}
- Dirección: {{ $pedido->direccion }}
- Ciudad: {{ $pedido->ciudad }}
- Provincia: {{ $pedido->provincia ?? '—' }}
- CP: {{ $pedido->cp }}
- País: {{ $pedido->pais }}
- Cantidad: {{ $pedido->cantidad }}

@if($pedido->nota)
**Nota:** {{ $pedido->nota }}
@endif

@endcomponent

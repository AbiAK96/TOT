<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img style="text-align: left" src="{{ asset('img/email.png') }}">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>

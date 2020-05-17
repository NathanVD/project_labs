<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (App\Logo::find(1))
  <img src="{{asset('storage/'.App\Logo::find(1)->logo_path)}}" class="logo" alt="Logo">
@else
  <img src="{{asset('img/logo.png')}}" class="logo" alt="Labs Logo">
@endif
</a>
</td>
</tr>

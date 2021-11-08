@extends('layouts.pdf')

@section('documento')
<p style="text-align: center; font-size: 15px;"><u><b>CARTA DE LIBERACIÓN DE EQUIPO</b></u></p>
<br>
<p><b>Departamento:</b> Infraestructura Corporativa</p>
<p style="text-align: right;"><b>Fecha:</b> {{ $asignacionmovil->now }} </p>

<h4>EQUIPO EN LIBERACION:</h4>

<div class='centerTable'>
<table class="table" width="100%" border="1">
  <thead>
    <tr>
      <th>Cantidad</th>
      <th>Definición</th>
      <th>Marca</th>
      <th>Modelo</th>
      <th>IMEI</th>
    </tr>
  </thead>
  <tbody>
    <tr align="center">
      <td>1</td>
      <td>Equipo Celular</td>
      <td>{{ $asignacionmovil->imei->marca->marca }}</td>
      <td>{{ $asignacionmovil->imei->modelo }}</td>
      <td>{{ $asignacionmovil->imei->imei }}</td>
    </tr>
  </tbody>
</table>
</div>
<br><br><br>
<p>
    *Grupo Diagnóstico Médico PROA hace entrega del equipo anteriormente descrito al usuario cediendo los derechos de la propiedad del mismo, por lo tanto el usuario receptor será el único responsable del uso que se dé al equipo, teniendo todas las obligaciones legales que resulten, obligándose a sacar en paz y bien librado a Grupo Diagnóstico Médico PROA ante cualquier requerimiento de la autoridad.*
</p>
<b>
    *Grupo Diagnóstico Médico PROA hace entrega del equipo anteriormente descrito al usuario sin información de la empresa y restablecido a los valores de fábrica.*
</b>
<br><br><br><br><br><br><br><br><br>
<div class='centerTable'>
	<table style="text-align:center;" width="70%" border="0" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th>____________________________</th>
                <th>____________________________</th>
            </tr>
        </thead>
		<tbody>
			<tr height="600px">
				<td>Entrega Equipo:</td>
				<td>Acepto los términos:</td>
			</tr>
			<tr>
				<td><b>{{ Auth::user()->empleado->FullName }}
                <br>{{ Auth::user()->empleado->NOMINA }}</b>
                </td>
				<td>
                    <b>{{ $asignacionmovil->nombre }}<br>
                    {{ $asignacionmovil->nomina }}</b>
                </td>
			</tr>
		</tbody>
	</table>
</div>
@endsection

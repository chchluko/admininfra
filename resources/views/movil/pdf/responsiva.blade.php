@extends('layouts.pdf')

@section('documento')
<p style="text-align: center; font-size: 15px;"><u><b>CARTA RESPONSIVA</b></u></p>
<br>
<p><b>Departamento:</b> Infraestructura Corporativa</p>
<p style="text-align: right;"><b>Fecha:</b> {!! date('d/m/Y') !!} </p>

<h4>Equipo en Resguardo:</h4>

<div class='centerTable'>
<table class="table" width="100%" border="1">
  <thead>
    <tr>
      <th>Cantidad</th>
      <th>Definición</th>
      <th>Marca</th>
      <th>Modelo</th>
      <th>Linea</th>
      <th>IMEI</th>
    </tr>
  </thead>
  <tbody>
    <tr align="center">
      <td>1</td>
      <td>{{ $asignacionmovil->imei->tipo->tipo }}</td>
      <td>{{ $asignacionmovil->imei->marca->marca }}</td>
      <td>{{ $asignacionmovil->imei->modelo }}</td>
      <td>{{ $asignacionmovil->lineatelefonica->lineatelefonica }}</td>
      <td>{{ $asignacionmovil->imei->imei }}</td>
    </tr>
  </tbody>
</table>
</div>
<br><br><br>
<ul>
<li>TI hace entrega del equipo anteriormente descrito, si es por remplazo se debe entregar el equipo anterior y reemplaza la responsiva de dicho equipo entregado.</li>
<li>Quien recibe es responsable del resguardo de dicho equipo y por tal es responsable de cubrir el monto de reposición por daño físico o extravío.</li>
<li>Quien recibe se compromete al uso exclusivo con fines laborales que conciernan a Grupo PROA.</li>
</ul>
<br><br><br><br><br><br><br><br><br>
<div class='centerTable'>
	<table style="text-align:center;" width="70%" border="0" cellspacing="0" cellpadding="0">
		<tbody>
			<tr height="300px">
				<td>____________________________</td>
				<td>____________________________</td>
			</tr>
			<tr>
				<td><b>Entrega:</b><br>{{ Auth::user()->empleado->FullName }}</td>
				<td><b>{{ $asignacionmovil->nombre }}</b><br>
                <b>No. de Nómina:</b> {{ $asignacionmovil->nomina }} <br>
                <b>Departamento:</b> {{ $asignacionmovil->depto }}.
                </td>
			</tr>
		</tbody>
	</table>
</div>
@endsection

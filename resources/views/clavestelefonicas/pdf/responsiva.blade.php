@extends('layouts.pdf')

@section('documento')
<p style="text-align: center; font-size: 12px;"><u><b>CARTA RESPONSIVA DE CLAVE PERSONAL PARA REALIZAR LLAMADAS
            TELEFÓNICAS</b></u></p>

Usuario: {{ $asignacionclafe->nombre}}<br>
No. de Nómina: {{ $asignacionclafe->nomina }}<br>
Departamento: {{ $asignacionclafe->depto }}<br>

<p>Recibí por parte del departamento de Informática una clave personal, la cual me habilita para realizar las llamadas
    telefónicas que se señalan a continuación:</p>

<p>Marcar con (X) el tipo de servicios habilitados</p>

<ul>
    <li>[_] Llamadas Locales</li>
    <li>[_] Llamadas a números celulares</li>
    <li>[_] Llamadas LD Nacional</li>
    <li>[_] Llamadas LD Internacional</li>
</ul>

<p>Acepto el cumplimiento de los siguientes estatutos:</p>

<ol>
    <li>El uso de esta CLAVE es personal e intransferible. Por ninguna causa deberé hacerla de conocimiento de terceros
    </li>
    <li>Se recomienda memorizar su CLAVE para evitar que sea conocida por terceras personas. Por lo que a partir de
        ahora me responsabilizo de su confidencialidad, y en todo caso, del mal uso que se haga de esta clave.</li>
    <li>Entiendo que el uso del teléfono es estrictamente para fines laborales por tratarse de una herramienta de
        trabajo, y como tal, no debo emplearla para fines personales o ajenos al negocio.</li>
    <li>En caso de reemplazar las funciones de alguna persona NO usaré la clave de la persona reemplazada. Si la
        cobertura de mi CLAVE no es adecuada para cubrir las actividades, deberé solicitar una ampliación de cobertura.
    </li>
    <li>Acepto revisar el informe de uso telefónico mensual con mi jefe para constatar el uso adecuado de esta
        herramienta de trabajo.</li>
    <li>En caso de cambio de sucursal o departamento notificare al departamento de informática para hacer el ajuste
        pertinente.</li>
    <li>He leído en su totalidad el contenido de este documento, aceptando todos los estatutos.</li>
</ol>
<br>
<br>
<br>
<br>
<div class='centerTable'>
    <table style="text-align:center;" width="70%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
            <tr height="300px">
                <td>____________________________</td>
                <td>____________________________</td>
            </tr>
            <tr>
                <td>
                    <p>{{ $asignacionclafe->nombre}}<br>FIRMA</p>
                </td>
                <td>
                    <p>NOMBRE Y FIRMA<br>GERENTE DE ÁREA</p>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<p style="text-align: right;">Clave asignada: <b>{{ $asignacionclafe->clave }}</b></p>
------------------------------------------------------------------------------------------------------------------------------------------------------------<br>
<p>La CLAVE que aparece en la parte inferior de este documento te permitirá realizar las siguientes llamadas
    telefónicas:</p>

<p>Las Casillas señaladas con (X) indican la habilitación del servicio:</p>

<ul>
    <li>[_] Llamadas Locales</li>
    <li>[_] Llamadas a números celulares</li>
    <li>[_] Llamada LD Nacional</li>
    <li>[_] Llamada LD Internacional</li>
</ul>

<p style="font-size: 11px;">El uso de tu CLAVE te permitirá tener acceso a la cobertura antes descrita, desde cualquier teléfono. La manera de
    introducir tu CLAVE es: <b>9 + Número Telefónico al que deseas comunicarte + clave + signo #</b></p>

<p style="font-size: 11px;">Te recordamos que <b>el uso de la CLAVE es personal e intransferible</b>, su confidencialidad será tu responsabilidad de
    ahora en adelante, por lo que es recomendable memorizarlo y nunca anotarlo para evitar que alguna otra persona lo
    utilice.</p>

<p style="text-align: right;">Clave asignada: <b>{{ $asignacionclafe->clave }}</b></p>
@endsection

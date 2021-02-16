<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Persona</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <style>
        
        @media print {
        .pagebreak {
            clear: both;
            page-break-after: always;
        }
    }
    </style>
</head>

<body>
    <header>
        <div class="container mx-auto p-12">
            <div class="flex justify-between items-center">
                <p class="font-medium text-xl text-black">
                    {{ strtoupper(nombreFundacion()) }}
                </p>
            </div>
        </div>
    </header>
    <main>
        <div class="container mx-auto py-16 px-16">
            <p class="font-bold text-2xl text-center mb-4">Datos personales</p>
            <div class="flex justify-end">
                <div>
                    {!! QrCode::size(100)->generate(route('pdf.persona',encrypt($persona->id))); !!}
                </div>
            </div>
            <div class="flex items-center gap-6">
                <div class="flex-1">
                    <h2>Documento: <p class="text-md font-bold">{{ $persona->tipo_documento }} - {{ $persona->nro_documento ?? 'N/T' }}</p></h2>
                    <h2>Nombres: <p class="text-md font-bold">{{ $persona->nombres }}</p></h2>
                    <h2>Apellido Materno: <p class="text-md font-bold">{{ $persona->apelido_materno ?? 'N/T' }}</p></h2>
                    <h2>Dirección: <p class="text-md font-bold">{{ $persona->direccion ?? 'N/T' }}</p></h2>
                    <h2>Estatus: <p class="text-md font-bold">{{ $persona->status == 1 ? 'Habilitado' : 'Inhabilitado' }}</p></h2>
                </div>
                <div class="flex-1">
                    <h2>País de origen: <p class="text-md font-bold">{{ $persona->pais_origen }}</p></h2>
                    <h2>Estado civil: <p class="text-md font-bold">{{ $persona->estado_civil }}</p></h2>
                    <h2>Fecha de nacimiento: <p class="text-md font-bold">{{ $persona->fecha_nac }} ({{ \Carbon\Carbon::parse($persona->fecha_nac)->age }})</p></h2>
                    <h2>Nivel de instrucción: <p class="text-md font-bold">{{ $persona->nivel_instruccion ?? 'N/T' }}</p></h2>
                    <h2>Observaciones: <p class="text-md font-bold">{{ $persona->observaciones ?? 'N/T' }}</p></h2>
                </div>
            </div>
            <p class="font-bold text-2xl text-center mb-4 mt-4">Parentescos</p>
            <div class="grid grid-cols-3 gap-4">
                @forelse($persona->parentescos as $pa)
                <div>
                    <p class="font-medium text-lg mb-4 underline ">{{ $pa->parentesco }}</p>
                    <p class="text-md font-bold">{{ $pa->user->nombres }} | {{ $pa->user->nro_documento ?? 'N/T' }}</p>
                </div>
                @empty
                    <h2>N/T</h2>
                @endforelse
            </div>
            <p class="font-bold text-2xl text-center mb-4">Situaciones</p>
            <div class="flex gap-6 justify-center">
                <div class="flex-1">
                    <p class="font-medium text-lg mb-4">Situación Morbida</p>
                    @forelse($persona->s_morbida as $s)
                        <p class="text-md font-bold">{{ $s->situacion->nombre }}</p>
                    @empty
                        <h2>N/T</h2>
                    @endforelse
                    <h2>Observaciones: <p class="text-md font-bold">{{ $persona->ob_situacion_m ?? 'N/T' }}</p></h2>
                </div>
                <div class="flex-1">
                    <p class="font-medium text-lg mb-4">Situación Profesional</p>
                    @forelse($persona->s_profesional as $s)
                        <p class="text-md font-bold">{{ $s->situacion->nombre }}</p>
                    @empty
                        <h2>N/T</h2>
                    @endforelse
                    <h2>Observaciones: <p class="text-md font-bold">{{ $persona->ob_situacion_p ?? 'N/T' }}</p></h2>
                </div>
                <div class="flex-1">
                    <p class="font-medium text-lg mb-4">Situación Social</p>
                    @forelse($persona->s_social as $s)
                        <p class="text-md font-bold">{{ $s->situacion->nombre }}</p>
                    @empty
                        <h2>N/T</h2>
                    @endforelse
                    <h2>Observaciones: <p class="text-md font-bold">{{ $persona->ob_situacion_s ?? 'N/T' }}</p></h2>
                </div>
            </div>
            <div class="pagebreak"> </div>
            <p class="font-bold text-2xl text-center mb-4 mt-2">Anexos</p>
            <div class="grid grid-cols-3 gap-4">
                @forelse($persona->anexos as $a)
                <div>
                    <img class="h-32 w-32" src="{{ asset('storage/'.$a->foto) }}">
                    <h2>Nombre: <p class="text-md font-bold">{{ $persona->nombre ?? 'N/T' }}</p></h2>
                    <h2>Fecha de experación: <p class="text-md font-bold">{{ $persona->fecha_exp ?? 'N/T' }}</p></h2>
                    <h2>Descripción: <p class="text-md font-bold">{{ $persona->descripcion ?? 'N/T' }}</p></h2>
                </div>
                @empty
                    <h2>N/T</h2>
                @endforelse
            </div>
        </div>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        (function(a) {
            (jQuery.browser = jQuery.browser || {}).mobile = /(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4))
            })(navigator.userAgent || navigator.vendor || window.opera);
            if(!jQuery.browser.mobile){
            window.print();
                    setTimeout("closePrintView()", 4000);
            }
            function closePrintView() {
            close();
                }
    </script> 
</body>

</html>
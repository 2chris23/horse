@php($horses = isset($horses)?$horses:null)
@php($stud = isset($stud)?$stud:\Auth::user()->Yeguada())
<table class="currentTable" border="0"
       align="center" width="100%" cellspacing="0" cellpadding="0">
    <tbody>
    <tr>
        <td bgcolor="#ffffff" align="center">
            <table class="table600" border="0" width="600" cellspacing="0" cellpadding="0">
                <tbody>
                {{--
                <tr>
                    <td style="font-size: 1px; line-height: 50px;" height="50">&nbsp;</td>
                </tr>
                --}}
                @php($pasada = 0)
                @for($i = 0;$i<count($horses);$i++)


                    @php
                        /*@foreach($horses as $k => $v)
                        @endforeach
                        */
                $v = $horses[$i];


                            $s = ($i%3) ;
                        if($s == 2){
                        $pasada = 1;
                        }elseif($s ==0){
                        $pasada = 0;
                        }else{
                        $pasada = 2;}

                        $raza = trans('horse.raza.'.$v->raza);
                        $sexo = trans('horse.sex.'.$v->sex);
                        $edad = trans('horse.sex.'.$v->sex);
                        $color = $v->getColorString();


                        $descripcion=$raza."<br>";
                        $alzada = $v->getRaisedFormat();
                        if($alzada != 0) {
                            $descripcion.= $alzada ;
                        }
                        $edad = $v->getAge();
                        $mes = $v->getAgeMonth();

                        if($edad!=0){
                                    $descripcion .= ", " .trans('horse.years',['ano'=>$edad]);
                                }else{
                                    $descripcion .= ", " .trans('horse.mes',['mes'=>$mes]);
                                }

                        if(!empty($color)){
                            $descripcion .= '<br>'.$color ;
                        }
                        $tocubri= $v->tocubri;
                        if(!empty($tocubri)){
                        $cubri= Funciones::AjustarNumeroMil($v-> ObtenPrecioCubricionMoneda()). " ".$v->getSimboloMoneda();
                            $descripcion .= ', '.trans('horse.text.cubricion') ." $cubri";
                        }
                        $tosold = $v->tosold;
                        if($tosold != 0) {
                            $sold = $v->sold;
                            if($sold !=1 ){
                                if($v->price !=0){

                                    $precio = Funciones::AjustarNumeroMil($v->ObtenPrecioMonedaMill())." ".$v->getSimboloMoneda() ;/* " €";*/
                                    /*$precio =Funciones::AjustarNumeroMil($v->getPrice())." €";*/
                                    $descripcion.= ', '. trans('portal.price') ." $precio";
                                }else{
                                    $descripcion.= ', '.trans('users.pricecheck');
                                }
                            }else{
                                $descripcion .=  ', '.trans('users.sold');
                            }
                        }
                        $linkcaballo = route('MyHorseDetailed',['stud'=>$stud->slug,'horse'=>$v->slug]);
                        $foto = $v->getPhotoFirstModel();
                        if(!empty($foto)){
                            $foto = $foto->getUrl();
                        }else{
                            $foto = null;
                        }
                        //'c_des'=>$v->getDescripcion(),
                    @endphp
                    @if($s==0 and $pasada==0)
                        <tr>
                            @endif
                            <td>


                                @include('backend.Masivo.saturno.t-varios',[
                                                'img'=>$foto,
                                                'nombre'=>$v->getName(),
                                                'alt'=>$v->getName(),
                                                'link'=>$linkcaballo,

                                                'c_des'=>$descripcion,
                                ])

                            </td>
                            @if($s==0 and $pasada==1)
                        </tr>
                    @endif
                @endfor
                <tr>
                    <td style="font-size: 1px; line-height: 1px;" height="20">&nbsp;</td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>

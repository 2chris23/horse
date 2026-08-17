@php
$titulo = (isset($titulo))?$titlulo:null;
$contenido = (isset($contenido))?$contenido:null;
        @endphp

        <div class="card">
            <div class="card-block">
                @if(!empty($titulo))
                <div class='card-header bg-white '>
                    {!! $titulo !!}
                </div>
                @endif
                <div class="row">
                    <div class="col-lg-12 m-t-25">
                        <div class="row">
                            <div class="col-6">
                                <div class="col-md-6 text-xs-center">
                                    <div class="form-group">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumb_zoom zoom admin_img_width"
                                                 style=" border: 1px black solid; ">
                                                <img src="{!! $stud->getLogo() !!}"
                                                     alt="{{$stud->getName() }}"
                                                     style="    min-height: 150px; width: auto;">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumb_zoom zoom admin_img_width"></div>
                                            <div class="btn_file_position">
                                <span class="btn btn-primary btn-file">
                                    <span class="fileinput-new">Cambiar la imagen</span>
                                    <span class="fileinput-exists">Cambiar</span>
                                    <input type="file" name="Changefile">
                                </span>
                                                <a href="#" class="btn btn-warning fileinput-exists"
                                                   data-dismiss="fileinput">Eliminar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <table class="table" id="users">
                                    <tr>
                                        <td>Nombre</td>
                                        <td class="inline_edit">
                                        <span class="editable" data-title="Edit User Name">
                                            {{ $stud->getName() }}
                                            </span>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Telefono 1</td> {{-- Hacerlos dinamicos --}}
                                        <td>
                                                <span class="editable"
                                                      data-title="Edit Phone Number">{{$stud->getPhone1()}}</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Telefono 2</td> {{-- Hacerlos dinamicos --}}
                                        <td>
                                                <span class="editable"
                                                      data-title="Edit Phone Number">{{$stud->getPhone2()}}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Telefono 3</td> {{-- Hacerlos dinamicos --}}
                                        <td>
                                                <span class="editable"
                                                      data-title="Edit Phone Number">{{$stud->getPhone3()}}</span>
                                        </td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php

namespace App\Http\Controllers;

use App\Models\Aplicante;
use App\Models\Horse;
use App\Models\Marcaagua;
use App\Models\Photo;
use App\Models\Stud;
use App\Models\User;
use Carbon\Carbon;
use File;
use Illuminate\Http\Request;
use Illuminate\Http\Response as IlluminateResponse;
use Intervention\Image\Facades\Image;
use League\Flysystem\FileExistsException;
use Storage;
use function array_push;
use function dd;
use function is_array;
use function public_path;
use function strtolower;

//use Image;
//use Intervention\Image\Exception\NotSupportedException;


class FileController extends Controller
{
    //

    public function __construct(Request $request = null, $user_id = null)
    {
        defined("PUBLICO") ? null : define("PUBLICO", __DIR__);
        /*Cambia la carpeta de almacelamiento*/
        /*public_path() . '/uploads*/
        /*storage_path('app') Solo de la app*/
        /*storage_path('app/public') Acceso Publico*/

        $this->Publico = PUBLICO . '/uploads';

        //$this->Pivado = storage_path('app');
        $this->Pivado = $this->Publico;

        $this->req = $request;
        $this->user_id = $user_id;

    }

    public static function Almacenar($file, $folder = null, $nombre = null)
    {
        if (empty($file) or empty($folder) or empty($nombre)) return null;
        $nombre = $nombre . $file->getExtension();
        Storage::disk(\Config::get('aplication.almacenamiento'))->put($nombre, File::get($file));
        $target = $folder . DS . $nombre;
        try {
            Storage::move($nombre, $target);
        } catch (FileExistsException $e) {
            FileController::Borrar_File($nombre);
            $s = false;
            if (File::exists($file)) {
                $s = true;
            }
            if ($s == true) {
                $nombre = null;
            } else {
                Storage::move($nombre, $target);
            }

        }
        return $nombre;
    }

    public static function MarcaAgua($image, $fileName, $destinationPath, $marca)
    {
        //$image = $request->file('banner');
        dd($image);
        $slug = "bgh-dsd";
        $key = 0;
        //$fileName = "img-".$slug."-".$key. "." . strtolower($image->getClientOriginalExtension());
        //$destinationPath = $path;

        //Upload Images One After the Order into folder
        $img = Image::make($image->getRealPath());
        $watermark = Image::make(public_path('/img/logo.png'));
        $img->insert($watermark, 'bottom-right', 10, 10);
        $img->save($destinationPath . '/' . $fileName);
        //$move = $image->move($destinationPath, $fileName);
    }

    public function imagen_caballo($img, $idcaballo, $name)
    {
        //$type = strtolower($request->type);
        $user = \Auth::user();
        //$img = $file->file('file');

        $cliente = [
            "mime" => '',
            "ext" => '',
            "name" => '',
        ];
        if (empty($img)) {
            return null;
        }

        if (!empty($img) and !is_array($img)) {
            $cliente = [
                "mime" => $img->getClientMimeType(),
                "ext" => $img->getClientOriginalExtension(),
                "name" => $img->getClientOriginalName(),

            ];
        }
        //$id = $request->id;
        /*Almacenar Logo para yeguada*/
        $horse = Horse::find($idcaballo);

        //$stud = Stud::find(2);
        $sal['url'] = '';
        $sal['sms'] = "No existe el animal";
        $sal['status'] = 400;

        if (!empty($horse->toArray())) {
            if (is_array($img)) {
                $f = \Config::get('aplication.fotohorse');
                $folder = "uploads" . DS . $f;
                foreach ($img as $k => $v) {
                    $cliente = [
                        "mime" => $v->getClientMimeType(),
                        "ext" => $v->getClientOriginalExtension(),
                        "name" => $v->getClientOriginalName(),
                    ];

                    $nombre = self::random_str() . "." . $cliente['ext'];
                    $d = $v->storeAs($folder, $nombre, 'local');
                    $sal['url'] = url($folder . "/" . $nombre);
                    $sal['sms'] = "Imagen almacenada";
                    $sal['status'] = 200;
                    $horse->SaveHorseImage($nombre, $v->getSize())->push();
                }
            } else {
                $f = \Config::get('aplication.fotohorse');
                $folder = "uploads" . DS . $f;
                $nombre = self::random_str() . "." . $cliente['ext'];
                $d = $img->storeAs($folder, $nombre, 'local');
                $sal['url'] = url($folder . "/" . $nombre);
                $sal['sms'] = "Imagen almacenada";
                $sal['status'] = 200;
                $horse->SaveHorseImage($nombre, $img->getSize())->push();
            }
            //$stud->setLogo($nombre)->push();
            //$p = new Photo();
            //$p->setName($nombre)->setType($type)->setTableid($stud->id)->setUrl($sal['url'])->setCreatedAt($user->id)->push();
            return Functions::RetornaJson($sal);
        } else {


            return Functions::RetornaJson($sal);
        }

    }

    public function random_str($nombre = null)
    {
        $length = 20;
        $repeat = rand(3, 5);
        $tiempo = Carbon::now()->toW3cString();
        $randomString = "";
        for ($i = 0; $i < $repeat; $i++) {
            //$randomString = $randomString . $tiempo . $nombre . str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ");
            $randomString = $randomString . str_shuffle(
                    "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"
                );
            $randomString = substr(sha1(sha1($randomString)), 0, $length);
        }

        return $randomString;
    }

    public function imagen_slider($img, $t1 = '', $t2 = '')
    {


        $t = \Session::get('img_slider_up');
        if (!empty($t)) return null;
        \Session::flash('img_slider_up', 1);
        //$type = strtolower($request->type);
        $user = \Auth::user();
        //$img = $file->file('file');
        $alt = "jpg";
        $cliente = [
            "mime" => '',
            "ext" => '',
            "name" => '',
        ];
        if (empty($img)) {
            return null;
        }

        if (!empty($img) and !is_array($img)) {
            if ($img->getSize() < 10) return null;
            $cliente = [
                "mime" => $img->getClientMimeType(),
                "ext" => $img->getClientOriginalExtension(),
                "name" => $img->getClientOriginalName(),
            ];
        }


        $stud = $user->Yeguada();
        $sal['url'] = '';
        $sal['sms'] = "No tienes una Yeguada aun";
        $sal['status'] = 400;

        if (!empty($stud->toArray())) {
            $f = \Config::get('aplication.fotoslider');
            $folder = "uploads" . DS . $f;
            if (is_array($img)) {
                $vs = 0;
                foreach ($img as $q => $w) {

                    if ($vs == 0) {
                        if ($w->getSize() == 0) return null;
                        $vs = 1;

                        $cliente = [
                            "mime" => $w->getClientMimeType(),
                            "ext" => $w->getClientOriginalExtension(),
                            "name" => $w->getClientOriginalName(),
                        ];
                        $cliente['ext'] = (empty($cliente['ext'])) ? $alt : $cliente['ext'];
                        $nombre = self::random_str() . "." . $cliente['ext'];
                        $d = $w->storeAs($folder, $nombre, 'local');
                        $photo = new Photo();
                        $photo->SaveSliderImage($nombre, $stud->id, $t1, $t2)->push();
                        $sal['url'] = url($folder . "/" . $nombre);
                        $sal['sms'] = "Imagen almacenada";
                        $sal['status'] = 200;
                    }
                }
            } else {

                $cliente['ext'] = (empty($cliente['ext'])) ? $alt : $cliente['ext'];
                $nombre = self::random_str() . "." . $cliente['ext'];
                $photo = new Photo();
                $sal['url'] = url($folder . "/" . $nombre);
                $sal['sms'] = "Imagen almacenada";
                $sal['status'] = 200;
                $photo->SaveSliderImage($nombre, $stud->id, $t1, $t2)->push();
            }
            return $nombre;
            //return Functions::RetornaJson($sal);
        } else {
            return "No tienes yeguada";
            //return Functions::RetornaJson($sal);
        }

    }

    public function imagen_gallery($img)
    {
        //$type = strtolower($request->type);
        $user = \Auth::user();
        //$img = $file->file('file');
        $cliente = [
            "mime" => '',
            "ext" => '',
            "name" => '',
        ];

        if (empty($img)) {
            return null;
        }

        if (!empty($img)) {
            $cliente = [
                "mime" => $img->getClientMimeType(),
                "ext" => $img->getClientOriginalExtension(),
                "name" => $img->getClientOriginalName(),
            ];
        }


        $stud = $user->Yeguada();
        $sal['url'] = '';
        $sal['sms'] = "No tienes una Yeguada aun";
        $sal['status'] = 400;
        if (!empty($stud->toArray())) {
            $f = \Config::get('aplication.fotoyeguada');
            $folder = "uploads" . DS . $f;
            $nombre = self::random_str() . "." . $cliente['ext'];
            $d = $img->storeAs($folder, $nombre, 'local');
            $sal['url'] = url('uploads/' . $f . "/" . $nombre);
            $sal['sms'] = "Imagen almacenada";
            $sal['status'] = 200;
            $p = new Photo();
            $p->SaveGalery($nombre, $stud->id)->setCreatedBy(\Auth::user()->id)->push();
            //$p->SaveInstalationsImage($nombre,$stud->id)->setCreatedBy(\Auth::user()->id)->push();
            return $nombre;

        } else {
            return '';
        }

    }

    public function imagen_instalations($img, $stud)
    {
        //$type = strtolower($request->type);
        //$user = \Auth::user();
        //$img = $file->file('file');
        $cliente = [
            "mime" => '',
            "ext" => '',
            "name" => '',
        ];

        if (empty($img)) {
            return null;
        }

        if (!empty($img)) {
            $cliente = [
                "mime" => $img->getClientMimeType(),
                "ext" => $img->getClientOriginalExtension(),
                "name" => $img->getClientOriginalName(),
            ];
        }
        //$stud = Stud::find($stud_id);

        //$stud = $user->Yeguada();
        $sal['url'] = '';
        $sal['sms'] = "No tienes una Yeguada aun";
        $sal['status'] = 400;
        if (!empty($stud->toArray())) {
            $f = \Config::get('aplication.fotoyeguada');
            $folder = "uploads" . DS . $f;
            $nombre = self::random_str() . "." . $cliente['ext'];
            $d = $img->storeAs($folder, $nombre, 'local');
            $sal['url'] = url('uploads/' . $f . "/" . $nombre);
            $sal['sms'] = "Imagen almacenada";
            $sal['status'] = 200;
            $p = new Photo();
            //$p->SaveGalery($nombre,$stud->id)->setCreatedBy(\Auth::user()->id)->push();
            $p->SaveInstalationsImage($nombre, $stud->id)->setCreatedBy(\Auth::user()->id)->push();

            return $nombre;

        } else {
            return '';
        }

    }

    public function imagen_front($img, $stud)
    {
        //$type = strtolower($request->type);
        //$user = \Auth::user();
        //$img = $file->file('file');
        if (is_array($img)) {
            $img = $img[0];
        }

        $cliente = [
            "mime" => '',
            "ext" => '',
            "name" => '',
        ];

        if (empty($img)) {
            return null;
        }

        if (!empty($img)) {
            $cliente = [
                "mime" => $img->getClientMimeType(),
                "ext" => $img->getClientOriginalExtension(),
                "name" => $img->getClientOriginalName(),
            ];
        }
        //$stud = Stud::find($stud_id);

        //$stud = $user->Yeguada();
        $sal['url'] = '';
        $sal['sms'] = "No tienes una Yeguada aun";
        $sal['status'] = 400;
        if (!empty($stud->toArray())) {
            $f = \Config::get('aplication.fotofront');
            $folder = "uploads" . DS . $f;
            $nombre = self::random_str() . "." . $cliente['ext'];
            $d = $img->storeAs($folder, $nombre, 'local');

            $sal['url'] = url('uploads/' . $f . "/" . $nombre);
            $sal['sms'] = "Imagen almacenada";
            $sal['status'] = 200;
            $ds = $stud->getFront();

            if (!empty($ds)) {
                $ds->Borrar();
            }
            $p = new Photo();
            //$p->SaveGalery($nombre,$stud->id)->setCreatedBy(\Auth::user()->id)->push();
            $p->SaveFrontImage($nombre, $stud->id)->setCreatedBy(\Auth::user()->id)->push();
            return $nombre;
        } else {
            return '';
        }

    }

    public function imagen_logo($img, $stud_id = null)
    {
        //$type = strtolower($request->type);
        $user = \Auth::user();
        if ($user->isAdm() == true) {
            $stud = Stud::find($stud_id);
            $user = User::find($stud->getUsersId());
        }
        //$img = $file->file('file');
        $cliente = [
            "mime" => '',
            "ext" => '',
            "name" => '',
        ];
        $img = $img[0];
        if (empty($img)) {
            return null;
        }

        if (!empty($img)) {
            $cliente = [
                "mime" => $img->getClientMimeType(),
                "ext" => $img->getClientOriginalExtension(),
                "name" => $img->getClientOriginalName(),
            ];
        }


        $stud = $user->Yeguada();
        $sal['url'] = '';
        $sal['sms'] = "No tienes una Yeguada aun";
        $sal['status'] = 400;
        if (!empty($stud->toArray())) {
            $f = \Config::get('aplication.fotologo');
            $fa = \Config::get('aplication.favicon');
            $folder = "uploads" . DS . $f;
            $folder2 = "uploads" . DS . $fa;
            $logo = $stud->getLogoClear();
            $logo2 = $stud->getFav();

            if (!empty($logo)) {
                FileController::Borrar_File(public_path($folder . DS . $logo));
            }
            if (!empty($logo2)) {
                FileController::Borrar_File(public_path($folder2 . DS . $logo2));
            }
            $rnd = self::random_str();
            $nombre = $rnd . "." . $cliente['ext'];
            $nombrefa = "$rnd";
            $tofav = $img;
            $d = $img->storeAs($folder, $nombre, 'local');
            $dfa = $tofav->storeAs($folder2, $nombrefa, 'local');
            $dga = Image::make($dfa)->widen(32)->save($dfa);
            File::move($dfa, "$dfa.ico");
            $stud->setFav($nombrefa . ".ico")->push();
            $sal['url'] = url($folder . "/" . $nombre);
            $sal['sms'] = "Imagen almacenada";
            $sal['status'] = 200;
            $stud->setLogo($nombre)->push();
            //$p = new Photo();
            //$p->setName($nombre)->setType($type)->setTableid($stud->id)->setUrl($sal['url'])->setCreatedAt($user->id)->push();
            return Functions::RetornaJson($sal);
        } else {


            return Functions::RetornaJson($sal);
        }

    }

    public function Borrar_File($file)
    {

        if (File::exists($file)) {
            \Log::critical("\n\n\t\tBorrando el archivo $file\n\n");
            File::delete($file);
        }
        return null;

    }

    public function Imagen(Request $request)
    {

        $imgel = [];

        if (empty($request->marca)) {
            $marca = 0;
        } else {
            $marca = $request->marca;
        }
        /*
          https://stackoverflow.com/questions/11418594/which-is-the-best-php-method-to-reduce-the-image-size-without-losing-quality
          */
        $type = strtolower($request->type);
        $user = \Auth::user();
        if ($user->isAdm() and !empty($request->stud_id)) {
            $stud = Stud::find($request->stud_id);
            $user = User::find($stud->getUsersId());
        }

        $img = $request->file('inputfa');
        $cliente = [
            "mime" => '',
            "ext" => '',
            "name" => '',
        ];


        if (!empty($img) and !is_array($img)) {
            $cliente = [
                "mime" => $img->getClientMimeType(),
                "ext" => $img->getClientOriginalExtension(),
                "name" => $img->getClientOriginalName(),
            ];
        }

        /*Guarda imagenes para la instalacion*/
        if ($type == "stud") {
            /*Almacenar imagen para yeguada*/
            $stud = $user->Yeguada();
            //$stud = Stud::find(2);
            $sal['url'] = '';
            $sal['sms'] = "No tienes una Yeguada aun";
            $sal['status'] = 400;
            if (!empty($stud->toArray())) {
                $f = \Config::get('aplication.fotoyeguada');
                $folder = "uploads" . DS . $f;
                if (is_array($img)) {
                    foreach ($img as $s => $r) {
                        $cliente = [
                            "mime" => $r->getClientMimeType(),
                            "ext" => $r->getClientOriginalExtension(),
                            "name" => $r->getClientOriginalName(),
                        ];

                        $nombre = self::random_str() . "." . $cliente['ext'];
                        $d = $r->storeAs($folder, $nombre, 'local');

                    }
                } else {
                    $img = $request->file('file');
                    $cliente = [
                        "mime" => $img->getClientMimeType(),
                        "ext" => $img->getClientOriginalExtension(),
                        "name" => $img->getClientOriginalName(),
                    ];
                    $nombre = self::random_str() . "." . $cliente['ext'];
                    $d = $img->storeAs($folder, $nombre, 'local');
                    array_push($imgel, url($folder . '/' . $nombre));
                }

                $sal['url'] = url('uploads/' . $f . "/" . $nombre);
                $sal['sms'] = "Imagen almacenada";
                $sal['status'] = 200;
                $p = new Photo();
                //$p->SaveGalery($nombre,$stud->id)->setCreatedBy(\Auth::user()->id)->push();
                $p->SaveInstalationsImage($nombre, $stud->id)->setCreatedBy(\Auth::user()->id)->push();
                if ($marca == 1) {
                    $p->PonerMarca();
                }
                $id = $p->id;
                $imagen = $p->getUrl();
                $titulo = $p->getUrl();
                $sal['el'] = view('backend.common.galleryimage', compact('titulo', 'id', 'imagen'))->render();
                return Functions::RetornaJson($sal);
            } else {

                return Functions::RetornaJson($sal);
            }


        }
        /*Guarda imagenes De galeria*/
        if ($type == "gallery") {
            /*Almacenar imagen para yeguada*/
            $stud = $user->Yeguada();
            //$stud = Stud::find(2);
            $sal['url'] = '';
            $sal['sms'] = "No tienes una Yeguada aun";
            $sal['status'] = 400;
            if (!empty($stud->toArray())) {
                $f = \Config::get('aplication.fotoyeguada');
                $folder = "uploads" . DS . $f;
                if (is_array($img)) {
                    foreach ($img as $s => $r) {
                        $cliente = [
                            "mime" => $r->getClientMimeType(),
                            "ext" => $r->getClientOriginalExtension(),
                            "name" => $r->getClientOriginalName(),
                        ];
                        $nombre = self::random_str() . "." . $cliente['ext'];
                        $d = $r->storeAs($folder, $nombre, 'local');
                        array_push($imgel, url($folder . '/' . $nombre));
                    }
                } else {
                    $img = $request->file('file');
                    $cliente = [
                        "mime" => $img->getClientMimeType(),
                        "ext" => $img->getClientOriginalExtension(),
                        "name" => $img->getClientOriginalName(),
                    ];
                    $nombre = self::random_str() . "." . $cliente['ext'];
                    $d = $img->storeAs($folder, $nombre, 'local');
                    array_push($imgel, url($folder . '/' . $nombre));
                }


                $sal['url'] = url('uploads/' . $f . "/" . $nombre);
                $sal['sms'] = "Imagen almacenada";
                $sal['status'] = 200;
                $p = new Photo();
                $p->SaveGalery($nombre, $stud->id)->setCreatedBy(\Auth::user()->id)->push();

                if ($marca == 1) {
                    $p->PonerMarca();
                }
                //$p->SaveInstalationsImage($nombre,$stud->id)->setCreatedBy(\Auth::user()->id)->push();
                $id = $p->id;
                $imagen = $p->getUrl();
                $titulo = $p->getUrl();
                $sal['el'] = view('backend.common.galleryimage', compact('titulo', 'id', 'imagen'))->render();
                return Functions::RetornaJson($sal);
            } else {
                return Functions::RetornaJson($sal);
            }


        }
        /*Guarda El logo*/
        if ($type == "logo") {
            /*Almacenar Logo para yeguada*/
            $stud = $user->Yeguada();

            //$stud = Stud::find(2);
            $sal['url'] = '';
            $sal['sms'] = "No tienes una Yeguada aun";
            $sal['status'] = 400;

            if (!empty($stud->toArray())) {
                $f = \Config::get('aplication.fotologo');
                $folder = "uploads" . DS . $f;
                $logo = $stud->getLogoClear();
                if (!empty($logo)) {
                    self::Borrar_File(public_path($folder . DS . $logo));
                }
                $nombre = self::random_str() . "." . $cliente['ext'];
                $d = $img->storeAs($folder, $nombre, 'local');
                array_push($imgel, url($folder . '/' . $nombre));
                $sal['url'] = url($folder . "/" . $nombre);
                $sal['sms'] = "Imagen almacenada";
                $sal['status'] = 200;
                $stud->setLogo($nombre)->push();
                //$p = new Photo();
                //$p->setName($nombre)->setType($type)->setTableid($stud->id)->setUrl($sal['url'])->setCreatedAt($user->id)->push();
                /*
                $id = $p->id;
                $imagen = $p->getUrl();
                $titulo = $p->getUrl();
                        $sal['el'] = view('backend.common.galleryimage', compact('titulo', 'id', 'imagen'))->render();
                        */
                return Functions::RetornaJson($sal);
            } else {


                return Functions::RetornaJson($sal);
            }


        }
        /*Guarda Foto de caballo*/
        if ($type == "horse") {
            \Log::critical('Intentando revisar caballo');
            \Log::critical("usuario " . \Auth::user()->id);
            $id = $request->id;
            /*Movida a imagen_caballo*/
            $sal['url'] = '';
            $sal['sms'] = "Funcion movida";
            $sal['status'] = 400;
            //return Functions::RetornaJson($sal);
            /*Almacenar Logo para yeguada*/
            $horse = Horse::find($id);

            //$stud = Stud::find(2);
            $sal['url'] = '';
            $sal['sms'] = "No existe el animal";
            $sal['status'] = 400;
            $el = [];
            $ff = [];
            if (!empty($horse)) {
                $f = \Config::get('aplication.fotohorse');
                $folder = "uploads" . DS . $f;
                $img = $request->file('file');
                if (is_array($img)) {
                    foreach ($img as $s => $r) {
                        $cliente = [
                            "mime" => $r->getClientMimeType(),
                            "ext" => $r->getClientOriginalExtension(),
                            "name" => $r->getClientOriginalName(),
                        ];
                        $sd = Photo::where(['size' => $r->getSize(), 'type' => 4, 'tableid' => $horse->id])->first();
                        if (empty($sd)) {
                            $nombre = self::random_str() . "." . $cliente['ext'];
                            $d = $r->storeAs($folder, $nombre, 'local');
                            $f = $horse->SaveHorseImage($nombre, $r->getSize());
                            if ($marca == 1) {
                                $f->PonerMarca();
                            }
                            $f->push();
                            $t = Photo::where('name', $nombre)->first();
                            $ff[0] = self::HtmlFoto($t);
                        } else {
                            $ff[$s] = self::HtmlFoto($sd);
                            $sal['url'] = $sd->getUrl();
                            $sal['sms'] = "Imagen almacenada";
                            $sal['el'] = $ff;
                            $sal['status'] = 200;
                        }
                    }
                } else {
                    $img = $request->file('file');
                    if (!empty($img)) {
                        $cliente = [
                            "mime" => $img->getClientMimeType(),
                            "ext" => $img->getClientOriginalExtension(),
                            "name" => $img->getClientOriginalName(),
                        ];
                        $nombre = self::random_str() . "." . $cliente['ext'];
                        $sd = Photo::where(['size' => $img->getSize(), 'type' => 4, 'tableid' => $horse->id])->first();
                        if (empty($sd)) {
                            $d = $img->storeAs($folder, $nombre, 'local');
                            $f = $horse->SaveHorseImage($nombre, $img->getSize(), $img->getSize());
                            $f->push();

                            if ($marca == 1) {

                                $f->PonerMarca();
                            }

                            $sal['url'] = url($folder . "/" . $nombre);
                            $t = Photo::where('name', $nombre)->first();

                            $ff[0] = self::HtmlFoto($t);
                            $sal['el'] = $ff;
                            $sal['sms'] = "Imagen almacenada";
                            $sal['status'] = 200;
                        } else {
                            $ff[0] = self::HtmlFoto($sd);
                            $sal['url'] = $sd->getUrl();
                            $sal['el'] = $ff;
                            $sal['sms'] = "Imagen almacenada";
                            $sal['status'] = 200;
                        }
                    }
                }


                //$stud->setLogo($nombre)->push();
                //$p = new Photo();
                //$p->setName($nombre)->setType($type)->setTableid($stud->id)->setUrl($sal['url'])->setCreatedAt($user->id)->push();
                /*
                $id = $p->id;
                $imagen = $p->getUrl();
                $titulo = $p->getUrl();
                $sal['el'] = view('backend.common.galleryimage', compact('titulo', 'id', 'imagen'))->render();
                */
                return Functions::RetornaJson($sal);
            } else {


                return Functions::RetornaJson($sal);
            }


        }
        /*Guarda Foto de caballo*/
        if ($type == "slider") {

            $photo = new Photo();
            $stud = $user->Yeguada();
            $sal['url'] = '';
            $sal['sms'] = "No tienes una Yeguada aun";
            $sal['status'] = 400;

            if (!empty($stud->toArray())) {
                $f = \Config::get('aplication.fotoslider');
                $folder = "uploads" . DS . $f;
                $nombre = self::random_str() . "." . $cliente['ext'];
                $d = $img->storeAs($folder, $nombre, 'local');
                $photo = new Photo();
                $sal['url'] = url($folder . "/" . $nombre);
                $sal['sms'] = "Imagen almacenada";
                $sal['status'] = 200;
                $photo->SaveSliderImage($nombre, $stud->id)->push();

                if ($marca == 1) {
                    $photo->PonerMarca();
                }

                $id = $photo->id;
                $imagen = $photo->getUrl();
                $titulo = $photo->getUrl();
                $sal['el'] = view('backend.common.galleryimage', compact('titulo', 'id', 'imagen'))->render();
                return Functions::RetornaJson($sal);
            } else {
                return Functions::RetornaJson($sal);
            }


        }
        if ($type == "front") {
            $photo = new Photo();
            $stud = $user->Yeguada();
            $sal['url'] = '';
            $sal['sms'] = "No tienes una Yeguada aun";
            $sal['status'] = 400;

            if (!empty($stud->toArray())) {
                $f = \Config::get('aplication.fotofront');
                $folder = "uploads" . DS . $f;
                $old = $stud->getFront();
                if (!empty($old->id)) {
                    $photo = $stud->getFront();
                } else {
                    $photo = new Photo();
                }

                $nombre = self::random_str() . "." . $cliente['ext'];
                $d = $img->storeAs($folder, $nombre, 'local');

                $sal['url'] = url($folder . "/" . $nombre);
                $sal['sms'] = "Imagen almacenada";
                $sal['status'] = 200;
                $photo->SaveFrontImage($nombre, $stud->id)->push();
                if ($marca == 1) {
                    $photo->PonerMarca();
                }
                $id = $photo->id;
                $imagen = $photo->getUrl();
                $titulo = $photo->getUrl();
                $sal['el'] = view('backend.common.galleryimage', compact('titulo', 'id', 'imagen'))->render();
                return Functions::RetornaJson($sal);
            } else {
                return Functions::RetornaJson($sal);
            }


        }


        if ($type == "fb") {
            $photo = new Photo();
            $user = \Auth::user();
            $stud = $user->Yeguada();
            //dd($request->all());
            $img = $request->dro_fb;

            if (!empty($img)) {
                $img = $img[0];
            } else {
                return null;
            }

            $cliente = [
                "mime" => $img->getClientMimeType(),
                "ext" => $img->getClientOriginalExtension(),
                "name" => $img->getClientOriginalName(),
            ];
            $sal['url'] = '';
            $sal['sms'] = "No tienes una Yeguada aun";
            $sal['status'] = 400;

            if (!empty($stud->toArray())) {

                $f = \Config::get('aplication.facebook');
                $folder = "uploads" . DS . $f;
                $photo = new Photo();

                $nombre = self::random_str() . "." . $cliente['ext'];
                $d = $img->storeAs($folder, $nombre, 'local');

                $sal['url'] = url($folder . "/" . $nombre);
                $sal['sms'] = "Imagen almacenada";
                $sal['status'] = 200;
                $photo->SaveFacebook($nombre, $stud->id)->push();
                if ($marca == 1) {
                    $photo->PonerMarca();
                }
                $id = $photo->id;
                $imagen = $photo->getUrl();
                $titulo = $photo->getUrl();
                $sal['el'] = view('backend.common.galleryimage', compact('titulo', 'id', 'imagen'))->render();
                $sal['filepath'] = $photo->getFolder();
                $sal['name'] = $photo->getName();
                $sal['ext'] = $cliente['ext'];
                $sal['source'] = public_path() . DS . $photo->getFolder() . DS . $photo->getName();
                //\Log::critical(\GuzzleHttp\json_encode($sal));
                //return $sal;//aun no se implementa ajax
                return Functions::RetornaJson($sal);
            } else {
                return Functions::RetornaJson($sal);
            }


        }
        /*typep = 'logo';*/
        dd($request->all());
    }

    public function HtmlFoto(Photo $v = null)
    {
        if (empty($v)) return null;
        $t = "<div class=\"col-xs-12 col-sm-6 col-md-6 col-lg-3  m-t-20 \">";
        $t .= view('backend.common.galleryimagesinjs', ['titulo' => $v->getName(), 'id' => $v->id, 'imagen' => $v->getUrl()])->render();
        $t .= "</div>";
        return $t;

    }

    /*PARA IMAGENES http://albanafmeti.com/2016/optimize-images-using-intervention-in-laravel/*/

    public function renombrado($nombre)
    {
        //$test = Carbon::now()->timestamp . '-' . Functions::random_str($nombre) . "-" . $nombre;
        $extension = explode(".", $nombre);
        $test = $this->random_str($nombre);
        $eval = array(
            'entities/covers/',

        );
        // $s3 = AWS::createClient('s3');
        $ok = true;
        $test = $this->random_str($this->clear_name($test));
        // $name = $test.".".$extension[count($extension) - 1];
        $name = $test;
        /*Verificar si el archivo esta en amazon*/
        /*
         * if (Storage::disk('s3')->exists($test) == true) {
            $test = Functions::random_str(Functions::clear_name($test));
        }
        return $test . "." . $extension[count($extension) - 1];
    ANTERIOR
         * */
        if ($ok == true) {
            foreach ($eval as $dir) {
                $ok = true;
                /*
                try {
                    $result = $s3->getObject(
                        array(
                            'Bucket' => \Config::get('htn.Bucket'),
                            'Key' => $dir . $name,
                        )
                    );
                    $ok = false;
                } catch (S3Exception $e) {
                    /*REMOVER Y MODIFICAR PARA LOCAL* /
                    //archivo no existe
                    $ok = true;

                }
                */
            }
        } elseif ($ok == false) {
            $name = $this->renombrado($name);
        }

        return $name;
    }

    public function clear_name($nombre)
    {
        $nombre = strtr(
            $nombre,
            array(
                'Š' => 'S',
                'Ž' => 'Z',
                'š' => 's',
                'ž' => 'z',
                'Ÿ' => 'Y',
                'À' => 'A',
                'Á' => 'A',
                'Â' => 'A',
                'Ã' => 'A',
                'Ä' => 'A',
                'Å' => 'A',
                'Ç' => 'C',
                'È' => 'E',
                'É' => 'E',
                'Ê' => 'E',
                'Ë' => 'E',
                'Ì' => 'I',
                'Í' => 'I',
                'Î' => 'I',
                'Ï' => 'I',
                'Ñ' => 'N',
                'Ò' => 'O',
                'Ó' => 'O',
                'Ô' => 'O',
                'Õ' => 'O',
                'Ö' => 'O',
                'Ø' => 'O',
                'Ù' => 'U',
                'Ú' => 'U',
                'Û' => 'U',
                'Ü' => 'U',
                'Ý' => 'Y',
                'à' => 'a',
                'á' => 'a',
                'â' => 'a',
                'ã' => 'a',
                'ä' => 'a',
                'å' => 'a',
                'ç' => 'c',
                'è' => 'e',
                'é' => 'e',
                'ê' => 'e',
                'ë' => 'e',
                'ì' => 'i',
                'í' => 'i',
                'î' => 'i',
                'ï' => 'i',
                'ñ' => 'n',
                'ò' => 'o',
                'ó' => 'o',
                'ô' => 'o',
                'õ' => 'o',
                'ö' => 'o',
                'ø' => 'o',
                'ù' => 'u',
                'ú' => 'u',
                'û' => 'u',
                'ü' => 'u',
                'ý' => 'y',
                'ÿ' => 'y',
            )
        );
        $nombre = strtr(
            $nombre,
            array(
                'Þ' => 'TH',
                'þ' => 'th',
                'Ð' => 'DH',
                'ð' => 'dh',
                'ß' => 'ss',
                'Œ' => 'OE',
                'œ' => 'oe',
                'Æ' => 'AE',
                'æ' => 'ae',
                'µ' => 'u',
            )
        );
        $nombre = htmlentities($nombre);
        $nombre = htmlspecialchars($nombre);
        $nombre = preg_replace(array('/\s/', '/\.[\.]+/', '/[^\w_\.\-]/'), array('_', '.', ''), $nombre);

        return $nombre;
    }

    public function ImagenSmallVehiculo($image = 'vehiculo.jpg')
    {
        /*Tamaño pequeño de imagen de vehiculo*/
        $h = (320) / 2;
        $w = (240) / 2;
        $t = 'Small';
        $objetivo = (empty($objetivo)) ? \Config::get('aplication.FotoVehiculo') : $objetivo;
        $image = (empty($image)) ? 'perfil.jpg' : $image;
        $image = Functions::BuscarReemplazarString($image, "", url('uploads/' . $objetivo) . '/');
        return FileController::ProcesarImagen($image, $objetivo, $h, $w, $t);

    }

    public static function ProcesarImagen($Imagen = '', $Objetivo, $h, $w, $t)
    {
        /*Agrupa el tratamiento de imagenes*/


        $dir = PUBLICO . DS . "uploads" . DS . $Objetivo . DS . $t;
        $original = PUBLICO . DS . "uploads" . DS . $Objetivo . DS . $Imagen;
        $small = PUBLICO . DS . "uploads" . DS . $Objetivo . DS . $t . DS . $Imagen;


        (!(File::isDirectory($dir))) ? File::makeDirectory($dir) : null;
        if (File::exists($small)) {
            File::delete($small);
        };
        if (!(File::exists($small)) and (File::exists($original))) {
            /*
            try {

                Image::make($original)->resize($h, $w)->save($small)->insert($small);
            } catch (NotSupportedException $e) {
                if ($Imagen == 'perfil.jpg') $Imagen = 'perfil.jpg';
                if ($Imagen == 'vehiculo.jpg') $Imagen = 'vehiculo.jpg';
                \Log::critical("\n\n\n\nIMAGEN NO SOPORTADA\n\n\n\n");
            } catch (ErrorException $e) {
                if ($Imagen == 'perfil.jpg') $Imagen = 'perfil.jpg';
                if ($Imagen == 'vehiculo.jpg') $Imagen = 'vehiculo.jpg';
                \Log::critical("\n\n\n\nERROR DE LECTURA\n\n\n\n");
            }
            */
        } elseif (!(File::exists($original))) {
            if ($Imagen == 'perfil.jpg') $Imagen = 'perfil.jpg';
            if ($Imagen == 'vehiculo.jpg') $Imagen = 'vehiculo.jpg';
        };
        return $Imagen;
    }

    public function Existe($file)
    {
        $s = false;
        if (File::exists($file)) {
            $s = true;
        }
        return $s;
    }

    public function imagen_logo_admin($img)
    {
        $user = \Auth::user();
        $logo = Photo::AdminLogo($user->id)->first();

        $cliente = [
            "mime" => '',
            "ext" => '',
            "name" => '',
        ];
        $img = $img[0];
        if (empty($img)) {
            return null;
        }

        if (!empty($img)) {
            $cliente = [
                "mime" => $img->getClientMimeType(),
                "ext" => $img->getClientOriginalExtension(),
                "name" => $img->getClientOriginalName(),
            ];
        }


        //$stud = $user->Yeguada();
        $sal['url'] = '';
        $sal['sms'] = "No tienes una Yeguada aun";
        $sal['status'] = 400;
        $f = \Config::get('aplication.adminimage');
        //$f = 'adm';
        $folder = "uploads" . DS . $f;

        //$logon = $logo->name;
        if (!empty($logo)) {
            self::Borrar_File(public_path($logo->getFolder() . $logo->name));
            $logo->delete();

        }
        $nombre = self::random_str() . "." . $cliente['ext'];
        $d = $img->storeAs($folder, $nombre, 'local');
        $sal['url'] = url($folder . "/" . $nombre);
        $sal['sms'] = "Imagen almacenada";
        $sal['status'] = 200;
        $logo = \Auth::user()->getAdminLogo();
        //$logo = Photo::AdminLogo(\Auth::user()->id)->first();

        \Auth::user()->setAdminLogo($nombre);
        //$stud->setLogo($nombre)->push();
        //$p = new Photo();
        //$p->setName($nombre)->setType($type)->setTableid($stud->id)->setUrl($sal['url'])->setCreatedAt($user->id)->push();
        return Functions::RetornaJson($sal);


    }

    public function ProcesarImgFolder($folder = null, $mw = 1024)
    {
        /*$mw = 1024; maximo de ancho*/
        if (empty($folder)) $folder = \Config::get('aplication.fotoyeguada');

        $s = (public_path("uploads" . DS . $folder));
        try {
            $files = scandir($s);
        } catch (\ErrorException $e) {
            $files = [];

        }
        foreach ($files as $k => $v) {
            if ($v != "." and $v != "..") {
                $t = $s . DS . $v;
                $img2 = Image::make($t);
                if ($img2->width() > $mw) {
                    $img = Image::make($t)->widen($mw, function ($constraint) {
                        $constraint->upsize();
                    });
                    $img->save($t);
                }
            }
        }

    }

    public function GuardarTrabajoFoto($file, Aplicante $aplicante)
    {

        $cliente = [
            "mime" => $file->getClientMimeType(),
            "ext" => $file->getClientOriginalExtension(),
            "name" => $file->getClientOriginalName(),
        ];
        $folderfoto = $aplicante->CarpetaTrabajoFoto();

        $nombre = self::random_str() . "." . $cliente['ext'];
        $aplicante->setFoto(url($folderfoto . "/" . $nombre));
        $aplicante->setFotoName($nombre);
        $aplicante->push();
        $d = $file->storeAs($folderfoto, $nombre, 'local');

        return $nombre;
    }

    public function GuardarTrabajoDoc($file, Aplicante $aplicante)
    {

        $cliente = [
            "mime" => $file->getClientMimeType(),
            "ext" => $file->getClientOriginalExtension(),
            "name" => $file->getClientOriginalName(),
        ];
        $folderfoto = $aplicante->CarpetaTrabajoDoc();

        $nombre = self::random_str() . "." . $cliente['ext'];
        $aplicante->setDocs(url($folderfoto . "/" . $nombre));
        $aplicante->setDocsName($nombre);
        $aplicante->push();
        $d = $file->storeAs($folderfoto, $nombre, 'local');
        return $nombre;
    }

    public function imagen_agua($img, $stud)
    {
        if (is_array($img)) {
            $img = $img[0];
        }
        if (is_array($img)) {
            $img = $img[0];
        }
        $cliente = [
            "mime" => '',
            "ext" => '',
            "name" => '',
        ];
        \Log::critical('Antes de null');
        if (empty($img)) {
            return null;
        }
        \Log::critical('Despues Null');
        if (!empty($img)) {
            $cliente = [
                "mime" => $img->getClientMimeType(),
                "ext" => $img->getClientOriginalExtension(),
                "name" => $img->getClientOriginalName(),
            ];
        }
        //$stud = Stud::find($stud_id);

        //$stud = $user->Yeguada();
        $sal['url'] = '';
        $sal['sms'] = "No tienes una Yeguada aun";
        $sal['status'] = 400;
        if (!empty($stud->toArray())) {
            $f = 'waters5599';
            $folder = "uploads" . DS . $f;
            $nombre = self::random_str() . "." . $cliente['ext'];
            $d = $img->storeAs($folder, $nombre, 'local');
            $i = Image::make($folder . DS . $nombre)->
            resize(null, 200, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $i->save($folder . DS . $nombre);
            $sal['url'] = url('uploads/' . $f . "/" . $nombre);
            $sal['sms'] = "Imagen almacenada";
            $sal['status'] = 200;
            $ds = Marcaagua::where('stud_id', $stud->id)->first();
//
            if (!empty($ds)) {
                $ds->Borrar();
            }

            $p = new Marcaagua([
                'stud_id' => $stud->id,
                'created_by' => \Auth::user()->id,
                'updated_by' => \Auth::user()->id
            ]);
            $p->setFoto($nombre)->setFotourl($sal['url']);
            $p->push();
            \Log::critical('Guardando marca de agua ' . $folder . DS . $nombre);
            //$p->SaveGalery($nombre,$stud->id)->setCreatedBy(\Auth::user()->id)->push();
            //$p->SaveFrontImage($nombre, $stud->id)->setCreatedBy(\Auth::user()->id)->push();
            return $nombre;
        } else {
            return '';
        }

    }

    public function PonerMarcaPhotos(Photo $foto)
    {
        $stud = \Auth::user()->Yeguada();
        $folder = $foto->getFolder();
        $nombre = $foto->name;
        $file = public_path() . DS . $folder . $nombre;
        if (is_file($file)) {
            $s = $this->PonerMarcaAgua($file, $nombre, $folder, $stud);
            return $s;
        } else {
            return false;
        }
    }

    public function PonerMarcaAgua($file, $nombre, $folder, $stud = null)
    {
        if (empty($stud)) {
            $stud = \Auth::user()->Yeguada();
        }
        if ($stud->Marca() == true) {
            $marca = $stud->MarcaAgua()->first()->getAbsoluteFile();
            //Upload Images One After the Order into folder
            //$img = Image::make($file->getRealPath());
            $img = Image::make($file);
            //$w = $img->getWidth();
            //$w1 = (int)(5 * $w) / 100;
            $h = $img->getHeight();
            $h1 = (int)(8 * $h) / 100;
            $h1 = (integer)$h1;
            //$watermark = Image::make(public_path('CCSS.jpg'));
            //$watermark = Image::make($marca)->widen($w1);
            $watermark = Image::make($marca)->heighten($h1);
            $sa = $watermark->getWidth();
            $sb = $watermark->getHeight();
            $sa = 30;
            $sb = 30;
            //$img->insert($watermark, 'bottom-right', 10, 10);
            $img->insert($watermark, 'bottom-right', $sa, $sb);
            //$img->save($folder . '/' . $nombre);
            $img->save($file);
            //$move = $file->move($folder, $nombre);
            return true;
        }
        return false;

    }

    public function PonerMarca($folder, $nombre, $stud = null)
    {
        if (empty($stud)) {
            $stud = \Auth::user()->Yeguada();
        }
        //$folder = $v->getFolder();
        //$nombre = $v->name;
        $file = public_path() . DS . $folder . $nombre;
        if (is_file($file)) {
            $s = $this->PonerMarcaAgua($file, $nombre, $folder, $stud);
        } else {
            echo "No es archivo $file";
        }

    }

    private function Respuesta($content)
    {
        // define mime type
        $mime = finfo_buffer(finfo_open(FILEINFO_MIME_TYPE), $content);
        // return http response
        return new IlluminateResponse($content, 200, array(
            'Content-Type' => $mime,
            'Cache-Control' => 'max-age=' . (config('imagecache.lifetime') * 60) . ', public',
            'Etag' => md5($content)
        ));
    }

    private function RespuestaUrl($content)
    {


        // define mime type
        $mime = finfo_buffer(finfo_open(FILEINFO_MIME_TYPE), $content);
        // return http response
        return new IlluminateResponse($content, 200, array(
            'Content-Type' => $mime,
            'Cache-Control' => 'max-age=' . (config('imagecache.lifetime') * 60) . ', public',
            'Etag' => md5($content)
        ));
    }
}


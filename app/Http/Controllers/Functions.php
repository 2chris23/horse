<?php

namespace App\Http\Controllers;

use App;
use App\Models\Country;
use App\Models\Directory;
use App\Models\Horse;
use App\Models\Moneda;
use App\Models\SlugCaballo;
use App\Models\State;
use App\Models\User;
use Carbon\Carbon;
use DOMDocument;
use File;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection as Collection;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use MaxMind\Db\Reader\InvalidDatabaseException as InvalidDatabaseException;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Stevebauman\Purify\Purify as Purify;
use Storage;
use function array_push;
use function floatval;
use function is_array;
use function is_file;
use function public_path;
use function str_replace;
use function strlen;
use function strtolower;
use function substr;
use function trans;


class Functions extends Controller
{
    //

    Public static function RetornoArrayTelefono(Request $request)
    {

        $phone = $request->input_stud_phone;
        $phone_id = $request->id_input_stud_phone;
        $phone_ext = $request->ext_input_stud_phone;
        $phone_cod = $request->extc_input_stud_phone;

        $pp = [];
        if (!empty($phone)) {
            foreach ($phone as $k => $v) {

                $t = Functions::RetornaNumero(str_replace(' ', '', $v));
                if ((!empty($t) or $t != 0) and strlen($t) > 2) {
                    $pp[$k] = [
                        'i' => $phone_id[$k],
                        'n' => $t,
                        'e' => $phone_ext[$k],
                        'c' => $phone_cod[$k],
                    ];
                } else {
                    if (!empty($phone_id[$k])) {
                        $te = Directory::find($phone_id[$k]);
                        if (!empty($te)) {
                            $te->delete();
                        }
                    }
                }
            }
        }
        $ts = [];
        $i = 0;
        foreach ($pp as $k => $v) {
            $ts[$i] = $v;
            $i++;
        }
        $pp = $ts;
        return $pp;
    }

    public static function RetornaNumero($str = 0)
    {
        //$str = preg_replace('/\D/', '', $str);

        $str = floatval($str);
        $str = preg_replace("/[^0-9]/", "", $str);
        //$str = Functions::BuscarReemplazarString($str, "", ".");
        //$str = (float)Functions::BuscarReemplazarString($str, ".", ",");
        return $str;
    }

    public static function LimpiarTextoHard($str)
    {
        $str = Functions::LimpiarTexto($str);
        $str = addslashes((string)$str);
        $str = strip_tags((string)$str);
        //$str = filter_var($str, FILTER_SANITIZE_URL, FILTER_FLAG_NO_ENCODE_QUOTES);
        //$str = htmlspecialchars(htmlentities(preg_replace(array('/\s/', '/\.[\.]+/', '/[^\w_\.\-]/'), array('_', '.', ''), $str)));
        //$str = ((preg_replace(array('/\s/', '/\.[\.]+/', '/[^\w_\.\-]/'), array('_', '.', ''), $str)));
        //$str = htmlentities($str);
        $str = str_replace('"', '', $str);
        $str = str_replace('$', '', $str);
        $str = str_replace("&", '', $str);
        $str = str_replace("'", '', $str);
        $str = str_replace("\\", '', $str);
        $str = str_replace("<", '', $str);
        $str = str_replace(">", '', $str);
        $str = str_replace("[", '', $str);
        $str = str_replace("]", '', $str);
        $str = str_replace("}", '', $str);
        $str = str_replace("{", '', $str);
        $str = str_replace(")", '', $str);
        $str = str_replace("(", '', $str);
        $str = str_replace("_", ' ', $str);

        return $str;

    }

    public static function LimpiarTexto($str)
    {
        //$str = strip_tags($str);
        $str = nl2br($str);
        $str = str_replace('  ', " ", $str);
        $str = str_replace('  ', " ", $str);
        $str = str_replace('  ', " ", $str);

        $str = str_replace(array("\r\n", "<br>"), " ", $str);
        $str = str_replace(array("\\", ""), " ", $str);
        $str = str_replace(array("\r\n", "\r"), "<br>", $str);
        $str = str_replace('\\n', "<br>", $str);
        $str = str_replace('\'', '\\\'', $str);
        $str = str_replace('\\r', "<br>", $str);
        $str = trim(str_replace(PHP_EOL, ' ', $str));
        $str = preg_replace("/\r\n|\r|\n/", "<br>", $str);
        $str = trim(preg_replace('/\s\s+/', ' ', $str));
        $str = trim(preg_replace('/\s+/', ' ', $str));
        //$str = filter_var($str, FILTER_SANITIZE_MAGIC_QUOTES);
        //$str = filter_var ( $str, FILTER_SANITIZE_STRING);
        //$str = filter_var($str, FILTER_SANITIZE_URL, FILTER_FLAG_NO_ENCODE_QUOTES);
        //$str = htmlspecialchars(htmlentities(preg_replace(array('/\s/', '/\.[\.]+/', '/[^\w_\.\-]/'), array('_', '.', ''), $str)));
        //$str = ((preg_replace(array('/\s/', '/\.[\.]+/', '/[^\w_\.\-]/'), array('_', '.', ''), $str)));

        //$str = htmlentities($str);


        $config = [

            //'HTML.Allowed' => 'div,b,strong,i,em,a[href|title],ul,ol,li,p[style],br,span[style],img[width|height|alt|src]',
            //'HTML.Allowed' => 'b,strong,p',
            //'HTML.Allowed' => 'p',
            'HTML.ForbiddenElements' => '',
            //'CSS.AllowedProperties' => 'font,font-size,font-weight,font-style,font-family,text-decoration,padding-left,color,background-color,text-align',
            'HTML.Allowed' => 'div,b,strong,i,em,a[href|title],ul,ol,li,p[style],br,span[style],img[width|height|alt|src]',
            'CSS.AllowedProperties' => 'font,font-size,font-weight,font-style,font-family,text-decoration,padding-left,color,background-color,text-align',
            'AutoFormat.AutoParagraph' => false,
            'AutoFormat.RemoveEmpty' => true,

        ];
        
        $str = \Stevebauman\Purify\Facades\Purify::clean($str, $config);
        $str = str_replace('<br />', '. ', $str);
        //$str = filter_var ( $str, FILTER_SANITIZE_SPECIAL_CHARS);
        return $str;

    }

    public static function CheckHashedPass($compare, $pass)
    {
        if (Hash::check($compare, $pass)) {
            return true;
        }
        return false;
    }

    public static function CrypPass($pass)
    {
        return Functions::cryptoJsAesEncrypt(Config::get('aplication.cryp_key'), $pass);
    }

    public static function cryptoJsAesEncrypt($passphrase, $value)
    {
        $salt = openssl_random_pseudo_bytes(8);
        $salted = '';
        $dx = '';
        while (strlen($salted) < 48) {
            $dx = md5($dx . $passphrase . $salt, true);
            $salted .= $dx;
        }
        $key = substr($salted, 0, 32);
        $iv = substr($salted, 32, 16);
        $encrypted_data = openssl_encrypt(json_encode($value), 'aes-256-cbc', $key, true, $iv);
        $data = array("ct" => base64_encode($encrypted_data), "iv" => bin2hex($iv), "s" => bin2hex($salt));

        return json_encode($data);
    }

    public static function DerypPass($pass)
    {
        return Functions::cryptoJsAesDecrypt(Config::get('aplication.cryp_key'), $pass);
    }

    public static function cryptoJsAesDecrypt($passphrase, $jsonString)
    {
        $jsondata = json_decode($jsonString, true);
        $salt = hex2bin($jsondata["s"]);
        $ct = base64_decode($jsondata["ct"]);
        $iv = hex2bin($jsondata["iv"]);
        $concatedPassphrase = $passphrase . $salt;
        $md5 = array();
        $md5[0] = md5($concatedPassphrase, true);
        $result = $md5[0];
        for ($i = 1; $i < 3; $i++) {
            $md5[$i] = md5($md5[$i - 1] . $concatedPassphrase, true);
            $result .= $md5[$i];
        }
        $key = substr($result, 0, 32);
        $data = openssl_decrypt($ct, 'aes-256-cbc', $key, true, $iv);

        return json_decode($data, true);
    }

    public static function ReemplazarUrlBase($url)
    {
        $base = url('/');
        return str_replace($base, '', $url);
    }

    public static function LimpiarNuevo($url)
    {
        $base = '/Crear';
        return str_replace($base, '', $url);
    }

    public static function BuscarUltimoBread($url)
    {
        $s = 'Crear';
        if (Functions::BoleanoBuscarString($url, $s)) {
            return "Crear";
        }
        $s = 'Nuevo';
        if (Functions::BoleanoBuscarString($url, $s)) {
            return "Nuevo";
        }
        $s = 'Editar';
        if (Functions::BoleanoBuscarString($url, $s)) {
            return "Editar";
        }
        return null;
    }

    public static function BoleanoBuscarString($palabra, $buscar)
    {
        $pos = strrpos($palabra, $buscar);
        return ($pos === false) ? false : true;
    }

    public static function MenuSimple()
    {
        /*Controla los menu simples en lote*/

        $user = (!empty(\Auth::user())) ? \Auth::user() : new User();/*Temporal*/
        $s = [];
        /*
        $d['name'] = trans('users.home');
        //$d['url'] = route('home');
        $d['url'] = "#!";
        $d['disable'] = true;
        $s[count($s)] = $d;
        $d = [];
        */
        /*********************/
        /*
        $d['name'] = "Mi pagina";
        $d['url'] = route('MyPage', ['id' => $user->id]);
        $s[count($s)] = $d;
        $d = [];
        */

        if ($user->isAdm() == false and $user->Asociado() == false) {
            /*
            $tt = ( Route::getRoutes());
            foreach ($tt as $k){
                echo $k->getPath() . "<br>";
            }
            dd($tt);
            */
            /*********************/
            $d['name'] = trans('portal.home');
            $d['icon'] = '<i class="fa fa-sitemap"> </i>';
            $d['url'] = route('iniciocliente');
            $d['other'] = ' data-toggle="popover" data-trigger="hover" title="' . trans('popover.menu.diseno.titulo') . '" data-content="' . trans('popover.menu.diseno.contenido') . '"';
            $s[count($s)] = $d;
            $d = [];
            /*********************/
            $d['name'] = trans('users.desing');
            $d['icon'] = '<i class="fa fa-desktop"> </i>';
            $d['url'] = route('gallery.index');
            $d['other'] = ' data-toggle="popover" data-trigger="hover" title="' . trans('popover.menu.diseno.titulo') . '" data-content="' . trans('popover.menu.diseno.contenido') . '"';
            $s[count($s)] = $d;
            $d = [];
            /*********************/
            $d['name'] = trans('stud.menu.caption');
            $d['url'] = route('stud.create');
            $d['other'] = ' data-toggle="popover" data-trigger="hover" title="' . trans('popover.menu.stud.titulo') . '" data-content="' . trans('popover.menu.stud.contenido') . '"';
            $s[count($s)] = $d;
            $d = [];
            /*********************/
            $d['name'] = trans('horse.menu.caption');
            $d['icon'] = '<i class="fa fa-pagelines"> </i>';
            $d['icon'] = '<i class="fa icon-black-head-horse-side-view-with-horsehair"> </i>';
            $d['url'] = route('caballoc.index');
            $d['other'] = ' data-toggle="popover" data-trigger="hover" title="' . trans('popover.menu.horse.titulo') . '" data-content="' . trans('popover.menu.horse.contenido') . '"';
            //$d['url'] = route('horse.create');
            $s[count($s)] = $d;
            $d = [];
            /*********************/
            $d['name'] = trans('users.sell');
            $d['icon'] = '<i class="fa fa-line-chart"> </i>';
            $d['url'] = route('sell.create');
            $d['other'] = ' data-toggle="popover" data-trigger="hover" title="' . trans('popover.menu.sell.titulo') . '" data-content="' . trans('popover.menu.sell.contenido') . '"';
            $s[count($s)] = $d;

            $d = [];

            /*********************/

            $d['name'] = trans('photo.menu.caption');
            $d['icon'] = '<i class="fa fa-camera"> </i>';
            $d['other'] = ' data-toggle="popover" data-trigger="hover" title="' . trans('popover.menu.photos.titulo') . '" data-content="' . trans('popover.menu.photos.contenido') . '"';
            $d['url'] = route('photo.index');
            $s[count($s)] = $d;
            $d = [];
            /*********************/

            $d['name'] = trans('video.menu.caption');
            $d['icon'] = '<i class="fa fa-video-camera"> </i>';
            $d['other'] = ' data-toggle="popover" data-trigger="hover" title="' . trans('popover.menu.video.titulo') . '" data-content="' . trans('popover.menu.video.contenido') . '"';
            $d['url'] = route('video.index');

            $s[count($s)] = $d;
            $d = [];
            /*********************/
            /*

            $d['name'] = trans('users.work');
            $d['icon'] = '<i class="fa fa-briefcase"> </i>';
            $d['other'] = ' data-toggle="popover" title="Proximamente" data-content="Esta seccion pronto estara disponible"';
            $s[count($s)] = $d;
            $d = [];
            */
            /*********************/
            $d['name'] = trans('users.interestcontact');
            $d['url'] = route('StudClientes.index');
            /*$d['url'] = "#!";*/
            $d['icon'] = '<i class="fa fa-address-card"> </i>';
            $d['other'] = ' data-toggle="popover" data-trigger="hover" title="' . trans('popover.menu.contact.titulo') . '" data-content="' . trans('popover.menu.contact.contenido') . '"';
            $s[count($s)] = $d;
            $d = [];
            /************************************************/
            $d['name'] = trans('facebook.menu');
            $d['url'] = route('ObtenerPagina');
            /*$d['url'] = "#!";*/
            $d['icon'] = '<i class="fa fa-facebook"> </i>';
            $d['other'] = ' data-toggle="popover" data-trigger="hover" title="' . trans('popover.facebookm.titulo') . '" data-content="' . trans('popover.facebookm.contenido') . '"';

            $s[count($s)] = $d;
            $d = [];
            /*********************/
            /*********************/

        } elseif ($user->isAdm() == true) {

            $d['name'] = trans('portal.home');
            $d['icon'] = '<i class="fa fa-sitemap"> </i>';
            $d['url'] = url('/');
            $d['other'] = ' data-toggle="popover" data-trigger="hover" title="' . trans('popover.menu.diseno.titulo') . '" data-content="' . trans('popover.menu.diseno.contenido') . '"';
            $s[count($s)] = $d;
            $d = [];


            $d['name'] = trans('users.sell');
            $d['icon'] = '<i class="fa fa-line-chart"> </i>';
            $d['url'] = route('ventas.index');
            $d['other'] = ' data-toggle="popover" data-trigger="hover" title="' . trans('popover.menu.adminsell.titulo') . '" data-content="' . trans('popover.menu.adminsell.contenido') . '"';
            $s[count($s)] = $d;
            $d = [];

            $d['name'] = trans('users.service');
            $d['icon'] = '<i class="fa fa-briefcase"> </i>';
            $d['url'] = route('servicios.index');
            $d['other'] = ' data-toggle="popover" data-trigger="hover" title="' . trans('popover.menu.adminservicios.titulo') . '" data-content="' . trans('popover.menu.adminservicios.contenido') . '"';
            $s[count($s)] = $d;
            $d = [];
            $d['name'] = trans('users.clientes');
            $d['url'] = route('yeguadas.index');
            $d['icon'] = '<i class="fa fa-address-book"> </i>';
            $d['other'] = ' data-toggle="popover" data-trigger="hover" title="' . trans('popover.menu.adminstud.titulo') . '" data-content="' . trans('popover.menu.adminstud.contenido') . '"';

            $s[count($s)] = $d;
            $d = [];

            $d['name'] = trans('users.clientesposible');
            $d['icon'] = '<i class="fa fa-address-card"> </i>';
            $d['url'] = route('clientes.index');
            $d['other'] = ' data-toggle="popover" data-trigger="hover" title="' . trans('popover.menu.admincontact.titulo') . '" data-content="' . trans('popover.menu.admincontact.contenido') . '"';
            $s[count($s)] = $d;
            $d = [];


            $d['name'] = trans('horse.menu.caption');
            $d['icon'] = '<i class="fa fa-pagelines"> </i>';
            $d['icon'] = '<i class="fa icon-black-head-horse-side-view-with-horsehair"> </i>';
            $d['url'] = route('caballo.index');
            $d['other'] = ' data-toggle="popover" data-trigger="hover" title="' . trans('popover.menu.adminhorse.titulo') . '" data-content="' . trans('popover.menu.adminhorse.contenido') . '"';
            //$d['url'] = route('horse.create');
            $s[count($s)] = $d;
            $d = [];

            $d['name'] = trans('photo.menu.caption');
            $d['icon'] = '<i class="fa fa-camera"> </i>';
            $d['url'] = route('fotos.index');
            $d['other'] = ' data-toggle="popover" data-trigger="hover" title="' . trans('popover.menu.adminphotos.titulo') . '" data-content="' . trans('popover.menu.adminphotos.contenido') . '"';
            $s[count($s)] = $d;
            $d = [];

            $d['name'] = trans('video.menu.caption');
            $d['icon'] = '<i class="fa fa-video-camera"> </i>';
            $d['url'] = route('videos.index');
            $d['other'] = ' data-toggle="popover" data-trigger="hover" title="' . trans('popover.menu.adminvideo.titulo') . '" data-content="' . trans('popover.menu.adminvideo.contenido') . '"';
            $s[count($s)] = $d;
            $d = [];

            $d['name'] = trans('facebook.menu');
            $d['url'] = route('FacebookAdmin');
            $d['icon'] = '<i class="fa fa-facebook"> </i>';
            $d['other'] = ' data-toggle="popover" data-trigger="hover" title="' . trans('popover.facebookm.titulo') . '" data-content="' . trans('popover.facebookm.contenido') . '"';
            $s[count($s)] = $d;
            $d = [];

            $d['name'] = "Asociados";
            $d['url'] = route('Asociados.index');
            $d['icon'] = '<i class="fa fa-facebook"> </i>';
            $d['other'] = ' data-toggle="popover" data-trigger="hover" title="' . trans('popover.facebookm.titulo') . '" data-content="' . trans('popover.facebookm.contenido') . '"';
            $s[count($s)] = $d;
            $d = [];


        } elseif ($user->isAdm() == false and $user->Asociado() == true) {

            $d['name'] = trans('portal.home');
            $d['icon'] = '<i class="fa fa-sitemap"> </i>';
            $d['url'] = url('/');
            $d['other'] = ' data-toggle="popover" data-trigger="hover" title="' . trans('popover.menu.diseno.titulo') . '" data-content="' . trans('popover.menu.diseno.contenido') . '"';
            $s[count($s)] = $d;
            $d = [];


            $d['name'] = trans('users.sell');
            $d['icon'] = '<i class="fa fa-line-chart"> </i>';
            $d['url'] = route('asoc.ventas.index');
            $d['other'] = ' data-toggle="popover" data-trigger="hover" title="' . trans('popover.menu.adminsell.titulo') . '" data-content="' . trans('popover.menu.adminsell.contenido') . '"';
            $s[count($s)] = $d;
            $d = [];
            /*
            $d['name'] = trans('users.service');
            $d['icon'] = '<i class="fa fa-briefcase"> </i>';
            $d['url'] = route('asoc.servicios.index');
            $d['other'] = ' data-toggle="popover" data-trigger="hover" title="' . trans('popover.menu.adminservicios.titulo') . '" data-content="' . trans('popover.menu.adminservicios.contenido') . '"';
            $s[count($s)] = $d;
            $d = [];
            */
            $d['name'] = trans('users.clientes');
            $d['url'] = route('asoc.yeguadas.index');
            $d['icon'] = '<i class="fa fa-address-book"> </i>';
            $d['other'] = ' data-toggle="popover" data-trigger="hover" title="' . trans('popover.menu.adminstud.titulo') . '" data-content="' . trans('popover.menu.adminstud.contenido') . '"';

            $s[count($s)] = $d;
            $d = [];
            /*
            $d['name'] = trans('users.clientesposible');
            $d['icon'] = '<i class="fa fa-address-card"> </i>';
            $d['url'] = route('asoc.clientes.index');
            $d['other'] = ' data-toggle="popover" data-trigger="hover" title="' . trans('popover.menu.admincontact.titulo') . '" data-content="' . trans('popover.menu.admincontact.contenido') . '"';
            $s[count($s)] = $d;
            $d = [];
            */


            $d['name'] = trans('horse.menu.caption');
            $d['icon'] = '<i class="fa fa-pagelines"> </i>';
            $d['icon'] = '<i class="fa icon-black-head-horse-side-view-with-horsehair"> </i>';
            $d['url'] = route('asoc.caballo.index');
            $d['other'] = ' data-toggle="popover" data-trigger="hover" title="' . trans('popover.menu.adminhorse.titulo') . '" data-content="' . trans('popover.menu.adminhorse.contenido') . '"';
            //$d['url'] = route('horse.create');
            $s[count($s)] = $d;
            $d = [];
            /*
                        $d['name'] = trans('photo.menu.caption');
                        $d['icon'] = '<i class="fa fa-camera"> </i>';
                        $d['url'] = route('asoc.fotos.index');
                        $d['other'] = ' data-toggle="popover" data-trigger="hover" title="' . trans('popover.menu.adminphotos.titulo') . '" data-content="' . trans('popover.menu.adminphotos.contenido') . '"';
                        $s[count($s)] = $d;
                        $d = [];

                        $d['name'] = trans('video.menu.caption');
                        $d['icon'] = '<i class="fa fa-video-camera"> </i>';
                        $d['url'] = route('asoc.videos.index');
                        $d['other'] = ' data-toggle="popover" data-trigger="hover" title="' . trans('popover.menu.adminvideo.titulo') . '" data-content="' . trans('popover.menu.adminvideo.contenido') . '"';
                        $s[count($s)] = $d;
                        $d = [];
            */
            /*
            $d['name'] = trans('facebook.menu');
            $d['url'] = route('asoc.FacebookAdmin');
            $d['icon'] = '<i class="fa fa-facebook"> </i>';
            $d['other'] = ' data-toggle="popover" data-trigger="hover" title="' . trans('popover.facebookm.titulo') . '" data-content="' . trans('popover.facebookm.contenido') . '"';
            $s[count($s)] = $d;
            $d = [];
            */
            /*
            $d['name'] = "Asociados";
            $d['url'] = route('asoc.Asociados.index');
            $d['icon'] = '<i class="fa fa-facebook"> </i>';
            $d['other'] = ' data-toggle="popover" data-trigger="hover" title="' . trans('popover.facebookm.titulo') . '" data-content="' . trans('popover.facebookm.contenido') . '"';
            $s[count($s)] = $d;
            $d = [];
            */


        }

        return $s;
    }
// server-13-32-80-87.mia3

//phpstorm.exe	3288	server-13-32-80-87.mia3.r.cloudfront.net	28	9.645	9.673

    public static function MenuFull()
    {
        $s = [];
        $d['name'] = "Mi pagina";
        $d['url'] = route('MyPage', ['id' => \Auth::user()->id, 'slug' => \Auth::user()->Slug()]);
        array_push($s, $d);
        $d = [];

        $d['name'] = 'Diseño';
        $d['icon'] = '<i class="fa fa-adjust"> </i>';

        array_push($s, $d);
        $d = [];
        /*********************/
        $d['name'] = trans('stud.menu.caption');
        $d['icon'] = '<i class="fa fa-files-o"> </i>';
        $d['url'] = route('stud.create');
        array_push($s, $d);
        $d = [];
        $b1 = [
            'name' => trans('stud.menu.index'),
            'url' => route('stud.create'),
            'icon' => '<i class="fa fa-home"> </i>',
        ];

        $b2 = [
            'name' => trans('stud.menu.create'),
            'url' => route('stud.create'),
            'icon' => '<i class="fa fa-home"> </i>',
        ];
        $b3 = [
            'name' => trans('stud.menu.edit'),
            'url' => route('stud.edit'),
            'icon' => '<i class="fa fa-home"> </i>',
        ];
        $d['buttons'] = [
            0 => $b1,
            1 => $b2,
            2 => $b3,
        ];
        /*********************/
        $d['name'] = trans('horse.menu.caption');
        $d['icon'] = '<i class="fa fa-pagelines"> </i>';
        $d['url'] = route('caballoc.index');
        array_push($s, $d);
        $d = [];
        $b1 = [
            'name' => trans('horse.menu.index'),
            'url' => route('caballoc.index'),
            'icon' => '<i class="fa fa-home"> </i>',
        ];

        $b2 = [
            'name' => trans('horse.menu.create'),
            'url' => route('horse.create'),
            'icon' => '<i class="fa fa-home"> </i>',
        ];
        $b3 = [
            'name' => trans('horse.menu.edit'),
            'url' => route('horse.edit'),
            'icon' => '<i class="fa fa-home"> </i>',
        ];
        $d['buttons'] = [
            0 => $b1,
            1 => $b2,
            2 => $b3,
        ];

        /*********************/


        $d['name'] = trans('photo.menu.caption');
        $d['icon'] = '<i class="fa fa-camera"> </i>';

        array_push($s, $d);
        $d = [];
        $b1 = [
            'name' => trans('photo.menu.index'),
            'url' => route('photo.index'),
            'icon' => '<i class="fa fa-home"> </i>',
        ];

        $b2 = [
            'name' => trans('photo.menu.create'),
            'url' => route('photo.create'),
            'icon' => '<i class="fa fa-home"> </i>',
        ];
        $b3 = [
            'name' => trans('photo.menu.edit'),
            'url' => route('photo.edit'),
            'icon' => '<i class="fa fa-home"> </i>',
        ];
        $d['buttons'] = [
            0 => $b1,
            1 => $b2,
            2 => $b3,
        ];

        /*********************/

        $d['name'] = trans('video.menu.caption');
        $d['icon'] = '<i class="fa fa-video-camera"> </i>';

        array_push($s, $d);
        $d = [];

        $b1 = [
            'name' => trans('video.menu.index'),
            'url' => route('video.index'),
            'icon' => '<i class="fa fa-home"> </i>',
        ];

        $b2 = [
            'name' => trans('video.menu.create'),
            'url' => route('video.create'),
            'icon' => '<i class="fa fa-home"> </i>',
        ];
        $b3 = [
            'name' => trans('video.menu.edit'),
            'url' => route('video.edit'),
            'icon' => '<i class="fa fa-home"> </i>',
        ];
        $d['buttons'] = [
            0 => $b1,
            1 => $b2,
            2 => $b3,
        ];


        /*********************/


        $d['name'] = "Empleo";
        $d['icon'] = '<i class="fa fa-briefcase"> </i>';

        array_push($s, $d);
        $d = [];

        /*********************/
        /*


        $d = [];
        $d['name'] = trans('country.menu.caption');

        array_push($s, $d);
        $d = [];

        $b1 = [
            'name' => trans('country.menu.index'),
            'url' => route('country.index'),
            'icon' => '<i class="fa fa-home"> </i>',
        ];

        $b2 = [
            'name' => trans('country.menu.create'),
            'url' => route('country.create'),
            'icon' => '<i class="fa fa-home"> </i>',
        ];
        $b3 = [
            'name' => trans('country.menu.edit'),
            'url' => route('country.edit'),
            'icon' => '<i class="fa fa-home"> </i>',
        ];
        $d['buttons'] = [
            0 => $b1,
            1 => $b2,
            2 => $b3,
        ];

        /*********************/
        /*
        $d = [];
        $d['name'] = trans('state.menu.caption');

        array_push($s, $d);
        $d = [];

        $b1 = [
            'name' => trans('state.menu.index'),
            'url' => route('state.index'),
            'icon' => '<i class="fa fa-home"> </i>',
        ];

        $b2 = [
            'name' => trans('state.menu.create'),
            'url' => route('state.create'),
            'icon' => '<i class="fa fa-home"> </i>',
        ];
        $b3 = [
            'name' => trans('state.menu.edit'),
            'url' => route('state.edit'),
            'icon' => '<i class="fa fa-home"> </i>',
        ];
        $d['buttons'] = [
            0 => $b1,
            1 => $b2,
            2 => $b3,
        ];

        /*********************/
        /*
        $d = [];
        $d['name'] = trans('city.menu.caption');


        array_push($s, $d);
        $d = [];

        $b1 = [
            'name' => trans('city.menu.index'),
            'url' => route('city.index'),
            'icon' => '<i class="fa fa-home"> </i>',
        ];

        $b2 = [
            'name' => trans('city.menu.create'),
            'url' => route('city.create'),
            'icon' => '<i class="fa fa-home"> </i>',
        ];
        $b3 = [
            'name' => trans('city.menu.edit'),
            'url' => route('city.edit'),
            'icon' => '<i class="fa fa-home"> </i>',
        ];
        $d['buttons'] = [
            0 => $b1,
            1 => $b2,
            2 => $b3,
        ];

        /*********************/
        /*
        $d = [];
        $d['name'] = trans('users.menu.caption');

        array_push($s, $d);
        $d = [];

        $b1 = [
            'name' => trans('users.menu.index'),
            'url' => route('users.index'),
            'icon' => '<i class="fa fa-home"> </i>',
        ];

        $b2 = [
            'name' => trans('users.menu.create'),
            'url' => route('users.create'),
            'icon' => '<i class="fa fa-home"> </i>',
        ];
        $b3 = [
            'name' => trans('users.menu.edit'),
            'url' => route('users.edit'),
            'icon' => '<i class="fa fa-home"> </i>',
        ];
        $d['buttons'] = [
            0 => $b1,
            1 => $b2,
            2 => $b3,
        ];
        */
        return $s;
    }

    public static function AjustarHoraTZ($hora = null)
    {

        if (is_object($hora)) {
            $hor = null;
            foreach ($hora as $k => $v) {
                $hor = $v;
            }
            $hora = $hor;
        }
        $hora = str_replace('"', '', $hora);
        $time = \Session::get('timezone');
        $time = !empty($time) ? $time : Config::get('app.timezone');
        $hora = (empty($hora)) ?
            Carbon::now()->setTimezone($time)->format('H:m')
            : Carbon::parse($hora)->setTimezone($time)->format('H:m');
        return $hora;
    }

    public static function AjustarHoraHM($hora = null)
    {
        return (empty($hora)) ? Carbon::now()->format('H:m') : Carbon::parse($hora)->format('H:m');
    }

    public static function AjustarFechaY($fecha = null)
    {
        $format = 'Y';
        if ($fecha == '') $fecha = Carbon::now();
        if ($fecha == null) $fecha = Carbon::now();
        return (empty($fecha)) ? Carbon::now()->format($format) : Carbon::parse($fecha)->format($format);
    }


    public static function AjustarFechaYmd($fecha = null)
    {
        $format = 'Y-m-d';
        if ($fecha == '') $fecha = Carbon::now();
        if ($fecha == null) $fecha = Carbon::now();
        return (empty($fecha)) ? Carbon::now()->format($format) : Carbon::parse($fecha)->format($format);
    }

    public static function AjustarFechaYmdSlash($fecha = null)
    {
        $format = 'Y/m/d';
        if ($fecha == '') $fecha = Carbon::now();
        if ($fecha == null) $fecha = Carbon::now();
        return (empty($fecha)) ? Carbon::now()->format($format) : Carbon::parse($fecha)->format($format);
    }

    public static function AjustarFechaParaJs($fecha = null)
    {
        $format = 'Y,m,d';

        //if ($fecha == '') $fecha = Carbon::now()->format('Y,m,d');
        if ($fecha == '') $fecha = Carbon::now();
        //if ($fecha == null) $fecha = Carbon::now()->format('Y,m,d');
        if ($fecha == null) $fecha = Carbon::now();
        if (empty($fecha)) {
            $s = Carbon::now()->format('Y,m,d');
        } else {
            $s = Carbon::parse($fecha)->format('Y,m,d');
        }
        return $s;
    }

    public static function AjustarFechaDmy($fecha = null)
    {
        if ($fecha == '') $fecha = Carbon::now();
        if ($fecha == null) $fecha = Carbon::now();
        return (empty($fecha)) ? Carbon::now()->format('d-m-Y') : Carbon::parse($fecha)->format('d-m-Y');
    }

    public static function AjustarFechaRfc3339($fecha = null)
    {
        //Carbon::now()->toRfc3339String()
        if ($fecha == '') $fecha = Carbon::now();
        if ($fecha == null) $fecha = Carbon::now();
        return (empty($fecha)) ? Carbon::now()->toRfc3339String() : Carbon::parse($fecha)->toRfc3339String();
    }


    public static function AjustarFechaTimeStamp($fecha = null)
    {
        //Carbon::now()->toRfc3339String()
        if ($fecha == '') $fecha = Carbon::now();
        if ($fecha == null) $fecha = Carbon::now();
        return (empty($fecha)) ? Carbon::now()->timestamp : Carbon::parse($fecha)->timestamp;
    }


    public static function AjustarFechaFacebookTimeStamp($fecha = null, $utc = false)
    {
        //Carbon::now()->toRfc3339String()
        $time = \Session::get('timezone');
        $time = !empty($time) ? $time : Config::get('app.timezone');
        if ($utc == true) {
            $time = 'UTC';
        }

        $format = 'Y/m/d H:m';
        if ($fecha == '') $fecha = Carbon::now()->format($format);
        if ($fecha == null) $fecha = Carbon::now()->format($format);
        //dd(Carbon::now()->format($format));
        $fecha = date("$format", strtotime($fecha));
        $fecha = Carbon::createFromFormat($format, $fecha, $time)->toDateTimeString(); // 1975-05-21 22:00:00
        //$fecha = Carbon::createFromTimestampUTC($fecha)->toDateTimeString();
        return (empty($fecha)) ? Carbon::now()->timestamp : Carbon::parse($fecha)->timestamp;
    }

    public static function AjustarFechaFormatoMaterial($fecha = null)
    {
        //Carbon::now()->toRfc3339String()

        $time = \Session::get('timezone');
        $time = !empty($time) ? $time : Config::get('app.timezone');

        $format = 'Y/m/d H:m';
        if ($fecha == '') $fecha = Carbon::now()->format($format);
        if ($fecha == null) $fecha = Carbon::now()->format($format);
        //dd(Carbon::now()->format($format));
        $fecha = date("$format", strtotime($fecha));


        $fecha = Carbon::createFromFormat($format, $fecha)->setTimezone($time)->toDateTimeString(); // 1975-05-21 22:00:00
        return $fecha;
        return (empty($fecha)) ? Carbon::now()->timestamp : Carbon::parse($fecha)->timestamp;
    }


    public static function AjustarFechaDmySlash($fecha = null)
    {
        if ($fecha == '') $fecha = Carbon::now();
        if ($fecha == null) $fecha = Carbon::now();
        return (empty($fecha)) ? Carbon::now()->format('d/m/Y') : Carbon::parse($fecha)->format('d/m/Y');
    }

    public static function AjustarFechaYYYMMDD($fecha = null)
    {
        if ($fecha == '') $fecha = Carbon::now();
        if ($fecha == null) $fecha = Carbon::now();
        return (empty($fecha)) ? Carbon::now()->format('Y/m/d') : Carbon::parse($fecha)->format('Y/m/d');
    }


    public static function AjustarFechaDmySlashHms($fecha = null)
    {
        $format = 'd/m/Y  h:i:s A';
        $format = 'd/m/Y  H:i';
        if ($fecha == '') $fecha = Carbon::now();
        if ($fecha == null) $fecha = Carbon::now();
        return (empty($fecha)) ? Carbon::now()->format($format) : Carbon::parse($fecha)->format($format);
    }

    public static function AjustarFechaHM($fecha = null)
    {
        $format = 'H:i';
        if ($fecha == '') $fecha = Carbon::now();
        if ($fecha == null) $fecha = Carbon::now();
        return (empty($fecha)) ? Carbon::now()->format($format) : Carbon::parse($fecha)->format($format);
    }

    public static function AjustarFechaAnyo($fecha = null)
    {
        return (empty($fecha)) ? Carbon::now()->format('Y') : Carbon::parse($fecha)->format('Y');
    }

    public static function AjustarFechaMes($fecha = null)
    {
        return (empty($fecha)) ? Carbon::now()->format('m') : Carbon::parse($fecha)->format('m');
    }


    public static function AjustarFechaYmdHm($fecha = null, $add = 0)
    {
        if ($add != 0) {
            return (empty($fecha)) ? Carbon::now()->addMinutes($add)->format('Y-m-d H:m') : Carbon::parse($fecha)->addMinutes($add)->format('Y-m-d H:m');
        } else {
            return (empty($fecha)) ? Carbon::now()->format('Y-m-d H:m') : Carbon::parse($fecha)->format('Y-m-d H:m');
        }

    }

    public static function RellenarCeros($string, $cantidad = 4)
    {
        return str_pad($string, $cantidad, "0", STR_PAD_LEFT);
    }

    public static function GenerarToken()
    {

        return \Hash::make(\Hash::make(Carbon::now()->toDateString()));

    }

    public static function Almacenar($file, $objetivo, $nombre = "aleatorio")
    {

        $dir = PUBLICO . DS . 'uploads' . DS . $objetivo;

        if ($nombre == "aleatorio") {
            $nombre = Functions::renombrado($nombre . ".jpg", $dir);
        }
        $path = \Config::get('aplication.almacenamiento');
        $ds = $dir . DS . $nombre;

        $nombre = Storage::disk($path)->putFile(DS . $objetivo, $file);

        $target = $objetivo . DS . $nombre;
        /*
        (Functions::Existe($dir.$nombre))? Functions::Borrar($dir.$nombre):null;
        try {
            Storage::move($nombre, $target);
        } catch (FileExistsException $e) {
            (File::exists($dir)) ? Functions::Borrar($dir.$nombre) : Storage::move($nombre, $target);
            (File::exists($dir)) ? Functions::Borrar($dir.$nombre) : Storage::move($nombre, $target);
        }*/
        return url('/') . "/uploads/$nombre";
    }

    public static function renombrado($nombre, $objetivo)
    {
        $extension = explode(".", $nombre);
        //public_path() . DS . 'uploads' . DS . $objetivo . DS,
        $nom = Functions::clear_name($nombre);
        $test = Functions::random_str() . "." . $extension[count($extension) - 1];
        $name = (Functions::Existe($objetivo . $test)) ? (Functions::renombrado($test, $objetivo)) : $test;
        return $name;
    }

    public static function clear_name($nombre)
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
        $nombre = htmlspecialchars(htmlentities(preg_replace(array('/\s/', '/\.[\.]+/', '/[^\w_\.\-]/'), array('_', '.', ''), $nombre)));

        return $nombre;
    }

    public static function random_str($length = 20)
    {
        //$length = rand(5, 10);
        //$length = 20;
        $repeat = rand(3, 5);
        $randomString = "";
        for ($i = 0; $i < $repeat; $i++) {
            $randomString = $randomString . str_shuffle(
                    "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"
                );
            $randomString = substr(sha1(sha1($randomString)), 0, $length);
        }

        return $randomString;
    }

    public static function Existe($file)
    {
        return (File::exists($file)) ? true : false;
    }

    public static function Borrar($file, $objetivo = null)
    {
        $file = PUBLICO . DS . "uploads" . DS . $objetivo . DS . $file;
        return (is_file($file)) ? ((File::exists($file)) ? File::delete($file) : null) : null;


    }

    public static function AjustarNumeroMil($numero = 0, $decimales = 0, $notacion_decimal = ',', $separador_mil = '.')
    {

        $t = (float)$numero;
        $d = number_format($t, $decimales, $notacion_decimal, $separador_mil);


        //if ($t < 0 and $t > -0.005) $t = 0;
        /*Numero entre 0 y  -0.005 sera 0*/
        return ($t == 0) ? 0 : $d;
    }

    public static function SetCero($val = 0)
    {
        return (!empty($val)) ? $val : 0;
    }

    public static function SetBoleano($val = false)
    {
        return (!empty($val)) ? true : false;
    }

    public static function LimpiarUrlbase()
    {
        $d = self::BuscarReemplazarString(url('/'), '', "http://");
        $d = self::BuscarReemplazarString($d, '', "https://");
        return $d;
    }

    public static function BuscarReemplazarString($Str = null, $Reemplazar = null, $Buscar = null)
    {
        $Reemplazar = (empty($Reemplazar)) ? "" : $Reemplazar;
        $s['Str'] = $Str;
        $s['Reemplazar'] = $Reemplazar;
        $s['Buscar'] = $Buscar;

        return Str::replaceFirst($Buscar, $Reemplazar, $Str);


    }

    public static function RetornaJson($v = [])
    {
        //$c = new Functions();
        $v['status'] = (!isset($v['status'])) ? 400 : $v['status'];
        if ($v['status'] == 400 or !isset($v['status'])) {
            return new Response($v, 400, array(
                //'Content-Type' => $mime,
                //'Cache-Control' => 'max-age=' . (config('imagecache.lifetime') * 60) . ', public',
                //'Etag' => md5($content)
            ));
        };
        $v['status'] = (!isset($v['status'])) ? 200 : $v['status'];
        $v['sms'] = (!isset($v['sms'])) ? 'Consulta Existosa' : $v['sms'];
        //(new PublicController())->ComprimirText()
        return new Response($v, $v['status'], array(
            //'Content-Type' => $mime,
            //'Cache-Control' => 'max-age=' . (config('imagecache.lifetime') * 60) . ', public',
            //'Etag' => md5($content)
        ));

        return json_encode((new PublicController())->ComprimirText($v));
    }

    public static function is_Json($str)
    {
        return ((is_string($str) &&
            (is_object(json_decode($str)) ||
                is_array(json_decode($str))))) ? true : false;
    }

    public static function SoloNumeros($str)
    {
        //$conservar = '0-9a-z'; // juego de caracteres a conservar

        return preg_replace(sprintf('~[^%s]++~i', '0-9'), '', $str);
    }

    public static function ConvertirNumeroAFloat($numero, $decimales = 2)
    {

        $numero = Functions::BuscarReemplazarString($numero, '', '.');
        $numero = Functions::BuscarReemplazarString($numero, '.', ',');
        $numero = (float)(Functions::BuscarReemplazarString($numero, '', 'cm')) * 1;

        $numero = number_format($numero, $decimales, '.', '') * 1;

        return $numero;
    }

    public static function LimpiarInt($numero)
    {
        return filter_var(intval($numero), FILTER_SANITIZE_EMAIL);
    }

    public static function ComprobarCorreo($email = null)
    {
        /*Comprueba que un email es valido*/

        $email = Functions::LimpiarCorreo($email);

        if (empty($email)) return false;
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    public static function LimpiarCorreo($email = null)
    {
        return strtolower(filter_var($email, FILTER_SANITIZE_EMAIL));
    }

    public static function CompartirTwitter($text = null, $url = null)
    {
        return "http://twitter.com/share?text=$text&url=$url&hashtags=" . str_replace(' ', '', \Config::get('app.name'));
    }

    public static function CompartirFacebook($titulo = null, $url = null)
    {
        return "https://www.facebook.com/sharer.php?u=$url&t=$titulo";
    }

    public static function CompartirPinterest($descripcion = null, $url = null)
    {
        return "http://pinterest.com/pin/create/button/?url=$url&description=$descripcion";
    }

    public static function CompartirGoogle($url = null)
    {
        return "https://plus.google.com/share?url=$url";
    }

    public static function NombrePais($id)
    {
        $pais = Country::find($id);
        return (!empty($pais)) ? $pais->getName() : '';
    }

    public static function NombreProvincia($id)
    {
        $pais = State::find($id);
        return (!empty($pais)) ? $pais->getName() : '';
    }

    public static function CurrentYear()
    {

        return Carbon::now()->format('Y');
    }

    public static function Monedas()
    {
        $moneda = [
            "AED" => 'United Arab Emirates Dirham (AED)',
            "AFN" => 'Afghan Afghani (AFN)',
            "ALL" => 'Albanian Lek (ALL)',
            "AMD" => 'Armenian Dram (AMD)',
            "ANG" => 'Netherlands Antillean Guilder (ANG)',
            "AOA" => 'Angolan Kwanza (AOA)',
            "ARS" => 'Argentine Peso (ARS)',
            "AUD" => 'Australian Dollar (A$)',
            "AWG" => 'Aruban Florin (AWG)',
            "AZN" => 'Azerbaijani Manat (AZN)',
            "BAM" => 'Bosnia-Herzegovina Convertible Mark (BAM)',
            "BBD" => 'Barbadian Dollar (BBD)',
            "BDT" => 'Bangladeshi Taka (BDT)',
            "BGN" => 'Bulgarian Lev (BGN)',
            "BHD" => 'Bahraini Dinar (BHD)',
            "BIF" => 'Burundian Franc (BIF)',
            "BMD" => 'Bermudan Dollar (BMD)',
            "BND" => 'Brunei Dollar (BND)',
            "BOB" => 'Bolivian Boliviano (BOB)',
            "BRL" => 'Brazilian Real (R$)',
            "BSD" => 'Bahamian Dollar (BSD)',
            "BTC" => 'Bitcoin (฿)',
            "BTN" => 'Bhutanese Ngultrum (BTN)',
            "BWP" => 'Botswanan Pula (BWP)',
            "BYN" => 'Belarusian Ruble (BYN)',
            "BYR" => 'Belarusian Ruble (2000–2016) (BYR)',
            "BZD" => 'Belize Dollar (BZD)',
            "CAD" => 'Canadian Dollar (CA$)',
            "CDF" => 'Congolese Franc (CDF)',
            "CHF" => 'Swiss Franc (CHF)',
            "CLF" => 'Chilean Unit of Account (UF) (CLF)',
            "CLP" => 'Chilean Peso (CLP)',
            "CNH" => 'Chinese Yuan (offshore) (CNH)',
            "CNY" => 'Chinese Yuan (CN¥)',
            "COP" => 'Colombian Peso (COP)',
            "CRC" => 'Costa Rican Colón (CRC)',
            "CUP" => 'Cuban Peso (CUP)',
            "CVE" => 'Cape Verdean Escudo (CVE)',
            "CZK" => 'Czech Koruna (CZK)',
            "DEM" => 'German Mark (DEM)',
            "DJF" => 'Djiboutian Franc (DJF)',
            "DKK" => 'Danish Krone (DKK)',
            "DOP" => 'Dominican Peso (DOP)',
            "DZD" => 'Algerian Dinar (DZD)',
            "EGP" => 'Egyptian Pound (EGP)',
            "ERN" => 'Eritrean Nakfa (ERN)',
            "ETB" => 'Ethiopian Birr (ETB)',
            "EUR" => 'Euro (€)',
            "FIM" => 'Finnish Markka (FIM)',
            "FJD" => 'Fijian Dollar (FJD)',
            "FKP" => 'Falkland Islands Pound (FKP)',
            "FRF" => 'French Franc (FRF)',
            "GBP" => 'British Pound (£)',
            "GEL" => 'Georgian Lari (GEL)',
            "GHS" => 'Ghanaian Cedi (GHS)',
            "GIP" => 'Gibraltar Pound (GIP)',
            "GMD" => 'Gambian Dalasi (GMD)',
            "GNF" => 'Guinean Franc (GNF)',
            "GTQ" => 'Guatemalan Quetzal (GTQ)',
            "GYD" => 'Guyanaese Dollar (GYD)',
            "HKD" => 'Hong Kong Dollar (HK$)',
            "HNL" => 'Honduran Lempira (HNL)',
            "HRK" => 'Croatian Kuna (HRK)',
            "HTG" => 'Haitian Gourde (HTG)',
            "HUF" => 'Hungarian Forint (HUF)',
            "IDR" => 'Indonesian Rupiah (IDR)',
            "IEP" => 'Irish Pound (IEP)',
            "ILS" => 'Israeli New Shekel (₪)',
            "INR" => 'Indian Rupee (₹)',
            "IQD" => 'Iraqi Dinar (IQD)',
            "IRR" => 'Iranian Rial (IRR)',
            "ISK" => 'Icelandic Króna (ISK)',
            "ITL" => 'Italian Lira (ITL)',
            "JMD" => 'Jamaican Dollar (JMD)',
            "JOD" => 'Jordanian Dinar (JOD)',
            "JPY" => 'Japanese Yen (¥)',
            "KES" => 'Kenyan Shilling (KES)',
            "KGS" => 'Kyrgystani Som (KGS)',
            "KHR" => 'Cambodian Riel (KHR)',
            "KMF" => 'Comorian Franc (KMF)',
            "KPW" => 'North Korean Won (KPW)',
            "KRW" => 'South Korean Won (₩)',
            "KWD" => 'Kuwaiti Dinar (KWD)',
            "KYD" => 'Cayman Islands Dollar (KYD)',
            "KZT" => 'Kazakhstani Tenge (KZT)',
            "LAK" => 'Laotian Kip (LAK)',
            "LBP" => 'Lebanese Pound (LBP)',
            "LKR" => 'Sri Lankan Rupee (LKR)',
            "LRD" => 'Liberian Dollar (LRD)',
            "LSL" => 'Lesotho Loti (LSL)',
            "LTL" => 'Lithuanian Litas (LTL)',
            "LVL" => 'Latvian Lats (LVL)',
            "LYD" => 'Libyan Dinar (LYD)',
            "MAD" => 'Moroccan Dirham (MAD)',
            "MDL" => 'Moldovan Leu (MDL)',
            "MGA" => 'Malagasy Ariary (MGA)',
            "MKD" => 'Macedonian Denar (MKD)',
            "MMK" => 'Myanmar Kyat (MMK)',
            "MNT" => 'Mongolian Tugrik (MNT)',
            "MOP" => 'Macanese Pataca (MOP)',
            "MRO" => 'Mauritanian Ouguiya (MRO)',
            "MUR" => 'Mauritian Rupee (MUR)',
            "MVR" => 'Maldivian Rufiyaa (MVR)',
            "MWK" => 'Malawian Kwacha (MWK)',
            "MXN" => 'Mexican Peso (MX$)',
            "MYR" => 'Malaysian Ringgit (MYR)',
            "MZN" => 'Mozambican Metical (MZN)',
            "NAD" => 'Namibian Dollar (NAD)',
            "NGN" => 'Nigerian Naira (NGN)',
            "NIO" => 'Nicaraguan Córdoba (NIO)',
            "NOK" => 'Norwegian Krone (NOK)',
            "NPR" => 'Nepalese Rupee (NPR)',
            "NZD" => 'New Zealand Dollar (NZ$)',
            "OMR" => 'Omani Rial (OMR)',
            "PAB" => 'Panamanian Balboa (PAB)',
            "PEN" => 'Peruvian Sol (PEN)',
            "PGK" => 'Papua New Guinean Kina (PGK)',
            "PHP" => 'Philippine Piso (PHP)',
            "PKG" => 'PKG (PKG)',
            "PKR" => 'Pakistani Rupee (PKR)',
            "PLN" => 'Polish Zloty (PLN)',
            "PYG" => 'Paraguayan Guarani (PYG)',
            "QAR" => 'Qatari Rial (QAR)',
            "RON" => 'Romanian Leu (RON)',
            "RSD" => 'Serbian Dinar (RSD)',
            "RUB" => 'Russian Ruble (RUB)',
            "RWF" => 'Rwandan Franc (RWF)',
            "SAR" => 'Saudi Riyal (SAR)',
            "SBD" => 'Solomon Islands Dollar (SBD)',
            "SCR" => 'Seychellois Rupee (SCR)',
            "SDG" => 'Sudanese Pound (SDG)',
            "SEK" => 'Swedish Krona (SEK)',
            "SGD" => 'Singapore Dollar (SGD)',
            "SHP" => 'St. Helena Pound (SHP)',
            "SKK" => 'Slovak Koruna (SKK)',
            "SLL" => 'Sierra Leonean Leone (SLL)',
            "SOS" => 'Somali Shilling (SOS)',
            "SRD" => 'Surinamese Dollar (SRD)',
            "STD" => 'São Tomé &amp; Príncipe Dobra (STD)',
            "SVC" => 'Salvadoran Colón (SVC)',
            "SYP" => 'Syrian Pound (SYP)',
            "SZL" => 'Swazi Lilangeni (SZL)',
            "THB" => 'Thai Baht (THB)',
            "TJS" => 'Tajikistani Somoni (TJS)',
            "TMT" => 'Turkmenistani Manat (TMT)',
            "TND" => 'Tunisian Dinar (TND)',
            "TOP" => 'Tongan Paʻanga (TOP)',
            "TRY" => 'Turkish Lira (TRY)',
            "TTD" => 'Trinidad &amp; Tobago Dollar (TTD)',
            "TWD" => 'New Taiwan Dollar (NT$)',
            "TZS" => 'Tanzanian Shilling (TZS)',
            "UAH" => 'Ukrainian Hryvnia (UAH)',
            "UGX" => 'Ugandan Shilling (UGX)',
            "USD" => 'US Dollar ($)',
            "UYU" => 'Uruguayan Peso (UYU)',
            "UZS" => 'Uzbekistani Som (UZS)',
            "VEF" => 'Venezuelan Bolívar (VEF)',
            "VND" => 'Vietnamese Dong (₫)',
            "VUV" => 'Vanuatu Vatu (VUV)',
            "WST" => 'Samoan Tala (WST)',
            "XAF" => 'Central African CFA Franc (FCFA)',
            "XCD" => 'East Caribbean Dollar (EC$)',
            "XDR" => 'Special Drawing Rights (XDR)',
            "XOF" => 'West African CFA Franc (CFA)',
            "XPF" => 'CFP Franc (CFPF)',
            "YER" => 'Yemeni Rial (YER)',
            "ZAR" => 'South African Rand (ZAR)',
            "ZMK" => 'Zambian Kwacha (1968–2012) (ZMK)',
            "ZMW" => 'Zambian Kwacha (ZMW)',
            "ZWL" => 'Zimbabwean Dollar (2009) (ZWL)',
        ];
        return $moneda;

    }

    public static function currencyConverter($to = 'EUR', $cantidad = 1, $from = 'EUR')
    {
        $moneda = Moneda::where('small', $to)->first();
        if (empty($moneda)) return null;

        $valor = $moneda->valor;
        if (empty($valor) || $valor <= 0) {
            $valor = 1.0;
        }

        $cantidad = str_replace('.', '', (string)$cantidad);
        $cantidad = str_replace(',', '.', $cantidad);
        $rate = (float)$cantidad * (float)$valor;

        return $rate;
    }


    public static function currencyConverter1($to = 'EUR', $cantidad = 1, $from = 'EUR')
    {
        //$cantidad = Functions::RetornaNumero($cantidad);
        $cantidad = str_replace('.', '', $cantidad);
        $cantidad = str_replace(',', '.', $cantidad);
        $meta = null;
        $url = "http://finance.google.com/finance/converter?a=$cantidad&from=$from&to=$to";
        //\Log::critical("Url de comprobacion moneda $url");
        $response = self::ConsultaCurlMoneda($url);
        $dom = new DOMDocument();
# Parse the HTML
# The @ before the method call suppresses any warnings that
# loadHTML might throw because of invalid HTML in the page.
        @$dom->loadHTML($response);
        foreach ($dom->getElementsByTagName('input') as $input) {
            # Show the attribute value
            if ($input->getAttribute('name') == 'meta') {
                $meta = $input->getAttribute('value');
            }
            // echo $input->getAttribute('name') ." -> " .$input->getAttribute('value') . "<br />";
        }
        if (empty($meta)) return null;

        $url = "http://finance.google.com/finance/converter?a=$cantidad&from=$from&to=$to&meta=$meta";
        $response = self::ConsultaCurlMoneda($url);
        $regularExpression = '#\<span class=bld\>(.+?)\<\/span\>#s';
        preg_match($regularExpression, $response, $finalData);

        if (count($finalData) != 0) {
            $rate = $finalData[0];
            $rate = strip_tags($rate);
            $rate = substr($rate, 0, -4);

        } else {
            $rate = null;
        }
        return $rate;
    }

    public static function ConsultaCurlMoneda($url)
    {
        $request = curl_init();
        $timeOut = 0;
        curl_setopt($request, CURLOPT_URL, $url);
        curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($request, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
        curl_setopt($request, CURLOPT_CONNECTTIMEOUT, $timeOut);
        $response = curl_exec($request);
        curl_close($request);
        return $response;
    }

    public static function facebookDebugger($url)
    {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/v1.0/?id=' . urlencode($url) . '&scrape=1');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $r = curl_exec($ch);
        return $r;

    }

    public static function RetornoSlugCaballo($slugs)
    {
        $st = '';
        $total = count($slugs);
        for ($i = 0; $i < $total; $i++) {
            if ($i < ($total - 1)) {
                $st .= $slugs[$i] . ',';
            } else {
                $st .= $slugs[$i];
            }

        }
        return $st;

    }

    /*
        public static function currencyConverter($from_Currency,$to_Currency,$amount) {
            $from_Currency = urlencode($from_Currency);
            $to_Currency = urlencode($to_Currency);
            $encode_amount = 1;
            $url = "https://www.google.com/finance/converter?a=$encode_amount&from=$from_Currency&to=$to_Currency";
            dd($url);
            $get = file_get_contents($url);
            $get = explode("<span class=bld>",$get);
            $get = explode("</span>",$get[1]);
            $converted_currency = preg_replace("/[^0-9.]/", null, $get[0]);
            return $converted_currency;
        }
        */

    public static function NombreDeRuta($data = [])
    {
        return Route::currentRouteName();

    }

    public static function ReemplazarApostrofe($str)
    {
        return str_replace("'", '\\\'', $str);
    }

    public static function ReemplazarComilla($str)
    {
        return str_replace('"', '\\"', $str);
    }

    public static function DevolverComilla($str)
    {
        return str_replace('\\"', '"', $str);
    }

    /*public static function convertCurrency($from, $to){*/

    public static function CortarCadena($str, $fin)
    {
        $t = strlen($str);
        if ($t < $fin) {
            return $str;
        }
        return substr($str, 0, $fin) . "...";
    }

    public static function TableHtml($c1 = null, $c2 = null, $coloryeguada = "000")
    {
        $t = "<table class=\"currentTable\" border=\"0\" align=\"left\" width=\"100%\" cellspacing=\"0\" 
cellpadding=\"0\" style=\"letter-spacing: 2px;width: 100%;font-size: 13px; font-weight: 700; color: #8f96a1;\" > <tbody> <tr> <td style='color: $coloryeguada; width: 70px' > $c1 </td> <td style='letter-spacing: 2px;font-weight: 700;width: 200px;letter-spacing: 1px;
    font-weight: 300;' width='200'> $c2 </td> </tr> </tbody> </table>";
        return $t;
    }

    public static function CambiarIdiomaUrl($url)
    {
        //return $url;
        $f = $url;
        $bus = [
            0 => 'es/it/',
            1 => 'es/fr/',
            2 => 'es/es/',
            3 => 'es/en/',
            4 => 'es/nl/',
            5 => 'es/de/',
            6 => 'es/pt/',

            7 => 'en/it/',
            8 => 'en/fr/',
            9 => 'en/es/',
            10 => 'en/en/',
            11 => 'en/nl/',
            12 => 'en/de/',
            13 => 'en/pt/',


            14 => 'pt/it/',
            15 => 'pt/fr/',
            16 => 'pt/es/',
            17 => 'pt/en/',
            18 => 'pt/nl/',
            19 => 'pt/de/',
            20 => 'pt/pt/',


            21 => 'de/it/',
            22 => 'de/fr/',
            23 => 'de/es/',
            24 => 'de/en/',
            25 => 'de/nl/',
            26 => 'de/de/',
            27 => 'de/pt/',


            28 => 'it/it/',
            29 => 'it/fr/',
            30 => 'it/es/',
            31 => 'it/en/',
            32 => 'it/nl/',
            33 => 'it/de/',
            34 => 'it/pt/',


            35 => 'fr/it/',
            36 => 'fr/fr/',
            37 => 'fr/es/',
            38 => 'fr/en/',
            39 => 'fr/nl/',
            40 => 'fr/de/',
            41 => 'fr/pt/',
        ];


        for ($as = 0; $as < count($bus); $as++) {
            if ($as >= 0 and $as <= 6) {
                /*es*/
                $rep = 'es/';
                $b = $bus[$as];
                if (self::BoleanoBuscarString($b, $rep) == true) {
                    $f = str_replace($b, $rep, $f);
                    return $f;
                }
            } elseif ($as >= 7 and $as <= 13) {
                /*en*/
                $rep = 'en/';
                $b = $bus[$as];
                if (self::BoleanoBuscarString($b, $rep) == true) {
                    $f = str_replace($b, $rep, $f);
                    return $f;
                }
            } elseif ($as >= 14 and $as <= 20) {
                /*pt*/
                $rep = 'pt/';
                $b = $bus[$as];
                if (self::BoleanoBuscarString($b, $rep) == true) {
                    $f = str_replace($b, $rep, $f);
                    return $f;
                }
            } elseif ($as >= 21 and $as <= 27) {
                /*de*/
                $rep = 'de/';
                $b = $bus[$as];
                if (self::BoleanoBuscarString($b, $rep) == true) {
                    $f = str_replace($b, $rep, $f);
                    return $f;
                }
            } elseif ($as >= 28 and $as <= 34) {
                /*it*/
                $rep = 'it/';
                $b = $bus[$as];
                if (self::BoleanoBuscarString($b, $rep) == true) {
                    $f = str_replace($b, $rep, $f);
                    return $f;
                }
            } elseif ($as >= 35 and $as <= 41) {
                /*fr*/
                $rep = 'fr/';
                $b = $bus[$as];
                if (self::BoleanoBuscarString($b, $rep) == true) {
                    $f = str_replace($b, $rep, $f);
                    return $f;
                }
            }
        }
        return $url;


        /**********************************/
        /**********************************/
        /**********************************/
        /**********************************/
        $t = substr($url, 3, 3);
        $ds = \Config::get('lenguaje');;

        $total = \Config::get('applocale');
        foreach ($ds as $k => $v) {
            $w = $k . "/";
            $d = Functions::BuscarEnString($w, $t);
            if ($d == true) {

                //$t = substr($url, 3);
                $t = explode('/', $url);
                $ts = '';
                foreach ($t as $r => $e) {
                    if ($r < count($t) - 1) {
                        if ($r != 0) {
                            $ts .= $e . "/";
                        }
                    } else {
                        $ts .= $e;
                    }

                }
                $url = Functions::CambiarIdiomaUrl($ts);
            }
        }

        return $total . "/" . $url;


    }

    public static function BuscarEnString($Str = null, $Buscar = null)
    {
        $Str = strtolower($Str);
        $Buscar = strtolower($Buscar);
        $t = false;
        try {
            $t = strpos($Str, $Buscar);
        } catch (\ErrorException $e) {
            $t = false;
            //dd($Buscar);
        }
        return ($t !== false) ? true : false;

    }

    public static function MedirFuncion($nombrefuncion, $id = 0, $tiempo = 0)
    {
        \Log::debug("Evaluando $nombrefuncion");
    }

    public static function ReloadFacebook($url)
    {
        $graph = 'https://graph.facebook.com/';
        $post = 'id=' . urlencode($url) . '&scrape=true';
        return self::ReloadFacebookCurl($graph, $post);
    }

    private static function ReloadFacebookCurl($url, $post)
    {
        $r = curl_init();
        curl_setopt($r, CURLOPT_URL, $url);
        curl_setopt($r, CURLOPT_POST, 1);
        curl_setopt($r, CURLOPT_POSTFIELDS, $post);
        curl_setopt($r, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($r, CURLOPT_CONNECTTIMEOUT, 5);
        $data = curl_exec($r);
        curl_close($r);
        return $data;
    }

    public static function Hex2Rgba($hex = null, $alfa = 1)
    {
        $hex = str_replace('#', '', $hex);
        $length = strlen($hex);
        $r = hexdec($length == 6 ? substr($hex, 0, 2) : ($length == 3 ? str_repeat(substr($hex, 0, 1), 2) : 0));
        $g = hexdec($length == 6 ? substr($hex, 2, 2) : ($length == 3 ? str_repeat(substr($hex, 1, 1), 2) : 0));
        $b = hexdec($length == 6 ? substr($hex, 4, 2) : ($length == 3 ? str_repeat(substr($hex, 2, 1), 2) : 0));
        if ($alfa) {
            $a = $alfa;
        }
        $sal = "$r,$g,$b,$a";
        return $sal;
        return $rgb;
    }

    public static function MetodosPorRoute(?\Illuminate\Routing\Route $ruta = null)
    {
        if (empty($ruta)) {
            return ['parametro' => [], 'lenguaje' => \Illuminate\Support\Facades\App::getLocale(), '$nombre' => '', 'uri' => '', 'lng' => []];
        }
        $lng = [

            0 => 'es',
            1 => 'en',
            2 => 'de',
            3 => 'fr',
            4 => 'it',
            5 => 'nl',
            6 => 'pt',
        ];
        $objeto = [];
        $lenguaje = App::getLocale();


        $parametros = $ruta->parameters();
        $nombre = $ruta->getName();
        $uri = $ruta->uri();


        $objeto['parametro'] = $parametros;
        $objeto['lenguaje'] = $lenguaje;
        $objeto['$nombre'] = $nombre;
        $objeto['uri'] = $uri;
        if (!empty($nombre)) {
            try {
                $wd = route($nombre, $parametros);
            } catch (\Exception $e) {
                $wd = \Request::url();
            }
        } else {
            $wd = $uri;
        }

        $wd = str_replace("/" . $lenguaje . "/", "/", $wd);

        $lngs = [];
        /*Limpiar la url de idioma*/
        for ($i = 0; $i < count($lng); $i++) {
            $lngs[$lng[$i]] = self::CambioUrlIdioma($wd, $lng[$i]);
        }

        $objeto['lng'] = Collection::make($lngs);
        //$objeto['lng'] = $lngs;
        //dd($objeto);
        $collection = Collection::make($objeto);
        App::setLocale($lenguaje);
        return ($collection);


        //$idiomas

    }

    public static function CambioUrlIdioma($url, $leng = null, $limpio = 0)
    {

        /*Obtiene el nombre de la ruta*/
        /*DA PROBLEMAS CON TENER EL NOMBRE DE RUTA*/

        /*
        Route::dispatchToRoute(Request::create($url));
        $route = Route::currentRouteName();
        dd($ruta);
        */
        /**/
        $htt = "http://";
        $ac = $leng = App::getLocale();
        if (empty($leng)) {
            $leng = App::getLocale();
        }
        $st = str_replace($htt, '', $url);
        $ex = explode("/", $st);
        $da = '';

        /*Limpiar la url de idioma*/
        $lng = [
            0 => 'es',
            1 => 'en',
            2 => 'de',
            3 => 'fr',
            4 => 'it',
            5 => 'nl',
            6 => 'pt',
        ];

        /*Limpiar la url de idioma*/

        $kk = [];
        for ($i = 0; $i < count($ex); $i++) {
            $nom = 0;

            if ($i == 0) {

                if ($limpio == 0) {
                    $da = $ex[0] . "/$leng/";
                } else {
                    $da = $ex[0] . "/";
                }

            } else {
                //array_push($kk, [$i=>$ex[$i]]);
                if ($i == 1) {
                    if (isset($ex[$i])) {
                        $t = $ex[$i];
                        $k = strlen($t);
                        if ($k == 2) {
                            for ($f = 0; $f < count($lng); $f++) {
                                if (strtolower($t) == $lng[$f]) {
                                    $nom = 1;
                                }
                            }

                        }
                    }
                    if ($nom == 0) {
                        $da = $da . $ex[$i] . "/";

                    }
                } else {
                    $da = $da . $ex[$i] . "/";
                }

            }
        }

        $da = str_replace('//', "/", $da);
        $da = substr($da, 0, -1);

        return ($htt . $da);

    }

    public static function NombreRuta($uri = null)
    {
        if ($uri == null) {
            $uri = $_SERVER['REQUEST_URI'];
        }
        Route::dispatchToRoute(Request::create($uri));
        return Route::currentRouteName();

    }

    public function previous()
    {
        $referrer = $this->request->headers->get('referer');
        $url = $referrer ? $this->to($referrer) : $this->getPreviousUrlFromSession();
        return $url ?: $this->to('/');
    }

    function generate_favicon()
    {
        //http://bgallz.org/488/php-favicon-generator-script/#sthash.vwIE1wAm.dpbs
// Create favicon.
        $postvars = array(
            "image" => trim($_FILES["image"]["name"]),
            "image_tmp" => $_FILES["image"]["tmp_name"],
            "image_size" => (int)$_FILES["image"]["size"],
            "image_dimensions" => (int)$_POST["image_dimensions"]);
// Provide valid extensions and max file size
        $valid_exts = array("jpg", "jpeg", "gif", "png");
        $max_file_size = 179200; // 175kb
        $filenameParts = explode(".", $postvars["image"]);
        $ext = strtolower(end($filenameParts));
        $directory = "./favicon/"; // Directory to save favicons. Include trailing slash.
        $rand = rand(1000, 9999);
        $filename = $rand . $postvars["image"];
// Check not larger than 175kb.
        if ($postvars["image_size"] <= 179200) {
// Check is valid extension.
            if (in_array($ext, $valid_exts)) {
                if ($ext == "jpg" || $ext == "jpeg") {
                    $image = imagecreatefromjpeg($postvars["image_tmp"]);
                } else if ($ext == "gif") {
                    $image = imagecreatefromgif($postvars["image_tmp"]);
                } else if ($ext == "png") {
                    $image = imagecreatefrompng($postvars["image_tmp"]);
                }
                if ($image) {
                    list($width, $height) = getimagesize($postvars["image_tmp"]);
                    $newwidth = $postvars["image_dimensions"];
                    $newheight = $postvars["image_dimensions"];
                    $tmp = imagecreatetruecolor($newwidth, $newheight);
// Copy the image to one with the new width and height.
                    imagecopyresampled($tmp, $image, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
// Create image file with 100% quality.
                    if (is_dir($directory)) {
                        if (is_writable($directory)) {
                            imagejpeg($tmp, $directory . $filename, 100) or die('Could not make image file');
                            if (file_exists($directory . $filename)) {
// Image created, now rename it to its
                                $ext_pos = strpos($rand . $postvars["image"], "." . $ext);
                                $strip_ext = substr($rand . $postvars["image"], 0, $ext_pos);
// Rename image to .ico file
                                rename($directory . $filename, $directory . $strip_ext . ".ico");
                                return '<strong>Icon Preview:</strong><br/>
<img src="' . $directory . $strip_ext . '.ico" border="0" title="Favicon  Image Preview" style="padding: 4px 0px 4px 0px;background-color:#e0e0e0" />
Favicon successfully generated. <a href="' . $directory . $strip_ext . '.ico" target="_blank" name="Download favicon.ico now!">Click here to download your favicon.</a>';
                            } else {
                                "File was not created.";
                            }
                        } else {
                            return 'The directory: "' . $directory . '" is not writable.';
                        }
                    } else {
                        return 'The directory: "' . $directory . '" is not valid.';
                    }
                    imagedestroy($image);
                    imagedestroy($tmp);
                } else {
                    return "Could not create image file.";
                }
            } else {
                return "File size too large. Max allowed file size is 175kb.";
            }
        } else {
            return "Invalid file type. You must upload an image file. (jpg, jpeg, gif, png).";
        }
    }

    function get_web_page($url)
    {
        /*Perfil de fb*/
        $user_agent = 'Mozilla/5.0 (Windows NT 6.1; rv:8.0) Gecko/20100101 Firefox/8.0';

        $options = array(

            CURLOPT_CUSTOMREQUEST => "GET",        //set request type post or get
            CURLOPT_POST => false,        //set to GET
            CURLOPT_USERAGENT => $user_agent, //set user agent
            CURLOPT_COOKIEFILE => "cookie.txt", //set cookie file
            CURLOPT_COOKIEJAR => "cookie.txt", //set cookie jar
            CURLOPT_RETURNTRANSFER => true,     // return web page
            CURLOPT_HEADER => false,    // don't return headers
            CURLOPT_FOLLOWLOCATION => true,     // follow redirects
            CURLOPT_ENCODING => "",       // handle all encodings
            CURLOPT_AUTOREFERER => true,     // set referer on redirect
            CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
            CURLOPT_TIMEOUT => 120,      // timeout on response
            CURLOPT_MAXREDIRS => 10,       // stop after 10 redirects
        );

        $ch = curl_init($url);
        curl_setopt_array($ch, $options);
        $content = curl_exec($ch);
        $err = curl_errno($ch);
        $errmsg = curl_error($ch);
        $header = curl_getinfo($ch);
        curl_close($ch);

        $header['errno'] = $err;
        $header['errmsg'] = $errmsg;
        $header['content'] = $content;
        return $header;
    }

    public function RegenerarCaballo()
    {
        $horse = Horse::all();
        foreach ($horse as $k => $v) {
            echo $v->slug . "<br>";
            $v->push();
        }
    }

    public function ArrayToXml($Array = [], $filename, $excluirCdata = [])
    {
        $xml = new DOMDocument('1.0');
        $xml->formatOutput = true;
        $xml->preserveWhiteSpace = false;


        $td = self::ArrayCdata($Array, $excluirCdata, $xml);
        $_id = $Array['ad']['id'];
        $root = $xml->createElement('xml');
        $xml->appendChild($root);
        self::arrayToDomNodes($xml, $td, $root);
        $tex = $xml->saveXML();
        $tex = str_replace('&lt;', '<', $tex);
        $tex = str_replace('&gt;', '>', $tex);
        $folder = public_path() . DS;

        $d = null;

        if (!empty($filename)) {
            $file = $folder . $filename . ".xml";
            if (is_file($file)) {
                $xml->load($file);
            } else {
                File::put($file, $tex);
                $xml->load($file);
                //$xml->save($file);
            }

        } else {
            return null;
        }
        $ids = $xml->getElementsByTagName('id');
        foreach ($ids as $id_xml) {
            if ($id_xml->nodeValue == $_id) {
                //echo "existe el ide $_id <br>";
                flash('Ya se encuentra publicado en ' . $filename)->info();
                $exist = 1;
            } else {
                flash('Se ha publicado en ' . $filename)->success();
                $w = str_replace('<?xml version="1.0" encoding="utf-8"?>', '', $tex);
                $w = str_replace('<xml>', '', $w);
                $w = str_replace('</xml>', '', $w);
                $f = $xml->createDocumentFragment();
                $f->appendXML($w);
                $xml->documentElement->appendChild($f);
                $d = $xml->saveXML();
                $d = str_replace("<xml>", "<$filename>", $d);
                $d = str_replace("</xml>", "</$filename>", $d);
                File::put($file, $d);
                $xml->loadXML($d);

            }
        }
        if (!empty($d)) {
            $xml->loadXML($d);
        }
        return $xml;

    }

    /**
     * Construye nodos DOM desde un array (equivalente a SoapBox\Formatter
     * sin depender de esa libreria). Los valores que empiezan por
     * "<![CDATA[" se insertan como secciones CDATA reales.
     */
    private static function arrayToDomNodes(DOMDocument $xml, array $array, \DOMElement $parent)
    {
        foreach ($array as $k => $v) {
            $parts = preg_split('/\s+/', (string) $k, 2);
            $nodeName = $parts[0];
            $attrs = isset($parts[1]) ? $parts[1] : null;

            if (is_array($v)) {
                $el = $xml->createElement($nodeName);
                self::applyNodeAttributes($el, $attrs);
                $parent->appendChild($el);
                self::arrayToDomNodes($xml, $v, $el);
            } elseif (is_string($v) && strpos($v, '<![CDATA[') === 0) {
                $el = $xml->createElement($nodeName);
                self::applyNodeAttributes($el, $attrs);
                $el->appendChild($xml->createCDATASection(substr($v, 9, -3)));
                $parent->appendChild($el);
            } else {
                $el = $xml->createElement($nodeName);
                self::applyNodeAttributes($el, $attrs);
                $el->appendChild($xml->createTextNode((string) $v));
                $parent->appendChild($el);
            }
        }
    }

    /**
     * Aplica atributos en formato "clave=\"valor\"" a un elemento DOM.
     */
    private static function applyNodeAttributes(\DOMElement $el, $attrs = null)
    {
        if (empty($attrs)) {
            return;
        }
        if (preg_match_all('/([a-zA-Z0-9_\-:]+)="([^"]*)"/', $attrs, $m)) {
            foreach ($m[1] as $i => $name) {
                $el->setAttribute($name, $m[2][$i]);
            }
        }
    }

    public function ArrayCdata($Array = [], $excluir = [], $xml = null)
    {
        if (empty($xml)) $xml = new DOMDocument('1.0');
        $td = [];
        foreach ($Array as $k => $v) {
            if (array_key_exists($k, $excluir) == true) {
                $td[$k] = $v;
            } else {
                if (!is_array($v)) {
                    if ($k == 'price') {
                        $td[$k . ' currency="EUR"'] = "<![CDATA[$v]]>";
                    } else {

                        $td[$k] = "<![CDATA[$v]]>";
                    }
                } else {
                    $td[$k] = self::ArrayCdata($v);
                }
            }
        }
        return $td;
    }

    public function ArrayToXmlData($array = [], $xml = null, $nombre = '')
    {
        if (empty($xml)) $xml = new DOMDocument('1.0');
        //$ads = $xml->getElementsByTagName("ADS")->item(0);
        $ads = $xml->getElementsByTagName($nombre)->item(0);
        foreach ($array as $k => $v) {
            if ($k != 'ad') {
                if (!is_array($v)) {
                    $el = $xml->createElement($k);
                    $data = $xml->createCDATASection($v);
                    $ads->appendChild($el);
                    $el->appendChild($data);

                } else {
                    $xml = self::ArrayToXmlData($array, $xml, $nombre);
                }
            }
        }


        return $xml;
    }

    public function TimeZoneArray()
    {
        $zones = timezone_identifiers_list();
        return $zones;
    }

    Public function TZ(Request $r)
    {
        $alt = 1;
        $tx = null;
        $timezone = \Session::get('timezone');
        if (empty($timezone)) {
            $ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : $r->getClientIp();  //$_SERVER['REMOTE_ADDR']

            $e = 0;
            try {
                set_time_limit(10);
                $s = geoip($ip);
                $d = [];
                $d["ip"] = $s['ip'];// "186.93.232.6";
                $d["iso_code"] = $s['iso_code'];// "VE"
                $d["country"] = $s['country'];// "Venezuela"
                $d["city"] = $s['city'];// "Caracas (Roca Tarpeya)"
                $d["state"] = $s['state'];// ""
                $d["state_name"] = $s['state_name'];// "Capital"
                $d["postal_code"] = $s['postal_code'];// ""
                $d["lat"] = $s['lat'];// 10.4917
                $d["lon"] = $s['lon'];// -66.9138
                $d["timezone"] = $s['timezone'];// "America/Caracas"
                $tx = $d["timezone"];
                \Session::put('timezone', $d["timezone"]);
                $d["continent"] = $s['continent'];// "Unknown"
                $d["currency"] = $s['currency'];// "VEF"
                \Session::put('moneda', $d["currency"]);
                foreach ($d as $k => $v) {
                    \Session::put($k, $v);
                    \Session::put($k, $v);

                }
            } catch (\ErrorException $e) {
                $e = 1;

            } catch (\FatalErrorException $e) {
                $e = 1;

            }
            if ($e == 1) {

                try {
                    $url2 = "https://ipapi.co/$ip/json";
                    $f = self::alt_file_get_contents_curl($url2);
                    $f = json_decode($f);

                    if (!empty($f)) {
                        foreach ($f as $t => $d) {
                            \Session::put($t, $d);
                            \Session::put($t, $d);
                        }
                        if (!empty($f->timezone)) {
                            $tx = $f->timezone;
                        }
                    }
                } catch (\ErrorException $e) {
                    $e = 1;
                }
            }


        } else {
            $tx = $timezone;
        }

        return $tx;
    }

    public function alt_file_get_contents_curl($url)
    {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

    public function ObtenerTimeZone(Request $r)
    {

        $ip = $r->getClientIp();  //$_SERVER['REMOTE_ADDR']
        $url2 = "https://ipapi.co/$ip/timezone";
        $f = self::alt_file_get_contents_curl($url2);

        return \GuzzleHttp\json_encode($f);
    }

    public function DecodeIpapi(Request $r)
    {
        return redirect()->route('portal');
        // 112 165
        $c = Country::find(55)->AjustarTraduccion()->push();
        dd($c);
        $ip = '186.93.232.6';
        //$s = geoip('186.93.232.6');

        $url2 = "https://ipapi.co/$ip/json";
        $url = "http://ip-api.com/json/$ip";
        $f = self::alt_file_get_contents_curl($url2);
        $s = json_decode($f);;
        dd($s);
        $fa = Country::Corto($s->country)->first()->setTimezone($f->timezone);
        dd($fa);
        \Session::put('pais_id', $fa->id);
        dd($s);
        //$ip = $r->getClientIp();  //
        $fa = \Session::all();
        dd($fa);
        $paises = Country::where('id', '!=', 0)->get();
        foreach ($paises as $k => $v) {
            //$v->UpdateData()->push();
            $v->AjustarTraduccion();
            $v->AjustarMoneda();
            $v->push();
        }
        //->AjustarTraduccion()->AjustarMoneda()


        dd($paises->pluck('name'));
        dd($paises->pluck('es'));


        //$s = geoip('186.93.232.6');
        $d = [];
        $d["ip"] = $s['ip'];// "186.93.232.6";
        $d["iso_code"] = $s['iso_code'];// "VE"
        $d["country"] = $s['country'];// "Venezuela"
        $d["city"] = $s['city'];// "Caracas (Roca Tarpeya)"
        $d["state"] = $s['state'];// ""
        $d["state_name"] = $s['state_name'];// "Capital"
        $d["postal_code"] = $s['postal_code'];// ""
        $d["lat"] = $s['lat'];// 10.4917
        $d["lon"] = $s['lon'];// -66.9138
        $d["timezone"] = $s['timezone'];// "America/Caracas"
        $d["continent"] = $s['continent'];// "Unknown"
        $d["currency"] = $s['currency'];// "VEF"
        \Session::put('moneda', $d["currency"]);

        foreach ($d as $k => $v) {
            \Session::put($k, $v);
            \Session::put($k, $v);
        }

        /*
                $ip = $_SERVER['REMOTE_ADDR'];
                $url2 = "https://ipapi.co/$ip/json";
                $f = self::alt_file_get_contents_curl($url2);
                $fa = json_decode($f);
        */
        dd($fa);
    }

    public function FakeWpPost(Request $r)
    {

        $g = \Session::all();
        //$g = json_encode($g);
        /*
        $ip = $r->getClientIp();  //$_SERVER['REMOTE_ADDR']
        $url2 = "https://ipapi.co/$ip/timezone";
        $g = self::alt_file_get_contents_curl($url2);
        */
        $f = "";
        foreach ($g as $k => $v) {
            if (!is_array($v)) {
                $f .= "\t\n$k => $v";
            }
        }
        //$f = json_encode($r->all());
        \Log::critical("\nEntrando en wp-login POST \n$f");
        flash('Datos incorrectos')->error();
        return view('FakeWP');
    }

    public function FakeWpGet(Request $r)
    {
        $ip = $_SERVER['REMOTE_ADDR'];  //$_SERVER['REMOTE_ADDR']
        $uri = $_SERVER['REQUEST_URI'];  //$_SERVER['REMOTE_ADDR']
        /*
        $url2 = "https://ipapi.co/$ip/timezone";
        $g = self::alt_file_get_contents_curl($url2);
        */
        //$g = json_encode(geoip($r->getClientIp()));

        $g = \Session::all();
        $g = json_encode($g);
        $f = json_encode($r->all());
        \Log::critical("\nEntrando en wp-login GET \n$f \n$g\n$uri");
        return view('FakeWP');

    }

    /*
  public function  TimeZoneByShort($country,$region) {
    switch ($country) {
  case "US":
      switch ($region) {
    case "AL":
        $timezone = "America/Chicago";
        break;
    case "AK":
        $timezone = "America/Anchorage";
        break;
    case "AZ":
        $timezone = "America/Phoenix";
        break;
    case "AR":
        $timezone = "America/Chicago";
        break;
    case "CA":
        $timezone = "America/Los_Angeles";
        break;
    case "CO":
        $timezone = "America/Denver";
        break;
    case "CT":
        $timezone = "America/New_York";
        break;
    case "DE":
        $timezone = "America/New_York";
        break;
    case "DC":
        $timezone = "America/New_York";
        break;
    case "FL":
        $timezone = "America/New_York";
        break;
    case "GA":
        $timezone = "America/New_York";
        break;
    case "HI":
        $timezone = "Pacific/Honolulu";
        break;
    case "ID":
        $timezone = "America/Denver";
        break;
    case "IL":
        $timezone = "America/Chicago";
        break;
    case "IN":
        $timezone = "America/Indianapolis";
        break;
    case "IA":
        $timezone = "America/Chicago";
        break;
    case "KS":
        $timezone = "America/Chicago";
        break;
    case "KY":
        $timezone = "America/New_York";
        break;
    case "LA":
        $timezone = "America/Chicago";
        break;
    case "ME":
        $timezone = "America/New_York";
        break;
    case "MD":
        $timezone = "America/New_York";
        break;
    case "MA":
        $timezone = "America/New_York";
        break;
    case "MI":
        $timezone = "America/New_York";
        break;
    case "MN":
        $timezone = "America/Chicago";
        break;
    case "MS":
        $timezone = "America/Chicago";
        break;
    case "MO":
        $timezone = "America/Chicago";
        break;
    case "MT":
        $timezone = "America/Denver";
        break;
    case "NE":
        $timezone = "America/Chicago";
        break;
    case "NV":
        $timezone = "America/Los_Angeles";
        break;
    case "NH":
        $timezone = "America/New_York";
        break;
    case "NJ":
        $timezone = "America/New_York";
        break;
    case "NM":
        $timezone = "America/Denver";
        break;
    case "NY":
        $timezone = "America/New_York";
        break;
    case "NC":
        $timezone = "America/New_York";
        break;
    case "ND":
        $timezone = "America/Chicago";
        break;
    case "OH":
        $timezone = "America/New_York";
        break;
    case "OK":
        $timezone = "America/Chicago";
        break;
    case "OR":
        $timezone = "America/Los_Angeles";
        break;
    case "PA":
        $timezone = "America/New_York";
        break;
    case "RI":
        $timezone = "America/New_York";
        break;
    case "SC":
        $timezone = "America/New_York";
        break;
    case "SD":
        $timezone = "America/Chicago";
        break;
    case "TN":
        $timezone = "America/Chicago";
        break;
    case "TX":
        $timezone = "America/Chicago";
        break;
    case "UT":
        $timezone = "America/Denver";
        break;
    case "VT":
        $timezone = "America/New_York";
        break;
    case "VA":
        $timezone = "America/New_York";
        break;
    case "WA":
        $timezone = "America/Los_Angeles";
        break;
    case "WV":
        $timezone = "America/New_York";
        break;
    case "WI":
        $timezone = "America/Chicago";
        break;
    case "WY":
        $timezone = "America/Denver";
        break;
    }
    break;
  case "CA":
      switch ($region) {
    case "AB":
        $timezone = "America/Edmonton";
        break;
    case "BC":
        $timezone = "America/Vancouver";
        break;
    case "MB":
        $timezone = "America/Winnipeg";
        break;
    case "NB":
        $timezone = "America/Halifax";
        break;
    case "NL":
        $timezone = "America/St_Johns";
        break;
    case "NT":
        $timezone = "America/Yellowknife";
        break;
    case "NS":
        $timezone = "America/Halifax";
        break;
    case "NU":
        $timezone = "America/Rankin_Inlet";
        break;
    case "ON":
        $timezone = "America/Rainy_River";
        break;
    case "PE":
        $timezone = "America/Halifax";
        break;
    case "QC":
        $timezone = "America/Montreal";
        break;
    case "SK":
        $timezone = "America/Regina";
        break;
    case "YT":
        $timezone = "America/Whitehorse";
        break;
    }
    break;
  case "AU":
      switch ($region) {
    case "01":
        $timezone = "Australia/Canberra";
        break;
    case "02":
        $timezone = "Australia/NSW";
        break;
    case "03":
        $timezone = "Australia/North";
        break;
    case "04":
        $timezone = "Australia/Queensland";
        break;
    case "05":
        $timezone = "Australia/South";
        break;
    case "06":
        $timezone = "Australia/Tasmania";
        break;
    case "07":
        $timezone = "Australia/Victoria";
        break;
    case "08":
        $timezone = "Australia/West";
        break;
    }
    break;
  case "AS":
      $timezone = "US/Samoa";
      break;
  case "CI":
      $timezone = "Africa/Abidjan";
      break;
  case "GH":
      $timezone = "Africa/Accra";
      break;
  case "DZ":
      $timezone = "Africa/Algiers";
      break;
  case "ER":
      $timezone = "Africa/Asmera";
      break;
  case "ML":
      $timezone = "Africa/Bamako";
      break;
  case "CF":
      $timezone = "Africa/Bangui";
      break;
  case "GM":
      $timezone = "Africa/Banjul";
      break;
  case "GW":
      $timezone = "Africa/Bissau";
      break;
  case "CG":
      $timezone = "Africa/Brazzaville";
      break;
  case "BI":
      $timezone = "Africa/Bujumbura";
      break;
  case "EG":
      $timezone = "Africa/Cairo";
      break;
  case "MA":
      $timezone = "Africa/Casablanca";
      break;
  case "GN":
      $timezone = "Africa/Conakry";
      break;
  case "SN":
      $timezone = "Africa/Dakar";
      break;
  case "DJ":
      $timezone = "Africa/Djibouti";
      break;
  case "SL":
      $timezone = "Africa/Freetown";
      break;
  case "BW":
      $timezone = "Africa/Gaborone";
      break;
  case "ZW":
      $timezone = "Africa/Harare";
      break;
  case "ZA":
      $timezone = "Africa/Johannesburg";
      break;
  case "UG":
      $timezone = "Africa/Kampala";
      break;
  case "SD":
      $timezone = "Africa/Khartoum";
      break;
  case "RW":
      $timezone = "Africa/Kigali";
      break;
  case "NG":
      $timezone = "Africa/Lagos";
      break;
  case "GA":
      $timezone = "Africa/Libreville";
      break;
  case "TG":
      $timezone = "Africa/Lome";
      break;
  case "AO":
      $timezone = "Africa/Luanda";
      break;
  case "ZM":
      $timezone = "Africa/Lusaka";
      break;
  case "GQ":
      $timezone = "Africa/Malabo";
      break;
  case "MZ":
      $timezone = "Africa/Maputo";
      break;
  case "LS":
      $timezone = "Africa/Maseru";
      break;
  case "SZ":
      $timezone = "Africa/Mbabane";
      break;
  case "SO":
      $timezone = "Africa/Mogadishu";
      break;
  case "LR":
      $timezone = "Africa/Monrovia";
      break;
  case "KE":
      $timezone = "Africa/Nairobi";
      break;
  case "TD":
      $timezone = "Africa/Ndjamena";
      break;
  case "NE":
      $timezone = "Africa/Niamey";
      break;
  case "MR":
      $timezone = "Africa/Nouakchott";
      break;
  case "BF":
      $timezone = "Africa/Ouagadougou";
      break;
  case "ST":
      $timezone = "Africa/Sao_Tome";
      break;
  case "LY":
      $timezone = "Africa/Tripoli";
      break;
  case "TN":
      $timezone = "Africa/Tunis";
      break;
  case "AI":
      $timezone = "America/Anguilla";
      break;
  case "AG":
      $timezone = "America/Antigua";
      break;
  case "AW":
      $timezone = "America/Aruba";
      break;
  case "BB":
      $timezone = "America/Barbados";
      break;
  case "BZ":
      $timezone = "America/Belize";
      break;
  case "CO":
      $timezone = "America/Bogota";
      break;
  case "VE":
      $timezone = "America/Caracas";
      break;
  case "KY":
      $timezone = "America/Cayman";
      break;
  case "CR":
      $timezone = "America/Costa_Rica";
      break;
  case "DM":
      $timezone = "America/Dominica";
      break;
  case "SV":
      $timezone = "America/El_Salvador";
      break;
  case "GD":
      $timezone = "America/Grenada";
      break;
  case "FR":
      $timezone = "Europe/Paris";
      break;
  case "GP":
      $timezone = "America/Guadeloupe";
      break;
  case "GT":
      $timezone = "America/Guatemala";
      break;
  case "GY":
      $timezone = "America/Guyana";
      break;
  case "CU":
      $timezone = "America/Havana";
      break;
  case "JM":
      $timezone = "America/Jamaica";
      break;
  case "BO":
      $timezone = "America/La_Paz";
      break;
  case "PE":
      $timezone = "America/Lima";
      break;
  case "NI":
      $timezone = "America/Managua";
      break;
  case "MQ":
      $timezone = "America/Martinique";
      break;
  case "UY":
      $timezone = "America/Montevideo";
      break;
  case "MS":
      $timezone = "America/Montserrat";
      break;
  case "BS":
      $timezone = "America/Nassau";
      break;
  case "PA":
      $timezone = "America/Panama";
      break;
  case "SR":
      $timezone = "America/Paramaribo";
      break;
  case "PR":
      $timezone = "America/Puerto_Rico";
      break;
  case "KN":
      $timezone = "America/St_Kitts";
      break;
  case "LC":
      $timezone = "America/St_Lucia";
      break;
  case "VC":
      $timezone = "America/St_Vincent";
      break;
  case "HN":
      $timezone = "America/Tegucigalpa";
      break;
  case "YE":
      $timezone = "Asia/Aden";
      break;
  case "JO":
      $timezone = "Asia/Amman";
      break;
  case "TM":
      $timezone = "Asia/Ashgabat";
      break;
  case "IQ":
      $timezone = "Asia/Baghdad";
      break;
  case "BH":
      $timezone = "Asia/Bahrain";
      break;
  case "AZ":
      $timezone = "Asia/Baku";
      break;
  case "TH":
      $timezone = "Asia/Bangkok";
      break;
  case "LB":
      $timezone = "Asia/Beirut";
      break;
  case "KG":
      $timezone = "Asia/Bishkek";
      break;
  case "BN":
      $timezone = "Asia/Brunei";
      break;
  case "IN":
      $timezone = "Asia/Calcutta";
      break;
  case "MN":
      $timezone = "Asia/Choibalsan";
      break;
  case "LK":
      $timezone = "Asia/Colombo";
      break;
  case "BD":
      $timezone = "Asia/Dhaka";
      break;
  case "AE":
      $timezone = "Asia/Dubai";
      break;
  case "TJ":
      $timezone = "Asia/Dushanbe";
      break;
  case "HK":
      $timezone = "Asia/Hong_Kong";
      break;
  case "TR":
      $timezone = "Asia/Istanbul";
      break;
  case "IL":
      $timezone = "Asia/Jerusalem";
      break;
  case "AF":
      $timezone = "Asia/Kabul";
      break;
  case "PK":
      $timezone = "Asia/Karachi";
      break;
  case "NP":
      $timezone = "Asia/Katmandu";
      break;
  case "KW":
      $timezone = "Asia/Kuwait";
      break;
  case "MO":
      $timezone = "Asia/Macao";
      break;
  case "PH":
      $timezone = "Asia/Manila";
      break;
  case "OM":
      $timezone = "Asia/Muscat";
      break;
  case "CY":
      $timezone = "Asia/Nicosia";
      break;
  case "KP":
      $timezone = "Asia/Pyongyang";
      break;
  case "QA":
      $timezone = "Asia/Qatar";
      break;
  case "MM":
      $timezone = "Asia/Rangoon";
      break;
  case "SA":
      $timezone = "Asia/Riyadh";
      break;
  case "KR":
      $timezone = "Asia/Seoul";
      break;
  case "SG":
      $timezone = "Asia/Singapore";
      break;
  case "TW":
      $timezone = "Asia/Taipei";
      break;
  case "GE":
      $timezone = "Asia/Tbilisi";
      break;
  case "BT":
      $timezone = "Asia/Thimphu";
      break;
  case "JP":
      $timezone = "Asia/Tokyo";
      break;
  case "LA":
      $timezone = "Asia/Vientiane";
      break;
  case "AM":
      $timezone = "Asia/Yerevan";
      break;
  case "BM":
      $timezone = "Atlantic/Bermuda";
      break;
  case "CV":
      $timezone = "Atlantic/Cape_Verde";
      break;
  case "FO":
      $timezone = "Atlantic/Faeroe";
      break;
  case "IS":
      $timezone = "Atlantic/Reykjavik";
      break;
  case "GS":
      $timezone = "Atlantic/South_Georgia";
      break;
  case "SH":
      $timezone = "Atlantic/St_Helena";
      break;
  case "CL":
      $timezone = "Chile/Continental";
      break;
  case "NL":
      $timezone = "Europe/Amsterdam";
      break;
  case "AD":
      $timezone = "Europe/Andorra";
      break;
  case "GR":
      $timezone = "Europe/Athens";
      break;
  case "YU":
      $timezone = "Europe/Belgrade";
      break;
  case "DE":
      $timezone = "Europe/Berlin";
      break;
  case "SK":
      $timezone = "Europe/Bratislava";
      break;
  case "BE":
      $timezone = "Europe/Brussels";
      break;
  case "RO":
      $timezone = "Europe/Bucharest";
      break;
  case "HU":
      $timezone = "Europe/Budapest";
      break;
  case "DK":
      $timezone = "Europe/Copenhagen";
      break;
  case "IE":
      $timezone = "Europe/Dublin";
      break;
  case "GI":
      $timezone = "Europe/Gibraltar";
      break;
  case "FI":
      $timezone = "Europe/Helsinki";
      break;
  case "SI":
      $timezone = "Europe/Ljubljana";
      break;
  case "GB":
      $timezone = "Europe/London";
      break;
  case "LU":
      $timezone = "Europe/Luxembourg";
      break;
  case "MT":
      $timezone = "Europe/Malta";
      break;
  case "BY":
      $timezone = "Europe/Minsk";
      break;
  case "MC":
      $timezone = "Europe/Monaco";
      break;
  case "NO":
      $timezone = "Europe/Oslo";
      break;
  case "CZ":
      $timezone = "Europe/Prague";
      break;
  case "LV":
      $timezone = "Europe/Riga";
      break;
  case "IT":
      $timezone = "Europe/Rome";
      break;
  case "SM":
      $timezone = "Europe/San_Marino";
      break;
  case "BA":
      $timezone = "Europe/Sarajevo";
      break;
  case "MK":
      $timezone = "Europe/Skopje";
      break;
  case "BG":
      $timezone = "Europe/Sofia";
      break;
  case "SE":
      $timezone = "Europe/Stockholm";
      break;
  case "EE":
      $timezone = "Europe/Tallinn";
      break;
  case "AL":
      $timezone = "Europe/Tirane";
      break;
  case "LI":
      $timezone = "Europe/Vaduz";
      break;
  case "VA":
      $timezone = "Europe/Vatican";
      break;
  case "AT":
      $timezone = "Europe/Vienna";
      break;
  case "LT":
      $timezone = "Europe/Vilnius";
      break;
  case "PL":
      $timezone = "Europe/Warsaw";
      break;
  case "HR":
      $timezone = "Europe/Zagreb";
      break;
  case "IR":
      $timezone = "Asia/Tehran";
      break;
  case "MG":
      $timezone = "Indian/Antananarivo";
      break;
  case "CX":
      $timezone = "Indian/Christmas";
      break;
  case "CC":
      $timezone = "Indian/Cocos";
      break;
  case "KM":
      $timezone = "Indian/Comoro";
      break;
  case "MV":
      $timezone = "Indian/Maldives";
      break;
  case "MU":
      $timezone = "Indian/Mauritius";
      break;
  case "YT":
      $timezone = "Indian/Mayotte";
      break;
  case "RE":
      $timezone = "Indian/Reunion";
      break;
  case "FJ":
      $timezone = "Pacific/Fiji";
      break;
  case "TV":
      $timezone = "Pacific/Funafuti";
      break;
  case "GU":
      $timezone = "Pacific/Guam";
      break;
  case "NR":
      $timezone = "Pacific/Nauru";
      break;
  case "NU":
      $timezone = "Pacific/Niue";
      break;
  case "NF":
      $timezone = "Pacific/Norfolk";
      break;
  case "PW":
      $timezone = "Pacific/Palau";
      break;
  case "PN":
      $timezone = "Pacific/Pitcairn";
      break;
  case "CK":
      $timezone = "Pacific/Rarotonga";
      break;
  case "WS":
      $timezone = "Pacific/Samoa";
      break;
  case "KI":
      $timezone = "Pacific/Tarawa";
      break;
  case "TO":
      $timezone = "Pacific/Tongatapu";
      break;
  case "WF":
      $timezone = "Pacific/Wallis";
      break;
  case "TZ":
      $timezone = "Africa/Dar_es_Salaam";
      break;
  case "VN":
      $timezone = "Asia/Phnom_Penh";
      break;
  case "KH":
      $timezone = "Asia/Phnom_Penh";
      break;
  case "CM":
      $timezone = "Africa/Lagos";
      break;
  case "DO":
      $timezone = "America/Santo_Domingo";
      break;
  case "ET":
      $timezone = "Africa/Addis_Ababa";
      break;
  case "FX":
      $timezone = "Europe/Paris";
      break;
  case "HT":
      $timezone = "America/Port-au-Prince";
      break;
  case "CH":
      $timezone = "Europe/Zurich";
      break;
  case "AN":
      $timezone = "America/Curacao";
      break;
  case "BJ":
      $timezone = "Africa/Porto-Novo";
      break;
  case "EH":
      $timezone = "Africa/El_Aaiun";
      break;
  case "FK":
      $timezone = "Atlantic/Stanley";
      break;
  case "GF":
      $timezone = "America/Cayenne";
      break;
  case "IO":
      $timezone = "Indian/Chagos";
      break;
  case "MD":
      $timezone = "Europe/Chisinau";
      break;
  case "MP":
      $timezone = "Pacific/Saipan";
      break;
  case "MW":
      $timezone = "Africa/Blantyre";
      break;
  case "NA":
      $timezone = "Africa/Windhoek";
      break;
  case "NC":
      $timezone = "Pacific/Noumea";
      break;
  case "PG":
      $timezone = "Pacific/Port_Moresby";
      break;
  case "PM":
      $timezone = "America/Miquelon";
      break;
  case "PS":
      $timezone = "Asia/Gaza";
      break;
  case "PY":
      $timezone = "America/Asuncion";
      break;
  case "SB":
      $timezone = "Pacific/Guadalcanal";
      break;
  case "SC":
      $timezone = "Indian/Mahe";
      break;
  case "SJ":
      $timezone = "Arctic/Longyearbyen";
      break;
  case "SY":
      $timezone = "Asia/Damascus";
      break;
  case "TC":
      $timezone = "America/Grand_Turk";
      break;
  case "TF":
      $timezone = "Indian/Kerguelen";
      break;
  case "TK":
      $timezone = "Pacific/Fakaofo";
      break;
  case "TT":
      $timezone = "America/Port_of_Spain";
      break;
  case "VG":
      $timezone = "America/Tortola";
      break;
  case "VI":
      $timezone = "America/St_Thomas";
      break;
  case "VU":
      $timezone = "Pacific/Efate";
      break;
  case "RS":
      $timezone = "Europe/Belgrade";
      break;
  case "ME":
      $timezone = "Europe/Podgorica";
      break;
  case "AX":
      $timezone = "Europe/Mariehamn";
      break;
  case "GG":
      $timezone = "Europe/Guernsey";
      break;
  case "IM":
      $timezone = "Europe/Isle_of_Man";
      break;
  case "JE":
      $timezone = "Europe/Jersey";
      break;
  case "BL":
      $timezone = "America/St_Barthelemy";
      break;
  case "MF":
      $timezone = "America/Marigot";
      break;
  case "AR":
      switch ($region) {
    case "01":
        $timezone = "America/Argentina/Buenos_Aires";
        break;
    case "02":
        $timezone = "America/Argentina/Catamarca";
        break;
    case "03":
        $timezone = "America/Argentina/Tucuman";
        break;
    case "04":
        $timezone = "America/Argentina/Rio_Gallegos";
        break;
    case "05":
        $timezone = "America/Argentina/Cordoba";
        break;
    case "06":
        $timezone = "America/Argentina/Tucuman";
        break;
    case "07":
        $timezone = "America/Argentina/Buenos_Aires";
        break;
    case "08":
        $timezone = "America/Argentina/Buenos_Aires";
        break;
    case "09":
        $timezone = "America/Argentina/Tucuman";
        break;
    case "10":
        $timezone = "America/Argentina/Jujuy";
        break;
    case "11":
        $timezone = "America/Argentina/San_Luis";
        break;
    case "12":
        $timezone = "America/Argentina/La_Rioja";
        break;
    case "13":
        $timezone = "America/Argentina/Mendoza";
        break;
    case "14":
        $timezone = "America/Argentina/Buenos_Aires";
        break;
    case "15":
        $timezone = "America/Argentina/San_Luis";
        break;
    case "16":
        $timezone = "America/Argentina/Buenos_Aires";
        break;
    case "17":
        $timezone = "America/Argentina/Salta";
        break;
    case "18":
        $timezone = "America/Argentina/San_Juan";
        break;
    case "19":
        $timezone = "America/Argentina/San_Luis";
        break;
    case "20":
        $timezone = "America/Argentina/Rio_Gallegos";
        break;
    case "21":
        $timezone = "America/Argentina/Buenos_Aires";
        break;
    case "22":
        $timezone = "America/Argentina/Catamarca";
        break;
    case "23":
        $timezone = "America/Argentina/Ushuaia";
        break;
    case "24":
        $timezone = "America/Argentina/Tucuman";
        break;
    }
    break;
  case "BR":
      switch ($region) {
    case "01":
        $timezone = "America/Rio_Branco";
        break;
    case "02":
        $timezone = "America/Maceio";
        break;
    case "03":
        $timezone = "America/Sao_Paulo";
        break;
    case "04":
        $timezone = "America/Manaus";
        break;
    case "05":
        $timezone = "America/Bahia";
        break;
    case "06":
        $timezone = "America/Fortaleza";
        break;
    case "07":
        $timezone = "America/Sao_Paulo";
        break;
    case "08":
        $timezone = "America/Sao_Paulo";
        break;
    case "11":
        $timezone = "America/Campo_Grande";
        break;
    case "13":
        $timezone = "America/Belem";
        break;
    case "14":
        $timezone = "America/Cuiaba";
        break;
    case "15":
        $timezone = "America/Sao_Paulo";
        break;
    case "16":
        $timezone = "America/Belem";
        break;
    case "17":
        $timezone = "America/Recife";
        break;
    case "18":
        $timezone = "America/Sao_Paulo";
        break;
    case "20":
        $timezone = "America/Fortaleza";
        break;
    case "21":
        $timezone = "America/Sao_Paulo";
        break;
    case "22":
        $timezone = "America/Recife";
        break;
    case "23":
        $timezone = "America/Sao_Paulo";
        break;
    case "24":
        $timezone = "America/Porto_Velho";
        break;
    case "25":
        $timezone = "America/Boa_Vista";
        break;
    case "26":
        $timezone = "America/Sao_Paulo";
        break;
    case "27":
        $timezone = "America/Sao_Paulo";
        break;
    case "28":
        $timezone = "America/Maceio";
        break;
    case "29":
        $timezone = "America/Sao_Paulo";
        break;
    case "30":
        $timezone = "America/Recife";
        break;
    case "31":
        $timezone = "America/Araguaina";
        break;
    }
    break;
  case "CD":
      switch ($region) {
    case "02":
        $timezone = "Africa/Kinshasa";
        break;
    case "05":
        $timezone = "Africa/Lubumbashi";
        break;
    case "06":
        $timezone = "Africa/Kinshasa";
        break;
    case "08":
        $timezone = "Africa/Kinshasa";
        break;
    case "10":
        $timezone = "Africa/Lubumbashi";
        break;
    case "11":
        $timezone = "Africa/Lubumbashi";
        break;
    case "12":
        $timezone = "Africa/Lubumbashi";
        break;
    }
    break;
  case "CN":
      switch ($region) {
    case "01":
        $timezone = "Asia/Shanghai";
        break;
    case "02":
        $timezone = "Asia/Shanghai";
        break;
    case "03":
        $timezone = "Asia/Shanghai";
        break;
    case "04":
        $timezone = "Asia/Shanghai";
        break;
    case "05":
        $timezone = "Asia/Harbin";
        break;
    case "06":
        $timezone = "Asia/Chongqing";
        break;
    case "07":
        $timezone = "Asia/Shanghai";
        break;
    case "08":
        $timezone = "Asia/Harbin";
        break;
    case "09":
        $timezone = "Asia/Shanghai";
        break;
    case "10":
        $timezone = "Asia/Shanghai";
        break;
    case "11":
        $timezone = "Asia/Chongqing";
        break;
    case "12":
        $timezone = "Asia/Shanghai";
        break;
    case "13":
        $timezone = "Asia/Urumqi";
        break;
    case "14":
        $timezone = "Asia/Chongqing";
        break;
    case "15":
        $timezone = "Asia/Chongqing";
        break;
    case "16":
        $timezone = "Asia/Chongqing";
        break;
    case "18":
        $timezone = "Asia/Chongqing";
        break;
    case "19":
        $timezone = "Asia/Harbin";
        break;
    case "20":
        $timezone = "Asia/Harbin";
        break;
    case "21":
        $timezone = "Asia/Chongqing";
        break;
    case "22":
        $timezone = "Asia/Harbin";
        break;
    case "23":
        $timezone = "Asia/Shanghai";
        break;
    case "24":
        $timezone = "Asia/Chongqing";
        break;
    case "25":
        $timezone = "Asia/Shanghai";
        break;
    case "26":
        $timezone = "Asia/Chongqing";
        break;
    case "28":
        $timezone = "Asia/Shanghai";
        break;
    case "29":
        $timezone = "Asia/Chongqing";
        break;
    case "30":
        $timezone = "Asia/Chongqing";
        break;
    case "31":
        $timezone = "Asia/Chongqing";
        break;
    case "32":
        $timezone = "Asia/Chongqing";
        break;
    case "33":
        $timezone = "Asia/Chongqing";
        break;
    }
    break;
  case "EC":
      switch ($region) {
    case "01":
        $timezone = "Pacific/Galapagos";
        break;
    case "02":
        $timezone = "America/Guayaquil";
        break;
    case "03":
        $timezone = "America/Guayaquil";
        break;
    case "04":
        $timezone = "America/Guayaquil";
        break;
    case "05":
        $timezone = "America/Guayaquil";
        break;
    case "06":
        $timezone = "America/Guayaquil";
        break;
    case "07":
        $timezone = "America/Guayaquil";
        break;
    case "08":
        $timezone = "America/Guayaquil";
        break;
    case "09":
        $timezone = "America/Guayaquil";
        break;
    case "10":
        $timezone = "America/Guayaquil";
        break;
    case "11":
        $timezone = "America/Guayaquil";
        break;
    case "12":
        $timezone = "America/Guayaquil";
        break;
    case "13":
        $timezone = "America/Guayaquil";
        break;
    case "14":
        $timezone = "America/Guayaquil";
        break;
    case "15":
        $timezone = "America/Guayaquil";
        break;
    case "17":
        $timezone = "America/Guayaquil";
        break;
    case "18":
        $timezone = "America/Guayaquil";
        break;
    case "19":
        $timezone = "America/Guayaquil";
        break;
    case "20":
        $timezone = "America/Guayaquil";
        break;
    case "22":
        $timezone = "America/Guayaquil";
        break;
    }
    break;
  case "ES":
      switch ($region) {
    case "07":
        $timezone = "Europe/Madrid";
        break;
    case "27":
        $timezone = "Europe/Madrid";
        break;
    case "29":
        $timezone = "Europe/Madrid";
        break;
    case "31":
        $timezone = "Europe/Madrid";
        break;
    case "32":
        $timezone = "Europe/Madrid";
        break;
    case "34":
        $timezone = "Europe/Madrid";
        break;
    case "39":
        $timezone = "Europe/Madrid";
        break;
    case "51":
        $timezone = "Africa/Ceuta";
        break;
    case "52":
        $timezone = "Europe/Madrid";
        break;
    case "53":
        $timezone = "Atlantic/Canary";
        break;
    case "54":
        $timezone = "Europe/Madrid";
        break;
    case "55":
        $timezone = "Europe/Madrid";
        break;
    case "56":
        $timezone = "Europe/Madrid";
        break;
    case "57":
        $timezone = "Europe/Madrid";
        break;
    case "58":
        $timezone = "Europe/Madrid";
        break;
    case "59":
        $timezone = "Europe/Madrid";
        break;
    case "60":
        $timezone = "Europe/Madrid";
        break;
    }
    break;
  case "GL":
      switch ($region) {
    case "01":
        $timezone = "America/Thule";
        break;
    case "02":
        $timezone = "America/Godthab";
        break;
    case "03":
        $timezone = "America/Godthab";
        break;
    }
    break;
  case "ID":
      switch ($region) {
    case "01":
        $timezone = "Asia/Pontianak";
        break;
    case "02":
        $timezone = "Asia/Makassar";
        break;
    case "03":
        $timezone = "Asia/Jakarta";
        break;
    case "04":
        $timezone = "Asia/Jakarta";
        break;
    case "05":
        $timezone = "Asia/Jakarta";
        break;
    case "06":
        $timezone = "Asia/Jakarta";
        break;
    case "07":
        $timezone = "Asia/Jakarta";
        break;
    case "08":
        $timezone = "Asia/Jakarta";
        break;
    case "09":
        $timezone = "Asia/Jayapura";
        break;
    case "10":
        $timezone = "Asia/Jakarta";
        break;
    case "11":
        $timezone = "Asia/Pontianak";
        break;
    case "12":
        $timezone = "Asia/Makassar";
        break;
    case "13":
        $timezone = "Asia/Makassar";
        break;
    case "14":
        $timezone = "Asia/Makassar";
        break;
    case "15":
        $timezone = "Asia/Jakarta";
        break;
    case "16":
        $timezone = "Asia/Makassar";
        break;
    case "17":
        $timezone = "Asia/Makassar";
        break;
    case "18":
        $timezone = "Asia/Makassar";
        break;
    case "19":
        $timezone = "Asia/Pontianak";
        break;
    case "20":
        $timezone = "Asia/Makassar";
        break;
    case "21":
        $timezone = "Asia/Makassar";
        break;
    case "22":
        $timezone = "Asia/Makassar";
        break;
    case "23":
        $timezone = "Asia/Makassar";
        break;
    case "24":
        $timezone = "Asia/Jakarta";
        break;
    case "25":
        $timezone = "Asia/Pontianak";
        break;
    case "26":
        $timezone = "Asia/Pontianak";
        break;
    case "30":
        $timezone = "Asia/Jakarta";
        break;
    case "31":
        $timezone = "Asia/Makassar";
        break;
    case "33":
        $timezone = "Asia/Jakarta";
        break;
    }
    break;
  case "KZ":
      switch ($region) {
    case "01":
        $timezone = "Asia/Almaty";
        break;
    case "02":
        $timezone = "Asia/Almaty";
        break;
    case "03":
        $timezone = "Asia/Qyzylorda";
        break;
    case "04":
        $timezone = "Asia/Aqtobe";
        break;
    case "05":
        $timezone = "Asia/Qyzylorda";
        break;
    case "06":
        $timezone = "Asia/Aqtau";
        break;
    case "07":
        $timezone = "Asia/Oral";
        break;
    case "08":
        $timezone = "Asia/Qyzylorda";
        break;
    case "09":
        $timezone = "Asia/Aqtau";
        break;
    case "10":
        $timezone = "Asia/Qyzylorda";
        break;
    case "11":
        $timezone = "Asia/Almaty";
        break;
    case "12":
        $timezone = "Asia/Qyzylorda";
        break;
    case "13":
        $timezone = "Asia/Aqtobe";
        break;
    case "14":
        $timezone = "Asia/Qyzylorda";
        break;
    case "15":
        $timezone = "Asia/Almaty";
        break;
    case "16":
        $timezone = "Asia/Aqtobe";
        break;
    case "17":
        $timezone = "Asia/Almaty";
        break;
    }
    break;
  case "MX":
      switch ($region) {
    case "01":
        $timezone = "America/Mexico_City";
        break;
    case "02":
        $timezone = "America/Tijuana";
        break;
    case "03":
        $timezone = "America/Hermosillo";
        break;
    case "04":
        $timezone = "America/Merida";
        break;
    case "05":
        $timezone = "America/Mexico_City";
        break;
    case "06":
        $timezone = "America/Chihuahua";
        break;
    case "07":
        $timezone = "America/Monterrey";
        break;
    case "08":
        $timezone = "America/Mexico_City";
        break;
    case "09":
        $timezone = "America/Mexico_City";
        break;
    case "10":
        $timezone = "America/Mazatlan";
        break;
    case "11":
        $timezone = "America/Mexico_City";
        break;
    case "12":
        $timezone = "America/Mexico_City";
        break;
    case "13":
        $timezone = "America/Mexico_City";
        break;
    case "14":
        $timezone = "America/Mazatlan";
        break;
    case "15":
        $timezone = "America/Chihuahua";
        break;
    case "16":
        $timezone = "America/Mexico_City";
        break;
    case "17":
        $timezone = "America/Mexico_City";
        break;
    case "18":
        $timezone = "America/Mazatlan";
        break;
    case "19":
        $timezone = "America/Monterrey";
        break;
    case "20":
        $timezone = "America/Mexico_City";
        break;
    case "21":
        $timezone = "America/Mexico_City";
        break;
    case "22":
        $timezone = "America/Mexico_City";
        break;
    case "23":
        $timezone = "America/Cancun";
        break;
    case "24":
        $timezone = "America/Mexico_City";
        break;
    case "25":
        $timezone = "America/Mazatlan";
        break;
    case "26":
        $timezone = "America/Hermosillo";
        break;
    case "27":
        $timezone = "America/Merida";
        break;
    case "28":
        $timezone = "America/Monterrey";
        break;
    case "29":
        $timezone = "America/Mexico_City";
        break;
    case "30":
        $timezone = "America/Mexico_City";
        break;
    case "31":
        $timezone = "America/Merida";
        break;
    case "32":
        $timezone = "America/Monterrey";
        break;
    }
    break;
  case "MY":
      switch ($region) {
    case "01":
        $timezone = "Asia/Kuala_Lumpur";
        break;
    case "02":
        $timezone = "Asia/Kuala_Lumpur";
        break;
    case "03":
        $timezone = "Asia/Kuala_Lumpur";
        break;
    case "04":
        $timezone = "Asia/Kuala_Lumpur";
        break;
    case "05":
        $timezone = "Asia/Kuala_Lumpur";
        break;
    case "06":
        $timezone = "Asia/Kuala_Lumpur";
        break;
    case "07":
        $timezone = "Asia/Kuala_Lumpur";
        break;
    case "08":
        $timezone = "Asia/Kuala_Lumpur";
        break;
    case "09":
        $timezone = "Asia/Kuala_Lumpur";
        break;
    case "11":
        $timezone = "Asia/Kuching";
        break;
    case "12":
        $timezone = "Asia/Kuala_Lumpur";
        break;
    case "13":
        $timezone = "Asia/Kuala_Lumpur";
        break;
    case "14":
        $timezone = "Asia/Kuala_Lumpur";
        break;
    case "15":
        $timezone = "Asia/Kuching";
        break;
    case "16":
        $timezone = "Asia/Kuching";
        break;
    }
    break;
  case "NZ":
      switch ($region) {
    case "85":
        $timezone = "Pacific/Auckland";
        break;
    case "E7":
        $timezone = "Pacific/Auckland";
        break;
    case "E8":
        $timezone = "Pacific/Auckland";
        break;
    case "E9":
        $timezone = "Pacific/Auckland";
        break;
    case "F1":
        $timezone = "Pacific/Auckland";
        break;
    case "F2":
        $timezone = "Pacific/Auckland";
        break;
    case "F3":
        $timezone = "Pacific/Auckland";
        break;
    case "F4":
        $timezone = "Pacific/Auckland";
        break;
    case "F5":
        $timezone = "Pacific/Auckland";
        break;
    case "F7":
        $timezone = "Pacific/Chatham";
        break;
    case "F8":
        $timezone = "Pacific/Auckland";
        break;
    case "F9":
        $timezone = "Pacific/Auckland";
        break;
    case "G1":
        $timezone = "Pacific/Auckland";
        break;
    case "G2":
        $timezone = "Pacific/Auckland";
        break;
    case "G3":
        $timezone = "Pacific/Auckland";
        break;
    }
    break;
  case "PT":
      switch ($region) {
    case "02":
        $timezone = "Europe/Lisbon";
        break;
    case "03":
        $timezone = "Europe/Lisbon";
        break;
    case "04":
        $timezone = "Europe/Lisbon";
        break;
    case "05":
        $timezone = "Europe/Lisbon";
        break;
    case "06":
        $timezone = "Europe/Lisbon";
        break;
    case "07":
        $timezone = "Europe/Lisbon";
        break;
    case "08":
        $timezone = "Europe/Lisbon";
        break;
    case "09":
        $timezone = "Europe/Lisbon";
        break;
    case "10":
        $timezone = "Atlantic/Madeira";
        break;
    case "11":
        $timezone = "Europe/Lisbon";
        break;
    case "13":
        $timezone = "Europe/Lisbon";
        break;
    case "14":
        $timezone = "Europe/Lisbon";
        break;
    case "16":
        $timezone = "Europe/Lisbon";
        break;
    case "17":
        $timezone = "Europe/Lisbon";
        break;
    case "18":
        $timezone = "Europe/Lisbon";
        break;
    case "19":
        $timezone = "Europe/Lisbon";
        break;
    case "20":
        $timezone = "Europe/Lisbon";
        break;
    case "21":
        $timezone = "Europe/Lisbon";
        break;
    case "22":
        $timezone = "Europe/Lisbon";
        break;
    }
    break;
  case "RU":
      switch ($region) {
    case "01":
        $timezone = "Europe/Volgograd";
        break;
    case "02":
        $timezone = "Asia/Irkutsk";
        break;
    case "03":
        $timezone = "Asia/Novokuznetsk";
        break;
    case "04":
        $timezone = "Asia/Novosibirsk";
        break;
    case "05":
        $timezone = "Asia/Vladivostok";
        break;
    case "06":
        $timezone = "Europe/Moscow";
        break;
    case "07":
        $timezone = "Europe/Volgograd";
        break;
    case "08":
        $timezone = "Europe/Samara";
        break;
    case "09":
        $timezone = "Europe/Moscow";
        break;
    case "10":
        $timezone = "Europe/Moscow";
        break;
    case "11":
        $timezone = "Asia/Irkutsk";
        break;
    case "13":
        $timezone = "Asia/Yekaterinburg";
        break;
    case "14":
        $timezone = "Asia/Irkutsk";
        break;
    case "15":
        $timezone = "Asia/Anadyr";
        break;
    case "16":
        $timezone = "Europe/Samara";
        break;
    case "17":
        $timezone = "Europe/Volgograd";
        break;
    case "18":
        $timezone = "Asia/Krasnoyarsk";
        break;
    case "20":
        $timezone = "Asia/Irkutsk";
        break;
    case "21":
        $timezone = "Europe/Moscow";
        break;
    case "22":
        $timezone = "Europe/Volgograd";
        break;
    case "23":
        $timezone = "Europe/Kaliningrad";
        break;
    case "24":
        $timezone = "Europe/Volgograd";
        break;
    case "25":
        $timezone = "Europe/Moscow";
        break;
    case "26":
        $timezone = "Asia/Kamchatka";
        break;
    case "27":
        $timezone = "Europe/Volgograd";
        break;
    case "28":
        $timezone = "Europe/Moscow";
        break;
    case "29":
        $timezone = "Asia/Novokuznetsk";
        break;
    case "30":
        $timezone = "Asia/Vladivostok";
        break;
    case "31":
        $timezone = "Asia/Krasnoyarsk";
        break;
    case "32":
        $timezone = "Asia/Omsk";
        break;
    case "33":
        $timezone = "Asia/Yekaterinburg";
        break;
    case "34":
        $timezone = "Asia/Yekaterinburg";
        break;
    case "35":
        $timezone = "Asia/Yekaterinburg";
        break;
    case "36":
        $timezone = "Asia/Anadyr";
        break;
    case "37":
        $timezone = "Europe/Moscow";
        break;
    case "38":
        $timezone = "Europe/Volgograd";
        break;
    case "39":
        $timezone = "Asia/Krasnoyarsk";
        break;
    case "40":
        $timezone = "Asia/Yekaterinburg";
        break;
    case "41":
        $timezone = "Europe/Moscow";
        break;
    case "42":
        $timezone = "Europe/Moscow";
        break;
    case "43":
        $timezone = "Europe/Moscow";
        break;
    case "44":
        $timezone = "Asia/Magadan";
        break;
    case "45":
        $timezone = "Europe/Samara";
        break;
    case "46":
        $timezone = "Europe/Samara";
        break;
    case "47":
        $timezone = "Europe/Moscow";
        break;
    case "48":
        $timezone = "Europe/Moscow";
        break;
    case "49":
        $timezone = "Europe/Moscow";
        break;
    case "50":
        $timezone = "Asia/Yekaterinburg";
        break;
    case "51":
        $timezone = "Europe/Moscow";
        break;
    case "52":
        $timezone = "Europe/Moscow";
        break;
    case "53":
        $timezone = "Asia/Novosibirsk";
        break;
    case "54":
        $timezone = "Asia/Omsk";
        break;
    case "55":
        $timezone = "Europe/Samara";
        break;
    case "56":
        $timezone = "Europe/Moscow";
        break;
    case "57":
        $timezone = "Europe/Samara";
        break;
    case "58":
        $timezone = "Asia/Yekaterinburg";
        break;
    case "59":
        $timezone = "Asia/Vladivostok";
        break;
    case "60":
        $timezone = "Europe/Kaliningrad";
        break;
    case "61":
        $timezone = "Europe/Volgograd";
        break;
    case "62":
        $timezone = "Europe/Moscow";
        break;
    case "63":
        $timezone = "Asia/Yakutsk";
        break;
    case "64":
        $timezone = "Asia/Sakhalin";
        break;
    case "65":
        $timezone = "Europe/Samara";
        break;
    case "66":
        $timezone = "Europe/Moscow";
        break;
    case "67":
        $timezone = "Europe/Samara";
        break;
    case "68":
        $timezone = "Europe/Volgograd";
        break;
    case "69":
        $timezone = "Europe/Moscow";
        break;
    case "70":
        $timezone = "Europe/Volgograd";
        break;
    case "71":
        $timezone = "Asia/Yekaterinburg";
        break;
    case "72":
        $timezone = "Europe/Moscow";
        break;
    case "73":
        $timezone = "Europe/Samara";
        break;
    case "74":
        $timezone = "Asia/Krasnoyarsk";
        break;
    case "75":
        $timezone = "Asia/Novosibirsk";
        break;
    case "76":
        $timezone = "Europe/Moscow";
        break;
    case "77":
        $timezone = "Europe/Moscow";
        break;
    case "78":
        $timezone = "Asia/Yekaterinburg";
        break;
    case "79":
        $timezone = "Asia/Irkutsk";
        break;
    case "80":
        $timezone = "Asia/Yekaterinburg";
        break;
    case "81":
        $timezone = "Europe/Samara";
        break;
    case "82":
        $timezone = "Asia/Irkutsk";
        break;
    case "83":
        $timezone = "Europe/Moscow";
        break;
    case "84":
        $timezone = "Europe/Volgograd";
        break;
    case "85":
        $timezone = "Europe/Moscow";
        break;
    case "86":
        $timezone = "Europe/Moscow";
        break;
    case "87":
        $timezone = "Asia/Novosibirsk";
        break;
    case "88":
        $timezone = "Europe/Moscow";
        break;
    case "89":
        $timezone = "Asia/Vladivostok";
        break;
    }
    break;
  case "UA":
      switch ($region) {
    case "01":
        $timezone = "Europe/Kiev";
        break;
    case "02":
        $timezone = "Europe/Kiev";
        break;
    case "03":
        $timezone = "Europe/Uzhgorod";
        break;
    case "04":
        $timezone = "Europe/Zaporozhye";
        break;
    case "05":
        $timezone = "Europe/Zaporozhye";
        break;
    case "06":
        $timezone = "Europe/Uzhgorod";
        break;
    case "07":
        $timezone = "Europe/Zaporozhye";
        break;
    case "08":
        $timezone = "Europe/Simferopol";
        break;
    case "09":
        $timezone = "Europe/Kiev";
        break;
    case "10":
        $timezone = "Europe/Zaporozhye";
        break;
    case "11":
        $timezone = "Europe/Simferopol";
        break;
    case "13":
        $timezone = "Europe/Kiev";
        break;
    case "14":
        $timezone = "Europe/Zaporozhye";
        break;
    case "15":
        $timezone = "Europe/Uzhgorod";
        break;
    case "16":
        $timezone = "Europe/Zaporozhye";
        break;
    case "17":
        $timezone = "Europe/Simferopol";
        break;
    case "18":
        $timezone = "Europe/Zaporozhye";
        break;
    case "19":
        $timezone = "Europe/Kiev";
        break;
    case "20":
        $timezone = "Europe/Simferopol";
        break;
    case "21":
        $timezone = "Europe/Kiev";
        break;
    case "22":
        $timezone = "Europe/Uzhgorod";
        break;
    case "23":
        $timezone = "Europe/Kiev";
        break;
    case "24":
        $timezone = "Europe/Uzhgorod";
        break;
    case "25":
        $timezone = "Europe/Uzhgorod";
        break;
    case "26":
        $timezone = "Europe/Zaporozhye";
        break;
    case "27":
        $timezone = "Europe/Kiev";
        break;
    }
    break;
  case "UZ":
      switch ($region) {
    case "01":
        $timezone = "Asia/Tashkent";
        break;
    case "02":
        $timezone = "Asia/Samarkand";
        break;
    case "03":
        $timezone = "Asia/Tashkent";
        break;
    case "06":
        $timezone = "Asia/Tashkent";
        break;
    case "07":
        $timezone = "Asia/Samarkand";
        break;
    case "08":
        $timezone = "Asia/Samarkand";
        break;
    case "09":
        $timezone = "Asia/Samarkand";
        break;
    case "10":
        $timezone = "Asia/Samarkand";
        break;
    case "12":
        $timezone = "Asia/Samarkand";
        break;
    case "13":
        $timezone = "Asia/Tashkent";
        break;
    case "14":
        $timezone = "Asia/Tashkent";
        break;
    }
    break;
  case "TL":
      $timezone = "Asia/Dili";
      break;
  case "PF":
      $timezone = "Pacific/Marquesas";
      break;
  case "SX":
      $timezone = "America/Curacao";
      break;
  case "BQ":
      $timezone = "America/Curacao";
      break;
  case "CW":
      $timezone = "America/Curacao";
      break;
    }
    return $timezone;
  }
  */

    public function GetTimeZoneIp($ip = null)
    {
        $pa = \Session::get('timezone');
        if (!empty($pa)) {
            date_default_timezone_set($pa);
            return null;
        }
        $base = Country::where('shortname', 'ES')->first();
        $tas = "Europe/Madrid";
        if (!empty($base->id)) {
            \Session::put('moneda', $base->currency);
            \Session::put('moneda', $base->currency);
            \Session::put('currency', $base->currency);
            \Session::put('currency', $base->currency);

            if (empty($base->timezone)) {
                $base->timezone = "Europe/Madrid";
            } else {
                $tas = $base->timezone;
            }
            \Session::put('timezone', $base->timezone);
            \Session::put('timezone', $base->timezone);
            //\Session::put('timezone_h',$base->timezone_h);
            \Session::put('lat', $base->lat);
            \Session::put('lng', $base->lng);
            \Session::put('lat', $base->lat);
            \Session::put('lng', $base->lng);
        } else {
            \Session::put('moneda', 'EUR');
            \Session::put('currency', "EUR");
            \Session::put('timezone', $tas);
            \Session::put('lat', 0);
            \Session::put('lng', 0);
            \Session::put('moneda', 'EUR');
            \Session::put('currency', "EUR");
            \Session::put('timezone', $tas);
            \Session::put('lat', 0);
            \Session::put('lng', 0);
        }

        if (!empty($ip) and empty($pa)) {
            //\Log::critical("Verificando ip $ip");
            $e = 0;
            $pais = Country::Corto()->first();
            \Session::put('moneda', $pais->getCurrency());
            \Session::put('currency', $pais->getCurrency());
            \Session::put('timezone', $pais->getTimezone());
            \Session::put('lat', $pais->getLat());
            \Session::put('lng', $pais->getLng());
            \Session::put('moneda', $pais->getCurrency());
            \Session::put('currency', $pais->getCurrency());
            \Session::put('timezone', $pais->getTimezone());
            \Session::put('lat', $pais->getLat());
            \Session::put('lng', $pais->getLng());

            try {
                set_time_limit(10);
                $s = geoip($ip);

                $d = [];
                $d["ip"] = $s['ip'];// "186.93.232.6";
                $d["iso_code"] = $s['iso_code'];// "VE"
                $d["country"] = $s['country'];// "Venezuela"
                $d["city"] = $s['city'];// "Caracas (Roca Tarpeya)"
                $d["state"] = $s['state'];// ""
                $d["state_name"] = $s['state_name'];// "Capital"
                $d["postal_code"] = $s['postal_code'];// ""
                $d["lat"] = $s['lat'];// 10.4917
                $d["lon"] = $s['lon'];// -66.9138
                $d["timezone"] = $s['timezone'];// "America/Caracas"
                $tx = $d["timezone"];
                \Session::put('timezone', $d["timezone"]);
                \Session::put('timezone', $d["timezone"]);
                $d["continent"] = $s['continent'];// "Unknown"
                $d["currency"] = $s['currency'];// "VEF"
                \Session::put('moneda', $d["currency"]);
                \Session::put('moneda', $d["currency"]);
                foreach ($d as $k => $v) {
                    \Session::put($k, $v);
                    \Session::put($k, $v);
                }
                \Session::put('moneda', $d["currency"]);
                \Session::put('currency', $d["currency"]);
                \Session::put('timezone', $d["timezone"]);
                \Session::put('lat', $s['lat']);
                \Session::put('lng', $s['lon']);
                \Session::put('moneda', $d["currency"]);
                \Session::put('currency', $d["currency"]);
                \Session::put('timezone', $d["timezone"]);
                \Session::put('lat', $s['lat']);
                \Session::put('lng', $s['lon']);

                $pais = Country::Corto($s->iso_code)->first();
                if (!empty($pais)) {
                    if (empty($pais->timezone)) {
                        $pais->setTimezone($d["timezone"])->push();
                    };
                } else {
                    $pais = Country::Corto()->first();
                }
                $e = 0;
            } catch (InvalidDatabaseException $e) {
                $e = 1;

            } catch (\ErrorException $e) {
                $e = 1;
            } catch (\FatalErrorException $e) {
                $e = 1;
            } catch (\Exception $e) {
                $e = 1;
            }
            if ($e == 1) {
                try {
                    set_time_limit(10);
                    $url2 = "https://ipapi.co/$ip/json";
                    $f = self::alt_file_get_contents_curl($url2);
                    $f = json_decode($f);

                    if (!empty($f)) {
                        foreach ($f as $t => $d) {
                            \Session::put($t, $d);
                            \Session::put($t, $d);
                        }
                        $la = \Session::get('latitude');
                        $lb = \Session::get('longitude');

                        \Session::put('lat', $la);
                        \Session::put('lat', $la);
                        \Session::put('lng', $lb);
                        \Session::put('lng', $lb);

                        $pais = Country::Corto($f->country)->first();

                        if (!empty($pais)) {
                            if (empty($pais->timezone)) {
                                $pais->setTimezone($d["timezone"])->push();
                            }
                        } else {
                            $pais = Country::Corto()->first();
                        }
                    }
                    $e = 0;
                } catch (\ErrorException $e) {
                    $e = 1;
                } catch (\FatalErrorException $e) {
                    $e = 1;
                } catch (\Exception $e) {
                    $e = 1;
                }
            }
            if ($e == 1) {
                try {
                    set_time_limit(10);
                    $url = "http://ip-api.com/json/$ip";
                    $fa = json_decode(self::alt_file_get_contents_curl($url));
                    if (!empty($fa)) {
                        if (count($fa) != 0) {
                            $pais = Country::Corto($fa->countryCode)->first();


                            if (!empty($pais)) {
                                if (empty($pais->timezone)) {
                                    $pais->setTimezone($fa->timezone)->push();
                                }
                            } else {
                                $pais = Country::Corto()->first();
                            }
                        }
                    }
                    $e = 0;
                } catch (\ErrorException $e) {
                    $e = 1;
                } catch (\FatalErrorException $e) {
                    $e = 1;
                } catch (\Exception $e) {
                    $e = 1;
                }
            }


            if ($e == 1) {
                $pais = Country::Corto()->first();
            }
            \Session::put('moneda', $pais->currency);
            \Session::put('currency', $pais->currency);
            \Session::put('timezone', $pais->timezone);
            \Session::put('lat', $pais->lat);
            \Session::put('lng', $pais->lng);
            \Session::put('pais_id', $pais->id);

            \Session::put('moneda', $pais->currency);
            \Session::put('currency', $pais->currency);
            \Session::put('timezone', $pais->timezone);
            \Session::put('lat', $pais->lat);
            \Session::put('lng', $pais->lng);
            \Session::put('pais_id', $pais->id);

        }
        $fa = \Session::get('moneda');
        $te = 'EUR';
        if (!empty($fa)) {
            $ta = Moneda::where(['status' => 1, 'small' => $fa])->first();
            if (empty($ta)) {
                \Session::put('moneda', 'EUR');
                \Session::put('currency', 'EUR');
                \Session::put('moneda', 'EUR');
                \Session::put('currency', 'EUR');
            }

        }

        date_default_timezone_set($tas);
    }

    public function MicroTiempo($txt = null, $comparar = null)
    {
        list($usec, $sec) = explode(" ", microtime());
        $ts = ((float)$usec + (float)$sec);
        $f = '';
        if (!empty($comparar)) {
            $f = (float)($ts - $comparar);
        }
        if (!empty($txt)) {
            \Log::critical("$txt  $ts -//- $f");
        }
        return $ts;

    }

    public function TimeZoneByShort($country, $region)
    {
        /*PENDIUENTE USAR LUEGO*/
        switch ($country) {

            case "US":
                switch ($region) {
                    case "AL":
                        $timezone = "America/Chicago";
                        break;
                    case "AK":
                        $timezone = "America/Anchorage";
                        break;
                    case "AZ":
                        $timezone = "America/Phoenix";
                        break;
                    case "AR":
                        $timezone = "America/Chicago";
                        break;
                    case "CA":
                        $timezone = "America/Los_Angeles";
                        break;
                    case "CO":
                        $timezone = "America/Denver";
                        break;
                    case "CT":
                        $timezone = "America/New_York";
                        break;
                    case "DE":
                        $timezone = "America/New_York";
                        break;
                    case "DC":
                        $timezone = "America/New_York";
                        break;
                    case "FL":
                        $timezone = "America/New_York";
                        break;
                    case "GA":
                        $timezone = "America/New_York";
                        break;
                    case "HI":
                        $timezone = "Pacific/Honolulu";
                        break;
                    case "ID":
                        $timezone = "America/Denver";
                        break;
                    case "IL":
                        $timezone = "America/Chicago";
                        break;
                    case "IN":
                        $timezone = "America/Indianapolis";
                        break;
                    case "IA":
                        $timezone = "America/Chicago";
                        break;
                    case "KS":
                        $timezone = "America/Chicago";
                        break;
                    case "KY":
                        $timezone = "America/New_York";
                        break;
                    case "LA":
                        $timezone = "America/Chicago";
                        break;
                    case "ME":
                        $timezone = "America/New_York";
                        break;
                    case "MD":
                        $timezone = "America/New_York";
                        break;
                    case "MA":
                        $timezone = "America/New_York";
                        break;
                    case "MI":
                        $timezone = "America/New_York";
                        break;
                    case "MN":
                        $timezone = "America/Chicago";
                        break;
                    case "MS":
                        $timezone = "America/Chicago";
                        break;
                    case "MO":
                        $timezone = "America/Chicago";
                        break;
                    case "MT":
                        $timezone = "America/Denver";
                        break;
                    case "NE":
                        $timezone = "America/Chicago";
                        break;
                    case "NV":
                        $timezone = "America/Los_Angeles";
                        break;
                    case "NH":
                        $timezone = "America/New_York";
                        break;
                    case "NJ":
                        $timezone = "America/New_York";
                        break;
                    case "NM":
                        $timezone = "America/Denver";
                        break;
                    case "NY":
                        $timezone = "America/New_York";
                        break;
                    case "NC":
                        $timezone = "America/New_York";
                        break;
                    case "ND":
                        $timezone = "America/Chicago";
                        break;
                    case "OH":
                        $timezone = "America/New_York";
                        break;
                    case "OK":
                        $timezone = "America/Chicago";
                        break;
                    case "OR":
                        $timezone = "America/Los_Angeles";
                        break;
                    case "PA":
                        $timezone = "America/New_York";
                        break;
                    case "RI":
                        $timezone = "America/New_York";
                        break;
                    case "SC":
                        $timezone = "America/New_York";
                        break;
                    case "SD":
                        $timezone = "America/Chicago";
                        break;
                    case "TN":
                        $timezone = "America/Chicago";
                        break;
                    case "TX":
                        $timezone = "America/Chicago";
                        break;
                    case "UT":
                        $timezone = "America/Denver";
                        break;
                    case "VT":
                        $timezone = "America/New_York";
                        break;
                    case "VA":
                        $timezone = "America/New_York";
                        break;
                    case "WA":
                        $timezone = "America/Los_Angeles";
                        break;
                    case "WV":
                        $timezone = "America/New_York";
                        break;
                    case "WI":
                        $timezone = "America/Chicago";
                        break;
                    case "WY":
                        $timezone = "America/Denver";
                        break;
                }
                break;
            case "CA":
                switch ($region) {
                    case "AB":
                        $timezone = "America/Edmonton";
                        break;
                    case "BC":
                        $timezone = "America/Vancouver";
                        break;
                    case "MB":
                        $timezone = "America/Winnipeg";
                        break;
                    case "NB":
                        $timezone = "America/Halifax";
                        break;
                    case "NL":
                        $timezone = "America/St_Johns";
                        break;
                    case "NT":
                        $timezone = "America/Yellowknife";
                        break;
                    case "NS":
                        $timezone = "America/Halifax";
                        break;
                    case "NU":
                        $timezone = "America/Rankin_Inlet";
                        break;
                    case "ON":
                        $timezone = "America/Rainy_River";
                        break;
                    case "PE":
                        $timezone = "America/Halifax";
                        break;
                    case "QC":
                        $timezone = "America/Montreal";
                        break;
                    case "SK":
                        $timezone = "America/Regina";
                        break;
                    case "YT":
                        $timezone = "America/Whitehorse";
                        break;
                }
                break;
            case "AU":
                switch ($region) {
                    case "01":
                        $timezone = "Australia/Canberra";
                        break;
                    case "02":
                        $timezone = "Australia/NSW";
                        break;
                    case "03":
                        $timezone = "Australia/North";
                        break;
                    case "04":
                        $timezone = "Australia/Queensland";
                        break;
                    case "05":
                        $timezone = "Australia/South";
                        break;
                    case "06":
                        $timezone = "Australia/Tasmania";
                        break;
                    case "07":
                        $timezone = "Australia/Victoria";
                        break;
                    case "08":
                        $timezone = "Australia/West";
                        break;
                }
                break;
            case "AS":
                $timezone = "US/Samoa";
                break;
            case "CI":
                $timezone = "Africa/Abidjan";
                break;
            case "GH":
                $timezone = "Africa/Accra";
                break;
            case "DZ":
                $timezone = "Africa/Algiers";
                break;
            case "ER":
                $timezone = "Africa/Asmera";
                break;
            case "ML":
                $timezone = "Africa/Bamako";
                break;
            case "CF":
                $timezone = "Africa/Bangui";
                break;
            case "GM":
                $timezone = "Africa/Banjul";
                break;
            case "GW":
                $timezone = "Africa/Bissau";
                break;
            case "CG":
                $timezone = "Africa/Brazzaville";
                break;
            case "BI":
                $timezone = "Africa/Bujumbura";
                break;
            case "EG":
                $timezone = "Africa/Cairo";
                break;
            case "MA":
                $timezone = "Africa/Casablanca";
                break;
            case "GN":
                $timezone = "Africa/Conakry";
                break;
            case "SN":
                $timezone = "Africa/Dakar";
                break;
            case "DJ":
                $timezone = "Africa/Djibouti";
                break;
            case "SL":
                $timezone = "Africa/Freetown";
                break;
            case "BW":
                $timezone = "Africa/Gaborone";
                break;
            case "ZW":
                $timezone = "Africa/Harare";
                break;
            case "ZA":
                $timezone = "Africa/Johannesburg";
                break;
            case "UG":
                $timezone = "Africa/Kampala";
                break;
            case "SD":
                $timezone = "Africa/Khartoum";
                break;
            case "RW":
                $timezone = "Africa/Kigali";
                break;
            case "NG":
                $timezone = "Africa/Lagos";
                break;
            case "GA":
                $timezone = "Africa/Libreville";
                break;
            case "TG":
                $timezone = "Africa/Lome";
                break;
            case "AO":
                $timezone = "Africa/Luanda";
                break;
            case "ZM":
                $timezone = "Africa/Lusaka";
                break;
            case "GQ":
                $timezone = "Africa/Malabo";
                break;
            case "MZ":
                $timezone = "Africa/Maputo";
                break;
            case "LS":
                $timezone = "Africa/Maseru";
                break;
            case "SZ":
                $timezone = "Africa/Mbabane";
                break;
            case "SO":
                $timezone = "Africa/Mogadishu";
                break;
            case "LR":
                $timezone = "Africa/Monrovia";
                break;
            case "KE":
                $timezone = "Africa/Nairobi";
                break;
            case "TD":
                $timezone = "Africa/Ndjamena";
                break;
            case "NE":
                $timezone = "Africa/Niamey";
                break;
            case "MR":
                $timezone = "Africa/Nouakchott";
                break;
            case "BF":
                $timezone = "Africa/Ouagadougou";
                break;
            case "ST":
                $timezone = "Africa/Sao_Tome";
                break;
            case "LY":
                $timezone = "Africa/Tripoli";
                break;
            case "TN":
                $timezone = "Africa/Tunis";
                break;
            case "AI":
                $timezone = "America/Anguilla";
                break;
            case "AG":
                $timezone = "America/Antigua";
                break;
            case "AW":
                $timezone = "America/Aruba";
                break;
            case "BB":
                $timezone = "America/Barbados";
                break;
            case "BZ":
                $timezone = "America/Belize";
                break;
            case "CO":
                $timezone = "America/Bogota";
                break;
            case "VE":
                $timezone = "America/Caracas";
                break;
            case "KY":
                $timezone = "America/Cayman";
                break;
            case "CR":
                $timezone = "America/Costa_Rica";
                break;
            case "DM":
                $timezone = "America/Dominica";
                break;
            case "SV":
                $timezone = "America/El_Salvador";
                break;
            case "GD":
                $timezone = "America/Grenada";
                break;
            case "FR":
                $timezone = "Europe/Paris";
                break;
            case "GP":
                $timezone = "America/Guadeloupe";
                break;
            case "GT":
                $timezone = "America/Guatemala";
                break;
            case "GY":
                $timezone = "America/Guyana";
                break;
            case "CU":
                $timezone = "America/Havana";
                break;
            case "JM":
                $timezone = "America/Jamaica";
                break;
            case "BO":
                $timezone = "America/La_Paz";
                break;
            case "PE":
                $timezone = "America/Lima";
                break;
            case "NI":
                $timezone = "America/Managua";
                break;
            case "MQ":
                $timezone = "America/Martinique";
                break;
            case "UY":
                $timezone = "America/Montevideo";
                break;
            case "MS":
                $timezone = "America/Montserrat";
                break;
            case "BS":
                $timezone = "America/Nassau";
                break;
            case "PA":
                $timezone = "America/Panama";
                break;
            case "SR":
                $timezone = "America/Paramaribo";
                break;
            case "PR":
                $timezone = "America/Puerto_Rico";
                break;
            case "KN":
                $timezone = "America/St_Kitts";
                break;
            case "LC":
                $timezone = "America/St_Lucia";
                break;
            case "VC":
                $timezone = "America/St_Vincent";
                break;
            case "HN":
                $timezone = "America/Tegucigalpa";
                break;
            case "YE":
                $timezone = "Asia/Aden";
                break;
            case "JO":
                $timezone = "Asia/Amman";
                break;
            case "TM":
                $timezone = "Asia/Ashgabat";
                break;
            case "IQ":
                $timezone = "Asia/Baghdad";
                break;
            case "BH":
                $timezone = "Asia/Bahrain";
                break;
            case "AZ":
                $timezone = "Asia/Baku";
                break;
            case "TH":
                $timezone = "Asia/Bangkok";
                break;
            case "LB":
                $timezone = "Asia/Beirut";
                break;
            case "KG":
                $timezone = "Asia/Bishkek";
                break;
            case "BN":
                $timezone = "Asia/Brunei";
                break;
            case "IN":
                $timezone = "Asia/Calcutta";
                break;
            case "MN":
                $timezone = "Asia/Choibalsan";
                break;
            case "LK":
                $timezone = "Asia/Colombo";
                break;
            case "BD":
                $timezone = "Asia/Dhaka";
                break;
            case "AE":
                $timezone = "Asia/Dubai";
                break;
            case "TJ":
                $timezone = "Asia/Dushanbe";
                break;
            case "HK":
                $timezone = "Asia/Hong_Kong";
                break;
            case "TR":
                $timezone = "Asia/Istanbul";
                break;
            case "IL":
                $timezone = "Asia/Jerusalem";
                break;
            case "AF":
                $timezone = "Asia/Kabul";
                break;
            case "PK":
                $timezone = "Asia/Karachi";
                break;
            case "NP":
                $timezone = "Asia/Katmandu";
                break;
            case "KW":
                $timezone = "Asia/Kuwait";
                break;
            case "MO":
                $timezone = "Asia/Macao";
                break;
            case "PH":
                $timezone = "Asia/Manila";
                break;
            case "OM":
                $timezone = "Asia/Muscat";
                break;
            case "CY":
                $timezone = "Asia/Nicosia";
                break;
            case "KP":
                $timezone = "Asia/Pyongyang";
                break;
            case "QA":
                $timezone = "Asia/Qatar";
                break;
            case "MM":
                $timezone = "Asia/Rangoon";
                break;
            case "SA":
                $timezone = "Asia/Riyadh";
                break;
            case "KR":
                $timezone = "Asia/Seoul";
                break;
            case "SG":
                $timezone = "Asia/Singapore";
                break;
            case "TW":
                $timezone = "Asia/Taipei";
                break;
            case "GE":
                $timezone = "Asia/Tbilisi";
                break;
            case "BT":
                $timezone = "Asia/Thimphu";
                break;
            case "JP":
                $timezone = "Asia/Tokyo";
                break;
            case "LA":
                $timezone = "Asia/Vientiane";
                break;
            case "AM":
                $timezone = "Asia/Yerevan";
                break;
            case "BM":
                $timezone = "Atlantic/Bermuda";
                break;
            case "CV":
                $timezone = "Atlantic/Cape_Verde";
                break;
            case "FO":
                $timezone = "Atlantic/Faeroe";
                break;
            case "IS":
                $timezone = "Atlantic/Reykjavik";
                break;
            case "GS":
                $timezone = "Atlantic/South_Georgia";
                break;
            case "SH":
                $timezone = "Atlantic/St_Helena";
                break;
            case "CL":
                $timezone = "Chile/Continental";
                break;
            case "NL":
                $timezone = "Europe/Amsterdam";
                break;
            case "AD":
                $timezone = "Europe/Andorra";
                break;
            case "GR":
                $timezone = "Europe/Athens";
                break;
            case "YU":
                $timezone = "Europe/Belgrade";
                break;
            case "DE":
                $timezone = "Europe/Berlin";
                break;
            case "SK":
                $timezone = "Europe/Bratislava";
                break;
            case "BE":
                $timezone = "Europe/Brussels";
                break;
            case "RO":
                $timezone = "Europe/Bucharest";
                break;
            case "HU":
                $timezone = "Europe/Budapest";
                break;
            case "DK":
                $timezone = "Europe/Copenhagen";
                break;
            case "IE":
                $timezone = "Europe/Dublin";
                break;
            case "GI":
                $timezone = "Europe/Gibraltar";
                break;
            case "FI":
                $timezone = "Europe/Helsinki";
                break;
            case "SI":
                $timezone = "Europe/Ljubljana";
                break;
            case "GB":
                $timezone = "Europe/London";
                break;
            case "LU":
                $timezone = "Europe/Luxembourg";
                break;
            case "MT":
                $timezone = "Europe/Malta";
                break;
            case "BY":
                $timezone = "Europe/Minsk";
                break;
            case "MC":
                $timezone = "Europe/Monaco";
                break;
            case "NO":
                $timezone = "Europe/Oslo";
                break;
            case "CZ":
                $timezone = "Europe/Prague";
                break;
            case "LV":
                $timezone = "Europe/Riga";
                break;
            case "IT":
                $timezone = "Europe/Rome";
                break;
            case "SM":
                $timezone = "Europe/San_Marino";
                break;
            case "BA":
                $timezone = "Europe/Sarajevo";
                break;
            case "MK":
                $timezone = "Europe/Skopje";
                break;
            case "BG":
                $timezone = "Europe/Sofia";
                break;
            case "SE":
                $timezone = "Europe/Stockholm";
                break;
            case "EE":
                $timezone = "Europe/Tallinn";
                break;
            case "AL":
                $timezone = "Europe/Tirane";
                break;
            case "LI":
                $timezone = "Europe/Vaduz";
                break;
            case "VA":
                $timezone = "Europe/Vatican";
                break;
            case "AT":
                $timezone = "Europe/Vienna";
                break;
            case "LT":
                $timezone = "Europe/Vilnius";
                break;
            case "PL":
                $timezone = "Europe/Warsaw";
                break;
            case "HR":
                $timezone = "Europe/Zagreb";
                break;
            case "IR":
                $timezone = "Asia/Tehran";
                break;
            case "MG":
                $timezone = "Indian/Antananarivo";
                break;
            case "CX":
                $timezone = "Indian/Christmas";
                break;
            case "CC":
                $timezone = "Indian/Cocos";
                break;
            case "KM":
                $timezone = "Indian/Comoro";
                break;
            case "MV":
                $timezone = "Indian/Maldives";
                break;
            case "MU":
                $timezone = "Indian/Mauritius";
                break;
            case "YT":
                $timezone = "Indian/Mayotte";
                break;
            case "RE":
                $timezone = "Indian/Reunion";
                break;
            case "FJ":
                $timezone = "Pacific/Fiji";
                break;
            case "TV":
                $timezone = "Pacific/Funafuti";
                break;
            case "GU":
                $timezone = "Pacific/Guam";
                break;
            case "NR":
                $timezone = "Pacific/Nauru";
                break;
            case "NU":
                $timezone = "Pacific/Niue";
                break;
            case "NF":
                $timezone = "Pacific/Norfolk";
                break;
            case "PW":
                $timezone = "Pacific/Palau";
                break;
            case "PN":
                $timezone = "Pacific/Pitcairn";
                break;
            case "CK":
                $timezone = "Pacific/Rarotonga";
                break;
            case "WS":
                $timezone = "Pacific/Samoa";
                break;
            case "KI":
                $timezone = "Pacific/Tarawa";
                break;
            case "TO":
                $timezone = "Pacific/Tongatapu";
                break;
            case "WF":
                $timezone = "Pacific/Wallis";
                break;
            case "TZ":
                $timezone = "Africa/Dar_es_Salaam";
                break;
            case "VN":
                $timezone = "Asia/Phnom_Penh";
                break;
            case "KH":
                $timezone = "Asia/Phnom_Penh";
                break;
            case "CM":
                $timezone = "Africa/Lagos";
                break;
            case "DO":
                $timezone = "America/Santo_Domingo";
                break;
            case "ET":
                $timezone = "Africa/Addis_Ababa";
                break;
            case "FX":
                $timezone = "Europe/Paris";
                break;
            case "HT":
                $timezone = "America/Port-au-Prince";
                break;
            case "CH":
                $timezone = "Europe/Zurich";
                break;
            case "AN":
                $timezone = "America/Curacao";
                break;
            case "BJ":
                $timezone = "Africa/Porto-Novo";
                break;
            case "EH":
                $timezone = "Africa/El_Aaiun";
                break;
            case "FK":
                $timezone = "Atlantic/Stanley";
                break;
            case "GF":
                $timezone = "America/Cayenne";
                break;
            case "IO":
                $timezone = "Indian/Chagos";
                break;
            case "MD":
                $timezone = "Europe/Chisinau";
                break;
            case "MP":
                $timezone = "Pacific/Saipan";
                break;
            case "MW":
                $timezone = "Africa/Blantyre";
                break;
            case "NA":
                $timezone = "Africa/Windhoek";
                break;
            case "NC":
                $timezone = "Pacific/Noumea";
                break;
            case "PG":
                $timezone = "Pacific/Port_Moresby";
                break;
            case "PM":
                $timezone = "America/Miquelon";
                break;
            case "PS":
                $timezone = "Asia/Gaza";
                break;
            case "PY":
                $timezone = "America/Asuncion";
                break;
            case "SB":
                $timezone = "Pacific/Guadalcanal";
                break;
            case "SC":
                $timezone = "Indian/Mahe";
                break;
            case "SJ":
                $timezone = "Arctic/Longyearbyen";
                break;
            case "SY":
                $timezone = "Asia/Damascus";
                break;
            case "TC":
                $timezone = "America/Grand_Turk";
                break;
            case "TF":
                $timezone = "Indian/Kerguelen";
                break;
            case "TK":
                $timezone = "Pacific/Fakaofo";
                break;
            case "TT":
                $timezone = "America/Port_of_Spain";
                break;
            case "VG":
                $timezone = "America/Tortola";
                break;
            case "VI":
                $timezone = "America/St_Thomas";
                break;
            case "VU":
                $timezone = "Pacific/Efate";
                break;
            case "RS":
                $timezone = "Europe/Belgrade";
                break;
            case "ME":
                $timezone = "Europe/Podgorica";
                break;
            case "AX":
                $timezone = "Europe/Mariehamn";
                break;
            case "GG":
                $timezone = "Europe/Guernsey";
                break;
            case "IM":
                $timezone = "Europe/Isle_of_Man";
                break;
            case "JE":
                $timezone = "Europe/Jersey";
                break;
            case "BL":
                $timezone = "America/St_Barthelemy";
                break;
            case "MF":
                $timezone = "America/Marigot";
                break;
            case "AR":
                switch ($region) {
                    case "01":
                        $timezone = "America/Argentina/Buenos_Aires";
                        break;
                    case "02":
                        $timezone = "America/Argentina/Catamarca";
                        break;
                    case "03":
                        $timezone = "America/Argentina/Tucuman";
                        break;
                    case "04":
                        $timezone = "America/Argentina/Rio_Gallegos";
                        break;
                    case "05":
                        $timezone = "America/Argentina/Cordoba";
                        break;
                    case "06":
                        $timezone = "America/Argentina/Tucuman";
                        break;
                    case "07":
                        $timezone = "America/Argentina/Buenos_Aires";
                        break;
                    case "08":
                        $timezone = "America/Argentina/Buenos_Aires";
                        break;
                    case "09":
                        $timezone = "America/Argentina/Tucuman";
                        break;
                    case "10":
                        $timezone = "America/Argentina/Jujuy";
                        break;
                    case "11":
                        $timezone = "America/Argentina/San_Luis";
                        break;
                    case "12":
                        $timezone = "America/Argentina/La_Rioja";
                        break;
                    case "13":
                        $timezone = "America/Argentina/Mendoza";
                        break;
                    case "14":
                        $timezone = "America/Argentina/Buenos_Aires";
                        break;
                    case "15":
                        $timezone = "America/Argentina/San_Luis";
                        break;
                    case "16":
                        $timezone = "America/Argentina/Buenos_Aires";
                        break;
                    case "17":
                        $timezone = "America/Argentina/Salta";
                        break;
                    case "18":
                        $timezone = "America/Argentina/San_Juan";
                        break;
                    case "19":
                        $timezone = "America/Argentina/San_Luis";
                        break;
                    case "20":
                        $timezone = "America/Argentina/Rio_Gallegos";
                        break;
                    case "21":
                        $timezone = "America/Argentina/Buenos_Aires";
                        break;
                    case "22":
                        $timezone = "America/Argentina/Catamarca";
                        break;
                    case "23":
                        $timezone = "America/Argentina/Ushuaia";
                        break;
                    case "24":
                        $timezone = "America/Argentina/Tucuman";
                        break;
                }
                break;
            case "BR":
                switch ($region) {
                    case "01":
                        $timezone = "America/Rio_Branco";
                        break;
                    case "02":
                        $timezone = "America/Maceio";
                        break;
                    case "03":
                        $timezone = "America/Sao_Paulo";
                        break;
                    case "04":
                        $timezone = "America/Manaus";
                        break;
                    case "05":
                        $timezone = "America/Bahia";
                        break;
                    case "06":
                        $timezone = "America/Fortaleza";
                        break;
                    case "07":
                        $timezone = "America/Sao_Paulo";
                        break;
                    case "08":
                        $timezone = "America/Sao_Paulo";
                        break;
                    case "11":
                        $timezone = "America/Campo_Grande";
                        break;
                    case "13":
                        $timezone = "America/Belem";
                        break;
                    case "14":
                        $timezone = "America/Cuiaba";
                        break;
                    case "15":
                        $timezone = "America/Sao_Paulo";
                        break;
                    case "16":
                        $timezone = "America/Belem";
                        break;
                    case "17":
                        $timezone = "America/Recife";
                        break;
                    case "18":
                        $timezone = "America/Sao_Paulo";
                        break;
                    case "20":
                        $timezone = "America/Fortaleza";
                        break;
                    case "21":
                        $timezone = "America/Sao_Paulo";
                        break;
                    case "22":
                        $timezone = "America/Recife";
                        break;
                    case "23":
                        $timezone = "America/Sao_Paulo";
                        break;
                    case "24":
                        $timezone = "America/Porto_Velho";
                        break;
                    case "25":
                        $timezone = "America/Boa_Vista";
                        break;
                    case "26":
                        $timezone = "America/Sao_Paulo";
                        break;
                    case "27":
                        $timezone = "America/Sao_Paulo";
                        break;
                    case "28":
                        $timezone = "America/Maceio";
                        break;
                    case "29":
                        $timezone = "America/Sao_Paulo";
                        break;
                    case "30":
                        $timezone = "America/Recife";
                        break;
                    case "31":
                        $timezone = "America/Araguaina";
                        break;
                }
                break;
            case "CD":
                switch ($region) {
                    case "02":
                        $timezone = "Africa/Kinshasa";
                        break;
                    case "05":
                        $timezone = "Africa/Lubumbashi";
                        break;
                    case "06":
                        $timezone = "Africa/Kinshasa";
                        break;
                    case "08":
                        $timezone = "Africa/Kinshasa";
                        break;
                    case "10":
                        $timezone = "Africa/Lubumbashi";
                        break;
                    case "11":
                        $timezone = "Africa/Lubumbashi";
                        break;
                    case "12":
                        $timezone = "Africa/Lubumbashi";
                        break;
                }
                break;
            case "CN":
                switch ($region) {
                    case "01":
                        $timezone = "Asia/Shanghai";
                        break;
                    case "02":
                        $timezone = "Asia/Shanghai";
                        break;
                    case "03":
                        $timezone = "Asia/Shanghai";
                        break;
                    case "04":
                        $timezone = "Asia/Shanghai";
                        break;
                    case "05":
                        $timezone = "Asia/Harbin";
                        break;
                    case "06":
                        $timezone = "Asia/Chongqing";
                        break;
                    case "07":
                        $timezone = "Asia/Shanghai";
                        break;
                    case "08":
                        $timezone = "Asia/Harbin";
                        break;
                    case "09":
                        $timezone = "Asia/Shanghai";
                        break;
                    case "10":
                        $timezone = "Asia/Shanghai";
                        break;
                    case "11":
                        $timezone = "Asia/Chongqing";
                        break;
                    case "12":
                        $timezone = "Asia/Shanghai";
                        break;
                    case "13":
                        $timezone = "Asia/Urumqi";
                        break;
                    case "14":
                        $timezone = "Asia/Chongqing";
                        break;
                    case "15":
                        $timezone = "Asia/Chongqing";
                        break;
                    case "16":
                        $timezone = "Asia/Chongqing";
                        break;
                    case "18":
                        $timezone = "Asia/Chongqing";
                        break;
                    case "19":
                        $timezone = "Asia/Harbin";
                        break;
                    case "20":
                        $timezone = "Asia/Harbin";
                        break;
                    case "21":
                        $timezone = "Asia/Chongqing";
                        break;
                    case "22":
                        $timezone = "Asia/Harbin";
                        break;
                    case "23":
                        $timezone = "Asia/Shanghai";
                        break;
                    case "24":
                        $timezone = "Asia/Chongqing";
                        break;
                    case "25":
                        $timezone = "Asia/Shanghai";
                        break;
                    case "26":
                        $timezone = "Asia/Chongqing";
                        break;
                    case "28":
                        $timezone = "Asia/Shanghai";
                        break;
                    case "29":
                        $timezone = "Asia/Chongqing";
                        break;
                    case "30":
                        $timezone = "Asia/Chongqing";
                        break;
                    case "31":
                        $timezone = "Asia/Chongqing";
                        break;
                    case "32":
                        $timezone = "Asia/Chongqing";
                        break;
                    case "33":
                        $timezone = "Asia/Chongqing";
                        break;
                }
                break;
            case "EC":
                switch ($region) {
                    case "01":
                        $timezone = "Pacific/Galapagos";
                        break;
                    case "02":
                        $timezone = "America/Guayaquil";
                        break;
                    case "03":
                        $timezone = "America/Guayaquil";
                        break;
                    case "04":
                        $timezone = "America/Guayaquil";
                        break;
                    case "05":
                        $timezone = "America/Guayaquil";
                        break;
                    case "06":
                        $timezone = "America/Guayaquil";
                        break;
                    case "07":
                        $timezone = "America/Guayaquil";
                        break;
                    case "08":
                        $timezone = "America/Guayaquil";
                        break;
                    case "09":
                        $timezone = "America/Guayaquil";
                        break;
                    case "10":
                        $timezone = "America/Guayaquil";
                        break;
                    case "11":
                        $timezone = "America/Guayaquil";
                        break;
                    case "12":
                        $timezone = "America/Guayaquil";
                        break;
                    case "13":
                        $timezone = "America/Guayaquil";
                        break;
                    case "14":
                        $timezone = "America/Guayaquil";
                        break;
                    case "15":
                        $timezone = "America/Guayaquil";
                        break;
                    case "17":
                        $timezone = "America/Guayaquil";
                        break;
                    case "18":
                        $timezone = "America/Guayaquil";
                        break;
                    case "19":
                        $timezone = "America/Guayaquil";
                        break;
                    case "20":
                        $timezone = "America/Guayaquil";
                        break;
                    case "22":
                        $timezone = "America/Guayaquil";
                        break;
                }
                break;
            case "ES":
                switch ($region) {
                    case "07":
                        $timezone = "Europe/Madrid";
                        break;
                    case "27":
                        $timezone = "Europe/Madrid";
                        break;
                    case "29":
                        $timezone = "Europe/Madrid";
                        break;
                    case "31":
                        $timezone = "Europe/Madrid";
                        break;
                    case "32":
                        $timezone = "Europe/Madrid";
                        break;
                    case "34":
                        $timezone = "Europe/Madrid";
                        break;
                    case "39":
                        $timezone = "Europe/Madrid";
                        break;
                    case "51":
                        $timezone = "Africa/Ceuta";
                        break;
                    case "52":
                        $timezone = "Europe/Madrid";
                        break;
                    case "53":
                        $timezone = "Atlantic/Canary";
                        break;
                    case "54":
                        $timezone = "Europe/Madrid";
                        break;
                    case "55":
                        $timezone = "Europe/Madrid";
                        break;
                    case "56":
                        $timezone = "Europe/Madrid";
                        break;
                    case "57":
                        $timezone = "Europe/Madrid";
                        break;
                    case "58":
                        $timezone = "Europe/Madrid";
                        break;
                    case "59":
                        $timezone = "Europe/Madrid";
                        break;
                    case "60":
                        $timezone = "Europe/Madrid";
                        break;
                }
                break;
            case "GL":
                switch ($region) {
                    case "01":
                        $timezone = "America/Thule";
                        break;
                    case "02":
                        $timezone = "America/Godthab";
                        break;
                    case "03":
                        $timezone = "America/Godthab";
                        break;
                }
                break;
            case "ID":
                switch ($region) {
                    case "01":
                        $timezone = "Asia/Pontianak";
                        break;
                    case "02":
                        $timezone = "Asia/Makassar";
                        break;
                    case "03":
                        $timezone = "Asia/Jakarta";
                        break;
                    case "04":
                        $timezone = "Asia/Jakarta";
                        break;
                    case "05":
                        $timezone = "Asia/Jakarta";
                        break;
                    case "06":
                        $timezone = "Asia/Jakarta";
                        break;
                    case "07":
                        $timezone = "Asia/Jakarta";
                        break;
                    case "08":
                        $timezone = "Asia/Jakarta";
                        break;
                    case "09":
                        $timezone = "Asia/Jayapura";
                        break;
                    case "10":
                        $timezone = "Asia/Jakarta";
                        break;
                    case "11":
                        $timezone = "Asia/Pontianak";
                        break;
                    case "12":
                        $timezone = "Asia/Makassar";
                        break;
                    case "13":
                        $timezone = "Asia/Makassar";
                        break;
                    case "14":
                        $timezone = "Asia/Makassar";
                        break;
                    case "15":
                        $timezone = "Asia/Jakarta";
                        break;
                    case "16":
                        $timezone = "Asia/Makassar";
                        break;
                    case "17":
                        $timezone = "Asia/Makassar";
                        break;
                    case "18":
                        $timezone = "Asia/Makassar";
                        break;
                    case "19":
                        $timezone = "Asia/Pontianak";
                        break;
                    case "20":
                        $timezone = "Asia/Makassar";
                        break;
                    case "21":
                        $timezone = "Asia/Makassar";
                        break;
                    case "22":
                        $timezone = "Asia/Makassar";
                        break;
                    case "23":
                        $timezone = "Asia/Makassar";
                        break;
                    case "24":
                        $timezone = "Asia/Jakarta";
                        break;
                    case "25":
                        $timezone = "Asia/Pontianak";
                        break;
                    case "26":
                        $timezone = "Asia/Pontianak";
                        break;
                    case "30":
                        $timezone = "Asia/Jakarta";
                        break;
                    case "31":
                        $timezone = "Asia/Makassar";
                        break;
                    case "33":
                        $timezone = "Asia/Jakarta";
                        break;
                }
                break;
            case "KZ":
                switch ($region) {
                    case "01":
                        $timezone = "Asia/Almaty";
                        break;
                    case "02":
                        $timezone = "Asia/Almaty";
                        break;
                    case "03":
                        $timezone = "Asia/Qyzylorda";
                        break;
                    case "04":
                        $timezone = "Asia/Aqtobe";
                        break;
                    case "05":
                        $timezone = "Asia/Qyzylorda";
                        break;
                    case "06":
                        $timezone = "Asia/Aqtau";
                        break;
                    case "07":
                        $timezone = "Asia/Oral";
                        break;
                    case "08":
                        $timezone = "Asia/Qyzylorda";
                        break;
                    case "09":
                        $timezone = "Asia/Aqtau";
                        break;
                    case "10":
                        $timezone = "Asia/Qyzylorda";
                        break;
                    case "11":
                        $timezone = "Asia/Almaty";
                        break;
                    case "12":
                        $timezone = "Asia/Qyzylorda";
                        break;
                    case "13":
                        $timezone = "Asia/Aqtobe";
                        break;
                    case "14":
                        $timezone = "Asia/Qyzylorda";
                        break;
                    case "15":
                        $timezone = "Asia/Almaty";
                        break;
                    case "16":
                        $timezone = "Asia/Aqtobe";
                        break;
                    case "17":
                        $timezone = "Asia/Almaty";
                        break;
                }
                break;
            case "MX":
                switch ($region) {
                    case "01":
                        $timezone = "America/Mexico_City";
                        break;
                    case "02":
                        $timezone = "America/Tijuana";
                        break;
                    case "03":
                        $timezone = "America/Hermosillo";
                        break;
                    case "04":
                        $timezone = "America/Merida";
                        break;
                    case "05":
                        $timezone = "America/Mexico_City";
                        break;
                    case "06":
                        $timezone = "America/Chihuahua";
                        break;
                    case "07":
                        $timezone = "America/Monterrey";
                        break;
                    case "08":
                        $timezone = "America/Mexico_City";
                        break;
                    case "09":
                        $timezone = "America/Mexico_City";
                        break;
                    case "10":
                        $timezone = "America/Mazatlan";
                        break;
                    case "11":
                        $timezone = "America/Mexico_City";
                        break;
                    case "12":
                        $timezone = "America/Mexico_City";
                        break;
                    case "13":
                        $timezone = "America/Mexico_City";
                        break;
                    case "14":
                        $timezone = "America/Mazatlan";
                        break;
                    case "15":
                        $timezone = "America/Chihuahua";
                        break;
                    case "16":
                        $timezone = "America/Mexico_City";
                        break;
                    case "17":
                        $timezone = "America/Mexico_City";
                        break;
                    case "18":
                        $timezone = "America/Mazatlan";
                        break;
                    case "19":
                        $timezone = "America/Monterrey";
                        break;
                    case "20":
                        $timezone = "America/Mexico_City";
                        break;
                    case "21":
                        $timezone = "America/Mexico_City";
                        break;
                    case "22":
                        $timezone = "America/Mexico_City";
                        break;
                    case "23":
                        $timezone = "America/Cancun";
                        break;
                    case "24":
                        $timezone = "America/Mexico_City";
                        break;
                    case "25":
                        $timezone = "America/Mazatlan";
                        break;
                    case "26":
                        $timezone = "America/Hermosillo";
                        break;
                    case "27":
                        $timezone = "America/Merida";
                        break;
                    case "28":
                        $timezone = "America/Monterrey";
                        break;
                    case "29":
                        $timezone = "America/Mexico_City";
                        break;
                    case "30":
                        $timezone = "America/Mexico_City";
                        break;
                    case "31":
                        $timezone = "America/Merida";
                        break;
                    case "32":
                        $timezone = "America/Monterrey";
                        break;
                }
                break;
            case "MY":
                switch ($region) {
                    case "01":
                        $timezone = "Asia/Kuala_Lumpur";
                        break;
                    case "02":
                        $timezone = "Asia/Kuala_Lumpur";
                        break;
                    case "03":
                        $timezone = "Asia/Kuala_Lumpur";
                        break;
                    case "04":
                        $timezone = "Asia/Kuala_Lumpur";
                        break;
                    case "05":
                        $timezone = "Asia/Kuala_Lumpur";
                        break;
                    case "06":
                        $timezone = "Asia/Kuala_Lumpur";
                        break;
                    case "07":
                        $timezone = "Asia/Kuala_Lumpur";
                        break;
                    case "08":
                        $timezone = "Asia/Kuala_Lumpur";
                        break;
                    case "09":
                        $timezone = "Asia/Kuala_Lumpur";
                        break;
                    case "11":
                        $timezone = "Asia/Kuching";
                        break;
                    case "12":
                        $timezone = "Asia/Kuala_Lumpur";
                        break;
                    case "13":
                        $timezone = "Asia/Kuala_Lumpur";
                        break;
                    case "14":
                        $timezone = "Asia/Kuala_Lumpur";
                        break;
                    case "15":
                        $timezone = "Asia/Kuching";
                        break;
                    case "16":
                        $timezone = "Asia/Kuching";
                        break;
                }
                break;
            case "NZ":
                switch ($region) {
                    case "85":
                        $timezone = "Pacific/Auckland";
                        break;
                    case "E7":
                        $timezone = "Pacific/Auckland";
                        break;
                    case "E8":
                        $timezone = "Pacific/Auckland";
                        break;
                    case "E9":
                        $timezone = "Pacific/Auckland";
                        break;
                    case "F1":
                        $timezone = "Pacific/Auckland";
                        break;
                    case "F2":
                        $timezone = "Pacific/Auckland";
                        break;
                    case "F3":
                        $timezone = "Pacific/Auckland";
                        break;
                    case "F4":
                        $timezone = "Pacific/Auckland";
                        break;
                    case "F5":
                        $timezone = "Pacific/Auckland";
                        break;
                    case "F7":
                        $timezone = "Pacific/Chatham";
                        break;
                    case "F8":
                        $timezone = "Pacific/Auckland";
                        break;
                    case "F9":
                        $timezone = "Pacific/Auckland";
                        break;
                    case "G1":
                        $timezone = "Pacific/Auckland";
                        break;
                    case "G2":
                        $timezone = "Pacific/Auckland";
                        break;
                    case "G3":
                        $timezone = "Pacific/Auckland";
                        break;
                }
                break;
            case "PT":
                switch ($region) {
                    case "02":
                        $timezone = "Europe/Lisbon";
                        break;
                    case "03":
                        $timezone = "Europe/Lisbon";
                        break;
                    case "04":
                        $timezone = "Europe/Lisbon";
                        break;
                    case "05":
                        $timezone = "Europe/Lisbon";
                        break;
                    case "06":
                        $timezone = "Europe/Lisbon";
                        break;
                    case "07":
                        $timezone = "Europe/Lisbon";
                        break;
                    case "08":
                        $timezone = "Europe/Lisbon";
                        break;
                    case "09":
                        $timezone = "Europe/Lisbon";
                        break;
                    case "10":
                        $timezone = "Atlantic/Madeira";
                        break;
                    case "11":
                        $timezone = "Europe/Lisbon";
                        break;
                    case "13":
                        $timezone = "Europe/Lisbon";
                        break;
                    case "14":
                        $timezone = "Europe/Lisbon";
                        break;
                    case "16":
                        $timezone = "Europe/Lisbon";
                        break;
                    case "17":
                        $timezone = "Europe/Lisbon";
                        break;
                    case "18":
                        $timezone = "Europe/Lisbon";
                        break;
                    case "19":
                        $timezone = "Europe/Lisbon";
                        break;
                    case "20":
                        $timezone = "Europe/Lisbon";
                        break;
                    case "21":
                        $timezone = "Europe/Lisbon";
                        break;
                    case "22":
                        $timezone = "Europe/Lisbon";
                        break;
                }
                break;
            case "RU":
                switch ($region) {
                    case "01":
                        $timezone = "Europe/Volgograd";
                        break;
                    case "02":
                        $timezone = "Asia/Irkutsk";
                        break;
                    case "03":
                        $timezone = "Asia/Novokuznetsk";
                        break;
                    case "04":
                        $timezone = "Asia/Novosibirsk";
                        break;
                    case "05":
                        $timezone = "Asia/Vladivostok";
                        break;
                    case "06":
                        $timezone = "Europe/Moscow";
                        break;
                    case "07":
                        $timezone = "Europe/Volgograd";
                        break;
                    case "08":
                        $timezone = "Europe/Samara";
                        break;
                    case "09":
                        $timezone = "Europe/Moscow";
                        break;
                    case "10":
                        $timezone = "Europe/Moscow";
                        break;
                    case "11":
                        $timezone = "Asia/Irkutsk";
                        break;
                    case "13":
                        $timezone = "Asia/Yekaterinburg";
                        break;
                    case "14":
                        $timezone = "Asia/Irkutsk";
                        break;
                    case "15":
                        $timezone = "Asia/Anadyr";
                        break;
                    case "16":
                        $timezone = "Europe/Samara";
                        break;
                    case "17":
                        $timezone = "Europe/Volgograd";
                        break;
                    case "18":
                        $timezone = "Asia/Krasnoyarsk";
                        break;
                    case "20":
                        $timezone = "Asia/Irkutsk";
                        break;
                    case "21":
                        $timezone = "Europe/Moscow";
                        break;
                    case "22":
                        $timezone = "Europe/Volgograd";
                        break;
                    case "23":
                        $timezone = "Europe/Kaliningrad";
                        break;
                    case "24":
                        $timezone = "Europe/Volgograd";
                        break;
                    case "25":
                        $timezone = "Europe/Moscow";
                        break;
                    case "26":
                        $timezone = "Asia/Kamchatka";
                        break;
                    case "27":
                        $timezone = "Europe/Volgograd";
                        break;
                    case "28":
                        $timezone = "Europe/Moscow";
                        break;
                    case "29":
                        $timezone = "Asia/Novokuznetsk";
                        break;
                    case "30":
                        $timezone = "Asia/Vladivostok";
                        break;
                    case "31":
                        $timezone = "Asia/Krasnoyarsk";
                        break;
                    case "32":
                        $timezone = "Asia/Omsk";
                        break;
                    case "33":
                        $timezone = "Asia/Yekaterinburg";
                        break;
                    case "34":
                        $timezone = "Asia/Yekaterinburg";
                        break;
                    case "35":
                        $timezone = "Asia/Yekaterinburg";
                        break;
                    case "36":
                        $timezone = "Asia/Anadyr";
                        break;
                    case "37":
                        $timezone = "Europe/Moscow";
                        break;
                    case "38":
                        $timezone = "Europe/Volgograd";
                        break;
                    case "39":
                        $timezone = "Asia/Krasnoyarsk";
                        break;
                    case "40":
                        $timezone = "Asia/Yekaterinburg";
                        break;
                    case "41":
                        $timezone = "Europe/Moscow";
                        break;
                    case "42":
                        $timezone = "Europe/Moscow";
                        break;
                    case "43":
                        $timezone = "Europe/Moscow";
                        break;
                    case "44":
                        $timezone = "Asia/Magadan";
                        break;
                    case "45":
                        $timezone = "Europe/Samara";
                        break;
                    case "46":
                        $timezone = "Europe/Samara";
                        break;
                    case "47":
                        $timezone = "Europe/Moscow";
                        break;
                    case "48":
                        $timezone = "Europe/Moscow";
                        break;
                    case "49":
                        $timezone = "Europe/Moscow";
                        break;
                    case "50":
                        $timezone = "Asia/Yekaterinburg";
                        break;
                    case "51":
                        $timezone = "Europe/Moscow";
                        break;
                    case "52":
                        $timezone = "Europe/Moscow";
                        break;
                    case "53":
                        $timezone = "Asia/Novosibirsk";
                        break;
                    case "54":
                        $timezone = "Asia/Omsk";
                        break;
                    case "55":
                        $timezone = "Europe/Samara";
                        break;
                    case "56":
                        $timezone = "Europe/Moscow";
                        break;
                    case "57":
                        $timezone = "Europe/Samara";
                        break;
                    case "58":
                        $timezone = "Asia/Yekaterinburg";
                        break;
                    case "59":
                        $timezone = "Asia/Vladivostok";
                        break;
                    case "60":
                        $timezone = "Europe/Kaliningrad";
                        break;
                    case "61":
                        $timezone = "Europe/Volgograd";
                        break;
                    case "62":
                        $timezone = "Europe/Moscow";
                        break;
                    case "63":
                        $timezone = "Asia/Yakutsk";
                        break;
                    case "64":
                        $timezone = "Asia/Sakhalin";
                        break;
                    case "65":
                        $timezone = "Europe/Samara";
                        break;
                    case "66":
                        $timezone = "Europe/Moscow";
                        break;
                    case "67":
                        $timezone = "Europe/Samara";
                        break;
                    case "68":
                        $timezone = "Europe/Volgograd";
                        break;
                    case "69":
                        $timezone = "Europe/Moscow";
                        break;
                    case "70":
                        $timezone = "Europe/Volgograd";
                        break;
                    case "71":
                        $timezone = "Asia/Yekaterinburg";
                        break;
                    case "72":
                        $timezone = "Europe/Moscow";
                        break;
                    case "73":
                        $timezone = "Europe/Samara";
                        break;
                    case "74":
                        $timezone = "Asia/Krasnoyarsk";
                        break;
                    case "75":
                        $timezone = "Asia/Novosibirsk";
                        break;
                    case "76":
                        $timezone = "Europe/Moscow";
                        break;
                    case "77":
                        $timezone = "Europe/Moscow";
                        break;
                    case "78":
                        $timezone = "Asia/Yekaterinburg";
                        break;
                    case "79":
                        $timezone = "Asia/Irkutsk";
                        break;
                    case "80":
                        $timezone = "Asia/Yekaterinburg";
                        break;
                    case "81":
                        $timezone = "Europe/Samara";
                        break;
                    case "82":
                        $timezone = "Asia/Irkutsk";
                        break;
                    case "83":
                        $timezone = "Europe/Moscow";
                        break;
                    case "84":
                        $timezone = "Europe/Volgograd";
                        break;
                    case "85":
                        $timezone = "Europe/Moscow";
                        break;
                    case "86":
                        $timezone = "Europe/Moscow";
                        break;
                    case "87":
                        $timezone = "Asia/Novosibirsk";
                        break;
                    case "88":
                        $timezone = "Europe/Moscow";
                        break;
                    case "89":
                        $timezone = "Asia/Vladivostok";
                        break;
                }
                break;
            case "UA":
                switch ($region) {
                    case "01":
                        $timezone = "Europe/Kiev";
                        break;
                    case "02":
                        $timezone = "Europe/Kiev";
                        break;
                    case "03":
                        $timezone = "Europe/Uzhgorod";
                        break;
                    case "04":
                        $timezone = "Europe/Zaporozhye";
                        break;
                    case "05":
                        $timezone = "Europe/Zaporozhye";
                        break;
                    case "06":
                        $timezone = "Europe/Uzhgorod";
                        break;
                    case "07":
                        $timezone = "Europe/Zaporozhye";
                        break;
                    case "08":
                        $timezone = "Europe/Simferopol";
                        break;
                    case "09":
                        $timezone = "Europe/Kiev";
                        break;
                    case "10":
                        $timezone = "Europe/Zaporozhye";
                        break;
                    case "11":
                        $timezone = "Europe/Simferopol";
                        break;
                    case "13":
                        $timezone = "Europe/Kiev";
                        break;
                    case "14":
                        $timezone = "Europe/Zaporozhye";
                        break;
                    case "15":
                        $timezone = "Europe/Uzhgorod";
                        break;
                    case "16":
                        $timezone = "Europe/Zaporozhye";
                        break;
                    case "17":
                        $timezone = "Europe/Simferopol";
                        break;
                    case "18":
                        $timezone = "Europe/Zaporozhye";
                        break;
                    case "19":
                        $timezone = "Europe/Kiev";
                        break;
                    case "20":
                        $timezone = "Europe/Simferopol";
                        break;
                    case "21":
                        $timezone = "Europe/Kiev";
                        break;
                    case "22":
                        $timezone = "Europe/Uzhgorod";
                        break;
                    case "23":
                        $timezone = "Europe/Kiev";
                        break;
                    case "24":
                        $timezone = "Europe/Uzhgorod";
                        break;
                    case "25":
                        $timezone = "Europe/Uzhgorod";
                        break;
                    case "26":
                        $timezone = "Europe/Zaporozhye";
                        break;
                    case "27":
                        $timezone = "Europe/Kiev";
                        break;
                }
                break;
            case "UZ":
                switch ($region) {
                    case "01":
                        $timezone = "Asia/Tashkent";
                        break;
                    case "02":
                        $timezone = "Asia/Samarkand";
                        break;
                    case "03":
                        $timezone = "Asia/Tashkent";
                        break;
                    case "06":
                        $timezone = "Asia/Tashkent";
                        break;
                    case "07":
                        $timezone = "Asia/Samarkand";
                        break;
                    case "08":
                        $timezone = "Asia/Samarkand";
                        break;
                    case "09":
                        $timezone = "Asia/Samarkand";
                        break;
                    case "10":
                        $timezone = "Asia/Samarkand";
                        break;
                    case "12":
                        $timezone = "Asia/Samarkand";
                        break;
                    case "13":
                        $timezone = "Asia/Tashkent";
                        break;
                    case "14":
                        $timezone = "Asia/Tashkent";
                        break;
                }
                break;
            case "TL":
                $timezone = "Asia/Dili";
                break;
            case "PF":
                $timezone = "Pacific/Marquesas";
                break;
            case "SX":
                $timezone = "America/Curacao";
                break;
            case "BQ":
                $timezone = "America/Curacao";
                break;
            case "CW":
                $timezone = "America/Curacao";
                break;
        }
        return $timezone;
    }

    public function ActualizarMoneda()
    {
        $fa = Moneda::where('id', "!=", 0)->orderby('updated_at', 'asc')->get()->take(5);
        $ta = [];
        $t = 0;
        foreach ($fa as $k => $v) {
            if ($v->small != 'EUR') {
                if (Carbon::parse($v->updated_at)->diffInDays() > 1) {

                    $sa = Functions::currencyConverter1($v->small);
                    if (!empty($sa)) {
                        $v->setValor($sa)->push();
                        $ta[$v->small] = $sa;
                        \Log::critical('Actualizando monedas ' . $v->small . " Valor $sa ");
                        $t = $t + 1;
                    }
                }

            } else {
                $v->setValor(1)->push();
            }
        }
        return (json_encode($ta));
    }

    public function BorrarDatosSession()
    {
        $fa = \Session::all();
        foreach ($fa as $k => $v) {
            \Session::forget($k);
        }
        session()->flush();
        echo "Ok";
    }

    public function ReemplazarAcentos($str)
    {

        $a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'Ā', 'ā', 'Ă', 'ă', 'Ą', 'ą', 'Ć', 'ć', 'Ĉ', 'ĉ', 'Ċ', 'ċ', 'Č', 'č', 'Ď', 'ď', 'Đ', 'đ', 'Ē', 'ē', 'Ĕ', 'ĕ', 'Ė', 'ė', 'Ę', 'ę', 'Ě', 'ě', 'Ĝ', 'ĝ', 'Ğ', 'ğ', 'Ġ', 'ġ', 'Ģ', 'ģ', 'Ĥ', 'ĥ', 'Ħ', 'ħ', 'Ĩ', 'ĩ', 'Ī', 'ī', 'Ĭ', 'ĭ', 'Į', 'į', 'İ', 'ı', 'Ĳ', 'ĳ', 'Ĵ', 'ĵ', 'Ķ', 'ķ', 'Ĺ', 'ĺ', 'Ļ', 'ļ', 'Ľ', 'ľ', 'Ŀ', 'ŀ', 'Ł', 'ł', 'Ń', 'ń', 'Ņ', 'ņ', 'Ň', 'ň', 'ŉ', 'Ō', 'ō', 'Ŏ', 'ŏ', 'Ő', 'ő', 'Œ', 'œ', 'Ŕ', 'ŕ', 'Ŗ', 'ŗ', 'Ř', 'ř', 'Ś', 'ś', 'Ŝ', 'ŝ', 'Ş', 'ş', 'Š', 'š', 'Ţ', 'ţ', 'Ť', 'ť', 'Ŧ', 'ŧ', 'Ũ', 'ũ', 'Ū', 'ū', 'Ŭ', 'ŭ', 'Ů', 'ů', 'Ű', 'ű', 'Ų', 'ų', 'Ŵ', 'ŵ', 'Ŷ', 'ŷ', 'Ÿ', 'Ź', 'ź', 'Ż', 'ż', 'Ž', 'ž', 'ſ', 'ƒ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ǎ', 'ǎ', 'Ǐ', 'ǐ', 'Ǒ', 'ǒ', 'Ǔ', 'ǔ', 'Ǖ', 'ǖ', 'Ǘ', 'ǘ', 'Ǚ', 'ǚ', 'Ǜ', 'ǜ', 'Ǻ', 'ǻ', 'Ǽ', 'ǽ', 'Ǿ', 'ǿ', 'Ά', 'ά', 'Έ', 'έ', 'Ό', 'ό', 'Ώ', 'ώ', 'Ί', 'ί', 'ϊ', 'ΐ', 'Ύ', 'ύ', 'ϋ', 'ΰ', 'Ή', 'ή', '(', '[', '{', '}', ']', ')', '/', '  ');
        $b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o', 'Α', 'α', 'Ε', 'ε', 'Ο', 'ο', 'Ω', 'ω', 'Ι', 'ι', 'ι', 'ι', 'Υ', 'υ', 'υ', 'υ', 'Η', 'η', '', '', '', '', '', '', '', ' ');
        $str = str_replace($a, $b, $str);

        $unwanted_array = array(
            'Š' => 'S', 'š' => 's', 'Ž' => 'Z', 'ž' => 'z', 'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A',
            'Å' => 'A', 'Æ' => 'A', 'Ç' => 'C', 'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I',
            'Î' => 'I', 'Ï' => 'I', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ø' => 'O',
            'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ý' => 'Y', 'Þ' => 'B', 'ß' => 'Ss', 'à' => 'a', 'á' => 'a',
            'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'a', 'ç' => 'c', 'è' => 'e', 'é' => 'e', 'ê' => 'e',
            'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 'ð' => 'o', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o',
            'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ý' => 'y', 'þ' => 'b',
            'ÿ' => 'y', 'Ğ' => 'G', 'İ' => 'I', 'Ş' => 'S', 'ğ' => 'g', 'ı' => 'i', 'ş' => 's', 'ü' => 'u', 'ă' => 'a',
            'Ă' => 'A', 'ș' => 's', 'Ș' => 'S', 'ț' => 't', 'Ț' => 'T', 'ъ' => '-', 'Ь' => '-', 'Ъ' => '-', 'ь' => '-',
            'Ă' => 'A', 'Ą' => 'A', 'À' => 'A', 'Ã' => 'A', 'Á' => 'A', 'Æ' => 'A', 'Â' => 'A', 'Å' => 'A', 'Ä' => 'Ae',
            'Þ' => 'B', 'Ć' => 'C', 'ץ' => 'C', 'Ç' => 'C', 'È' => 'E', 'Ę' => 'E', 'É' => 'E', 'Ë' => 'E', 'Ê' => 'E',
            'Ğ' => 'G', 'İ' => 'I', 'Ï' => 'I', 'Î' => 'I', 'Í' => 'I', 'Ì' => 'I', 'Ł' => 'L', 'Ñ' => 'N', 'Ń' => 'N',
            'Ø' => 'O', 'Ó' => 'O', 'Ò' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'Oe', 'Ş' => 'S', 'Ś' => 'S', 'Ș' => 'S',
            'Š' => 'S', 'Ț' => 'T', 'Ù' => 'U', 'Û' => 'U', 'Ú' => 'U', 'Ü' => 'Ue', 'Ý' => 'Y', 'Ź' => 'Z', 'Ž' => 'Z',
            'Ż' => 'Z', 'â' => 'a', 'ǎ' => 'a', 'ą' => 'a', 'á' => 'a', 'ă' => 'a', 'ã' => 'a', 'Ǎ' => 'a', 'а' => 'a',
            'А' => 'a', 'å' => 'a', 'à' => 'a', 'א' => 'a', 'Ǻ' => 'a', 'Ā' => 'a', 'ǻ' => 'a', 'ā' => 'a', 'ä' => 'ae',
            'æ' => 'ae', 'Ǽ' => 'ae', 'ǽ' => 'ae', 'б' => 'b', 'ב' => 'b', 'Б' => 'b', 'þ' => 'b', 'ĉ' => 'c', 'Ĉ' => 'c',
            'Ċ' => 'c', 'ć' => 'c', 'ç' => 'c', 'ц' => 'c', 'צ' => 'c', 'ċ' => 'c', 'Ц' => 'c', 'Č' => 'c', 'č' => 'c',
            'Ч' => 'ch', 'ч' => 'ch', 'ד' => 'd', 'ď' => 'd', 'Đ' => 'd', 'Ď' => 'd', 'đ' => 'd', 'д' => 'd', 'Д' => 'D',
            'ð' => 'd', 'є' => 'e', 'ע' => 'e', 'е' => 'e', 'Е' => 'e', 'Ə' => 'e', 'ę' => 'e', 'ĕ' => 'e',
            'ē' => 'e', 'Ē' => 'e', 'Ė' => 'e', 'ė' => 'e', 'ě' => 'e', 'Ě' => 'e', 'Є' => 'e', 'Ĕ' => 'e', 'ê' => 'e',
            'ə' => 'e', 'è' => 'e', 'ë' => 'e', 'é' => 'e', 'ф' => 'f', 'ƒ' => 'f', 'Ф' => 'f', 'ġ' => 'g', 'Ģ' => 'g',
            'Ġ' => 'g', 'Ĝ' => 'g', 'Г' => 'g', 'г' => 'g', 'ĝ' => 'g', 'ğ' => 'g', 'ג' => 'g', 'Ґ' => 'g', 'ґ' => 'g',
            'ģ' => 'g', 'ח' => 'h', 'ħ' => 'h', 'Х' => 'h', 'Ħ' => 'h', 'Ĥ' => 'h', 'ĥ' => 'h', 'х' => 'h', 'ה' => 'h',
            'î' => 'i', 'ï' => 'i', 'í' => 'i', 'ì' => 'i', 'į' => 'i', 'ĭ' => 'i', 'ı' => 'i', 'Ĭ' => 'i', 'И' => 'i',
            'ĩ' => 'i', 'ǐ' => 'i', 'Ĩ' => 'i', 'Ǐ' => 'i', 'и' => 'i', 'Į' => 'i', 'י' => 'i', 'Ї' => 'i', 'Ī' => 'i',
            'І' => 'i', 'ї' => 'i', 'і' => 'i', 'ī' => 'i', 'ĳ' => 'ij', 'Ĳ' => 'ij', 'й' => 'j', 'Й' => 'j', 'Ĵ' => 'j',
            'ĵ' => 'j', 'я' => 'ja', 'Я' => 'ja', 'Э' => 'je', 'э' => 'je', 'ё' => 'jo', 'Ё' => 'jo', 'ю' => 'ju',
            'Ю' => 'ju', 'ĸ' => 'k', 'כ' => 'k', 'Ķ' => 'k', 'К' => 'k', 'к' => 'k', 'ķ' => 'k', 'ך' => 'k', 'Ŀ' => 'l',
            'ŀ' => 'l', 'Л' => 'l', 'ł' => 'l', 'ļ' => 'l', 'ĺ' => 'l', 'Ĺ' => 'l', 'Ļ' => 'l', 'л' => 'l', 'Ľ' => 'l',
            'ľ' => 'l', 'ל' => 'l', 'מ' => 'm', 'М' => 'm', 'ם' => 'm', 'м' => 'm', 'ñ' => 'n', 'н' => 'n', 'Ņ' => 'n',
            'ן' => 'n', 'ŋ' => 'n', 'נ' => 'n', 'Н' => 'n', 'ń' => 'n', 'Ŋ' => 'n', 'ņ' => 'n', 'ŉ' => 'n', 'Ň' => 'n',
            'ň' => 'n', 'о' => 'o', 'О' => 'o', 'ő' => 'o', 'õ' => 'o', 'ô' => 'o', 'Ő' => 'o', 'ŏ' => 'o', 'Ŏ' => 'o',
            'Ō' => 'o', 'ō' => 'o', 'ø' => 'o', 'ǿ' => 'o', 'ǒ' => 'o', 'ò' => 'o', 'Ǿ' => 'o', 'Ǒ' => 'o', 'ơ' => 'o',
            'ó' => 'o', 'Ơ' => 'o', 'œ' => 'oe', 'Œ' => 'oe', 'ö' => 'oe', 'פ' => 'p', 'ף' => 'p', 'п' => 'p', 'П' => 'p',
            'ק' => 'q', 'ŕ' => 'r', 'ř' => 'r', 'Ř' => 'r', 'ŗ' => 'r', 'Ŗ' => 'r', 'ר' => 'r', 'Ŕ' => 'r', 'Р' => 'r',
            'р' => 'r', 'ș' => 's', 'с' => 's', 'Ŝ' => 's', 'š' => 's', 'ś' => 's', 'ס' => 's', 'ş' => 's', 'С' => 's',
            'ŝ' => 's', 'Щ' => 'sch', 'щ' => 'sch', 'ш' => 'sh', 'Ш' => 'sh', 'ß' => 'ss', 'т' => 't', 'ט' => 't',
            'ŧ' => 't', 'ת' => 't', 'ť' => 't', 'ţ' => 't', 'Ţ' => 't', 'Т' => 't', 'ț' => 't', 'Ŧ' => 't', 'Ť' => 't',
            '™' => 'tm', 'ū' => 'u', 'у' => 'u', 'Ũ' => 'u', 'ũ' => 'u', 'Ư' => 'u', 'ư' => 'u', 'Ū' => 'u', 'Ǔ' => 'u',
            'ų' => 'u', 'Ų' => 'u', 'ŭ' => 'u', 'Ŭ' => 'u', 'Ů' => 'u', 'ů' => 'u', 'ű' => 'u', 'Ű' => 'u', 'Ǖ' => 'u',
            'ǔ' => 'u', 'Ǜ' => 'u', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'У' => 'u', 'ǚ' => 'u', 'ǜ' => 'u', 'Ǚ' => 'u',
            'Ǘ' => 'u', 'ǖ' => 'u', 'ǘ' => 'u', 'ü' => 'ue', 'в' => 'v', 'ו' => 'v', 'В' => 'v', 'ש' => 'w', 'ŵ' => 'w',
            'Ŵ' => 'w', 'ы' => 'y', 'ŷ' => 'y', 'ý' => 'y', 'ÿ' => 'y', 'Ÿ' => 'y', 'Ŷ' => 'y', 'Ы' => 'y', 'ž' => 'z',
            'З' => 'z', 'з' => 'z', 'ź' => 'z', 'ז' => 'z', 'ż' => 'z', 'ſ' => 'z', 'Ж' => 'zh', 'ж' => 'zh', 'Ą' => 'A',
            'ą' => 'a', 'Ć' => 'C', 'ć' => 'c', 'Ę' => 'E', 'ę' => 'e', 'Ł' => 'L', 'ł' => 'l', 'Ń' => 'N', 'ń' => 'n',
            'Ś' => 'S', 'ś' => 's', 'Ż' => 'Z', 'ż' => 'z', 'Ź' => 'Z', 'ź' => 'z', '&amp;' => 'and', '@' => 'at',
            '©' => 'c', '®' => 'r', 'À' => 'a', 'Á' => 'a', 'Â' => 'a', 'Ä' => 'a', 'Å' => 'a', 'Æ' => 'ae', 'Ç' => 'c',
            'È' => 'e', 'É' => 'e', 'Ë' => 'e', 'Ì' => 'i', 'Í' => 'i', 'Î' => 'i', 'Ï' => 'i', 'Ò' => 'o', 'Ó' => 'o',
            'Ô' => 'o', 'Õ' => 'o', 'Ö' => 'o', 'Ø' => 'o', 'Ù' => 'u', 'Ú' => 'u', 'Û' => 'u', 'Ü' => 'u', 'Ý' => 'y',
            'ß' => 'ss', 'à' => 'a', 'á' => 'a', 'â' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'ae', 'ç' => 'c', 'è' => 'e',
            'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 'ò' => 'o', 'ó' => 'o',
            'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ý' => 'y',
            'þ' => 'p', 'ÿ' => 'y', 'Ā' => 'a', 'ā' => 'a', 'Ă' => 'a', 'ă' => 'a', 'Ą' => 'a', 'ą' => 'a', 'Ć' => 'c',
            'ć' => 'c', 'Ĉ' => 'c', 'ĉ' => 'c', 'Ċ' => 'c', 'ċ' => 'c', 'Č' => 'c', 'č' => 'c', 'Ď' => 'd', 'ď' => 'd',
            'Đ' => 'd', 'đ' => 'd', 'Ē' => 'e', 'ē' => 'e', 'Ĕ' => 'e', 'ĕ' => 'e', 'Ė' => 'e', 'ė' => 'e', 'Ę' => 'e',
            'ę' => 'e', 'Ě' => 'e', 'ě' => 'e', 'Ĝ' => 'g', 'ĝ' => 'g', 'Ğ' => 'g', 'ğ' => 'g', 'Ġ' => 'g', 'ġ' => 'g',
            'Ģ' => 'g', 'ģ' => 'g', 'Ĥ' => 'h', 'ĥ' => 'h', 'Ħ' => 'h', 'ħ' => 'h', 'Ĩ' => 'i', 'ĩ' => 'i', 'Ī' => 'i',
            'ī' => 'i', 'Ĭ' => 'i', 'ĭ' => 'i', 'Į' => 'i', 'į' => 'i', 'İ' => 'i', 'ı' => 'i', 'Ĳ' => 'ij', 'ĳ' => 'ij',
            'Ĵ' => 'j', 'ĵ' => 'j', 'Ķ' => 'k', 'ķ' => 'k', 'ĸ' => 'k', 'Ĺ' => 'l', 'ĺ' => 'l', 'Ļ' => 'l', 'ļ' => 'l',
            'Ľ' => 'l', 'ľ' => 'l', 'Ŀ' => 'l', 'ŀ' => 'l', 'Ł' => 'l', 'ł' => 'l', 'Ń' => 'n', 'ń' => 'n', 'Ņ' => 'n',
            'ņ' => 'n', 'Ň' => 'n', 'ň' => 'n', 'ŉ' => 'n', 'Ŋ' => 'n', 'ŋ' => 'n', 'Ō' => 'o', 'ō' => 'o', 'Ŏ' => 'o',
            'ŏ' => 'o', 'Ő' => 'o', 'ő' => 'o', 'Œ' => 'oe', 'œ' => 'oe', 'Ŕ' => 'r', 'ŕ' => 'r', 'Ŗ' => 'r', 'ŗ' => 'r',
            'Ř' => 'r', 'ř' => 'r', 'Ś' => 's', 'ś' => 's', 'Ŝ' => 's', 'ŝ' => 's', 'Ş' => 's', 'ş' => 's', 'Š' => 's',
            'š' => 's', 'Ţ' => 't', 'ţ' => 't', 'Ť' => 't', 'ť' => 't', 'Ŧ' => 't', 'ŧ' => 't', 'Ũ' => 'u', 'ũ' => 'u',
            'Ū' => 'u', 'ū' => 'u', 'Ŭ' => 'u', 'ŭ' => 'u', 'Ů' => 'u', 'ů' => 'u', 'Ű' => 'u', 'ű' => 'u', 'Ų' => 'u',
            'ų' => 'u', 'Ŵ' => 'w', 'ŵ' => 'w', 'Ŷ' => 'y', 'ŷ' => 'y', 'Ÿ' => 'y', 'Ź' => 'z', 'ź' => 'z', 'Ż' => 'z',
            'ż' => 'z', 'Ž' => 'z', 'ž' => 'z', 'ſ' => 'z', 'Ə' => 'e', 'ƒ' => 'f', 'Ơ' => 'o', 'ơ' => 'o', 'Ư' => 'u',
            'ư' => 'u', 'Ǎ' => 'a', 'ǎ' => 'a', 'Ǐ' => 'i', 'ǐ' => 'i', 'Ǒ' => 'o', 'ǒ' => 'o', 'Ǔ' => 'u', 'ǔ' => 'u',
            'Ǖ' => 'u', 'ǖ' => 'u', 'Ǘ' => 'u', 'ǘ' => 'u', 'Ǚ' => 'u', 'ǚ' => 'u', 'Ǜ' => 'u', 'ǜ' => 'u', 'Ǻ' => 'a',
            'ǻ' => 'a', 'Ǽ' => 'ae', 'ǽ' => 'ae', 'Ǿ' => 'o', 'ǿ' => 'o', 'ə' => 'e', 'Ё' => 'jo', 'Є' => 'e', 'І' => 'i',
            'Ї' => 'i', 'А' => 'a', 'Б' => 'b', 'В' => 'v', 'Г' => 'g', 'Д' => 'd', 'Е' => 'e', 'Ж' => 'zh', 'З' => 'z',
            'И' => 'i', 'Й' => 'j', 'К' => 'k', 'Л' => 'l', 'М' => 'm', 'Н' => 'n', 'О' => 'o', 'П' => 'p', 'Р' => 'r',
            'С' => 's', 'Т' => 't', 'У' => 'u', 'Ф' => 'f', 'Х' => 'h', 'Ц' => 'c', 'Ч' => 'ch', 'Ш' => 'sh', 'Щ' => 'sch',
            'Ъ' => '-', 'Ы' => 'y', 'Ь' => '-', 'Э' => 'je', 'Ю' => 'ju', 'Я' => 'ja', 'а' => 'a', 'б' => 'b', 'в' => 'v',
            'г' => 'g', 'д' => 'd', 'е' => 'e', 'ж' => 'zh', 'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l',
            'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f',
            'х' => 'h', 'ц' => 'c', 'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch', 'ъ' => '-', 'ы' => 'y', 'ь' => '-', 'э' => 'je',
            'ю' => 'ju', 'я' => 'ja', 'ё' => 'jo', 'є' => 'e', 'і' => 'i', 'ї' => 'i', 'Ґ' => 'g', 'ґ' => 'g', 'א' => 'a',
            'ב' => 'b', 'ג' => 'g', 'ד' => 'd', 'ה' => 'h', 'ו' => 'v', 'ז' => 'z', 'ח' => 'h', 'ט' => 't', 'י' => 'i',
            'ך' => 'k', 'כ' => 'k', 'ל' => 'l', 'ם' => 'm', 'מ' => 'm', 'ן' => 'n', 'נ' => 'n', 'ס' => 's', 'ע' => 'e',
            'ף' => 'p', 'פ' => 'p', 'ץ' => 'C', 'צ' => 'c', 'ק' => 'q', 'ר' => 'r', 'ש' => 'w', 'ת' => 't', '™' => 'tm',
            'Š' => 'S', 'Ž' => 'Z', 'š' => 's', 'ž' => 'z', 'Ÿ' => 'Y', 'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A',
            'Ä' => 'A', 'Å' => 'A', 'Ç' => 'C', 'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I',
            'Î' => 'I', 'Ï' => 'I', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ø' => 'O',
            'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ý' => 'Y', 'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a',
            'ä' => 'a', 'å' => 'a', 'ç' => 'c', 'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i',
            'î' => 'i', 'ï' => 'i', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ø' => 'o',
            'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ý' => 'y', 'ÿ' => 'y', '/' => '', '\\' => '', '@' => 'at',
            'Ĳ' => 'I', 'Ö' => 'O', 'Œ' => 'O', 'Ü' => 'U', 'ä' => 'a', 'æ' => 'a',
            'ĳ' => 'i', 'ö' => 'o', 'œ' => 'o', 'ü' => 'u', 'ß' => 's', 'ſ' => 's',
            'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A',
            'Æ' => 'A', 'Ā' => 'A', 'Ą' => 'A', 'Ă' => 'A', 'Ç' => 'C', 'Ć' => 'C',
            'Č' => 'C', 'Ĉ' => 'C', 'Ċ' => 'C', 'Ď' => 'D', 'Đ' => 'D', 'È' => 'E',
            'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ē' => 'E', 'Ę' => 'E', 'Ě' => 'E',
            'Ĕ' => 'E', 'Ė' => 'E', 'Ĝ' => 'G', 'Ğ' => 'G', 'Ġ' => 'G', 'Ģ' => 'G',
            'Ĥ' => 'H', 'Ħ' => 'H', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I',
            'Ī' => 'I', 'Ĩ' => 'I', 'Ĭ' => 'I', 'Į' => 'I', 'İ' => 'I', 'Ĵ' => 'J',
            'Ķ' => 'K', 'Ľ' => 'K', 'Ĺ' => 'K', 'Ļ' => 'K', 'Ŀ' => 'K', 'Ł' => 'L',
            'Ñ' => 'N', 'Ń' => 'N', 'Ň' => 'N', 'Ņ' => 'N', 'Ŋ' => 'N', 'Ò' => 'O',
            'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ø' => 'O', 'Ō' => 'O', 'Ő' => 'O',
            'Ŏ' => 'O', 'Ŕ' => 'R', 'Ř' => 'R', 'Ŗ' => 'R', 'Ś' => 'S', 'Ş' => 'S',
            'Ŝ' => 'S', 'Ș' => 'S', 'Š' => 'S', 'Ť' => 'T', 'Ţ' => 'T', 'Ŧ' => 'T',
            'Ț' => 'T', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ū' => 'U', 'Ů' => 'U',
            'Ű' => 'U', 'Ŭ' => 'U', 'Ũ' => 'U', 'Ų' => 'U', 'Ŵ' => 'W', 'Ŷ' => 'Y',
            'Ÿ' => 'Y', 'Ý' => 'Y', 'Ź' => 'Z', 'Ż' => 'Z', 'Ž' => 'Z', 'à' => 'a',
            'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ā' => 'a', 'ą' => 'a', 'ă' => 'a',
            'å' => 'a', 'ç' => 'c', 'ć' => 'c', 'č' => 'c', 'ĉ' => 'c', 'ċ' => 'c',
            'ď' => 'd', 'đ' => 'd', 'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e',
            'ē' => 'e', 'ę' => 'e', 'ě' => 'e', 'ĕ' => 'e', 'ė' => 'e', 'ƒ' => 'f',
            'ĝ' => 'g', 'ğ' => 'g', 'ġ' => 'g', 'ģ' => 'g', 'ĥ' => 'h', 'ħ' => 'h',
            'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 'ī' => 'i', 'ĩ' => 'i',
            'ĭ' => 'i', 'į' => 'i', 'ı' => 'i', 'ĵ' => 'j', 'ķ' => 'k', 'ĸ' => 'k',
            'ł' => 'l', 'ľ' => 'l', 'ĺ' => 'l', 'ļ' => 'l', 'ŀ' => 'l', 'ñ' => 'n',
            'ń' => 'n', 'ň' => 'n', 'ņ' => 'n', 'ŉ' => 'n', 'ŋ' => 'n', 'ò' => 'o',
            'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ø' => 'o', 'ō' => 'o', 'ő' => 'o',
            'ŏ' => 'o', 'ŕ' => 'r', 'ř' => 'r', 'ŗ' => 'r', 'ś' => 's', 'š' => 's',
            'ť' => 't', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ū' => 'u', 'ů' => 'u',
            'ű' => 'u', 'ŭ' => 'u', 'ũ' => 'u', 'ų' => 'u', 'ŵ' => 'w', 'ÿ' => 'y',
            'ý' => 'y', 'ŷ' => 'y', 'ż' => 'z', 'ź' => 'z', 'ž' => 'z', 'Α' => 'A',
            'Ά' => 'A', 'Ἀ' => 'A', 'Ἁ' => 'A', 'Ἂ' => 'A', 'Ἃ' => 'A', 'Ἄ' => 'A',
            'Ἅ' => 'A', 'Ἆ' => 'A', 'Ἇ' => 'A', 'ᾈ' => 'A', 'ᾉ' => 'A', 'ᾊ' => 'A',
            'ᾋ' => 'A', 'ᾌ' => 'A', 'ᾍ' => 'A', 'ᾎ' => 'A', 'ᾏ' => 'A', 'Ᾰ' => 'A',
            'Ᾱ' => 'A', 'Ὰ' => 'A', 'ᾼ' => 'A', 'Β' => 'B', 'Γ' => 'G', 'Δ' => 'D',
            'Ε' => 'E', 'Έ' => 'E', 'Ἐ' => 'E', 'Ἑ' => 'E', 'Ἒ' => 'E', 'Ἓ' => 'E',
            'Ἔ' => 'E', 'Ἕ' => 'E', 'Ὲ' => 'E', 'Ζ' => 'Z', 'Η' => 'I', 'Ή' => 'I',
            'Ἠ' => 'I', 'Ἡ' => 'I', 'Ἢ' => 'I', 'Ἣ' => 'I', 'Ἤ' => 'I', 'Ἥ' => 'I',
            'Ἦ' => 'I', 'Ἧ' => 'I', 'ᾘ' => 'I', 'ᾙ' => 'I', 'ᾚ' => 'I', 'ᾛ' => 'I',
            'ᾜ' => 'I', 'ᾝ' => 'I', 'ᾞ' => 'I', 'ᾟ' => 'I', 'Ὴ' => 'I', 'ῌ' => 'I',
            'Θ' => 'T', 'Ι' => 'I', 'Ί' => 'I', 'Ϊ' => 'I', 'Ἰ' => 'I', 'Ἱ' => 'I',
            'Ἲ' => 'I', 'Ἳ' => 'I', 'Ἴ' => 'I', 'Ἵ' => 'I', 'Ἶ' => 'I', 'Ἷ' => 'I',
            'Ῐ' => 'I', 'Ῑ' => 'I', 'Ὶ' => 'I', 'Κ' => 'K', 'Λ' => 'L', 'Μ' => 'M',
            'Ν' => 'N', 'Ξ' => 'K', 'Ο' => 'O', 'Ό' => 'O', 'Ὀ' => 'O', 'Ὁ' => 'O',
            'Ὂ' => 'O', 'Ὃ' => 'O', 'Ὄ' => 'O', 'Ὅ' => 'O', 'Ὸ' => 'O', 'Π' => 'P',
            'Ρ' => 'R', 'Ῥ' => 'R', 'Σ' => 'S', 'Τ' => 'T', 'Υ' => 'Y', 'Ύ' => 'Y',
            'Ϋ' => 'Y', 'Ὑ' => 'Y', 'Ὓ' => 'Y', 'Ὕ' => 'Y', 'Ὗ' => 'Y', 'Ῠ' => 'Y',
            'Ῡ' => 'Y', 'Ὺ' => 'Y', 'Φ' => 'F', 'Χ' => 'X', 'Ψ' => 'P', 'Ω' => 'O',
            'Ώ' => 'O', 'Ὠ' => 'O', 'Ὡ' => 'O', 'Ὢ' => 'O', 'Ὣ' => 'O', 'Ὤ' => 'O',
            'Ὥ' => 'O', 'Ὦ' => 'O', 'Ὧ' => 'O', 'ᾨ' => 'O', 'ᾩ' => 'O', 'ᾪ' => 'O',
            'ᾫ' => 'O', 'ᾬ' => 'O', 'ᾭ' => 'O', 'ᾮ' => 'O', 'ᾯ' => 'O', 'Ὼ' => 'O',
            'ῼ' => 'O', 'α' => 'a', 'ά' => 'a', 'ἀ' => 'a', 'ἁ' => 'a', 'ἂ' => 'a',
            'ἃ' => 'a', 'ἄ' => 'a', 'ἅ' => 'a', 'ἆ' => 'a', 'ἇ' => 'a', 'ᾀ' => 'a',
            'ᾁ' => 'a', 'ᾂ' => 'a', 'ᾃ' => 'a', 'ᾄ' => 'a', 'ᾅ' => 'a', 'ᾆ' => 'a',
            'ᾇ' => 'a', 'ὰ' => 'a', 'ᾰ' => 'a', 'ᾱ' => 'a', 'ᾲ' => 'a', 'ᾳ' => 'a',
            'ᾴ' => 'a', 'ᾶ' => 'a', 'ᾷ' => 'a', 'β' => 'b', 'γ' => 'g', 'δ' => 'd',
            'ε' => 'e', 'έ' => 'e', 'ἐ' => 'e', 'ἑ' => 'e', 'ἒ' => 'e', 'ἓ' => 'e',
            'ἔ' => 'e', 'ἕ' => 'e', 'ὲ' => 'e', 'ζ' => 'z', 'η' => 'i', 'ή' => 'i',
            'ἠ' => 'i', 'ἡ' => 'i', 'ἢ' => 'i', 'ἣ' => 'i', 'ἤ' => 'i', 'ἥ' => 'i',
            'ἦ' => 'i', 'ἧ' => 'i', 'ᾐ' => 'i', 'ᾑ' => 'i', 'ᾒ' => 'i', 'ᾓ' => 'i',
            'ᾔ' => 'i', 'ᾕ' => 'i', 'ᾖ' => 'i', 'ᾗ' => 'i', 'ὴ' => 'i', 'ῂ' => 'i',
            'ῃ' => 'i', 'ῄ' => 'i', 'ῆ' => 'i', 'ῇ' => 'i', 'θ' => 't', 'ι' => 'i',
            'ί' => 'i', 'ϊ' => 'i', 'ΐ' => 'i', 'ἰ' => 'i', 'ἱ' => 'i', 'ἲ' => 'i',
            'ἳ' => 'i', 'ἴ' => 'i', 'ἵ' => 'i', 'ἶ' => 'i', 'ἷ' => 'i', 'ὶ' => 'i',
            'ῐ' => 'i', 'ῑ' => 'i', 'ῒ' => 'i', 'ῖ' => 'i', 'ῗ' => 'i', 'κ' => 'k',
            'λ' => 'l', 'μ' => 'm', 'ν' => 'n', 'ξ' => 'k', 'ο' => 'o', 'ό' => 'o',
            'ὀ' => 'o', 'ὁ' => 'o', 'ὂ' => 'o', 'ὃ' => 'o', 'ὄ' => 'o', 'ὅ' => 'o',
            'ὸ' => 'o', 'π' => 'p', 'ρ' => 'r', 'ῤ' => 'r', 'ῥ' => 'r', 'σ' => 's',
            'ς' => 's', 'τ' => 't', 'υ' => 'y', 'ύ' => 'y', 'ϋ' => 'y', 'ΰ' => 'y',
            'ὐ' => 'y', 'ὑ' => 'y', 'ὒ' => 'y', 'ὓ' => 'y', 'ὔ' => 'y', 'ὕ' => 'y',
            'ὖ' => 'y', 'ὗ' => 'y', 'ὺ' => 'y', 'ῠ' => 'y', 'ῡ' => 'y', 'ῢ' => 'y',
            'ῦ' => 'y', 'ῧ' => 'y', 'φ' => 'f', 'χ' => 'x', 'ψ' => 'p', 'ω' => 'o',
            'ώ' => 'o', 'ὠ' => 'o', 'ὡ' => 'o', 'ὢ' => 'o', 'ὣ' => 'o', 'ὤ' => 'o',
            'ὥ' => 'o', 'ὦ' => 'o', 'ὧ' => 'o', 'ᾠ' => 'o', 'ᾡ' => 'o', 'ᾢ' => 'o',
            'ᾣ' => 'o', 'ᾤ' => 'o', 'ᾥ' => 'o', 'ᾦ' => 'o', 'ᾧ' => 'o', 'ὼ' => 'o',
            'ῲ' => 'o', 'ῳ' => 'o', 'ῴ' => 'o', 'ῶ' => 'o', 'ῷ' => 'o', 'А' => 'A',
            'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'E',
            'Ж' => 'Z', 'З' => 'Z', 'И' => 'I', 'Й' => 'I', 'К' => 'K', 'Л' => 'L',
            'М' => 'M', 'Н' => 'N', 'О' => 'O', 'П' => 'P', 'Р' => 'R', 'С' => 'S',
            'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'K', 'Ц' => 'T', 'Ч' => 'C',
            'Ш' => 'S', 'Щ' => 'S', 'Ы' => 'Y', 'Э' => 'E', 'Ю' => 'Y', 'Я' => 'Y',
            'а' => 'A', 'б' => 'B', 'в' => 'V', 'г' => 'G', 'д' => 'D', 'е' => 'E',
            'ё' => 'E', 'ж' => 'Z', 'з' => 'Z', 'и' => 'I', 'й' => 'I', 'к' => 'K',
            'л' => 'L', 'м' => 'M', 'н' => 'N', 'о' => 'O', 'п' => 'P', 'р' => 'R',
            'с' => 'S', 'т' => 'T', 'у' => 'U', 'ф' => 'F', 'х' => 'K', 'ц' => 'T',
            'ч' => 'C', 'ш' => 'S', 'щ' => 'S', 'ы' => 'Y', 'э' => 'E', 'ю' => 'Y',
            'я' => 'Y', 'ð' => 'd', 'Ð' => 'D', 'þ' => 't', 'Þ' => 'T', 'ა' => 'a',
            'ბ' => 'b', 'გ' => 'g', 'დ' => 'd', 'ე' => 'e', 'ვ' => 'v', 'ზ' => 'z',
            'თ' => 't', 'ი' => 'i', 'კ' => 'k', 'ლ' => 'l', 'მ' => 'm', 'ნ' => 'n',
            'ო' => 'o', 'პ' => 'p', 'ჟ' => 'z', 'რ' => 'r', 'ს' => 's', 'ტ' => 't',
            'უ' => 'u', 'ფ' => 'p', 'ქ' => 'k', 'ღ' => 'g', 'ყ' => 'q', 'შ' => 's',
            'ჩ' => 'c', 'ც' => 't', 'ძ' => 'd', 'წ' => 't', 'ჭ' => 'c', 'ხ' => 'k',
            'ჯ' => 'j', 'ჰ' => 'h', // Decompositions for Latin-1 Supplement
            chr(194) . chr(170) => 'a', chr(194) . chr(186) => 'o',
            chr(195) . chr(128) => 'A', chr(195) . chr(129) => 'A',
            chr(195) . chr(130) => 'A', chr(195) . chr(131) => 'A',
            chr(195) . chr(132) => 'A', chr(195) . chr(133) => 'A',
            chr(195) . chr(134) => 'AE', chr(195) . chr(135) => 'C',
            chr(195) . chr(136) => 'E', chr(195) . chr(137) => 'E',
            chr(195) . chr(138) => 'E', chr(195) . chr(139) => 'E',
            chr(195) . chr(140) => 'I', chr(195) . chr(141) => 'I',
            chr(195) . chr(142) => 'I', chr(195) . chr(143) => 'I',
            chr(195) . chr(144) => 'D', chr(195) . chr(145) => 'N',
            chr(195) . chr(146) => 'O', chr(195) . chr(147) => 'O',
            chr(195) . chr(148) => 'O', chr(195) . chr(149) => 'O',
            chr(195) . chr(150) => 'O', chr(195) . chr(153) => 'U',
            chr(195) . chr(154) => 'U', chr(195) . chr(155) => 'U',
            chr(195) . chr(156) => 'U', chr(195) . chr(157) => 'Y',
            chr(195) . chr(158) => 'TH', chr(195) . chr(159) => 's',
            chr(195) . chr(160) => 'a', chr(195) . chr(161) => 'a',
            chr(195) . chr(162) => 'a', chr(195) . chr(163) => 'a',
            chr(195) . chr(164) => 'a', chr(195) . chr(165) => 'a',
            chr(195) . chr(166) => 'ae', chr(195) . chr(167) => 'c',
            chr(195) . chr(168) => 'e', chr(195) . chr(169) => 'e',
            chr(195) . chr(170) => 'e', chr(195) . chr(171) => 'e',
            chr(195) . chr(172) => 'i', chr(195) . chr(173) => 'i',
            chr(195) . chr(174) => 'i', chr(195) . chr(175) => 'i',
            chr(195) . chr(176) => 'd', chr(195) . chr(177) => 'n',
            chr(195) . chr(178) => 'o', chr(195) . chr(179) => 'o',
            chr(195) . chr(180) => 'o', chr(195) . chr(181) => 'o',
            chr(195) . chr(182) => 'o', chr(195) . chr(184) => 'o',
            chr(195) . chr(185) => 'u', chr(195) . chr(186) => 'u',
            chr(195) . chr(187) => 'u', chr(195) . chr(188) => 'u',
            chr(195) . chr(189) => 'y', chr(195) . chr(190) => 'th',
            chr(195) . chr(191) => 'y', chr(195) . chr(152) => 'O',
            // Decompositions for Latin Extended-A
            chr(196) . chr(128) => 'A', chr(196) . chr(129) => 'a',
            chr(196) . chr(130) => 'A', chr(196) . chr(131) => 'a',
            chr(196) . chr(132) => 'A', chr(196) . chr(133) => 'a',
            chr(196) . chr(134) => 'C', chr(196) . chr(135) => 'c',
            chr(196) . chr(136) => 'C', chr(196) . chr(137) => 'c',
            chr(196) . chr(138) => 'C', chr(196) . chr(139) => 'c',
            chr(196) . chr(140) => 'C', chr(196) . chr(141) => 'c',
            chr(196) . chr(142) => 'D', chr(196) . chr(143) => 'd',
            chr(196) . chr(144) => 'D', chr(196) . chr(145) => 'd',
            chr(196) . chr(146) => 'E', chr(196) . chr(147) => 'e',
            chr(196) . chr(148) => 'E', chr(196) . chr(149) => 'e',
            chr(196) . chr(150) => 'E', chr(196) . chr(151) => 'e',
            chr(196) . chr(152) => 'E', chr(196) . chr(153) => 'e',
            chr(196) . chr(154) => 'E', chr(196) . chr(155) => 'e',
            chr(196) . chr(156) => 'G', chr(196) . chr(157) => 'g',
            chr(196) . chr(158) => 'G', chr(196) . chr(159) => 'g',
            chr(196) . chr(160) => 'G', chr(196) . chr(161) => 'g',
            chr(196) . chr(162) => 'G', chr(196) . chr(163) => 'g',
            chr(196) . chr(164) => 'H', chr(196) . chr(165) => 'h',
            chr(196) . chr(166) => 'H', chr(196) . chr(167) => 'h',
            chr(196) . chr(168) => 'I', chr(196) . chr(169) => 'i',
            chr(196) . chr(170) => 'I', chr(196) . chr(171) => 'i',
            chr(196) . chr(172) => 'I', chr(196) . chr(173) => 'i',
            chr(196) . chr(174) => 'I', chr(196) . chr(175) => 'i',
            chr(196) . chr(176) => 'I', chr(196) . chr(177) => 'i',
            chr(196) . chr(178) => 'IJ', chr(196) . chr(179) => 'ij',
            chr(196) . chr(180) => 'J', chr(196) . chr(181) => 'j',
            chr(196) . chr(182) => 'K', chr(196) . chr(183) => 'k',
            chr(196) . chr(184) => 'k', chr(196) . chr(185) => 'L',
            chr(196) . chr(186) => 'l', chr(196) . chr(187) => 'L',
            chr(196) . chr(188) => 'l', chr(196) . chr(189) => 'L',
            chr(196) . chr(190) => 'l', chr(196) . chr(191) => 'L',
            chr(197) . chr(128) => 'l', chr(197) . chr(129) => 'L',
            chr(197) . chr(130) => 'l', chr(197) . chr(131) => 'N',
            chr(197) . chr(132) => 'n', chr(197) . chr(133) => 'N',
            chr(197) . chr(134) => 'n', chr(197) . chr(135) => 'N',
            chr(197) . chr(136) => 'n', chr(197) . chr(137) => 'N',
            chr(197) . chr(138) => 'n', chr(197) . chr(139) => 'N',
            chr(197) . chr(140) => 'O', chr(197) . chr(141) => 'o',
            chr(197) . chr(142) => 'O', chr(197) . chr(143) => 'o',
            chr(197) . chr(144) => 'O', chr(197) . chr(145) => 'o',
            chr(197) . chr(146) => 'OE', chr(197) . chr(147) => 'oe',
            chr(197) . chr(148) => 'R', chr(197) . chr(149) => 'r',
            chr(197) . chr(150) => 'R', chr(197) . chr(151) => 'r',
            chr(197) . chr(152) => 'R', chr(197) . chr(153) => 'r',
            chr(197) . chr(154) => 'S', chr(197) . chr(155) => 's',
            chr(197) . chr(156) => 'S', chr(197) . chr(157) => 's',
            chr(197) . chr(158) => 'S', chr(197) . chr(159) => 's',
            chr(197) . chr(160) => 'S', chr(197) . chr(161) => 's',
            chr(197) . chr(162) => 'T', chr(197) . chr(163) => 't',
            chr(197) . chr(164) => 'T', chr(197) . chr(165) => 't',
            chr(197) . chr(166) => 'T', chr(197) . chr(167) => 't',
            chr(197) . chr(168) => 'U', chr(197) . chr(169) => 'u',
            chr(197) . chr(170) => 'U', chr(197) . chr(171) => 'u',
            chr(197) . chr(172) => 'U', chr(197) . chr(173) => 'u',
            chr(197) . chr(174) => 'U', chr(197) . chr(175) => 'u',
            chr(197) . chr(176) => 'U', chr(197) . chr(177) => 'u',
            chr(197) . chr(178) => 'U', chr(197) . chr(179) => 'u',
            chr(197) . chr(180) => 'W', chr(197) . chr(181) => 'w',
            chr(197) . chr(182) => 'Y', chr(197) . chr(183) => 'y',
            chr(197) . chr(184) => 'Y', chr(197) . chr(185) => 'Z',
            chr(197) . chr(186) => 'z', chr(197) . chr(187) => 'Z',
            chr(197) . chr(188) => 'z', chr(197) . chr(189) => 'Z',
            chr(197) . chr(190) => 'z', chr(197) . chr(191) => 's',
            // Decompositions for Latin Extended-B
            chr(200) . chr(152) => 'S', chr(200) . chr(153) => 's',
            chr(200) . chr(154) => 'T', chr(200) . chr(155) => 't',
            // Euro Sign
            chr(226) . chr(130) . chr(172) => 'E',
            // GBP (Pound) Sign
            chr(194) . chr(163) => '',
            // Vowels with diacritic (Vietnamese)
            // unmarked
            chr(198) . chr(160) => 'O', chr(198) . chr(161) => 'o',
            chr(198) . chr(175) => 'U', chr(198) . chr(176) => 'u',
            // grave accent
            chr(225) . chr(186) . chr(166) => 'A', chr(225) . chr(186) . chr(167) => 'a',
            chr(225) . chr(186) . chr(176) => 'A', chr(225) . chr(186) . chr(177) => 'a',
            chr(225) . chr(187) . chr(128) => 'E', chr(225) . chr(187) . chr(129) => 'e',
            chr(225) . chr(187) . chr(146) => 'O', chr(225) . chr(187) . chr(147) => 'o',
            chr(225) . chr(187) . chr(156) => 'O', chr(225) . chr(187) . chr(157) => 'o',
            chr(225) . chr(187) . chr(170) => 'U', chr(225) . chr(187) . chr(171) => 'u',
            chr(225) . chr(187) . chr(178) => 'Y', chr(225) . chr(187) . chr(179) => 'y',
            // hook
            chr(225) . chr(186) . chr(162) => 'A', chr(225) . chr(186) . chr(163) => 'a',
            chr(225) . chr(186) . chr(168) => 'A', chr(225) . chr(186) . chr(169) => 'a',
            chr(225) . chr(186) . chr(178) => 'A', chr(225) . chr(186) . chr(179) => 'a',
            chr(225) . chr(186) . chr(186) => 'E', chr(225) . chr(186) . chr(187) => 'e',
            chr(225) . chr(187) . chr(130) => 'E', chr(225) . chr(187) . chr(131) => 'e',
            chr(225) . chr(187) . chr(136) => 'I', chr(225) . chr(187) . chr(137) => 'i',
            chr(225) . chr(187) . chr(142) => 'O', chr(225) . chr(187) . chr(143) => 'o',
            chr(225) . chr(187) . chr(148) => 'O', chr(225) . chr(187) . chr(149) => 'o',
            chr(225) . chr(187) . chr(158) => 'O', chr(225) . chr(187) . chr(159) => 'o',
            chr(225) . chr(187) . chr(166) => 'U', chr(225) . chr(187) . chr(167) => 'u',
            chr(225) . chr(187) . chr(172) => 'U', chr(225) . chr(187) . chr(173) => 'u',
            chr(225) . chr(187) . chr(182) => 'Y', chr(225) . chr(187) . chr(183) => 'y',
            // tilde
            chr(225) . chr(186) . chr(170) => 'A', chr(225) . chr(186) . chr(171) => 'a',
            chr(225) . chr(186) . chr(180) => 'A', chr(225) . chr(186) . chr(181) => 'a',
            chr(225) . chr(186) . chr(188) => 'E', chr(225) . chr(186) . chr(189) => 'e',
            chr(225) . chr(187) . chr(132) => 'E', chr(225) . chr(187) . chr(133) => 'e',
            chr(225) . chr(187) . chr(150) => 'O', chr(225) . chr(187) . chr(151) => 'o',
            chr(225) . chr(187) . chr(160) => 'O', chr(225) . chr(187) . chr(161) => 'o',
            chr(225) . chr(187) . chr(174) => 'U', chr(225) . chr(187) . chr(175) => 'u',
            chr(225) . chr(187) . chr(184) => 'Y', chr(225) . chr(187) . chr(185) => 'y',
            // acute accent
            chr(225) . chr(186) . chr(164) => 'A', chr(225) . chr(186) . chr(165) => 'a',
            chr(225) . chr(186) . chr(174) => 'A', chr(225) . chr(186) . chr(175) => 'a',
            chr(225) . chr(186) . chr(190) => 'E', chr(225) . chr(186) . chr(191) => 'e',
            chr(225) . chr(187) . chr(144) => 'O', chr(225) . chr(187) . chr(145) => 'o',
            chr(225) . chr(187) . chr(154) => 'O', chr(225) . chr(187) . chr(155) => 'o',
            chr(225) . chr(187) . chr(168) => 'U', chr(225) . chr(187) . chr(169) => 'u',
            // dot below
            chr(225) . chr(186) . chr(160) => 'A', chr(225) . chr(186) . chr(161) => 'a',
            chr(225) . chr(186) . chr(172) => 'A', chr(225) . chr(186) . chr(173) => 'a',
            chr(225) . chr(186) . chr(182) => 'A', chr(225) . chr(186) . chr(183) => 'a',
            chr(225) . chr(186) . chr(184) => 'E', chr(225) . chr(186) . chr(185) => 'e',
            chr(225) . chr(187) . chr(134) => 'E', chr(225) . chr(187) . chr(135) => 'e',
            chr(225) . chr(187) . chr(138) => 'I', chr(225) . chr(187) . chr(139) => 'i',
            chr(225) . chr(187) . chr(140) => 'O', chr(225) . chr(187) . chr(141) => 'o',
            chr(225) . chr(187) . chr(152) => 'O', chr(225) . chr(187) . chr(153) => 'o',
            chr(225) . chr(187) . chr(162) => 'O', chr(225) . chr(187) . chr(163) => 'o',
            chr(225) . chr(187) . chr(164) => 'U', chr(225) . chr(187) . chr(165) => 'u',
            chr(225) . chr(187) . chr(176) => 'U', chr(225) . chr(187) . chr(177) => 'u',
            chr(225) . chr(187) . chr(180) => 'Y', chr(225) . chr(187) . chr(181) => 'y',
            // Vowels with diacritic (Chinese, Hanyu Pinyin)
            chr(201) . chr(145) => 'a',
            // macron
            chr(199) . chr(149) => 'U', chr(199) . chr(150) => 'u',
            // acute accent
            chr(199) . chr(151) => 'U', chr(199) . chr(152) => 'u',
            // caron
            chr(199) . chr(141) => 'A', chr(199) . chr(142) => 'a',
            chr(199) . chr(143) => 'I', chr(199) . chr(144) => 'i',
            chr(199) . chr(145) => 'O', chr(199) . chr(146) => 'o',
            chr(199) . chr(147) => 'U', chr(199) . chr(148) => 'u',
            chr(199) . chr(153) => 'U', chr(199) . chr(154) => 'u',
            // grave accent
            chr(199) . chr(155) => 'U', chr(199) . chr(156) => 'u',

        );
        $str = strtr($str, $unwanted_array);
        $str = str_replace(" ", "-", $str);
        $str = utf8_encode($str);
        return $str;


    }

    public function QuitarBarrasUrl($url)
    {
        $htt = 'http://';
        $url = str_replace($htt, '', $url);
        $url = str_replace("//", '/', $url);
        return $htt . $url;

    }

    public function GetInternacionalizacion(?\Illuminate\Routing\Route $ruta = null, $base = 'rutas_publicas.')
    {
        if (empty($ruta)) {
            return [];
        }


        //$host = $_SERVER
        //rutas_cliente
        $dom = isset($_SERVER['HTTP_HOST']) ? strtolower($_SERVER['HTTP_HOST']) : 'localhost';
        $st = User::where(['domain' => $dom])->first();
        if (!empty($st)) {
            $base = 'rutas_cliente.';
        }
        $obj = [];
        $lngalterno = '';
        $lsd = '';
        $i = 0;


        $lngo = App::getLocale();
        $lng = [
            0 => 'es',
            1 => 'en',
            2 => 'de',
            3 => 'fr',
            4 => 'it',
            5 => 'nl',
            6 => 'pt',
        ];
        $parametros = $ruta->parameters();
        $actions = $ruta->getAction();
        //dd($actions);

        $nombre = $ruta->getName();
        $thato = trans($base . $nombre);

        $uri = $ruta->uri();
        $ln = \Config::get('lenguaje');
        $b = LaravelLocalization::createUrlFromUri($ruta->uri());
        $para = [];
        foreach ($parametros as $k => $v) {
            $para['{' . $k . '}'] = $v;
        }
        /*
        if (is_array($para)) {
            $pere = array_flip($para);
        }
        */
        $og = route($nombre, $parametros);
        $bas = route($nombre, $parametros, false);

        $o = trans($base . $nombre);
//dd($parametros);
        $ga = [];
        for ($i = 0; $i < count($lng); $i++) {
            $l = $lng[$i];
            App::setLocale($l);

            LaravelLocalization::setLocale($l);
            $c = trans($base . $nombre);

            $ge[1] = $thato;
            $ge[2] = $o;
            $ge[3] = $b;
            $d = $b;
//http://horsesworldsale.com/es/yeguadajuanvazquez/Trabajo
            /*
             *
                        $d = str_replace($o, $c, $b);
                        $ge[4] = $d;
                        $d = str_replace($thato, $c, $b);
                        $ge[5] = $d;
                        */
            $u = $d;


            foreach ($parametros as $k => $v) {
                if ($nombre == 'MyHorseDetailed' or $nombre == 'MyHorseDetailedBase') {


                } elseif ($nombre == 'MyHorsesV1') {
                    $txt = 'Paarden';
                    $txt_ = 'Paard';
                    $u = str_replace($txt, $txt_, $u);


                    $u = str_replace("{" . $k . "}", $v, $u);

                    /*    LaravelLocalization::setLocale($l);
                        App::setLocale($l);
                        //trans()

                        $bes = Route(LaravelLocalization::transRoute('rutas_publicas.listaportal')
                        //$bas = route('MyHorsesV1',$parametros);


                        //$bes = str_replace($para,$pere,$uri);
                        $ge[4] = $bes." **";
                        $ge[10] = [$para,$pere];
                        $las = trans("rutas_publicas.$nombre", $parametros,null , $l);
                        $ge[8] = $las." las";
                        $url = str_replace($thato,$las,$og);
                        $ge[9] = $url." url";
                        $ge[7] = $thato." tatho";
                        $ge[6] = $l." l";
                    */

                } elseif ($nombre == 'TrabajoIndex') {
                    if ($k == "slug") {
                        //{stud?}
                        $k = '{slug}';
                        $v = $v->slug;
                        $u = str_replace($k, $v, $u);
                    }
                } else {
                    $u = str_replace("{" . $k . "}", $v, $u);
                }
            }


            $u = str_replace("/$lngo/", "/$l/", $u);
            $ge[6] = $u;

            array_push($ga, $ge);
            $ts = [];
            $lngalterno .= "<link rel=\"alternate\" hreflang=\"$l\" href=\"$u\" />";
            $lsd .= "$l,";
            $ts['cod'] = $l;
            $ts['link'] = $u;

            $ts['name'] = $ln[$l];
            $obj[$i] = $ts;
        }

        App::setLocale($lngo);
        LaravelLocalization::setLocale($lngo);
        //dd($ga);
        $sal['lngalterno'] = $lngalterno;
        $sal['lsd'] = $lsd;
        $sal['menu'] = $obj;
        //dd($ga);
        return $sal;
    }

    public function BuscarCaballoSlug($slug)
    {
        /*Por slug*/
        $f = Horse::where('slug', $slug)->first();
        if (!empty($f)) {
            return $f;
        }
        /*por nuevo slug*/
        //$std = Stud::search($texto)->get()->pluck('id');
        $lng = [
            0 => 'es',
            1 => 'en',
            2 => 'de',
            3 => 'fr',
            4 => 'it',
            5 => 'nl',
            6 => 'pt',
        ];
        //$fa = BuscarCaballo::search($slug)->first();
        $fa = null;
        for ($i = 0; $i < count($lng); $i++) {
            $ido = $lng[$i];
            if (empty($fa)) {
                $fa = SlugCaballo::where($ido, "like", $slug)->first();
            }
            if (!empty($fa)) {

                App::setLocale($ido);
                \Session::put('lang', $ido);
                \Session::put('applocale', $ido);
                \Session::put('lang', $ido);
                \Session::put('applocale', $ido);
                return $fa->horse()->first();
                break;
            }
        }
        return null;

    }

    function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function setCookies()
    {
        $f = \Session::all();

        return self::arrayCook($f);

    }

    public function arrayCook($d = [])
    {
        foreacH ($d as $k => $v) {
            if (is_array($v)) {
                self::arrayCook($v);
            } else {
                if(!empty($k) and !empty($v)){
                    cookie()->forever($k, $v);
                }
            }

        }
        return null;
    }

    public function setCookieRequest(\Illuminate\Http\Request $request, $op = [])
    {
        //Closure $next
        /*
        foreach($op as $k=>$v){
            $response->withCookie($k, \Session::get($k));
        }*/
        return $request;

    }
}


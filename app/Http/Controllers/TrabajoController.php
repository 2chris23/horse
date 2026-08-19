<?php

namespace App\Http\Controllers;

use App\Models\Aplicante;
use App\Models\Stud;
use Illuminate\Http\Request;
use function compact;
use function flash;
use function is_file;
use function redirect;

class TrabajoController extends Controller
{
    //
    public function index(Stud $slug = null)
    {

        if (empty($slug)) return redirect('/');
        $stud = $slug;
        $user = $stud->getUserModel();
        $f = new StudController();
        $data = $f::getDataStud($stud);
        $user = $data['user'];
        $stud = $data['stud'];
        $studphoto = $data['studphoto'];
        $galeria = $data['studphoto'];
        $horses = $data['horses'];
        $horsesfav = $data['horsesfav'];


        $studphotoinstalations = $data['studphotoinstalations'];
        $persona = $data['persona'];
        $error = $data['error'];

        if (empty($data)) {
            $sms = trans('error.NoFoundEle');
            \Session::flash('error', $sms);
            flash($sms)->error();
            return response()->redirectTo(route('portal'), 301);
            return redirect()->back();
        }


        /*
        $user = User::find(1);
        $user = (!empty($id)) ? User::find($id) : new User();
        $user = (!empty($user)) ? $user : new User();
        */
        /*desing*/
        $desing = $data['desing'];


        //return view('frontend.landing.v1.inicio', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav'));
        if ($desing != 0) {
            if ($desing == 1) {
                return view('frontend.landing.v1.work', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'data'));
            } elseif ($desing == 2) {
                return view('frontend.landing.v2.work', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'data'));
            } elseif ($desing == 3) {
                return view('frontend.landing.v3.work', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'data'));
            } elseif ($desing == 4) {
                return view('frontend.landing.v4.work', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'data'));
            } elseif ($desing == 5) {
                return view('frontend.landing.v5.work', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'data'));
            } elseif ($desing == 6) {
                return view('frontend.landing.v6.work', compact('user', 'error', 'stud', 'persona', 'galeria', 'horses', 'horsesfav', 'data'));
            }
        }

        return view('frontend.trabajos.index', compact('stud'))->with(['stud' => $stud, 'user' => $user]);
    }

    public function indexpost(Request $r)
    {
        $email = $r->email;
        if (!empty($email)) {
            $z = new FileController();
            $studid = $r->studid;

            $apli = Aplicante::where(['email' => $email, 'stud_id' => $studid])->first();
            if (empty($apli)) {
                $apli = new Aplicante();
            }
            /*Files*/

            $foto = $r->foto;
            $docs = $r->docs;
            /*Vars*/
            $name = $r->name;
            $date = $r->date;
            $country = $r->country;
            $state = $r->state;
            $city = $r->city;
            $address = $r->address;
            $phone = $r->phone;
            /*
              "phone" => "4166752455"
              "id_phone" => ""
              "ext_phone" => ""
              "extc_phone" => ""
             */
            $email = $r->email;
            $skills = $r->skillss;/*Habilidades*/
            $skillsw = $r->skillsw;/*Aplica*/
            $present = $r->present;
            $sms = $r->sms;
            $studid = $r->studid;


            $apli->setEmail($email)->setCountryId($country)->setStateId($state)->setCity($city)->setSkills($skills)->setSkillapply($skillsw)
                ->setPresent($present)->setSms($sms)->setStudId($studid)->setPhone($phone)->setAddress($address)->setBday($date)->setName($name);
            /*Faltan archivos*/
            $apli->push();

            if (is_file($docs)) {
                $z->GuardarTrabajoDoc($docs, $apli);
            }
            if (is_file($foto)) {
                $z->GuardarTrabajoFoto($foto, $apli);
            }

            $st = Stud::find($studid);
            flash(trans('users.appok'))->success();

            return redirect()->route('MyContact', ['slug' => $st->slug]);

        } else {
            flash(trans('users.emailinvalid'))->error();
            return redirect()->back()->withInput();
        }
        return redirect()->back();
    }

    public function GetAplicaStud()
    {
        $columns = [
            //"id" => '#',
            "img" => trans('trabajo.img'),
            "name" => trans('trabajo.name'),
            "skills" => trans('trabajo.skillc'),
            "age" => trans('trabajo.age'),

            // "created_at" => "Creacion",
            //"updated_at" => "Actualizacion",
            "phone" => trans('trabajo.phone'),
            "email" => trans('trabajo.email'),
            "country_id" => trans('trabajo.country'),
            "state_id" => trans('trabajo.state'),
            "city" => trans('trabajo.city'),
            "created_at" => trans('trabajo.created_at'),
            //"bday" => "Cumple",

            //"address" => "Address",


            //"skillapply" => 'Aplica',
            //"present" => "Presenacion",
            //"sms" => "Sms",
            //"note" => 'Nota',
            /*
        "foto" => null,
        "foto_name" => null,
        "docs" => null,
        "docs_name" => null,
        "stud_id" => 3
        */
        ];
        $applications = \Auth::user()->Yeguada()->Applications()->get();
        return view('backend.content.works.index', compact('applications', 'columns'));

    }

    public function Show(Aplicante $id)
    {
        if (empty($id)) {
            flash('No se encontro el elemento')->error();
            return redirect('/');
        }
        $user = \Auth::user();
        $stud = $user->Yeguada();
        if ($stud->id != $id->stud_id) {
            flash('No puedes ver el elemento')->error();
            return redirect('/');
        }
        $aplications = $id;
        $editado = 1;


//return view('frontend.trabajos.index',compact('aplications','editado'));
        return view('backend.content.works.show', compact('aplications', 'stud', 'user'));

        dd($id);
    }


    /*
     *
     *
     *  $cliente = [
                            "mime" => $r->getClientMimeType(),
                            "ext" => $r->getClientOriginalExtension(),
                            "name" => $r->getClientOriginalName(),
                        ];

                        $nombre = self::random_str() . "." . $cliente['ext'];
                        $d = $r->storeAs($folder, $nombre, 'local');
     *
     */
}


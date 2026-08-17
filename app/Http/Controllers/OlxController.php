<?php

namespace App\Http\Controllers;

use App\Models\Horse;
use App\Models\Country;
use App\Models\State;
use App\Models\Olx;
use function app_path;
use function base_path;
use DB;
use DOMDocument;
use function file_put_contents;
use Form;
use Illuminate\Http\Request;
use function array_push;
use function compact;
use function count;
use function explode;
use function flash;
use function is_array;
use function public_path;
use function redirect;
use function view;

use \JMS\Serializer\SerializerBuilder as SerializerBuilder;
use \Zephia\OLXFeed\Document as Document;
use \Zephia\OLXFeed\Entity\Ad as Ad;
use \Zephia\OLXFeed\Entity\AdBag as AdBag;
use \Zephia\OLXFeed\Entity\Contact as Contact;
use \Zephia\OLXFeed\Entity\Image as Image;
use \Zephia\OLXFeed\Entity\Location as Location;
use \Zephia\OLXFeed\Entity\Vehicle as Vehicle;

class OlxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function ExportarOlx(Horse $slug)
    {
        $folder = base_path() . DS . 'vendor' . DS . 'zephia' . DS . 'olx' . DS . 'resources' . DS . 'config' . DS . 'serializer';
        if (empty($slug->id)) {
            return null;
        }
        $yeguada = $slug->getYeguada();
        $cd = 0;
        $tel = '';
        $pas = $yeguada->getCountryModelName();
        $stat = $yeguada->getStateModel();
        $pa = $pas->name;
        $sa = $stat->name;

        $olxloc = Olx::where('country_id', $pas->id)->first();
        if (empty($olxloc)) {
            $olxloc = Olx::where('country', $pas->name)->first();
            if (!empty($olxloc)) {
                if (empty($olxloc->country_id)) {
                    $olxloc->setCountryId($pas->id)->push();
                }
            }
        }
        $olxloc1 = Olx::where(['country_id' => $pas->id, 'state_id' => $stat->id])->first();
        if (empty($olxloc1)) {
            $olxloc1 = Olx::where(['country' => $pa, 'state' => $sa])->first();
            if (!empty($olxloc1)) {
                if (empty($olxloc1->state_id)) {
                    $olxloc1->setStateId($stat->id)->push();
                }
            }
        }

        if (!empty($olxloc)) {
            $pais = $olxloc->getIdCountryOlx();
        } else {
            $pais = 'www.olx.com.ve';
        }
        if (!empty($olxloc1)) {
            $estado = $olxloc1->getIdStateOlx();
        } else {
            $estado = 'tachira.olx.com.ve';
        }
        $city = 'libertador-tachira.olx.com.ve';
        $address =
            $yeguada->getAddress() . ', ' . $yeguada->getCity() . ', ' . $yeguada->getStateModel()->name . ', ' . $yeguada->getCountryModel()->name;
        foreach ($yeguada->getPhoneModel() as $k => $v) {
            if ($v->isNull() !== true) {
                if ($cd == 0) {
                    $tel = $v->getFormatNumberOnly();
                    $cd = 1;
                }
            }
        }
        $categoria = 813; //otros anmales
        $imagenes = $slug->getPhotoModel();
        $contact =
            (new Contact)
                ->setEmail($yeguada->getEmail())
                ->setName($yeguada->getName())
                ->setPhone($tel);
        /*Seccion olx de ciudades*/
        $location = (new Location)
            ->setCountry($pais)
            ->setState($estado)
            ->setCity($city)/*
        ->setNeighborhood(51892)
        ->setLatitude(-34.77812)
        ->setLongitude(-45.23890)
        */
        ;

        $f = new Ad();
        /*
         * $tsa = [];
        $['tittle'] = $slug->getName();
        $['price'] = $slug->price;
*/
        $f->setTitle($slug->getName())
            ->setPrice($slug->price)
            ->setDescription($slug->getDescripcion())
            ->setContact($contact)
            ->setLocation($location)
            ->setCategory($categoria);

        foreach ($imagenes as $k => $v) {
            $f->addImage((new Image)
                ->setUrl($v->getUrl()));
        }
        $ds = rand(1, 9999);
        $f->setPrice(99)->setPriceCurrency(236);
        $f->setId($ds);
        $ad = new AdBag();
        $ad->addAd($f);
        /*
        $ts = serialize($ad);
        $ts = unserialize($ts);
        $ts = var_export($ts);
*/
        //$adBag = new \Zephia\OLXFeed\Entity\AdBag();
        $ds = app('olx')->generate($ad);
        $xml = new DOMDocument();
        $xml->formatOutput = true;
        $xml->preserveWhiteSpace = false;
        $xml->loadXML($ds)->save(public_public_path() . DS . $slug->name . ".xml");


        $serializer = SerializerBuilder::create()
            ->addMetadataDir($folder)
            ->build();

        // Generate document feed
        $document = new Document($serializer);

        // Generate Ad list
        $document->generate($ad);
        dd($document);

        $document->generate($ad);
        $xml_string_for_comparision = $this->getXml($slug->name . '.xml');
        dd($xml_string_for_comparision);
        /*$this->assertEquals($xml_string, $xml_string_for_comparision);*/
        dd($ad);

    }

    private function getXml($file_name)
    {
        //dd(public_path() .DS.$file_name);
        return file_get_contents(public_path() . DS . $file_name);
    }

    public function Llenar()
    {
        /*
        $table->string('country')->nullable()->comment('Nombre de pais para Olx');
        $table->string('id_country_olx')->nullable()->comment('Url de pais para Olx ');
        $table->string('state')->nullable()->comment('Estado o provincia para Olx');
        $table->string('id_state_olx')->nullable()->comment('Url de estado o provincia para Olx ');
        $table->string('city')->nullable()->comment('ciudad para Olx');
        $table->string('id_city_olx')->nullable()->comment('Url de ciudad para Olx ');
        $table->string('neighborhood')->nullable()->comment('vecino para Olx');
        $table->string('id_neighborhood_olx')->nullable()->comment('Url de vecino para Olx ');
        $table->integer('country_id')->default(0)->comment('Id de pais para HWS');
        $table->integer('state_id')->default(0)->comment('Id de estado para HWS');
        $table->string('city_hws')->default(0)->comment('Texto de ciudad para hws');
*/
        $d = [];

        /*

        */

        $old_c = '';
        $old_c_id = 0;
        for ($i = 1; $i <= count($d); $i++) {
            $olx = Olx::find($i);
            if (empty($olx)) {
                \Log::critical('Procesando ' . $i);
                $f = $d[$i];
                $fs = 0;
                $fsa = 0;
                $old_c = $f['country'];
                if (($old_c !== $f['country'])) {
                    $fs = Country::where('name', $f['country'])->first();
                    $old_c = $f['country'];
                    $old_c_id = $fs->id;
                }

                if (!empty($fs)) {
                    $fs = $old_c_id;
                    $fsa = State::where(['name' => $f['state'], 'country_id' => $old_c_id])->first();
                    if (!empty($fsa->id)) {
                        $fsa = $fsa->id;
                    } else {
                        $fsa = 0;
                    }
                } else {
                    $fs = 0;
                }
                $olx = new Olx();


                $countr = isset($f['country']) ? $f['country'] : '';
                $countr_olx = isset($f['id_country_olx']) ? $f['id_country_olx'] : '';
                $sta = isset($f['state']) ? $f['state'] : '';
                $sta_olx = isset($f['id_state_olx']) ? $f['id_state_olx'] : '';
                $cit = isset($f['city']) ? $f['city'] : '';
                $cit_olx = isset($f['id_city_olx']) ? $f['id_city_olx'] : '';
                $ng = isset($f['neighborhood']) ? $f['neighborhood'] : '';
                $ng_olx = isset($f['id_neighborhood_olx']) ? $f['id_neighborhood_olx'] : '';
                $countr_olx = isset($f['id_country_olx']) ? $f['id_country_olx'] : '';
                $olx->setCountry($countr)
                    ->setIdCityOlx($countr_olx)
                    ->setState($sta)
                    ->setIdStateOlx($sta_olx)
                    ->setCity($cit)
                    ->setIdCityOlx($cit_olx)
                    ->setNeighborhood($ng)
                    ->setIdNeighborhoodOlx($ng_olx)
                    ->setIdCountryOlx($countr_olx)->push()
                    ->setCountryId($old_c_id)->setStateId($fsa)->push();;


            }

        }

    }

    public function ExportarDivendo(Horse $slug)
    {
        $folder = base_path() . DS . 'vendor' . DS . 'zephia' . DS . 'olx' . DS . 'resources' . DS . 'config' . DS . 'serializer';
        if (empty($slug->id)) {
            return null;
        }
        $salida = [];
        $yeguada = $slug->getYeguada();
        $cd = 0;
        $tel = '';
        $pas = $yeguada->getCountryModelName();
        $stat = $yeguada->getStateModel();

        $pais = $pas->name;
        $tel='';
        foreach ($yeguada->getPhoneModel() as $k => $v) {
            if ($v->isNull() !== true) {
                if ($cd == 0) {
                    $tel = $v->getFormatNumberOnly();
                    $cd = 1;
                }
            }
        }


        $price = $slug->getPrice();
        $salida['id'] = $slug->id;
        $salida['country']  = $pais;
        $salida['url']  = '';
        $salida['title']  = $slug->getName();
        $salida['content'] = $slug->getDescripcion();
        $salida['price'] = $slug->getPrice();
        $salida['city'] = $yeguada->getCity();
        $salida['region'] = $stat->name;
        $salida['phone'] = $tel;
        $salida['make'] = trans('horse.raza.'.$slug->raza);
        $salida['model'] = trans('horse.sex.'.$slug->sex);
        $salida['color'] = $slug->getColorString();
        $salida['year'] = $slug->getColorString();//********//
        $salida['email'] = $yeguada->getEmail();//********//
        $salida['company'] = $yeguada->getName();//********//
        $ts = [];
        $imagenes = $slug->getPhotoModel();
        foreach ($imagenes as $k => $v) {
            $ds = [];
            $ds['picture_url'] =$v->getUrl();
            $ds['picture_title'] =$slug->getName()." $k";
            $ts[$k] = $ds;
        }
        $salida['pictures'] = $ts;//********//
        $salida['date'] = Functions::AjustarFechaDmySlash($slug->birthdate);//********//

        $ts = new Functions();
        $xml = $ts->ArrayToXml($salida);
        $ids = $xml->getElementsByTagName('id');

        return $xml;

    }
}


<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use App\Models\Government;
use App\Models\DomainObjectCollection;
use App\Models\DomainCollection;


use DateTime;

class EtalonDatasController extends Controller
{
    /* Auth constructor */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $domainlists = DomainCollection::get();
        $domainobjects = DomainObjectCollection::get();
        
        return View::make('etalondata.index', [
            'domainobjects' => $domainobjects,
            'domainlists' => $domainlists,
        ]);

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Отправляет на согласование весь домен ЦПЦП
        if ( $request->has('send_domain') ) {

            $updateDomain = DomainCollection::find($id);
            $updateDomain->update([
                'send' => 1
            ]);

            $getEtalons = DomainObjectCollection::where('domain_id', $id)->get();
            foreach ($getEtalons as $etalon) {
                $updateEtalon = DomainObjectCollection::find($etalon->id);
                $updateEtalon->update([
                    'send_to_approve' => 1,
                    'date_send' => new DateTime()
                ]);
            }


            return Redirect::to('etalondatas')->with(['successMsg' => 'Весь домен и его эталонные данные успешно отправлены на утверждение']);

        // Одобряет (Согласовывает) ГО
        } elseif ( $request->has('approve_domain_go') ) {


            $Etalons = DomainObjectCollection::
                where('domain_id', $id)->
                where('send_to_approve', '1')->
                where('approved', '0')->
                where('attributes', 'LIKE', '%'.Auth::user()->government->name_ru.'%')->
                get();

            foreach ($Etalons as $etalon) {
                $updateEtalon = DomainObjectCollection::find($etalon->id);
                $updateEtalon->update([
                    'approved' => 1,
                    'date_approve' => new DateTime(),
                    'date_discart' => NULL
                ]);
            }

            return Redirect::to('etalondatas/agreement')->with(['successMsg' => 'Эталонные данные были успешно согласованы']);

        
        
        // Oтклоняет ГО
        } elseif ( $request->has('discart_domain_go') ) {

            $Etalons = DomainObjectCollection::
            where('domain_id', $id)->
            where('send_to_approve', '1')->
            where('approved', '0')->
            where('attributes', 'LIKE', '%'.Auth::user()->government->name_ru.'%')->
            get();

            foreach ($Etalons as $etalon) {
                $updateEtalon = DomainObjectCollection::find($etalon->id);
                $updateEtalon->update([
                    'approved' => 0,
                    'date_approve' => NULL,
                    'date_discart' => new DateTime()
                ]);
            }

            $updateDomain = DomainCollection::find($id);
            $updateDomain->update([
                'send' => 0,
                'approve' => 0
            ]);


            return Redirect::to('etalondatas/agreement')->with(['successMsg' => 'Эталонные данные были успешно отклонены']);





        // Одобряет (Утверждает) МЦРИАП
        } elseif ( $request->has('approve_domain_mcriap') ) {


            $Etalons = DomainObjectCollection::
                where('domain_id', $id)->
                where('send_to_approve', '1')->
                where('approved', '1')->
                get();

            foreach ($Etalons as $etalon) {
                $updateEtalon = DomainObjectCollection::find($etalon->id);
                $updateEtalon->update([
                    'approved' => 1,
                    'date_approve' => new DateTime(),
                    'date_discart' => NULL
                ]);
            }

            $updateDomain = DomainCollection::find($id);
            $updateDomain->update([
                'approve' => 1
            ]);

            return Redirect::to('etalondatas/signing')->with(['successMsg' => 'Эталонные данные были успешно согласованы']);




        
        // Oтклоняет МЦРИАП
        } elseif ( $request->has('discart_domain_mcriap') ) {

            $Etalons = DomainObjectCollection::
            where('domain_id', $id)->
            where('send_to_approve', '1')->
            where('approved', '1')->
            get();

            foreach ($Etalons as $etalon) {
                $updateEtalon = DomainObjectCollection::find($etalon->id);
                $updateEtalon->update([
                    'approved' => 0,
                    'send_to_approve' => 0,
                    'date_approve' => NULL,
                    'date_discart' => new DateTime()
                ]);
            }

            $updateDomain = DomainCollection::find($id);
            $updateDomain->update([
                'send' => 0,
                'approve' => 0
            ]);


            return Redirect::to('etalondatas/signing')->with(['successMsg' => 'Домен с эталонными данными был успешно отклонен']);







            
        } else {

            $updateEtalon = DomainObjectCollection::find($id);
            $updateEtalon->update([
                'send_to_approve' => 1,
                'date_send' => new DateTime()
            ]);

            return Redirect::to('etalondatas')->with(['successMsg' => 'Эталонные данные успешно отправлены на утверждение']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function build()
    {
        $governments = Government::get();
        $domainobjects = DomainObjectCollection::paginate(20);
        $domains = DomainCollection::get();
        return View::make('etalondata.build', [
            'governments' => $governments,
            'domains' => $domains,
            'domainobjects' => $domainobjects
        ]);
    }




    public function signing()
    {
        $domains = DomainCollection::get();
        $domainlists = DomainCollection::where('send', '1')->get();

        $domainobjects = DomainObjectCollection::
            where('send_to_approve', '1')->
            where('approved', '1')->
            get();
       
        return View::make('etalondata.signing', [
            'domains' => $domains,
            'domainlists' => $domainlists,
            'domainobjects' => $domainobjects,
        ]);
    }









    public function agreement()
    {
        $domains = DomainCollection::get();
        $domainlists = DomainCollection::where('send', '1')->get();
        $domainobjects = DomainObjectCollection::
            where('send_to_approve', '1')->
            where('approved', '0')->
            where('attributes', 'LIKE', '%'.Auth::user()->government->name_ru.'%')->
            get();
       
        return View::make('etalondata.agreement', [
            'domains' => $domains,
            'domainlists' => $domainlists,
            'domainobjects' => $domainobjects,
        ]);
    }





    // public function getinfo(Request $request) {

    //     if ($request->ajax()) {

    //         if ($request->_id == "") {
    //             return response()->json(['options'=>'<b>Выберите объект из списка выше</b>']);
    //         } else {

    //             $result_text = '<b>Информация о данных:</b><br><br>';
    //             $data = DomainObjectCollection::where('id', $request->_id)->first();
    //             $name = DomainObjectCollection::where('ecpgo_name', $request->ecpgo_name)->first();

    //             $data_json = json_decode($data['attributes'], true);

    //             if( $data['approved'] == 0 ) {
    //                 $status = 'Статус: <span style="color: #990000">Не утверждено</span>';
    //             } else {
    //                 $status = 'Статус: <span style="color: #0075ff">Согласовал ' . $nameValue . '</span>';
    //             }
            
    //             for ($i = 0; $i < count($data_json); $i++) {
    //                 $result_text .= '<b>Владелец данных</b>: '.$data_json[$i]['Owner'].'<br>';
    //                 $result_text .= '<b>Атрибут</b>: <span style="color: #0075ff">'.$data_json[$i]['Attribute'].'</span><br>';
    //                 $result_text .= '<b>Наименование ИС</b>: '.$data_json[$i]['Original source'].'<br>';
    //                 $result_text .= $status.'<br><br>';
    //             }

                


    //             if( $data['approved'] == 0 ) {

    //                 if ( $data['send_to_approve'] == 0 ) {
    //                     $result_text .= '<form method="POST" action="'. route("etalondatas.update", ["etalondata" => $request->_id]) .'">';
    //                     $result_text .= '<input type="hidden" name="_token" value="'.$request->_token.'" />';
    //                     $result_text .= '<input type="hidden" name="_method" value="PATCH">';
                        
                
    //                     $result_text .= '<button type="submit" class="tabs__button btn" href="#">Отправить на утверждение</button>';
    //                     $result_text .= '</form>';
    //                 }

    //             }

    //             return response()->json(['options'=>$result_text]);
    //         }
        
    //     }

        
    // }



    public function getinfo(Request $request) {
        if ($request->ajax()) {
            if ($request->_id == "") {
                return response()->json(['options'=>'<b>Выберите объект из списка выше</b>']);
            } else {
                $result_text = '<b>Информация о данных:</b><br><br>';
                $data = DomainObjectCollection::where('id', $request->_id)->first();
    
                $nameValue = $data->ecpgo_name;
    
                $data_json = json_decode($data['attributes'], true);
    
                if ($data['approved'] == 0) {
                    $status = 'Статус: <span style="color: #990000">Не утверждено</span>';
                } else {
                    $status = 'Статус: <span style="color: #0075ff">Согласовал ' . $nameValue . '</span>';
                }
    
                for ($i = 0; $i < count($data_json); $i++) {
                    $result_text .= '<b>Владелец данных</b>: '.$data_json[$i]['Owner'].'<br>';
                    $result_text .= '<b>Атрибут</b>: <span style="color: #0075ff">'.$data_json[$i]['Attribute'].'</span><br>';
                    $result_text .= '<b>Наименование ИС</b>: '.$data_json[$i]['Original source'].'<br>';
                    $result_text .= $status.'<br><br>';
                }
    
                if ($data['approved'] == 0) {
                    if ($data['send_to_approve'] == 0) {
                        $result_text .= '<form method="POST" action="'. route("etalondatas.update", ["etalondata" => $request->_id]) .'">';
                        $result_text .= '<input type="hidden" name="_token" value="'.$request->_token.'" />';
                        $result_text .= '<input type="hidden" name="_method" value="PATCH">';
                        
                        $result_text .= '<button type="submit" class="tabs__button btn" href="#">Отправить на утверждение</button>';
                        $result_text .= '</form>';
                    }
                }
    
                return response()->json(['options'=>$result_text]);
            }
        }
    }
    



    // Подписание ЭЦП со стороны МЦРИАП (Ajax)
    public function signecp(Request $request)
    {
        if ($request->ajax()) {

            $issuerCn = $request->_verify['issuerCn'];
            $authorityKeyIdentifier = $request->_verify['authorityKeyIdentifier'];
            $serialNumber = $request->_verify['serialNumber'];

            $subjectCn = $request->_verify['subjectCn'];

            $Etalons = DomainObjectCollection::
                where('domain_id', $request->_domain_id)->
                where('send_to_approve', '1')->
                where('approved', '1')->
                get();

            foreach ($Etalons as $etalon) {
                $updateEtalon = DomainObjectCollection::find($etalon->id);
                $updateEtalon->update([
                    'approved' => 1,
                    'date_approve' => new DateTime(),
                    'date_discart' => NULL
                ]);
            }

            $updateDomain = DomainCollection::find($request->_domain_id);
            $updateDomain->update([
                'approve' => 1,
                'ecp' => $issuerCn . ", " . $authorityKeyIdentifier . ", " . $serialNumber,
                'ecp_name' => $subjectCn
            ]);

            return response()->json(['options'=>'Эталонные данные были успешно согласованы']);  
        
        }
    }






    // Подписание ЭЦП со стороны Го (Ajax)
    public function signecpgo(Request $request)
    {
        if ($request->ajax()) {

            $issuerCn = $request->_verify['issuerCn'];
            $authorityKeyIdentifier = $request->_verify['authorityKeyIdentifier'];
            $serialNumber = $request->_verify['serialNumber'];

            $subjectCn = $request->_verify['subjectCn'];

            $Etalons = DomainObjectCollection::
            where('domain_id', $request->_domain_id)->
            where('send_to_approve', '1')->
            where('approved', '0')->
            where('attributes', 'LIKE', '%'.Auth::user()->government->name_ru.'%')->
            get();


            foreach ($Etalons as $etalon) {
                $updateEtalon = DomainObjectCollection::find($etalon->id);
                $updateEtalon->update([
                    'approved' => 1,
                    'date_approve' => new DateTime(),
                    'date_discart' => NULL,
                    'ecpgo' => $issuerCn . ", " . $authorityKeyIdentifier . ", " . $serialNumber,
                    'ecpgo_name' => $subjectCn
                ]);
            }

            return response()->json(['options'=>'Эталонные данные были успешно согласованы']);  
        
        }
    }








    public function getinfogo(Request $request) {

        if ($request->ajax()) {

            if ($request->_id == "") {
                return response()->json(['options'=>'<b>Выберите объект из списка выше</b>']);
            } else {

                $result_text = '<b>Информация о данных:</b><br><br>';
                $data = DomainObjectCollection::where('id', $request->_id)->first();

                $data_json = json_decode($data['attributes'], true);


            
                for ($i = 0; $i < count($data_json); $i++) {
                    $result_text .= '<b>Владелец данных</b>: '.$data_json[$i]['Owner'].'<br>';
                    $result_text .= '<b>Атрибут</b>: <span style="color: #0075ff">'.$data_json[$i]['Attribute'].'</span><br>';
                    $result_text .= '<b>Наименование ИС</b>: '.$data_json[$i]['Original source'].'<br><br><br>';
                }

                return response()->json(['options'=>$result_text]);
            }
        
        }

        
    }




}

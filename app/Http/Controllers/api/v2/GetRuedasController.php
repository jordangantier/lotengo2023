<?php

namespace App\Http\Controllers\api\v2;

use App\Models\Transaccion;
use App\Models\Boleto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;

class getRuedasController extends Controller
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
        $result = 
            Transaccion::select('habilitados')
            ->where('id_participante', $id)
            ->get();

        $result2 = null;
        foreach($result as $item){
            $result2 .= $item['habilitados'];
            //$result2 = array_merge($result2, array($item['habilitados']));
        }
        $result2 = str_replace('][', ', ', $result2);
        $result2 = str_replace('[', '', $result2);
        $result2 = str_replace(']', '', $result2);
        $result2 = explode(', ', $result2);

        $queryResult = [];
        foreach($result2 as $item){
            $query = Boleto::select('id')
            ->where('id', $item)
            ->where('is_used', 0)
            ->get();
            $queryResult = array_merge($queryResult, array($query[0]['id']));
            
        }
        return json_encode($queryResult);
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
        //
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
}

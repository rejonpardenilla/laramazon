 <?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Address;

use Response;

class AddressesController extends Controller
{

    public function store(Request $request)
    {
        $attributes = $request->all();
        $address = Address::create($attributes);
        return Response::json($address);
    }
    
    public function update(Request $request, Address $address)
    {
        $attributes = $request->all();
        $address->update($attributes);
        return $address;
    }

}

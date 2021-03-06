<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SpaceRequest extends FormRequest
{
    /*********************************************************************
     *
     * Function Name: SpaceRequest.authorize().
     * Purpose: Determine if the user is authorized to make this request.
     *
     * @return bool A boolean determining if the user is authorized.
     *
     ********************************************************************/
    public function authorize() {
        return true;
    }

    /*********************************************************************
     *
     * Function Name: SpaceRequest.rules().
     * Purpose: The validation rules that the request must follow.
     *
     * @return array An array of rules for the request to accommodate.
     *
     ********************************************************************/
    public function rules() {
        switch($this->method()) {
            case 'POST':{
                return [
                    'name' => ['required', 'unique:App\Models\Space,name'],
                    'description' => 'required',
                    'icon_picture' => ['image', 'max:100000', 'required'],
                    'banner_picture' => ['image', 'max:100000', 'required']
                ];
            }
            case 'PATCH':
            case 'PUT': {
                return [
                    'name' => ['required', 'unique:App\Models\Space,name,' . $this->space],
                    'description' => 'required',
                    'icon_picture' => ['image', 'max:100000'],
                    'banner_picture' => ['image', 'max:100000']
                ];
            }
            default: break;
        }
    }
}

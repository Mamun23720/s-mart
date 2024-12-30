<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'bannerName' => 'required',
            'bannerImage' => 'file',
            'bannerDescription' => 'required',
        ];

          // $validation = Validator::make($request->all(), [
        //     'bannerName' => 'required',
        //     'bannerImage' => 'file',
        //     'bannerDescription' => 'required',
        // ]);
        // if ($validation->fails())
        // {
        //     foreach ($validation->errors()->all() as $errorMessage) {
        //         toastr()->error($errorMessage);
        //     }
        //     return redirect()->back()->withErrors($validation)->withInput();
        // }

    }
}

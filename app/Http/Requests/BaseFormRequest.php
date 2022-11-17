<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class BaseFormRequest extends FormRequest
{
    public function rules()
    {
        // if ($this->method() === 'POST') return $this->store();
        // if ($this->method() === 'PUT' || $this->method() === 'PATCH') return $this->update();
     
        $matchesMethod = match($this->method()){
            'POST' => $this->store(),
            'PUT', 'PATCH' => $this->update(),
            'DELETE' => $this->destroy(),
            default => $this->view()
        };

        return $matchesMethod;
    }

    public function view()
    {
        return [
            //
        ];
    }

    public function store()
    {
        return [
            //
        ];
    }

    public function update()
    {
        return [
            //
        ];
    }

    public function destroy()
    {
        return [
            //
        ];
    }


    protected function failedValidation(Validator $validator)
    {
        if($this->wantsJson())
        {
            $response = response()->json([
                'success' => false,
                'message' => 'Ops! Some errors occurred',
                'errors' => $validator->errors()
            ]);
        }

        $response = back()->with('error', __('locale.ops'))->withErrors($validator)->withInput();

        throw (new ValidationException($validator, $response))
            ->errorBag($this->errorBag)
            ->redirectTo($this->getRedirectUrl());
    }


    //boshqa error message chiqarish uchun
    // public function messages()
    // {
    //     return [
    //         'name.required' => 'A name is required',
    //         'body.required'  => 'A message is required',
    //     ];
    // }

    // public function messages()
    // {
    //     if(request()->isMethod('post')) {
    //         return [
    //             'name.required' => 'Name is required!',
    //             'image.required' => 'Image is required!',
    //             'description.required' => 'Descritpion is required!'
    //         ];
    //     } else {
    //         return [
    //             'name.required' => 'Name is required!',
    //             'description.required' => 'Descritpion is required!'
    //         ];
    //     }
    // }

    // 'message' =>$validator->errors()->first(), bu faqat bitta ustunni errorini qaytaradi
    //  pastdagi funksiya ichiga yoziladi
    // public function failedValidation(Validator $validator)
    // {

    //     throw new HttpResponseException(response()->json([
    //         'success' => false,
    //         'message' =>$validator->errors(),
    //         'data' => null,
    //     ], 422));

    // }

//    protected function failedValidation(Validator $validator)
//    {
//        if($this->wantsJson())
//        {
//            $response = response()->json([
//                'success' => false,
//                'message' => 'Ops! Some errors occurred',
//                'errors' => $validator->errors()
//            ]);
//        }else{
//            $response = redirect()
//                ->route('guest.login')
//                ->with('message', 'Ops! Some errors occurred')
//                ->withErrors($validator);
//        }
//
//        throw (new ValidationException($validator, $response))
//            ->errorBag($this->errorBag)
//            ->redirectTo($this->getRedirectUrl());
//    }
    

}
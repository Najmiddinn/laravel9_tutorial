<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends BaseFormRequest
{ /**
    * Determine if the user is authorized to make this request.
    *
    * @return bool
    */
   public function authorize()
   {
       return true;
   }

   public function store()
   {
       return [
           'title' => 'nullable|string|max:255',
           'description' => 'nullable|string|max:500',
           'body' => 'text|string|max:65000'
       ];
   }

   public function update()
   {
       return [
        'title' => 'nullable|string|max:255',
        'description' => 'nullable|string|max:500',
        'body' => 'text|string|max:65000'
       ];
   }

   // public function destroy()
    // {
    //     return [
    //         'id' => 'required|integer|exists:App\Models\Category,id'
    //     ];
    // }

    
}

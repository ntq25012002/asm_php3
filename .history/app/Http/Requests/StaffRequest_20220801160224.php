<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StaffRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(Request $request)
    {

        $rules = [];
        $currentAction = $this->route()->getActionMethod(); // Trả về tên hàm thực hiện validate
        // $id = $this->getId();
        // dd($currentAction);
        switch ($this->method()) {
            case 'POST':
                switch ($currentAction) {
                    case 'store':
                        $rules = [
                            'name' => 'required',
                            'email' => 'required|email|unique:users,email',
                            'password' => 'required|min:6|confirmed',
                            'role_id' => 'required',
                            'phone_number' => 'required|max:10|regex:/(0)[0-9]{9}/',
                            'address' => 'required',
                        ];
                        break;
                    case 'update':
                        $id = $request->id;
                        // dd($id);
                        $rules = [
                            'name' => 'required',
                            'email' => 'required|email|unique:users,email,'.$id,
                            'password' => 'required|min:6|confirmed',
                            'role_id' => 'required',
                            'phone_number' => 'required|regex:/(0)[0-9]{9}/',
                            'address' => 'required',
                        ];
                        break;
                    default:
                        # code...
                        break;    
                }
                break;
            default:
                # code...
                break;
        }

        return $rules;
    }
    public function messages() {
        return [
            'name.required' => 'Vui lòng nhập họ tên',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Định dạng email chưa đúng',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Vui lòng nhập mật khẩu tối thiểu :min ký tự',
            'password.confirmed' => 'Mật khẩu không trùng khớp',
            'role_id.required' => 'Vui lòng chọn vai trò',
            'phone_number.required' => 'Vui lòng nhập số điện thoại',
            'phone_number.max' => 'Số điện thoại có chỉ có :max chữ số',
            'phone_number.regex' => 'Định dạng số điện thoại chưa đúng',
            'address.required' => 'Vui lòng nhập địa chỉ',
        ];
    }
}

    
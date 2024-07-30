<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
                    'ten_nguoi_nhan'=>'required|string|max:255',
                    'email_nguoi_nhan'=>'required|string|email|max:255',
                    'so_dien_thoai_nguoi_nhan'=>'required|string|min:10',
                    'dia_chi_nguoi_nhan'=>'required|string|max:255',
        ];
    }
    public function messages(): array
    {
    return [
                'ten_nguoi_nhan.required' => 'Tên Người Nhận Bắt Buộc phải điền',
                'ten_nguoi_nhan.string' => 'Tên người nhận phải đúng định dạng',
                'ten_nguoi_nhan.max' => 'Tên người nhận khôgn được quá 255 ký tự',
                'email_nguoi_nhan.required' => 'Nhập Email ',
                'email_nguoi_nhan.string' => 'Email phải là chuỗi ký tự',
                'email_nguoi_nhan.email' => 'Email không đúng định dạng',
                'so_dien_thoai_nguoi_nhan.required' => 'Số điện thoại bắt buộc phải điền',
                'so_dien_thoai_nguoi_nhan.string' => 'Số điênj thoại phải đúng định dạng',
                'so_dien_thoai_nguoi_nhan.min' => 'Số điện thoại không hợp lệ',
                'dia_chi_nguoi_nhan.required' => 'Địa chỉ không hợp lệ',
                'dia_chi_nguoi_nhan.string' => 'Địa chỉ không đúng định dạng',
                'dia_chi_nguoi_nhan.max' => 'Địa chỉ không được vượt quá 255 ký tự',

    ];
    }
}

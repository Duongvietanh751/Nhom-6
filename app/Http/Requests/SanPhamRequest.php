<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SanPhamRequest extends FormRequest
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
                    'ten_san_pham' => 'required|max:100',
                    'gia_san_pham' => 'required|numeric|min:1|max:9999999999',
                    'gia_khuyen_mai' => 'required|numeric|min:1|max:9999999999',
                    'so_luong' => 'required|numeric|min:1',
                    'danh_muc_id' => 'required|in:1,2',
                    'trang_thai' => 'required|in:1,2',
        ];
    }
    public function messages(): array
    {
    return [
                'ten_san_pham.required' => 'Tên sản phẩm bắt buộc điền',
                'ten_san_pham.max' => 'Tên sản phẩm không được quá 100 ký tự',
                'gia_san_pham.required' => 'Giá sản phẩm bắt buộc điền',
                'gia_san_pham.numeric' => 'Giá sản phẩm phải là số',
                'gia_san_pham.min' => 'Giá sản phẩm không hợp lệ',
                'gia_san_pham.max' => 'Giá sản phẩm phải nhỏ hơn 99.999.999đ',
                'gia_khuyen_mai.required' => 'Giá sản phẩm bắt buộc điền',
                'gia_khuyen_mai.numeric' => 'Giá sản phẩm phải là số',
                'gia_khuyen_mai.min' => 'Giá sản phẩm không hợp lệ',
                'gia_khuyen_mai.max' => 'Giá sản phẩm phải nhỏ hơn 99.999.999đ',
                'so_luong.required' => 'Số lượng bắt buộc điền',
                'so_luong.numeric' => 'Số lượng phải là số',
                'so_luong.min' => 'Số lượng không hợp lệ',
                'danh_muc_id.required' => 'Danh Mục bắt buộc điền',
                'danh_muc_id.in' => 'Danh Muc không hợp lệ',
                'trang_thai.required' => 'Trạng thái bắt buộc điền',
                'trang_thai.in' => 'Trạng thái không hợp lệ',
    ];
    }
}

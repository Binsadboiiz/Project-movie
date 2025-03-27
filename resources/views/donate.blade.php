@extends('layouts.master')
@section('title', 'Donate❤️🎉')
@section('content')
<style>
    .donate-container {
        margin: 10px auto;
        padding: 20px;
        max-width: 80%;
        justify-content: center;
        align-items: center;
        height: auto;
        background-color: #1f1e1e;
        overflow: hidden;
        color: white;
        border-radius: 10px;
    }
    .donate-content {
        margin: 0 auto;
        width: 60%;

    }
    .donate-content :where(p,b){
        color: white;
        margin: 0;
    }
    .donate-box-1 {
        padding: 10px;
        background-color: #E0115F;
        width: 100%;
        border-radius: 20px;
        margin: 5px auto;
    }
    .donate-box-1 p {
        text-align: center;
        align-items: center;
    }
    .donate-box-2 {
        padding: 10px;
        background-color: #93C572;
        width: 100%;
        border-radius: 20px;
        margin: 5px auto;
    }
    .donate-box-2 a {
        text-decoration: none;
    }
    .donate-box-2 p {
        text-align: center;
    }
    .donate-cre {
        text-align: right;
        margin-top: 30px;
    }
</style>
<div class="donate-container">
    <h1>❤️KÊU GỌI ỦNG HỘ: HÃY GIÚP ĐỠ NHỮNG HOÀN CẢNH KHÓ KHĂN❤️</h1>
    <div class="donate-content">
        <div class="donate-box-1">
            <p><b style="color: white">👉 NETCHILL không nhận bất kỳ khoản donate nào.</b></p>
        </div>
        <p>Chúng tôi duy trì hoạt động thông qua các quảng cáo trên website. Nhưng hôm nay, thay vì donate cho chúng tôi, chúng tôi mong muốn các bạn <b>cùng nhau hướng về những hoàn cảnh khó khăn ngoài xã hội.</b></p>
        <div class="donate-box-2">
            <p>🫶 Hãy ủng hộ cho Quỹ Hy Vọng tại: <a href="https://quyhyvong.com/ung-ho" target="_blank"><b>HOPE FOUNDATION</b></a></p>
        </div>
        <p>Mỗi đóng góp – dù nhỏ – đều mang giá trị lớn. Cùng nhau, chúng ta có thể <b>góp phần thắp sáng hy vọng cho những người đang cần sự giúp đỡ.</b></p>
    </div>
    <p class="donate-cre">Cre: AnimeVietSub Team</p>
</div>
@endsection

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>fjkladjfk</title>
    <style>
        @page {
            header: page-header;
            footer: page-footer;
        }

        body {
            font-family: 'expo', sans-serif;
            line-height: 1.6em;
        }

        .header-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .header-logo {
            height: auto;
        }

        .footer-container {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
        }

        .footer-logo {
            width: 100%;
            height: auto;
        }
    </style>
</head>

<body dir="rtl">
    <htmlpageheader name="page-header">
        <div class="header-container">
            <img src="{{ asset('pdf-images/header.png') }}" class="header-logo" alt="Logo">
        </div>
    </htmlpageheader>

    <div class="content-a4"
        style="width: 100%; min-height: 1000px; display: flex; flex-direction: column; align-items: center; justify-content: flex-start;">

        <!-- Main Title Card -->
        <div
            style="background: #fff; border-radius: 16px; padding: 24px 38px 20px 38px; width: 70%; box-shadow: 0 1px 6px rgba(54,54,54,0.07); margin-bottom: 24px;">
            <div style="font-weight: bold; font-size: 1.8rem; text-align: center; color: #20344c;">
                الموضوع: <span style="color: #0097a7;">مشهد قبول دورة تدريبية</span>
            </div>
        </div>

        <!-- Body Content Card -->
        <div
            style="background: #fff; border-radius: 14px; padding: 35px 45px 28px 45px; width: 80%; box-shadow: 0 1px 6px rgba(54,54,54,0.05); display: flex; flex-direction: column; align-items: flex-end; gap: 18px;">
            <div style="font-weight: bold; font-size: 1.08rem; color: #3f5d7d; margin-bottom: 4px;">
                السلام عليكم ورحمة اللّٰه وبركاته ،،،،،،، وبعد:
            </div>

            <div style="font-size: 1.02rem; color: #24282d;">
                نفيد سعادتكم بأنه تواصل معنا
                <span style="font-weight: bold; color: #0097a7;">{{ $fullname }}</span>
                هوية رقم
                <span
                    style="background: #e0f7fa; border-radius: 6px; padding: 0 10px; margin: 0 3px; font-family: monospace; font-size: 1rem;">({{ $id_number }})</span>
            </div>

            <div style="font-size: 1.02rem; color: #24282d;">
                يرغب بالالتحاق لدينا في دورة
                <span style="font-weight: bold; color: #20344c;">{{ $course }}</span>
            </div>

            <div
                style="font-size: 1.02rem; color: #24282d; background-color: #f4f9ff; border-radius: 8px; padding: 4px 14px; width:fit-content;">
                وذلك خلال الفترة <span style="font-weight: bold;">(المسائية)</span>
            </div>

            <div style="font-size: 1.02rem; color: #24282d;">
                علماً بأن الدورة ستكون خلال الفترة:
                <span
                    style="background: #fce9e3; color: #b85838; border-radius: 6px; padding: 0 12px; margin: 0 3px; font-family: monospace; font-size: 1rem;">
                    ( {{ $period }} )
                </span>
            </div>

            <div style="font-size: 1.02rem; color: #2a394e;">
                بشركة الخليج للتدريب والتعليم
            </div>

            <div style="font-size: 0.98rem; text-align: justify; line-height:1.85; color: #254167; margin-top: 10px;">
                ونفيد سعادتكم بأنه <span style="font-weight: bold">لا مانع لدينا من قبوله</span> للدورة المذكورة على أن
                تكون على حسابه الخاص ووقته الخاص.
            </div>

            <div style="font-size: 0.98rem; color: #254167;">
                علماً بأن المتدرب سيحصل على شهادة من معهد الخليج للتدريب والتعليم بالتعاون مع وزارة الدفاع.
            </div>

            <div style="font-size: 0.98rem; color: #5e4737; font-style: italic;">
                نأمل بعد الاطلاع إكمال اللازم على ضوء ما ذكر أعلاه وإشعارنا.
            </div>

            <!-- Contact Info Box -->
            <div
                style="background: #fcf8e3; border: 1px solid #efe7cb; border-radius: 10px; padding: 16px 18px 12px 18px; width: 60%; margin: 16px auto 0 auto; text-align: center;">
                <div style="color:#635843; font-size: 1.03rem; font-weight: bold;">
                    لمزيد من المعلومات يرجى الاتصال على:
                </div>
                <div style="font-size: 1.06rem; letter-spacing: 1px; font-family: monospace; color: #007663;">
                    0500303750
                </div>
                <div style="font-size: 0.97rem; margin-top: 1px;">
                    <span style="color: #307aba;">salem.alkatheri@newhorizons.com.sa</span>
                </div>
            </div>
        </div>

        <!-- Stamp -->
        <div style="padding: 0 0 4px 0; display: flex; justify-content: center; width: 70%">
            <img src="{{ asset('pdf-images/stamp.png') }}" style="width: 100%; border-radius: 10px;" alt="stamp">
        </div>
    </div>

    <htmlpagefooter name="page-footer">
        <div class="footer-container">
            <img src="{{ asset('pdf-images/footer.png') }}" class="footer-logo">
        </div>
    </htmlpagefooter>

</body>

</html>

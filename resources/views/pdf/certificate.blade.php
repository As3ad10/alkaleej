<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $fullname }}</title>
    <style>
        @page {
            header: page-header;
            footer: page-footer;
        }

        body {
            font-family: 'KFGQPC Uthman Taha Naskh', sans-serif;
            line-height: 1.6em;
            text-align: center;
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
        <div class="content-a4"
            style="flex: 1; width: 100%; display: flex; flex-direction: column; align-items: center; justify-content: start;">

            <div style="width: 100%; text-align:right">
                <div style="font-weight: normal; margin-top: 10px;">الموضوع: مشهد قبول دورة
                    تدريبية</div>
                <div style="height: 10px"></div>
            </div>

            <div
                style="display: flex; flex-direction: column; justify-content: space-around; flex: 1; align-items: center; width: 80%;">

                {{-- <div>
                    {{ $student->department->certificate_text }}
                </div> --}}

                <div class="big-text" style="font-weight: bold;">السلام عليكم ورحمة اللّٰه وبركاته ،،،،،،، وبعد:
                </div>

                <div class="flex gap-2">
                    <div>نفيد سعادتكم بأنه تواصل معنا </div>
                    {{-- <div>{{ $student_level }}</div> --}}
                    {{-- <div>/</div> --}}
                    <div>{{ $fullname }}</div>
                    <div> هوية رقم</div>
                    <div>({{ $id_number }})</div>
                </div>

                <div class="flex gap-2">
                    <div>يرغب بالالتحاق لدينا في دورة</div>
                    <div style="font-weight: bold">{{ $course }}</div>
                </div>

                <div>وذلك خلال الفترة (المسائية)</div>

                <div class="flex gap-1">
                    <div>علماً بان الدورة ستكون خلال الفترة: </div>
                    <div>{{ $period }}</div>
                </div>

                <div>بشركة الخليج للتدريب والتعليم</div>

                <div style="text-align: center;">
                    ونفيد سعادتكم بأنه لا مانع لدينا من قبوله للدورة المذكورة على أن تكون
                    على حسابه الخاص ووقته الخاص،.
                </div>
                <div class="" style="margin-top: 5px;">
                    علما بأن المتدرب سيحصل على شهادة من معهد الخليج للتدريب والتعليم بالتعاون مع وزارة الدفاع
                </div>

                <div>نأمل بعد الاطلاع اكمال اللازم على ضوء ما ذكر أعلاه واشعارنا.</div>

                <div>لمزيد من المعلومات ارجو الاتصال على رقم: 0500303750 </div>
                <div>salem.alkatheri@newhorizons.com.sa</div>
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

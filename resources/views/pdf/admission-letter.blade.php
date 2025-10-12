<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Admission Letter</title>
    <style>
        @page {
            margin: 40px;
        }

        body {
            font-family: {{ $institution->primary_font }}, 'Inter' "DejaVu Sans", sans-serif;
            line-height: 1.6;
            color: #333;
            padding: 0 30px;
        }

        header {
            text-align: center;
            margin-bottom: 40px;
        }

        header img {
            max-height: 80px;
            margin-bottom: 10px;
        }

        header h1 {
            color: #D97706;
            /* Tailwind amber-600 */
            font-size: 28px;
            margin: 0;
        }

        .content p {
            margin: 15px 0;
            font-size: 14px;
        }

        .content p strong {
            color: #000;
        }

        .details {
            margin-top: 30px;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 6px;
            background: #f9fafb;
            font-size: 14px;
        }

        .details p {
            margin: 8px 0;
        }

        .details p strong {
            width: 180px;
            display: inline-block;
            color: #555;
        }

        ul.contact-info {
            list-style: none;
            padding: 0;
            margin-top: 15px;
            font-size: 14px;
        }

        ul.contact-info li {
            margin-bottom: 6px;
        }

        footer {
            margin-top: 50px;
            font-size: 14px;
        }

        footer p {
            margin: 3px 0;
        }
    </style>
</head>

<body>

    <header> 
        <div style="font-size: 24px; font-weight: bold; color: {{ $institution->primary_color }};">{{ $institution->name }}</div>
        <h1>Admission Letter</h1>
    </header>

    <div class="content">
        <p>Dear <strong>{{ $application->full_name }}</strong>,</p>

        <p>
            We are pleased to inform you that you have been offered admission to
            <strong>{{ $application->course->name }} course </strong> at <strong>{{ $institution->name }}</strong>.
        </p>

        <div class="details">
            <p><strong>Reference No:</strong> {{ $application->id }}</p>
            <p><strong>Course:</strong> {{ $application->course->name }}</p>
            <p><strong>Department:</strong> {{ $application->course->department->name }}</p>
            <p><strong>Start Term:</strong> {{ ucwords(str_replace('_', ' ', $application->start_term)) }}</p>
            <p><strong>KCSE Grade:</strong> {{ $application->high_school_grade }}</p>
        </div>

        <p>We look forward to welcoming you to our college.</p>

        <p>For any inquiries, please contact our admissions office through the following channels:</p>
        <ul class="contact-info">
            <li>Email: <a href="mailto:{{ $institution->email }}">{{ $institution->email }}</a></li>
            <li>Phone: <a href="tel:{{ $institution->phone }}">{{ $institution->phone }}</a></li>
        </ul>

        <p>Congratulations once again!</p>
    </div>

    <footer>
        <p>Yours faithfully,</p>
        <p>{{ $institution->principal_name }}</p>
        <p><strong>Principal</strong></p>
    </footer>

</body>

</html>
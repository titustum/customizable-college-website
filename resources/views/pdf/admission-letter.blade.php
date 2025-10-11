<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Admission Letter</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            line-height: 1.6;
            padding: 30px;
        }

        h1 {
            color: #D97706;
        }

        .details {
            margin-top: 30px;
        }

        .details p {
            margin: 5px 0;
        }
    </style>
</head>

<body>
    <h1>Admission Letter</h1>

    <p>Dear <strong>{{ $applicant->full_name }}</strong>,</p>

    <p>We are pleased to inform you that you have been offered admission to <strong>{{ $applicant->course->title
            }}</strong> at <strong>{{ config('app.name') }}</strong>.</p>

    <div class="details">
        <p><strong>Admission Number:</strong> {{ $applicant->id }}</p>
        <p><strong>Program:</strong> {{ $applicant->course->title }}</p>
        <p><strong>Department:</strong> {{ $applicant->course->department->name }}</p>
        <p><strong>Start Term:</strong> {{ ucwords(str_replace('_', ' ', $applicant->start_term)) }}</p>
        <p><strong>KCSE Grade:</strong> {{ $applicant->high_school_grade }}</p>
    </div>

    <p>We look forward to welcoming you to our college.</p>

    <p>Yours faithfully,</p>
    <p><strong>Principal</strong></p>
</body>

</html>
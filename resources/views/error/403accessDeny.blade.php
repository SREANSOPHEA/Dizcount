<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 - Access Denied</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: #000000;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .card {
            background: #ffffff;
            border: 0.5px solid #e0ddd5;
            border-radius: 16px;
            padding: 3rem 2.5rem;
            text-align: center;
            max-width: 420px;
            width: 100%;
        }

        .label {
            display: inline-block;
            font-size: 11px;
            font-weight: 500;
            letter-spacing: 0.08em;
            padding: 3px 12px;
            border-radius: 99px;
            background: #FAECE7;
            color: #712B13;
            margin-bottom: 1.5rem;
        }

        .icon-wrap {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            background: #FAECE7;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
        }

        .code {
            font-size: 72px;
            font-weight: 500;
            letter-spacing: -2px;
            line-height: 1;
            color: #F0997B;
            margin-bottom: 0.75rem;
        }

        .title {
            font-size: 20px;
            font-weight: 500;
            color: #1a1a1a;
            margin-bottom: 0.5rem;
        }

        .sub {
            font-size: 14px;
            color: #888780;
            line-height: 1.7;
            margin-bottom: 2rem;
        }

        .btn-row {
            display: flex;
            gap: 10px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            font-size: 13px;
            padding: 9px 22px;
            border-radius: 8px;
            border: 0.5px solid #c8c5bd;
            background: transparent;
            color: #1a1a1a;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: background 0.15s;
        }

        .btn:hover { background: #f5f4f0; }

        .btn-primary {
            background: #f5f4f0;
            border-color: #aaa9a1;
        }

        .btn-primary:hover { background: #eceae4; }
    </style>
</head>
<body>
    <div class="card">
        <div class="label">403 — forbidden</div>

        <div class="icon-wrap">
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none"
                stroke="#993C1D" stroke-width="1.5"
                stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="11" width="18" height="11" rx="2"/>
                <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                <circle cx="12" cy="16" r="1" fill="#993C1D"/>
            </svg>
        </div>

        <div class="code">403</div>
        <div class="title">Access denied</div>
        <div class="sub">
            You do not have permission to view this page.
            Please contact your administrator if you think this is a mistake.
        </div>

        <div class="btn-row">
            <a href="/admin" class="btn btn-primary">Go to dashboard</a>
            <a href="/admin/login" class="btn">Back to login</a>
        </div>
    </div>
</body>
</html>

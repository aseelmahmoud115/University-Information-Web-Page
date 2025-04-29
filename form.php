<?php
header('Content-Type: text/html; charset=utf-8');

// معالجة بيانات النموذج
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // تنظيف البيانات المدخلة
    $name = htmlspecialchars($_POST['name']);
    $birthdate = htmlspecialchars($_POST['birthdate']);
    $country = htmlspecialchars($_POST['country']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    
    // تحويل تاريخ الميلاد للتنسيق العربي
    $arabic_date = date_create($birthdate);
    $formatted_date = date_format($arabic_date, 'd/m/Y');
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نتيجة النموذج | أروى القدرة</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #5D1049;
            --secondary: #4E0D3A;
            --accent: #E30425;
            --light: #F8F1FF;
            --dark: #2A0A1E;
        }
        
        body {
            font-family: 'Tajawal', sans-serif;
            background-color: #f5f5f5;
            color: #333;
            line-height: 1.8;
            padding: 20px;
        }
        
        .result-container {
            max-width: 600px;
            margin: 50px auto;
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        
        h1 {
            color: var(--primary);
            text-align: center;
            margin-bottom: 30px;
            position: relative;
        }
        
        h1::after {
            content: "";
            position: absolute;
            bottom: -10px;
            right: 50%;
            transform: translateX(50%);
            width: 100px;
            height: 3px;
            background: var(--accent);
        }
        
        .result-message {
            background: var(--light);
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
            border-right: 4px solid var(--primary);
        }
        
        .result-item {
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
            display: flex;
        }
        
        .result-item strong {
            color: var(--secondary);
            min-width: 120px;
        }
        
        .back-link {
            display: inline-flex;
            align-items: center;
            margin-top: 30px;
            background: var(--primary);
            color: white;
            padding: 12px 25px;
            border-radius: 30px;
            text-decoration: none;
            transition: all 0.3s ease;
            gap: 10px;
        }
        
        .back-link:hover {
            background: var(--secondary);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        
        footer {
            text-align: center;
            padding: 25px;
            background: var(--dark);
            color: white;
            margin-top: 70px;
            border-radius: 30px 30px 0 0;
        }
        
        .heart {
            color: var(--accent);
            animation: pulse 1.5s infinite;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.3); }
            100% { transform: scale(1); }
        }
    </style>
</head>
<body>
    <div class="result-container">
        <h1>نتيجة النموذج</h1>
        
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
            <div class="result-message">
                <p>شكراً لك <?php echo $name; ?>! تم استلام بياناتك بنجاح.</p>
            </div>
            
            <div class="result-item">
                <strong>الاسم الكامل:</strong>
                <span><?php echo $name; ?></span>
            </div>
            
            <div class="result-item">
                <strong>تاريخ الميلاد:</strong>
                <span><?php echo $formatted_date; ?></span>
            </div>
            
            <div class="result-item">
                <strong>الدولة:</strong>
                <span><?php echo $country; ?></span>
            </div>
            
            <div class="result-item">
                <strong>البريد الإلكتروني:</strong>
                <span><?php echo $email; ?></span>
            </div>
            
            <div class="result-item">
                <strong>رقم الهاتف:</strong>
                <span><?php echo $phone; ?></span>
            </div>
            
            <a href="form.html" class="back-link">
                <i class="fas fa-arrow-right"></i> العودة للنموذج
            </a>
        <?php else: ?>
            <div class="result-message">
                <p>لم يتم إرسال أي بيانات. الرجاء ملء النموذج أولاً.</p>
            </div>
            <a href="form.html" class="back-link">
                <i class="fas fa-arrow-right"></i> الذهاب للنموذج
            </a>
        <?php endif; ?>
    </div>
    
    <footer>
        <p>تصميم وتطوير <span class="heart">❤</span> أروى القدرة</p>
        <p>جميع الحقوق محفوظة &copy; <?php echo date('Y'); ?></p>
    </footer>
</body>
</html>
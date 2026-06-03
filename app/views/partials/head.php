<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title ?? 'MVC PHP') ?></title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 900px; margin: 0 auto; padding: 0 16px 40px; color: #333; }
        .site-header { border-bottom: 1px solid #e0e0e0; padding: 16px 0; margin-bottom: 24px; }
        .site-header h1 { margin: 0 0 8px; font-size: 1.5rem; }
        .site-nav a { color: #1976d2; text-decoration: none; margin-right: 12px; }
        .site-nav a:hover { text-decoration: underline; }
        .site-footer { margin-top: 40px; padding-top: 16px; border-top: 1px solid #e0e0e0; font-size: 0.875rem; color: #666; }
        table { width: 100%; border-collapse: collapse; margin-top: 16px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background: #f5f5f5; }
        .error { color: #c00; }
    </style>
</head>

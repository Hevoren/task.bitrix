<?php
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');

// Ваш код для проверки авторизации, если требуется

// Вывод страницы Swagger UI
?>
<!DOCTYPE html>
<html>
<head>
    <title>Swagger UI</title>
    <link rel="stylesheet" type="text/css" href="/bitrix/tools/swagger-ui/dist/swagger-ui.css" />
    <script src="/bitrix/tools/swagger-ui/dist/swagger-ui-bundle.js"></script>
    <script src="/bitrix/tools/swagger-ui/dist/swagger-ui-standalone-preset.js"></script>
</head>
<body>
    <div id="swagger-ui"></div>
    <script>
        window.onload = function() {
            fetch('/bitrix/tools/swagger-ui/dist/swagger.json') // Загрузка спецификации в реальном времени
            .then(response => response.json())
            .then(data => {
                SwaggerUIBundle({
                    spec: data,
                    dom_id: '#swagger-ui',
                    presets: [
                        SwaggerUIBundle.presets.apis,
                        SwaggerUIStandalonePreset
                    ],
                    layout: "BaseLayout"
                })
            });
        }
    </script>
</body>
</html>